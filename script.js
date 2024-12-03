
//size button selected
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


// Use querySelector to target the first button on the page
document.querySelector("button").addEventListener("click", function () {
    // When the button is clicked, open the 'products.html' page in a new tab
    window.open('products.html', '_blank');
});
