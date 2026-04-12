<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function index()
    {
        $cartItems = session()->get('cart', []);
        $productIds = array_keys($cartItems);
        
        $products = [];
        if (!empty($productIds)) {
            $placeholders = implode(',', array_fill(0, count($productIds), '?'));
            $products = DB::select("
                SELECT 
                    products.productId,
                    products.productName,
                    products.price,
                    products.storeId,
                    stores.storeName,
                    productImages.imageName,
                    categories.categoryName
                FROM products
                LEFT JOIN stores ON products.storeId = stores.storeId
                LEFT JOIN productImages
                    ON products.productId = productImages.productId
                    AND productImages.imgId = (
                        SELECT MIN(imgId)
                        FROM productImages
                        WHERE productImages.productId = products.productId
                    )
                LEFT JOIN categories ON products.categoryId = categories.categoryId
                WHERE products.productId IN ($placeholders)
            ", $productIds);
            
            $products = array_combine(
                array_column($products, 'productId'),
                $products
            );
        }
        
        // Calculate subtotal
        $subtotal = 0;
        foreach ($cartItems as $productId => $item) {
            if (isset($products[$productId])) {
                $subtotal += $products[$productId]->price * $item['quantity'];
            }
        }
        
        return view('cart.index', compact('cartItems', 'products', 'subtotal'));
    }

    public function updateCart(Request $request)
    {
        $validated = $request->validate([
            'quantities' => 'required|array',
            'quantities.*' => 'required|integer|min:1',
        ]);

        $cart = session()->get('cart', []);

        foreach ($validated['quantities'] as $productId => $quantity) {
            if (isset($cart[$productId])) {
                $cart[$productId]['quantity'] = (int) $quantity;
            }
        }

        session()->put('cart', $cart);

        return redirect()->route('cart.index')->with('status', 'Cart updated successfully.');
    }

    public function addToCart(Request $request, $productId)
    {
        // Validate product ID
        if (!is_numeric($productId) || $productId <= 0) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid product ID'
            ], 400);
        }
    
        // Get product details with proper error handling
        try {
            $product = DB::selectOne("
                SELECT 
                    p.productId, 
                    p.productName, 
                    p.price, 
                    pi.imageName, 
                    c.categoryName,
                    s.storeId,
                    s.storeName,
                    p.stockQuantity
                FROM products p
                LEFT JOIN stores s ON p.storeId = s.storeId
                LEFT JOIN productImages pi ON p.productId = pi.productId
                    AND pi.imgId = (
                        SELECT MIN(imgId)
                        FROM productImages
                        WHERE productImages.productId = p.productId
                    )
                LEFT JOIN categories c ON p.categoryId = c.categoryId
                WHERE p.productId = ? 
                AND p.isAvailable = 1
                AND p.proStatus = 'Approved'
                LIMIT 1
            ", [$productId]);
    
            if (!$product) {
                return response()->json([
                    'success' => false,
                    'message' => 'Product not available or not found'
                ], 404);
            }
    
            // Check stock availability
            if (isset($product->stockQuantity)) {
                $cart = session()->get('cart', []);
                $currentQuantity = $cart[$productId]['quantity'] ?? 0;
                
                if (($currentQuantity + 1) > $product->stockQuantity) {
                    return response()->json([
                        'success' => false,
                        'message' => 'Insufficient stock available'
                    ], 400);
                }
            }
    
            // Update cart
            $cart = session()->get('cart', []);
            
            if (isset($cart[$productId])) {
                $cart[$productId]['quantity']++;
            } else {
                $cart[$productId] = [
                    "product_id" => $product->productId,
                    "store_id" => $product->storeId,
                    "store_name" => $product->storeName,
                    "name" => $product->productName,
                    "price" => $product->price,
                    "image" => $product->imageName,
                    "category" => $product->categoryName,
                    "quantity" => 1
                ];
            }
    
            session()->put('cart', $cart);
    
            return response()->json([
                'success' => true,
                'cart_count' => $this->getCartCount(),
                'subtotal' => $this->calculateSubtotal($cart),
                'store_count' => $this->getStoreCount($cart),
                'product_name' => $product->productName, // For notifications
                'product_image' => $product->imageName   // For notifications
            ]);
    
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error adding product to cart',
                'error' => config('app.debug') ? $e->getMessage() : null
            ], 500);
        }
    }

    public function removeFromCart($productId)
    {
        $cart = session()->get('cart');
        
        if (isset($cart[$productId])) {
            unset($cart[$productId]);
            session()->put('cart', $cart);
        }
        
        return response()->json([
            'success' => true,
            'cart_count' => $this->getCartCount(),
            'subtotal' => $this->calculateSubtotal($cart ?? []),
            'store_count' => $this->getStoreCount($cart ?? [])
        ]);
    }

    public function getCartCount()
    {
        $cart = session()->get('cart', []);
        return array_sum(array_column($cart, 'quantity'));
    }

    public function calculateSubtotal($cartItems)
    {
        if (empty($cartItems)) return 0;
        
        $productIds = array_keys($cartItems);
        $placeholders = implode(',', array_fill(0, count($productIds), '?'));
        
        $products = DB::select("
            SELECT productId, price 
            FROM products 
            WHERE productId IN ($placeholders)
        ", $productIds);
        
        $products = array_combine(
            array_column($products, 'productId'),
            $products
        );
        
        $subtotal = 0;
        foreach ($cartItems as $productId => $item) {
            if (isset($products[$productId])) {
                $subtotal += $products[$productId]->price * $item['quantity'];
            }
        }
        
        return $subtotal;
    }

    public function getStoreCount($cartItems)
    {
        if (empty($cartItems)) {
            return 0;
        }

        $storeIds = array_filter(array_column($cartItems, 'store_id'));

        return count(array_unique($storeIds));
    }
}
