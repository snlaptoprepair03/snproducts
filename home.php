<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

session_start();
include "db.php";

$result = mysqli_query($conn, "SELECT * FROM products ORDER BY id DESC");

?>

<!DOCTYPE html>
<html>

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>SN Laptop Repair</title>

    <style>

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f3f4f6;
            color: #111827;
        }

        /* HERO */

        .hero {
            background: linear-gradient(135deg, #111827, #374151);
            color: white;
            text-align: center;
            padding: 55px 20px;
        }

        .hero-icon {
    margin-bottom: 10px;
}

.hero-icon img {
    width: 110px;
    height: 110px;
    object-fit: contain;
}

        .hero h1 {
            margin: 0;
            font-size: 38px;
        }

        .hero p {
            margin: 12px 0;
            font-size: 17px;
            color: #e5e7eb;
        }

        .location {
            font-weight: bold;
            margin-top: 15px !important;
        }

        /* ADMIN */

        .admin-panel {
            background: white;
            padding: 20px;
            text-align: center;
            border-bottom: 1px solid #e5e7eb;
        }

        .admin-btn {
            display: inline-block;
            padding: 11px 18px;
            margin: 5px;
            color: white;
            text-decoration: none;
            border-radius: 9px;
            font-weight: bold;
        }

        .dashboard-btn {
            background: #2563eb;
        }

        .add-btn {
            background: #111827;
        }

        .logout-btn {
            background: #dc2626;
        }

        .login-btn {
            background: #111827;
        }
        
/* SERVICES */

.services-section {
    background: white;
    padding: 45px 20px;
}

.services {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
    gap: 20px;
    max-width: 1100px;
    margin: auto;
}

.service-card {
    background: #f9fafb;
    padding: 25px 18px;
    border-radius: 16px;
    text-align: center;
    border: 1px solid #e5e7eb;
    transition: 0.3s;
}

.service-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 20px rgba(0,0,0,0.10);
}

.service-icon {
    font-size: 42px;
    margin-bottom: 10px;
}

.service-card h3 {
    margin: 8px 0;
    font-size: 19px;
}

.service-card p {
    color: #6b7280;
    line-height: 1.5;
    margin: 0;
}
        

        /* PRODUCTS */

        .products-section {
            padding: 35px 20px 50px;
        }

        .section-title {
            text-align: center;
            margin-bottom: 30px;
        }

        .section-title h2 {
            font-size: 30px;
            margin: 0 0 8px;
        }

        .section-title p {
            color: #6b7280;
            margin: 0;
        }

        .products {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(230px, 1fr));
            gap: 25px;
            max-width: 1100px;
            margin: auto;
        }

        .product-card {
            background: white;
            border-radius: 18px;
            padding: 18px;
            text-align: center;
            box-shadow: 0 5px 20px rgba(0,0,0,0.10);
            transition: 0.3s;
            overflow: hidden;
        }

        .product-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.15);
        }

        .product-image {
            width: 100%;
            height: 210px;
            object-fit: contain;
            border-radius: 12px;
            margin-bottom: 12px;
        }

        .product-card h3 {
            margin: 8px 0;
            font-size: 20px;
        }

        .description {
            color: #6b7280;
            min-height: 45px;
            line-height: 1.5;
        }

        .price {
            font-size: 21px;
            font-weight: bold;
            margin: 15px 0;
        }

        /* ORDER */

        .order-btn {
            width: 100%;
            border: none;
            background: #25D366;
            color: white;
            padding: 12px;
            border-radius: 9px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
        }

        .order-btn:hover {
            opacity: 0.85;
        }

        .order-options {
            display: none;
            margin-top: 15px;
            padding: 15px;
            background: #f3f4f6;
            border-radius: 12px;
        }

        .order-options h3 {
            margin-top: 0;
            font-size: 17px;
        }

        .order-link {
            display: block;
            margin: 8px 0;
            padding: 10px;
            color: white;
            text-decoration: none;
            border-radius: 8px;
            font-weight: bold;
        }

        .whatsapp {
            background: #25D366;
        }

        .instagram {
            background: #E1306C;
        }

        .facebook {
            background: #1877F2;
        }

        /* ADMIN PRODUCT BUTTONS */

        .edit-btn,
        .delete-btn {
            display: block;
            margin-top: 10px;
            padding: 10px;
            color: white;
            text-decoration: none;
            border-radius: 8px;
            font-weight: bold;
        }

        .edit-btn {
            background: #2563eb;
        }

        .delete-btn {
            background: #dc2626;
        }

        /* NO PRODUCT */

        .no-products {
            text-align: center;
            background: white;
            padding: 30px;
            border-radius: 15px;
            max-width: 600px;
            margin: auto;
            color: #6b7280;
        }

        /* FOOTER */

        footer {
            background: #111827;
            color: white;
            text-align: center;
            padding: 25px 15px;
        }

        footer p {
            margin: 5px;
        }

        /* MOBILE */

        @media (max-width: 600px) {

            .hero {
                padding: 40px 15px;
            }

            .hero h1 {
                font-size: 30px;
            }

            .hero-icon {
                font-size: 45px;
            }

            .products-section {
                padding: 30px 15px 40px;
            }

            .section-title h2 {
                font-size: 26px;
            }

            .products {
                grid-template-columns: 1fr;
            }

            .product-card {
                max-width: 400px;
                width: 100%;
                margin: auto;
            }

        }
