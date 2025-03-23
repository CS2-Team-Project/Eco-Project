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

  <section id="products" class="section-p1">
    <h1>Our Products</h1>
    <div class="product-container">
    <div class="product-card" data-category="bombers" data-price="1375">
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

      <div class="product-card" data-category="jackets" data-price="765">
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

      <div class="product-card" data-category="puffers" data-price="315">
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

      <div class="product-card" data-category="bombers" data-price="200">
        <img src="img/product4.png" alt="Product 4">
        <h3>Alpha Industries Bomber Jacket</h3>
        <p>CWU-45 Heritage Bomber Jacket</p>
        <p class="price">£200</p>
        <details class="product-details">
          <summary>Product Details</summary>
          <ul>
            <li>Shell: 100% Nylon;</li>
            <li>Lining: 100%</li>
            <li>Nylon; Filling:</li>
            <li>100% Polyester</li>
          </ul>            
        </details>
        <div class="size-buttons">
          <button class="size" data-size="Small">S</button>
          <button class="size" data-size="Medium">M</button>
          <button class="size" data-size="Large">L</button>
        </div>
        <button class="add-to-basket">Add to Basket</button>
      </div>

      <div class="product-card" data-category="jackets" data-price="110">
        <img src="img/product5.png" alt="Product 5">
        <h3>Uniqlo Down Jacket</h3>
        <p>Seamless Down Jacket</p>
        <p class="price">£110</p>
        <details class="product-details">
          <summary>Product Details</summary>
          <ul>
            <li>Made with warm premium down with a fill power of 750*. *Measured by the IDFB method</li>
            <li>Water-repellent finish</li>
            <li>Shell: 100% Polyester</li>
            <li>Filling: 90% Down, 10% Feathers</li>
          </ul>            
        </details>
        <div class="size-buttons">
          <button class="size" data-size="Small">S</button>
          <button class="size" data-size="Medium">M</button>
          <button class="size" data-size="Large">L</button>
        </div>
        <button class="add-to-basket">Add to Basket</button>
      </div>

      <div class="product-card" data-category="puffers" data-price="90">
        <img src="img/product6.png" alt="Product 6">
        <h3>Zavetti Puffer</h3>
        <p>Zavetti Canada Atlin Puffer Jacket</p>
        <p class="price">£90</p>
        <details class="product-details">
          <summary>Product Details</summary>
          <ul>
            <li>Main: 100% Polyamide. Lining: 100% Polyester.</li>
            <li>Finished reflective zippered pockets</li>
            <li>Machine washable</li>
          </ul>            
        </details>
        <div class="size-buttons">
          <button class="size" data-size="Small">S</button>
          <button class="size" data-size="Medium">M</button>
          <button class="size" data-size="Large">L</button>
        </div>
        <button class="add-to-basket">Add to Basket</button>
      </div>

      <div class="product-card" data-category="jackets" data-price="125">
        <img src="img/product7.png" alt="Product 7">
        <h3>Columbia Sports Jacket</h3>
        <p>Powder Lite™ II Insulated Jacket</p>
        <p class="price">£125</p>
        <details class="product-details">
          <summary>Product Details</summary>
          <ul>
            <li>Omni-Heat™ thermal reflective</li>
            <li>Water resistant fabric</li>
            <li>Zippered hand pockets</li>
            <li>Uses: Hiking, Walking, Casual</li>
          </ul>            
        </details>
        <div class="size-buttons">
          <button class="size" data-size="Small">S</button>
          <button class="size" data-size="Medium">M</button>
          <button class="size" data-size="Large">L</button>
        </div>
        <button class="add-to-basket">Add to Basket</button>
      </div>

      <div class="product-card" data-category="jackets" data-price="185">
        <img src="img/product8.png" alt="Product 8">
        <h3>Zara Jacket</h3>
        <p>Lightweight Casual Jacket</p>
        <p class="price">£185</p>
        <details class="product-details">
          <summary>Product Details</summary>
          <ul>
            <li>Lightweight jacket made of technical fabric.</li>
            <li>Ribbed collar and long sleeves.</li>
            <li>Welt pockets at the hip. Inside pocket detail.</li>
            <li>BASE FABRIC: 100% polyester</li>
          </ul>            
        </details>
        <div class="size-buttons">
          <button class="size" data-size="Small">S</button>
          <button class="size" data-size="Medium">M</button>
          <button class="size" data-size="Large">L</button>
        </div>
        <button class="add-to-basket">Add to Basket</button>
      </div>

      <div class="product-card" data-category="puffers" data-price="140">
        <img src="img/product9.png" alt="Product 9">
        <h3>Mercier Puffer Coat</h3>
        <p>Mercier Blizzard Coat</p>
        <p class="price">£140</p>
        <details class="product-details">
          <summary>Product Details</summary>
          <ul>
            <li>100% Polyester</li>
            <li>Combat the elements with this men's Blizzard Jacket</li>
            <li>features a full-zip fastening and hood for custom coverage</li>
            <li>Machine washable</li>
          </ul>            
        </details>
        <div class="size-buttons">
          <button class="size" data-size="Small">S</button>
          <button class="size" data-size="Medium">M</button>
          <button class="size" data-size="Large">L</button>
        </div>
        <button class="add-to-basket">Add to Basket</button>
      </div>

      <div class="product-card" data-category="leathers" data-price="490">
        <img src="img/product10.png" alt="Product 10">
        <h3>All Saints Leather Jacket</h3>
        <p>Milo Desserto® Biker Jacket</p>
        <p class="price">£490</p>
        <details class="product-details">
          <summary>Product Details</summary>
          <ul>
            <li>Asymmetric zip front</li>
            <li>Two lower zip pockets</li>
            <li>Ticket pocket</li>
            <li>Hem loops</li>
          </ul>            
        </details>
        <div class="size-buttons">
          <button class="size" data-size="Small">S</button>
          <button class="size" data-size="Medium">M</button>
          <button class="size" data-size="Large">L</button>
        </div>
        <button class="add-to-basket">Add to Basket</button>
      </div>

      <div class="product-card" data-category="denims" data-price="440">
        <img src="img/product11.png" alt="Product 11">
        <h3>Evisu Denim Jacket</h3>
        <p>Graffiti Prints Regular Fit Denim Jacket</p>
        <p class="price">£440</p>
        <details class="product-details">
          <summary>Product Details</summary>
          <ul>
            <li>100% Cotton</li>
            <li>Graffiti styles print logo, Godhead and Daruma</li>
            <li>Button fastening, 4 pockets</li>
            <li>EVISU Premium Quality Kamon tag</li>
          </ul>            
        </details>
        <div class="size-buttons">
          <button class="size" data-size="Small">S</button>
          <button class="size" data-size="Medium">M</button>
          <button class="size" data-size="Large">L</button>
        </div>
        <button class="add-to-basket">Add to Basket</button>
      </div>

      <div class="product-card" data-category="leathers" data-price="1190">
        <img src="img/product12.png" alt="Product 12">
        <h3>Hugo Boss Leather Jacket</h3>
        <p>Porsche x BOSS regular-fit jacket in leather</p>
        <p class="price">£1190</p>
        <details class="product-details">
          <summary>Product Details</summary>
          <ul>
            <li>Fastening top: Zip closure</li>
            <li>Pockets top: Zip pockets</li>
            <li>Fully lined</li>
            <li>Standard length</li>
          </ul>            
        </details>
        <div class="size-buttons">
          <button class="size" data-size="Small">S</button>
          <button class="size" data-size="Medium">M</button>
          <button class="size" data-size="Large">L</button>
        </div>
        <button class="add-to-basket">Add to Basket</button>
      </div>

      <div class="product-card" data-category="leathers" data-price="250">
        <img src="img/product13.png" alt="Product 13">
        <h3>The Leather Company Leather Jacket</h3>
        <p>Mens Safari Style Leather Jacket Black: AMJ-5</p>
        <p class="price">£250</p>
        <details class="product-details">
          <summary>Product Details</summary>
          <ul>
            <li>Ashwood Leather Jackets</li>
            <li>100% genuine leather</li>
            <li>Two side and two breast pockets</li>
            <li>Fully lined with two internal pockets</li>
          </ul>            
        </details>
        <div class="size-buttons">
          <button class="size" data-size="Small">S</button>
          <button class="size" data-size="Medium">M</button>
          <button class="size" data-size="Large">L</button>
        </div>
        <button class="add-to-basket">Add to Basket</button>
      </div>

      <div class="product-card" data-category="leathers" data-price="1660">
        <img src="img/product14.png" alt="Product 14">
        <h3>Ralph Lauren Leather Jacket</h3>
        <p>Slim Fit Leather Moto Jacket</p>
        <p class="price">£1660</p>
        <details class="product-details">
          <summary>Product Details</summary>
          <ul>
            <li>Slim fit. Hits at the waist</li>
            <li>Left chest zip pocket. Two front waist zip pockets</li>
            <li>Shell and lining: 100% leather. Lining: 57% cupro, 43% cotton</li>
            <li>Dry clean by a leather specialist</li>
          </ul>            
        </details>
        <div class="size-buttons">
          <button class="size" data-size="Small">S</button>
          <button class="size" data-size="Medium">M</button>
          <button class="size" data-size="Large">L</button>
        </div>
        <button class="add-to-basket">Add to Basket</button>
      </div>

      <div class="product-card" data-category="leathers" data-price="990">
        <img src="img/product15.png" alt="Product 15">
        <h3>Schott NYC Leather Jacket</h3>
        <p>Waxed Natural Pebbled Cowhide Café Leather Jacket</p>
        <p class="price">£990</p>
        <details class="product-details">
          <summary>Product Details</summary>
          <ul>
            <li>Full Aniline, drum dyed, hand cut, drummed cowhide leather</li>
            <li>Durable nickel plated brass hardware</li>
            <li>Vintage style open zippered sleeve cuffs with wind flaps</li>
            <li>100% cotton plaid lining</li>
          </ul>            
        </details>
        <div class="size-buttons">
          <button class="size" data-size="Small">S</button>
          <button class="size" data-size="Medium">M</button>
          <button class="size" data-size="Large">L</button>
        </div>
        <button class="add-to-basket">Add to Basket</button>
      </div>

      <div class="product-card" data-category="denims" data-price="540">
        <img src="img/product16.png" alt="Product 16">
        <h3>Diesel Denim Jacket</h3>
        <p>D-BARCY-S3</p>
        <p class="price">£540</p>
        <details class="product-details">
          <summary>Product Details</summary>
          <ul>
            <li>Composition: 100%Cotton, Application 100%Cotton</li>
            <li>Regular fit</li>
            <li>4 pockets</li>
            <li>Button cuffs and waist adjusters</li>
          </ul>            
        </details>
        <div class="size-buttons">
          <button class="size" data-size="Small">S</button>
          <button class="size" data-size="Medium">M</button>
          <button class="size" data-size="Large">L</button>
        </div>
        <button class="add-to-basket">Add to Basket</button>
      </div>

      <div class="product-card" data-category="denims" data-price="1110">
        <img src="img/product17.png" alt="Product 17">
        <h3>YSL Denim Jacket</h3>
        <p>oversized jacket in dark blue black denim</p>
        <p class="price">£1110</p>
        <details class="product-details">
          <summary>Product Details</summary>
          <ul>
            <li>100% Cotton</li>
            <li>Made in Italy</li>
            <li>one-button cuffs</li>
            <li>front button closure</li>
          </ul>            
        </details>
        <div class="size-buttons">
          <button class="size" data-size="Small">S</button>
          <button class="size" data-size="Medium">M</button>
          <button class="size" data-size="Large">L</button>
        </div>
        <button class="add-to-basket">Add to Basket</button>
      </div>

      <div class="product-card" data-category="denims" data-price="1530">
        <img src="img/product18.png" alt="Product 18">
        <h3>Louis Vitton Denim Jacket</h3>
        <p>DNA Denim Jacket</p>
        <p class="price">£1530</p>
        <details class="product-details">
          <summary>Product Details</summary>
          <ul>
            <li>100% cotton Lining: 100% cotton</li>
            <li>Made in Japan</li>
            <li>Regular fit</li>
            <li>Black</li>
          </ul>            
        </details>
        <div class="size-buttons">
          <button class="size" data-size="Small">S</button>
          <button class="size" data-size="Medium">M</button>
          <button class="size" data-size="Large">L</button>
        </div>
        <button class="add-to-basket">Add to Basket</button>
      </div>

      <div class="product-card" data-category="denims" data-price="270">
        <img src="img/product19.png" alt="Product 19">
        <h3>Ralph Lauren Denim Jacket</h3>
        <p>The Bayport Indigo-Dyed Denim Jacket</p>
        <p class="price">£270</p>
        <details class="product-details">
          <summary>Product Details</summary>
          <ul>
            <li>100% cotton. Machine washable. Imported.</li>
            <li>Dyed with indigo</li>
            <li>Straight collar. Throat tab with a snapped closure.</li>
          </ul>            
        </details>
        <div class="size-buttons">
          <button class="size" data-size="Small">S</button>
          <button class="size" data-size="Medium">M</button>
          <button class="size" data-size="Large">L</button>
        </div>
        <button class="add-to-basket">Add to Basket</button>
      </div>

      <div class="product-card" data-category="puffers" data-price="880">
        <img src="img/product20.png" alt="Product 20">
        <h3>Canada Goose Puffer</h3>
        <p>Crofton Hoody Puffer Jacket</p>
        <p class="price">£880</p>
        <details class="product-details">
          <summary>Product Details</summary>
          <ul>
            <li>100% Recycled Nylon</li>
            <li>750 Fill Power Responsibly Sourced Down</li>
            <li>Lightweight, Water-Repellent, Wind-Resistant & Durable</li>
          </ul>            
        </details>
        <div class="size-buttons">
          <button class="size" data-size="Small">S</button>
          <button class="size" data-size="Medium">M</button>
          <button class="size" data-size="Large">L</button>
        </div>
        <button class="add-to-basket">Add to Basket</button>
      </div>

      <div class="product-card" data-category="puffers" data-price="1040">
        <img src="img/product21.png" alt="Product 21">
        <h3>Stone Island Ghost Puffer</h3>
        <p>Ghost Down Puffer Jacket</p>
        <p class="price">£1040</p>
        <details class="product-details">
          <summary>Product Details</summary>
          <ul>
            <li>Fabric: Nylon</li>
            <li>Outer: polyamide. Filling: down, feather</li>
            <li>Quilted padded design exudes comfort and warmth</li>
          </ul>            
        </details>
        <div class="size-buttons">
          <button class="size" data-size="Small">S</button>
          <button class="size" data-size="Medium">M</button>
          <button class="size" data-size="Large">L</button>
        </div>
        <button class="add-to-basket">Add to Basket</button>
      </div>

      <div class="product-card" data-category="bombers" data-price="570">
        <img src="img/product22.png" alt="Product 22">
        <h3>Versace Couture Bomber</h3>
        <p>V-Emblem bomber jacket</p>
        <p class="price">£570</p>
        <details class="product-details">
          <summary>Product Details</summary>
          <ul>
            <li>embroidered logo at the chest</li>
            <li>black glossy finish</li>
            <li>two press-stud fastening side pockets</li>
          </ul>            
        </details>
        <div class="size-buttons">
          <button class="size" data-size="Small">S</button>
          <button class="size" data-size="Medium">M</button>
          <button class="size" data-size="Large">L</button>
        </div>
        <button class="add-to-basket">Add to Basket</button>
      </div>

      <div class="product-card" data-category="bombers" data-price="1055">
        <img src="img/product23.png" alt="Product 23">
        <h3>Jeff Hamilton Bomber</h3>
        <p>Jeff Hamilton x NBA Collage jacket</p>
        <p class="price">£1055</p>
        <details class="product-details">
          <summary>Product Details</summary>
          <ul>
            <li>Lining: Satin 100%</li>
            <li>Outer: Lamb Skin 100%, Wool 100%</li>
            <li>front press-stud fastening</li>
          </ul>            
        </details>
        <div class="size-buttons">
          <button class="size" data-size="Small">S</button>
          <button class="size" data-size="Medium">M</button>
          <button class="size" data-size="Large">L</button>
        </div>
        <button class="add-to-basket">Add to Basket</button>
      </div>

      <div class="product-card" data-category="bombers" data-price="260">
        <img src="img/product24.png" alt="Product 24">
        <h3>Reiss Bomber</h3>
        <p>Brushed Wool-Blend Bomber Jacket</p>
        <p class="price">£260</p>
        <details class="product-details">
          <summary>Product Details</summary>
          <ul>
            <li>53% Wool, 47% Polyester</li>
            <li>Raised central seam to reverse</li>
            <li>Dual front zip</li>
          </ul>            
        </details>
        <div class="size-buttons">
          <button class="size" data-size="Small">S</button>
          <button class="size" data-size="Medium">M</button>
          <button class="size" data-size="Large">L</button>
        </div>
        <button class="add-to-basket">Add to Basket</button>
      </div>

      <div class="product-card" data-category="jackets" data-price="2000">
        <img src="img/product25.png" alt="Product 25">
        <h3>Tom Ford Bomber</h3>
        <p>TOM FORD Hazed Gabardine Jacket</p>
        <p class="price">£2000</p>
        <details class="product-details">
          <summary>Product Details</summary>
          <ul>
            <li>OUTER: Lyocell 100%</li>
            <li>Made in Italy</li>
            <li>High neck, Long sleeves</li>
            <li>2-way zip, 2 side zipped pockets</li>
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
        <p>Email:info.conceptt@gmail.com</p>
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
        <li><a href="https://www.linkedin.com/in/concept-clothing-1b8536357/" target="_blank"><i class="fab fa-linkedin"></i></a></li>
        <li><a href="https://x.com/Concept10_" target="_blank"><i class="fab fa-twitter"></i></a></li>
        <li><a href="https://www.facebook.com/profile.php?id=61574613238016&sk=about" target="_blank"><i class="fab fa-facebook"></i></a></li>
        <li><a href="https://www.instagram.com/conceptt___/" target="_blank"><i class="fab fa-instagram"></i></a></li>
        </ul>
      </div>
    </div>

    
  </footer>
</body>
<script src="{{ asset('script.js') }}"></script>


</html>

