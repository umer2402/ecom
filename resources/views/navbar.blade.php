@php
    $cartItems = session('cart', []);
    $cartCount = array_sum(array_column($cartItems, 'quantity'));
    $subtotal = 0;

    foreach ($cartItems as $item) {
        $subtotal += ($item['price'] ?? 0) * ($item['quantity'] ?? 0);
    }
@endphp

<div class="header">
    <div class="header-logo">
        <a href="{{ route('home') }}"><img src="{{ asset('assets/images/logo.png') }}" alt="logo"></a>
    </div>
    <div class="menu">
        <menu>
            <li class="menu-parent-item"><a href="{{ route('home') }}">Home</a></li>
            <li><a href="{{ route('stores.index') }}">Sellers</a></li>
            <li><a href="{{ route('cart.index') }}">Cart</a></li>
            <li><a href="{{ route('orders.index') }}">My Orders</a></li>
            @auth
                <li>
                    <form action="{{ route('logout') }}" method="post" style="display:inline;">
                        @csrf
                        <button type="submit" style="background:none;border:none;padding:0;color:inherit;">Logout</button>
                    </form>
                </li>
            @else
                <li><a href="{{ route('user.login') }}">Login</a></li>
            @endauth
            <li><a href="{{ url('/seller') }}">Become a Seller</a></li>
        </menu>
    </div>
    <div class="navbar-right">
        <div class="inside">
            <div class="header-search">
                <a href="#" class="search-btn"><i class="fa fa-search"></i></a>
                <form action="{{ route('stores.index') }}" method="get">
                    <input type="text" value="" placeholder="Search stores or products..." autocomplete="off" name="s">
                </form>
                <i class="close-search">x</i>
            </div>
            <div class="wishlist">
                <a href="{{ route('orders.index') }}"><i class="fa fa-user" aria-hidden="true"></i></a>
            </div>
            <div class="shopping-cart">
                <a href="#" class="cart-toggle">
                    <span class="cart-bag">
                        <i class="bag"></i>
                        @if($cartCount > 0)
                            <span class="cart-count">{{ $cartCount }}</span>
                        @endif
                    </span>
                    <span class="total">${{ number_format($subtotal, 2) }}</span>
                </a>
                <div class="cart-popup-container">
                    <p>Recently added item(s)</p>
                    <ul>
                        @forelse($cartItems as $productId => $item)
                            <li>
                                <a href="{{ route('products.show', $productId) }}" class="pull-left">
                                    <img src="{{ asset('assets/productImages/' . $item['image']) }}" alt="{{ $item['name'] }}" width="60" height="80">
                                </a>
                                <h4><a href="{{ route('products.show', $productId) }}">{{ $item['name'] }}</a></h4>
                                @if(!empty($item['store_name']))
                                    <span class="category">{{ $item['store_name'] }}</span>
                                @endif
                                <span class="price">{{ $item['quantity'] }} x ${{ number_format($item['price'], 2) }}</span>
                                <a href="#" class="remove" data-product-id="{{ $productId }}">x</a>
                            </li>
                        @empty
                            <li>Your cart is empty</li>
                        @endforelse
                    </ul>
                    <div class="cart-subtotal">
                        <span>cart sub-total: <span class="price">${{ number_format($subtotal, 2) }}</span></span>
                    </div>
                    <div class="buttons">
                        <a href="{{ route('checkout.index') }}" class="btn">checkout</a>
                        <a href="{{ route('cart.index') }}" class="btn view-cart">view cart</a>
                    </div>
                    <center><a href="{{ route('orders.index') }}" class="w-100"><button class="btn btn-primary">Orders History</button></a></center>
                </div>
            </div>
            <button class="btn-hamburger js-slideout-toggle">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
    </div>
</div>
