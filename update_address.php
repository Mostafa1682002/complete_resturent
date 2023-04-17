<?php
$titlepage = "Update Address";
include_once("components/connection.php");
include_once("components/user_session.php");
include_once("components/function.php");
?>



<?php include_once("components/user_navbar.php"); ?>
<section class="form-container">

   <form action="" method="post">
      <h3>your address</h3>
      <input type="text" maxlength="50" placeholder="flat no. and building name" required class="box" name="flat">
      <input type="text" maxlength="50" placeholder="area name" required class="box" name="street">
      <input type="text" maxlength="50" placeholder="city name" required class="box" name="city">
      <input type="text" maxlength="50" placeholder="state name" required class="box" name="state">
      <input type="text" maxlength="50" placeholder="country name" required class="box" name="country">
      <input type="number" min="0" max="999999" placeholder="pin code" required class="box" name="pin_code" onkeypress="if(this.value.length == 6) return false;">
      <input type="submit" value="save address" name="submit" class="btn">
   </form>

</section>
<?php
include_once("components/user_footer.php");
?>