/* CONTACT */

.contact-box {
    display: flex;
    gap: 10px;
    max-width: 900px;
    margin: auto;
    background: white;
    padding: 15px;
    border-radius: 15px;
}

.contact-item {
    flex: 1;
    text-align: center;
    padding: 10px;
}

.contact-item p {
    display: none;
}

.contact-icon {
    font-size: 28px;
}

.contact-btn {
    display: block;
    margin-top: 8px;
    padding: 10px 5px;
    color: white;
    text-decoration: none;
    border-radius: 8px;
    font-weight: bold;
}

.contact-btn {
    display: block;
    margin-top: 15px;
    padding: 11px;
    color: white;
    text-decoration: none;
    border-radius: 9px;
    font-weight: bold;
}

.whatsapp-btn {
    background: #25D366;
}

.instagram-btn {
    background: #E1306C;
}

.facebook-btn {
    background: #1877F2;
}
  
.contact-box {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 20px;
    max-width: 1100px;
    margin: auto;
}

.contact-box {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 15px;
    max-width: 1100px;
    margin: auto;
}

@media (max-width: 700px) {
    .contact-box {
        grid-template-columns: 1fr;
    }
}
 
/* NAVIGATION */

.navbar {
    background: #111827;
    padding: 14px 25px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    border-bottom: 3px solid #ef4444;
}

.nav-logo {
    font-size: 20px;
    font-weight: bold;
    color: white;
}

.nav-logo {
    display: flex;
    align-items: center;
    gap: 8px;
}

.nav-logo img {
    width: 38px;
    height: 38px;
    object-fit: contain;
}

.nav-links {
    display: flex;
    align-items: center;
    gap: 8px;
}

.nav-links a {
    text-decoration: none;
    color: white;
    font-weight: bold;
    padding: 9px 13px;
    border-radius: 8px;
    transition: 0.3s;
}

.nav-links a:hover {
    background: #ef4444;
}


/* MOBILE */

@media (max-width: 600px) {

    .navbar {
        padding: 12px 10px;
        flex-direction: column;
        gap: 10px;
    }

    .nav-logo {
        font-size: 18px;
    }

    .nav-links {
        width: 100%;
        justify-content: center;
        gap: 4px;
    }

    .nav-links a {
        font-size: 12px;
        padding: 8px 9px;
    }

}

/* REVIEWS */

.reviews-section {
    background: white;
    padding: 45px 20px 55px;
}

.reviews {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 20px;
    max-width: 1100px;
    margin: auto;
}

