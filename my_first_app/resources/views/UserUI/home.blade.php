<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- FLATICON -->
  <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.6.0/uicons-thin-straight/css/uicons-thin-straight.css'>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
  <title>CS2TP</title>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <script type="text/javascript" src="{{ asset('script.js') }}" defer></script>
</head>

<body>
  <!-- Header Section -->
  <section id="header">
    <a href="#"><img src="img/logo1.png" class="logo" alt=""></a>
    <!-- Menu Icon for Mobile -->
    <button class="menu-icon" onclick="toggleSidebar()">☰</button>
    <!-- Navigation -->
    <nav id="nav">
      <!-- Navigation Links -->
      <li><a href="{{url('/home')}}">Home</a></li>
      <li><a href="{{url('/products')}}">Products</a></li>
      <li><a href="{{url('/contact')}}">Contact Us</a></li>
      <li><a href="{{url('/about')}}">About Us</a></li>

      <!-- Dark Theme Button (Moved to the Left of the Search Bar) -->
      <button id="theme-switch">
        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="var(--primary-color)">
          <path d="M480-120q-150 0-255-105T120-480q0-150 105-255t255-105q14 0 27.5 1t26.5 3q-41 29-65.5 75.5T444-660q0 90 63 153t153 63q55 0 101-24.5t75-65.5q2 13 3 26.5t1 27.5q0 150-105 255T480-120Z"/>
        </svg>
        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="var(--primary-color)">
          <path d="M480-280q-83 0-141.5-58.5T280-480q0-83 58.5-141.5T480-680q83 0 141.5 58.5T680-480q0 83-58.5 141.5T480-280ZM200-440H40v-80h160v80Zm720 0H760v-80h160v80ZM440-760v-160h80v160h-80Zm0 720v-160h80v160h-80ZM256-650l-101-97 57-59 96 100-52 56Zm492 496-97-101 53-55 101 97-57 59Zm-98-550 97-101 59 57-100 96-56-52ZM154-212l101-97 55 53-97 101-59-57Z"/>
        </svg>
      </button>

      <!-- Search Bar -->
      <div class="search-container">
        <input type="text" placeholder="Search..." class="search-input">
        <button class="search-btn"><i class="fa-solid fa-magnifying-glass"></i></button>
      </div>

      <!-- Login and Signup -->
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

      <!-- Cart Icon -->
      <li><a href="{{url('/basket')}}"><i class="fa-solid fa-cart-shopping"></i></a></li>
    </nav>
  </section>

  <!-- Hero Banner Section -->
  <section id="herobanner">
    <h2>CONCEPT PRESENTS</h2>
    <h1>signature heavyweight jackets</h1>
    <button><a href="{{url('/products')}}">Shop Now</a></button>
  </section>

  <!-- Product Categories Section -->
  <section class="catogories Hcontainer section">
    <h3 class="section_title"><span>Product</span> Catogories</h3>
    <br>
    
    <div class="categories_container swiper">
      <div class="swiper-wrapper">
        <a href="{{ url('/products?category=bombers') }}" class="category_item swiper-slide">
          <img src="img/category1.png" alt="" class="category_img">
          <h3 class="category_title">Bomber Jackets</h3>
        </a>
        <a href="{{ url('/products?category=puffers') }}" class="category_item swiper-slide">
          <img src="img/category2.png" alt="" class="category_img">
          <h3 class="category_title">Puffer Jackets</h3>
        </a>
        <a href="{{ url('/products?category=leathers') }}" class="category_item swiper-slide">
          <img src="img/category3.png" alt="" class="category_img">
          <h3 class="category_title">Leather Jackets</h3>
        </a>
        <a href="{{ url('/products?category=denims') }}" class="category_item swiper-slide">
          <img src="img/category4.png" alt="" class="category_img">
          <h3 class="category_title">Denim Jackets</h3>
        </a>
        <a href="{{ url('/products?category=jackets') }}" class="category_item swiper-slide">
          <img src="img/category5.png" alt="" class="category_img">
          <h3 class="category_title">Jackets</h3>
        </a>
      </div>
      <div class="swiper-button-next">
        <i class="fi fi-ts-angle-small-right"></i>
      </div>
      <div class="swiper-button-prev">
        <i class="fi fi-ts-angle-small-left"></i>
      </div>
    </div>
  </section>

  <!-- Cookies Section -->
  <div id="cookie-box" class="cookie-box">
    <p class="cookie-message">This website uses cookies to ensure you get the best experience. Do you accept?</p>
    <div class="cookie-buttons">
      <button class="accept" onclick="acceptCookies()">Accept</button>
      <button class="reject" onclick="closeBox()">Reject</button>
    </div>
  </div>

  <!-- Chatbot Script -->
  <script>
    (function(){if(!window.chatbase||window.chatbase("getState")!=="initialized"){window.chatbase=(...arguments)=>{if(!window.chatbase.q){window.chatbase.q=[]}window.chatbase.q.push(arguments)};window.chatbase=new Proxy(window.chatbase,{get(target,prop){if(prop==="q"){return target.q}return(...args)=>target(prop,...args)}})}const onLoad=function(){const script=document.createElement("script");script.src="https://www.chatbase.co/embed.min.js";script.id="l_64M3nESJsg18Uz_Gfhi";script.domain="www.chatbase.co";document.body.appendChild(script)};if(document.readyState==="complete"){onLoad()}else{window.addEventListener("load",onLoad)}})();
  </script>

  <!-- Footer Section -->
  <footer>
    <div class="container">
      <div class="footer-content">
        <h3>Contact</h3>
        <p>Email:info.conceptt@gmail.com</p>
      </div>
      <div class="footer-content">
        <h3>Language</h3>
        <div id="google_translate_element"></div>
        <script type="text/javascript">
          function googleTranslateElementInit() {
            new google.translate.TranslateElement({ pageLanguage: 'en' }, 'google_translate_element');
          }
        </script>
        <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
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
          <li><a href="https://www.linkedin.com"><i class="fab fa-linkedin"></i></a></li>
          <li><a href="https://twitter.com"><i class="fab fa-twitter"></i></a></li>
          <li><a href="https://facebook.com"><i class="fab fa-facebook"></i></a></li>
          <li><a href="https://instagram.com"><i class="fab fa-instagram"></i></a></li>
        </ul>
      </div>
    </div>
  </footer>

  <!-- Swiper JS -->
  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

  <!-- Main JS -->
  <script src="script.js"></script>
  <script>
    function toggleSidebar() {
      var nav = document.getElementById("nav");
      if (nav.className === "nav") {
        nav.className += " responsive";
      } else {
        nav.className = "nav";
      }
    }
  </script>
</body>
</html>