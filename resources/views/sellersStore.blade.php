<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>XStore</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.5">
	@include ('csslinks')
</head>
<body>


<main id="panel" class="panel">
	@include ('navbar')
	<div class="breadcrumbs">
		<div class="container">
			<div class="row">
				<div class="col-md-12 text-center">
					<ul>
						<li><a href="index.html">Home</a></li>
						<li><i class="fa fa-angle-right"></i></li>
						<li><a href="#">Shop</a></li>
					</ul>
					<h2>Seller Stores</h2> 
				</div>
			</div>
		</div>
	</div><!--breadcrumbs-->
	<div class="container">
		<div class="content-products">
			<div class="row">
				<div class="col-md-3 hidden-xs">
					<div class="sidebar">
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
							<span class="btn">Search</span>
						</div><!--filters-btn-->
						<div class="filters-sorting">
							<div class="trigger">Default sorting</div>
							<ul class="options">
								<li>Sort by popularity</li>
								<li>Sort by average rating</li>
								<li>Sort by new</li>
							</ul>
						</div><!--filters-sorting-->
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
                    $path = "assets/storeImages/";
                    ?>
                    @foreach ($stores as $store)
                        <div class="col-md-4 col-sm-6 col-xs-6">
                            <div class="product type-hover-1">
                                <div class="mask-product">
                                    
                                        
                                            <img src="{{ asset($path . $store->storeLogo) }}" alt="Store Image">
                                        
                                    
                                    
                                        
                                    <span class="wishlist"><a href="#"><i class="fa fa-heart-o" aria-hidden="true"></i></a></span>
                                </div><!--mask-product-->
                                <div class="product-details">
                                    <h6 class="products-cats"><a href="{{ route('stores.show', $store->storeId) }}">{{ $store->storeName }}</a></h6>
                                    <h3 class="product-title"><a href="{{ route('stores.show', $store->storeId) }}">{{ $store->brandName }}</a></h3>
                                    
                                    <div class="add-to-cart"><a href="{{ route('stores.show', $store->storeId) }}">Open Store</a></div>
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
