<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>XStore</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.5">
	@include ('csslinks')
</head>
<body>

@include ('userChat')
<main id="panel" class="panel">
	<header id="header">
		<div class="top-panel-container">
			<div class="container">
				<h3>Our stores</h3>
				<div class="row">
					<div class="col-md-4">
						<a href="#"><img src="http://placehold.it/360x200" alt="map"></a>
					</div>
					<div class="col-md-5">
						<div class="text">
							<h2><a href="#" class="active-color">X</a>Store makes e-commerce easy</h2>
							<p>This elegant and intuitive theme is carefully developed and includes that set of pages, tools and settings that will help you create a professional looking and trustworthy online shop.</p>
							<ul class="social-icon">
								<li><a href="https://www.facebook.com/8theme/" class="follow-facebook" target="_blank"><i class="fa fa-facebook"></i></a></li>
								<li><a href="https://twitter.com/8theme" class="follow-twitter" target="_blank"><i class="fa fa-twitter"></i></a></li>
								<li><a href="https://www.instagram.com/8theme_ltd/" class="follow-instagram" target="_blank"><i class="fa fa-instagram"></i></a></li>
								<li><a href="https://plus.google.com/+8theme/posts" class="follow-google" target="_blank"><i class="fa fa-google"></i></a></li>
								<li><a href="https://www.youtube.com/user/8theme/feed" class="follow-youtube" target="_blank"><i class="fa fa-youtube"></i></a></li>
							</ul>
						</div>
					</div>
					<div class="col-md-3">
						<address>
							<ul>
								<li class="first">Store address</li>
								<li>48 Park Avenue,</li>
								<li>East 21st Street, Apt. 304</li>
								<li class="last">contact info</li>
								<li>New York NY 10016</li>
								<li>Email: <a href="#" class="active-color">youremail@site.com</a></li>
								<li>Phone: <a href="#" class="active-color">+1 408 996 1010</a></li>
							</ul>
						</address>
					</div>
				</div>
				<div class="close-panel">&nbsp;</div>
			</div>
		</div><!--top-panel-container-->
		<div class="top-bar">
			<div class="languages-area">
				<div class="languages">
					<span>English</span>
					<ul>
						<li>English</li>
						<li>Arabic</li>
						<li>Hebrew</li>
						<li>English</li>
					</ul>
				</div><!--languages-->
				<div class="currencies">
					<span>USD/$</span>
					<ul>
						<li>EUR/€</li>
						<li>GBP/£</li>
						<li>EUR/€</li>
						<li>GBP/£</li>
					</ul>
				</div><!--currencies-->
				<div class="text-top">
					<p>Order online or call us <a href="#" class="active-color">(+1800) 000 8808</a></p>
				</div>
			</div><!--languages-area-->
			<div class="top-panel-open">
				<span>Open panel</span>
			</div><!--top-panel-open-->
			<div class="top-links">
				<div class="login-link">
					<a href="my-account.html">Sign In <b>or</b> Create an account</a>
				</div><!--login-link-->
				<ul class="social-icon">
					<li><a href="https://www.facebook.com/8theme/" class="follow-facebook" target="_blank"><i class="fa fa-facebook"></i></a></li>
					<li><a href="https://twitter.com/8theme" class="follow-twitter" target="_blank"><i class="fa fa-twitter"></i></a></li>
					<li><a href="https://www.instagram.com/8theme_ltd/" class="follow-instagram" target="_blank"><i class="fa fa-instagram"></i></a></li>
					<li><a href="https://plus.google.com/+8theme/posts" class="follow-google" target="_blank"><i class="fa fa-google"></i></a></li>
					<li><a href="https://www.youtube.com/user/8theme/feed" class="follow-youtube" target="_blank"><i class="fa fa-youtube"></i></a></li>
				</ul><!--social-icon-->
			</div><!--top-links-->
		</div><!--top-bar-->
		<div class="container-fluid fixed-header">
    		@include ('navbar')
		</div>
	</header>
	<div class="breadcrumbs">
		<div class="container">
			<div class="row">
				<div class="col-md-12 text-center">
					<ul>
						<li><a href="index.html">Home</a></li>
						<li><i class="fa fa-angle-right"></i></li>
						<li><a href="#">Shop</a></li>
					</ul>
					<h2>{{ $store->storeName }}</h2> 
				</div>
			</div>
		</div>
	</div><!--breadcrumbs-->
	<div class="container">
		<div class="content-products">
			<div class="row">
				<div class="col-md-3 hidden-xs">
					<div class="sidebar">
					<h4 class="widget-title first">Categories</h4>
						<div class="widget-product-categories">
							<ul>
							    @foreach($categories as $cats)
								<li>
									<a href="#">{{ $cats->categoryName }}</a>
								</li>
								@endforeach
								<!--<li class="cat-parent">-->
								<!--	<a href="#">Woman<div class="open">+</div></a>-->
								<!--	<ul class="children">-->
								<!--		<li>-->
								<!--			<a href="#">Blouses</a>-->
								<!--		</li>-->
								<!--		<li>-->
								<!--			<a href="#">Dresses</a>-->
								<!--		</li>-->
								<!--		<li>-->
								<!--			<a href="#">Sweatshirts</a>-->
								<!--		</li>-->
								<!--	</ul>-->
								<!--</li>-->
							</ul>
						</div><!--product-categories-->
						<div class="widget-price-filter">
							<h4 class="widget-title">Filter by price</h4>
							<div id="slider-range"></div>
							<p>
								<label for="amount">Price:</label>
								<input type="text" id="amount" readonly>
								<span class="btn">Filter</span>
							</p>
						</div><!--widget-price-filter-->
						<div class="widget-layered-nav">
							<h4 class="widget-title">Filter by color</h4>
							<ul>
								<li><a href="#">Black</a><span>(4)</span></li>
								<li><a href="#">Blue</a><span>(3)</span></li>
								<li><a href="#">Green</a><span>(4)</span></li>
								<li><a href="#">Gold</a><span>(4)</span></li>
								<li><a href="#">Grey</a><span>(3)</span></li>
								<li><a href="#">Red</a><span>(4)</span></li>
							</ul>
						</div><!--widget-layered-nav-->
						<div class="widget-brands">
							<h4 class="widget-title">Brands Filter</h4>
							<ul>
							    @foreach($allStores as $storeBrand)
								<li><a href="#">{{ $storeBrand->brandName }}</a></li>
								@endforeach
							</ul>
						</div><!--widget-brands-->
						<div class="widget-banner">
							<div class="banner">
								<div class="inside">
									<img src="http://placehold.it/260x340" alt="shop-banner">
									<div class="banner-content">
										<h3>Accessories</h3>
										<h2>Example Title</h2>
										<p>Door sit amet, consectetur adip iscing elit, sed do ore.</p>
										<a href="#" class="btn">View more</a>
									</div>
								</div>
							</div>
						</div><!--widget-banner-->
					</div><!--sidebar-->
				</div>
				<div class="col-md-9">
					<div class="filter-wrap">
						<div class="filters-btn">
							<span class="btn">Filters</span>
						</div><!--filters-btn-->
						<div class="filters-sorting">
							<div class="trigger">Default sorting</div>
							<ul class="options">
								<li>Sort by popularity</li>
								<li>Sort by average rating</li>
								<li>Sort by newness</li>
								<li>Sort by price: low to high</li>
								<li>Sort by price: high to low</li>
							</ul>
						</div><!--filters-sorting-->
						<div class="view-switcher hidden-tablet hidden-phone">
							<ul>
								<li class="switch-grid switcher-active"><i class="fa fa-th" aria-hidden="true"></i></li>
								<li class="switch-list"><i class="fa fa-th-list" aria-hidden="true"></i></li>
							</ul>
						</div><!--view-switcher-->
						<div class="products-per-page">
							<span>Show</span>
							<div class="trigger">9</div>
							<ul class="options">
								<li>12</li>
								<li>24</li>
								<li>36</li>
								<li>1</li>
								<li>5</li>
							</ul>
							<span>Per page</span>
						</div><!--products-per-page-->
						<div class="pagination">
							<ul>
								<li class="active">1</li>
								<li>2</li>
								<li><span class="page-numbers dots">…</span></li>
								<li>3</li>
								<li><a href="#" class="next"><i class="fa fa-angle-double-right"></i></a></li>
							</ul>
						</div><!--pagination-->
					</div><!--filter-wrap-->
					<div class="shop-filters-area">
						<div class="widget-product-categories">
						<h4 class="widget-title">Product Categories</h4>
							<ul>
								<li><a href="#">Bags</a></li>
								<li><a href="#">Woman</a></li>
								<li><a href="#">Accessories</a></li>
								<li><a href="#">Man</a></li>
								<li><a href="#">Handbags</a></li>
								<li><a href="#">Jackets</a></li>
								<li><a href="#">Shoes</a></li>
							</ul>
						</div><!--product-categories-->
						<div class="widget-layered-nav">
							<h4 class="widget-title">Filter by color</h4>
							<ul>
								<li><a href="#">Black</a><span>(4)</span></li>
								<li><a href="#">Blue</a><span>(3)</span></li>
								<li><a href="#">Green</a><span>(4)</span></li>
								<li><a href="#">Gold</a><span>(4)</span></li>
								<li><a href="#">Grey</a><span>(3)</span></li>
								<li><a href="#">Red</a><span>(4)</span></li>
							</ul>
						</div><!--widget-layered-nav-->
						<div class="widget-search">
							<h4 class="widget-title">Search</h4>
							<form action="">
								<input type="text" name="s" class="form-control" placeholder="Search...">
								<button type="submit" class="btn medium-btn btn-black">Search<i class="fa fa-search"></i></button>
							</form>
						</div><!--widget-search-->
					</div><!--shop-filters-area-->
					<div class="products-loop products-grid row">
                    <?php 
                    $path = "assets/productImages/";
                    ?>
                    @foreach ($products as $product)
                        <div class="col-md-4 col-sm-6 col-xs-6">
                            <div class="product type-hover-1">
                                <div class="mask-product">
                                    @if($product->images->count() > 0)
                                        
                                        <img src="{{ asset($path . $product->images[0]->imageName) }}" alt="Product Image">
                                        
                                        <img class="image-swap" 
                                             src="{{ asset($path . ($product->images->count() > 1 ? $product->images[1]->imageName : $product->images[0]->imageName)) }}" 
                                             alt="Alternate Image">
                                    @else
                                        <img src="http://placehold.it/260x350" alt="Placeholder Image">
                                        <img class="image-swap" src="http://placehold.it/260x350" alt="Placeholder Image">
                                    @endif
                                    <span class="wishlist"><a href="#"><i class="fa fa-heart-o" aria-hidden="true"></i></a></span>
                                </div><!--mask-product-->
                                <div class="product-details">
                                    <h6 class="products-cats"><a href="#">{{ $product->cat->categoryName }}</a></h6>
                                    <h3 class="product-title"><a href="{{ route('products.show', $product->productId) }}">{{ $product->productName }}</a></h3>
                                    <div class="price">${{ number_format($product->price, 2) }}</div>
                                    <div class="add-to-cart">
                                        <a href="#" class="add-to-cart-btn" data-product-id="{{ $product->productId }}">Add to cart</a>
                                    </div>
                                </div><!--product-details-->
                            </div>
                        </div>
                    @endforeach
                </div><!--products-loop products-grid-->


					<div class="pagination bottom">
						<p class="pull-left">Showing 1–9 of 30 results</p>
						<ul class="pull-right">
							<li class="active">1</li>
							<li>2</li>
							<li><span class="page-numbers dots">…</span></li>
							<li>3</li>
							<li><a href="#" class="next"><i class="fa fa-angle-double-right"></i></a></li>
						</ul>
					</div><!--pagination bottom-->
					<div class="row icon-text type-3">
						<div class="col-md-6 col-sm-6">
							<div class="inside">
								<figure>
									<i class="fa fa-globe"></i>
								</figure>
								<div class="text">
									<h3>Worldwide delivery</h3>
									<p>This is a custom block where you can place any information you need to showcase.</p>
								</div><!--text-->
							</div>
						</div>
						<div class="col-md-6 col-sm-6">
							<div class="inside">
								<figure>
									<i class="fa fa-truck"></i>
								</figure>
								<div class="text">
									<h3>Free shipping</h3>
									<p>This is a custom block where you can place any information you need to showcase.</p>
								</div><!--text-->
							</div>
						</div>
					</div>
				</div>
			</div>
		</div><!--content-products-->
	</div>
	<footer id="footer">
		<div class="container">
			<div class="row">
				<div class="col-md-3 col-sm-6 col-xs-12">
					<img src={{ asset('assets/images/logo-footer.png') }} class="logo-footer" alt="logo-footer">
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
					<address>
					<ul>
						<li>48 Park Avenue,</li>
						<li>East 21st Street, Apt. 304</li>
						<li>New York NY 10016</li>
						<li>Email: <a href="#" class="active-color">youremail@site.com</a></li>
						<li>Phone: <a href="#" class="active-color">+1 408 996 1010</a></li>
					</ul>
					</address>
				</div>
				<div class="col-md-3 col-sm-6 col-xs-12">
					<div class="widget-links">
						<h3 class="title-widget">Useful Links</h3>
						<ul class="first">
							<li><a href="#">Home Page</a></li>
							<li><a href="#">About Us</a></li>
							<li><a href="#">Delivery Info</a></li>
							<li><a href="#">Conditions</a></li>
							<li><a href="#">Order Tracking</a></li>
							<li><a href="#">My Account</a></li>
							<li><a href="#">My Wishlist</a></li>
						</ul>
						<ul>
							<li><a href="#">San Fransisco</a></li>
							<li><a href="#">New Orlean</a></li>
							<li><a href="#">Seatle</a></li>
							<li><a href="#">Portland</a></li>
							<li><a href="#">Stockholm</a></li>
							<li><a href="#">Hoffenheim</a></li>
						</ul>
					</div><!--widget-links-->
				</div>
				<div class="col-md-3 col-sm-6 col-xs-12">
					<div class="widget-latest-posts">
						<h3 class="title-widget">Latest posts</h3>
						<ul>
							<li>
								<a href="#" class="pull-left"><img src="http://placehold.it/40x40" alt="latest-footer"></a>
								<div class="blog-details">
									<h2><a href="#">Corsectetur alequet</a></h2>
									<div class="meta-post">
										<time><i class="fa fa-calendar" aria-hidden="true"></i>November 29, 2016</time>
										<a href="#" class="post-comments"><i class="fa fa-comment" aria-hidden="true"></i>5 comments</a>
									</div>
								</div>
							</li>
							<li>
								<a href="#" class="pull-left"><img src="http://placehold.it/40x40" alt="latest-footer"></a>
								<div class="blog-details">
									<h2><a href="#">Corsectetur alequet</a></h2>
									<div class="meta-post">
										<time><i class="fa fa-calendar" aria-hidden="true"></i>November 29, 2016</time>
										<a href="#" class="post-comments"><i class="fa fa-comment" aria-hidden="true"></i>0 comments</a>
									</div>
								</div>
							</li>
							<li>
								<a href="#" class="pull-left"><img src="http://placehold.it/40x40" alt="latest-footer"></a>
								<div class="blog-details">
									<h2><a href="#">Corsectetur alequet</a></h2>
									<div class="meta-post">
										<time><i class="fa fa-calendar" aria-hidden="true"></i>November 29, 2016</time>
										<a href="#" class="post-comments"><i class="fa fa-comment" aria-hidden="true"></i>5 comments</a>
									</div>
								</div>
							</li>
						</ul>
					</div><!--widget-latest-posts-->
				</div>
				<div class="col-md-3 col-sm-6 col-xs-12">
					<div class="widget-tags">
						<h3 class="title-widget">Product Tags</h3>
						<a href="#">Illegal</a>
						<a href="#">Accessories</a>
						<a href="#">Sale</a>
						<a href="#">Jeans</a>
						<a href="#">Fashion</a>
						<a href="#">Illegal</a>
						<a href="#">Accessories</a>
						<a href="#">Sale</a>
						<a href="#">Jeans</a>
						<a href="#">Fashion</a>
						<a href="#">Accessories</a>
					</div><!--widget-tags-->
				</div>
			</div>
		</div>
	</footer>
