<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Your Cart</title>
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
                        <li><a href="#">Cart</a></li>
                    </ul>
                    <h2>Your Cart</h2>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="content-products">
            @if(empty($cartItems))
                <div class="row">
                    <div class="col-md-12 text-center">
                        <p>Your cart is empty.</p>
                        <a href="{{ route('stores.index') }}" class="btn">Browse Stores</a>
                    </div>
                </div>
            @else
                <div class="row">
                    <div class="col-md-8">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Store</th>
                                    <th>Price</th>
                                    <th>Qty</th>
                                    <th>Total</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($cartItems as $productId => $item)
                                    @php
                                        $product = $products[$productId] ?? null;
                                    @endphp
                                    @if($product)
                                        <tr>
                                            <td>
                                                <a href="{{ route('products.show', $productId) }}">{{ $product->productName }}</a>
                                            </td>
                                            <td>{{ $product->storeName ?: ($item['store_name'] ?? 'Unknown store') }}</td>
                                            <td>${{ number_format($product->price, 2) }}</td>
                                            <td>{{ $item['quantity'] }}</td>
                                            <td>${{ number_format($product->price * $item['quantity'], 2) }}</td>
                                            <td>
                                                <a href="#" class="remove-item" data-product-id="{{ $productId }}">Remove</a>
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-4">
                        <div class="widget-banner">
                            <div class="banner">
                                <div class="inside" style="padding: 30px;">
                                    <h3>Order Summary</h3>
                                    <p>Products from {{ count(array_unique(array_filter(array_column($cartItems, 'store_id')))) }} store(s)</p>
                                    <p><strong>Subtotal:</strong> ${{ number_format($subtotal, 2) }}</p>
                                    <p>This cart is marketplace-ready and can hold items from multiple sellers.</p>
                                    <a href="{{ route('stores.index') }}" class="btn">Continue Shopping</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
</main>
@include ('jslinks')
@include ('cartjs')
</body>
</html>
