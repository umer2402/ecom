<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Checkout</title>
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

    <div class="container-fluid">
        <div class="row">
            <div class="col-12 text-center">
                <h2 class="mb-4 h2">Billing Details</h2>
            </div>
        </div>
    </div>

    <div class="container py-5">
        @if(!empty($cartItems))
            <form method="post" action="{{ route('checkout.place') }}">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="fullname" class="form-label">Full Name</label>
                            <input type="text" name="fullname" id="fullname" required class="form-control" value="{{ old('fullname', $user->name ?? '') }}">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email Address</label>
                            <input type="email" name="email" id="email" required class="form-control" value="{{ old('email', $user->email ?? '') }}">
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone Number</label>
                            <input type="text" name="phone" id="phone" required class="form-control" value="{{ old('phone') }}">
                        </div>
                        <div class="mb-3">
                            <label for="address" class="form-label">Shipping Address</label>
                            <textarea name="address" id="address" rows="4" required class="form-control">{{ old('address') }}</textarea>
                        </div>
                        @if($errors->any())
                            <div class="alert alert-danger">
                                <ul style="margin-bottom:0;">
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>

                    <div class="col-md-6">
                        <h4>Your Order</h4>
                        <ul class="list-group mb-3">
                            @foreach($cartItems as $item)
                                <li class="list-group-item d-flex justify-content-between">
                                    <div>
                                        {{ $item['name'] ?? 'Product' }} x {{ $item['quantity'] ?? 1 }}
                                    </div>
                                    <span>${{ number_format(($item['price'] ?? 0) * ($item['quantity'] ?? 1), 2) }}</span>
                                </li>
                            @endforeach
                            <li class="list-group-item d-flex justify-content-between">
                                <strong>Total</strong>
                                <strong>${{ number_format($subtotal, 2) }}</strong>
                            </li>
                        </ul>
                        <button type="submit" class="btn btn-success w-100">Place Order</button>
                    </div>
                </div>
            </form>
        @else
            <div class="alert alert-warning">Your cart is empty. <a href="{{ route('home') }}">Continue shopping</a></div>
        @endif
    </div>
</main>
@include('footer')
@include('jslinks')
@include('cartjs')
</body>
</html>
