<section class="addpost">

   <h1 class="heading">Chỉnh sửa bài viết</h1>

   <?php 
         include_once '../function.php';

        if (isset($_GET['idP'])) {
            $id_baiviet = $_GET['idP'];     
            $row = GetPostById($id_baiviet);       
        }else{
            $id_baiviet = "";         
            header('location:cms_post.php');
        }
    ?>
    <section class="form-container">

        <form class="addpost" action="" method="post" enctype="multipart/form-data">
            <h3>Thông tin bài viết</h3>
            <p>Tên bài viết <span>*</span></p>
            <input type="text" name="ten_baiviet" placeholder="Nhập tên bài viết" maxlength="50" required class="box" value="<?php echo $row["ten_baiviet"] ?>">   
            <p>Mô tả bài viết<span>*</span></p>
            <textarea id="mota_baiviet" name="mota_baiviet" class="box" placeholder=" Nhập mô tả bài viết"><?php echo $row["mota_baiviet"] ?></textarea>
            <p>Nội dung bài viết<span>*</span></p>
            <textarea id="noidung_baiviet" name="noidung_baiviet" class="box" placeholder=" Nhập Nội dung bài viết" ><?php echo $row["ten_baiviet"] ?></textarea>
            <p>Gắn thẻ</p>                
                    <select name="profession" class="box" >
                            <?php
                                    $sqltag = "SELECT * FROM tb_tag"; 
                                    $querytag = mysqli_query($conn, $sqltag);
                                    if(mysqli_num_rows($querytag) > 0){
                                        while($rowtag = mysqli_fetch_assoc($querytag)){
                                            if($rowtag["id_baiviet"] == $id_baiviet){
                                            
                            ?>
                            <option value="<?php echo $rowtag["id_tag"] ?>" selected><?php echo $rowtag["ten_tag"] ?></option>
                            <?php
                            }else{
                   
                             ?>
                                 <option value="<?php echo $rowtag["id_tag"] ?>"><?php echo $rowtag["ten_tag"] ?></option>

                            <?php
                                          }
                                        }
                                    }
                            ?>
                    </select> 
                      

            <input type="submit" name="submit" value="Lưu lại" class="btn">
            <div class="flex">
         <div class="col">
         <a href="add_playlist.php" class="delete-btn" style="background-color: green;">Thêm thẻ</a>

         </div>
         <div class="col">
         <a href="cms_dashboard.php?title=cms_post_detail&id_baiviet=<?php echo $row['id_baiviet']?>" class="delete-btn">Trở lại</a>

         </div>
      </div>                      
        </form>

    </section>

</section>

   