<?php
if($id_taikhoan == ""){
    header('location:../cms/cmspages/cms_login.php');
}
 ?>
<section class="posts">

    <h1 class="heading" style="
   position: relative;
    display: flex;
    align-items: center;
    justify-content: space-between;">
    Danh sách bài viết      
    <div class="flex-option" style="display: flex;" >
         <a href="cms_dashboard.php?title=cms_add_post" class="btn" id="btnAdd" style="width: auto; background: green;">Đăng bài viết</a>
      </div> 
   </h1>

   <div class="box-container">
   <?php 
      include_once '../function.php';

           $sql = "SELECT tb_baiviet_tags.*, tb_bai_viet.*,tb_tag.ten_tag, tb_cms_tai_khoan.ten_hien_thi, tb_cms_tai_khoan.hinh_anh
           FROM tb_baiviet_tags 
           JOIN tb_bai_viet ON tb_bai_viet.id_baiviet = tb_baiviet_tags.id_baiviet
           JOIN tb_cms_tai_khoan ON tb_bai_viet.id_taikhoan = tb_cms_tai_khoan.id_cms_taikhoan
           JOIN tb_tag ON tb_tag.id_tag = tb_baiviet_tags.id_tag
           WHERE tb_bai_viet.id_taikhoan = $id_taikhoan";
           $query = mysqli_query($conn, $sql);
           if(mysqli_num_rows($query) > 0){
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
             <a class="postItem_tags" href="cms_dashboard.php?title=cms_search_tag&tag=<?php echo $row['ten_tag']; ?>"><?php echo $row['ten_tag'] ?></a>
            </div>
            <div class="footer_post">
                <a href="cms_dashboard.php?title=cms_post_detail&id_baiviet=<?php echo $row['id_baiviet']?>" class="inline-btn">Xem chi tiết</a>
                    <?php
                            $total_like = GetCountLikeByPost($row['id_baiviet']);
                            $total_comment = mysqli_num_rows(GetCommentByPost($row['id_baiviet']));
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
    <?php } 
    } 
    ?>

        
   </div>
   
</section>