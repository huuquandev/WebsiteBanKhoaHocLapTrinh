<?php
    session_start(); 
    include "../components/connect.php";
 
    if(isset($_SESSION['cms_id_tai_khoan'])){
       $id_taikhoan = $_SESSION['cms_id_tai_khoan'];
    }else{
       $id_taikhoan = '';
       header('location:../cms/cmspages/cms_login.php');
    }
    include("cmspages/cms_title.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title><?php echo $pageTitle ?></title>

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
   
   <link rel="stylesheet" href="./cms_css/style.css">
   <link rel="stylesheet" href="./cms_css/admin_style.css">
   <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


</head>
<body>
<div id="overlay"></div>

<?php include 'cmspages/cms_header.php'; ?>
<?php include 'cmspages/cms_sidebar.php'; ?>
<?php include 'cmspages/cms_main.php'; ?>
<?php include 'cmspages/cms_footer.php'; ?>



<script src="../js/admin_script.js"></script>
<script src="../admin/ckeditor/ckeditor.js"></script>
<script>
    CKEDITOR.replace('noidung_baiviet');
</script>
</body>
</html>