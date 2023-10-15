<?php
session_start(); 

unset($_SESSION['cms_id_tai_khoan']); 

header('location:../cms/cmspages/cms_login.php');
?>