.review-card {
    background: #f9fafb;
    padding: 25px 20px;
    border-radius: 16px;
    text-align: center;
    border: 1px solid #e5e7eb;
    box-shadow: 0 5px 18px rgba(0,0,0,0.08);
}

.stars {
    font-size: 20px;
    margin-bottom: 12px;
}

.review-card p {
    color: #6b7280;
    line-height: 1.5;
}

.review-card h3 {
    margin-top: 15px;
    font-size: 16px;
}


/* MOBILE */

@media (max-width: 600px) {

    .reviews {
        grid-template-columns: 1fr;
    }

}

/* PRODUCT SEARCH */

.search-box {
    max-width: 600px;
    margin: 0 auto 25px;
}

.search-box input {
    width: 100%;
    padding: 14px 18px;
    border: 1px solid #d1d5db;
    border-radius: 12px;
    font-size: 16px;
    outline: none;
    background: white;
}

.search-box input:focus {
    border-color: #2563eb;
    box-shadow: 0 0 0 3px rgba(37,99,235,0.10);
}

.details-btn {
    display: inline-block;
    margin-top: 10px;
    padding: 10px 18px;
    background: #111827;
    color: white;
    text-decoration: none;
    border-radius: 8px;
    font-weight: bold;
    transition: 0.3s;
}

.details-btn:hover {
    background: #ef4444;
}

.cart-btn {
    display: inline-block;
    margin-top: 10px;
    padding: 10px 18px;
    background: #2563eb;
    color: white;
    border: none;
    border-radius: 8px;
    font-weight: bold;
    cursor: pointer;
    transition: 0.3s;
}

.cart-btn:hover {
    background: #1d4ed8;
}

.quantity-control {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 12px;
    margin: 10px 0;
}

.quantity-control button {
    width: 32px;
    height: 32px;
    border: none;
    border-radius: 7px;
    background: #2563eb;
    color: white;
    font-size: 20px;
    font-weight: bold;
    cursor: pointer;
}

.quantity-control span {
    min-width: 25px;
    text-align: center;
    font-weight: bold;
    font-size: 17px;
}

.footer-logo {
    width: 70px;
    height: 70px;
    object-fit: contain;
    margin-bottom: 10px;
}
 </style>

</head>

<body>

<!-- NAVIGATION -->

<nav class="navbar">

    <div class="nav-logo">
    <img src="logo.png" alt="SN Laptop Repair Logo">
    SN Laptop Repair
</div>

    <div class="nav-links">

        <a href="#home">Home</a>

        <a href="#services">Services</a>

        <a href="#products">Products</a>
        
        <a href="#reviews">Reviews</a>

        <a href="#contact">Contact</a>

       <a href="#cart" onclick="showCart()">🛒 Cart</a>

    </div>

</nav>


<!-- HERO -->

<section class="hero"id="home">

    <div class="hero-icon">
    <img src="logo.png" alt="SN Laptop Repair Logo">
</div>

    <h1>
        SN Laptop Repair
    </h1>

    <p>
        Laptop troubles? We've got the fix!
    </p>

    <p>
        From software issues to hardware repairs — reliable laptop service.
    </p>

    <p class="location">
        📍 Bansagopal, Bhaktapur
    </p>

</section>


<!-- ADMIN PANEL -->

<?php if (isset($_SESSION['admin']) && $_SESSION['admin'] === true) { ?>

<div class="admin-panel">

    <a href="admin_dashboard.php"
       class="admin-btn dashboard-btn">
        📊 Admin Dashboard
    </a>

    <a href="add_product.php"
       class="admin-btn add-btn">
        ➕ Add Product
    </a>

    <a href="admin_logout.php"
       class="admin-btn logout-btn">
        🔓 Logout
    </a>

</div>

<?php } else { ?>

<div class="admin-panel">

    <a href="admin_login.php"
       class="admin-btn login-btn">
        🔐 Admin Login
    </a>

</div>

<?php } ?>

<!-- SERVICES -->

