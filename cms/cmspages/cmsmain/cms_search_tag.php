<?php
if($id_taikhoan == ""){
    header('location:../cms/cmspages/cms_login.php');
}
   include_once '../function.php';

   if(isset($_GET['tag'])){
      $keyword = $_GET['tag'];
      $row_posts = Search_Tag($keyword);
   }
?>

<section class="posts">
   <h1 class="heading">Tag '<?php echo $keyword ?>'</h1>

   <div class="box-container">
   <?php    
       while($row_post = mysqli_fetch_assoc($row_posts)){
      ?>
        <div class="box">
            <div class="post">
                <div class="about_post">
                    <div class="tutor">
                    <img src="images/images_user/<?php echo $row_post['hinh_anh']; ?>" alt="">
                        <div class="info">
                        <h3><?php echo $row_post['ten_hien_thi']; ?></h3>
                        <span><?php echo $row_post['ngaydang_baiviet']; ?></span>
                        </div>
                    </div>
                    <h3 class="title"><?php echo $row_post['ten_baiviet']; ?></h3>
                    <p class="content"><?php echo $row_post['mota_baiviet']; ?></p>
                </div>
                <div class="thumb">
                <img src="<?php echo "images/images_post/" . $row_post['anh_baiviet']; ?>" class="card-img-top" height="200vh" alt="">
                </div>
            </div>
            <div class="footer_post">
                <a href="home.php?title=postdetail&id_baiviet=<?php echo $row_post['id_baiviet']?>" class="inline-btn">Xem chi tiết</a>
                    <?php
                            $total_like = GetCountLikeByPost($row_post['id_baiviet']);
                            $total_comment = mysqli_num_rows(GetCommentByPost($row_post['id_baiviet']));
                        ?>
                <div class=" icon_post title title" style="display: flex; font-size: 1.3rem;">
                    <div >
                        <a><i class="fa-solid fa-thumbs-up"></i></a>
                       
                        <span><?php echo $total_like; ?></span>
                    </div>
                    <div>   
                        <a><i class="fa-solid fa-comment"></i></a>
                        <span><?php echo $total_comment; ?></span>
                    </div>
                </div>
            </div>
        </div>
        <?php
         }
      ?>
   </div>
   
</section>