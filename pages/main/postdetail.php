<?php 
         include_once './function.php';

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
      $sqlLike = "SELECT * FROM tb_thichbaiviet WHERE id_taikhoan = '$id_taikhoan'";
      $queryLike = mysqli_query($conn, $sqlLike);
      $rowLike = mysqli_fetch_array($queryLike);
      if (isset($_POST['likepost'])) {
         if($id_taikhoan > 1){
            $sqllike = "INSERT INTO tb_thichbaiviet (id_baiviet, id_taikhoan, ngay_thich_baiviet) VALUES ('$id_baiviet', '$id_taikhoan', NOW())";
            $querylike = mysqli_query($conn, $sqllike);
         }else{
            header('location:home.php?title=login');
         }
      }
      if(isset($_POST['Unlikepost'])){
         $sqlunlike = "DELETE FROM tb_thichbaiviet WHERE tb_thichbaiviet.id_baiviet = $id_baiviet AND tb_thichbaiviet.id_taikhoan = $id_taikhoan";
         $querysqlunlike = mysqli_query($conn, $sqlunlike);
      }
      if(isset($_POST['add_comment'])){
         $sqladdcomment = "INSERT INTO tb_binhluan (id_taikhoan, ngay_thich_baiviet) VALUES ('$id_baiviet', '$id_taikhoan', NOW())";
         $querysqlunlike = mysqli_query($conn, $sqlunlike);
      }
   ?>

<section class="watch-video">
  
   <div class="video-container">
   <div class="name_post">
         <?php echo $row['ten_baiviet']; ?>
      </div>
      <div class="tutor info">
      <img src="images/images_user/<?php echo $row['hinh_anh']; ?>" alt="">
         <div>
            <a href="#"><h3><?php echo $row['ten_hien_thi']; ?></h3></a>
            <p class="date"><i class="fas fa-calendar"></i><span><?php echo $row['ngaydang_baiviet']; ?></span></p>
         </div>
      </div>
      <div class="title">
         <?php echo $row['mota_baiviet']; ?>
      </div>
      <div class="description">
         <?php echo $row['noidung_baivet']; ?>
      </div>
      <?php
                            $total_like = GetCountLikeByPost($id_baiviet);
                            $total_comment = mysqli_num_rows(GetCommentByPost($id_baiviet));
                        ?>
      <div class="postItem_info">
      <a class="postItem_tags" href="home.php?title=searchtag&tag=<?php echo $row['ten_tag']; ?>"><?php echo $row['ten_tag'] ?></a>

      </div>
      <form action="" method="post" class="flex description">
      <div class="flex description">
        <h4 style="font-size: 1.2rem;"><?php echo $total_comment; ?> Bình luận</h4>
        <h4 style="font-size: 1.2rem;"><?php echo $total_like; ?> lượt Thích</span></h4>
      </div>
      <?php
      if($id_taikhoan > 1){
         $sqlLikePost = "SELECT * FROM tb_thichbaiviet 
               WHERE tb_thichbaiviet.id_baiviet = $id_baiviet AND tb_thichbaiviet.id_taikhoan = $id_taikhoan";
               $queryLikePost = mysqli_query($conn, $sqlLikePost);
               if(mysqli_num_rows($queryLikePost) < 1){    
             ?>
             <button name="likepost"><i class="far fa-heart"></i><span>Thích</span></button>
            <?php 
               }else{
            ?>            
               <button name="Unlikepost"><i class="far fa-heart"></i><span>Đã thích</span></button>
            <?php 
               }
            }else{
                  echo '<button name="likepost"><i class="far fa-heart"></i><span>Thích</span></button>';
               }
            ?>
      </form>
   </div>

</section>
<?php
   $sqlCmt = "SELECT tb_binh_luan.*, tb_tai_khoan.hinh_anh, tb_tai_khoan.ten_hien_thi 
   FROM tb_binh_luan
   JOIN tb_tai_khoan ON tb_tai_khoan.id_taikhoan = tb_binh_luan.id_taikhoan
   JOIN tb_bai_viet ON tb_bai_viet.id_baiviet = tb_binh_luan.id_baiviet
   WHERE tb_bai_viet.id_baiviet = '$id_baiviet'";
   $queryCmt = mysqli_query($conn, $sqlCmt);
   if (isset($_POST['add_comment'])) {
      if (!isset($id_taikhoan)) {
         header('location: home.php?title=login');
      }else{
         $comment = $_POST['comment_box'];
         $sqladdcomment = "INSERT INTO tb_binh_luan(id_baiviet, id_taikhoan, noidung_binhluan, ngay_binhluan, xoa_binhluan) VALUES ('$id_baiviet', '$id_taikhoan', '$comment', NOW(), 0)";
         $queryaddcomment = mysqli_query($conn, $sqladdcomment);
         header("Refresh:0");
      }
   }
 ?> 
