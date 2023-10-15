<?php 
if($id_taikhoan == ""){
    header('location:home.php?title=login');
}
?>
    
    <?php 
        include_once './function.php';
        $sql = "SELECT tb_khoahoc_damua.*, tb_khoa_hoc.*, tb_cms_tai_khoan.hinh_anh, tb_cms_tai_khoan.ten_hien_thi FROM tb_khoahoc_damua 
        JOIN tb_khoa_hoc ON tb_khoahoc_damua.id_khoahoc = tb_khoa_hoc.id_khoahoc
        JOIN tb_cms_tai_khoan ON tb_khoa_hoc.id_taikhoan = tb_cms_tai_khoan.id_cms_taikhoan
        WHERE tb_khoahoc_damua.id_taikhoan = $id_taikhoan";  
        $query = mysqli_query($conn, $sql);
        if(mysqli_num_rows($query) > 0)
        {
    ?>
   <section class="courses">
      <h1 class="heading" >
        Khóa học đã mua    
      </h1>

      <div class="box-container">  
         <?php 
       
            while ($row = mysqli_fetch_assoc($query)) {      
         ?>
            <div class="box">
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
               <a href="home.php?title=detailcourses&idKH=<?php echo $row['id_khoahoc']; ?>" style="display: block;" class="btn btn-success">Chi tiết</a>
            </div>
         <?php 
            }
         ?>
      </div>
   </div>
   </section>
<?php 
      }else{
        echo '<p class="empty">Không có khóa học!</p>';
      }
?>