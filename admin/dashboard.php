<?php
$titlepage = "Admin Dashboard";
include_once("../components/admin_session.php");
include '../components/connection.php';
include '../components/function.php';
?>



<!-- admin dashboard section starts  -->
<?php include '../components/admin_navbar.php'; ?>
<section class="dashboard">
    <h1 class="heading">dashboard</h1>
    <div class="box-container">
        <div class="box">
            <h3>welcome!</h3>
            <p><?php echo $admin_name; ?></p>
            <a href="update_profile.php" class="btn">update profile</a>
        </div>
        <div class="box">
            <?php
            $total_pendings = 0;
            $select_pendings = getAllDate('orders', 'payment_status', 'pending');
            foreach ($select_pendings as $pending) {
                $total_pendings += $pending['total_price'];
            }
            ?>
            <h3><span>$</span>
                <?= $total_pendings; ?><span>/-</span>
            </h3>
            <p>total pendings</p>
            <a href="placed_orders.php" class="btn">see orders</a>
        </div>

        <div class="box">
            <?php
            $total_completes = 0;
            $select_completes = getAllDate('orders', 'payment_status', 'completed');
            foreach ($select_completes as $complete) {
                $total_completes += $complete['total_price'];
            }
            ?>
            <h3><span>$</span>
                <?= $total_completes; ?><span>/-</span>
            </h3>
            <p>total completes</p>
            <a href="placed_orders.php" class="btn">see orders</a>
        </div>

        <div class="box">
            <?php $numbers_of_orders = countOfElement('orders'); ?>
            <h3><?php echo $numbers_of_orders; ?></h3>
            <p>total orders</p>
            <a href="placed_orders.php" class="btn">see orders</a>
        </div>

        <div class="box">
            <?php $numbers_of_products = countOfElement("products"); ?>
            <h3><?php echo $numbers_of_products; ?></h3>
            <p>Products Added</p>
            <a href="products.php" class="btn">see products</a>
        </div>

        <div class="box">
            <?php $numbers_of_users = countOfElement("users"); ?>
            <h3><?php echo $numbers_of_users; ?></h3>
            <p>Users Accounts</p>
            <a href="users_accounts.php" class="btn">see users</a>
        </div>

        <div class="box">
            <?php $numbers_of_admins = countOfElement("admin"); ?>
            <h3><?php echo $numbers_of_admins; ?></h3>
            <p>Admins</p>
            <a href="admin_accounts.php" class="btn">see admins</a>
        </div>

        <div class="box">
            <?php $numbers_of_messages = countOfElement('messages'); ?>
            <h3><?php echo $numbers_of_messages; ?></h3>
            <p>New Messages</p>
            <a href="messages.php" class="btn">see messages</a>
        </div>

    </div>

</section>

<!-- admin dashboard section ends -->
<?php include '../components/admin_footer.php' ?>