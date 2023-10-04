
<div class="side-bar">

   <div class="close-side-bar">
      <i class="fas fa-times"></i>
   </div>

   <div class="profile">
         <?php
            $sql = "select * from tb_tai_khoan where id_taikhoan = '$id_taikhoan'";
            $query = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($query);
            if($row > 0){
         ?>
         <img src="uploaded_files/<?= $row['hinh_anh']; ?>" alt="">
         <h3><?= $row['ten_hien_thi']; ?></h3>
         <span>student</span>
         <a href="home.php?title=profile" class="btn">view profile</a>
         <?php
            }else{
         ?>
         <h3>please login or register</h3>
          <div class="flex-btn" style="padding-top: .5rem;">
            <a href="home.php?title=login" class="option-btn">login</a>
            <a href="home.php?title=register" class="option-btn">register</a>
         </div>
         <?php
            }
         ?>
      </div>

      <nav class="navbar">
      <a href="home.php"><i class="fas fa-home"></i><span>Home</span></a>
      <a href="home.php?title=about"><i class="fas fa-question"></i><span>about</span></a>
      <a href="home.php?title=courses"><i class="fas fa-graduation-cap"></i><span>courses</span></a>
      <a href="home.php?title=teachers"><i class="fas fa-chalkboard-user"></i><span>teachers</span></a>
      <a href="home.php?title=contact"><i class="fas fa-headset"></i><span>contact us</span></a>
   </nav>

</div>