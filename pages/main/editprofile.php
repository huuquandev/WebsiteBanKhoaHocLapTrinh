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
<section class="editprofile">
<h1 class="heading">Chỉnh sửa hồ sơ</h1>

   <section class="form-container" style="min-height: calc(100vh - 19rem);">

   <form class="register" action="" method="post" enctype="multipart/form-data">
      <h3>Thông tin tài khoản</h3>
      <div class="flex">
         <div class="col">
            <p>Tên hiển thị</p>
            <input type="text" name="name" placeholder="Nhập tên hiển thị" maxlength="50"  class="box">
            <p>Giới tính<span></span></p>
            <select name="sex" class="box" required>
               <option value="" disabled selected>-- Chọn giới tính --</option>
               <option value="0">Nam</option>
               <option value="1">Nữ</option>
               <option value="2">Khác</option>
            </select>
            <p>Số điện thoại<span></span></p>
            <input type="number" name="phone" placeholder="Nhập số điện thoại" maxlength="20" required class="box">
         </div>
         <div class="col">
            <p>Mật khẩu cữ</p>
            <input type="password" name="old_pass" placeholder="Nhập mật khẩu cữ" maxlength="20"  class="box">
            <p>Mật khẩu mới</p>
            <input type="password" name="new_pass" placeholder="Nhập mật khẩu mới" maxlength="20"  class="box">
            <p>Xác nhận mật khẩu mới</p>
            <input type="password" name="cpass" placeholder="Xác nhận mật khẩu mới" maxlength="20"  class="box">
         </div>
      </div>
      <p>Ngày sinh <span></span></p>
      <input type="date" name="bdate" maxlength="20" required class="box">
      <p>Ảnh đại diện <span></span></p>
      <input type="file" name="image" accept="image/*" class="box">
      <input type="submit" name="submit" value="update now" class="btn">
   </form>

   </section>

</section>
