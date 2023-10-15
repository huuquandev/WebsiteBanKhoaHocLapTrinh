<?php 
    if($id_taikhoan == ""){
        header('location:../cms/cmspages/cms_login.php');
    }
      include_once '../function.php';
      if (isset($_GET['idKH'])) {
        $idKH = $_GET['idKH'];
        $total_videos = GetCountLessonByCourses($idKH);

    }
    if (isset($_GET['idHL'])) {
        $idHL = $_GET['idHL'];
        $row = GetLessonById($idHL); 
    }
     ?>
<section class="editplaylist">

   <h1 class="heading">Sửa học liệu</h1>

   <?php 
            if (isset($_POST['saveHL'])) {
                $tenHL = trim($_POST['tenHL']);
                $fileimg = $_FILES['img'];
                $filevid = $_FILES['vid'];
                $motaHL = $_POST['motaHL'];
                $flag = 0;

                if (!empty($fileimg['name'])) {
                    $flag = 1;             //Tồn tại file upload
                    $extension = strtolower(pathinfo($fileimg['name'], PATHINFO_EXTENSION));
                    $arr = ["gif", "jpg", "png", "jpeg"];
                    if (!in_array($extension, $arr)) $kq = "File ảnh bìa chỉ nhận đuôi .jpg .jpeg .png .gif";
                        else $tenFileImg = floor(microtime(true) * 1000) . "." .$extension;
                }
                if (!empty($filevid['name'])) {
                    $flag = 1;             //Tồn tại file upload
                    $extension = strtolower(pathinfo($filevid['name'], PATHINFO_EXTENSION));
                    $arr = ["mp3", "mp4"];
                    if (!in_array($extension, $arr)) $kq = "File video chỉ nhận đuôi .mp3 .mp4";
                        else $tenFileVid = floor(microtime(true) * 1000) . "." .$extension;
                }

                if (empty($tenHL)) {
                    $kq = "Tên học liệu không được để trống";
                }

                if (isset($kq)) {
                    echo "<div class='check check_error'>$kq</div>";
                }else{
                    if ($flag == 0) {
                        $sql = "UPDATE tb_hoc_lieu SET ten_hoclieu='$tenHL', mota_hoclieu='$motaHL' WHERE id_hoclieu = $idHL";
                    }elseif ($flag == 1) {
                        move_uploaded_file($fileimg['tmp_name'], "images/" . $tenFileImg);
                        move_uploaded_file($filevid['tmp_name'], "images/" . $tenFileVid);
                        $sql = "UPDATE tb_hoc_lieu SET ten_hoclieu='$tenHL', mota_hoclieu='$motaHL', anh_hoclieu='$tenFileImg', file_hoclieu='$tenFileVid' WHERE id_hoclieu = $idHL";
                    }
                    mysqli_query($conn, $sql);
                    echo '<script>alert("Sửa thành công");</script>';
                    
                }
            }
        ?>
    <section class="video-form">

        <form class="editplaylist" action="" method="post" enctype="multipart/form-data">

        <h3 class="titlecenter">Thông tin học liệu</h3>
        <select name="new_status" class="box" required>
            <option value="<?= $row['trangthai_hoclieu']; ?>" selected><?= $row['trangthai_hoclieu']; ?></option>
            <option value="Mở khóa">Mở khóa</option>
            <option value="Chưa mở khóa">Chưa mở khóa</option>
        </select>
        <p>Tên học liệu <span>*</span></p>
        <input type="text" name="tenHL" placeholder="Nhập tên học liệu" maxlength="50" required class="box" value="<?php echo $row['ten_hoclieu']; ?>">
        <p>Hình nền<span>*</span></p>
        <p id="selectedFile"><?php echo $row['anh_hoclieu']; ?></p>
        <img src="../../../../images/images_courses/<?= $row['anh_hoclieu']; ?>" alt="">
        <input type="file" name="img" accept="image/*" class="box" value="<?php echo $row['anh_hoclieu']; ?>" id="imageInput">
        <p id="selectedImages"><?php echo $row['anh_hoclieu']; ?></p>
        <p>Video<span>*</span></p>
        <p id="selectedFile"><?php echo $row['file_hoclieu']; ?></p>
        <video src="../../../../images/video_lesson/<?= $row['file_hoclieu']; ?>" controls></video>
        <input type="file" name="vid" accept="video/*" class="box" value="<?php echo $row['file_hoclieu']; ?>" id="fileInput">
        <p>Mô tả học liệu<span>*</span></p>
        <textarea id="mota_baigiang" name="motaHL" class="box"><?php echo $row['mota_hoclieu']; ?></textarea>
        <input type="submit" name="saveHL" value="Lưu" class="btn">
        <div class="flex-btn">
            <a href="cms_dashboard.php?title=add_playlist&idKH=<?php echo $idKH; ?>" class="delete-btn" style="background-color: green;">Thêm thẻ</a>
            <a href="cms_dashboard.php?title=detail_courses&idKH=<?php echo $idKH; ?>" class="delete-btn">Trở lại</a>
         </div>
        </div>
        </form>
        
    </section>

</section>
<script>
// Lấy thẻ input và span
var imageInput = document.getElementById('imageInput');
var fileInput = document.getElementById('fileInput');
var selectedFile = document.getElementById('selectedFile');
var selectedImages = document.getElementById('selectedImages');

// Đặt sự kiện thay đổi cho trường input file   
imageInput.addEventListener('change', function() {
    if (imageInput.files.length > 0) {
        selectedImages.textContent = imageInput.files[0].name;
        selectedFile.textContent = fileInput.files[0].name;
    } else {
        selectedImages.textContent = '<?php echo $row['anh_khoahoc']; ?>';
        selectedFile.textContent = '<?php echo $row['file_khoahoc']; ?>';
    }
});
</script>