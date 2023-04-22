<?php
$titlepage = "My Cart";
session_start();
include_once("components/connection.php");
include_once("components/function.php");
include_once("components/user_session.php");

$all_product_cart = getAllDate('cart');

$total_price = 0;
foreach ($all_product_cart as $product) {
   $total_price += $product['price'] * $product['quantity'];
}


if (isset($_POST['edit_quantity'])) {
   $product_id = $_POST['product_id'];
   $new_quantity = $_POST['qty'];
   $update_quantity = $connection->query("UPDATE `cart` SET `quantity`=$new_quantity WHERE `product_id`=$product_id");
   if ($update_quantity) {
      header("location: cart.php");
      exit();
   }
}

//Delete one Product
if (isset($_POST['delete'])) {
   $product_id = $_POST['product_id'];
   $delete_product = $connection->query("DELETE FROM `cart` WHERE `product_id`=$product_id ");
   if ($delete_product) {
      $message[] = "Sucssed Delete Product From Cart";
      header("location: cart.php");
      exit();
   }
}

// Delete All Product In Cart 
if (isset($_GET['deletall'])) {
   $deleteall_product = $connection->query("DELETE FROM `cart`");
   if ($deleteall_product) {
      $message[] = "Sucssed Delete All Products From Cart";
      header("location: cart.php");
      exit();
   }
}
?>

<style>
   .checkout_btn {
      pointer-events: none;
      opacity: .8;
   }
</style>
<?php include_once("components/user_navbar.php"); ?>
<div class="heading">
   <h3>shopping cart</h3>
   <p><a href="index.php">Home </a> <span> / Cart</span></p>
</div>

<section class="products">
   <h1 class="title">your cart</h1>
   <div class="cart-total">
      <p>grand total : <span>$<?php echo $total_price ?>/-</span></p>
      <a href="checkout.php" class="btn <?php echo count($all_product_cart) == 0 ? 'checkout_btn' : ''; ?>">checkout
         orders</a>
   </div>
   </div>

   <div class="box-container">
      <?php
      if (count($all_product_cart) > 0) {
         foreach ($all_product_cart as $product) {
      ?>
            <div class="box">
               <form method="post">
                  <input type="hidden" name="product_id" value="<?php echo  $product['product_id']  ?>">
                  <a href="quick_view.php?pid=<?= $product['product_id']; ?>" class="fas fa-eye"></a>
                  <button class="fas fa-times" type="submit" name="delete" onclick="return confirm('delete this item?')"></button>
                  <img src="uploaded_img2/<?php echo $product['image_product']  ?>" alt="">
                  <div class="name"><?php echo $product['product_name']  ?></div>
                  <div class="flex">
                     <div class="price"><span>$</span><?php echo $product['price']  ?></div>
                     <input type="number" name="qty" class="qty" min="1" max="99" value="<?php echo  $product['quantity']  ?>" onkeypress="if(this.value.length == 2) return false;">
                     <button type="submit" name="edit_quantity" class="fas fa-edit"></button>
                  </div>
                  <div class="sub-total">sub total : <span>$<?php echo $product['price'] * $product['quantity']  ?></span>
                  </div>
               </form>
            </div>
      <?php
         }
      } else {
         echo "<div class='empty'>No Product Selected Yet !!</div>";
      }
      ?>
   </div>

   <div class="more-btn">
      <a href="cart.php?deletall" class="delete-btn <?php echo count($all_product_cart) == 0  ? 'checkout_btn' : ''; ?>" onclick="return confirm('delete all from cart?');">delete all</a>
   </div>

</section>
<?php
include_once("components/user_footer.php");
?>