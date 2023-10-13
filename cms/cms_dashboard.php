<?php
    session_start(); 
    include "../components/connect.php";
 
    if(isset($_SESSION['id_taikhoan'])){
       $id_taikhoan = $_SESSION['id_taikhoan'];
    }else{
       $id_taikhoan = '';
      //  header('location:cmspages/cms_login.php');
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

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="./cms_css/style.css">
   <link rel="stylesheet" href="./cms_css/admin_style.css">


</head>
<body>

<?php include 'cmspages/cms_header.php'; ?>
<?php include 'cmspages/cms_sidebar.php'; ?>
<?php include 'cmspages/cms_main.php'; ?>
<?php include 'cmspages/cms_footer.php'; ?>



<script src="../js/admin_script.js"></script>

</body>
</html>