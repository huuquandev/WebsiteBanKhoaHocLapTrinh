<?php 
if($id_taikhoan == ""){
   header('location:../cms/cmspages/cms_login.php');
}
      include_once '../function.php';

   // unset($_SESSION['idKH']);
   if (isset($_GET['idKH'])) {
        $idKH = $_GET['idKH'];
        $coursesdetail = GetCoursesById($idKH);
   }
    
?>

<section class="playlist-details">

   <h1 class="heading">Chi tiết Khóa học</h1>

   <div class="row">

      <div class="column"> 
         <div class="thumb">
            <img src="<?php echo '../../../../images/images_courses/'.$coursesdetail['anh_khoahoc'];?>" alt="">
         </div>
      </div>
      <div class="column">
      <div class="tutor">
                  <img src="../../../../images/images_user/<?php echo $row['hinh_anh']; ?>" alt="">
                  <div class="info">
                     <h3><?php echo $coursesdetail['ten_hien_thi']; ?></h3>
                     <span>Quản trị viên</span>
                  </div>
            </div>   
   
         <div class="details">
            <h3><?php echo $coursesdetail['ten_khoahoc']?></h3>
            <p><?php echo $coursesdetail['mota_khoahoc']; ?></p>
            <!-- <a href="home.php?title=profile" class="inline-btn">view profile</a> -->
         </div>
      </div>
   </div>

</section>

<section class="playlist-videos">
   <h1 class="heading" style="
   position: relative;
    display: flex;
    align-items: center;
    justify-content: space-between;">  
    Các học liệu 
      <div class="flex-option" style="display: flex;" >
         <button class="btn" style="width: auto; background: orange;" id="btnEdit">Chỉnh sửa</button>
         <a href="cms_dashboard.php?title=add_playlist&idKH=<?php echo $idKH; ?>" class="btn" id="btnAdd" style="width: auto; background: green;">Thêm học liệu</a>
      </div>     
   </h1>
   <?php 
      $sql = "SELECT * FROM tb_hoc_lieu WHERE id_khoahoc = '$idKH'";
      $query = mysqli_query($conn, $sql);
      $numrow = mysqli_num_rows($query) 
   ?>
<div class="box-container" style="<?php if($numrow < 1) echo "display: flex; align-items: center;"; else echo ""; ?>">
   <?php 

   if($numrow > 0){
   while ($row = mysqli_fetch_array($query)) {
   ?>
      <div class="box">
         <div class="icon_courses" style="display: none;">
               <a href="cms_dashboard.php?title=edit_playlist&idKH=<?php echo $idKH; ?>&idHL=<?php echo $row['id_hoclieu']; ?>" class="inline-btn" style="background-color: orange;"> <i class="fa-solid fa-pen-to-square"></i> </a>
               <a href="home.php?title=delete_material&idKH=<?php echo $idKH; ?>&idHL=<?php echo $row['id_hoclieu']; ?>" class="inline-btn" style="background-color: red;"> <i class="fa-solid fa-trash"></i> </a>
         </div>
         <div class="thumb">
         <img src="<?php echo '../../../../images/images_courses/'.$row['anh_hoclieu'];?>" alt="">

         </div>
          <h3><?php echo $row['ten_hoclieu']; ?></h3>
         <a href="cms_dashboard.php?title=detail_lesson&idKH=<?php echo $idKH; ?>&idHL=<?php echo $row['id_hoclieu']; ?>" style="display: block;" class="btn btn-success">Xem video</a>
      </div>


      <?php 
         }; 
      }else{
         echo '<p class="empty">Không có bài giảng!</p>';
      }
      ?>
   </div>

</section>
<script>
   //Hiển thị thêm sửa xóa
   var btnEdit = document.getElementById("btnEdit");
   var btnAdd = document.getElementById("btnAdd");
   var iconCourses = document.querySelectorAll(".icon_courses");
   var isEditing = false;

   function toggleEditState() {
      if (isEditing) {
         btnAdd.style.display = "block";
         // Duyệt qua từng phần tử trong danh sách iconCourses
         iconCourses.forEach(function (course) {
            course.style.display = "none";
         });
         btnEdit.textContent = "Chỉnh sửa";
         btnEdit.style.background = "orange";
      } else {
         btnAdd.style.display = "none";
         // Duyệt qua từng phần tử trong danh sách iconCourses
         iconCourses.forEach(function (course) {
            course.style.display = "block";
         });
         btnEdit.textContent = "Hủy";
         btnEdit.style.background = "red";
      }
      isEditing = !isEditing;
   }

   btnEdit.addEventListener("click", toggleEditState);
</script>