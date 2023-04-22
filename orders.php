<?php
$titlepage = "My Order";
session_start();
include_once("components/connection.php");
include_once("components/function.php");
include_once("components/user_session.php");
$my_orders = getAllDate('orders', 'user_id', $user_id);

?>

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
<?php
include_once("components/user_footer.php");
?>