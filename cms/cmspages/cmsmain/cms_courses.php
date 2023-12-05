<?php
   if($id_taikhoan == ""){
      header('location:../cms/cmspages/cms_login.php');
   }
   include_once ("../function.php");
 ?>

<head>
   <style type="text/css">
      .cms_items{
         width: 1150px;
         height: 120px;
         background: white;
         line-height: 100px;
         display: flex;
         justify-content: space-between;
         align-items: center;
      }
      .cms_box{
         width: 1150px;
         min-height: 500px;

      }
      .course_name{
         font-size: 20px;
         margin: 10px;
         font-weight: bold;

      }
      .course_des{
         font-size: 20px;
         margin: 10px;
      }
      .course_img{
         width: 100px;
         height: 100px;
         margin: 10px;
      }
      .Button{
         text-decoration: none;
         border-radius: .5rem;
         color:#fff;
         font-size: 15px;
         cursor: pointer;
         text-transform: capitalize;
/*         padding:1rem 3rem;*/
         margin-top: 1rem;
         height: 40px;
         width: 150px;
         margin: 5px;
      }
      .edit{
         background-color: orange;
      }
      .delete{
         background-color: red;
      }
      .buttonContainer{
         margin: 10px;
         display: flex;
         justify-content: space-between;
         flex-direction: row;
         line-height: 20px;
      }
      .titleContainer{
         margin: 10px;
      }
      #addForm{
         display: none;
      }
      #editForm{
         display: none;
      } 
      .idKH{
         font-size: 20px;
         font-weight: bold;
         line-height: 120px;
      }
      #managePlaylist{
         background-color: green;
         padding: 10px 15px;
      }
      .course_img{
         
         width: 100px;
         height: 100px;
         position: absolute;
      }
      .course_name{
         margin-left: 120px;
      }
      .course_tag{
         font-size: 20px;
         color: white;
         background-color: gray;
         padding: 5px;
         border-radius: 10px;
      }
   </style>
