

// Select size button
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



// submit order button function
document.getElementById("submit-btn").addEventListener("click", function () {
    const confirmationMessage = document.getElementById("confirmation-message");

    
    const fullName = document.getElementById("fullName").value.trim();
    const address = document.getElementById("address").value.trim();
    const city = document.getElementById("city").value.trim();
    const zip = document.getElementById("zip").value.trim();

    if (fullName && address && city && zip) {
        // If all fields are filled, show the confirmation message
        confirmationMessage.textContent = "Order Confirmed.";
    } else {
        // If any field is missing, show an error
        confirmationMessage.textContent = "Please fill in all fields.";
        confirmationMessage.style.color = "red";
    }
});


//shahzaib's basket page functionality


//was meant to be populated by initApp() but now hardcoding it in
let listProducts = [
    {
        "name":"Canada Goose Bomber",
        "price":1375,
        "image":"img/product1grey.png"
    },
    {
        "name":"Moncler Jacket",
        "price":765,
        "image":"img/product2black.png"
    },
    {
        "name":"The North Face Puffer",
        "price":315,
        "image":"img/product3cream.png"
    }
]



//getting items from local storage so they are retained if the page is refreshed whether on product or basket page
let basketItems = JSON.parse(localStorage.getItem("basketItems")) || [];

 const addToCart = (productName) => {
    let positionThisProductInBasket = basketItems.findIndex((value) => value.productName == productName) //iterates each item (value) and compares the name, returns the index or -1
    if(basketItems.length <= 0){ //basket is empty
        basketItems = [{
            productName: productName,
            quantity: 1
        }]
    }else if(positionThisProductInBasket < 0){ //basket isnt empty but product doesnt exist
        basketItems.push({
            productName: productName,
            quantity: 1
        })
    }else{    //basket isnt empty and product exists in it already
        basketItems[positionThisProductInBasket].quantity = basketItems[positionThisProductInBasket].quantity + 1
    } 
    //addCartToHTML(); this will give an error as we are not on the basket page so cannot access the basket-container
    //save to local storage each time
    localStorage.setItem("basketItems", JSON.stringify(basketItems));
    console.log(basketItems);
}

 const addCartToHTML = () => {
    listBasketHTML.innerHTML = '';
    if(basketItems.length > 0){
        basketItems.forEach(basketItem => {
            let newBasket = document.createElement('div');
            newBasket.classList.add('item');
            //getting the product information from the products table, as right now we are in the basket table which only has productName and quantity
            console.log(listProducts);
            let positionProduct = listProducts.findIndex((value) => value.name == basketItem.productName);
            let info = listProducts[positionProduct];
            newBasket.innerHTML = `
            <img src="${info.image}" alt="">
            <div class="name">
                ${info.name}
            </div>
            <div class="price">
                £${info.price * basketItem.quantity}
            </div>
            <div class="quantity">
                <span class="minus"> < </span>
                <span>${basketItem.quantity}</span>
                <span class="plus"> > </span>
            </div>  
            `;
            listBasketHTML.appendChild(newBasket);
            console.log("running append child");
        })
    }
 } 


  //if statement is required as this should all only run after the user goes on to the products page, as the product-container only exists on that page
 if (window.location.pathname.includes("products.html")) {

    let listProductHTML = document.querySelector('.product-container');

    listProductHTML.addEventListener('click', (event) => {
        let positionClick = event.target;
        if(positionClick.classList.contains('add-to-basket')){
            let productCard = positionClick.closest('.product-card');           //gets the closest product from the click 
            let productName = productCard.querySelector('h3').textContent.trim(); //gets the name of that closest product
            alert(`Product added: ${productName}`);
            addToCart(productName);
        }
    }) 
 }

 //if statement is required as this should all only run after the user goes on to the basket page, as the basket-container only exists on that page
 if (window.location.pathname.includes("basket.html")) {

    listBasketHTML = document.querySelector('.basket-container');
    
    addCartToHTML(); // Call addCartToHTML after data is fetched

} 



 
