<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Your Cart</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.5">
    @include('csslinks')
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
                        <li><a href="{{ route('cart.index') }}">Cart</a></li>
                    </ul>
                    <h2>Products in Cart</h2>
                    <a href="javascript: history.go(-1)" class="back">Return to Previous Page</a>
                </div>
            </div>
        </div>
    </div>

    <div class="container py-5">
        @if(session('status'))
            <div class="alert alert-success">{{ session('status') }}</div>
        @endif

        @if($errors->has('cart'))
            <div class="alert alert-danger">{{ $errors->first('cart') }}</div>
        @endif

        @if(!empty($cartItems))
            <form method="post" action="{{ route('cart.update') }}">
                @csrf
                @method('PATCH')
                <table class="table table-bordered text-center align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>Image</th>
                            <th>Product</th>
                            <th>Store</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Subtotal</th>
                            <th>Remove</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($cartItems as $productId => $item)
                        @php
                            $product = $products[$productId] ?? null;
                            $price = $product->price ?? ($item['price'] ?? 0);
                            $name = $product->productName ?? ($item['name'] ?? 'Product');
                            $storeName = $product->storeName ?? ($item['store_name'] ?? 'Unknown store');
                            $image = $product->imageName ?? ($item['image'] ?? null);
                            $lineTotal = $price * ($item['quantity'] ?? 1);
                        @endphp
                        <tr>
                            <td>
                                @if($image)
                                    <img src="{{ asset('assets/productImages/' . $image) }}" width="70" height="90" alt="{{ $name }}">
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('products.show', $productId) }}">{{ $name }}</a>
                            </td>
                            <td>{{ $storeName }}</td>
                            <td>${{ number_format($price, 2) }}</td>
                            <td style="width:120px;">
                                <input
                                    type="number"
                                    name="quantities[{{ $productId }}]"
                                    value="{{ $item['quantity'] }}"
                                    min="1"
                                    class="form-control"
                                >
                            </td>
                            <td>${{ number_format($lineTotal, 2) }}</td>
                            <td>
                                <a href="#" class="btn btn-danger btn-sm remove-item" data-product-id="{{ $productId }}">Remove</a>
                            </td>
                        </tr>
                    @endforeach
                    <tr class="text-success">
                        <th colspan="5" class="text-center"><b>Total</b></th>
                        <th class="text-center"><b>${{ number_format($subtotal, 2) }}</b></th>
                        <th></th>
                    </tr>
                    </tbody>
                </table>

                <div class="d-flex justify-content-between align-items-center">
                    <button type="submit" class="btn btn-primary">Update Cart</button>
                    <div>
                        <a href="{{ route('stores.index') }}" class="btn btn-default">Continue Shopping</a>
                        <a href="{{ route('checkout.index') }}" class="btn btn-success">Checkout</a>
                    </div>
                </div>
            </form>
        @else
            <div class="alert alert-info">
                Your cart is empty. <a href="{{ route('stores.index') }}">Continue shopping</a>
            </div>
        @endif
    </div>
</main>
@include('footer')
@include('jslinks')
@include('cartjs')
</body>
</html>