<section class="services-section" id="services">
    <div class="section-title">

        <h2>
            🔧 Our Services
        </h2>

        <p>
            Reliable solutions for your laptop problems
        </p>

    </div>


    <div class="services">

        <div class="service-card">

            <div class="service-icon">
                💻
            </div>

            <h3>
                Laptop Repair
            </h3>

            <p>
                Complete laptop hardware and software repair service.
            </p>

        </div>


        <div class="service-card">

            <div class="service-icon">
                🪟
            </div>

            <h3>
                Windows Installation
            </h3>

            <p>
                Windows installation, formatting and software setup.
            </p>

        </div>


        <div class="service-card">

            <div class="service-icon">
                🔧
            </div>

            <h3>
                Hardware Repair
            </h3>

            <p>
                Keyboard, hinge, charging and other hardware repairs.
            </p>

        </div>


        <div class="service-card">

            <div class="service-icon">
                🧹
            </div>

            <h3>
                Cleaning & Maintenance
            </h3>

            <p>
                Laptop cleaning, thermal maintenance and performance care.
            </p>

        </div>


        <div class="service-card">

            <div class="service-icon">
                💾
            </div>

            <h3>
                Data Recovery
            </h3>

            <p>
                Help with recovering important files and data.
            </p>

        </div>


        <div class="service-card">

            <div class="service-icon">
                ⚡
            </div>

            <h3>
                Laptop Upgrade
            </h3>

            <p>
                RAM, SSD and other performance upgrades for laptops.
            </p>

        </div>

    </div>

</section>

<!-- PRODUCTS -->

<section class="products-section" id="products">

    <div class="section-title">

        <h2>
            🛍️ Our Products
        </h2>

        <p>
            Quality products for your laptop needs
        </p>

    </div>

<div class="search-box">

    <input
        type="text"
        id="productSearch"
        placeholder="🔎 Search products..."
        onkeyup="searchProducts()"
    >

</div>
   
 <div class="products">


    <?php if (mysqli_num_rows($result) > 0) { ?>


        <?php while ($row = mysqli_fetch_assoc($result)) { ?>


        <div class="product-card">


            <?php if (!empty($row['image'])) { ?>

                <img
                    class="product-image"
                    src="uploads/<?php echo htmlspecialchars($row['image']); ?>"
                    alt="<?php echo htmlspecialchars($row['name']); ?>"
                >

            <?php } ?>


            <h3>
                <?php echo htmlspecialchars($row['name']); ?>
            </h3>


            <p class="description">
                <?php echo htmlspecialchars($row['description']); ?>
            </p>


            <div class="price">
                Rs. <?php echo htmlspecialchars($row['price']); ?>
            </div>
            <a href="product_details.php?id=<?php echo (int)$row['id']; ?>" class="details-btn">
    👁️ View Details
</a>

           <button
    class="cart-btn"
    onclick="addToCart(
        <?php echo (int)$row['id']; ?>,
        '<?php echo htmlspecialchars($row['name'], ENT_QUOTES); ?>',
        '<?php echo htmlspecialchars($row['price'], ENT_QUOTES); ?>'
    )">
    🛒 Add to Cart
</button>

            <button
                class="order-btn"
                onclick="showOrderOptions(
                    <?php echo (int)$row['id']; ?>,
                    '<?php echo htmlspecialchars($row['name'], ENT_QUOTES); ?>',
                    '<?php echo htmlspecialchars($row['price'], ENT_QUOTES); ?>'
                )"
            >
                🛒 Order Now
            </button>


            <!-- ORDER OPTIONS -->

            <div
                id="orderOptions-<?php echo (int)$row['id']; ?>"
                class="order-options"
            >

                <h3>
                    Choose Order Method
                </h3>


                <a
                    id="whatsappOrder-<?php echo (int)$row['id']; ?>"
                    class="order-link whatsapp"
                    target="_blank"
                >
                    🟢 WhatsApp
                </a>


                <a
                    href="https://www.instagram.com/sn_laptoprepair03?stkn=cnA3MjdnNDdqZHlq"
                    target="_blank"
                    class="order-link instagram"
                >
                    📸 Instagram
                </a>


                <a
                    href="https://www.facebook.com/profile.php?id=61592166577756"
                    target="_blank"
                    class="order-link facebook"
                >
                    🔵 Facebook
                </a>

            </div>


            <!-- ADMIN BUTTONS -->

            <?php if (isset($_SESSION['admin']) && $_SESSION['admin'] === true) { ?>


                <a
                    href="edit_product.php?id=<?php echo (int)$row['id']; ?>"
                    class="edit-btn"
                >
                    ✏️ Edit Product
                </a>


                <a
                    href="delete_product.php?id=<?php echo (int)$row['id']; ?>"
                    onclick="return confirm('Are you sure you want to delete this product?');"
                    class="delete-btn"
                >
                    🗑️ Delete Product
                </a>


            <?php } ?>


        </div>


        <?php } ?>


    <?php } else { ?>


        <div class="no-products">

            <h3>
                📦 No Products Available
            </h3>

            <p>
                New products will be added soon.
            </p>

        </div>


    <?php } ?>


    </div>

