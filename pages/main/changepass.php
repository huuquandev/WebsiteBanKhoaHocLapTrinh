<?php 
if($id_taikhoan == ""){
    header('location:home.php?title=login');
}
?>

<section class="editprofile">
   <h1 class="heading">Đổi mật khẩu</h1>

   <section class="form-container" style="min-height: calc(100vh - 19rem);">

    <form class="register" action="" method="post" enctype="multipart/form-data">
        <h3>Thông tin mật khẩu</h3>

        <p>Mật khẩu cữ</p>
        <input type="password" name="old_pass" placeholder="Nhập mật khẩu cũ" maxlength="20"  class="box">
        <p>Mật khẩu mới</p>
        <input type="password" name="new_pass" placeholder="Nhập mật khẩu mới" maxlength="20"  class="box">
        <p>Xác nhận mật khẩu mới</p>
        <input type="password" name="cpass" placeholder="Xác nhận mật khẩu mới" maxlength="20"  class="box">
        

        <input type="submit" name="submit" value="Lưu lại" class="btn">
    </form>

   </section>

</section>