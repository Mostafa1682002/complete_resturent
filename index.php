<?php
$titlepage = "Home";
session_start();
include_once("components/connection.php");
include_once("components/function.php");
include_once("components/add_cart.php");
$all_products = getAllDate('products');
$all_products = array_slice($all_products, 0, 9);

?>


<?php include_once("components/user_navbar.php"); ?>
<section class="home">
    <div class="swiper home-slider">
        <div class="swiper-wrapper">
            <div class="swiper-slide slide">
                <div class="content">
                    <span>order online</span>
                    <h3>delicious pizza</h3>
                    <a href="menu.html" class="btn">see menus</a>
                </div>
                <div class="image">
                    <img src="images/home-img-1.png" alt="" />
                </div>
            </div>

            <div class="swiper-slide slide">
                <div class="content">
                    <span>order online</span>
                    <h3>double hamburger</h3>
                    <a href="menu.html" class="btn">see menus</a>
                </div>
                <div class="image">
                    <img src="images/home-img-2.png" alt="" />
                </div>
            </div>

            <div class="swiper-slide slide">
                <div class="content">
                    <span>order online</span>
                    <h3>roasted chicken</h3>
                    <a href="menu.html" class="btn">see menus</a>
                </div>
                <div class="image">
                    <img src="images/home-img-3.png" alt="" />
                </div>
            </div>
        </div>

        <div class="swiper-pagination"></div>
    </div>
</section>
<section class="category">
    <h1 class="title">food category</h1>
    <div class="box-container">
        <a href="category.php?category=fast food" class="box">
            <img src="images/cat-1.png" alt="" />
            <h3>fast food</h3>
        </a>
        <a href="category.php?category=main dish" class="box">
            <img src="images/cat-2.png" alt="" />
            <h3>main dishes</h3>
        </a>
        <a href="category.php?category=drinks" class="box">
            <img src="images/cat-3.png" alt="" />
            <h3>drinks</h3>
        </a>
        <a href="category.php?category=desserts" class="box">
            <img src="images/cat-4.png" alt="" />
            <h3>desserts</h3>
        </a>
    </div>
</section>

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
    <div class="more-btn">
        <a href="menu.php" class="btn">veiw all</a>
    </div>
</section>

<?php
include_once("components/user_footer.php");
?>