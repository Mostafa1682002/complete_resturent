<?php
$titlepage = "Checkout";
include_once("components/connection.php");
include_once("components/function.php");
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
         <p><span class="name">delicious pizza 01</span><span class="price">$3</span></p>
         <p><span class="name">main dish 02</span><span class="price">$3</span></p>
         <p><span class="name">delicious dessert 01</span><span class="price">$3</span></p>
         <p class="grand-total"><span class="name">grand total :</span> <span class="price">$9</span></p>
         <a href="cart.html" class="btn">view cart</a>
      </div>
      <div class="user-info">
         <h3>your info</h3>
         <p><i class="fas fa-user"></i> <span>shaikh anas</span></p>
         <p><i class="fas fa-phone"></i> <span>1234567890</span></p>
         <p><i class="fas fa-envelope"></i> <span>shaikhanas@gmail.com</span></p>
         <a href="update_profile.html" class="btn">update info</a>
         <h3>delivery address</h3>
         <p class="address"><i class="fas fa-map-marker-alt"></i> <span>flat no. 1, building no. 1, jogeshwari west,
               mumbai, india - 400104</span></p>
         <a href="update_address.html" class="btn">update address</a>
         <select name="method" class="box" required>
            <option value="" disabled selected>select payment method</option>
            <option value="cash on delivery">cash on delivery</option>
            <option value="credit card">credit card</option>
            <option value="paytm">paytm</option>
            <option value="paypal">paypal</option>
         </select>
      </div>
      <input type="submit" value="place order" name="order" class="btn order-btn">
   </form>

</section>
<?php
include_once("components/user_footer.php");
?>