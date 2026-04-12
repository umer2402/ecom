<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>My Orders</title>
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

    <div class="container py-5">
        <h2 class="text-center mb-4">My Orders</h2>

        @if($orders->count() > 0)
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>Date</th>
                        <th>Total Amount ($)</th>
                        <th>Status</th>
                        <th>Details</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $order)
                        <tr>
                            <td>#{{ $order->id }}</td>
                            <td>{{ \Carbon\Carbon::parse($order->order_date)->format('d M Y, h:i A') }}</td>
                            <td>{{ number_format($order->total_amount, 2) }}</td>
                            <td>
                                <span class="badge bg-{{ $order->status === 'Delivered' ? 'success' : ($order->status === 'Shipped' ? 'info' : 'warning') }}">
                                    {{ $order->status }}
                                </span>
                            </td>
                            <td><a href="{{ route('orders.show', $order->id) }}" class="btn btn-sm btn-outline-primary">View</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <div class="alert alert-info text-center">You have not placed any orders yet.</div>
        @endif
    </div>
</main>
@include('footer')
@include('jslinks')
</body>
</html>
