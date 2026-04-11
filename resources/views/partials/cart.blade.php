<div class="shopping-cart">
    <a href="#" class="cart-toggle">
        <span class="cart-bag">
            <i class="bag"></i>
            <span class="cart-count">{{ app('App\Http\Controllers\CartController')->getCartCount() }}</span>
        </span>
        <span class="total">${{ number_format(app('App\Http\Controllers\CartController')->calculateSubtotal(session('cart', [])), 2) }}</span>
    </a>
    <div class="cart-popup-container">
        <p>Recently added item(s)</p>
        <ul class="cart-items-list">
            @php
                $cartItems = session('cart', []);
                if (!empty($cartItems)) {
                    $productIds = array_keys($cartItems);
                    $products = DB::table('products')
                                ->whereIn('productId', $productIds)
                                ->get()
                                ->keyBy('productId');
                }
            @endphp
            
            @forelse($cartItems ?? [] as $productId => $item)
                @if(isset($products[$productId]))
                <li>
                    <a href="#" class="pull-left">
                        <img src="{{ asset('assets/productImages/' . $products[$productId]->imageName) }}" alt="cart-img" width="60" height="80">
                    </a>
                    <h4><a href="#">{{ $products[$productId]->productName }}</a></h4>
                    <span class="price">{{ $item['quantity'] }} x ${{ number_format($products[$productId]->price, 2) }}</span>
                    <a href="#" class="remove" data-product-id="{{ $productId }}">x</a>
                </li>
                @endif
            @empty
                <li>Your cart is empty</li>
            @endforelse
        </ul>
        <div class="cart-subtotal">
            <span>cart sub-total: <span class="price">${{ number_format(app('App\Http\Controllers\CartController')->calculateSubtotal(session('cart', [])) ?? 0, 2) }}</span></span>
        </div>
        <div class="buttons">
            <a href="{{ route('cart.index') }}" class="btn">checkout</a>
            <a href="{{ route('cart.index') }}" class="btn view-cart">view cart</a>
        </div>
    </div>
</div>
