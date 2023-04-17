<?php
session_start();
if (isset($_SESSION['admin_name']) && isset($_SESSION['admin_id'])) {
    $admin_name = $_SESSION['admin_name'];
    $admin_id = $_SESSION['admin_id'];
} else {
    header("location: admin_login.php");
    exit();
}
