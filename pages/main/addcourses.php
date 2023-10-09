<?php 
   include_once './function.php';

    if (isset($_POST['saveKH'])) {
        $tenKH = trim($_POST['ten_khoahoc']);
        $gia = $_POST['gia_khoahoc'];
        $motaKH = $_POST['mota_khoahoc'];
        addcourses($tenKH, $motaKH, $gia, $id_taikhoan);
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

<section class="addcourses">

   <h1 class="heading">Thêm khóa học</h1>

    <section class="form-container">

        <form class="addcourses" action="" method="post" enctype="multipart/form-data">
            <h3>Thông tin khóa học</h3>
            <p>Tên khóa học <span>*</span></p>
            <input type="text" name="ten_khoahoc" placeholder="Nhập tên khóa học" maxlength="50" required class="box">               
            <p>Giá tiền <span>*</span></p>
            <input type="number" name="gia_khoahoc" placeholder="Nhập giá tiền" maxlength="20" class="box">
            <p>Mô tả bài giảng<span>*</span></p>
            <textarea id="mota_khoahoc" name="mota_khoahoc" class="box" required>

            </textarea>
            <p>Hình ảnh <span>*</span></p>
            
            <input type="file" name="image" accept="image/*" class="box">
            <input type="submit" name="saveKH" value="Thêm" class="btn">
            <a class="btn btn-success" href="home.php?title=courses">Trở lại</a>
        </form>

    </section>

</section>
