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

<section class="user-profile">

   <h1 class="heading" style="
   position: relative;
    display: flex;
    align-items: center;
    justify-content: space-between;">  
    Thông tin tài khoản
    <a href="home.php?title=change_password" class="inline-btn">Đổi mật khẩu</a>

   </h1>

   <div class="info">

      <div class="user">
         <img src="images/images_user/<?= $row['hinh_anh']; ?>" alt="">
         <h3><?= $row['ten_hien_thi']; ?></h3>
         <p>Quản trị viên</p>
         <a href="home.php?title=edit_profile&idU=<?php echo $id_taikhoan ?>" class="inline-btn">Hồ sơ</a>
      </div>

      <div class="box-container">
   
         <div class="box">
            <div class="flex">
               <i class="fas fa-bookmark"></i>
               <div>
                  <span><?php echo mysqli_num_rows($queryCountCourses) ?></span>
                  <p>Khóa học</p>
               </div>
            </div>
            <a href="cms_dashboard.php?title=cms_courses" class="inline-btn">khóa học</a>
         </div>
         <div class="box">
            <div class="flex">
            <i class="fas fa-chalkboard-user"></i>
               <div>
                  <span><?php echo mysqli_num_rows($queryCountPost) ?></span>
                  <p>bài viết</p>
               </div>
            </div>
            <a href="cms_dashboard.php?title=cms_like" class="inline-btn">Bài viết</a>
         </div>
         <div class="box">
            <div class="flex">
               <i class="fas fa-heart"></i>
               <div>
                  <span><?php echo mysqli_num_rows($queryCountLike); ?></span>
                  <p>Lượt thích</p>
               </div>
            </div>
            <a href="cms_dashboard.php?title=cms_like" class="inline-btn">Xem lượt thích</a>
         </div>
   
         <div class="box">
            <div class="flex">
               <i class="fas fa-comment"></i>
               <div>
                  <span><?php echo mysqli_num_rows($queryCountComennt); ?></span>
                  <p>Bình luận</p>
               </div>
            </div>
            <a href="cms_dashboard.php?title=cms_comment" class="inline-btn">Xem bình luận</a>
         </div>
      </div>
   </div>

</section>