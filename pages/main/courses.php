





<?php 
 include_once './function.php';
 $sql = "SELECT tb_khoa_hoc.*, tb_cms_tai_khoan.hinh_anh, tb_cms_tai_khoan.ten_hien_thi
 FROM tb_khoa_hoc
 JOIN tb_cms_tai_khoan ON tb_khoa_hoc.id_taikhoan = tb_cms_tai_khoan.id_cms_taikhoan
 WHERE tb_khoa_hoc.gia_khoahoc IS NOT NULL";  
 $query = mysqli_query($conn, $sql);
 if(mysqli_num_rows($query) > 0)
 {
?>
   <section class="courses">
      <h1 class="heading" style="
      position: relative;
      display: flex;
      align-items: center;
      justify-content: space-between;">
      Khóa học Pro      
      </h1>

      <div class="box-container">  
         <?php 
       
            while ($row = mysqli_fetch_assoc($query)) {      
         ?>
            <div class="box">
               <div class="icon_courses" style="display: none;">
                     <a href="home.php?title=editcourses&id_khoahoc=<?php echo $row['id_khoahoc']; ?>" class="inline-btn" style="background-color: orange;"> <i class="fa-solid fa-pen-to-square"></i> </a>
                     <a href="home.php?title=deletecourses&id_khoahoc=<?php echo $row['id_khoahoc'];?>" class="inline-btn" style="background-color: red;"> <i class="fa-solid fa-trash"></i> </a>
               </div>
               <div class="tutor">
                     <img src="images/images_user/<?php echo $row['hinh_anh']; ?>" alt="">
                     <div class="info">
                        <h3><?php echo $row['ten_hien_thi']; ?></h3>
                        <span><?php echo $row['ngaydang_khoahoc']; ?></span>
                     </div>
               </div>
               <div class="thumb">
               <img src="<?php echo "images/images_courses/" . $row['anh_khoahoc']; ?>" class="card-img-top" height="200vh" alt="">
               </div>
               <h3 class="title" style="min-height: 50px"><?php echo $row['ten_khoahoc']; ?></h3>
               <h5 class="title" style="font-size: 1.5rem; color:red"><?php echo convertToVietnameseCurrency($row['gia_khoahoc']); ?></h5>
               <a href="home.php?title=detailcourses&idKH=<?php echo $row['id_khoahoc']; ?>" style="display: block;" class="btn btn-success">Chi tiết</a>
            </div>
         <?php 
            }
         ?>
      </div>
   </div>
   </section>
<?php 
      }; 
?>
<?php 
 include_once './function.php';
 $sql = "SELECT tb_khoa_hoc.*, tb_cms_tai_khoan.hinh_anh, tb_cms_tai_khoan.ten_hien_thi
 FROM tb_khoa_hoc
 JOIN tb_cms_tai_khoan ON tb_khoa_hoc.id_taikhoan = tb_cms_tai_khoan.id_cms_taikhoan
 WHERE tb_khoa_hoc.gia_khoahoc IS NULL";  
 $query = mysqli_query($conn, $sql);
 if(mysqli_num_rows($query) > 0 && empty($row['gia_khoahoc']))
 {
?>
<section class="courses">

   <h1 class="heading">Khoá học miễn phí</h1>

   <div class="box-container">  
      <?php 
      while ($row = mysqli_fetch_assoc($query)) {
      ?>
         <div class="box">
            <div class="icon_courses" style="display: none;">
                  <a href="home.php?title=editcourses&id_khoahoc=<?php echo $row['id_khoahoc']; ?>" class="inline-btn" style="background-color: orange;"> <i class="fa-solid fa-pen-to-square"></i> </a>
                  <a href="#" class="inline-btn" style="background-color: red;"> <i class="fa-solid fa-trash"></i> </a>
            </div>
            <div class="tutor">
                  <img src="images/images_user/<?php echo $row['hinh_anh']; ?>" alt="">
                  <div class="info">
                     <h3><?php echo $row['ten_hien_thi']; ?></h3>
                     <span><?php echo $row['ngaydang_khoahoc']; ?></span>
                  </div>
            </div>
            <div class="thumb">
            <img src="<?php echo "images/images_courses/". $row['anh_khoahoc']; ?>" class="card-img-top" height="200vh" alt="">
            </div>
            <h3 class="title" style="min-height: 50px"><?php echo $row['ten_khoahoc']; ?></h3>
            <h5 class="title">Miễn phí</h5>
            <a href="home.php?title=detailcourses&idKH=<?php echo $row['id_khoahoc']; ?>" style="display: block;" class="btn btn-success">Vào học</a>
         </div>
      <?php 
         }
      ?>
   </div>


</section>
<?php 
      }; 
?>
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







