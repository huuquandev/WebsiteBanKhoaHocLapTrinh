<?php 
    include_once './function.php';

    if (isset($_GET['id_khoahoc'])) {
        $idKH = $_GET['id_khoahoc'];
        $row = GetCoursesById($idKH);   
    }
    if(isset($_POST["saveKH"])){
        $tenKH = trim($_POST['new_ten_khoahoc']);
        $gia = $_POST['new_gia_khoahoc'];
        $motaKH = $_POST['new_mota_khoahoc'];
        editcourses($tenKH, $motaKH, $gia, $idKH);
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

<section class="editcourses">

    <h1 class="heading">Sửa khóa học</h1>

    <section class="form-container">

        <form class="editcourses" action="" method="post" enctype="multipart/form-data">
            <h3>Thông tin khóa học</h3>
            <p>Tên khóa học <span>*</span></p>
            <input type="text" name="new_ten_khoahoc" placeholder="Nhập tên khóa học" maxlength="50" required class="box" value="<?php echo $row['ten_khoahoc']; ?>">             
            <p>Giá tiền <span>*</span></p>
            <input type="number" name="new_gia_khoahoc" placeholder="Nhập giá tiền" maxlength="20" class="box" value="<?php echo $row['gia_khoahoc']; ?>">
            <p>Mô tả khóa học <span>*</span></p>

            <textarea id="mota_khoahoc" name="new_mota_khoahoc" class="box"><?php echo $row['mota_khoahoc']; ?></textarea>

            <p>Hình ảnh <span>*</span></p>

            <input type="file" name="new_image" accept="image/*" class="box">
            <p id="selectedFile"><?php echo $row['anh_khoahoc']; ?></p>
            <input type="submit" name="saveKH" value="Lưu lại" class="btn" required>
        </form>

    </section>

</section>
<script>
// Lấy thẻ input và span
var imageInput = document.getElementById('imageInput');
var selectedFile = document.getElementById('selectedFile');

// Đặt sự kiện thay đổi cho trường input file   
imageInput.addEventListener('change', function() {
    if (imageInput.files.length > 0) {
        selectedFile.textContent = imageInput.files[0].name;
    } else {
        selectedFile.textContent = '<?php echo $row['anh_khoahoc']; ?>';
    }
});
</script>
