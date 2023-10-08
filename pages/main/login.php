<?php
   include_once './function.php';

   if(isset($_POST['submit'])){
      $username = trim($_POST['username']);
      $password = trim($_POST['pass']);
      if(login($username, $password)){   
         header('location:home.php');
      }else{
         $message[] = 'incorrect email or password!';
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

<section class="form-container">

   <form action="" method="post" enctype="multipart/form-data">
      <h3>login now</h3>
      <p>Tài khoản <span>*</span></p>
      <input type="text" name="username" placeholder="Nhập tài khoản" required maxlength="50" class="box">
      <p>mật khẩu <span>*</span></p>
      <input type="password" name="pass" placeholder="Nhập mật khẩu" required maxlength="20" class="box">
      <p class="link">Bạn chưa có tài khoản? <a href="home.php?title=register">Đăng ký ngay</a></p>
      <input type="submit" value="login new" name="submit" class="btn">

   </form>

</section>