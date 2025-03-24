<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CS2TP</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>
    <!-- Header Section -->
    <section id="header">
        <a href="#"><img src="img/logo1.png" class="logo" alt="CS2TP Logo"></a>

        <nav id="nav">
            <li><a href="{{ url('/home') }}">Home</a></li>
            <li><a href="{{ url('/products') }}">Products</a></li>
            <li><a href="{{ url('/contact') }}">Contact Us</a></li>
            <li><a href="{{ url('/about') }}">About Us</a></li>

            <!-- Search Bar -->
            <div class="search-container">
                <input type="text" placeholder="Search..." class="search-input">
                <button class="search-btn">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </button>
            </div>

            <!-- User Actions -->
            <div class="user-actions">
                @if (Route::has('login'))
                    @auth
                        <li><a href="{{ url('/dashboard') }}">ACCOUNT</a></li>
                    @else
                        <a href="{{ route('login') }}" class="log">LOGIN</a>
                        <a href="{{ route('register') }}" class="sign">SIGN UP</a>
                    @endif
                @endauth
            </div>

            <!-- Theme Switcher Button -->
            <button id="theme-switch">
                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="var(--primary-color)">
                    <path d="M480-120q-150 0-255-105T120-480q0-150 105-255t255-105q14 0 27.5 1t26.5 3q-41 29-65.5 75.5T444-660q0 90 63 153t153 63q55 0 101-24.5t75-65.5q2 13 3 26.5t1 27.5q0 150-105 255T480-120Z"/>
                </svg>
            </button>

            <!-- Shopping Cart Icon -->
            <li><a href="{{ url('/basket') }}"><i class="fa-solid fa-cart-shopping"></i></a></li>
        </nav>
    </section>

    <!-- Checkout Header Section -->
    <section id="checkout-head">
        <h3>Checkout</h3>
    </section>

    <div class="faint-line"></div>

    <!-- Order Summary Section -->
    <section id="order-summary">
    <h3>Order Summary</h3>
    <div class="order-summary-container">
        <ul>
            @foreach($orderItems as $item)
                <li>
                    {{ $item->product->name }} 
                    <!-- Display the decoded size -->
                    (x{{ $item->quantity }}) 
                    - £{{ number_format($item->product->price * $item->quantity, 2) }}

                    <!-- Delete Button Form -->
                    <form action="{{ route('basket.delete', $item->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="delete-btn">Delete</button>
                    </form>
                </li>
            @endforeach
        </ul>
        <hr>
        <p><strong>Total: £{{ number_format($totalPrice, 2) }}</strong></p>
    </div>
</section>




    <div class="faint-line"></div>

    <!-- Checkout Form Section -->
    <section id="checkout-body">

        <!-- Shipping Address Display -->
        <section id="details-info" class="address-section">
            @if($shippingAddress)
                <h3>Shipping Address</h3>
                <div class="address-details">
                    <p><strong>Address Line 1:</strong> {{ $shippingAddress->address_line_1 }}</p>
                    <p><strong>Address Line 2:</strong> {{ $shippingAddress->address_line_2 }}</p>
                    <p><strong>City:</strong> {{ $shippingAddress->city }}</p>
                    <p><strong>Postal Code:</strong> {{ $shippingAddress->postal_code }}</p>
                    <p><strong>Country:</strong> {{ $shippingAddress->country }}</p>
                </div>
                <button onclick="window.location.href='{{ route('address.create') }}'" class="edit-address-btn">Edit Address</button>
            @else
                <p>No shipping address found. <a href="{{ route('address.create') }}">Add a new address</a></p>
            @endif
        </section>
    </section>

    <div class="faint-line"></div>

    <!--Here is where the code related to dummy payments will take place!!! -->
    
    <form action="{{ route('order.confirm') }}" method="POST">
    @csrf
    <button type="submit" class="confirm-order-btn">Confirm Order</button>
</form>





    <script src="{{ asset('script.js') }}"></script>
</body>

</html>