</head>
<section class="playlists">

   <h1 class="heading" style="
   position: relative;
    display: flex;
    align-items: center;
    justify-content: space-between;">
    Danh sách khóa học    
    <div class="flex-option" style="display: flex;" >
         <button class="btn" id="btnAdd" onclick="toggleAdd()" style="width: auto; background: green;">Thêm khóa học</button>
      </div> 
   </h1>

   <!-- <div class="box-container"> -->
   
      <!-- <div class="box" style="text-align: center;">
         <h3 class="title" style="margin-bottom: .5rem;">Thêm khóa học mới</h3>
         <a href="cms_dashboard.php?title=add_courses" class="btn">Thêm</a>
      </div> -->
      <div class="cms_box">
      <?php
   include_once '../function.php';
   $sql = "SELECT tb_khoa_hoc.*, tb_cms_tai_khoan.hinh_anh, tb_cms_tai_khoan.ten_hien_thi FROM tb_khoa_hoc 
         JOIN tb_cms_tai_khoan ON tb_khoa_hoc.id_taikhoan = tb_cms_tai_khoan.id_cms_taikhoan
         WHERE tb_khoa_hoc.id_taikhoan = $id_taikhoan";
         $query = mysqli_query($conn, $sql);

         if(mysqli_num_rows($query) > 0){
         while($row = mysqli_fetch_assoc($query)){
            $id_Khoahoc = $row['id_khoahoc'];
            $sql_tag = "SELECT tb_khoahoc_tags.*, tb_tag.*, tb_khoa_hoc.id_khoahoc FROM tb_khoahoc_tags
            JOIN tb_tag ON tb_khoahoc_tags.id_tag = tb_tag.id_tag
            JOIN tb_khoa_hoc ON tb_khoahoc_tags.id_khoahoc = tb_khoa_hoc.id_khoahoc
            WHERE tb_khoa_hoc.id_khoahoc = $id_Khoahoc";
            $query_tag = mysqli_query($conn, $sql_tag);
            $row_tag = mysqli_fetch_assoc($query_tag);
      ?>
         <div class="cms_items description">
            <span class="titleContainer">
               <span class="idKH"><?php echo $row['id_khoahoc'] ?></span>
               <img class="course_img" src="
                  <?php 
                  if($row['anh_khoahoc']!=null){
                     echo "../../../images/images_courses/" . $row['anh_khoahoc'];
                  }else{
                     echo "../../../images/images_courses/post-1-1.png";
                  }
                  ?>
               " alt="course_img">
               <span class="course_name"><?= $row['ten_khoahoc']; ?></span>
               <span class="course_des"><?= $row['mota_khoahoc']; ?></span>
               <span class="course_tag"><?= $row_tag['ten_tag'];  ?></span>
            </span>
            <span class="buttonContainer">
               <button class="Button edit" onclick="toggleEdit(<?php echo $row['id_khoahoc']; ?>)">Sửa khóa học</button>
                  <form method="post" onsubmit="return confirm_delete()" action="cmspages/cmsmain/delete-course.php?idKH=<?php echo $row['id_khoahoc']; ?>" >
                     <button class="Button delete" type="submit">Xóa khóa học</button>
                  </form>
                  <a href="cms_dashboard.php?title=cms_playlist&idKH=<?php echo $row['id_khoahoc']; ?>" class="Button" id="managePlaylist">Quản lý học liệu</a> 
            </span>
            
           
         </div>
<!--       <div class>
         <div class="flex">
            <div>
                <i class="fas fa-circle-dot" style="<?php if($row['trangthai_khoahoc'] == 'Mở khóa'){echo 'color:limegreen'; }else{echo 'color:red';} ?>"></i>
                <span style="<?php if($row['trangthai_khoahoc'] == 'Mở khóa'){echo 'color:limegreen'; }else{echo 'color:red';} ?>"><?= $row['trangthai_khoahoc']; ?></span>
            </div>
            <div><i class="fas fa-calendar"></i><span><?= $row['ngaydang_khoahoc']; ?></span></div>
         </div>
         <div class="thumb">
            <?php
               $idKH = $row['id_khoahoc'];
               $countlesson = GetCountLessonByCourses($idKH);
            ?>
            <span><?= $countlesson; ?></span>
            <img src="<?php echo "../../../../images/images_courses/" . $row['anh_khoahoc']; ?>" alt="">
         </div>
         <h3 class="title"><?= $row['ten_khoahoc']; ?></h3>
         <p class="description"><?= $row['mota_khoahoc']; ?></p>
         <form action="" method="post" class="flex-btn">
            <input type="hidden" name="playlist_id" value="<?= $idKH; ?>">
            <a href="cms_dashboard.php?title=edit_courses&id_khoahoc=<?= $idKH; ?>" class="option-btn">Chỉnh sửa</a>
            <input type="submit" value="Xóa" class="delete-btn" onclick="return confirm('delete this playlist?');" name="delete">
         </form>
         <a href="cms_dashboard.php?title=detail_courses&idKH=<?= $idKH; ?>" class="btn">Chi tiết</a>
      </div> -->
      <?php
         } 
      }else{
         echo '<p class="empty">Không có khóa học!</p>';
      }
      ?>
      </div>
      <section class="playlist-form" id="addForm">
         <?php 
            if(isset($_POST['submitAdd'])){
               $tenKH = $_POST['title'];
               $motaKH = $_POST['description'];
               $trangthai_khoahoc = $_POST['status'];
               $image = $_FILES['image'];

               // $tag = $_POST['tag'];
               // echo $tag;
               $extension = strtolower(pathinfo($image['name'], PATHINFO_EXTENSION));
               $tenFile = floor(microtime(true) * 1000) . "." .$extension;
               move_uploaded_file($image['tmp_name'], "../images/images_courses/" . $tenFile);
               foreach($_POST['tag'] as $tag){
                  $sql = "INSERT INTO tb_khoa_hoc(ten_khoahoc, id_taikhoan, anh_khoahoc, mota_khoahoc, trangthai_khoahoc, ngaydang_khoahoc)
               VALUES('$tenKH', '$id_taikhoan', '$tenFile', '$motaKH', '$trangthai_khoahoc', NOW())";
               mysqli_query($conn, $sql);
               echo '<script>alert("Thêm thành công"); window.location.href = "cms_dashboard.php?title=cms_courses";</script>';
               $id_Khoahoc = $conn->insert_id;
               $sql = "INSERT INTO tb_khoahoc_tags(id_tag, id_khoahoc) VALUES ('$tag', '$id_Khoahoc')";
               $query = mysqli_query($conn, $sql);
               }
               
            }
          ?>
         <h1 class="heading">Thêm khóa học</h1>

         <form action="" method="post" enctype="multipart/form-data">
            <p>Trạng thái khóa học <span>*</span></p>
            <select name="status" class="box" required>
               <option value="" selected disabled>-- Chọn trạng thái</option>
               <option value="Mở khóa">Mở khóa</option>
               <option value="Chưa mở Khóa">Chưa mở Khóa</option>
            </select>
            <p>Tiêu đề khóa học <span>*</span></p>
            <input type="text" name="title" maxlength="100" required placeholder="Tiêu đề khóa học" class="box">
            <p>Mô tả khóa học <span>*</span></p>
            <textarea name="description" class="box" required placeholder="Mô tả khóa học" maxlength="1000" cols="30" rows="10"></textarea>
            <p>Ảnh khóa học <span>*</span></p>
            <input type="file" name="image" accept="image/*" required class="box">
             <p>Thẻ tag</p>
               <select name="tag[]" id="select_tags" multiple>
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
            <input type="submit" value="Tạo khóa học" name="submitAdd" class="btn">
         </form>

      </section>
      <section class="playlist-form" id="editForm">
         <?php
         // $id_Khoahoc = $_POST['idEdit'];
         // echo $id_Khoahoc;
            if (isset($_POST['submitEdit'])) {
               $id_Khoahoc = $_POST['idEdit'];
               $tenKH = $_POST['titleEdit'];
               $motaKH = $_POST['descriptionEdit'];
               $trangthai_khoahoc = $_POST['new_status'];
               $image = $_FILES['new_image'];
               $extension = strtolower(pathinfo($image['name'], PATHINFO_EXTENSION));
               $tenFile = floor(microtime(true) * 1000) . "." .$extension;
               move_uploaded_file($image['tmp_name'], "images/" . $tenFile);
               foreach($_POST['tag'] as $tag){
                  echo $tag;
                  $sql = "UPDATE tb_khoa_hoc SET ten_khoahoc='$tenKH',id_taikhoan='$id_taikhoan', anh_khoahoc='$tenFile', mota_khoahoc='$motaKH', trangthai_khoahoc='$trangthai_khoahoc'
                                , ngaydang_khoahoc=NOW(), id_tag = '$tag' WHERE id_Khoahoc=$id_Khoahoc";
                  mysqli_query($conn, $sql);
                  echo '<script>alert("Sửa thành công"); window.location.href = "cms_dashboard.php?title=cms_courses";</script>';
               }
            }
          ?>
         <h1 class="heading">Sửa khóa học</h1>
         <form action="" method="post" enctype="multipart/form-data">
          <h3 class="titlecenter">Thông tin khóa học</h3>
            <input type="hidden" name="old_image" value="">
            <!-- <p>ID Khóa học</p> -->
            <input type="hidden" name="idEdit" id="idKHEdit" class="box "style="" value="">
            <p>Trạng thái <span>*</span></p>
            <select name="new_status" class="box" required>
               <option value="<?= $row['trangthai_khoahoc']; ?>" selected></option>
               <option value="Mở khóa">Mở khóa</option>
               <option value="Chưa mở khóa">Chưa mở khóa</option>
            </select>
            <p>Tên khóa học <span>*</span></p>
            <input type="text" name="titleEdit" maxlength="100" required placeholder="Nhập tên khóa học" value="" class="box">
            <p>Mô tả khóa học <span>*</span></p>
            <textarea name="descriptionEdit" class="box" required placeholder="Nhập mô tả khóa" maxlength="1000" cols="30" rows="10"></textarea>
            <p>Ảnh khóa học <span>*</span></p>
            <!--  <div class="thumb">
               <span></span>
               <img src="../../../../images/images_courses/<?= $row['anh_khoahoc']; ?>" alt="">
            </div> -->
            <input type="file" name="new_image" accept="image/*" class="box">
            <p>Thẻ tag</p>
               <select name="tag[]" id="select_tags" multiple>
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
            <input type="submit" value="Lưu lại" name="submitEdit" class="btn">
            <!-- <div class="flex-btn">
                <a href="cms_dashboard.php?title=detail_courses&idKH=<?= $idKH; ?>" class="option-btn">Chi tiết</a>
               <input type="submit" value="Xóa" class="delete-btn" onclick="return confirm('Bạn có chắc muốn xóa khóa hóc?');" name="delete">

            </div> -->
         </form>
</section>

</section>

<script type="text/javascript">
   function toggleAdd(){
      var addForm = document.getElementById("addForm");
      var editForm = document.getElementById("editForm");
      if (addForm.style.display === "none") {
         addForm.style.display = "block";
      }else{
         addForm.style.display = "none";
      }
   }
   function toggleEdit(id){
      var editForm = document.getElementById("editForm");
      var idEdit = document.getElementById("idKHEdit");
      if(editForm.style.display === "none"){
         editForm.style.display = "block";
         idEdit.value = id;
      }else{
         editForm.style.display = "none";
      }
   }
  function confirm_delete(){
       if(confirm("Xóa khóa học? "))
         return true;
      
      return false;
   }
</script>