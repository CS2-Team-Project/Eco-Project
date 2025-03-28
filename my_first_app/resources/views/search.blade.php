<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CS2TP</title>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <script type="text/javascript" src="script.js" defer></script>
</head>

<body>
  <section id="header">
    <a href="#"><img src="img/logo1.png" class="logo" alt=""></a>
    <button class="menu-icon" onclick="toggleSidebar()">☰</button>
    <nav id="nav">
      <li><a href="{{url('/home')}}">Home</a></li>
      <li><a href="{{url('/products')}}">Products</a></li>
      <li><a href="{{url('/contact')}}">Contact Us</a></li>
      <li><a href="{{url('/about')}}">About Us</a></li>

      <!--Search Bar -->
      <div class ="search-container">
                  <input type="text" placeholder="Search..." class="search-input">
                  <button class="search-btn"><i class="fa-solid fa-magnifying-glass"></i></button>
                </div>
                
      <div class="user-actions">
        <a href="log.html" class="log">LOGIN</a>
        <a href="#" class="sign">SIGN UP</a>
      </div>
      <button id="theme-switch">
        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="var(--primary-color)">
          <path d="M480-120q-150 0-255-105T120-480q0-150 105-255t255-105q14 0 27.5 1t26.5 3q-41 29-65.5 75.5T444-660q0 90 63 153t153 63q55 0 101-24.5t75-65.5q2 13 3 26.5t1 27.5q0 150-105 255T480-120Z"/>
        </svg>
        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="var(--primary-color)">
          <path d="M480-280q-83 0-141.5-58.5T280-480q0-83 58.5-141.5T480-680q83 0 141.5 58.5T680-480q0 83-58.5 141.5T480-280ZM200-440H40v-80h160v80Zm720 0H760v-80h160v80ZM440-760v-160h80v160h-80Zm0 720v-160h80v160h-80ZM256-650l-101-97 57-59 96 100-52 56Zm492 496-97-101 53-55 101 97-57 59Zm-98-550 97-101 59 57-100 96-56-52ZM154-212l101-97 55 53-97 101-59-57Z"/>
        </svg>
      </button>
      <li><a href="basket.html"><i class="fa-solid fa-cart-shopping"></i></a></li>
    </nav>
  </section>

  <div class = "product-container"></div>
  
  <footer>
    <div class="container">
      <div class="footer-content">
        <h3>Contact</h3>
        <p>Email: info.concept@gmail.com</p>
      </div>
      <div class="footer-content">
        <h3>Quick Links</h3>
        <ul class="list">
          <li><a href="#">Home</a></li>
          <li><a href="#">Products</a></li>
          <li><a href="contact.html">Contact</a></li>
          <li><a href="about.html">About Us</a></li>
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

  <script src="script.js"></script>
</body>

</html>