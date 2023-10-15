<section class="addpost">

   <h1 class="heading">Thêm bài viết</h1>

   <?php 
        if (isset($_POST['submit'])) {
    $tieu_de = $_POST["ten_baiviet"];
    $mo_ta = $_POST["mota_baiviet"];
    $noi_dung = $_POST["noidung_baiviet"];
    
    $sql = "INSERT INTO tb_bai_viet (ten_baiviet, mota_baiviet, noidung_baivet) VALUES ('$tieu_de', '$mo_ta', '$noi_dung', 0)";
    
    if ($conn->query($sql) === TRUE) {
        echo '<script>alert("Thêm bài viết thành công");</script>';
    } else {
        echo "Lỗi: " . $sql . "<br>" . $conn->error;
    }
}
    ?>
    <section class="form-container">

        <form class="addpost" action="" method="post" enctype="multipart/form-data">
            <h3>Thông tin bài viết</h3>
            <p>Tên bài viết <span>*</span></p>
            <input type="text" name="ten_baiviet" placeholder="Nhập tên bài viết" maxlength="50" required class="box">   
            <p>Mô tả bài viết<span>*</span></p>
            <textarea id="mota_baiviet" name="mota_baiviet" class="box" placeholder=" Nhập mô tả bài viết"> </textarea>
            <p>Nội dung bài viết<span>*</span></p>
            <textarea id="noidung_baiviet" name="noidung_baiviet" class="box" placeholder=" Nhập Nội dung bài viết"> </textarea>
            <p>Gắn thẻ</p>
                        
                    <select name="profession" class="box" >
                            <option value="" disabled selected>-- Chọn thẻ</option>
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

   