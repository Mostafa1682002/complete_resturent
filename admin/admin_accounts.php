<?php
include_once("../components/admin_session.php");
include '../components/connection.php';
include '../components/function.php';


if (isset($_GET['delete'])) {
   $user_id = $_GET['delete'];
   $user_delete = $connection->query("DELETE FROM `admin` WHERE `admin_id`=$user_id");
   if ($user_delete && $user_id != $admin_id) {
      header("location: admin_accounts.php");
      exit();
   } elseif ($user_delete && $user_id == $admin_id) {
      header("location: ../components/admin_logout.php");
      exit();
   }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Admin Accounts</title>
   <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />
   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
   <!-- custom css file link  -->
   <link rel="stylesheet" href="../css/admin_style.css">
</head>

<body>

   <!-- admins accounts section starts  -->
   <?php include '../components/admin_navbar.php'; ?>
   <section class="accounts">
      <h1 class="heading">Admins Account</h1>
      <div class="box-container">
         <div class="box">
            <p>Register New Admin</p>
            <a href="register_admin.php" class="option-btn">register</a>
         </div>
         <?php
         $fetch_accounts = getAllDate('admin');
         if (!empty($fetch_accounts)) {
            foreach ($fetch_accounts as  $account) {
         ?>
               <div class="box">
                  <p> Admin id : <span><?= $account['admin_id']; ?></span> </p>
                  <p> Username : <span><?= $account['admin_name']; ?></span> </p>
                  <div class="flex-btn">
                     <a href="admin_accounts.php?delete=<?= $account['admin_id']; ?>" class="delete-btn" onclick="return confirm('delete this account?');">delete</a>
                     <?php
                     if ($account['admin_id'] == $admin_id) {
                        echo '<a href="update_profile.php" class="option-btn">update</a>';
                     }
                     ?>
                  </div>
               </div>
         <?php
            }
         } else {
            echo '<p class="empty">no accounts available</p>';
         }
         ?>
      </div>
   </section>

   <!-- admins accounts section ends -->
   <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
   <script src="../js/admin_script.js"></script>
</body>

</html>