</section>

<!-- REVIEWS -->

<section class="reviews-section" id="reviews">

    <div class="section-title">

        <h2>
            ⭐ Customer Reviews
        </h2>

        <p>
            See what our customers say about our service.
        </p>

    </div>


    <div class="reviews">

        <div class="review-card">

            <div class="stars">
                ⭐⭐⭐⭐⭐
            </div>

            <p>
                Great laptop repair service. Fast and reliable!
            </p>

            <h3>
                Happy Customer
            </h3>

        </div>


        <div class="review-card">

            <div class="stars">
                ⭐⭐⭐⭐⭐
            </div>

            <p>
                Good service and quality work. Highly recommended.
            </p>

            <h3>
                Satisfied Customer
            </h3>

        </div>


        <div class="review-card">

            <div class="stars">
                ⭐⭐⭐⭐⭐
            </div>

            <p>
                My laptop was fixed properly and quickly.
            </p>

            <h3>
                Happy Customer
            </h3>

        </div>

    </div>

</section>

<!-- CONTACT -->

<section id="cart" class="cart-section">
    <div class="section-title">
        <h2>🛒 Your Cart</h2>
        <p>Products you selected</p>
    </div>

    <div id="cartItems"></div>

    <h3 id="cartTotal"></h3>

    <button class="checkout-btn" onclick="checkoutCart()">
        🟢 Order All on WhatsApp
    </button>
</section>


<section class="contact-section"id="contact">

    <div class="section-title">

        <h2>
            📲 Contact SN Laptop Repair
        </h2>

        <p>
            Need help with your laptop? Contact us today.
        </p>

    </div>


            <div class="contact-item">

            <div class="contact-icon">🟢</div>

            <h3>WhatsApp</h3>

            <p>
                Chat with us for orders and enquiries.
            </p>

            <a
                href="https://wa.me/9779761118109"
                target="_blank"
                class="contact-btn whatsapp-btn"
            >
                💬 Chat on WhatsApp
            </a>

        </div>


        <div class="contact-item">

            <div class="contact-icon">📸</div>

            <h3>Instagram</h3>

            <p>
                Follow us for latest updates.
            </p>

            <a
                href="https://www.instagram.com/sn_laptoprepair03?stkn=cnA3MjdnNDdqZHlq"
                target="_blank"
                class="contact-btn instagram-btn"
            >
                📸 Visit Instagram
            </a>

        </div>


        <div class="contact-item">

            <div class="contact-icon">🔵</div>

            <h3>Facebook</h3>

            <p>
                Connect with SN Laptop Repair.
            </p>

            <a
                href="https://www.facebook.com/profile.php?id=61592166577756"
                target="_blank"
                class="contact-btn facebook-btn"
            >
                🔵 Visit Facebook
            </a>

        </div>

    </div>

</section>

<!-- FOOTER -->

<footer>