<section class="comments">

<h1 class="heading">Bình luận</h1>

   <form action="" class="add-comment" method="post">
      <h3>Thêm bình luận</h3>
      <textarea name="comment_box" placeholder="Nhập bình luận của bạn" required maxlength="1000" cols="30" rows="10"></textarea>
      <input type="submit" value="Thêm" class="inline-btn" name="add_comment">
   </form>

   <h1 class="heading">Bình luận người dùng</h1>

   <div class="box-container">
      <?php
      
         if(mysqli_num_rows($queryCmt) > 0){
            while($rowComment = mysqli_fetch_assoc($queryCmt)){
       ?>
      <div class="box">
         <div class="user">
         <img src="../../images/images_user/<?php echo $rowComment['hinh_anh']; ?>" alt="">
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
         <form action="" class="flex-btn description">
            <?php 
               if($rowComment["id_taikhoan"] == $id_taikhoan){
            ?>
            <div class="option_before">
               <input type="button" value="Chỉnh sửa" name="edit_comment" class="inline-option-btn btnEdit">
               <input type="button" value="Xóa" name="delete_comment" class="inline-delete-btn btnDelete">
            </div>
            <div class="option_after" style="display: none;">
               <input type="submit" value="Lưu" name="save_comment" class="inline-option-btn btnSave">
               <input type="button" value="Hủy" name="cancel_comment" class="inline-delete-btn btnCancel">
            </div>
            <?php 
               }else{
            ?>
            <div class="option_reply">
               <input type="submit" value="trả lời" name="save_comment" class="inline-option-btn">
            </div>
            <?php                   
               }
            ?>      
            <button href="#" class="inline-option-btn btnlike" style="color: var(--light-color); "><?php echo $total_like_comment; ?> <i class="far fa-heart"></i></button>
         </form>
         <form action="" class="add-comment">
            <textarea name="comment_box" placeholder="Nhập văn bản" required maxlength="1000" cols="30" rows="10"></textarea>
            <input type="submit" value="trả lời" name="save_comment" class="inline-option-btn">
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


<script>
   var editButton = document.querySelector('.btnEdit');
   var deleteButton = document.querySelector('.btnDelete');
   var saveButton = document.querySelector(".btnSave");
   var cancelButton = document.querySelector(".btnCancel");
   var optionBefore = document.querySelector(".option_before");
   var optionAfter = document.querySelector(".option_after");
   var commentBox = document.querySelector('.comment-box');

   var isEditing = false;
   var textareaElement; // Khai báo biến textareaElement ở đây
   var originalComment; // Lưu trạng thái ban đầu của comment

   function toggleEditState() {
      if (isEditing) {
         // Tạo một div mới chứa giá trị chỉnh sửa
         var newCommentBox = document.createElement('div');
         newCommentBox.className = 'comment-box';

         if (commentBox && commentBox.parentNode) {
            // Thay thế textarea hiện tại bằng div mới
               commentBox.parentNode.replaceChild(newCommentBox, textareaElement);
         }
         optionBefore.style.display = "block";
         optionAfter.style.display = "none";
      } else {
         textareaElement = document.createElement('textarea');
         textareaElement.className = 'comment-box';
         textareaElement.value = commentBox.textContent;

         if (commentBox && commentBox.parentNode) {
               // Thay thế div hiện tại bằng textarea
               commentBox.parentNode.replaceChild(textareaElement, commentBox);
         }
         optionBefore.style.display = "none";
         optionAfter.style.display = "block";
         // Lưu trạng thái ban đầu của comment
         originalComment = commentBox.textContent;
      }

      isEditing = !isEditing;
   }

   editButton.addEventListener("click", toggleEditState);
   document.addEventListener("DOMContentLoaded", (event) => {
      textareaElement = document.querySelector('.comment-box');
      console.log(textareaElement);
      cancelButton.addEventListener("click", function () {
         // Khôi phục giá trị ban đầu của comment
         textareaElement.value = originalComment;
         // Thay thế textarea bằng lại div
         textareaElement.parentNode.replaceChild(commentBox, textareaElement);
         optionBefore.style.display = "block";
         optionAfter.style.display = "none";

         isEditing = false;
      });
  });
</script>




