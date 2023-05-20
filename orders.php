<?php
session_start();
include_once("components/connection.php");
include_once("components/function.php");
include_once("components/user_session.php");
$my_orders = getAllDate('orders', 'user_id', $user_id);

?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>My Order</title>
   <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />
   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">
</head>

<body>
   <?php include_once("components/user_navbar.php"); ?>
   <div class="heading">
      <h3>your orders</h3>
      <p><a href="index.php">Home </a> <span> / Orders</span></p>
   </div>

   <section class="orders">
      <h1 class="title">placed orders</h1>
      <div class="box-container">
         <?php
         if (count($my_orders)) {
            foreach ($my_orders as $order) :
         ?>
               <div class="box">
                  <p> Placed On : <span><?php echo $order['placed_on'] ?></span> </p>
                  <p> Name : <span><?php echo $order['name'] ?></span> </p>
                  <p> Number : <span><?php echo $order['number'] ?></span> </p>
                  <p> Email : <span><?php echo $order['email'] ?></span> </p>
                  <p> Address : <span><?php echo $order['address'] ?></span> </p>
                  <p> Your Orders : <span><?php echo $order['total_products'] ?></span> </p>
                  <p> Total Price : <span>$<?php echo $order['total_price'] ?>/-</span> </p>
                  <p> Payment Method : <span><?php echo $order['method'] ?></span> </p>
                  <p> Payment Status : <span><?php echo $order['payment_status'] ?></span> </p>
               </div>
         <?php
            endforeach;
         } else {
            echo "<div class='empty'>No Order Selected Yet !!</div>";
         }
         ?>
      </div>

   </section>
   <?php include_once("components/user_footer.php"); ?>
   <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
   <script src="js/script.js"></script>

</body>

</html>