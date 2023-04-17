<?php
$titlepage = "Menu";
session_start();
include_once("components/connection.php");
include_once("components/function.php");
include_once("components/add_cart.php");
$all_products = getAllDate('products');

?>




<?php include_once("components/user_navbar.php"); ?>
<div class="heading">
    <h3>our menu</h3>
    <p><a href="index.php">Home </a> <span> / Menu</span></p>
</div>
<section class="products">
    <h1 class="title">latest dishes</h1>
    <div class="box-container">
        <?php
        if (count($all_products) > 0) {
            foreach ($all_products as $product) {
        ?>
                <form accept="" method="post" class="box">
                    <a href="quick_view.php?pid=<?= $product['product_id']; ?>" class="fas fa-eye"></a>
                    <button class="fas fa-shopping-cart" type="submit" name="add_to_cart"></button>
                    <input type="hidden" name="product_id" value="<?= $product['product_id']; ?>">
                    <input type="hidden" name="product_name" value="<?= $product['product_name']; ?>">
                    <input type="hidden" name="product_price" value="<?= $product['product_price']; ?>">
                    <input type="hidden" name="product_img" value="<?= $product['product_img']; ?>">
                    <img src="uploaded_img2/<?php echo $product['product_img'] ?>" alt="" />
                    <a href="category.php?category=<?php echo $product['product_category'] ?>" class=" cat"><?php echo $product['product_category'] ?></a>
                    <div class="name"><?php echo $product['product_name'] ?></div>
                    <div class="flex">
                        <div class="price"><span>$</span><?php echo $product['product_price'] ?><span>/-</span></div>
                        <input type="number" name="qty" class="qty" min="1" max="99" value="1" onkeypress="if(this.value.length == 2) return false;" />
                    </div>
                </form>
        <?php
            }
        } else {
            echo "<div class='empty'>No Product Added Yet !!</div>";
        }
        ?>
    </div>
</section>

<?php
include_once("components/user_footer.php");
?>