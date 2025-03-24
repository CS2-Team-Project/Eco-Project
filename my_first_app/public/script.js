// Dark mode functionality
let darkmode = localStorage.getItem('darkmode');
const themeSwitch = document.getElementById('theme-switch');

const enableDarkmode = () => {
    document.body.classList.add('darkmode');
    localStorage.setItem('darkmode', 'active');
};

const disableDarkmode = () => {
    document.body.classList.remove('darkmode');
    localStorage.setItem('darkmode', null);
};

if (darkmode === "active") enableDarkmode();

// Event listener for theme toggle button
themeSwitch.addEventListener("click", (event) => {
    event.preventDefault(); // Prevent the default button behavior
    darkmode = localStorage.getItem('darkmode');
    darkmode !== "active" ? enableDarkmode() : disableDarkmode();
});

// cookies
function acceptCookies() {
    document.cookie = `cookieConsent=true; path=/; max-age=${60 * 60 * 24 * 30}`;
    document.getElementById('cookie-box').style.display = 'none';
}

function closeBox() {
    document.getElementById('cookie-box').style.display = 'none';
}

function checkCookie() {
    if (!document.cookie.includes('cookieConsent=true')) {
        document.getElementById('cookie-box').style.display = 'flex';
    }
}

window.onload = checkCookie;

// Size button functionality
document.querySelectorAll('.size-buttons').forEach(buttonGroup => {
    buttonGroup.addEventListener('click', event => {
        if (event.target.classList.contains('size')) {
            // Remove 'selected' class from all buttons in the group
            buttonGroup.querySelectorAll('.size').forEach(button => {
                button.classList.remove('selected');
            });
            // Add 'selected' class to the clicked button
            event.target.classList.add('selected');
        }
    });
});

