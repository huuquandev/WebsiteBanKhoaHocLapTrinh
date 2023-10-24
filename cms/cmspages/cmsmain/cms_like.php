<?php
  if($id_taikhoan == ""){
    header('location:../cms/cmspages/cms_login.php');
  }
 ?>
<section class="comments">

   <h1 class="heading">Danh sách lượt thích</h1>
   
   <?php
        $sql = "SELECT tb_thichbaiviet.*, tb_bai_viet.*, tb_tai_khoan.hinh_anh, tb_tai_khoan.ten_hien_thi
        FROM tb_thichbaiviet
        JOIN tb_tai_khoan ON tb_thichbaiviet.id_taikhoan = tb_tai_khoan.id_taikhoan 
        JOIN tb_bai_viet ON tb_thichbaiviet.id_baiviet = tb_bai_viet.id_baiviet
        WHERE tb_bai_viet.id_taikhoan = $id_taikhoan";
        $query = mysqli_query($conn, $sql);
        if(mysqli_num_rows($query) > 0){
            while ($row = mysqli_fetch_array($query)) {
     
    ?>
   <div class="show-comments">
   
      <div class="box">
        
        <div class="tutor">
            <img src="../../../../images/images_user/<?php echo $row['hinh_anh']; ?>" alt="">
                <div class="info">
                        <h3 class="title"><?php echo $row['ten_hien_thi']; ?></h3>
                </div>
        </div>
         <div class="content flex">
            <div class="title">
                <span><?php echo $row['ngay_thich_baiviet']; ?></span><p> - <?php echo $row['ten_baiviet']; ?> - </p><a href="cms_dashboard.php?title=cms_post_detail&id_baiviet=<?php echo $row['id_baiviet']?>">Xem bài viết</a>

            </div>
            <div class="liked">
                <button><span>+1</span><i class="far fa-heart"></i></button>
            </div>
        </div>
      </div>
      
    </div>
    <?php
            }
        } 
      ?>
</section>
