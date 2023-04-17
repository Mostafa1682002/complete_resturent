<?php
$titlepage = "Register";
session_start();
include_once("components/connection.php");
include_once("components/function.php");

if (isset($_POST['register_user'])) {
   $user_name = $_POST['name'];
   $user_email = $_POST['email'];
   $user_number = $_POST['number'];
   $user_password = $_POST['password'];
   $confirm_password = $_POST['confirm_password'];

   if ($user_password == $confirm_password) {
      $encypt_password = sha1($password);
      $add_user = $connection->query("INSERT INTO `users`(`user_id`,`user_name`,`user_email`,`user_number`,`user_password`) VALUES(NULL,'$user_name','$user_email','$user_number','$encypt_password')");
      if ($add_user) {
         $message[] = 'sucessed User Added';
      }
   } else {
      $message[] = "Confirm Password Not Match ...!";
   }
}
?>


<?php include_once("components/user_navbar.php"); ?>
<section class="form-container">
   <form action="" method="post">
      <h3>register now</h3>
      <input type="text" required maxlength="20" name="name" placeholder="enter your name" class="box">
      <input type="email" required maxlength="50" name="email" placeholder="enter your email" class="box" oninput="this.value = this.value.replace(/\s/g, '')">
      <input type="numner" placeholder="enter your number" required class="box" name="number">
      <input type="password" required maxlength="30" name="password" placeholder="enter your password" class="box" oninput="this.value = this.value.replace(/\s/g, '')">
      <input type="password" required maxlength="30" name="confirm_password" placeholder="confirm your password" class="box" oninput="this.value = this.value.replace(/\s/g, '')">
      <input type="submit" value="regisetr now" class="btn" name="register_user">
      <p>Already Have an Account? <a href="login.php">login now</a></p>
   </form>

</section>
<?php
include_once("components/user_footer.php");
?>