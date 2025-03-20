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

//temporary database, used for basket and search
let listProducts = [
    {
        "name": "Canada Goose Bomber",
        "price": 1375,
        "image": "img/product1grey.png",
        "summary": "Chilliwack Bomber Heritage",                      //these onwards are only for the search page, not basket page  
        "alt": "Product 1"      
    },
    {
        "name": "Moncler Jacket",
        "price": 765,
        "image": "img/product2black.png",
        "summary": "Moncler New Maya Down Jacket",                      //these onwards are only for the search page, not basket page
        "alt": "Product 2"      

    },
    {
        "name": "The North Face Puffer",
        "price": 315,
        "image": "img/product3cream.png",
        "summary": "The North Face Puffer",                      //these onwards are only for the search page, not basket page
        "alt": "Product 2"      

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
//after loading search page
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


// Basket functionality and product page interaction, also used for search bar data for now


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
