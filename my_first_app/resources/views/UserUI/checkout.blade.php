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
        <a href="#"><img src="img/logo1.png" class="logo" alt=""></a>

        <nav id="nav">
            <li><a href="{{ url('/home') }}">Home</a></li>
            <li><a href="{{ url('/products') }}">Products</a></li>
            <li><a href="{{ url('/contact') }}">Contact Us</a></li>
            <li><a href="{{ url('/about') }}">About Us</a></li>
               
               <!--Search Bar -->
               <div class ="search-container">
                  <input type="text" placeholder="Search..." class="search-input">
                  <button class="search-btn"><i class="fa-solid fa-magnifying-glass"></i><button>
               </div>
               
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
            <button id="theme-switch">
                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="var(--primary-color)">
                    <path d="M480-120q-150 0-255-105T120-480q0-150 105-255t255-105q14 0 27.5 1t26.5 3q-41 29-65.5 75.5T444-660q0 90 63 153t153 63q55 0 101-24.5t75-65.5q2 13 3 26.5t1 27.5q0 150-105 255T480-120Z"/>
                </svg>
                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="var(--primary-color)">
                    <path d="M480-280q-83 0-141.5-58.5T280-480q0-83 58.5-141.5T480-680q83 0 141.5 58.5T680-480q0 83-58.5 141.5T480-280ZM200-440H40v-80h160v80Zm720 0H760v-80h160v80ZM440-760v-160h80v160h-80Zm0 720v-160h80v160h-80ZM256-650l-101-97 57-59 96 100-52 56Zm492 496-97-101 53-55 101 97-57 59Zm-98-550 97-101 59 57-100 96-56-52ZM154-212l101-97 55 53-97 101-59-57Z"/>
                </svg>
            </button>
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
            <h3> hi </h3>
            <!-- This is where the JavaScript will dynamically populate the basket details -->
        </div>
    </section>

    <div class="faint-line"></div>

    <!-- Checkout Form Section -->
    <section id="checkout-body">
    <h3>Enter Shipping Address</h3>
    <section id="details-info">
        <form id="checkout-form">
            <label for="fullName">Full Name:</label>
            <input type="text" id="fullName" name="user_name" required>

            <label for="address1">Address Line 1:</label>
            <input type="text" id="address1" name="address1" required>

            <label for="address2">Address Line 2 (Optional):</label>
            <input type="text" id="address2" name="address2">

            <label for="city">City:</label>
            <input type="text" id="city" name="city" required>

            <label for="zip">Postcode:</label>
            <input type="text" id="zip" name="zip" required>

            <label for="country">Country:</label>
            <input type="text" id="country" name="country" required>

            <button type="button" id="submit-btn">Submit</button>
        </form>
        <p id="confirmation-message" style="color: green; margin-top: 20px; font-weight: bold;"></p>
    </section>
</section>


    <script src="{{ asset('script.js') }}"></script>

</body>

</html>