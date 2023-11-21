<?php 
if($id_taikhoan == ""){
   header('location:../cms/cmspages/cms_login.php');
}
         include_once '../function.php';

      if(isset($_GET['id_baiviet'])){
         $id_baiviet = $_GET['id_baiviet'];
      }
      $sql = "SELECT tb_baiviet_tags.*, tb_bai_viet.*,tb_tag.ten_tag, tb_cms_tai_khoan.ten_hien_thi, tb_cms_tai_khoan.hinh_anh
      FROM tb_baiviet_tags 
      JOIN tb_bai_viet ON tb_bai_viet.id_baiviet = tb_baiviet_tags.id_baiviet
      JOIN tb_cms_tai_khoan ON tb_bai_viet.id_taikhoan = tb_cms_tai_khoan.id_cms_taikhoan
      JOIN tb_tag ON tb_tag.id_tag = tb_baiviet_tags.id_tag
      WHERE tb_bai_viet.id_baiviet = $id_baiviet";
      $query = mysqli_query($conn, $sql);
      $row = mysqli_fetch_array($query);
   ?>

<section class="watch-video">
  
   <div class="video-container">
      
      <div class="tutor info">
      <img src="../../../../images/images_user/<?php echo $row['hinh_anh']; ?>" alt="">
         <div>
            <a href="#"><h3><?php echo $row['ten_hien_thi']; ?></h3></a>
            <p class="date"><i class="fas fa-calendar"></i><span><?php echo $row['ngaydang_baiviet']; ?></span></p>
         </div>
      </div>
      
      <div class="description">
         <?php echo $row['noidung_baivet']; ?>
      </div>
      <?php
                            $total_like = GetCountLikeByPost($id_baiviet);
                            $total_comment = mysqli_num_rows(GetCommentByPost($id_baiviet));
                        ?>
      <div class="flex description">
        <h4 style="font-size: 1.2rem;"><?php echo $total_comment; ?> Bình luận</h4>
        <h4 style="font-size: 1.2rem;"><?php echo $total_like; ?> lượt Thích</span></h4>
      </div>
      <div class="postItem_info">
      <a class="postItem_tags" href="home.php?title=searchtag&tag=<?php echo $row['ten_tag']; ?>"><?php echo $row['ten_tag'] ?></a>

      </div>
      <form action="" method="post">
         <div class="flex-btn">
            <input type="hidden" name="video_id" value="<?= $id_baiviet; ?>">
            <a href="cms_dashboard.php?title=edit_post&idP=<?php echo $id_baiviet; ?>" class="option-btn">Chỉnh sửa</a>
            <input type="submit" value="delete" class="delete-btn" onclick="return confirm('Xóa bài viết?');" name="delete_post">
         </div>
      </form>
   </div>

</section>

<section class="comments">

   <h1 class="heading">Bình luận người dùng</h1>

   <div class="box-container">
   <?php
      $sqlCmt = "SELECT tb_binh_luan.*, tb_tai_khoan.hinh_anh, tb_tai_khoan.ten_hien_thi 
      FROM tb_binh_luan
      JOIN tb_tai_khoan ON tb_tai_khoan.id_taikhoan = tb_binh_luan.id_taikhoan
      JOIN tb_bai_viet ON tb_bai_viet.id_baiviet = tb_binh_luan.id_baiviet
      WHERE tb_bai_viet.id_baiviet = '$id_baiviet'";
      $queryCmt = mysqli_query($conn, $sqlCmt);
         if(mysqli_num_rows($queryCmt) > 0){
            while($rowComment = mysqli_fetch_assoc($queryCmt)){
       ?>
      <div class="box">
         <div class="user">
         <img src="../../../../images/images_user/<?php echo $rowComment['hinh_anh']; ?>" alt="">
            <div>
               <h3><?php echo $rowComment['ten_hien_thi']; ?></h3>
               <span><?php echo $rowComment['ngay_binhluan']; ?></span>
            </div>
         </div>
         <div class="comment-box"><?php echo $rowComment['noidung_binhluan']; ?></div>
         <?php
            $id_binhluan = $rowComment['id_binhluan'];
            $total_like_comment = GetCountLikeByComment($id_binhluan);
         ?>
         <form action="post" class="flex flex-btn">
            <button type="submit" class="inline-delete-btn" onclick="return confirm('Xóa bình luận?');" name="delete_video">Xóa bình luận</button>
            <div class="inline-option-btn btnlike" style="color: var(--light-color);;"><?php echo $total_like_comment; ?> <i class="far fa-heart"></i></div>
         </form>
      </div>
      <?php
            }
      }else{
         echo '<p class="empty">Không có bình luận!</p>';
      }
      ?>
   </div>

</section>





