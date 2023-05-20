<?php
session_start();
include '../components/connection.php';
if (isset($_SESSION['admin_name'])) {
   header("Location: dashboard.php");
   exit();
}


if (isset($_POST['admin_login'])) {
   $admin_name = $_POST['admin_name'];
   $admin_pass = $_POST['admin_pass'];
   $hashpass = sha1($admin_pass);


   $login = $connection->query("SELECT * FROM `admin` WHERE `admin_name`='$admin_name' AND `admin_password`='$hashpass' ");
   if ($login->rowCount() > 0) {
      $data = $login->fetch(PDO::FETCH_ASSOC);
      $admin_id = $data['admin_id'];
      //ADD SESSION 
      $_SESSION['admin_name'] = $admin_name;
      $_SESSION['admin_id'] = $admin_id;
      header("Location: dashboard.php");
      exit();
   } else {
      $message[]  = "Username or Password invalid";
   }
}


?>


<!-- admin login form section starts  -->
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin Login</title>
        <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />
        <!-- font awesome cdn link  -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
        <!-- custom css file link  -->
        <link rel="stylesheet" href="../css/admin_style.css">
    </head>

    <body>

        <section class="form-container">
            <form action="" method="POST">
                <h3>Admin Login</h3>
                <input type="text" name="admin_name" placeholder="enter your username" class="box" required>
                <input type="password" name="admin_pass" placeholder="enter your password" class="box" required>
                <input type="submit" value="login now" name="admin_login" class="btn">
            </form>
        </section>
        <!-- admin login form section ends -->
        <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
        <script src="../js/admin_script.js"></script>
    </body>

</html>