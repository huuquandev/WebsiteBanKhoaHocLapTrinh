<?php

include_once './function.php';

if(isset($_POST['submit'])){

   $id = unique_id();
   $name = trim($_POST['name']);
   $email =  trim($_POST['email']);
   $pass = trim($_POST['pass']);
   $cfpass = trim($_POST['cfpass']);
   $phone = $_POST['phone'];
   $bdate = $_POST['bdate'];
   $doi_tuong = 1;
   $gioi_tinh = $_POST['sex'];
   $result = register($email, $name, $pass, $phone, $bdate, $doi_tuong, $gioi_tinh);

   if($result == 2){
      $message[] = 'Email đã tồn tại!';
   }else if($result == 1){
      $message[] = "File ảnh bìa chỉ nhận đuôi .jpg .jpeg .png .gif";
   }else if($pass != $cfpass){
      $message[] = 'Mật khẩu không trùng nhau!';
   }else{
      if(login($email, $pass)){   
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
      <h3>Đăng ký tài khoản</h3>
      <div class="flex">
         <div class="col">
            <p>Tên người dùng <span>*</span></p>
            <input type="text" name="name" placeholder="Nhập tên người dùng" maxlength="50" required class="box">
            <p>Email <span>*</span></p>
            <input type="email" name="email" placeholder="Nhập Email" maxlength="20" required class="box">
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
