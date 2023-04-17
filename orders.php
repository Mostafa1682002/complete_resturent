<?php
$titlepage = "My Order";
include_once("components/connection.php");
include_once("components/function.php");
?>

<?php include_once("components/user_navbar.php"); ?>
<div class="heading">
   <h3>your orders</h3>
   <p><a href="index.php">Home </a> <span> / Orders</span></p>
</div>

<section class="orders">

   <h1 class="title">placed orders</h1>

   <div class="box-container">

      <div class="box">
         <p> placed on : <span>5-29-2022</span> </p>
         <p> name : <span>shaikh anas</span> </p>
         <p> number : <span>1234567899</span> </p>
         <p> email : <span>shaikhanas@gmail.com</span> </p>
         <p> address : <span>jogeshwari, mumbai, india - 400103</span> </p>
         <p> your orders : <span>pizza 01 (1) - main dish 02 (3) -</span> </p>
         <p> total price : <span>$12/-</span> </p>
         <p> payment method : <span>cash on delivery</span> </p>
         <p> payment status : <span>pending</span> </p>
      </div>

      <div class="box">
         <p> placed on : <span>5-29-2022</span> </p>
         <p> name : <span>shaikh anas</span> </p>
         <p> number : <span>1234567899</span> </p>
         <p> email : <span>shaikhanas@gmail.com</span> </p>
         <p> address : <span>jogeshwari, mumbai, india - 400103</span> </p>
         <p> your orders : <span>pizza 01 (1) - main dish 02 (3) -</span> </p>
         <p> total price : <span>$12/-</span> </p>
         <p> payment method : <span>cash on delivery</span> </p>
         <p> payment status : <span>pending</span> </p>
      </div>

   </div>

</section>
<?php
include_once("components/user_footer.php");
?>