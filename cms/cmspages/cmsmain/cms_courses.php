<section class="playlists">

   <h1 class="heading">Danh sách khóa học</h1>

   <div class="box-container">
   
      <div class="box" style="text-align: center;">
         <h3 class="title" style="margin-bottom: .5rem;">Thêm khóa học mới</h3>
         <a href="cms_dashboard.php?title=add_courses" class="btn">Thêm</a>
      </div>

      <?php
   include_once '../function.php';
   $sql = "SELECT tb_khoa_hoc.*, tb_cms_tai_khoan.hinh_anh, tb_cms_tai_khoan.ten_hien_thi FROM tb_khoa_hoc 
         JOIN tb_cms_tai_khoan ON tb_khoa_hoc.id_taikhoan = tb_cms_tai_khoan.id_cms_taikhoan";
         $query = mysqli_query($conn, $sql);

         if(mysqli_num_rows($query) > 0){
         while($row = mysqli_fetch_assoc($query)){
      ?>
      <div class="box">
         <div class="flex">
            <div>
                <i class="fas fa-circle-dot" style="<?php if($row['trangthai_khoahoc'] == 'Mở khóa'){echo 'color:limegreen'; }else{echo 'color:red';} ?>"></i>
                <span style="<?php if($row['trangthai_khoahoc'] == 'Mở khóa'){echo 'color:limegreen'; }else{echo 'color:red';} ?>"><?= $row['trangthai_khoahoc']; ?></span>
            </div>
            <div><i class="fas fa-calendar"></i><span><?= $row['ngaydang_khoahoc']; ?></span></div>
         </div>
         <div class="thumb">
            <?php
               $idKH = $row['id_khoahoc'];
               $countlesson = GetCountLessonByCourses($idKH);
            ?>
            <span><?= $countlesson; ?></span>
            <img src="<?php echo "../../../../images/images_courses/" . $row['anh_khoahoc']; ?>" alt="">
         </div>
         <h3 class="title"><?= $row['ten_khoahoc']; ?></h3>
         <p class="description"><?= $row['mota_khoahoc']; ?></p>
         <form action="" method="post" class="flex-btn">
            <input type="hidden" name="playlist_id" value="<?= $idKH; ?>">
            <a href="cms_dashboard.php?title=edit_courses&id_khoahoc=<?= $idKH; ?>" class="option-btn">Chỉnh sửa</a>
            <input type="submit" value="Xóa" class="delete-btn" onclick="return confirm('delete this playlist?');" name="delete">
         </form>
         <a href="cms_dashboard.php?title=detail_courses&idKH=<?= $idKH; ?>" class="btn">Chi tiết</a>
      </div>
      <?php
         } 
      }else{
         echo '<p class="empty">Không có khóa học!</p>';
      }
      ?>

   </div>

</section>