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
      <p>your username <span>*</span></p>
      <input type="text" name="username" placeholder="enter your username" required maxlength="50" class="box">
      <p>your password <span>*</span></p>
      <input type="password" name="pass" placeholder="enter your password" required maxlength="20" class="box">
      <input type="submit" value="login new" name="submit" class="btn">
   </form>

</section>