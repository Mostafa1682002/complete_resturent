<?php
$titlepage = "Register Admin";
include_once("../components/admin_session.php");
include '../components/connection.php';
include '../components/function.php';

if (isset($_POST['add_admin'])) {

   $name = $_POST['admin_name'];
   $name = filter_var($name, FILTER_SANITIZE_STRING);
   $password = sha1($_POST['admin_password']);
   $password = filter_var($password, FILTER_SANITIZE_STRING);
   $confirm_password = sha1($_POST['confirm_password']);
   $confirm_password = filter_var($confirm_password, FILTER_SANITIZE_STRING);

   $select_admin = countOfElement('admin', 'admin_name', $name);
   if ($select_admin > 0) {
      $message[] = 'username already exists!';
   } else {
      if ($password != $confirm_password) {
         $message[] = 'confirm passowrd not matched!';
      } else {
         $sha_password = sha1($password);
         $insert_admin = $connection->query("INSERT INTO `admin`(`admin_name`,`admin_password`) VALUES('$name','$sha_password')");
         $message[] = 'new admin registered!';
      }
   }
}

?>


<?php include '../components/admin_navbar.php'; ?>
<!-- register admin section starts  -->

<section class="form-container">

    <form action="" method="POST">
        <h3>register new</h3>
        <input type="text" name="admin_name" maxlength="20" required placeholder="enter your username" class="box"
            oninput="this.value = this.value.replace(/\s/g, '')">
        <input type="password" name="admin_password" maxlength="20" required placeholder="enter your password"
            class="box" oninput="this.value = this.value.replace(/\s/g, '')">
        <input type="password" name="confirm_password" maxlength="20" required placeholder="confirm your password"
            class="box" oninput="this.value = this.value.replace(/\s/g, '')">
        <input type="submit" value="register now" name="add_admin" class="btn">
    </form>

</section>

<!-- register admin section ends -->
<?php include '../components/admin_footer.php' ?>