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