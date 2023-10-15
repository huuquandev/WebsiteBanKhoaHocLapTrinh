<?php 
      include_once '../function.php';

    if (isset($_GET['id_khoahoc'])) {
        $idKH = $_GET['id_khoahoc'];
        $row = GetCoursesById($idKH);   
        $total_videos = GetCountLessonByCourses($idKH);
    }
    if(isset($_POST["submit"])){
        $tenKH = trim($_POST['new_ten_khoahoc']);
        $gia = $_POST['new_gia_khoahoc'];
        $motaKH = $_POST['new_mota_khoahoc'];
        $status = $_POST['new_status'];
        editcourses($tenKH, $motaKH, $gia, $idKH, $status);
    }
    if(isset($message)){
        foreach($message as $message){  
           echo '
           <div class="message form">
              <span>'.$message.'</span>
              <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
           </div>
           ';
        }
    }
 ?>

<section class="playlist-form">

   <h1 class="heading">sửa khóa học</h1>
   <form action="" method="post" enctype="multipart/form-data" class="editcourses">
    <h3 class="titlecenter">Thông tin khóa học</h3>
      <input type="hidden" name="old_image" value="<?= $row['anh_khoahoc']; ?>">
      <p>Trạng thái <span>*</span></p>
      <select name="new_status" class="box" required>
         <option value="<?= $row['trangthai_khoahoc']; ?>" selected><?= $row['trangthai_khoahoc']; ?></option>
         <option value="Mở khóa">Mở khóa</option>
         <option value="Chưa mở khóa">Chưa mở khóa</option>
      </select>
      <p>Tên khóa học <span>*</span></p>
      <input type="text" name="title" maxlength="100" required placeholder="Nhập tên khóa học" value="<?= $row['ten_khoahoc']; ?>" class="box">
      <p>Mô tả khóa học <span>*</span></p>
      <textarea name="description" class="box" required placeholder="Nhập mô tả khóa" maxlength="1000" cols="30" rows="10"><?= $row['mota_khoahoc']; ?></textarea>
      <p>Ảnh khóa học <span>*</span></p>
      <div class="thumb">
         <span><?= $total_videos; ?></span>
         <img src="../../../../images/images_courses/<?= $row['anh_khoahoc']; ?>" alt="">
      </div>
      <input type="file" name="new_image" accept="image/*" class="box">
      <input type="submit" value="Lưu lại" name="submit" class="btn">
      <div class="flex-btn">
         <a href="cms_dashboard.php?title=detail_courses&idKH=<?= $idKH; ?>" class="option-btn">Chi tiết</a>
         <input type="submit" value="Xóa" class="delete-btn" onclick="return confirm('Bạn có chắc muốn xóa khóa hóc?');" name="delete">

      </div>
   </form>
</section>
