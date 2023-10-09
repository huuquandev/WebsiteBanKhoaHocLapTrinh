<?php

include_once './function.php';

if(isset($_POST['submit'])){

   $id = unique_id();
   $name = trim($_POST['name']);
   $username =  trim($_POST['username']);
   $pass = trim($_POST['pass']);
   $cfpass = trim($_POST['cfpass']);
   $phone = $_POST['phone'];
   $bdate = $_POST['bdate'];
   $doi_tuong = 1;
   $gioi_tinh = $_POST['sex'];

   if(!register($username, $name, $pass, $phone, $bdate, $doi_tuong, $gioi_tinh)){
      $message[] = 'Tài khoản đã tồn tại!';
   }else if($pass != $cfpass){
      $message[] = 'Mật khẩu không trùng nhau!';
   }else{
      if(login($username, $pass)){   
         header('location:home.php');
      }
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

   <form class="register" action="" method="post" enctype="multipart/form-data">
      <h3>create account</h3>
      <div class="flex">
         <div class="col">
            <p>Tên người dùng <span>*</span></p>
            <input type="text" name="name" placeholder="Nhập tên người dùng" maxlength="50" required class="box">
            <p>Tài khoản <span>*</span></p>
            <input type="text" name="username" placeholder="Nhập tài khoản" maxlength="20" required class="box">
         </div>
         <div class="col">
            <p>Mật khẩu <span>*</span></p>
            <input type="password" name="pass" placeholder="Nhập mật khẩu" maxlength="20" required class="box">
            <p>Xác nhận mật khẩu <span>*</span></p>
            <input type="password" name="cfpass" placeholder="Xác nhận mật khẩu" maxlength="20" required class="box">
         </div>
         
      </div>
      <p>Giới tính <span>*</span></p>
            <select name="sex" class="box" required>
               <option value="" disabled selected>-- Chọn giới tính --</option>
               <option value="0">Nam</option>
               <option value="1">Nữ</option>
               <option value="2">Khác</option>
            </select>
      <p>Số điện thoại <span>*</span></p>
      <input type="number" name="phone" placeholder="Nhập số điện thoại " maxlength="20" required class="box">
      <p>Ngày sinh <span>*</span></p>
      <input type="date" name="bdate" maxlength="20" required class="box">
      <p>Ảnh đại diện <span>*</span></p>
      <input type="file" name="image" accept="image/*" class="box">
      <p class="link">Bạn đã có tài khoản? <a href="home.php?title=login">Đăng nhập ngay</a></p>
      <input type="submit" name="submit" value="Đăng ký ngay" class="btn">
   </form>

</section>
