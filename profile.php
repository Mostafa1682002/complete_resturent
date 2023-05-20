<?php
session_start();
include_once("components/connection.php");
include_once("components/user_session.php");
include_once("components/function.php");


$profile = $connection->query("SELECT * FROM `users` WHERE `user_id`=$user_id");
$profile = $profile->fetch(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Profile</title>
   <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />
   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">
</head>

<body>
   <?php include_once("components/user_navbar.php"); ?>
   <div class="heading">
      <h3>my profile</h3>
      <p><a href="index.php">Home </a> <span> / Profile</span></p>
   </div>

   <section class="user-details">

      <div class="user">
         <img src="images/user-icon.png" alt="">
         <p><i class="fas fa-user"></i> <span><?php echo $profile['user_name'] ?></span></p>
         <p><i class="fas fa-phone"></i> <span><?php echo $profile['user_number'] ?></span></p>
         <p><i class="fas fa-envelope"></i> <span><?php echo $profile['user_email'] ?></span></p>
         <a href="update_profile.php" class="btn">update profile</a>
         <p class="address"><i class="fas fa-map-marker-alt"></i>
            <span><?php echo $profile['user_address'] ?></span>
         </p>
         <a href="update_address.php" class="btn">update address</a>
      </div>

   </section>
   <?php include_once("components/user_footer.php"); ?>
   <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
   <script src="js/script.js"></script>

</body>

</html>