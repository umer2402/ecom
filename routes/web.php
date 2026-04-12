<?php
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\CartController;
Route::get('/', function () {
    
    $cats=DB::table('categories')->orderBy('categoryName')->get();
    return view('welcome',['categories'=>$cats]);
});
Route::get('home', function (Request $request) {
    //$request->session()->flush();
    $recent_products = DB::table('products')
    ->leftJoin('productImages', function($join) {
        $join->on('products.productId', '=', 'productImages.productId')
             ->whereRaw('productImages.imgId = (
                 SELECT MIN(imgId) 
                 FROM productImages 
                 WHERE productImages.productId = products.productId
             )');
    })
    ->leftJoin('categories', 'products.categoryId', '=', 'categories.categoryId')
    ->where('products.isAvailable', true)
    ->where('products.proStatus', 'Approved')
    ->orderBy('products.createdAt', 'desc')
    ->take(8)
    ->get();
    return view('home',['recent_products'=>$recent_products]);
})->middleware('auth')->name('home');
Route::get('user', function () {
    
    return view('userLogin');
})->name('user.login');



Route::post('login', function(Request $request) {
    $credentials = $request->validate([
        'username' => 'required|string',
        'password' => 'required|string',
    ]);

    // Determine if username is email or username
    $field = filter_var($credentials['username'], FILTER_VALIDATE_EMAIL) ? 'email' : 'name';
    
    // Manual authentication
    $user = DB::table('users')
                ->where($field, $credentials['username'])
                ->first();

    if (!$user || !Hash::check($credentials['password'], $user->password)) {
        return back()->withErrors([
            'username' => 'The provided credentials do not match our records.',
        ])->withInput();
    }

    // Manually log in the user
    Auth::loginUsingId($user->id, $request->has('rememberme'));

    return redirect()->intended(route('home'));
})->name('login');

// Logout Route
Route::post('/logout', function() {
    Auth::logout();
    return redirect('/');
})->name('logout');

