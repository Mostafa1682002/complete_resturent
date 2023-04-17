<?php
if (isset($_POST['add_to_cart'])) {

   if (isset($_SESSION['user_id'])) {
      $user_name = $_SESSION['user_name'];
      $user_id = $_SESSION['user_id'];

      $product_id = $_POST['product_id'];
      $product_name = $_POST['product_name'];
      $product_price = $_POST['product_price'];
      $product_img = $_POST['product_img'];
      $quantity = $_POST['qty'];

      $check_product_cart = countOfElement('cart', 'product_id', $product_id);
      if ($check_product_cart < 1) {
         $add_cart = $connection->query("INSERT INTO `cart` (`cart_id`, `user_id`, `product_id`, `product_name`, `price`, `quantity`, `image_product`) VALUES (NULL, '$user_id', '$product_id', '$product_name', '$product_price', '$quantity', '$product_img');");
         $message[] = "Product Added To Cart";
      } else {
         $message[] = "Product Aleardy In Cart";
      }
   } else {
      header("location: login.php");
      exit();
   }
}
