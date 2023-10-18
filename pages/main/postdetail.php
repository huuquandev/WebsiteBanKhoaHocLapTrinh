<?php 
         include_once './function.php';

      if(isset($_GET['id_baiviet'])){
         $id_baiviet = $_GET['id_baiviet'];
      }
      $sql = "SELECT tb_bai_viet.*, tb_cms_tai_khoan.hinh_anh, tb_cms_tai_khoan.ten_hien_thi FROM tb_bai_viet 
      JOIN tb_cms_tai_khoan ON tb_bai_viet.id_taikhoan = tb_cms_tai_khoan.id_cms_taikhoan
      WHERE id_baiviet = $id_baiviet";
      $query = mysqli_query($conn, $sql);
      $row = mysqli_fetch_array($query);
      $sqlLike = "SELECT * FROM tb_thichbaiviet WHERE id_taikhoan = '$id_taikhoan'";
      $queryLike = mysqli_query($conn, $sqlLike);
      $rowLike = mysqli_fetch_array($queryLike);
      if (isset($_POST['likepost'])) {
         $sqllike = "INSERT INTO tb_thichbaiviet (id_baiviet, id_taikhoan, ngay_thich_baiviet) VALUES ('$id_baiviet', '$id_taikhoan', NOW())";
         $querylike = mysqli_query($conn, $sqllike);
      }
      if(isset($_POST['Unlikepost'])){
         $sqlunlike = "DELETE FROM tb_thichbaiviet WHERE tb_thichbaiviet.id_baiviet = $id_baiviet AND tb_thichbaiviet.id_taikhoan = $id_taikhoan";
         $querysqlunlike = mysqli_query($conn, $sqlunlike);
      }
   ?>

<section class="watch-video">
  
   <div class="video-container">
      
      <div class="tutor info">
      <img src="images/images_user/<?php echo $row['hinh_anh']; ?>" alt="">
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
      <div class="postItem_info">
                <?php
                    $tag_name = GetTagByIdPost($id_baiviet);
                    if($tag_name != null){
                ?>
                    <a class="postItem_tags" href="home.php?title=searchtag&tag=<?php echo $tag_name['ten_tag']; ?>"><?php echo $tag_name['ten_tag'] ?></a>
                    <?php
                    }
                    ?>
      </div>
      <form action="" method="post" class="flex description">
      <div class="flex description">
        <h4 style="font-size: 1.2rem;"><?php echo $total_comment; ?> Bình luận</h4>
        <h4 style="font-size: 1.2rem;"><?php echo $total_like; ?> lượt Thích</span></h4>
      </div>
      <?php
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
 ?> 
<section class="comments">

<h1 class="heading">Bình luận</h1>

   <form action="" class="add-comment">
      <h3>Thêm bình luận</h3>
      <textarea name="comment_box" placeholder="enter your comment" required maxlength="1000" cols="30" rows="10"></textarea>
      <input type="submit" value="add comment" class="inline-btn" name="add_comment">
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
         <form action="" class="flex-btn description" style="<?php if($rowComment["id_taikhoan"] != $id_taikhoan) echo "float: right;"; else echo ""; ?>">
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
               }
            ?>
            
            <button href="#" class="inline-option-btn btnlike" style="color: var(--light-color); "><?php echo $total_like_comment; ?> <i class="far fa-heart"></i></button>
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




