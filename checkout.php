<?php
$titlepage = "Checkout";
session_start();
include_once("components/connection.php");
include_once("components/function.php");
include_once("components/user_session.php");
$all_product_cart = getAllDate('cart');
$total_price = 0;
$total_product = '';
foreach ($all_product_cart as $product) {
   $total_product .= $product['product_name'] . "(" . $product['quantity'] . ") - ";
   $total_price += $product['price'] * $product['quantity'];
}

//My Information
$my_info = getAllDate('users', 'user_id', $user_id);
$name = $my_info[0]['user_name'];
$number = $my_info[0]['user_number'];
$email = $my_info[0]['user_email'];
$address = $my_info[0]['user_address'];
// ADD ORDER 
if (isset($_POST['add_order'])) {
   $method = $_POST['method'];
   $add_order = $connection->query("INSERT INTO `orders` (`order_id`, `user_id`, `name`, `number`, `email`, `method`, `address`, `total_products`, `total_price`, `placed_on`, `payment_status`) VALUES (NULL, $user_id, '$name', '$number', '$email', '$method', '$address', '$total_product', '$total_price', current_timestamp(), 'pending')");
   if ($add_order) {
      $message[] = "Sucssed Added Order";
   }
}
?>

<?php include_once("components/user_navbar.php"); ?>
<div class="heading">
   <h3>checkout</h3>
   <p><a href="index.php">Home </a> <span> / Checkout</span></p>
</div>

<section class="checkout">
   <h1 class="title">order summary</h1>
   <form action="" method="post">
      <div class="cart-items">
         <h3>cart items</h3>
         <?php foreach ($all_product_cart as $product) { ?>
            <p><span class="name"><?php echo $product['product_name'] ?></span><span class="price">$<?php echo $product['price'] ?></span></p>
         <?php } ?>
         <p class="grand-total"><span class="name">grand total :</span> <span class="price">$<?php echo $total_price ?></span></p>
         <a href="cart.php" class="btn">view cart</a>
      </div>
      <div class="user-info">
         <h3>your info</h3>
         <p><i class="fas fa-user"></i> <span><?php echo $name ?></span></p>
         <p><i class="fas fa-phone"></i> <span><?php echo $number ?></span></p>
         <p><i class="fas fa-envelope"></i> <span><?php echo $email ?></span></p>
         <a href="update_profile.php" class="btn">update info</a>
         <h3>delivery address</h3>
         <p class="address"><i class="fas fa-map-marker-alt"></i>
            <span><?php echo $address ?></span>
         </p>
         <a href="update_address.php" class="btn">update address</a>
         <select name="method" class="box" required>
            <option value="" disabled selected>select payment method</option>
            <option value="cash on delivery">cash on delivery</option>
            <option value="credit card">credit card</option>
            <option value="paytm">paytm</option>
            <option value="paypal">paypal</option>
         </select>
      </div>
      <input type="submit" value="place order" name="add_order" class="btn order-btn">
   </form>

</section>
<?php
include_once("components/user_footer.php");
?>