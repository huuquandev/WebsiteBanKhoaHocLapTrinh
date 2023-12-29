<?php 
   include_once './function.php';

   // unset($_SESSION['idKH']);
   if (isset($_GET['idKH'])) {
        $idKH = $_GET['idKH'];
        $coursesdetail = GetCoursesById($idKH);

    }
    
?>

<section class="playlist-details">

   <h1 class="heading">Chi tiết Khóa học</h1>

   <div class="row">

      <div class="column">    
         <div class="thumb">
            <img src="<?php echo '../../../images/images_courses/'.$coursesdetail['anh_khoahoc'];?>" alt="">
         </div>
      </div>
      <div class="column">
      <div class="tutor">
                  <img src="../../../images/images_user/<?php echo $coursesdetail['hinh_anh']; ?>" alt="">
                  <div class="info">
                     <h3><?php echo $coursesdetail['ten_hien_thi']; ?></h3>
                     <span><?php echo $coursesdetail['ngaydang_khoahoc']; ?></span>
                  </div>
            </div>   
         <div class="details">          
            <h3><?php echo $coursesdetail['ten_khoahoc']?></h3>
            <p><?php echo $coursesdetail['mota_khoahoc']; ?></p>
            <form action="pages/Payment.php?courses=<?=$idKH?>" method="post" class="save-playlist">
               <?php 
               $sqlByCourses = "SELECT * FROM tb_khoa_hoc WHERE id_khoahoc = $idKH";
               $queryByCourses = mysqli_query($conn, $sqlByCourses);
               $rowByCourses = mysqli_fetch_assoc($queryByCourses);
               if($rowByCourses['gia_khoahoc'] > 0){
                  echo '<button type="submit" style="background: orange;"><i class="far fa-bookmark"></i> <span>Mua khóa học</span></button>';
               }else{
                  echo '<button type="button" style="background: orange;"><i class="far fa-bookmark"></i> <span>Đăng ký</span></button>';
               }
               ?>
            </form>
         </div>
      </div>
   </div>

