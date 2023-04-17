<?php
$titlepage = "Orders";
include_once("../components/admin_session.php");
include '../components/connection.php';
include '../components/function.php';

if (isset($_POST['update_payment'])) {
    $order_id = $_POST['order_id'];
    $payment_status = $_POST['payment_status'];
    $update_status = $connection->query("UPDATE `orders` SET `payment_status` ='$payment_status' WHERE `order_id` =$order_id");
    if ($update_status) {
        $message[] = 'payment status updated!';
    }
}

if (isset($_GET['delete'])) {
    $delete_id = $_GET['delete'];
    $delete_order = $connection->query("DELETE FROM `orders` WHERE  `order_id`=$delete_id");
    if ($delete_order) {
        header('location:placed_orders.php');
        exit();
    }
}

?>



<?php include '../components/admin_navbar.php'; ?>
<!-- placed orders section starts  -->

<section class="placed-orders">

    <h1 class="heading">placed orders</h1>

    <div class="box-container">

        <?php
        $select_orders = $connection->prepare("SELECT * FROM `orders`");
        $select_orders->execute();
        if ($select_orders->rowCount() > 0) {
            while ($fetch_orders = $select_orders->fetch(PDO::FETCH_ASSOC)) {
        ?>
                <div class="box">
                    <p> User Id : <span><?= $fetch_orders['user_id']; ?></span> </p>
                    <p> Placed On : <span><?= $fetch_orders['placed_on']; ?></span> </p>
                    <p> Name : <span><?= $fetch_orders['name']; ?></span> </p>
                    <p> Email : <span><?= $fetch_orders['email']; ?></span> </p>
                    <p> Number : <span><?= $fetch_orders['number']; ?></span> </p>
                    <p> Address : <span><?= $fetch_orders['address']; ?></span> </p>
                    <p> Total Products : <span><?= $fetch_orders['total_products']; ?></span> </p>
                    <p> Total Price : <span>$<?= $fetch_orders['total_price']; ?>/-</span> </p>
                    <p> Payment Method : <span><?= $fetch_orders['method']; ?></span> </p>
                    <form action="" method="POST">
                        <input type="hidden" name="order_id" value="<?= $fetch_orders['order_id']; ?>">
                        <select name="payment_status" class="drop-down">
                            <option value="<?= $fetch_orders['payment_status']; ?>" selected>
                                <?= $fetch_orders['payment_status']; ?></option>
                            <option value="pending">pending</option>
                            <option value="completed">completed</option>
                        </select>
                        <div class="flex-btn">
                            <input type="submit" value="update" class="btn" name="update_payment">
                            <a href="placed_orders.php?delete=<?= $fetch_orders['order_id']; ?>" class="delete-btn" onclick="return confirm('delete this order?');">delete</a>
                        </div>
                    </form>
                </div>
        <?php
            }
        } else {
            echo '<p class="empty">no orders placed yet!</p>';
        }
        ?>

    </div>

</section>

<!-- placed orders section ends -->
<?php include '../components/admin_footer.php' ?>