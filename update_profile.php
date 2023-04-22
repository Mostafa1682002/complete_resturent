<?php
$titlepage = "Update Profile";
session_start();
include_once("components/connection.php");
include_once("components/user_session.php");
include_once("components/function.php");

$user_update = $connection->query("SELECT * FROM `users` WHERE `user_id`=$user_id");
$user_update = $user_update->fetch(PDO::FETCH_ASSOC);

if (isset($_POST['update_profile'])) {
   $new_name = $_POST['name'];
   $new_email = $_POST['email'];
   $new_number = $_POST['number'];
   $old_pass = $_POST['old_pass'];
   $new_pass = $_POST['new_pass'];
   $confirm_pass = $_POST['confirm_pass'];
   if (sha1($old_pass) == $user_update['user_password']) {
      if (empty($new_pass)) {
         $update = $connection->query("UPDATE `users` SET `user_name`='$new_name' , `user_email`='$new_email' ,`user_number`='$new_number' WHERE `user_id`=$user_id");
         if ($update) {
            $_SESSION['user_name'] = $new_name;
            $message[] = "Sucssed Update Your Profile";
            $user_update = $connection->query("SELECT * FROM `users` WHERE `user_id`=$user_id");
            $user_update = $user_update->fetch(PDO::FETCH_ASSOC);
         }
      }
   } else {
      $message[] = "Password Wrong ...!";
   }
}

?>


<?php include_once("components/user_navbar.php"); ?>
<section class="form-container">
   <form action="" method="POST">
      <h3>update profile</h3>
      <input type="text" required maxlength="50" name="name" placeholder="enter your name" class="box" value="<?php echo $user_update['user_name'] ?>">
      <input type="email" required maxlength="50" name="email" placeholder="enter your email" class="box" oninput="this.value = this.value.replace(/\s/g, '')" value="<?php echo $user_update['user_email'] ?>">
      <input type="numner" placeholder="enter your number" required class="box" name="number" value="<?php echo $user_update['user_number'] ?>">
      <input type="password" name="old_pass" required placeholder="enter your old password" class="box" oninput="this.value = this.value.replace(/\s/g, '')">
      <input type="password" maxlength="30" name="new_pass" placeholder="enter your new password" class="box" oninput="this.value = this.value.replace(/\s/g, '')">
      <input type="password" maxlength="30" name="confirm_pass" placeholder="confirm your new password" class="box" oninput="this.value = this.value.replace(/\s/g, '')">
      <input type="submit" value="update now" class="btn" name="update_profile">
   </form>
</section>

<?php
include_once("components/user_footer.php");
?>