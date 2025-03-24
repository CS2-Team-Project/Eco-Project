<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Confirmation</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <section id="order-confirmation">
        <h2>Order Confirmed!</h2>
        <p>Your order has been confirmed and is being processed. We will notify you once it's on its way.</p>

        <h3>Order Details:</h3>
        <p><strong>Order ID:</strong> {{ $order->id }}</p>
        <p><strong>Status:</strong> {{ $order->status }}</p>

        <!-- Order Items List -->
        <h4>Products Ordered:</h4>
        <ul>
            @foreach($order->orderItems as $item)
                <li>
                    <strong>{{ $item->product->name }}</strong> 
                    (x{{ $item->quantity }}) - 
                    £{{ number_format($item->product->price * $item->quantity, 2) }} 
                    <br>
                    <!-- Display Size with safety check -->
                    @if(isset($item->decoded_size) && $item->decoded_size && isset($item->decoded_size['size']))
                        <span><strong>Size:</strong> {{ $item->decoded_size['size'] }}</span>
                    @else
                        <span><strong>Size:</strong> Not available</span>
                    @endif
                </li>
            @endforeach
        </ul>

        <p class="thank-you-msg">Thank you for shopping with us! Your order is now processing.</p>

        <!-- Return to Home Button -->
        <div class="return-home">
            <a href="{{ url('/home') }}" class="return-home-btn">Return to Home</a>
        </div>
    </section>
</body>

</html>