</section>
<section class="content-courses">
   <h1 class="heading">  
    Nội dung khóa học   
   </h1>
   <div class="box">
      <div class="title-content">
               <ul>
                  <li class="content_Chapter">
                     <strong>13 </strong> chương
                  </li>
                  <li class="content_lesson">•</li>
                  <li>
                     <strong>170 </strong> bài học
                  </li>
                  <li class="content_lesson">•</li>
                  <li>
                     <span>Thời lượng <strong>31 giờ 21 phút</strong>
                     </span>
                  </li>
               </ul>
      </div>
      <div class="content_body">
          <div>
              <div class="CurriculumOfCourse_panel__QT1YG">
                  <div class="CurriculumOfCourse_panelHeading__eln5T noselect">
                     <h5 class="CurriculumOfCourse_panelTitle__GPGOF">
                        <div class="CurriculumOfCourse_headline__KIUuw">
                           <span class="CurriculumOfCourse_floatLeft__zxBeB CurriculumOfCourse_groupName__2MhIE">
                           <strong>1. Bắt đầu</strong>
                           </span>
                           <span class="CurriculumOfCourse_floatRight__Mg1ee CurriculumOfCourse_timeOfSection__JrLAX">6 bài học</span>
                        </div>
                     </h5>
                  </div>
                  <div class="CurriculumOfCourse_collapse__kkyWy">
                     <div class="CurriculumOfCourse_panelBody__Ypogo">
                        <div>
                           <div>
                              <div class="CurriculumOfCourse_lessonItem__0Vr9k">
                                 <span class="CurriculumOfCourse_floatLeft__zxBeB CurriculumOfCourse_iconLink__4vkcB">
                                    <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="circle-play" class="svg-inline--fa fa-circle-play CurriculumOfCourse_icon__1fxR9 CurriculumOfCourse_video__GQtG1" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                    <path fill="currentColor" d="M512 256C512 397.4 397.4 512 256 512C114.6 512 0 397.4 0 256C0 114.6 114.6 0 256 0C397.4 0 512 114.6 512 256zM176 168V344C176 352.7 180.7 360.7 188.3 364.9C195.8 369.2 205.1 369 212.5 364.5L356.5 276.5C363.6 272.1 368 264.4 368 256C368 247.6 363.6 239.9 356.5 235.5L212.5 147.5C205.1 142.1 195.8 142.8 188.3 147.1C180.7 151.3 176 159.3 176 168V168z"></path>
                                    </svg>
                                    <div class="CurriculumOfCourse_lessonName__llwRr">1. Bạn sẽ làm được gì sau khóa học?</div>
                                 </span>
                                 <span class="CurriculumOfCourse_floatRight__Mg1ee">03:15</span>
                              </div>
                              <div class="CurriculumOfCourse_lessonItem__0Vr9k">
                                 <span class="CurriculumOfCourse_floatLeft__zxBeB CurriculumOfCourse_iconLink__4vkcB">
                                    <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="circle-play" class="svg-inline--fa fa-circle-play CurriculumOfCourse_icon__1fxR9 CurriculumOfCourse_video__GQtG1" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                    <path fill="currentColor" d="M512 256C512 397.4 397.4 512 256 512C114.6 512 0 397.4 0 256C0 114.6 114.6 0 256 0C397.4 0 512 114.6 512 256zM176 168V344C176 352.7 180.7 360.7 188.3 364.9C195.8 369.2 205.1 369 212.5 364.5L356.5 276.5C363.6 272.1 368 264.4 368 256C368 247.6 363.6 239.9 356.5 235.5L212.5 147.5C205.1 142.1 195.8 142.8 188.3 147.1C180.7 151.3 176 159.3 176 168V168z"></path>
                                    </svg>
                                    <div class="CurriculumOfCourse_lessonName__llwRr">1. Bạn sẽ làm được gì sau khóa học?</div>
                                 </span>
                                 <span class="CurriculumOfCourse_floatRight__Mg1ee">03:15</span>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="CurriculumOfCourse_panel__QT1YG">
                  <div class="CurriculumOfCourse_panelHeading__eln5T noselect">
                     <h5 class="CurriculumOfCourse_panelTitle__GPGOF">
                        <div class="CurriculumOfCourse_headline__KIUuw">
                           <span class="CurriculumOfCourse_floatLeft__zxBeB CurriculumOfCourse_groupName__2MhIE">
                           <strong>2. Làm quen với HTML</strong>
                           </span>
                           <span class="CurriculumOfCourse_floatRight__Mg1ee CurriculumOfCourse_timeOfSection__JrLAX">6 bài học</span>
                        </div>
                     </h5>
                  </div>
                  <div class="CurriculumOfCourse_collapse__kkyWy">
                     <div class="CurriculumOfCourse_panelBody__Ypogo">
                        <div>
                           <div>
                              <div class="CurriculumOfCourse_lessonItem__0Vr9k">
                                 <span class="CurriculumOfCourse_floatLeft__zxBeB CurriculumOfCourse_iconLink__4vkcB">
                                    <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="circle-play" class="svg-inline--fa fa-circle-play CurriculumOfCourse_icon__1fxR9 CurriculumOfCourse_video__GQtG1" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                    <path fill="currentColor" d="M512 256C512 397.4 397.4 512 256 512C114.6 512 0 397.4 0 256C0 114.6 114.6 0 256 0C397.4 0 512 114.6 512 256zM176 168V344C176 352.7 180.7 360.7 188.3 364.9C195.8 369.2 205.1 369 212.5 364.5L356.5 276.5C363.6 272.1 368 264.4 368 256C368 247.6 363.6 239.9 356.5 235.5L212.5 147.5C205.1 142.1 195.8 142.8 188.3 147.1C180.7 151.3 176 159.3 176 168V168z"></path>
                                    </svg>
                                    <div class="CurriculumOfCourse_lessonName__llwRr">1. Bạn sẽ làm được gì sau khóa học?</div>
                                 </span>
                                 <span class="CurriculumOfCourse_floatRight__Mg1ee">03:15</span>
                              </div>
                              <div class="CurriculumOfCourse_lessonItem__0Vr9k">
                                 <span class="CurriculumOfCourse_floatLeft__zxBeB CurriculumOfCourse_iconLink__4vkcB">
                                    <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="circle-play" class="svg-inline--fa fa-circle-play CurriculumOfCourse_icon__1fxR9 CurriculumOfCourse_video__GQtG1" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                    <path fill="currentColor" d="M512 256C512 397.4 397.4 512 256 512C114.6 512 0 397.4 0 256C0 114.6 114.6 0 256 0C397.4 0 512 114.6 512 256zM176 168V344C176 352.7 180.7 360.7 188.3 364.9C195.8 369.2 205.1 369 212.5 364.5L356.5 276.5C363.6 272.1 368 264.4 368 256C368 247.6 363.6 239.9 356.5 235.5L212.5 147.5C205.1 142.1 195.8 142.8 188.3 147.1C180.7 151.3 176 159.3 176 168V168z"></path>
                                    </svg>
                                    <div class="CurriculumOfCourse_lessonName__llwRr">1. Bạn sẽ làm được gì sau khóa học?</div>
                                 </span>
                                 <span class="CurriculumOfCourse_floatRight__Mg1ee">03:15</span>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="CurriculumOfCourse_panel__QT1YG">
                     <div class="CurriculumOfCourse_panelHeading__eln5T noselect">
                        <h5 class="CurriculumOfCourse_panelTitle__GPGOF">
                           <div class="CurriculumOfCourse_headline__KIUuw">
                              <span class="CurriculumOfCourse_floatLeft__zxBeB CurriculumOfCourse_groupName__2MhIE">
                              <strong>1. Bắt đầu</strong>
                              </span>
                              <span class="CurriculumOfCourse_floatRight__Mg1ee CurriculumOfCourse_timeOfSection__JrLAX">6 bài học</span>
                           </div>
                        </h5>
                     </div>
                     <div class="CurriculumOfCourse_collapse__kkyWy">
                        <div class="CurriculumOfCourse_panelBody__Ypogo">
                           <div>
                              <div>
                                 <div class="CurriculumOfCourse_lessonItem__0Vr9k">
                                    <span class="CurriculumOfCourse_floatLeft__zxBeB CurriculumOfCourse_iconLink__4vkcB">
                                       <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="circle-play" class="svg-inline--fa fa-circle-play CurriculumOfCourse_icon__1fxR9 CurriculumOfCourse_video__GQtG1" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                       <path fill="currentColor" d="M512 256C512 397.4 397.4 512 256 512C114.6 512 0 397.4 0 256C0 114.6 114.6 0 256 0C397.4 0 512 114.6 512 256zM176 168V344C176 352.7 180.7 360.7 188.3 364.9C195.8 369.2 205.1 369 212.5 364.5L356.5 276.5C363.6 272.1 368 264.4 368 256C368 247.6 363.6 239.9 356.5 235.5L212.5 147.5C205.1 142.1 195.8 142.8 188.3 147.1C180.7 151.3 176 159.3 176 168V168z"></path>
                                       </svg>
                                       <div class="CurriculumOfCourse_lessonName__llwRr">1. Bạn sẽ làm được gì sau khóa học?</div>
                                    </span>
                                    <span class="CurriculumOfCourse_floatRight__Mg1ee">03:15</span>
                                 </div>
                                 <div class="CurriculumOfCourse_lessonItem__0Vr9k">
                                    <span class="CurriculumOfCourse_floatLeft__zxBeB CurriculumOfCourse_iconLink__4vkcB">
                                       <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="circle-play" class="svg-inline--fa fa-circle-play CurriculumOfCourse_icon__1fxR9 CurriculumOfCourse_video__GQtG1" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                       <path fill="currentColor" d="M512 256C512 397.4 397.4 512 256 512C114.6 512 0 397.4 0 256C0 114.6 114.6 0 256 0C397.4 0 512 114.6 512 256zM176 168V344C176 352.7 180.7 360.7 188.3 364.9C195.8 369.2 205.1 369 212.5 364.5L356.5 276.5C363.6 272.1 368 264.4 368 256C368 247.6 363.6 239.9 356.5 235.5L212.5 147.5C205.1 142.1 195.8 142.8 188.3 147.1C180.7 151.3 176 159.3 176 168V168z"></path>
                                       </svg>
                                       <div class="CurriculumOfCourse_lessonName__llwRr">1. Bạn sẽ làm được gì sau khóa học?</div>
                                    </span>
                                    <span class="CurriculumOfCourse_floatRight__Mg1ee">03:15</span>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
               </div>
          </div>           
      </div>
   </div>