let listProducts = [
    {
        "name": "Canada Goose Bomber",
        "price": 1375,
        "image": "img/product1grey.png",
        "summary": "Chilliwack Bomber Heritage",
        "alt": "Product 1"
    },
    {
        "name": "Moncler Jacket",
        "price": 765,
        "image": "img/product2black.png",
        "summary": "Moncler New Maya Down Jacket",
        "alt": "Product 2"
    },
    {
        "name": "The North Face Puffer",
        "price": 315,
        "image": "img/product3cream.png",
        "summary": "The North Face 1996 Retro Nuptse",
        "alt": "Product 3"
    },
    {
        "name": "Alpha Industries Bomber Jacket",
        "price": 200,
        "image": "img/product4.png",
        "summary": "CWU-45 Heritage Bomber Jacket",
        "alt": "Product 4"
    },
    {
        "name": "Uniqlo Down Jacket",
        "price": 110,
        "image": "img/product5.png",
        "summary": "Seamless Down Jacket",
        "alt": "Product 5"
    },
    {
        "name": "Zavetti Puffer",
        "price": 90,
        "image": "img/product6.png",
        "summary": "Zavetti Canada Atlin Puffer Jacket",
        "alt": "Product 6"
    },
    {
        "name": "Columbia Sports Jacket",
        "price": 125,
        "image": "img/product7.png",
        "summary": "Powder Lite™ II Insulated Jacket",
        "alt": "Product 7"
    },
    {
        "name": "Zara Bomber Jacket",
        "price": 185,
        "image": "img/product8.png",
        "summary": "Lightweight Casual Jacket",
        "alt": "Product 8"
    },
    {
        "name": "Mercier Puffer Coat",
        "price": 140,
        "image": "img/product9.png",
        "summary": "Mercier Blizzard Coat",
        "alt": "Product 9"
    },
    {
        "name": "All Saints leather Jacket",
        "price": 490,
        "image": "img/product10.png",
        "summary": "Milo Desserto® Biker Jacket",
        "alt": "Product 10"
    },
    {
        "name": "Evisu Denim Jacket",
        "price": 440,
        "image": "img/product11.png",
        "summary": "Graffiti Prints Regular Fit Denim Jacket",
        "alt": "Product 11"
    },
    {
        "name": "Hugo Boss Leather Jacket",
        "price": 1190,
        "image": "img/product12.png",
        "summary": "Porsche x BOSS regular-fit jacket in leather",
        "alt": "Product 12"
    },
    {
        "name": "The Leather Company Leather Jacket",
        "price": 250,
        "image": "img/product13.png",
        "summary": "Mens Safari Style Leather Jacket Black: AMJ-5",
        "alt": "Product 13"
    },
    {
        "name": "Ralph Lauren Leather Jacket",
        "price": 1660,
        "image": "img/product14.png",
        "summary": "Slim Fit Leather Moto Jacket",
        "alt": "Product 14"
    },
    {
        "name": "Schott NYC Leather Jacket",
        "price": 990,
        "image": "img/product15.png",
        "summary": "Waxed Natural Pebbled Cowhide Café Leather Jacket",
        "alt": "Product 15"
    },
    {
        "name": "Diesel Denim Jacket",
        "price": 540,
        "image": "img/product16.png",
        "summary": "D-BARCY-S3",
        "alt": "Product 16"
    },
    {
        "name": "YSL Denim Jacket",
        "price": 1110,
        "image": "img/product17.png",
        "summary": "Oversized jacket in dark blue black denim",
        "alt": "Product 17"
    },
    {
        "name": "Louis Vitton Denim Jacket",
        "price": 1530,
        "image": "img/product18.png",
        "summary": "DNA Denim Jacket",
        "alt": "Product 18"
    },
    {
        "name": "Ralph Lauren Denim Jacket",
        "price": 270,
        "image": "img/product19.png",
        "summary": "The Bayport Indigo-Dyed Denim Jacket",
        "alt": "Product 19"
    },
    {
        "name": "Canada Goose Puffer",
        "price": 880,
        "image": "img/product20.png",
        "summary": "Crofton Hoody Puffer Jacket",
        "alt": "Product 20"
    },
    {
        "name": "Stone Island Ghost Puffer",
        "price": 1040,
        "image": "img/product21.png",
        "summary": "Ghost Down Puffer Jacket",
        "alt": "Product 21"
    },
    {
        "name": "Versace Couture Bomber",
        "price": 570,
        "image": "img/product22.png",
        "summary": "V-Emblem bomber jacket",
        "alt": "Product 22"
    },
    {
        "name": "Jeff Hamilton Bomber",
        "price": 1055,
        "image": "img/product23.png",
        "summary": "Jeff Hamilton x NBA Collage jacket",
        "alt": "Product 23"
    },
    {
        "name": "Reiss Bomber",
        "price": 260,
        "image": "img/product24.png",
        "summary": "Brushed Wool-Blend Bomber Jacket",
        "alt": "Product 24"
    },
    {
        "name": "Tom Ford Bomber",
        "price": 2000,
        "image": "img/product25.png",
        "summary": "TOM FORD Hazed Gabardine Jacket",
        "alt": "Product 25"
    }
];

//Functon: Check if search results exist, return a boolean and have it called inside an if statement when the addResultsHTML call is
//write a function later, if the results dont exist, just instead of displaying products display a message
//only initiate addResultHTML function if there are results

//generating search page
const addResultsHTML = (searchText) => {
    console.log("D Runs");
    const searchResultsHTML = document.querySelector('.product-container');
    searchResultsHTML.innerHTML = '';
        listProducts.forEach(product => {
            if(product.name.toLowerCase().includes(searchText.toLowerCase())){
                let newResult = document.createElement('div');
                newResult.classList.add('product-card');
                newResult.dataset.productName = product.name;
                newResult.innerHTML = `
                    <img src="${product.image}" alt="${product.alt}">
                    <h3>${product.name}</h3>
                    <p>${product.summary}</p>
                    <p class="price">£${product.price}</p>
                    <div class="size-buttons">
                    <button class="size" data-size="Small">S</button>
                    <button class="size" data-size="Medium">M</button>
                    <button class="size" data-size="Large">L</button>
                    </div>
                    <button class="add-to-basket">Add to Basket</button>            
                            `;
                    searchResultsHTML.appendChild(newResult);
            }
        });
};

