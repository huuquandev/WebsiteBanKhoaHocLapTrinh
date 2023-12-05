<?php
   include_once './function.php';

   if(isset($_POST['submit'])){
      $email = trim($_POST['email']);
      $password = trim($_POST['pass']);
      if(!login($email, $password)){   
         $message[] = 'Sai mật khẩu hoặc tài khoản!';
      }else{
         header('location:home.php');
      }
   }
   if(isset($message)){
      foreach($message as $message){
         echo '
         <div class="message form">
            <span >'.$message.'</span>
            <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
         </div>
         ';
      }
   }
?>

<section class="form-container">

   <form action="" method="post" enctype="multipart/form-data">
      <h3>Đăng nhập</h3>
      <p>Email <span>*</span></p>
      <input type="email" name="email" placeholder="Nhập Email" required maxlength="50" class="box">
      <p>Mật khẩu <span>*</span></p>
      <input type="password" name="pass" placeholder="Nhập mật khẩu" required maxlength="20" class="box">
      <p class="link">Bạn chưa có tài khoản? <a href="home.php?title=register">Đăng ký ngay</a></p>
      <p class="link">Bạn <a href="home.php?title=resetpassword">quên mật khẩu?</a></p>
      <input type="submit" value="Đăng nhập" name="submit" class="btn">

      <p class="switch-type-login">Hoặc sử dụng tài khoản khác</p>

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