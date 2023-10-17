<?php
    session_start(); 
    include "components/connect.php";
 
    if(isset($_SESSION['id_taikhoan'])){
       $id_taikhoan = $_SESSION['id_taikhoan'];
    }else{
       $id_taikhoan = '';
    }
    include("pages/tittle.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title><?php echo $pageTitle ?></title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">

   <!-- custom css file link  -->

   <link rel="stylesheet" href="css/style.css">
   <link rel="stylesheet" href="css/admin_style.css">

</head>
<body>

      <?php
            include("pages/header.php");
            include("pages/sidebar.php");
            include("pages/main.php");
            include("pages/footer.php");
        ?>  

<!-- custom js file link  -->
<script src="js/script.js"></script>
<script src="js/admin_script.js"></script>
</body>
</html>