//Search bar 
document.addEventListener("DOMContentLoaded", function() {
    let searchInput = document.querySelector('.search-input');
    let searchButton = document.querySelector('.search-btn');

    function performSearch(){
        let searchText = searchInput.value.trim();
        if(searchText) {
            window.location.href ='/search?query=' + encodeURIComponent(searchText);
            //addResultsHTML(searchText);  
            //NOTE: searchText variable is lost after page reloads. then to get the searchText variable to be able to run addResultsHTML we need to extract it from the url of the current page, as the current page is the searched page and it has the searchText variable within it
        }
    }
    searchButton.addEventListener('click', performSearch);
    searchInput.addEventListener('keypress', function(event) {

        if(event.key === "Enter") {
            performSearch();
        }
    });
});

document.addEventListener("DOMContentLoaded", function() {
    if (window.location.pathname === "/search") { 
        console.log("A Runs");
        // Extract search query from URL and display results after page reload
        const urlParams = new URLSearchParams(window.location.search); //an object which stores the url making it easy to extract information
        const searchQuery = urlParams.get('query'); //in the url, the key value pair is query=canada for example
        if (searchQuery) {
            console.log("B Runs");
            console.log(searchQuery);
            //searchInput.value = searchQuery;  //Keep search text in input
            console.log("C Runs");
            addResultsHTML(searchQuery);  //Display search results
        }
    }
 });




// home categories 
document.addEventListener('DOMContentLoaded', function(){
    const urlParams = new URLSearchParams(window.location.search);
    const queryCategory =urlParams.get('category');
    const categorySelect = document.getElementById('category');
    if (queryCategory) {
        categorySelect.value =queryCategory;
        categorySelect.dispatchEvent(new Event('change'));
    }
});
    

//SWIPER CATEGORIES
if (document.querySelector(".categories_container")){
var swiperCategories = new Swiper(".categories_container", {
    spaceBetween: 24,
    loop: true,
    
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
    
    breakpoints: {
      640: {
        slidesPerView: 2,
        spaceBetween: 20,
      },
      768: {
        slidesPerView: 4,
        spaceBetween: 40,
      },
      1400: {
        slidesPerView: 6,
        spaceBetween: 24,
      },
    },
  });
}


// Basket functionality and product page interaction


// Get items from local storage to retain basket on page refresh
let basketItems = JSON.parse(localStorage.getItem("basketItems")) || [];

const addToCart = (productName, size) => {
    let positionThisProductInBasket = basketItems.findIndex((value) => value.productName == productName && value.size == size);
    if (basketItems.length <= 0) { // Basket is empty
        basketItems = [{
            productName: productName,
            quantity: 1,
            size: size
        }];
    } else if (positionThisProductInBasket < 0) { // Basket is not empty but product doesn't exist
        basketItems.push({
            productName: productName,
            quantity: 1,
            size: size
        });
    } else { // Basket is not empty and product exists
        basketItems[positionThisProductInBasket].quantity = basketItems[positionThisProductInBasket].quantity + 1;
    }
    addCartToMemory();
    console.log(basketItems);
};

document.querySelector("#checkout-button").addEventListener("click", () => {
    fetch("/order/store", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute("content")
        },
        body: JSON.stringify({
            cart: basketItems // Ensure `basketItems` contains all product details
        })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert("Order placed successfully!");
            localStorage.removeItem("basketItems"); // Clear cart
            window.location.href = "/home"; // Redirect to home
        } else {
            alert("Error: " + data.error);
        }
    })
    .catch(error => console.error("Error:", error));
});
const displayOrderSummary = () => {
    // Check if we're on the checkout page by checking the URL
    if (window.location.pathname.includes("checkout")) {
        const orderSummaryContainer = document.querySelector('.order-summary-container'); // The element where we want to show the total price

        // Check if the order summary container exists on the page
        if (orderSummaryContainer) {
            let totalPrice = 0;

            // Loop through the basketItems to calculate the total price
            basketItems.forEach(basketItem => {
                const product = listProducts.find(item => item.name === basketItem.productName);
                if (product) {
                    totalPrice += product.price * basketItem.quantity; // Calculate the price for each product in the basket
                }
            });

            // Display the total price in the order summary container
            orderSummaryContainer.innerHTML = `
                <p><strong>Total Price:</strong> £${totalPrice.toFixed(2)}</p>
            `;
        } else {
            console.error("Order summary container not found on the checkout page.");
        }
    }
};

