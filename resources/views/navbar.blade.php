<?php 
    $path = "assets/productImages/";
?>
<div class="header">
	<div class="header-logo">
		<a href="{{ route('home') }}"><img src="{{ asset('assets/images/logo.png') }}" alt="logo"></a>
	</div><!--header-logo-->
	<div class="menu">
		<menu>
			<li class="active menu-parent-item"><a href="{{ route('home') }}">Home</a></li>
			<li><a href="{{ route('stores.index') }}">Sellers</a></li>
			<li class="menu-parent-item">
				<a href="shop.html">Shop</a>
				<div class="nav-sublist-dropdown columns-3">
					<ul>
						<li><a href="#" class="title">Shop Layouts</a></li>
						<li><a href="without-sidebar.html">Without sidebar</a></li>
						<li><a href="right-sidebar.html">Right Sidebar</a></li>
						<li><a href="shop.html">Shop Slideshow</a></li>
						<li><a href="full-width-grid.html">Full Width Grid</a></li>
						<li><a href="columns-2.html">2 columns</a></li>
						<li><a href="shop.html">3 columns<span class="label-text sale">sale</span></a></li>
						<li><a href="columns-4.html">4 columns</a></li>
						<li><a href="columns-5.html">5 columns</a></li>
						<li><a href="columns-6.html">6 columns</a></li>
					</ul>
					<ul>
						<li><a href="#" class="title">Shop Styles</a></li>
						<li><a href="catalog-mode.html">Catalog Mode<span class="label-text hot">hot</span></a></li>
						<li><a href="product-hover-1.html">Product Hover 1<span class="label-text new">new</span></a></li>
						<li><a href="catalog-mode.html">Product Hover 2 light</a></li>
						<li><a href="product-hover-2-dark.html">Product Hover 2 Dark</a></li>
						<li><a href="product-hover-3-light.html">Product Hover 3 Light</a></li>
						<li><a href="product-hover-3-dark.html">Product Hover 3 Dark</a></li>
						<li><a href="product-hover-4-light.html">Product Hover 4 Light</a></li>
						<li><a href="product-hover-4-dark.html">Product Hover 4 Dark</a></li>
					</ul>
					<ul>
						<li><a href="#" class="title">Product Page Layouts</a></li>
						<li><a href="infinite-scroll.html">Infinite Scroll<span class="label-text new">new</span></a></li>
						<li><a href="default-tabs.html">Default tabs design</a></li>
						<li><a href="left-side-tabs.html">Left side tabs</a></li>
						<li><a href="accordion-style-tabs.html">Accordion style tabs</a></li>
						<li><a href="my-account.html">My Account</a></li>
						<li><a href="track-order.html">Track order</a></li>
						<li><a href="cart.html">Cart Page</a></li>
						<li><a href="wishlist.html">Wishlist</a></li>
					</ul>
					<div class="images">
						<div class="col">
							<a href="#"><img src="http://placehold.it/400x215" alt="menu-banner"></a>
						</div>
						<div class="col">
							<a href="#"><img src="http://placehold.it/400x215" alt="menu-banner"></a>
						</div>
					</div>
				</div>
			</li>
			<li><a href="{{ route('user.login') }}">Login</a></li>
			<li><a href="/seller">Become a Seller</a></li>
		</menu>
	</div><!--menu-->
	<div class="navbar-right">
		<div class="inside">
			<div class="header-search">
				<a href="#" class="search-btn"><i class="fa fa-search"></i></a>
				<form>
					<input type="text" value="" placeholder="Type here..." autocomplete="off" name="s">
				</form>
				<i class="close-search">x</i>
			</div><!--header-search-->
			<div class="wishlist">
				<a href="#"><i class="fa fa-heart-o" aria-hidden="true"></i></a>
			</div><!--wishlist-->
			<div class="shopping-cart">
                <a href="#" class="cart-toggle">
                    <span class="cart-bag">
                        <i class="bag"></i>
                        @php
                            $cartCount = array_sum(array_column(session('cart', []), 'quantity'));
                        @endphp
                        @if($cartCount > 0)
                            <span class="cart-count">{{ $cartCount }}</span>
                        @endif
                    </span>
                    @php
                        $cartItems = session('cart', []);
                        $subtotal = 0;
                        foreach ($cartItems as $item) {
                            $subtotal += $item['price'] * $item['quantity'];
                        }
                    @endphp
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
                    </div><!--cart-subtotal-->
                    <div class="buttons">
                        <a href="{{ route('cart.index') }}" class="btn">checkout</a>
                        <a href="{{ route('cart.index') }}" class="btn view-cart">view cart</a>
                    </div><!--buttons-->
                </div><!--cart-popup-container-->
            </div><!--shopping-cart-->
			<button class="btn-hamburger js-slideout-toggle">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
		</div>
	</div><!--navbar-right-->
</div><!--header-->
