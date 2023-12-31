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
         }

?>
<section class="quick-select">
   <div class="box-container">
      <?php 
            include_once 'slider.php';
      ?>
   </div>

</section>
<section class="quick-select">

   <div class="box-container">

      <div class="box">
         <h3 class="title">Phổ biến</h3>
         <div class="flex">
            <a href="#"><i class="fab fa-html5"></i><span>HTML</span></a>
            <a href="#"><i class="fab fa-css3"></i><span>CSS</span></a>
            <a href="#"><i class="fab fa-js"></i><span>javascript</span></a>
            <a href="#"><i class="fab fa-react"></i><span>react</span></a>
            <a href="#"><i class="fab fa-php"></i><span>PHP</span></a>
            <a href="#"><i class="fab fa-bootstrap"></i><span>bootstrap</span></a>
         </div>
      </div>

   </div>

</section>
<?php 
         include_once './function.php';
      $sqlcourses = "SELECT tb_khoa_hoc.*, tb_cms_tai_khoan.hinh_anh, tb_cms_tai_khoan.ten_hien_thi
      FROM tb_khoa_hoc
      JOIN tb_cms_tai_khoan ON tb_khoa_hoc.id_taikhoan = tb_cms_tai_khoan.id_cms_taikhoan
      WHERE tb_khoa_hoc.gia_khoahoc IS NOT NULL";
      $querycourses = mysqli_query($conn, $sqlcourses);
      if(mysqli_num_rows($querycourses) > 0)
 {
?>
<section class="courses">
         
   <h1 class="heading">Khoá học Pro</h1>
   <div class="box-container">  
      <?php 
      while ($row = mysqli_fetch_assoc($querycourses)) {
      ?>
         <div class="box">
            <div class="tutor">
                  <img src="images/images_user/<?php echo $row['hinh_anh']; ?>" alt="">
                  <div class="info">
                     <h3><?php echo $row['ten_hien_thi']; ?></h3>
                     <span><?php echo $row['ngaydang_khoahoc']; ?></span>
                  </div>
            </div>
            <div class="thumb">
            <img src="images/images_courses/<?php echo $row['anh_khoahoc']; ?>" class="card-img-top" height="200vh" alt="">
            </div>
            <h3 class="title" style="min-height: 50px"><?php echo $row['ten_khoahoc']; ?></h3>
            <h5 class="title" style="font-size: 1.5rem; color:red"><?php echo convertToVietnameseCurrency($row['gia_khoahoc']); ?></h5>
            <a href="home.php?title=courses_content&idKH=<?php echo $row['id_khoahoc']; ?>" style="display: block;" class="btn btn-success">Chi tiết</a>
         </div>
      <?php 
         }
      ?>
   </div>

</section>
<?php 
 }
 $sqlcoursesfree = "SELECT tb_khoa_hoc.*, tb_cms_tai_khoan.hinh_anh, tb_cms_tai_khoan.ten_hien_thi
 FROM tb_khoa_hoc
 JOIN tb_cms_tai_khoan ON tb_khoa_hoc.id_taikhoan = tb_cms_tai_khoan.id_cms_taikhoan
 WHERE tb_khoa_hoc.gia_khoahoc IS NULL";  
 $querycoursesfree = mysqli_query($conn, $sqlcoursesfree);
 if(mysqli_num_rows($querycoursesfree) > 0)
 {
?>

<section class="courses">

   <h1 class="heading">Khoá học miễn phí</h1>

   <div class="box-container">  
      <?php 
      while ($row = mysqli_fetch_assoc($querycoursesfree)) {
      ?>
         <div class="box">
            <div class="tutor">
                  <img src="images/images_user/<?php echo $row['hinh_anh']; ?>" alt="">
                  <div class="info">
                     <h3><?php echo $row['ten_hien_thi']; ?></h3>
                     <span><?php echo $row['ngaydang_khoahoc']; ?></span>
                  </div>
            </div>
            <div class="thumb">
            <img src="images/images_courses/<?php echo $row['anh_khoahoc']; ?>" class="card-img-top" height="200vh" alt="">
            </div>
            <h3 class="title" style="min-height: 50px"><?php echo $row['ten_khoahoc']; ?></h3>
            <a href="home.php?title=courses_content&idKH=<?php echo $row['id_khoahoc']; ?>" style="display: block;" class="btn btn-success">Vào học</a>
         </div>
      <?php 
         }
      ?>
   </div>


</section>
<?php 
      }; 
      $sqlpost = "SELECT tb_bai_viet.*, tb_cms_tai_khoan.hinh_anh, tb_cms_tai_khoan.ten_hien_thi FROM tb_bai_viet
      JOIN tb_cms_tai_khoan ON tb_bai_viet.id_taikhoan = tb_cms_tai_khoan.id_cms_taikhoan";
      $querypost = mysqli_query($conn, $sqlpost);
      if(mysqli_num_rows($querypost) > 0){
?>
<section class="courses">

   <h1 class="heading">Bài viết nổi bật</h1>

   <div class="box-container">  
      <?php 

      while ($row = mysqli_fetch_assoc($querypost)) {
      ?>
         <div class="box">
            <div class="tutor">
                  <img src="images/images_user/<?php echo $row['hinh_anh']; ?>" alt="">
                  <div class="info">
                     <h3><?php echo $row['ten_hien_thi']; ?></h3>
                     <span><?php echo $row['ngaydang_baiviet']; ?></span>
                  </div>
            </div>
            <div class="thumb">
                  <img src="images/images_post/<?php echo  $row['anh_baiviet']; ?>" class="card-img-top" height="200vh" alt="">
            </div>
            <h3 class="title" style="min-height: 50px"><?php echo $row['ten_baiviet']; ?></h3>
            <a href="home.php?title=postdetail&id_baiviet=<?php echo $row['id_baiviet']; ?>" style="display: block;" class="btn btn-success">Chi tiết</a>
         </div>
      <?php 
      }
      ?>
   </div>
</section>
<?php 
}

?>