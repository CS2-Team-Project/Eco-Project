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

// Add to Basket button
document.querySelectorAll('.add-to-basket').forEach((button) => {
    button.addEventListener('click', () => {
        const productCard = button.closest('.product-card'); // Get parent card
        const productName = productCard.querySelector('h3').innerText; // Product name
        const productPrice = productCard.querySelector('.price').innerText; // Product price
        const productImage = productCard.querySelector('img').src; // Product image
        const selectedSize = productCard.querySelector('.size.selected'); // Selected size

        if (!selectedSize) {
            alert('Please select a size before adding to the basket!');
            return;
        }

        // Store the product data
        const basket = JSON.parse(localStorage.getItem('basket')) || [];
        basket.push({
            name: productName,
            price: productPrice,
            image: productImage,
            size: selectedSize.innerText
        });

        localStorage.setItem('basket', JSON.stringify(basket));
        alert('Product added to basket!');
    });
});

// Open the products page when the "Shop Now" button is clicked
document.querySelector("#herobanner button").addEventListener("click", function () {
    // Open 'products.html' page in a new tab
    window.open('products.html', '_blank');
});
