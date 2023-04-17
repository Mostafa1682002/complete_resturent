<?php
$titlepage = "Admin Accounts";
include_once("../components/admin_session.php");
include '../components/connection.php';
include '../components/function.php';

if (isset($_GET['delete']) && isset($_GET['username'])) {
    $delete_id = $_GET['delete'];
    $delete_name = $_GET['username'];
    $delete_user = $connection->query("DELETE FROM `users` WHERE `user_id`=$delete_id AND `user_name`='$delete_name'");
    if ($delete_user) {
        header('location:users_accounts.php');
        exit();
    }
}

?>

<!-- user accounts section starts  -->
<?php include '../components/admin_navbar.php'; ?>
<h1 class="heading">users account</h1>
<section class="display-product-table">
    <table>
        <thead>
            <th>#ID</th>
            <th>Username</th>
            <th>Email</th>
            <th>Number</th>
            <th>Address</th>
            <th>Register Date</th>
            <th>Control</th>
        </thead>
        <tbody>
            <?php
            $fetch_users = getAllDate('users');
            if (!empty($fetch_users)) {
                foreach ($fetch_users as  $user) {
            ?>
                    <tr class='row-table'>
                        <td><?php echo $user['user_id'] ?></td>
                        <td><?php echo $user['user_name'] ?></td>
                        <td><?php echo $user['user_email'] ?></td>
                        <td><?php echo $user['user_number'] ?></td>
                        <td><?php echo $user['user_address'] ?></td>
                        <td><?php echo $user['user_register'] ?></td>
                        <td class="flex-btn">
                            <a href="users_accounts.php?delete=<?php echo $user['user_id'] . "&username=" . $user['user_name']  ?>" class="delete-btn" onclick="return confirm('Are you soure Delete this user ?');"><i class="fa-solid fa-trash"></i> Delete</a>
                        </td>
                    </tr>
            <?php
                }
            } else {
                echo '<p class="empty">no accounts available</p>';
            }
            ?>
        </tbody>
    </table>
</section>

<!-- user accounts section ends -->
<?php include '../components/admin_footer.php' ?>