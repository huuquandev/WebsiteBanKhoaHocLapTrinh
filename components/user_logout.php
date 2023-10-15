<?php
session_start(); 

unset($_SESSION['id_taikhoan']); 

header('location:../home.php'); // Chuyển hướng đến trang home.php
?>
