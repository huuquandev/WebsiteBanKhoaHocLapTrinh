<section class="user-profile">

   <h1 class="heading">Thông tin tài khoản</h1>

   <div class="info">

      <div class="user">
         <img src="uploaded_files/<?= $row['hinh_anh']; ?>" alt="">
         <h3><?= $row['ten_hien_thi']; ?></h3>
         <?php
         if($row['doi_tuong'] == 1){
         ?>
            <p>Người dùng</p>
         <?php
         }else if($row['doi_tuong'] == 0){
         ?>
            <p>Quản trị viên</p>
         <?php
         }
         ?>
         <a href="update.html" class="inline-btn">Chỉnh sửa</a>
      </div>
   
      <div class="box-container">
   
         <div class="box">
            <div class="flex">
               <i class="fas fa-bookmark"></i>
               <div>
                  <span>0</span>
                  <p>Khóa học đã đăng ký</p>
               </div>
            </div>
            <a href="#" class="inline-btn">Xem khóa học</a>
         </div>
   
         <div class="box">
            <div class="flex">
               <i class="fas fa-heart"></i>
               <div>
                  <span>0</span>
                  <p>Lượt thích</p>
               </div>
            </div>
            <a href="#" class="inline-btn">Xem lượt thích</a>
         </div>
   
         <div class="box">
            <div class="flex">
               <i class="fas fa-comment"></i>
               <div>
                  <span>12</span>
                  <p>Bình luận</p>
               </div>
            </div>
            <a href="#" class="inline-btn">Xem bình luận</a>
         </div>

         <div class="box">
            <div class="flex">
               <i class="fas fa-chalkboard-user"></i>
               <div>
                  <span>12</span>
                  <p>Bài viết</p>
               </div>
            </div>
            <a href="#" class="inline-btn">Xem bài viết</a>
         </div>
      </div>
   </div>

</section>