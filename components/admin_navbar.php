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
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($titlepage) && !empty($titlepage) ? $titlepage : "Resturant" ?></title>
    <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />
    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <!-- custom css file link  -->
    <link rel="stylesheet" href="../css/admin_style.css">
</head>

<body>

    <header class="header">
        <section class="flex">
            <a href="dashboard.php" class="logo">Admin<span>Panel</span></a>
            <nav class="navbar">
                <a href="dashboard.php">Home</a>
                <a href="products.php">Products</a>
                <a href="placed_orders.php">Orders</a>
                <a href="admin_accounts.php">Admins</a>
                <a href="users_accounts.php">Users</a>
                <a href="messages.php">Messages</a>
            </nav>
            <div class="icons">
                <div id="menu-btn" class="fas fa-bars"></div>
                <div id="user-btn" class="fas fa-user"></div>
            </div>
            <div class="profile">
                <p><?php echo isset($_SESSION['admin_name']) ? $_SESSION['admin_name'] : '' ?></p>
                <a href="update_profile.php" class="btn">update profile</a>
                <div class="flex-btn">
                    <a href="admin_login.php" class="option-btn">login</a>
                    <a href="register_admin.php" class="option-btn">register</a>
                </div>
                <a href="../components/admin_logout.php" onclick="return confirm('logout from this website?');" class="delete-btn">logout</a>
            </div>

        </section>

    </header>