<img src="logo.png" class="footer-logo" alt="SN Laptop Repair Logo">

    <p>
        💻 SN Laptop Repair
    </p>

    <p>
        📍 Bansagopal, Bhaktapur
    </p>

    <p>
        © <?php echo date("Y"); ?> SN Laptop Repair. All rights reserved.
    </p>

</footer>


<script>

function showOrderOptions(productId, productName, price) {

    var options = document.getElementById(
        "orderOptions-" + productId
    );

    var whatsapp = document.getElementById(
        "whatsappOrder-" + productId
    );

    options.style.display = "block";


    var message =
        "Hello SN Laptop Repair!%0A%0A" +
        "🛒 I want to order: " +
        encodeURIComponent(productName) +
        "%0A💰 Price: Rs. " +
        encodeURIComponent(price);


    whatsapp.href =
        "https://wa.me/9779761118109?text=" + message;

}

function searchProducts() {

    var input = document.getElementById("productSearch");

    var searchText = input.value.toLowerCase();

    var products = document.querySelectorAll(".product-card");

    products.forEach(function(product) {

        var productText = product.innerText.toLowerCase();

        if (productText.includes(searchText)) {

            product.style.display = "";

        } else {

            product.style.display = "none";

        }

    });

}
function addToCart(id, name, price) {
    var cart = JSON.parse(localStorage.getItem("snCart")) || [];

    var existing = cart.find(function(item) {
        return item.id === id;
    });

    if (existing) {
        existing.quantity++;
    } else {
        cart.push({
            id: id,
            name: name,
            price: price,
            quantity: 1
        });
    }

    localStorage.setItem("snCart", JSON.stringify(cart));

    alert(name + " added to cart! 🛒");
}

function showCart() {
    var cart = JSON.parse(localStorage.getItem("snCart")) || [];
    var cartItems = document.getElementById("cartItems");
    var cartTotal = document.getElementById("cartTotal");

    if (cart.length === 0) {
        cartItems.innerHTML = "<p>Your cart is empty. 🛒</p>";
        cartTotal.innerHTML = "";
        return;
    }

    var html = "";
    var total = 0;

    cart.forEach(function(item, index) {
        var itemTotal = Number(item.price) * item.quantity;
        total += itemTotal;

        html += `
            <div class="cart-item">
                <strong>${item.name}</strong>
                <div class="quantity-control">
    <button onclick="changeQuantity(${index}, -1)">−</button>
    <span>${item.quantity}</span>
    <button onclick="changeQuantity(${index}, 1)">+</button>
</div>

<span>Rs. ${item.price} × ${item.quantity}</span>
                <button onclick="removeFromCart(${index})">🗑️ Remove</button>
            </div>
        `;
    });

    cartItems.innerHTML = html;
    cartTotal.innerHTML = "Total: Rs. " + total;
}

function changeQuantity(index, amount) {
    var cart = JSON.parse(localStorage.getItem("snCart")) || [];

    cart[index].quantity += amount;

    if (cart[index].quantity <= 0) {
        cart.splice(index, 1);
    }

    localStorage.setItem("snCart", JSON.stringify(cart));

    showCart();
}


function removeFromCart(index) {
    var cart = JSON.parse(localStorage.getItem("snCart")) || [];

    cart.splice(index, 1);

    localStorage.setItem("snCart", JSON.stringify(cart));

    showCart();
}

function checkoutCart() {
    var cart = JSON.parse(localStorage.getItem("snCart")) || [];

    if (cart.length === 0) {
        alert("Your cart is empty! 🛒");
        return;
    }

    var message = "Hello SN Laptop Repair!%0A%0A";
    message += "🛒 My Order:%0A%0A";

    var total = 0;

    cart.forEach(function(item) {
        var itemTotal = Number(item.price) * item.quantity;
        total += itemTotal;

        message +=
            "• " + encodeURIComponent(item.name) +
            " × " + item.quantity +
            " = Rs. " + itemTotal + "%0A";
    });

    message += "%0A💰 Total: Rs. " + total;

    window.open(
        "https://wa.me/9779761118109?text=" + message,
        "_blank"
    );
}
</script>


</body>

</html>