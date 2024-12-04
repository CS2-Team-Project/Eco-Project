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

// Add to Basket button
document.querySelectorAll('.add-to-basket').forEach((button, index) => {
    button.addEventListener('click', () => {
        const productCard = button.closest('.product-card'); 
        const productName = productCard.querySelector('h3').innerText; 
        const productPrice = productCard.querySelector('.price').innerText; 
        const productImage = productCard.querySelector('img').src; 
        const selectedSize = productCard.querySelector('.size.selected'); 
        if (!selectedSize) {
            alert('Please select a size before adding to the basket!');
            return;
        }

        // Store product data
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
