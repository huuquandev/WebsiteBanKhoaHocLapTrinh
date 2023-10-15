<?php 

   if (isset($_GET['idKH'])) {
        $idKH = $_GET['idKH'];
    }
     ?>
   <?php 
            if (isset($_POST['saveHL'])) {
                $tenHL = trim($_POST['ten_baigiang']);
                $fileimg = $_FILES['hinhnen_baigiang'];
                $filevid = $_FILES['video_baigiang'];
                $motaHL = $_POST['mota_baigiang'];
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
                        $sql = "INSERT INTO tb_hoc_lieu(id_khoahoc, ten_hoclieu, mota_hoclieu) VALUES('$idKH' ,'$tenHL', '$motaHL')";
                    }elseif ($flag == 1) {
                        move_uploaded_file($fileimg['tmp_name'], "images/" . $tenFileImg);
                        move_uploaded_file($filevid['tmp_name'], "images/" . $tenFileVid);
                        $sql = "INSERT INTO tb_hoc_lieu(id_khoahoc, ten_hoclieu, mota_hoclieu, anh_hoclieu, file_hoclieu) VALUES('$idKH', '$tenHL', '$motaHL', '$tenFileImg', '$tenFileVid')";
                    }
                    mysqli_query($conn, $sql);
                    echo '<script>alert("Thêm thành công");</script>';
                }
            }
        ?>
<section class="addplaylist">

   <h1 class="heading">Thêm bài giảng</h1>

    <section class="form-container">

        <form class="addplaylist" action="" method="post" enctype="multipart/form-data">         
        <h3>Thông tin bài giảng</h3>
        <p>Trạng thái bài giảng <span>*</span></p>
        <select name="status" class="box" required>
            <option value="" selected disabled>-- Chọn trạng thái</option>
            <option value="Mở khóa">Mở khóa</option>
            <option value="Chưa mở Khóa">Chưa mở Khóa</option>
        </select>
        <p>Tên bài giảng <span>*</span></p>
        <input type="text" name="ten_baigiang" placeholder="Nhập tên bài giảng" maxlength="50" required class="box">
        <p>Hình nền<span>*</span></p>
        <input type="file" name="hinhnen_baigiang" accept="image/*" class="box">
        <p>Video<span>*</span></p>
        <input type="file" name="video_baigiang" accept="video/*" class="box">
        <p>Mô tả bài giảng<span>*</span></p>
        <textarea id="mota_baigiang" name="mota_baigiang" class="box">

        </textarea>
        <input type="submit" name="saveHL" value="Thêm" class="btn">
        <a class="btn btn-success" href="cms_dashboard.php?title=detail_courses&idKH=<?php echo $idKH; ?>">Trở lại</a>

        </form>


    </section>

</section>
