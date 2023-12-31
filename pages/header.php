
<header class="header">
   
   <section class="flex">

      <a href="home.php" class="logo">Educa.</a>

      <form action="home.php?" method="get" class="search-form">
         <input type="hidden" name="title" required placeholder="Tìm kiếm..." maxlength="100" value="search">
         <input type="text" name="search_box" required placeholder="Tìm kiếm..." maxlength="100">
         <button type="submit" class="fas fa-search"></button>
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
         <img src="images/images_user/<?= $row['hinh_anh']; ?>" alt="">
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
