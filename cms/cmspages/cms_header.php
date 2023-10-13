<?php
if(isset($message)){
   foreach($message as $message){
      echo '
      <div class="message">
         <span>'.$message.'</span>
         <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
      </div>
      ';
   }
}
?>

<header class="header">

   <section class="flex">

      <a href="dashboard.php" class="logo">CMS.</a>

      <form action="search_page.php" method="post" class="search-form">
         <input type="text" name="search" placeholder="search here..." required maxlength="100">
         <button type="submit" class="fas fa-search" name="search_btn"></button>
      </form>

      <div class="icons">
         <div id="menu-btn" class="fas fa-bars"></div>
         <div id="search-btn" class="fas fa-search"></div>
         <div id="user-btn" class="fas fa-user"></div>
         <div id="toggle-btn" class="fas fa-sun"></div>
      </div>

      <div class="profile">
         
         <?php
            $sql = "select * from tb_tai_khoan where id_taikhoan = '$id_taikhoan'";
            $query = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($query);
            if($row > 0){

         ?>
         <img src="../../../../images/images_user/<?= $row['hinh_anh']; ?>" alt="">
         <h3><?= $row['ten_hien_thi']; ?></h3>
         <span>student</span>
         <a href="home.php?title=profile" class="btn">Hồ sơ</a>
         
         <a href="components/user_logout.php" onclick="return confirm('Bạn chắc chắn muốn đăng xuất?');" class="delete-btn">Đăng xuất</a>
         <?php
            }else{
         ?>
         <h3>Vui lòng đăng nhập hoặc đăng ký</h3>
          <div class="flex-btn">
            <a href="home.php?title=login" class="option-btn">Đăng nhập</a>
            <a href="home.php?title=register" class="option-btn">Đăng kí</a>
         </div>
         <?php
            }
         ?>
      </div>

   </section>

</header>
