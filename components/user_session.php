<?php
if (isset($_SESSION['user_name']) && isset($_SESSION['user_id'])) {
    $user_name = $_SESSION['user_name'];
    $user_id = $_SESSION['user_id'];
} else {
    header("location: login.php");
    exit();
}