</section>
<section class="playlist-videos">
   <h1 class="heading">  
    Các học liệu    
   </h1>
   <div class="box-container">
   <?php 
   $sql = "SELECT * FROM tb_hoc_lieu WHERE id_khoahoc = '$idKH'";
   $query = mysqli_query($conn, $sql);
   while ($row = mysqli_fetch_array($query)) {
   ?>
      <div class="box">
         <div class="icon_courses" style="display: none;">
               <a href="home.php?title=editplaylist&idKH=<?php echo $idKH; ?>&idHL=<?php echo $row['id_hoclieu']; ?>" class="inline-btn" style="background-color: orange;"> <i class="fa-solid fa-pen-to-square"></i> </a>
               <a href="home.php?title=delete_material&idKH=<?php echo $idKH; ?>&idHL=<?php echo $row['id_hoclieu']; ?>" class="inline-btn" style="background-color: red;"> <i class="fa-solid fa-trash"></i> </a>
         </div>
         <div class="thumb">
             <img src="<?php echo 'images/' . $row['anh_hoclieu']; ?>" alt="Course Image">
         </div>
          <h3><?php echo $row['ten_hoclieu']; ?></h3>
         <!-- <a href="home.php?title=courses_content&idKH=<?php echo $idKH; ?>&idHL=<?php echo $row['idHL']; ?>" style="display: block;" class="btn btn-success">Xem video</a> -->
         <!-- <a href="home.php?title=delete_material&idKH=<?php echo $idKH; ?>&idHL=<?php echo $row['id_hoclieu']; ?>" style="display: block;" class="btn btn-success">Xóa học liệu</a> -->
      </div>


      <?php 
         }; ?>
   </div>

</section>

<script>
   $(document).ready(function () { 
      $('body').on('click', '.CurriculumOfCourse_panelHeading__eln5T', function () {  
          $(this).toggleClass('CurriculumOfCourse_activePanel__ZtW54');
          $(this).next('.CurriculumOfCourse_collapse__kkyWy').toggleClass('CurriculumOfCourse_in__KhIXF');
        });
   });
</script>