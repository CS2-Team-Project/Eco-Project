<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CS2TP</title>
<link rel="stylesheet" href="{{ asset('style.css') }}">
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
      <button id="theme-switch">
        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="var(--primary-color)">
          <path d="M480-120q-150 0-255-105T120-480q0-150 105-255t255-105q14 0 27.5 1t26.5 3q-41 29-65.5 75.5T444-660q0 90 63 153t153 63q55 0 101-24.5t75-65.5q2 13 3 26.5t1 27.5q0 150-105 255T480-120Z"/>
        </svg>
        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="var(--primary-color)">
          <path d="M480-280q-83 0-141.5-58.5T280-480q0-83 58.5-141.5T480-680q83 0 141.5 58.5T680-480q0 83-58.5 141.5T480-280ZM200-440H40v-80h160v80Zm720 0H760v-80h160v80ZM440-760v-160h80v160h-80Zm0 720v-160h80v160h-80ZM256-650l-101-97 57-59 96 100-52 56Zm492 496-97-101 53-55 101 97-57 59Zm-98-550 97-101 59 57-100 96-56-52ZM154-212l101-97 55 53-97 101-59-57Z"/>
        </svg>
      </button>
      <li><a href="{{url('/basket')}}"><i class="fa-solid fa-cart-shopping"></i></a></li>
    </nav>
  </section>

  <section id="products" class="section-p1">
    <h1>Our Products</h1>
    <div class="product-container">
      <div class="product-card">
        <img src="img/product1grey.png" alt="Product 1">
        <h3>Canada Goose Bomber</h3>
        <p>Chilliwack Bomber Heritage</p>
        <p class="price">£1375</p>
        <details class="product-details">
          <summary>Product Details</summary>
          <ul>
            <li>Bomber length for exceptional mobility</li>
            <li>Removable fur ruff</li>
            <li>Non-removable, adjustable tunnel hood with a shaping wire to stand up to winds</li>
            <li>Stretch rib waistband and cuff for added warmth and comfort</li>
            <li>Reinforced elbows for durability</li>
            <li>Interior pocket: drop-in pocket</li>
          </ul>
        </details>
        <div class="size-buttons">
          <button class="size" data-size="Small">S</button>
          <button class="size" data-size="Medium">M</button>
          <button class="size" data-size="Large">L</button>
        </div>
        <button class="add-to-basket">Add to Basket</button>
      </div>

      <div class="product-card">
        <img src="img/product2black.png" alt="Product 2">
        <h3>Moncler Jacket</h3>
        <p>Moncler New Maya Down Jacket</p>
        <p class="price">£765</p>
        <details class="product-details">
          <summary>Product Details</summary>
          <ul>
            <li>Crafted from nylon laqué</li>
            <li>Down-filled with boudin quilting</li>
            <li>Two-way zip closure</li>
            <li>Zipped pockets</li>
            <li>Adjustable, elastic cuffs with snap buttons</li>
            <li>Hem with drawstring fastening</li>
            <li>Flap patch pocket on sleeve</li>
            <li>Felt logo patch on sleeve</li>
          </ul>          
        </details>
        <div class="size-buttons">
          <button class="size" data-size="Small">S</button>
          <button class="size" data-size="Medium">M</button>
          <button class="size" data-size="Large">L</button>
        </div>
        <button class="add-to-basket">Add to Basket</button>
      </div>

      <div class="product-card">
        <img src="img/product3cream.png" alt="Product 3">
        <h3>The North Face Puffer</h3>
        <p>North Face 1996 Retro Nuptse</p>
        <p class="price">£315</p>
        <details class="product-details">
          <summary>Product Details</summary>
          <ul>
            <li>Fabric - Body: 54 G/M², 100% Recycled Nylon Ripstop with Non-PFC Durable Water-Repellent (Non-PFC DWR) Finish</li>
            <li>Fabric - Overlay & Lining: 69 G/M², 100% Recycled Nylon Taffeta with Non-PFC Durable Water-Repellent (Non-PFC DWR) Finish</li>
            <li>Insulation: 700-Fill Goose Down; Responsible Down Standard (RDS) </li>
          </ul>            
        </details>
        <div class="size-buttons">
          <button class="size" data-size="Small">S</button>
          <button class="size" data-size="Medium">M</button>
          <button class="size" data-size="Large">L</button>
        </div>
        <button class="add-to-basket">Add to Basket</button>
      </div>
    </div>
  </section>

  <footer>
    <div class="container">
      <div class="footer-content">
        <h3>Contact</h3>
        <p>Email: info.concept@gmail.com</p>
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
          <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
          <li><a href="#"><i class="fab fa-twitter"></i></a></li>
          <li><a href="#"><i class="fab fa-facebook"></i></a></li>
          <li><a href="#"><i class="fab fa-instagram"></i></a></li>
        </ul>
      </div>
    </div>
  </footer>

</body>
<script src="{{ asset('script.js') }}"></script>
</html>

