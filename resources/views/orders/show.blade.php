<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Order #{{ $order->id }}</title>
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

    <div class="container my-5">
    <div class="text-center d-print-none" style="margin-bottom: 20px;">
        <button class="btn btn-primary btn-lg" onclick="window.print()">Print Invoice</button>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="text-center">
        <h1 class="text-success">Thank You!</h1>
        <p>Your order has been placed successfully.</p>
        <h4>Order ID: #{{ $order->id }}</h4>
    </div>

    <div class="mt-4">
        <h5>Shipping Info</h5>
        <p><strong>Name:</strong> {{ $order->fullname }}</p>
        <p><strong>Email:</strong> {{ $order->email }}</p>
        <p><strong>Phone:</strong> {{ $order->phone }}</p>
        <p><strong>Address:</strong> {!! nl2br(e($order->address)) !!}</p>
    </div>

    <div class="mt-4">
        <h5>Order Summary</h5>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Price ($)</th>
                    <th>Qty</th>
                    <th>Subtotal ($)</th>
                </tr>
            </thead>
            <tbody>
                @php $total = 0; @endphp
                @foreach($items as $item)
                    @php $subtotal = $item->price * $item->quantity; $total += $subtotal; @endphp
                    <tr>
                        <td>{{ $item->product_name }}</td>
                        <td>{{ number_format($item->price, 2) }}</td>
                        <td>{{ $item->quantity }}</td>
                        <td>{{ number_format($subtotal, 2) }}</td>
                    </tr>
                @endforeach
                <tr>
                    <th colspan="3" class="text-end">Total</th>
                    <th>${{ number_format($total, 2) }}</th>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="text-center mt-4 d-print-none">
        <a href="{{ route('home') }}" class="btn btn-primary">Continue Shopping</a>
        <a href="{{ route('orders.index') }}" class="btn btn-default">My Orders</a>
    </div>
</div>
</main>
@include('footer')
@include('jslinks')
</body>
</html>
