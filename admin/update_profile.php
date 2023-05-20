<?php
include_once("../components/admin_session.php");
include '../components/connection.php';
include '../components/function.php';

$user = $connection->query("SELECT * FROM `admin` WHERE `admin_id`=$admin_id AND `admin_name`='$admin_name'");
$user = $user->fetch(PDO::FETCH_ASSOC);
$old_pass_data = $user['admin_password'];
$old_name = $user['admin_name'];

if (isset($_POST['submit'])) {
   $new_name = $_POST['name'];
   $old_pass = $_POST['old_pass'];
   $new_password = $_POST['new_pass'];
   $confirm_password = $_POST['confirm_pass'];
   $name_admin_exist = countOfElement('admin', 'admin_name', $admin_name);



   if (sha1($old_pass) == $old_pass_data) {
      //update Name 
      if (!empty($new_name) && $name_admin_exist <= 1) {
         $update_admin = $connection->query("UPDATE `admin` SET `admin_name` ='$new_name' WHERE `admin_id`=$admin_id");
         if ($update_admin) {
            $_SESSION['admin_name'] = $new_name;
            if ($new_name != $old_name) {
               $message[] = "Sucessed Update your Name";
            }
         }
      } else {
         if ($name_admin_exist > 1) {
            $message[] = "this name is alerady found, please enter another name";
         }
      }

      //Update password
      if (!empty($new_password)) {
         if ($new_password == $confirm_password) {
            $hash_new_password = sha1($new_password);
            $update_admin = $connection->query("UPDATE `admin` SET  `admin_password`='$hash_new_password' WHERE `admin_id`=$admin_id");
            if ($update_admin) {
               $message[] = "Sucessed Update Your password";
            }
         } else {
            if (empty($confirm_password)) {
               $message[] = "please enter confirm password!";
            } else {
               $message[] = "confirm password not matched!";
            }
         }
      }
   } else {
      $message[] = 'Wrong password ....!';
   }
}

?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Update Profile</title>
        <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />
        <!-- font awesome cdn link  -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
        <!-- custom css file link  -->
        <link rel="stylesheet" href="../css/admin_style.css">
    </head>

    <body>
        <?php include '../components/admin_navbar.php'; ?>
        <!-- admin profile update section starts  -->
        <section class="form-container">
            <form action="" method="POST">
                <h3>update profile</h3>
                <input type="text" name="name" maxlength="20" value="<?= $_SESSION['admin_name']; ?>" class="box"
                    oninput="this.value = this.value.replace(/\s/g, '')" placeholder="Enter your name">
                <input type="password" name="old_pass" maxlength="20" placeholder="enter your old password" class="box"
                    oninput="this.value = this.value.replace(/\s/g, '')" required>
                <input type="password" name="new_pass" maxlength="20" placeholder="enter your new password" class="box"
                    oninput="this.value = this.value.replace(/\s/g, '')">
                <input type="password" name="confirm_pass" maxlength="20" placeholder="confirm your new password"
                    class="box" oninput="this.value = this.value.replace(/\s/g, '')">
                <input type="submit" value="update now" name="submit" class="btn">
            </form>

        </section>

        <!-- admin profile update section ends -->
        <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
        <script src="../js/admin_script.js"></script>
    </body>

</html>