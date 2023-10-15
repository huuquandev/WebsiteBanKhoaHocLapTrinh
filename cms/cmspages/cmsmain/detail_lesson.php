<?php 
   include_once '../function.php';
   if (isset($_GET['idHL'])) {
      $idHL = $_GET['idHL'];
      $lessondetail = GetLessonById($idHL);

      $sqlCountLike  = "SELECT * FROM tb_thichhoclieu WHERE tb_thichhoclieu.id_hoclieu = $idHL";
      $queryCountLike = mysqli_query($conn, $sqlCountLike);
   }
   if (isset($_GET['idKH'])) {
      $idKH = $_GET['idKH'];
   }else{
      $idKH = '';
      header('location:cms_courses.php');
   }
?>



<section class="watch-video">

   <div class="video-container">
      <div class="video">
         <video src="../../../images/video_lesson/<?php echo $lessondetail['file_hoclieu']; ?>" controls poster="images/post-1-1.png" id="video"></video>
      </div>
      <h3 class="title"><?php echo $lessondetail['ten_hoclieu']; ?></h3>
      <div class="info">
         <p class="date"><i class="fas fa-calendar"></i><span><?php echo $lessondetail['ngaydang_hoclieu']; ?></span></p>
         <p class="date"><i class="fas fa-heart"></i><span><?php echo mysqli_num_rows($queryCountLike) ?></span></p>
      </div>
      <div class="tutor">
      <img src="../../../../images/images_user/<?php echo $lessondetail['hinh_anh']; ?>" alt="">
         <div>
            <h3><?php echo $lessondetail['ten_hien_thi']; ?></h3>
            <span>Quản trị viên</span>
         </div>
      </div>
      <form action="" method="post" class="flex">
         <a href="cms_dashboard.php?title=add_playlist&idKH=<?php echo $idKH; ?>" class="inline-btn">Xem khóa học</a>
         <button><i class="far fa-heart"></i><span>like</span></button>
      </form>
      <p class="description">
         <?php echo $lessondetail['mota_hoclieu']; ?>
      </p>
      <form action="" method="post">
         <div class="flex-btn">
            <input type="hidden" name="video_id" value="<?= $idHL; ?>">
            <a href="cms_dashboard.php?title=edit_playlist&idKH=<?php echo $idKH; ?>&idHL=<?php echo $idHL; ?>" class="option-btn">Chỉnh sửa</a>
            <input type="submit" value="delete" class="delete-btn" onclick="return confirm('Xóa bài viết?');" name="delete_lesson">
         </div>
      </form>
   </div>

</section>
<?php 
      $sqlCmt = "SELECT tb_binh_luan.*, tb_tai_khoan.hinh_anh, tb_tai_khoan.ten_hien_thi 
      FROM tb_binh_luan
      JOIN tb_tai_khoan ON tb_tai_khoan.id_taikhoan = tb_binh_luan.id_taikhoan
      JOIN tb_hoc_lieu ON tb_hoc_lieu.id_hoclieu = tb_binh_luan.id_hoclieu
      WHERE tb_hoc_lieu.id_hoclieu = '$idHL'";
      $queryCmt = mysqli_query($conn, $sqlCmt);
   ?>
<section class="comments">
   
   <h1 class="heading">Bình luận người dùng</h1>

   <div class="box-container">
      <?php
         if(mysqli_num_rows($queryCmt) > 0){
            while($rowComment = mysqli_fetch_assoc($queryCmt)){
       ?>
      <div class="box">
         <div class="user">
         <img src="../../../../images/images_user/<?php echo $rowComment['hinh_anh']; ?>" alt="">
            <div>
               <h3><?php echo $rowComment['ten_hien_thi']; ?></h3>
               <span><?php echo $rowComment['ngay_binhluan']; ?></span>
            </div>
         </div>
         <div class="comment-box"><?php echo $rowComment['noidung_binhluan']; ?></div>
         <?php
            $id_binhluan = $rowComment['id_binhluan'];
            $total_like_comment = GetCountLikeByComment($id_binhluan);
         ?>
         <form action="post" class="flex flex-btn">
            <button type="submit" class="inline-delete-btn" onclick="return confirm('Xóa bình luận?');" name="delete_video">Xóa bình luận</button>
            <div class="inline-option-btn btnlike" style="color: var(--light-color);;"><?php echo $total_like_comment; ?> <i class="far fa-heart"></i></div>
         </form>
      </div>
      <?php
            }
      }else{
         echo '<p class="empty">Không có bình luận!</p>';
      }
      ?>
   </div>

</section>