<?php
$titlepage = "Admin Login";
include '../components/connection.php';
session_start();
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
<?php
include '../components/admin_navbar.php';
?>

<section class="form-container">
   <form action="" method="POST">
      <h3>Admin Login</h3>
      <input type="text" name="admin_name" placeholder="enter your username" class="box" required>
      <input type="password" name="admin_pass" placeholder="enter your password" class="box" required>
      <input type="submit" value="login now" name="admin_login" class="btn">
   </form>
</section>
<!-- admin login form section ends -->
<?php include '../components/admin_footer.php' ?>