// Call the function when the page loads (only on checkout page)
window.addEventListener('DOMContentLoaded', displayOrderSummary);


const changeQuantity = (productName, size, type) => {
    let positionItemInBasket = basketItems.findIndex((value) => value.productName == productName && value.size == size);
    if (positionItemInBasket >= 0) {
        switch (type) {
            case 'plus':
                basketItems[positionItemInBasket].quantity = basketItems[positionItemInBasket].quantity + 1;
                break;
            default:
                let valueChange = basketItems[positionItemInBasket].quantity - 1;
                if (valueChange > 0) {
                    basketItems[positionItemInBasket].quantity = valueChange;
                } else {
                    basketItems.splice(positionItemInBasket, 1);
                }
                break;
        }
    }
    addCartToMemory();
    addCartToHTML(); // Refresh data on screen
};

// Save to local storage
const addCartToMemory = () => {
    localStorage.setItem('basketItems', JSON.stringify(basketItems));
};

if (window.location.pathname.includes("/product")) {
    let listProductHTML = document.querySelector('.product-container');
    //event listener for add to basket buttons
    listProductHTML.addEventListener('click', (event) => {
        let positionClick = event.target;
        if (positionClick.classList.contains('add-to-basket')) {
            let productCard = positionClick.closest('.product-card');
            let productName = productCard.querySelector('h3').textContent.trim();
            let sizeButton = productCard.querySelector('.size.selected');
            if (!sizeButton) {
                alert('Please select a size before adding to the basket.');
                return;
            }
            let size = sizeButton.dataset.size;
            alert(`Product added: ${productName}`);
            addToCart(productName, size);
        }
    });
}

if (window.location.pathname.includes("/basket")) {
    let listBasketHTML = document.querySelector('.basket-container');
    addCartToHTML(); // Call after data is fetched
    //event listener for changing quantity
    listBasketHTML.addEventListener('click', (event) => {
        let positionClick = event.target;
        if (positionClick.classList.contains('minus') || positionClick.classList.contains('plus')) {
            let productName = positionClick.parentElement.parentElement.dataset.productName;
            let size = positionClick.parentElement.parentElement.dataset.size;
            let type = 'minus';
            if (positionClick.classList.contains('plus')) {
                type = 'plus';
            }
            changeQuantity(productName, size, type);
        }
    });

    document.querySelector('.check-out-button').addEventListener('click', (event) => {
        let positionClick = event.target;
        if (positionClick.classList.contains('check-out-button')) {
            if (basketItems.length == 0) {
                alert('Your Basket is Empty, Navigate Back to the Products Page');
            } else {
                window.location.href = "/checkout";
            }
        }
    });
}

// Checkout submit order functionality
document.getElementById("submit-btn").addEventListener("click", function () {
    const confirmationMessage = document.getElementById("confirmation-message");

    const fullName = document.getElementById("fullName").value.trim();
    const address = document.getElementById("address").value.trim();
    const city = document.getElementById("city").value.trim();
    const zip = document.getElementById("zip").value.trim();

    if (fullName && address && city && zip) {
        confirmationMessage.textContent = "Order Confirmed.";
    } else {
        confirmationMessage.textContent = "Please fill in all fields.";
        confirmationMessage.style.color = "red";
    }
});

// Open the products page when the "Shop Now" button is clicked
document.querySelector("#herobanner button").addEventListener("click", function () {
    window.open("{{ route('products') }}", '_blank');
});

document.addEventListener("DOMContentLoaded", function() {
    const menu = document.querySelector(".nav-links");
    const hamburger = document.querySelector(".hamburger");

    if (menu && hamburger) {
        hamburger.addEventListener("click", function() {
            menu.classList.toggle("show");
        });
    } else {
        console.error("Hamburger menu or nav-links not found!");
    }
});
function toggleSidebar() {
    var nav = document.getElementById("nav");
    if (nav.className === "nav") {
      nav.className += " responsive";
    } else {
      nav.className = "nav";
    }
  }
  