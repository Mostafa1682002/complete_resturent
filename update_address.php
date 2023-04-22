<?php
$titlepage = "Update Address";
session_start();
include_once("components/connection.php");
include_once("components/user_session.php");
include_once("components/function.php");
$user_update = $connection->query("SELECT * FROM `users` WHERE `user_id`=$user_id");
$user_update = $user_update->fetch(PDO::FETCH_ASSOC);
$address = explode('-', $user_update['user_address']);


if (isset($_POST['update_Adress'])) {
   $new_address = implode("-", array_slice($_POST, 0, 3));
   $update_address = $connection->query("UPDATE `users` SET `user_address`='$new_address' WHERE `user_id`=$user_id");
   if ($update_address) {
      $message[] = "Sucssed Update Your Address";
      $user_update = $connection->query("SELECT * FROM `users` WHERE `user_id`=$user_id");
      $user_update = $user_update->fetch(PDO::FETCH_ASSOC);
      $address = explode('-', $user_update['user_address']);
   }
}
?>



<?php include_once("components/user_navbar.php"); ?>
<section class="form-container">

   <form action="" method="post">
      <h3>your address</h3>
      <input type="text" maxlength="50" value="<?php echo $address[0] ?>" placeholder="flat no. and building name" required class="box" name="flat">
      <input type="text" maxlength="50" value="<?php echo $address[1] ?>" placeholder="street name" required class="box" name="street">
      <input type="text" maxlength="50" value="<?php echo $address[2] ?>" placeholder="city name" required class="box" name="city">
      <button type="submit" class="btn" name="update_Adress">save address</button>
   </form>

</section>
<?php
include_once("components/user_footer.php");
?>