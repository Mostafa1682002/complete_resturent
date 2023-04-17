<?php
$titlepage = "Search";
include_once("components/connection.php");
include_once("components/function.php");
?>

<?php include_once("components/user_navbar.php"); ?>

<section class="search-form">
   <form action="" method="post">
      <input type="text" class="box" name="search_box" placeholder="search here..." maxlength="100">
      <button type="submit" class="fas fa-search" name="search_btn"></button>
   </form>
</section>

<section class="products" style="padding-top: 0; min-height: 100vh;"></section>


<?php
include_once("components/user_footer.php");
?>