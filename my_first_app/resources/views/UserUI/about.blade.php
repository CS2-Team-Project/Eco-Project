<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CS2TP - About Us</title>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <script type="text/javascript" src="script.js" defer></script> <!-- Include dark mode JS -->
  
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
               <div class ="search-container">
                  <input type="text" placeholder="Search..." class="search-input">
                  <button class="search-btn"><i class="fa-solid fa-magnifying-glass"></i><button>
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
<!-- About Us Banner -->
  <section id="aboutbanner">
    <h1>About Us</h1><br>
    <div class="aboutus-container">
      <div class="aboutcard">
        <img src="img/MadeInUk.png" alt="Made in the UK">
        <div class="aboutcard-content">
          <h1>Made in the UK</h1>
          <p>At Concept we take pride in keeping the design and production of our merchandise at home in the UK.
            We keep our production and manufacturing local so we can ensure exceptional quality, originality, and
            cater to the values of our brand. This action is an integral part of Concept. We also believe it is
            crucial to the quality of our products. By keeping our production and manufacturing local, not only do we ensure
            strong attention to detail and uphold a reputation for fashion for the country, but we also serve as a benefactor for
            UK-based businesses.</p>
        </div>
      </div>
      <div class="aboutcard">
        <img src="img/OurMission.jpg" alt="Our Mission">
        <div class="aboutcard-content">
          <h1>Our Mission</h1>
          <p>At Concept, our purpose is straightforward and simple, however, we want to have a huge impact. We don't
            just want to provide exceptional coats and jackets that offer comfort, warmth, and exceptional style.
            We also want to revolutionize fashion in modern culture in a way where people can express themselves
            and stand out amongst others. For us, coats and jackets are more than just a piece of clothing. It is a statement.
            It is a companion throughout life's journeys whether it be diligently storming through the harsh cold winters
            or enjoying beautiful summer mornings.</p>
        </div>
      </div>
      <div class="aboutcard">
        <img src="img/sustainability.jpg" alt="Sustainability & Commitment">
        <div class="aboutcard-content">
          <h1>Sustainability & Commitment</h1>
          <p>The environment and the improvement of sustainability is one of our highest priorities. By ensuring that our products
            provide warmth, comfort, and exceptional style, it should not come at the cost of our planet as it is too precious to society.
            Therefore, all of our products are designed to be eco-friendly. We use recycled and organic materials and environmentally friendly
            manufacturing processes that minimize waste and reduce carbon footprints in our mission to save the planet and fight climate change.</p>
        </div>
      </div>
    </div>
  </section>
  
  <

  <script id="Cookiebot" src="https://consent.cookiebot.com/uc.js" data-cbid="03211d0e-33b9-44ba-9bf9-3df2495d24f6" data-blockingmode="auto" type="text/javascript"></script>

  <!-- chatbot -->
  <script>
    (function(){if(!window.chatbase||window.chatbase("getState")!=="initialized"){window.chatbase=(...arguments)=>{if(!window.chatbase.q){window.chatbase.q=[]}window.chatbase.q.push(arguments)};window.chatbase=new Proxy(window.chatbase,{get(target,prop){if(prop==="q"){return target.q}return(...args)=>target(prop,...args)}})}const onLoad=function(){const script=document.createElement("script");script.src="https://www.chatbase.co/embed.min.js";script.id="l_64M3nESJsg18Uz_Gfhi";script.domain="www.chatbase.co";document.body.appendChild(script)};if(document.readyState==="complete"){onLoad()}else{window.addEventListener("load",onLoad)}})();
    </script>

  <!-- Footer Section -->
  <footer>
    <div class="container">
      <div class="footer-content">
        <h3>Contact</h3>
        <p>Email: info.concept@gmail.com</p>
      </div>

      <div class="footer-content">
        <h3>Language</h3>
        !-- translate script -->
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