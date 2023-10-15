<div class="side-bar">

   <div class="close-side-bar">
      <i class="fas fa-times"></i>
   </div>

   <div class="profile">
         <?php

            $sql = "SELECT * FROM tb_cms_tai_khoan WHERE id_cms_taikhoan = '$id_taikhoan'";
            $query = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($query);
            if($row > 0){
         ?>
         <img src="../../../images/images_user/<?= $row['hinh_anh']; ?>" alt="">
         <h3><?= $row['ten_hien_thi']; ?></h3>
         <span>student</span>
         <a href="home.php?title=profile" class="btn">Hồ sơ</a>
         <?php
            }else{
         ?>
         <h3></h3>
          <div class="flex-btn" style="padding-top: .5rem;">
            <a href="cmspages/cms_login.php" class="option-btn">Đăng nhập</a>
            <a href="cmspages/cms_register.php" class="option-btn">Đăng kí</a>
         </div>
         <?php
            }
         ?>
      </div>

      <nav class="navbar">
      <a href="cms_dashboard.php"><i class="fas fa-home"></i><span>Trang chủ</span></a>
      <a href="cms_dashboard.php?title=cms_courses"><i class="fa-solid fa-bars-staggered"></i><span>Khóa học</span></a>
      <a href="cms_dashboard.php?title=cms_post"><i class="fas fa-chalkboard-user"></i><span>Bài viết</span></a>
      <a href="cms_dashboard.php?title=cms_comment"><i class="fas fa-comment"></i><span>Bình luận</span></a>
      <a href="cms_dashboard.php?title=cms_like"><i class="fas fa-heart"></i><span>Lượt thích</span></a>
      <a href="../../components/cms_logout.php" onclick="return confirm('Bạn chắc chắn muốn đăng xuất?');"><i class="fas fa-right-from-bracket"></i><span>Đăng xuất</span></a>
   </nav>

</div>   