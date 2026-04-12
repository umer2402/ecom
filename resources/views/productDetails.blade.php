<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ $product->productName }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.5">
    @include ('csslinks')
</head>
<body>
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
                        <li><i class="fa fa-angle-right"></i></li>
                        <li><a href="{{ route('stores.show', $product->storeId) }}">{{ $product->storeName }}</a></li>
                        <li><i class="fa fa-angle-right"></i></li>
                        <li><a href="#">{{ $product->productName }}</a></li>
                    </ul>
                    <h2>{{ $product->productName }}</h2>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="content-products">
            <div class="row">
                <div class="col-md-6">
                    @php
                        $primaryImage = $product->images->first();
                    @endphp
                    <div class="product-gallery">
                        <img
                            src="{{ $primaryImage ? asset('assets/productImages/' . $primaryImage->imageName) : 'http://placehold.it/540x700' }}"
                            alt="{{ $product->productName }}"
                            style="width: 100%; max-width: 540px;"
                        >
                    </div>
                    @if($product->images->count() > 1)
                        <div class="row" style="margin-top: 20px;">
                            @foreach($product->images as $image)
                                <div class="col-xs-4 col-sm-3" style="margin-bottom: 15px;">
                                    <img
                                        src="{{ asset('assets/productImages/' . $image->imageName) }}"
                                        alt="{{ $product->productName }}"
                                        style="width: 100%;"
                                    >
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
                <div class="col-md-6">
                    <div class="product-information">
                        <div class="products-cats">
                            <a href="{{ route('stores.show', $product->storeId) }}">{{ $product->storeName }}</a>
                            @if(!empty($product->categoryName))
                                <span> / {{ $product->categoryName }}</span>
                            @endif
                        </div>
                        <h1>{{ $product->productName }}</h1>
                        @if(!empty($product->brandName))
                            <p><strong>Brand:</strong> {{ $product->brandName }}</p>
                        @endif
                        <div class="price" style="font-size: 28px; margin: 20px 0;">
                            ${{ number_format($product->price, 2) }}
                        </div>
                        @if(!empty($product->description))
                            <p>{{ $product->description }}</p>
                        @else
                            <p>This product is available from {{ $product->storeName }} on the Hello Wholesalers marketplace.</p>
                        @endif
                        <div style="margin-top: 25px;">
                            <a href="#" class="btn add-to-cart-btn" data-product-id="{{ $product->productId }}">Add to cart</a>
                            <a href="{{ route('stores.show', $product->storeId) }}" class="btn">Visit store</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@include('footer')
@include ('jslinks')
@include ('cartjs')
</body>
</html>
