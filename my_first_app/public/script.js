

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
//JSON.parrse() is needed to convert from local storage stringify format back to array format to be used as an array 
let basketItems = JSON.parse(localStorage.getItem("basketItems")) || []; 

 const addToCart = (productName, size) => {
    let positionThisProductInBasket = basketItems.findIndex((value) => value.productName == productName && value.size == size) //iterates each item (value) and compares the name, returns the index or -1
    if(basketItems.length <= 0){ //basket is empty
        basketItems = [{
            productName: productName,
            quantity: 1,
            size: size
        }]
    }else if(positionThisProductInBasket < 0){ //basket isnt empty but product doesnt exist
        basketItems.push({
            productName: productName,
            quantity: 1,
            size: size
        })
    }else{    //basket isnt empty and product exists in it already
        basketItems[positionThisProductInBasket].quantity = basketItems[positionThisProductInBasket].quantity + 1;
    } 
    //addCartToHTML(); this will give an error as we are not on the basket page so cannot access the basket-container
    //save to local storage each time
    addCartToMemory();
    console.log(basketItems);
}

 const addCartToHTML = () => {
    listBasketHTML.innerHTML = '';
    if(basketItems.length > 0){
        basketItems.forEach(basketItem => {
            let newBasket = document.createElement('div');
            newBasket.classList.add('item');
            newBasket.dataset.productName = basketItem.productName; //for the eventlistener that calls the changeQuantity() function. to be able to identify which product is clicked
            newBasket.dataset.size = basketItem.size; //same point as above line
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
            <div>
                ${basketItem.size}
            </div>
            <div class="quantity">
                <span class="minus"> < </span>
                <span>${basketItem.quantity}</span>
                <span class="plus"> > </span>
            </div>  
            `;
            listBasketHTML.appendChild(newBasket);
        })
    } else if(basketItems.length == 0){
        document.querySelector('.section-p1').innerHTML +=`
        <h8 class = "empty-basket-message">Your basket is empty!</h8>
        `;
    }
 } 

 const changeQuantity = (productName, size, type) => {
    let positionItemInBasket = basketItems.findIndex((value) => value.productName == productName && value.size == size)
    if(positionItemInBasket >= 0){
        switch (type){
            case 'plus':
                basketItems[positionItemInBasket].quantity = basketItems[positionItemInBasket].quantity + 1;
                break;
            default:
                let valueChange = basketItems[positionItemInBasket].quantity - 1; //if the result is 0 we want to remove the item
                if(valueChange > 0){
                    basketItems[positionItemInBasket].quantity = valueChange;
                }else{
                    basketItems.splice(positionItemInBasket, 1); //parameters: the index and how many u want to delete starting from that index
                }
                break;
        }
    }
    addCartToMemory();
    addCartToHTML(); //to refresh the data on the screen
 }

 //save to local storage
 const addCartToMemory = () => {
    localStorage.setItem('basketItems', JSON.stringify(basketItems));
 }

  //if statement is required as this should all only run after the user goes on to the products page, as the product-container only exists on that page
 if (window.location.pathname.includes("products.html")) {

    let listProductHTML = document.querySelector('.product-container');

    listProductHTML.addEventListener('click', (event) => {
        let positionClick = event.target;
        if(positionClick.classList.contains('add-to-basket')){
            let productCard = positionClick.closest('.product-card');           //gets the closest product from the click 
            let productName = productCard.querySelector('h3').textContent.trim(); //gets the name of that closest product
            
            // Get the size selection for this product
            let sizeButton = productCard.querySelector('.size.selected');
            // Check if a size is selected
            if (!sizeButton) {
                alert('Please select a size before adding to the basket.');
                return;      //Exit the function if no size is selected
            }
            //if it is:
            let size = sizeButton.dataset.size;

            alert(`Product added: ${productName}`);
            addToCart(productName, size);
        }
    }) 
 }

 //if statement is required as this should all only run after the user goes on to the basket page, as the basket-container only exists on that page
 if (window.location.pathname.includes("basket.html")) {

    listBasketHTML = document.querySelector('.basket-container');
    
    addCartToHTML(); // Call addCartToHTML after data is fetched

    listBasketHTML.addEventListener('click', (event) => {
        let positionClick = event.target;
        if(positionClick.classList.contains('minus') || positionClick.classList.contains('plus')){
            let productName = positionClick.parentElement.parentElement.dataset.productName; //we can do this because of line 94 we added
            let size = positionClick.parentElement.parentElement.dataset.size; //same point as above line
            let type = 'minus';
            if(positionClick.classList.contains('plus')){
                type = 'plus';
            }
            changeQuantity(productName, size, type)
        }
    })
    console.log(basketItems)
    document.querySelector('.check-out-button').addEventListener('click', (event) => {
        let positionClick = event.target;
        console.log(basketItems)
        if(positionClick.classList.contains('check-out-button')){
            if(basketItems.length == 0){
            alert('Your Basket is Empty, Navigate Back to the Products Page');
            }
            else {
            window.location.href = "checkout.html";
            }
        }
    })
} 


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

if (window.location.pathname.includes("checkout.html")) {
    const orderSummaryContainer = document.querySelector('.order-summary-container');
    const totalPriceElement = document.getElementById('total-price');

    // Retrieve basket items from local storage
    const basketItems = JSON.parse(localStorage.getItem("basketItems")) || [];
    const listProducts = [
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
        }
    ];

    let total = 0;

    // fill the summary part
    if (basketItems.length > 0) {
        basketItems.forEach(item => {
            const product = listProducts.find(product => product.name === item.productName);
            if (product) {
                const itemTotal = product.price * item.quantity;
                total += itemTotal;

                const itemElement = document.createElement('div');
                itemElement.classList.add('order-item');
                itemElement.innerHTML = `
                    <div class="order-item-details">
                        <img src="${product.image}" alt="${product.name}" style="width: 50px; height: auto;">
                        <p>${product.name} (${item.size})</p>
                    </div>
                    <div class="order-item-quantity">Qty: ${item.quantity}</div>
                    <div class="order-item-price">£${itemTotal}</div>
                `;
                orderSummaryContainer.appendChild(itemElement);
            }
        });
        totalPriceElement.textContent = `Total: £${total}`;
    } else {
        // Show empty order summary 
        orderSummaryContainer.innerHTML = `<p>Your basket is empty.</p>`;
    }
}

 
