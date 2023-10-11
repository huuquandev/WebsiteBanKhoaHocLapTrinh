
<section class="quick-select">

   <h1 class="heading">quick options</h1>

<div class="box-container">

         <?php
            if($id_taikhoan != ''){
         ?>
         <div class="box">
            <h3 class="title">likes and comments</h3>
            <p>total likes : <span><?= $total_likes = 0; ?></span></p>
            <a href="likes.php" class="inline-btn">view likes</a>
            <p>total comments : <span><?= $total_comments = 0; ?></span></p>
            <a href="comments.php" class="inline-btn">view comments</a>
            <p>saved playlist : <span><?= $total_bookmarked = 0; ?></span></p>
            <a href="bookmark.php" class="inline-btn">view bookmark</a>
         </div>
         <?php
            }else{ 
         ?>
         <div class="box" style="text-align: center;">
            <h3 class="title">Vui lòng đăng nhập hoặc đăng ký</h3>
            <div class="flex-btn" style="padding-top: .5rem;">
               <a href="home.php??title=login" class="option-btn">Đăng nhập</a>
               <a href="home.php??title=register" class="option-btn">Đăng kí</a>
            </div>
         </div>
         <?php
         }
         ?>

      <div class="box">
         <h3 class="title">top categories</h3>
         <div class="flex">
            <a href="#"><i class="fas fa-code"></i><span>development</span></a>
            <a href="#"><i class="fas fa-chart-simple"></i><span>business</span></a>
            <a href="#"><i class="fas fa-pen"></i><span>design</span></a>
            <a href="#"><i class="fas fa-chart-line"></i><span>marketing</span></a>
            <a href="#"><i class="fas fa-music"></i><span>music</span></a>
            <a href="#"><i class="fas fa-camera"></i><span>photography</span></a>
            <a href="#"><i class="fas fa-cog"></i><span>software</span></a>
            <a href="#"><i class="fas fa-vial"></i><span>science</span></a>
         </div>
      </div>

      <div class="box">
         <h3 class="title">popular topics</h3>
         <div class="flex">
            <a href="#"><i class="fab fa-html5"></i><span>HTML</span></a>
            <a href="#"><i class="fab fa-css3"></i><span>CSS</span></a>
            <a href="#"><i class="fab fa-js"></i><span>javascript</span></a>
            <a href="#"><i class="fab fa-react"></i><span>react</span></a>
            <a href="#"><i class="fab fa-php"></i><span>PHP</span></a>
            <a href="#"><i class="fab fa-bootstrap"></i><span>bootstrap</span></a>
         </div>
      </div>

      <div class="box">
         <h3 class="title">become a tutor</h3>
         <p class="tutor">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Perspiciatis, nam?</p>
         <a href="teachers.html" class="inline-btn">get started</a>
      </div>

   </div>

</section>
<section class="courses">
         
   <h1 class="heading">Khoá học Pro</h1>
   <div class="box-container">  
      <?php 
         include_once './function.php';
      $sql = "SELECT tb_khoa_hoc.*, tb_tai_khoan.hinh_anh, tb_tai_khoan.ten_hien_thi FROM tb_khoa_hoc 
      JOIN tb_tai_khoan ON tb_khoa_hoc.id_taikhoan = tb_tai_khoan.id_taikhoan";
      $query = mysqli_query($conn, $sql);
      while ($row = mysqli_fetch_assoc($query)) {
         if(!empty($row['gia_khoahoc']))
         {
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
            <img src="<?php echo "images/images_courses" . $row['anh_khoahoc']; ?>" class="card-img-top" height="200vh" alt="Course Image">
            </div>
            <h3 class="title" style="min-height: 50px"><?php echo $row['ten_khoahoc']; ?></h3>
            <h5 class="title" style="font-size: 1.5rem; color:red"><?php echo convertToVietnameseCurrency($row['gia_khoahoc']); ?></h5>
            <a href="home.php?title=courses_content&idKH=<?php echo $row['id_khoahoc']; ?>" style="display: block;" class="btn btn-success">Chi tiết</a>
         </div>
      <?php 
         }
      }; 
      ?>
   </div>

</section>
<section class="courses">

   <h1 class="heading">Khoá học miễn phí</h1>

   <div class="box-container">  
      <?php 
      $sql = "SELECT tb_khoa_hoc.*, tb_tai_khoan.hinh_anh, tb_tai_khoan.ten_hien_thi FROM tb_khoa_hoc 
      JOIN tb_tai_khoan ON tb_khoa_hoc.id_taikhoan = tb_tai_khoan.id_taikhoan";
      $query = mysqli_query($conn, $sql);
      while ($row = mysqli_fetch_assoc($query)) {
         if(empty($row['gia_khoahoc']))
         {
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
            <img src="<?php echo "images/images_courses" . $row['anh_khoahoc']; ?>" class="card-img-top" height="200vh" alt="Course Image">
            </div>
            <h3 class="title" style="min-height: 50px"><?php echo $row['ten_khoahoc']; ?></h3>
            <a href="home.php?title=courses_content&idKH=<?php echo $row['id_khoahoc']; ?>" style="display: block;" class="btn btn-success">Vào học</a>
         </div>
      <?php 
         }
      }; 
      ?>
   </div>


</section>
<section class="courses">

   <h1 class="heading">Bài viết nổi bật</h1>

   <div class="box-container">  
      <?php 
      $sql = "SELECT tb_bai_viet.*, tb_tai_khoan.hinh_anh, tb_tai_khoan.ten_hien_thi FROM tb_bai_viet
      JOIN tb_tai_khoan ON tb_bai_viet.id_taikhoan = tb_tai_khoan.id_taikhoan";
      $query = mysqli_query($conn, $sql);
      while ($row = mysqli_fetch_assoc($query)) {
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
                  <img src="<?php echo "images/images_post" . $row['anh_baiviet']; ?>" class="card-img-top" height="200vh" alt="Course Image">
            </div>
            <h3 class="title" style="min-height: 50px"><?php echo $row['tieude_baiviet']; ?></h3>
            <a href="home.php?title=courses_content&id_baivet=<?php echo $row['id_baivet']; ?>" style="display: block;" class="btn btn-success">Vào học</a>
         </div>
      <?php 
      }; 
      ?>
   </div>
</section>
