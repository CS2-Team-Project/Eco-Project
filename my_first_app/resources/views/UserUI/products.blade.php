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
    
    <section id="header">
        
        <a href="#"><img src="img/logo1.png" class="logo" alt=""></a>
        <nav id="nav">
            <li><a href="home.html">Home</a></li>
            <li><a href="products.html">Products</a></li>
            <li><a href="contact.html">Contact</a></li>
            <li><a href="about.html">About Us</a></li>
            <div class="user-actions">
                <a href="#" class="log">LOGIN</a>
                <a href="#" class="sign">SIGN UP</a>
            </div>
            <li><a href="basket.html"><i class="fa-solid fa-cart-shopping"></i></a></li>
           
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