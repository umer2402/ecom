<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Hello Wholesaler</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.5">
    @include('csslinks')
</head>
<body>
@include('userChat')
<main id="panel" class="panel">
    <header id="header">
        @include('topbar')
        <div class="container-fluid">
            @include('navbar')
        </div>
    </header>

    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <ul>
                        <li><a href="{{ route('home') }}">Home</a></li>
                    </ul>
                    <h2>Marketplace Home</h2>
                    <a href="javascript: history.go(-1)" class="back">Return to Previous Page</a>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row icon-text">
            <div class="col-md-4 col-sm-4 inside">
                <figure class="col-md-3">
                    <img src="{{ asset('assets/images/discount-system-icon.png') }}" alt="discount-system-icon">
                </figure>
                <div class="text col-md-9">
                    <h5>Discount System</h5>
                    <p>Buy from multiple approved sellers and compare wholesale pricing in one place.</p>
                </div>
            </div>
            <div class="col-md-4 col-sm-4 inside">
                <figure class="col-md-3">
                    <img src="{{ asset('assets/images/satisfaction-icon.png') }}" alt="satisfaction-icon">
                </figure>
                <div class="text col-md-9">
                    <h5>Verified Sellers</h5>
                    <p>Only approved stores are shown in the marketplace storefront.</p>
                </div>
            </div>
            <div class="col-md-4 col-sm-4 inside">
                <figure class="col-md-3">
                    <img src="{{ asset('assets/images/coupon.png') }}" alt="coupon">
                </figure>
                <div class="text col-md-9">
                    <h5>Order History</h5>
                    <p>Keep buyer checkout, orders, and account history inside Laravel.</p>
                </div>
            </div>
        </div>

        <div class="heading text-center">
            <h4>Browse categories</h4>
            <p>Start with a category, then move into approved products and stores.</p>
        </div>

        <div class="products-loop products-grid row" style="margin-bottom: 50px;">
            @foreach($categories as $category)
                <div class="col-md-3 col-sm-6 col-xs-6">
                    <div class="product type-hover-1">
                        <div class="mask-product">
                            @if(!empty($category->categoryImg))
                                <img src="{{ asset($category->categoryImg) }}" alt="{{ $category->categoryName }}">
                            @else
                                <img src="http://placehold.it/260x350" alt="{{ $category->categoryName }}">
                            @endif
                        </div>
                        <div class="product-details">
                            <h3 class="product-title">
                                <a href="{{ route('categories.show', $category->categoryId) }}">{{ $category->categoryName }}</a>
                            </h3>
                            <div class="add-to-cart">
                                <a href="{{ route('categories.show', $category->categoryId) }}">Open Category</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="heading text-center">
            <h4>Recent products</h4>
            <p>Latest approved listings from your multi-store marketplace.</p>
        </div>

        <div class="products-loop products-grid row">
            @foreach($recent_products as $product)
                <div class="col-md-3 col-sm-6 col-xs-6">
                    <div class="product type-hover-1">
                        <div class="mask-product">
                            <img src="{{ $product->imageName ? asset('assets/productImages/' . $product->imageName) : 'http://placehold.it/260x350' }}" alt="{{ $product->productName }}">
                            <span class="wishlist"><a href="{{ route('products.show', $product->productId) }}"><i class="fa fa-eye" aria-hidden="true"></i></a></span>
                        </div>
                        <div class="product-details">
                            <h6 class="products-cats"><a href="#">{{ $product->categoryName }}</a></h6>
                            <h3 class="product-title"><a href="{{ route('products.show', $product->productId) }}">{{ $product->productName }}</a></h3>
                            <div class="price">${{ number_format($product->price, 2) }}</div>
                            <div class="add-to-cart">
                                <a href="#" class="add-to-cart-btn" data-product-id="{{ $product->productId }}">Add to cart</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</main>
@include('footer')
@include('jslinks')
@include('cartjs')
</body>
</html>
