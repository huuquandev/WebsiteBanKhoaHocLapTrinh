
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
      include_once '../function.php';

           $sql = "SELECT * FROM tb_bai_viet";
           $sql = "SELECT tb_bai_viet.*, tb_cms_tai_khoan.hinh_anh, tb_cms_tai_khoan.ten_hien_thi FROM tb_bai_viet 
            JOIN tb_cms_tai_khoan ON tb_bai_viet.id_taikhoan = tb_cms_tai_khoan.id_cms_taikhoan";
           $query = mysqli_query($conn, $sql);
           while ($row = mysqli_fetch_array($query)) {
        ?>
        <div class="box">
            <div class="post">
                <div class="about_post">
                    <div class="tutor">
                    <img src="../../../../images/images_user/<?php echo $row['hinh_anh']; ?>" alt="">
                            <div class="info">
                            <h3><?php echo $row['ten_hien_thi']; ?></h3>
                            <span><?php echo $row['ngaydang_baiviet']; ?></span>
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
            <?php
                  $tag_name = GetTagByIdPost($row['id_baiviet']);
                  if($tag_name != null){
               ?>
                <a class="postItem_tags" href="home.php?title=searchtag&tag=<?php echo $tag_name['ten_tag']; ?>"><?php echo $tag_name['ten_tag'] ?></a>
                <?php
                }
                ?>
            </div>
            <div class="footer_post">
                <a href="home.php?title=postdetail&id_baiviet=<?php echo $row['id_baiviet']?>" class="inline-btn">Xem chi tiết</a>
                    <?php
                            $total_like = GetCountLikeByPost($row['id_baiviet']);
                            $total_comment = mysqli_num_rows(GetComentByPost($row['id_baiviet']));
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
    <?php } ?>

        
   </div>
   
</section>