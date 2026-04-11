<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ $category->categoryName }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.5">
    @include ('csslinks')
</head>
<body>
<main id="panel" class="panel">
    <div class="container-fluid">
        @include ('navbar')
    </div>

    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <ul>
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li><i class="fa fa-angle-right"></i></li>
                        <li><a href="#">Category</a></li>
                    </ul>
                    <h2>{{ $category->categoryName }}</h2>
                    @if(!empty($category->categoryDesc))
                        <p>{{ $category->categoryDesc }}</p>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="content-products">
            <div class="row">
                @forelse($products as $product)
                    <div class="col-md-4 col-sm-6 col-xs-6">
                        <div class="product type-hover-1">
                            <div class="mask-product">
                                <img
                                    src="{{ $product->imageName ? asset('assets/productImages/' . $product->imageName) : 'http://placehold.it/260x350' }}"
                                    alt="{{ $product->productName }}"
                                >
                            </div>
                            <div class="product-details">
                                <h6 class="products-cats">
                                    <a href="{{ route('stores.show', $product->storeId) }}">{{ $product->storeName }}</a>
                                </h6>
                                <h3 class="product-title">
                                    <a href="{{ route('products.show', $product->productId) }}">{{ $product->productName }}</a>
                                </h3>
                                @if(!empty($product->brandName))
                                    <p>{{ $product->brandName }}</p>
                                @endif
                                <div class="price">${{ number_format($product->price, 2) }}</div>
                                <div class="add-to-cart">
                                    <a href="{{ route('stores.show', $product->storeId) }}">Visit Store</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-md-12 text-center">
                        <p>No approved products were found in this category yet.</p>
                        <a href="{{ route('home') }}" class="btn">Back to home</a>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</main>
@include ('jslinks')
</body>
</html>
