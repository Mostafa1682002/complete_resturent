<?php
if (isset($message)) {
    foreach ($message as $message) {
        echo '
      <div class="message">
         <span>' . $message . '</span>
         <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
      </div>
      ';
    }
}

$count_product_in_cart;
if (isset($_SESSION['cart'])) {
    $count_product_in_cart = count($_SESSION['cart']);
} else {
    $count_product_in_cart = 0;
}

?>

<header class="header">
    <section class="flex">
        <a href="index.php" class="logo">
            <img src="images/logo.jpg" alt="">
            <h4>Shelter</h4>
        </a>
        <nav class="navbar">
            <a href="index.php">Home</a>
            <a href="about.php">About</a>
            <a href="menu.php">Menu</a>
            <a href="orders.php">Orders</a>
            <a href="contact.php">Contact</a>
        </nav>
        <div class="icons">
            <a href="search.php"><i class="fas fa-search"></i></a>
            <a href="cart.php"><i class="fas fa-shopping-cart"></i><span>(<?php echo $count_product_in_cart ?>)</span></a>
            <div id="user-btn" class="fas fa-user"></div>
            <div id="menu-btn" class="fas fa-bars"></div>
        </div>
        <div class="profile">
            <?php if (isset($_SESSION['user_id'])) { ?>
                <p class="name"><?php echo $_SESSION['user_name'] ?></p>
                <div class="flex">
                    <a href="profile.php" class="btn">Profile</a>
                    <a href="components/user_logout.php" class="delete-btn">Logout</a>
                </div>
            <?php } else { ?>
                <p class="name">Please Login First!</p>
                <div class="flex">
                    <a href="profile.php" class="btn">login</a>
                    <a href="register.php" class="btn">register</a>
                </div>
                <a href="admin/admin_login.php" class="btn">Admin Only</a>
            <?php } ?>
        </div>
    </section>
</header>