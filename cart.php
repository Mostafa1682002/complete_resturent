<?php
$titlepage = "My Cart";
session_start();
include_once("components/connection.php");
include_once("components/function.php");
include_once("components/user_session.php");
//All Product In Cart
if (isset($_SESSION['cart'])) {
   $all_product_cart = $_SESSION['cart'];
} else {
   $all_product_cart = array();
}


//Edite Quantity
if (isset($_POST['edit_quantity'])) {
   $product_id = $_POST['product_id'];
   $new_quantity = $_POST['qty'];
   $all_product_cart[$product_id]['product_qty'] = $new_quantity;
   $_SESSION['cart'] = $all_product_cart;
}

//Delete one Product
if (isset($_POST['delete'])) {
   $product_id = $_POST['product_id'];
   unset($all_product_cart[$product_id]);
   $_SESSION['cart'] = $all_product_cart;
}

// Delete All Product In Cart 
if (isset($_POST['deleteAll'])) {
   $all_product_cart = [];
   $_SESSION['cart'] = $all_product_cart;
}





//Total Price
$total_price = 0;
foreach ($all_product_cart as $product) {
   $total_price += $product['product_price'] * $product['product_qty'];
}


?>

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
                <button class="fas fa-times" type="submit" name="delete"
                    onclick="return confirm('delete this item?')"></button>
                <img src="uploaded_img2/<?php echo $product['product_img']  ?>" alt="">
                <div class="name"><?php echo $product['product_name']  ?></div>
                <div class="flex">
                    <div class="price"><span>$</span><?php echo $product['product_price']  ?></div>
                    <input type="number" name="qty" class="qty" min="1" max="99"
                        value="<?php echo  $product['product_qty']  ?>"
                        onkeypress="if(this.value.length == 2) return false;">
                    <button type="submit" name="edit_quantity" class="fas fa-edit"></button>
                </div>
                <div class="sub-total">sub total :
                    <span>$<?php echo $product['product_price'] * $product['product_qty']  ?></span>
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
        <form action="" method="post">
            <button type="submit" name="deleteAll" onclick="return confirm('delete all from cart?');"
                class="delete-btn <?php echo count($all_product_cart) == 0  ? 'checkout_btn' : ''; ?>">delete
                all</button>
        </form>
    </div>

</section>
<?php
include_once("components/user_footer.php");
?>