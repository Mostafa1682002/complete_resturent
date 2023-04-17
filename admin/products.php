<?php
$titlepage = "Products";
include_once("../components/admin_session.php");
include '../components/connection.php';
include '../components/function.php';

//Add Products
if (isset($_POST['add_product'])) {
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $product_category = $_POST['product_category'];
    $product_img =  $_FILES['photo']['name'];

    $name_product_exist = countOfElement('products', 'product_name', $product_name);
    $imge_product_exist = countOfElement('products', 'product_img', $product_img);

    //If No Reapeat data
    if ($name_product_exist == 0 && $imge_product_exist == 0) {
        $add_product = $connection->query("INSERT INTO `products` (`product_id`, `product_name`, `product_category`, `product_price`, `product_img`) VALUES (Null, '$product_name', '$product_category', $product_price, '$product_img')");
        if ($add_product) {
            $from = $_FILES['photo']['tmp_name'];
            $to = "../uploaded_img2/$product_img";
            move_uploaded_file($from, $to);
            $message['product_add'] = "Product Is Added";
        }
    } else {
        if ($name_product_exist > 0) {
            $message['product_exist'] = "Product Is Already Exist";
        }
        if ($imge_product_exist > 0) {
            $message['product_image_exist'] = "Image Is Already Exist ,Please Enter anoher image";
        }
    }
}

//Delete Product
if (isset($_GET['delete'])) {
    $delete_id = $_GET['delete'];
    $delete_imge = $_GET['imge'];
    $product_exist = countOfElement('products', 'product_id', $delete_id);
    if ($product_exist == 1) {
        $d = $connection->query("DELETE FROM `products` WHERE `product_id`=$delete_id");
        if ($d) {
            unlink("../uploaded_img2/$delete_imge");
            header('location:products.php');
            exit();
        }
    }
}

?>

<?php
$value_name = '';
$value_price = '';
$value_category = '';
if (isset($message['product_image_exist'])) {
    $value_name = $product_name;
    $value_price = $product_price;
    $value_category = $product_category;
}
function isSelected($value)
{
    global $value_category, $product_category;
    if ($value_category != '' && $product_category == $value) {
        return "selected";
    }
}
?>
<!-- add products section starts  -->
<?php include '../components/admin_navbar.php'; ?>
<section class="add-products">
    <form action="" method="POST" enctype="multipart/form-data">
        <h3>Add product</h3>
        <input type="text" required placeholder="enter product name" name="product_name" maxlength="100" class="box" value="<?php echo $value_name ?>">
        <input type="number" min="0" max="9999999999" required placeholder="enter product price" name="product_price" value="<?php echo $value_price ?>" onkeypress="if(this.value.length == 10) return false;" class="box">
        <select name="product_category" class="box" required>
            <option value="" disabled selected>Select Category --</option>
            <option <?php echo isSelected("main dish")  ?> value="main dish">Main dish</option>
            <option <?php echo isSelected("fast food") ?> value="fast food">Fast food</option>
            <option <?php echo isSelected("drinks") ?> value="drinks">Drinks</option>
            <option <?php echo isSelected("desserts")  ?> value="desserts">Desserts</option>
        </select>
        <input type="file" name="photo" id="userPhoto" class="box input-file" accept="image/*" required>
        <img src="" id="photo" class="photo" alt="">
        <input type="submit" value="add product" name="add_product" class="btn">
    </form>

</section>

<!-- add products section ends -->
<!-- show products section starts  -->
<section class="show-products" style="padding-top: 0;">
    <div class="box-container">
        <?php
        $show_products = getAllDate("products");
        if (count($show_products) > 0) {
            foreach ($show_products as $product) {
        ?>
                <div class="box">
                    <img src="../uploaded_img2/<?php echo $product['product_img'] ?>" alt="">
                    <div class="flex">
                        <div class="price"><span>$</span><?= $product['product_price']; ?><span>/-</span></div>
                        <div class="category"><?= $product['product_category']; ?></div>
                    </div>
                    <div class="name"><?= $product['product_name']; ?></div>
                    <div class="flex-btn">
                        <a href="update_product.php?update=<?= $product['product_id']; ?>" class="option-btn">update</a>
                        <a href="products.php?delete=<?= $product['product_id'] . "&imge=" . $product['product_img'] ?>" class="delete-btn" onclick="return confirm('delete this product?');">delete</a>
                    </div>
                </div>
        <?php
            }
        } else {
            echo '<p class="empty">no products added yet!</p>';
        }
        ?>
    </div>
</section>

<!-- show products section ends -->
<?php include '../components/admin_footer.php' ?>