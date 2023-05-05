<?php
// session_destroy();
if (isset($_POST['add_to_cart'])) {

   if (isset($_SESSION['user_id'])) {
      $product_id = $_POST['product_id'];
      $product_name = $_POST['product_name'];
      $product_price = $_POST['product_price'];
      $product_img = $_POST['product_img'];
      $quantity = $_POST['qty'];

      if (isset($_SESSION['cart'])) {
         //check if item exist in cart or no
         $my_items = array_column($_SESSION['cart'], 'product_id');
         if (in_array($product_id, $my_items)) {
            $message[] = "Product Aleardy In Cart";
         } else {
            $_SESSION['cart'][$product_id] = array("product_id" => $product_id, 'product_name' => $product_name, 'product_price' => $product_price, 'product_qty' => $quantity, 'product_img' => $product_img);
            $message[] = "Product Added To Cart";
         }
      } else {
         $_SESSION['cart'][$product_id] = array("product_id" => $product_id, 'product_name' => $product_name, 'product_price' => $product_price, 'product_qty' => $quantity, 'product_img' => $product_img);
         $message[] = "Product Added To Cart";
      }
   } else {
      header("location: login.php");
      exit();
   }
}