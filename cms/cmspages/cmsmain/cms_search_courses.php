<?php
if($id_taikhoan == ""){
   header('location:../cms/cmspages/cms_login.php');
}
   include_once '../function.php';

   if(isset($_GET['search_box'])){
      $keyword = $_GET['search_box'];
      $row_courses = Search_Courses($keyword);
   }
?>
<section class="courses">
<h1 class="heading">Khóa học '<?php echo $keyword ?>'</h1>

   <div class="box-container"> 
      <?php     
         while($row_course = mysqli_fetch_assoc($row_courses)){
      ?>
       <div class="box">
            <div class="tutor">
                  <img src="images/images_user/<?php echo $row_course['hinh_anh']; ?>" alt="">
                  <div class="info">
                     <h3><?php echo $row_course['ten_hien_thi']; ?></h3>
                     <span><?php echo $row_course['ngaydang_khoahoc']; ?></span>
                  </div>
            </div>
            <div class="thumb">
            <img src="<?php echo "images/images_courses/" . $row_course['anh_khoahoc']; ?>" class="card-img-top" height="200vh" alt="">
            </div>
            <h3 class="title" style="min-height: 50px"><?php echo $row_course['ten_khoahoc']; ?></h3>
            <?php
            if(!empty($row_course['gia_khoahoc'])){
            ?>
               <h5 class="title" style="font-size: 1.5rem; color:red"><?php echo convertToVietnameseCurrency($row_course['gia_khoahoc']); ?></h5>
            <?php
            }else{
            ?>
               <h5 class="title">Miễn phí</h5>
            <?php
            }
            ?>
            <a href="home.php?title=detailcourses&idKH=<?php echo $row_course['id_khoahoc']; ?>" style="display: block;" class="btn btn-success">Chi tiết</a>
         </div>
      <?php
         }
      ?>
   </div>
</section>