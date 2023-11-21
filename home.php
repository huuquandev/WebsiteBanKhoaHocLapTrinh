<?php
    session_start(); 
    include "components/connect.php";
    include "pages/tittle.php";
    if(isset($_SESSION['id_taikhoan'])){
       $id_taikhoan = $_SESSION['id_taikhoan'];
    }else{
       $id_taikhoan = '';
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title><?php echo $pageTitle ?></title>

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">

   <link rel="stylesheet" href="css/style.css">
   <link rel="stylesheet" href="css/admin_style.css">


   <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</head>
<body>

      <?php
            include("pages/header.php");
            include("pages/main.php");

        ?>  

<!-- custom js file link  -->
<script src="js/script.js"></script>
<script src="js/admin_script.js"></script>

</body>
</html>