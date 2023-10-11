
<section class="posts">

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
           $sql = "SELECT * FROM tb_bai_viet";
           $query = mysqli_query($conn, $sql);
           while ($row = mysqli_fetch_array($query)) {
        ?>
        <div class="box">
            <div class="post">
                <div class="about_post">
                    <div class="tutor">
                        <img src="images/pic-2.jpg" alt="">
                        <div class="info">
                            <h3>john deo</h3>
                            <span>21-10-2022</span>
                        </div>
                    </div>
                    <h3 class="title"><?php echo $row['ten_baiviet']; ?></h3>
                    <p class="content"><?php echo $row['mota_baiviet']; ?></p>
                </div>
                <div class="thumb">
                    <img src="images/thumb-1.png" alt="">
                </div>
            </div>
            <div class="postItem_info">
                <a class="postItem_tags" href="">Front-end</a>
                
            </div>
            <div class="footer_post">
                <a href="home.php?title=postdetail&id_baiviet=<?php echo $row['id_baiviet']?>" class="inline-btn">Xem chi tiết</a>
                <div class=" icon_post title title" style="display: flex; font-size: 1.3rem;">
                    <div >
                        <a><i class="fa-solid fa-thumbs-up"></i></a>
                        <span><?php echo $row['luot_thich']; ?></span>
                    </div>
                    <div>
                        <a><i class="fa-solid fa-comment"></i></a>
                        <span>25.124</span>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>

        
   </div>
   
</section>