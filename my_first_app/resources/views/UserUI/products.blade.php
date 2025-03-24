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

  <section id="filter-bar">
    <label for="category">Category:</label>
    <select id="category">
        <option value="all">All</option>
        <option value="bombers">Bombers</option>
        <option value="puffers">Puffers</option>
        <option value="leathers">Leathers</option>
        <option value="denims">Denims</option>
        <option value="jackets">Jackets</option>
    </select>
    <label for="sort-price">Sort by Price:</label>
    <select id="sort-price">
        <option value="low-high">Low to High</option>
        <option value="high-low">High to Low</option>
    </select>
</section>

<section id="products">
    <div class="product-container">
        @foreach ($products as $product)
        @php
        $totalStock = ($product->stock_s ?? 0) + ($product->stock_m ?? 0) + ($product->stock_l ?? 0);
        @endphp
            <div class="product-card" data-category="{{ $product->category }}" data-price="{{ $product->price }}">
                <img src="{{ asset($product->image) }}" alt="{{ $product->name }}">

                <h3>{{ $product->name }}</h3>

                <p>{{ $product->description }}</p>
                <p class="price">£{{ $product->price }}</p>

                @if($totalStock <= 2 && $totalStock > 0)
                <p class="low-stock">Only {{ $totalStock }} left in stock!</p>
                @elseif($totalStock == 0)
                <p class="out-of-stock">Out of stock</p>
                @endif


                <details class="product-details">
                    <summary>Product Details</summary>
                    <ul>
                        @foreach(json_decode($product->details) as $detail)
                            <li>{{ $detail }}</li>
                        @endforeach
                    </ul>
                </details>

                <div class="size-buttons">
    <form action="{{ url('basket', $product->id) }}" method="POST" class="size-form" id="size-form-s">
        @csrf
        <input type="hidden" name="product_id" value="{{ $product->id }}">
        <input type="hidden" name="size" value="S">
        <button type="submit" class="size" {{ ($product->stock_s ?? 0) == 0 ? 'disabled class=out-of-stock-size' :'' }}>
            S
        </button>
    </form>

    <form action="{{ url('basket', $product->id) }}" method="POST" class="size-form" id="size-form-m">
        @csrf
        <input type="hidden" name="product_id" value="{{ $product->id }}">
        <input type="hidden" name="size" value="M">
        <button type="submit" class="size" {{ ($product->stock_m ?? 0) == 0 ? 'disabled class=out-of-stock-size' :'' }}>
            M
        </button>
    </form>

    <form action="{{ url('basket', $product->id) }}" method="POST" class="size-form" id="size-form-l">
        @csrf
        <input type="hidden" name="product_id" value="{{ $product->id }}">
        <input type="hidden" name="size" value="L">
        <button type="submit" class="size" {{ ($product->stock_l ?? 0) == 0 ? 'disabled class=out-of-stock-size' : '' }}>
            L
        </button>
    </form>
</div>


                <form action="{{ url('basket', $product->id) }}" method="POST">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                </form>
            </div>
        @endforeach
    </div>
</section>


  <script>
    document.getElementById('category').addEventListener('change', function() {
        let category = this.value;
        document.querySelectorAll('.product-card').forEach(card => {
            if (category === 'all' || card.dataset.category === category) {
                card.style.display = 'block';
            } else {
                card.style.display = 'none';
            }
        });
    });

    document.getElementById('sort-price').addEventListener('change', function() {
        let container = document.querySelector('.product-container');
        let products = Array.from(container.children);
        let sortType = this.value;
        products.sort((a, b) => {
            return sortType === 'low-high' ? a.dataset.price - b.dataset.price : b.dataset.price - a.dataset.price;
        });
        container.innerHTML = '';
        products.forEach(product => container.appendChild(product));
    });
</script>

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
        <!-- translate script -->
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
</body>
<script src="{{ asset('script.js') }}"></script>


</html>

