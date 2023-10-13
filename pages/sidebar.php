
<div class="side-bar">

   <div class="close-side-bar">
      <i class="fas fa-times"></i>
   </div>

   <div class="profile">
         <?php
            $sql = "select * from tb_tai_khoan where id_taikhoan = '$id_taikhoan'";
            $query = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($query);
            if($row > 0){
         ?>
         <img src="images/images_user/<?= $row['hinh_anh']; ?>" alt="">
         <h3><?= $row['ten_hien_thi']; ?></h3>
         <span>student</span>
         <a href="home.php?title=profile" class="btn">Hồ sơ</a>
         <?php
            }else{
         ?>
         <h3>Vui lòng đăng nhập hoặc đăng ký</h3>
          <div class="flex-btn" style="padding-top: .5rem;">
            <a href="home.php?title=login" class="option-btn">Đăng nhập</a>
            <a href="home.php?title=register" class="option-btn">Đăng kí</a>
         </div>
         <?php
            }
         ?>
      </div>

      <nav class="navbar">
      <a href="home.php"><i class="fas fa-home"></i><span>Trang chủ</span></a>
      <a href="home.php?title=about"><i class="fas fa-question"></i><span>Giới thiệu</span></a>
      <a href="home.php?title=courses"><i class="fas fa-graduation-cap"></i><span>Khóa học</span></a>
      <a href="home.php?title=post"><i class="fas fa-chalkboard-user"></i><span>Bài viết</span></a>
      <a href="home.php?title=contact"><i class="fas fa-headset"></i><span>Liên hệ</span></a>
   </nav>

</div>