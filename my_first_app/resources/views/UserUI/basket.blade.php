<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CS2TP</title>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <script type="text/javascript" src="{{ asset('script.js') }}" defer></script>
</head>

<body>
    
<section id="header">
    <a href="#"><img src="img/logo1.png" class="logo" alt=""></a>

    <nav id="nav">
        <li><a href="{{url('/home')}}">Home</a></li>
        <li><a href="{{url('/products')}}">Products</a></li>
        <li><a href="{{url('/contact')}}">Contact Us</a></li>
        <li><a href="{{url('/about')}}">About Us</a></li>
        
        <!--Search Bar -->
        <div class="search-container">
            <input type="text" placeholder="Search..." class="search-input">
            <button class="search-btn"><i class="fa-solid fa-magnifying-glass"></i></button>
        </div>
        
        <div class="user-actions">
            @if (Route::has('login'))
                @auth
                    <li><a href="{{url('/dashboard')}}">ACCOUNT</a></li>
                @else
                    <a href="{{ route('login') }}" class="log">LOGIN</a>
                    <a href="{{ route('register') }}" class="sign">SIGN UP</a>
                @endif
            @endauth 
        </div>
        <li><a href="{{url('/basket')}}"><i class="fa-solid fa-cart-shopping"></i></a></li>
    </nav>
</section>

<section class="section-p1">
    <h1>Your Basket</h1>
    <div class="basket-container">
        @if(isset($orderItems) && count($orderItems) > 0)
            @foreach($orderItems as $item)
            
            <!-- Display Product Image -->
            <div class="basket-card" data-category="{{ $item->category }}" data-price="{{ $item->price }}">
                <img src="{{ asset($item->product->image) }}" alt="{{ $item->product->name }}">
                
                <div class="basket-item-details">
                    <h3>{{ $item->product->name }}</h3>
                    <!-- Display Size -->
                    <p>Size: <strong>{{ $item->decoded_size['size'] }}</strong></p>
                    <p>Price: £{{ number_format($item->product->price, 2) }}</p>
                    <p>Quantity: {{ $item->quantity }}</p>
                    <p>Total: £{{ number_format($item->product->price * $item->quantity, 2) }}</p>
                    
                </div>
            </div>

            @endforeach
        @else
            <p>Your basket is empty.</p>
        @endif
    </div>
</section>

<!-- Checkout Button -->
<a href="{{ url('checkout') }}"><button class="check-out-button">Check Out</button></a>

<footer>
    <div class="container">
        <div class="footer-content">
            <h3>Contact</h3>
            <p>Email: info.conceptt@gmail.com</p>
        </div>
        <div class="footer-content">
            <h3>Quick Links</h3>
            <ul class="list">
                <li><a href="{{url('/home')}}">Home</a></li>
          <li><a href="{{url('/products')}}">Products</a></li>
          <li><a href="{{url('/contact')}}">Contact</a></li>
          <li><a href="{{url('/about')}}">About Us</a></li>
                </ul>
            </div>
            <div class="footer-content">
                <h3>Follow Us</h3>
                <ul class="media-icons">
                <li><a href="https://www.linkedin.com/in/concept-clothing-1b8536357/" target="_blank"><i class="fab fa-linkedin"></i></a></li>
        <li><a href="https://x.com/Concept10_" target="_blank"><i class="fab fa-twitter"></i></a></li>
        <li><a href="https://www.facebook.com/profile.php?id=61574613238016&sk=about" target="_blank"><i class="fab fa-facebook"></i></a></li>
        <li><a href="https://www.instagram.com/conceptt___/" target="_blank"><i class="fab fa-instagram"></i></a></li>
                </ul>
            </div>
        </div>
        
</footer>

<script src="{{ asset('script.js') }}"></script>

</body>

</html>
