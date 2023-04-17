<?php
$titlepage = "Login";
session_start();
include_once("components/connection.php");
include_once("components/function.php");
if (isset($_SESSION['user_id'])) {
   header('location: index.php');
   exit();
}

if (isset($_POST['login'])) {
   $email = $_POST['email'];
   $password = sha1($_POST['password']);
   $user_login = $connection->query("SELECT * FROM `users` WHERE `user_email`='$email' AND `user_password`='$password'");
   if ($user_login->rowCount() > 0) {
      $user = $user_login->fetch(PDO::FETCH_ASSOC);
      $_SESSION['user_name'] = $user['user_name'];
      $_SESSION['user_id'] = $user['user_id'];
      header('location: index.php');
      exit();
   } else {
      $message[] = "Email Or Password Wrong !";
   }
}
?>

<?php include_once("components/user_navbar.php"); ?>
<section class="form-container">
   <form action="" method="post">
      <h3>login now</h3>
      <input type="email" required maxlength="50" name="email" placeholder="enter your email" class="box" oninput="this.value = this.value.replace(/\s/g, '')">
      <input type="password" required maxlength="20" name="password" placeholder="enter your password" class="box" oninput="this.value = this.value.replace(/\s/g, '')">
      <input type="submit" value="login now" class="btn" name="login">
      <p>Don't Have an Account? <a href="register.php">Register Now</a></p>
   </form>

</section>
<?php
include_once("components/user_footer.php");
?>