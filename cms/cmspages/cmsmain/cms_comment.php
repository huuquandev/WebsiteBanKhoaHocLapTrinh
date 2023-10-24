<?php
  if($id_taikhoan == ""){
    header('location:../cms/cmspages/cms_login.php');
  }
 ?>
<section class="comments">

   <h1 class="heading">Danh sách bình luận</h1>
   
   <?php
        $sql = "SELECT tb_binh_luan.*, tb_tai_khoan.hinh_anh, tb_tai_khoan.ten_hien_thi, tb_bai_viet.* 
        FROM tb_binh_luan 
        JOIN tb_tai_khoan ON tb_binh_luan.id_taikhoan = tb_tai_khoan.id_taikhoan
        JOIN tb_bai_viet ON tb_binh_luan.id_baiviet = tb_bai_viet.id_baiviet
        WHERE tb_bai_viet.id_taikhoan = $id_taikhoan";
        $query = mysqli_query($conn, $sql);
        if(mysqli_num_rows($query) > 0){
            while ($row = mysqli_fetch_array($query)) {

         
    ?>
    
   <div class="show-comments">
  
      <div class="box">
        
        <div class="tutor">
            <img src="../../../../images/images_user/<?php echo $row['hinh_anh']; ?>" alt="">
                <div class="info">
                        <h3 class="title"><?php echo $row['ten_hien_thi']; ?></h3>
                </div>
        </div>
         <div class="content">
            <span><?php echo $row['ngay_binhluan']; ?></span><p> - <?php echo $row['ten_baiviet']; ?> - </p><a href="cms_dashboard.php?title=cms_post_detail&id_baiviet=<?php echo $row['id_baiviet']?>">Xem bài viết</a>
        </div>
         <p class="text"><?php echo $row['noidung_binhluan']; ?></p>
         <form action="" method="post">
            <input type="hidden" name="comment_id" value="<?php echo $row['id_binhluan']; ?>">
            <button type="submit" name="delete_comment" class="inline-delete-btn" onclick="return confirm('delete this comment?');">Xóa bình luận</button>
         </form>
         
      </div>
      
    </div>
    <?php
            }
        } 
      ?>
</section>