Route::post('register', function (Request $request) {
    // Validate the request
    $validated = $request->validate([
        'username' => 'required|string|max:255',
        'email' => 'required|string|email|max:255',
        'password' => 'required|string|min:8',
    ]);

    // Check if username or email already exists
    $userExists = DB::table('users')
        ->where('name', $validated['username'])
        ->orWhere('email', $validated['email'])
        ->exists();

    if ($userExists) {
        return back()->withErrors([
            'email' => 'The username or email is already taken.',
        ])->withInput();
    }

    // Insert the new user directly
    DB::table('users')->insert([
        'name' => $validated['username'],
        'email' => $validated['email'],
        'password' => Hash::make($validated['password']),
        'created_at' => now(),
        'updated_at' => now(),
    ]);

    // Redirect with success message
    return redirect()->route('user.login')->with('success', 'Registration successful! Login Please.');
})->name('register');
Route::get('sellers', function () {
    $stores = DB::table('stores')->where('storeStatus','Approved')->get();
    return view('sellersStore', ['stores' => $stores]);
})->middleware('auth')->name('stores.index');
Route::get('categories/{categoryId}', function (int $categoryId) {
    $category = DB::table('categories')
        ->where('categoryId', $categoryId)
        ->first();

    if (!$category) {
        abort(404, 'Category not found.');
    }

    $products = DB::table('products')
        ->join('stores', 'products.storeId', '=', 'stores.storeId')
        ->leftJoin('productImages', function ($join) {
            $join->on('products.productId', '=', 'productImages.productId')
                ->whereRaw('productImages.imgId = (
                    SELECT MIN(imgId)
                    FROM productImages
                    WHERE productImages.productId = products.productId
                )');
        })
        ->select(
            'products.productId',
            'products.productName',
            'products.price',
            'products.storeId',
            'stores.storeName',
            'stores.brandName',
            'productImages.imageName'
        )
        ->where('products.categoryId', $categoryId)
        ->where('products.isAvailable', true)
        ->where('products.proStatus', 'Approved')
        ->where('stores.storeStatus', 'Approved')
        ->orderBy('products.createdAt', 'desc')
        ->get();

    return view('categoryProducts', [
        'category' => $category,
        'products' => $products,
    ]);
})->middleware('auth')->whereNumber('categoryId')->name('categories.show');
Route::get('stores/{storeId}', function (int $storeId) {
    $store = DB::table('stores')
        ->where('storeId', $storeId)
        ->where('storeStatus', 'Approved')
        ->first();

    if (!$store) {
        abort(404, 'Store not found.');
    }
    
    $allStores=DB::table('stores')->where('storeStatus','Approved')->get();
    $products = DB::table('products')
        ->where('storeId', $store->storeId)
        ->where('isAvailable', true)
        ->where('proStatus', 'Approved')
        ->get();
    
    $cats=DB::table('categories')->get();

    foreach ($products as $product) {
        $product->images = DB::table('productImages')->where('productId', $product->productId)->get();
        $product->cat = DB::table('categories')->where('categoryId', $product->categoryId)->first();
    }

    return view('store', ['store' => $store, 'products' => $products, 'categories'=>$cats,'allStores'=>$allStores]);
})->middleware('auth')->whereNumber('storeId')->name('stores.show');
Route::get('explore-{storeName}', function ($storeName) {
    $store = DB::table('stores')
        ->where('storeName', $storeName)
        ->where('storeStatus', 'Approved')
        ->first();

    if (!$store) {
        abort(404, 'Store not found.');
    }

    return redirect()->route('stores.show', ['storeId' => $store->storeId]);
})->middleware('auth');
Route::get('products/{productId}', function (int $productId) {
    $product = DB::table('products')
        ->leftJoin('stores', 'products.storeId', '=', 'stores.storeId')
        ->leftJoin('categories', 'products.categoryId', '=', 'categories.categoryId')
        ->select(
            'products.*',
            'stores.storeName',
            'stores.storeStatus',
            'stores.brandName',
            'categories.categoryName'
        )
        ->where('products.productId', $productId)
        ->where('products.isAvailable', true)
        ->where('products.proStatus', 'Approved')
        ->first();

    if (!$product || $product->storeStatus !== 'Approved') {
        abort(404, 'Product not found.');
    }

    $product->images = DB::table('productImages')
        ->where('productId', $product->productId)
        ->orderBy('imgId')
        ->get();

    return view('productDetails', ['product' => $product]);
})->middleware('auth')->whereNumber('productId')->name('products.show');
Route::get('view-{productId}', function (int $productId) {
    return redirect()->route('products.show', ['productId' => $productId]);
})->middleware('auth')->whereNumber('productId');


// Chat routes
Route::post('/chat/with/{sellerId}', function ($sellerId) {
    if (!Auth::check()) {
        return response()->json(['error' => 'Unauthenticated'], 401);
    }

    $userId = Auth::id();
    $seller = DB::table('sellers')->where('sellerId', $sellerId)->first();

    if (!$seller) {
        abort(404, 'Seller not found');
    }

    // Fetch chat history
    $messages = DB::table('chat')
        ->where(function($query) use ($userId, $sellerId) {
            $query->where('userId', $userId)
                  ->where('sellerId', $sellerId);
        })
        ->get();

    return response()->json($messages); 
})->middleware('auth');

Route::post('/chat/send', function (Request $request) {
    if (!Auth::check()) {
        return response()->json(['error' => 'Unauthenticated'], 401);
    }

    $request->validate([
        'sellerId' => 'required|integer',
        'message' => 'required|string', 
    ]);

    $userId = Auth::id();
    $sellerId = $request->input('sellerId');
    $message = $request->input('message');
  
    // Save message to database
    $chatId = DB::table('chat')->insertGetId([
        'userId' => $userId,
        'sellerId' => $sellerId,
        'message' => $message,
        'is_seller' => false, // This message is from user
        'created_at' => now(),
        'updated_at' => now(),
    ]);

    // For real-time functionality, you would broadcast this event
    // Broadcast::event(new NewMessage($chatId, $userId, $sellerId, $message));

    return response()->json([
        'success' => true,
        'message' => $message,
        'timestamp' => now()->format('h:i A')
    ]);
})->middleware('auth');
Route::prefix('store/cart')->group(function() {
    Route::get('/', [CartController::class, 'index'])->name('cart.index');
    Route::post('/add/{product}', [CartController::class, 'addToCart'])->name('cart.add');
    Route::delete('/remove/{product}', [CartController::class, 'removeFromCart'])->name('cart.remove');
})->middleware('auth');
