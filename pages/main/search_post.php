<?php
   include_once './function.php';

   if(isset($_GET['search_box'])){
      $keyword = $_GET['search_box'];
      $row_posts = Search_Post($keyword);
   }
?>

<section class="posts">
   <h1 class="heading">Bài viết'<?php echo $keyword ?>'</h1>
   <h1 class="heading" style="
   position: relative;
    display: flex;
    align-items: center;
    justify-content: space-between;">
    Khóa học       
    <div class="flex-option" style="display: flex;" >
         <a href="home.php?title=addpost" class="btn" id="btnAdd" style="width: auto; background: green;">Đăng bài viết</a>
      </div> 
   </h1>

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
                <img src="<?php echo "images/images_post/" . $row_post['anh_baiviet']; ?>" class="card-img-top" height="200vh" alt="Course Image">
                </div>
            </div>
            <div class="postItem_info">
               <?php
                  $tag_name = GetTagByIdPost($row_post['id_baiviet'])
               ?>
                <a class="postItem_tags" href="home.php?title=searchtag&tag=<?php echo $tag_name['ten_tag']; ?>"><?php echo $tag_name['ten_tag'] ?></a>
                
            </div>
            <div class="footer_post">
            <a href="home.php?title=detailpost&idp=<?php echo $row_courses['id_baiviet']; ?>" style="display: block;" class="inline-btn">Chi tiết</a>
                   <div class=" icon_post title title" style="display: flex; font-size: 1.3rem;">
                    <div >
                        <a><i class="fa-solid fa-thumbs-up"></i></a>
                        <span>25.124</span>
                    </div>
                    <div>
                        <a><i class="fa-solid fa-comment"></i></a>
                        <span>25.124</span>
                    </div>
                </div>
            </div>
        </div>
        <?php
         }
      ?>
   </div>
   
</section>