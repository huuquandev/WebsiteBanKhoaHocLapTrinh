<section class="playlist-details">

   <h1 class="heading">Chi tiết bài giảng</h1>

   <div class="row">

      <div class="column">
         <form action="" method="post" class="save-playlist">
            <button type="submit" style="background: orange;"><i class="far fa-bookmark"></i> <span>Mua khóa học</span></button>
         </form>
   
         <div class="thumb">
            <img src="images/thumb-1.png" alt="">
            <span>10 videos</span>
         </div>
      </div>
      <div class="column">
         <div class="tutor">
            <img src="images/pic-2.jpg" alt="">
            <div>
               <h3>john deo</h3>
               <span>21-10-2022</span>
            </div>
         </div>
   
         <div class="details">
            <h3>HTML CƠ BẢN</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illum minus reiciendis, error sunt veritatis exercitationem deserunt velit doloribus itaque voluptate.</p>
            <a href="home.php?title=profile" class="inline-btn">view profile</a>
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
    Bài giảng 
      <div class="flex-option" style="display: flex;" >
         <button class="btn" style="width: auto; background: orange;" id="btnEdit">Chỉnh sửa</button>
         <button class="btn" style="width: auto; background: green;" id="btnAdd">Thêm bài</button>
      </div>     
   </h1>
   <div class="box-container">
      
   <div class="box">
         <div class="icon_courses" style="display: none;">
               <a href="home.php?title=editplaylist" class="inline-btn" style="background-color: orange;"> <i class="fa-solid fa-pen-to-square"></i> </a>
               <a href="#" class="inline-btn" style="background-color: red;"> <i class="fa-solid fa-trash"></i> </a>
         </div>
         <a href="home.php?title=watch-video">   
            <i class="fas fa-play"></i>
            <img src="images/post-1-1.png" alt="">
            <h3>complete HTML tutorial (part 01)</h3>
         </a>
        
   </div>
   <div class="box">
         <div class="icon_courses" style="display: none;">
               <a href="home.php?title=editplaylist" class="inline-btn" style="background-color: orange;"> <i class="fa-solid fa-pen-to-square"></i> </a>
               <a href="#" class="inline-btn" style="background-color: red;"> <i class="fa-solid fa-trash"></i> </a>
         </div>
         <a href="home.php?title=watch-videol">
            <i class="fas fa-play"></i>
            <img src="images/post-1-2.png" alt="">
            <h3>complete HTML tutorial (part 02)</h3>
         </a>   
        
   </div>
   <div class="box">
      <div class="icon_courses" style="display: none;">
               <a href="home.php?title=editplaylist" class="inline-btn" style="background-color: orange;"> <i class="fa-solid fa-pen-to-square"></i> </a>
               <a href="#" class="inline-btn" style="background-color: red;"> <i class="fa-solid fa-trash"></i> </a>
         </div>
         <a href="home.php?title=watch-video">
            <i class="fas fa-play"></i>
            <img src="images/post-1-3.png" alt="">
            <h3>complete HTML tutorial (part 03)</h3>
         </a> 
        
   </div>
   <div class="box">
         <div class="icon_courses" style="display: none;">
               <a href="home.php?title=editplaylist" class="inline-btn" style="background-color: orange;"> <i class="fa-solid fa-pen-to-square"></i> </a>
               <a href="#" class="inline-btn" style="background-color: red;"> <i class="fa-solid fa-trash"></i> </a>
         </div>
         <a href="home.php?title=watch-video">
            <i class="fas fa-play"></i>
            <img src="images/post-1-4.png" alt="">
            <h3>complete HTML tutorial (part 04)</h3>
         </a>
        
   </div>
   <div class="box">
         <div class="icon_courses" style="display: none;">
               <a href="home.php?title=editplaylist" class="inline-btn" style="background-color: orange;"> <i class="fa-solid fa-pen-to-square"></i> </a>
               <a href="#" class="inline-btn" style="background-color: red;"> <i class="fa-solid fa-trash"></i> </a>
         </div>
         <a href="home.php?title=watch-video">
            <i class="fas fa-play"></i>
            <img src="images/post-1-5.png" alt="">
            <h3>complete HTML tutorial (part 05)</h3>
         </a>
        
   </div>
   <div class="box">
         <div class="icon_courses" style="display: none;">
               <a href="home.php?title=editplaylist" class="inline-btn" style="background-color: orange;"> <i class="fa-solid fa-pen-to-square"></i> </a>
               <a href="#" class="inline-btn" style="background-color: red;"> <i class="fa-solid fa-trash"></i> </a>
         </div>
            <a href="home.php?title=watch-video">
            <i class="fas fa-play"></i>
            <img src="images/post-1-6.png" alt="">
            <h3>complete HTML tutorial (part 06)</h3>
         </a>
        
   </div>


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