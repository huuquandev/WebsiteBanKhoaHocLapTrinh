<?php
   if($id_taikhoan == ""){
      header('location:../cms/cmspages/cms_login.php');
   }
         include_once '../function.php';

         if($id_taikhoan != ""){
            $sqlCountPost = "SELECT * FROM tb_bai_viet WHERE tb_bai_viet.id_taikhoan = $id_taikhoan";
            $queryCountPost = mysqli_query($conn, $sqlCountPost);

            $sqlCountCourses  = "SELECT * FROM tb_khoa_hoc WHERE tb_khoa_hoc.id_taikhoan = $id_taikhoan";
            $queryCountCourses = mysqli_query($conn, $sqlCountCourses);

            $sqlCountComennt  = "SELECT * FROM tb_binh_luan 
            JOIN tb_bai_viet ON tb_binh_luan.id_baiviet = tb_bai_viet.id_baiviet
            WHERE tb_bai_viet.id_taikhoan = $id_taikhoan;
            ";
            $queryCountComennt= mysqli_query($conn, $sqlCountComennt);

            $sqlCountLike  = "SELECT * FROM tb_thichbaiviet 
            JOIN tb_bai_viet ON tb_thichbaiviet.id_baiviet = tb_bai_viet.id_baiviet
            WHERE tb_bai_viet.id_taikhoan = $id_taikhoan";
            $queryCountLike = mysqli_query($conn, $sqlCountLike);
         }

?>


<section class="dashboard">

   <h1 class="heading">Tùy chọn nhanh</h1>

   <div class="box-container">

      <div class="box">
         <h3>Xin chào!</h3>
         <p><?php echo $_SESSION['cms_ten_hien_thi'] ?></p>
         <a href="profile.php" class="btn">Hồ sơ</a>
      </div>

      <div class="box">
         <h3><?php echo mysqli_num_rows($queryCountPost) ?></h3>
         <p>Số lượng bài viết</p>
         <a href="cms_dashboard.php?title=add_post" class="btn">Thêm bài viết</a>
      </div>

      <div class="box">
         <h3><?php echo mysqli_num_rows($queryCountCourses) ?></h3>
         <p>Số lượng khóa học</p>
         <a href="cms_dashboard.php?title=add_courses" class="btn">Thêm khóa học</a>
      </div>
      <div class="box">
         <h3><?php echo mysqli_num_rows($queryCountComennt) ?></h3>
         <p>Số lượng bình luận</p>
         <a href="cms_dashboard.php?title=cms_comment" class="btn">Xem bình luận</a>
      </div>
      <div class="box">
         <h3><?php echo mysqli_num_rows($queryCountLike) ?></h3>
         <p>Số lượng lượt thích</p>
         <a href="cms_dashboard.php?title=cms_like" class="btn">Xem lượt thích</a>
      </div>

   </div>

</section>