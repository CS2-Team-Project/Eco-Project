<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shipping Address</title>
    <link rel="stylesheet" href="{{ asset('style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>

    <!-- Header Section -->
    <section id="header">
        <a href="#"><img src="{{ asset('img/logo1.png') }}" class="logo" alt="CS2TP Logo"></a>

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
                @auth
                    <li><a href="{{ url('/dashboard') }}">ACCOUNT</a></li>
                @else
                    <a href="{{ route('login') }}" class="log">LOGIN</a>
                    <a href="{{ route('register') }}" class="sign">SIGN UP</a>
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

    <!-- Shipping Address Form -->
    <section id="shipping-form">
        <h2>{{ $shippingAddress ? 'Edit Shipping Address' : 'Add Shipping Address' }}</h2>

        @if(session('success'))
            <p class="success-message">{{ session('success') }}</p>
        @endif

        <!-- Change the form action to route('address.store') -->
        <form action="{{ route('address.store') }}" method="POST">
            @csrf

            <label for="address_line_1">Address Line 1:</label>
            <input type="text" name="address_line_1" value="{{ old('address_line_1', $shippingAddress->address_line_1 ?? '') }}" required>

            <label for="address_line_2">Address Line 2 (Optional):</label>
            <input type="text" name="address_line_2" value="{{ old('address_line_2', $shippingAddress->address_line_2 ?? '') }}">

            <label for="city">City:</label>
            <input type="text" name="city" value="{{ old('city', $shippingAddress->city ?? '') }}" required>

            <label for="postal_code">Postal Code:</label>
            <input type="text" name="postal_code" value="{{ old('postal_code', $shippingAddress->postal_code ?? '') }}" required>

            <label for="country">Country:</label>
            <input type="text" name="country" value="{{ old('country', $shippingAddress->country ?? '') }}" required>

            <!-- Button Text Change Based on $shippingAddress -->
            <button type="submit">{{ $shippingAddress ? 'Update Address' : 'Save Address' }}</button>
        </form>
    </section>

    <script src="{{ asset('script.js') }}"></script>
</body>

</html>
