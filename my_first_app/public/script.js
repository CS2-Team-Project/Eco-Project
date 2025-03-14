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

//Search bar 
document.addEventListener("DOMContentLoaded", function() {
    let searchInput = document.querySelector('.search-input');
    let searchButton = document.querySelector('.search-btn');

    function performSearch(){
        let searchText = searchInput.value.trim();
        if(searchText) {
            window.location.href ='/search?query=' + encodeURIComponent(searchText);
        }
    }
    searchButton.addEventListener('click', performSearch);
    searchInput.addEventListener('keypress', function (event) {
        if(event.key === "Enter") {
            performSearch();
        }
    });
});

// Basket functionality and product page interaction
let listProducts = [
    {
        "name": "Canada Goose Bomber",
        "price": 1375,
        "image": "img/product1grey.png"
    },
    {
        "name": "Moncler Jacket",
        "price": 765,
        "image": "img/product2black.png"
    },
    {
        "name": "The North Face Puffer",
        "price": 315,
        "image": "img/product3cream.png"
    },
    {
        "name": "Alpha Industries Bomber Jacket",
        "price": 200,
        "image": "img/product4.png"
    },
    {
        "name": "Uniqlo Down Jacket",
        "price": 110,
        "image": "img/product5.png"
    },
    {
        "name": "Zavetti Puffer",
        "price": 90,
        "image": "img/product6.png"
    },
    {
        "name": "Columbia Sports Jacket",
        "price": 125,
        "image": "img/product7.png"
    },
    {
        "name": "Zara Bomber Jacket",
        "price": 185,
        "image": "img/product8.png"
    },
    {
        "name": "Mercier Puffer Coat",
        "price": 140,
        "image": "img/product9.png"
    },
    {
        "name": "All Saints leather Jacket",
        "price": 490,
        "image": "img/product10.png"
    },
    {
        "name": "Evisu Denim Jacket",
        "price": 440,
        "image": "img/product11.png"
    },
    {
        "name": "Hugo Boss Leather Jacket",
        "price": 1190,
        "image": "img/product12.png"
    },
    {
        "name": "The Leather Company Leather Jacket",
        "price": 250,
        "image": "img/product13.png"
    },
    {
        "name": "Ralph Lauren Leather Jacket",
        "price": 1660,
        "image": "img/product14.png"
    },
    {
        "name": "Schott NYC Leather Jacket",
        "price": 990,
        "image": "img/product15.png"
    },
    {
        "name": "Diesel Denim Jacket",
        "price": 540,
        "image": "img/product16.png"
    },
    {
        "name": "YSL Denim Jacket",
        "price": 1110,
        "image": "img/product17.png"
    },
    {
        "name": "Louis Vitton Denim Jacket",
        "price": 1530,
        "image": "img/product18.png"
    },
    {
        "name": "Ralph Lauren Denim Jacket",
        "price": 270,
        "image": "img/product19.png"
    },
    {
        "name": "Canada Goose Puffer",
        "price": 880,
        "image": "img/product20.png"
    },
    {
        "name": "Stone Island GHost Puffer",
        "price": 1040,
        "image": "img/product21.png"
    },
    {
        "name": "Versace Couture Bomber",
        "price": 570,
        "image": "img/product22.png"
    },
    {
        "name": "Jeff Hamilton Bomber",
        "price": 1055,
        "image": "img/product23.png"
    },
    {
        "name": "Reiss Bomber",
        "price": 260,
        "image": "img/product24.png"
    },
    {
        "name": "Tom Ford Bomber",
        "price": 2000,
        "image": "img/product25.png"
    },
];

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

const addCartToHTML = () => {
    const listBasketHTML = document.querySelector('.basket-container');
    listBasketHTML.innerHTML = '';
    if (basketItems.length > 0) {
        basketItems.forEach(basketItem => {
            let newBasket = document.createElement('div');
            newBasket.classList.add('item');
            newBasket.dataset.productName = basketItem.productName;
            newBasket.dataset.size = basketItem.size;
            let positionProduct = listProducts.findIndex((value) => value.name == basketItem.productName);
            let info = listProducts[positionProduct];
            newBasket.innerHTML = `
                <img src="${info.image}" alt="">
                <div class="name">${info.name}</div>
                <div class="price">£${info.price * basketItem.quantity}</div>
                <div>${basketItem.size}</div>
                <div class="quantity">
                    <span class="minus"> < </span>
                    <span>${basketItem.quantity}</span>
                    <span class="plus"> > </span>
                </div>  
            `;
            listBasketHTML.appendChild(newBasket);
        });
    } else if (basketItems.length == 0) {
        document.querySelector('.section-p1').innerHTML += `
        <h8 class = "empty-basket-message">Your basket is empty!</h8>
        `;
    }
};

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
