<?php
   include_once './function.php';

   if(isset($_POST['submit'])){
      $username = trim($_POST['username']);
      $password = trim($_POST['pass']);
      if(!login($username, $password)){   
         $message[] = 'Sai mật khẩu hoặc tài khoản!';
      }else{
         header('location:home.php');
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
      <h3>Đăng nhập</h3>
      <p>Tài khoản <span>*</span></p>
      <input type="text" name="username" placeholder="Nhập tài khoản" required maxlength="50" class="box">
      <p>mật khẩu <span>*</span></p>
      <input type="password" name="pass" placeholder="Nhập mật khẩu" required maxlength="20" class="box">
      <p class="link">Bạn chưa có tài khoản? <a href="home.php?title=register">Đăng ký ngay</a></p>
      <input type="submit" value="login new" name="submit" class="btn">
      <div class="signin-options">
         <div class="col">
            <button href="#" class="fb">
               <i class="fa-brands fa-facebook-f"></i>
            </button>   
         </div>   
         <div class="col">
            <button href="#" class="google">
            <i class="fa-brands fa-google"></i>               
            </button>
         </div> 
      </div>
   </form>

</section>