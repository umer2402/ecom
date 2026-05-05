<footer id="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-6 col-xs-12">
                <img src="{{ asset('assets/images/logo-footer.png') }}" class="logo-footer" alt="logo-footer">
                <p>Pakistan's multi-store wholesale marketplace connecting buyers with verified sellers.</p>
                <address>
                    <ul>
                        <li>Hello Wholesaler Marketplace</li>
                        <li>Secure ordering and verified suppliers</li>
                        <li>Email: <a href="{{ route('user.login') }}" class="active-color">Customer account</a></li>
                        <li>Drop Shipper: <a href="{{ route('dropshipper.login') }}" class="active-color">Dropshipper portal</a></li>
                        <li>Seller Panel: <a href="{{ url('/seller') }}" class="active-color">Become a Seller</a></li>
                    </ul>
                </address>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="widget-links">
                    <h3 class="title-widget">Useful Links</h3>
                    <ul class="first">
                        <li><a href="{{ route('home') }}">Home Page</a></li>
                        <li><a href="{{ route('stores.index') }}">Sellers</a></li>
                        <li><a href="{{ route('cart.index') }}">Cart</a></li>
                        <li><a href="{{ route('checkout.index') }}">Checkout</a></li>
                        <li><a href="{{ route('orders.index') }}">My Orders</a></li>
                        <li><a href="{{ route('user.login') }}">My Account</a></li>
                        <li><a href="{{ route('dropshipper.login') }}">Drop Shipper Login</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="widget-latest-posts">
                    <h3 class="title-widget">Marketplace Notes</h3>
                    <ul>
                        <li>
                            <div class="blog-details">
                                <h2><a href="{{ route('stores.index') }}">Browse verified stores</a></h2>
                                <div class="meta-post">
                                    <time><i class="fa fa-check-circle" aria-hidden="true"></i> Approved suppliers</time>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="blog-details">
                                <h2><a href="{{ route('cart.index') }}">Manage mixed-store carts</a></h2>
                                <div class="meta-post">
                                    <time><i class="fa fa-shopping-cart" aria-hidden="true"></i> Marketplace-ready cart</time>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="blog-details">
                                <h2><a href="{{ route('orders.index') }}">Track order history</a></h2>
                                <div class="meta-post">
                                    <time><i class="fa fa-list-alt" aria-hidden="true"></i> Buyer account history</time>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="widget-tags">
                    <h3 class="title-widget">Marketplace Tags</h3>
                    <a href="{{ route('stores.index') }}">Wholesale</a>
                    <a href="{{ route('stores.index') }}">Retail</a>
                    <a href="{{ route('stores.index') }}">Suppliers</a>
                    <a href="{{ route('stores.index') }}">B2B</a>
                    <a href="{{ route('stores.index') }}">Categories</a>
                    <a href="{{ route('stores.index') }}">Bulk Orders</a>
                </div>
            </div>
        </div>
    </div>
</footer>
<div class="copyright">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <p class="pull-left">&copy; {{ now()->year }} Hello Wholesaler.</p>
            </div>
            <div class="col-md-6">
                <span class="pull-right">Multi-store ecommerce marketplace</span>
            </div>
        </div>
    </div>
</div>
