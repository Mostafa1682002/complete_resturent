<?php
include_once("components/connection.php");
include_once("components/function.php");
if (isset($_GET['category'])) {
   $category_name = $_GET['category'];
   $all_products_category = getAllDate('products', 'product_category', $category_name);
   $count_ele = countOfElement('products', 'product_category', $category_name);
} else {
   header('location: index.php');
   exit();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Categoryes</title>
   <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />
   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">
</head>

<body>

   <?php include_once("components/user_navbar.php"); ?>
   <section class="products">
      <h1 class="title">food category</h1>
      <div class="box-container">
         <?php
         if ($count_ele > 0) {
            foreach ($all_products_category as $product) {
         ?>
               <form action="" method="post" class="box">
                  <input type="hidden" name="product_id" value="<?= $product['product_id']; ?>">
                  <input type="hidden" name="product_name" value="<?= $product['product_name']; ?>">
                  <input type="hidden" name="product_price" value="<?= $product['product_price']; ?>">
                  <input type="hidden" name="image" value="<?= $product['product_img']; ?>">
                  <a href="quick_view.php?pid=<?= $product['product_id']; ?>" class="fas fa-eye"></a>
                  <button type="submit" class="fas fa-shopping-cart" name="add_to_cart"></button>
                  <img src="uploaded_img2/<?= $product['product_img']; ?>" alt="">
                  <div class="name"><?= $product['product_name']; ?></div>
                  <div class="flex">
                     <div class="price"><span>$</span><?= $product['product_price']; ?>/-</div>
                     <input type="number" name="qty" class="qty" min="1" max="99" value="1" maxlength="2">
                  </div>
               </form>
         <?php
            }
         } else {
            echo '<p class="empty">no products added yet!</p>';
         }
         ?>

      </div>

   </section>
   <?php include_once("components/user_footer.php"); ?>
   <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
   <script src="js/script.js"></script>

</body>

</html>