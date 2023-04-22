<?php
$titlepage = "Contact Us";
session_start();
include_once("components/connection.php");
include_once("components/function.php");

if (isset($_POST['send_mssage'])) {
   $name = $_POST['name'];
   $number = $_POST['number'];
   $email = $_POST['email'];
   $msg = $_POST['msg'];
   $user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : 0;
   $send_msg = $connection->query("INSERT INTO `messages` (`message_id`, `user_id`, `name`, `email`, `number`, `message_text`, `message_register`) VALUES (NULL, '0', '$name', '$email', '$number', '$msg', current_timestamp())");
   if ($send_msg) {
      $message[] = "Secssed Send Your Message";
   }
}





?>


<?php include_once("components/user_navbar.php"); ?>
<div class="heading">
   <h3>contact us</h3>
   <p><a href="index.php">Home </a> <span> / Contact</span></p>
</div>

<section class="contact">
   <div class="row">
      <div class="image">
         <img src="images/contact-img.svg" alt="">
      </div>
      <form action="" method="post">
         <h3>tell us something!</h3>
         <input type="text" name="name" required placeholder="enter your name" maxlength="50" class="box">
         <input type="number" name="number" required placeholder="enter your number" class="box" onkeypress="if(this.value.length == 10) return false;">
         <input type="email" name="email" required placeholder="enter your email" maxlength="50" class="box">
         <textarea name="msg" placeholder="enter your message" required class="box" cols="30" rows="10" maxlength="500"></textarea>
         <input type="submit" value="send message" class="btn" name="send_mssage">
      </form>
   </div>
</section>
<?php
include_once("components/user_footer.php");
?>