<?php
session_start();
$titlepage = "Quick View";
include_once("components/connection.php");
include_once("components/function.php");
include_once("components/add_cart.php");


if (isset($_GET['pid'])) {
    $product_id = $_GET['pid'];
    $select_products = getAllDate('products', 'product_id', $product_id);
    $product_exist = countOfElement('products', 'product_id', $product_id);
} else {
    header("location: index.php");
}

?>
<?php include_once("components/user_navbar.php"); ?>
<section class="quick-view">
    <h1 class="title">quick view</h1>
    <?php
    if ($product_exist > 0) {
        foreach ($select_products as $product) {
    ?>
            <form action="" method="post" class="box">
                <input type="hidden" name="product_id" value="<?= $product['product_id']; ?>">
                <input type="hidden" name="product_name" value="<?= $product['product_name']; ?>">
                <input type="hidden" name="product_price" value="<?= $product['product_price']; ?>">
                <input type="hidden" name="product_img" value="<?= $product['product_img']; ?>">
                <img src="uploaded_img2/<?= $product['product_img']; ?>" alt="">
                <a href="category.php?category=<?= $product['product_category']; ?>" class="cat"><?= $product['product_category']; ?></a>
                <div class="name"><?= $product['product_name']; ?></div>
                <div class="flex">
                    <div class="price"><span>$</span><?= $product['product_price']; ?>/-</div>
                    <input type="number" name="qty" class="qty" min="1" max="99" value="1" maxlength="2">
                </div>
                <button type="submit" name="add_to_cart" class="cart-btn">add to cart</button>
            </form>
    <?php
        }
    } else {
        echo '<p class="empty">no products added yet!</p>';
    }
    ?>

</section>
<?php
include_once("components/user_footer.php");
?>