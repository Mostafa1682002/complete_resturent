<?php
$titlepage = "Messages";
include_once("../components/admin_session.php");
include '../components/connection.php';
include '../components/function.php';



if (isset($_GET['delete'])) {
   $delete_id = $_GET['delete'];
   $check_messge = countOfElement('messages', 'message_id', $delete_id);
   if ($check_messge == 1) {
      $connection->query("DELETE FROM `messages` WHERE `message_id`=$delete_id");
      $message[] = "Deleted Message sucssfuly !";
   }
}
?>


<?php include '../components/admin_navbar.php'; ?>
<!-- messages section starts  -->
<section class="messages">
    <h1 class="heading">Messages</h1>
    <div class="box-container">
        <?php
      $select_messages = getAllDate("messages");
      if (countOfElement('messages') > 0) {
         foreach ($select_messages as $message) {
      ?>
        <div class="box">
            <p> Name : <span><?= $message['name']; ?></span> </p>
            <p> Number : <span><?= $message['number']; ?></span> </p>
            <p> Email : <span><?= $message['email']; ?></span> </p>
            <p> Message : <span style="word-break: break-word;"><?= $message['message_text']; ?></span> </p>
            <a href="messages.php?delete=<?= $message['message_id']; ?>" class="delete-btn"
                onclick="return confirm('delete this message?');">delete</a>
        </div>
        <?php
         }
      } else {
         echo '<p class="empty">you have no messages</p>';
      }
      ?>
    </div>


</section>

<!-- messages section ends -->
<?php include '../components/admin_footer.php' ?>