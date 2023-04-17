<?php
$titlepage = "Update Product";
include_once("../components/admin_session.php");
include '../components/connection.php';
include '../components/function.php';

$update_id = $_GET['update'];
if (isset($_POST['update'])) {
    $old_image = $_POST['old_image'];
    $new_name = $_POST['name'];
    $new_price = $_POST['price'];
    $new_category = $_POST['category'];
    $new_image = isset($_FILES['photo']) ? $_FILES['photo']['name'] : '';
    $imge_product_exist = countOfElement('products', 'product_img', $new_image);

    if (empty($new_image)) {
        $update_product_database = $connection->query("UPDATE `products` SET `product_name` = '$new_name' ,`product_price`='$new_price',`product_category`='$new_category' WHERE `product_id` = $update_id;");
        if ($update_product_database) {
            $message[] = "Sucssed Updated Product";
        }
    } else {
        if ($imge_product_exist > 0) {
            $message['product_image_exist'] = "Image Is Already Exist ,Please Enter anoher image";
        } else {
            $update_product_database = $connection->query("UPDATE `products` SET `product_name` = '$new_name' ,`product_price`='$new_price',`product_category`='$new_category',`product_img`='$new_image' WHERE `product_id` = $update_id;");
            if ($update_product_database) {
                unlink("../uploaded_img2/$old_image");
                $from = $_FILES['photo']['tmp_name'];
                $to = "../uploaded_img2/$new_image";
                move_uploaded_file($from, $to);
                $message[] = "Sucssed Updated Product";
            }
        }
    }
}
?>


<!-- update product section starts  -->
<?php include '../components/admin_navbar.php'; ?>
<section class="update-product">
    <h1 class="heading">update product</h1>
    <?php
    $update_id = $_GET['update'];
    $check_product = countOfElement('products', 'product_id', $update_id);
    if ($check_product > 0) {
        $update_product = $connection->query("SELECT * FROM `products` WHERE `product_id` =$update_id");
        $update_product = $update_product->fetchAll(PDO::FETCH_ASSOC);
        foreach ($update_product as $product) {
    ?>
            <form action="" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="p_id" value="<?= $product['product_id']; ?>">
                <input type="hidden" name="old_image" value="<?= $product['product_img']; ?>">
                <img src="../uploaded_img2/<?= $product['product_img']; ?>" alt="">
                <span>update name</span>
                <input type="text" required placeholder="enter product name" name="name" maxlength="100" class="box" value="<?php echo $product['product_name']; ?>">
                <span>update price</span>
                <input type="number" min="0" max="9999999999" required placeholder="enter product price" name="price" onkeypress="if(this.value.length == 10) return false;" class="box" value="<?= $product['product_price']; ?>">
                <span>update category</span>
                <select name="category" class="box" required>
                    <option selected value="<?= $product['product_category']; ?>"><?php echo $product['product_category']; ?>
                    </option>
                    <option value="main dish">main dish</option>
                    <option value="fast food">fast food</option>
                    <option value="drinks">drinks</option>
                    <option value="desserts">desserts</option>
                </select>
                <span>update image</span>
                <input type="file" name="photo" id="userPhoto" class="box input-file" accept="image/*">
                <img src="" id="photo" class="photo " alt="">
                <div class="flex-btn">
                    <input type="submit" value="update" class="btn" name="update">
                    <a href="products.php" class="option-btn">go back</a>
                </div>
            </form>
    <?php
        }
    } else {
        echo '<p class="empty">no products added yet!</p>';
    }
    ?>

</section>
<!-- update product section ends -->
<?php include '../components/admin_footer.php' ?>