<div class="copyright">
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<p class="pull-left">© Created by <a href="#">8theme</a> - Power Elite ThemeForest Author.</p>
			</div>
			<div class="col-md-6">
				<a href="#" class="pull-right"><img src={{ asset('assets/images/payments.png') }} alt="payments"></a>
			</div>
		</div>
	</div>
</div>
</main>
<div class="footer-instagram">
	<div class="instagram-slider">
		<div class="item">
			<img src="http://placehold.it/300x300" alt="insta">
		</div>
		<div class="item">
			<img src="http://placehold.it/300x300" alt="insta">
		</div>
		<div class="item">
			<img src="http://placehold.it/300x300" alt="insta">
		</div>
		<div class="item">
			<img src="http://placehold.it/300x300" alt="insta">
		</div>
		<div class="item">
			<img src="http://placehold.it/300x300" alt="insta">
		</div>
		<div class="item">
			<img src="http://placehold.it/300x300" alt="insta">
		</div>
		<div class="item">
			<img src="http://placehold.it/300x300" alt="insta">
		</div>
		<div class="item">
			<img src="http://placehold.it/300x300" alt="insta">
		</div>
		<div class="item">
			<img src="http://placehold.it/300x300" alt="insta">
		</div>
		<div class="item">
			<img src="http://placehold.it/300x300" alt="insta">
		</div>
		<div class="item">
			<img src="http://placehold.it/300x300" alt="insta">
		</div>
		<div class="item">
			<img src="http://placehold.it/300x300" alt="insta">
		</div>
	</div>
	<a href="#" class="btn">Follow <span>@8theme</span></a>
</div>
<div class="popup">
	<div class="inside">
		<h5>sign up today for a</h5>
		<h3>60% off coupon</h3>
		<p>Get <a href="#" class="active-color">5% reward</a> on future orders</p>
		<input type="email" name="EMAIL" placeholder="Your email address" required="">
		<p class="last">*Don’t worry, we won’t spam our <a href="#" class="active-color">customers mailboxes</a></p>
	</div>
	<i class="close">x</i>
</div>
@include ('jslinks')
</body>
</html>
