<?php
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

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Messages</title>
        <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />
        <!-- font awesome cdn link  -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
        <!-- custom css file link  -->
        <link rel="stylesheet" href="../css/admin_style.css">
    </head>

    <body>
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
        <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
        <script src="../js/admin_script.js"></script>
    </body>

</html>