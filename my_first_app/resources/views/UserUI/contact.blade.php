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

    <div class="contact-form">
        <form>
          <h1>Contact</h1>
          <p>Please only use this form for general enquiries.</p>
          <input type="text" id="Name" placeholder="Your Name" required>
          <input type="email" id="email" placeholder="Your Email" required>
          <textarea placeholder="Your message" required></textarea>
          <input type="submit" value="SEND MESSAGE" id="button">
        </form>
    </div>

    

    <footer>
        <div class="container">
            <div class="footer-content" >
                <h3>Contact</h3>
                <p>Email:info.concept@gmail.com</p>
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
