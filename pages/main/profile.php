<?php
         include_once './function.php';

         if($id_taikhoan != ""){
            $sqlCountComennt  = "SELECT * FROM tb_binh_luan 
            WHERE tb_binh_luan.id_taikhoan = $id_taikhoan";
            $queryCountComennt = mysqli_query($conn, $sqlCountComennt);

            $sqlCountLike  = "SELECT * FROM tb_thichbinhluan
            WHERE tb_thichbinhluan.id_taikhoan = $id_taikhoan";
            $queryCountLike = mysqli_query($conn, $sqlCountLike);

            $sqlCountByCourses  = "SELECT * FROM tb_khoahoc_damua
            WHERE tb_khoahoc_damua.id_taikhoan = $id_taikhoan";
            $queryCountByCourses = mysqli_query($conn, $sqlCountByCourses);
         }else{
            header('location:home.php?title=login');
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
         <p>Người dùng</p>
         <a href="home.php?title=edit_profile&idU=<?php echo $id_taikhoan ?>" class="inline-btn">Hồ sơ</a>
      </div>

      <div class="box-container">
   
         <div class="box">
            <div class="flex">
               <i class="fas fa-bookmark"></i>
               <div>
                  <span><?php echo mysqli_num_rows($queryCountByCourses); ?></span>
                  <p>Khóa học đã mua</p>
               </div>
            </div>
            <a href="home.php?title=coursesbuy" class="inline-btn">Xem khóa học</a>
         </div>
   
         <div class="box">
            <div class="flex">
               <i class="fas fa-heart"></i>
               <div>
                  <span><?php echo mysqli_num_rows($queryCountLike); ?></span>
                  <p>Lượt thích</p>
               </div>
            </div>
            <a href="home.php?title=like" class="inline-btn">Xem lượt thích</a>
         </div>
   
         <div class="box">
            <div class="flex">
               <i class="fas fa-comment"></i>
               <div>
                  <span><?php echo mysqli_num_rows($queryCountComennt); ?></span>
                  <p>Bình luận</p>
               </div>
            </div>
            <a href="home.php?title=comment" class="inline-btn">Xem bình luận</a>
         </div>
      </div>
   </div>

</section>