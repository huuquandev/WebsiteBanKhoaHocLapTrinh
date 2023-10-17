<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Dăng nhập</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="../cms_css/style.css">
   <link rel="stylesheet" href="../cms_css/admin_style.css">

</head>
<body style="padding-left: 0;">

<?php
   session_start(); 
   include "../../components/connect.php";
   include_once '../../function.php';

   if(isset($_POST['submit'])){
      $email = trim($_POST['email']);
      $password = trim($_POST['pass']);
      if(!loginCMS($email, $password)){   
         $message[] = 'Sai mật khẩu hoặc tài khoản!';
      }else{
         header('Location:../cms_dashboard.php');
      }
   }
if(isset($message)){
   foreach($message as $message){
      echo '
      <div class="message form">
         <span>'.$message.'</span>
         <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
      </div>
      ';
   }
}
?>

<!-- register section starts  -->

<section class="form-container">

   <form action="" method="post" enctype="multipart/form-data" class="login">
      <h3>Mừng trở lại!</h3>
      <p>Email <span>*</span></p>
      <input type="email" name="email" placeholder="Nhập Email" maxlength="20" required class="box">
      <p>Mật khẩu <span>*</span></p>
      <input type="password" name="pass" placeholder="Nhập mật khẩu" maxlength="20" required class="box">
      <p class="link">Bạn chưa có tài khoản? <a href="cms_register.php">Đăng ký ngay</a></p>
      <input type="submit" name="submit" value="Đăng nhập" class="btn">
   </form>

</section>

<!-- registe section ends -->

<script>

let darkMode = localStorage.getItem('dark-mode');
let body = document.body;

const enabelDarkMode = () =>{
   body.classList.add('dark');
   localStorage.setItem('dark-mode', 'enabled');
}

const disableDarkMode = () =>{
   body.classList.remove('dark');
   localStorage.setItem('dark-mode', 'disabled');
}

if(darkMode === 'enabled'){
   enabelDarkMode();
}else{
   disableDarkMode();
}

</script>
   
</body>
</html>