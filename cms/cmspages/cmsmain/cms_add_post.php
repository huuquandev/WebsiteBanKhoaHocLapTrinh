<?php 
    if($id_taikhoan == ""){
        header('location:../cms/cmspages/cms_login.php');
    }
?>
<section class="addpost">

   <h1 class="heading">Thêm bài viết</h1>

   <?php 
    if (isset($_POST['submit'])) {
    $tieu_de = $_POST["ten_baiviet"];
    $mo_ta = $_POST["mota_baiviet"];
    $noi_dung = $_POST["noidung_baiviet"];
    $id_tag = $_POST['profession'];
    $flag = 0;
    $fileimg = $_FILES['hinhanh_baiviet'];

    if (!empty($fileimg['name'])) {
        $flag = 1;            
        $extension = strtolower(pathinfo($fileimg['name'], PATHINFO_EXTENSION));
        $arr = ["gif", "jpg", "png", "jpeg"];
        if (!in_array($extension, $arr)) $kq = "File ảnh bìa chỉ nhận đuôi .jpg .jpeg .png .gif";
            else $tenFileImg = floor(microtime(true) * 1000) . "." .$extension;
    }
    if ($flag == 0) {
        $sql = "INSERT INTO tb_bai_viet (ten_baiviet, mota_baiviet, noidung_baivet, ngaydang_baiviet, id_taikhoan, xoa_baiviet) VALUES ('$tieu_de', '$mo_ta', '$noi_dung', NOW(), '$id_taikhoan', 0)";
    }elseif ($flag == 1) {
        move_uploaded_file($fileimg['tmp_name'], "../../../images/images_post" . $tenFileImg);
        $sql = "INSERT INTO tb_bai_viet (ten_baiviet, mota_baiviet, noidung_baivet, ngaydang_baiviet, id_taikhoan, anh_baiviet, xoa_baiviet) VALUES ('$tieu_de', '$mo_ta', '$noi_dung', NOW(), '$id_taikhoan', '$tenFileImg', 0)";
    }
    if ($conn->query($sql) === TRUE) {
        // Lấy id_baiviet vừa được tạo
        $id_baiviet = $conn->insert_id; 
    
        $sql = "INSERT INTO tb_baiviet_tags (id_tag, id_baiviet) VALUES ('$id_tag', '$id_baiviet')";
        if ($conn->query($sql) === TRUE) {
            echo '<script>alert("Thêm bài viết thành công");</script>';
        } else {
            echo "Lỗi: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Lỗi: " . $sql . "<br>" . $conn->error;
    }
    
}
    ?>
    <section class="form-container">

        <form class="addpost" action="" method="post" enctype="multipart/form-data">
            <h3>Thông tin bài viết</h3>
            <p>Tên bài viết <span>*</span></p>
            <input type="text" name="ten_baiviet" placeholder="Nhập tên bài viết" maxlength="255" required class="box">   
            <p>Mô tả bài viết<span>*</span></p>
            <textarea id="mota_baiviet" name="mota_baiviet" class="box" placeholder=" Nhập mô tả bài viết"> </textarea>
            <p>Hình ảnh tiêu đề</p>
            <input type="file" name="hinhanh_baiviet" accept="image/*" class="box">
            <p>Nội dung bài viết<span>*</span></p>
            <textarea id="noidung_baiviet" name="noidung_baiviet" class="box" placeholder="Nhập Nội dung bài viết"> </textarea>
            <p>Gắn thẻ</p>
                        
                    <select name="profession" id="select_tags" multiple>
                            <?php
                                    $sqltag = "SELECT * FROM tb_tag"; 
                                    $querytag = mysqli_query($conn, $sqltag);
                                    if(mysqli_num_rows($querytag)){
                                        while($rowtag = mysqli_fetch_assoc($querytag)){
                            ?>
                            <option value="<?php echo $rowtag["id_tag"] ?>"><?php echo $rowtag["ten_tag"] ?></option>
                            <?php
                                        }
                                    }
                            ?>
                    </select> 
                      

            <input type="submit" name="submit" value="Thêm" class="btn">
            <div class="flex">
         <div class="col">
         <a href="add_playlist.php" class="delete-btn" style="background-color: green;">Thêm thẻ</a>

         </div>
         <div class="col">
         <a href="cms_dashboard.php?title=cms_post" class="delete-btn">Trở lại</a>

         </div>
      </div>                      
        </form>

    </section>

</section>
