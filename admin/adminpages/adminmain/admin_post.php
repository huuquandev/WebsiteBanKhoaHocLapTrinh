<div class="breadcrumbs">
            <div class="breadcrumbs-inner">
                <div class="row m-0">
                    <div class="col-sm-4">
                        <div class="page-header float-left">
                            <div class="page-title">
                                <h1>Bài viết</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="page-header float-right">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="#">Bài viết</a></li>
                                    <li class="active"><a href="#">Danh sách bài viết</a></li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
</div>
        
<div class="content">
            <div class="animated fadeIn">
                <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Bài viết</strong>
                            </div>                      
                </div>
                <?php 
                   $sql = "SELECT tb_baiviet_tags.*, tb_bai_viet.*,tb_tag.ten_tag, tb_cms_tai_khoan.ten_hien_thi, tb_cms_tai_khoan.hinh_anh
                   FROM tb_baiviet_tags 
                   JOIN tb_bai_viet ON tb_bai_viet.id_baiviet = tb_baiviet_tags.id_baiviet
                   JOIN tb_cms_tai_khoan ON tb_bai_viet.id_taikhoan = tb_cms_tai_khoan.id_cms_taikhoan
                   JOIN tb_tag ON tb_tag.id_tag = tb_baiviet_tags.id_tag";  
                   $query = mysqli_query($conn, $sql);
                   if(mysqli_num_rows($query) > 0)
                    {
                    while ($row = mysqli_fetch_assoc($query)) {      
                 ?>
                    <div class="box-post">
                        <div class="card-body post_table">
                                    <div class="post-content">
                                        <div class="about_post">
                                            <div class="tutor">
                                                <img src="../../../images/images_user/<?= $row['hinh_anh'] ?>" alt="">
                                                        <div class="info">
                                                        <h3><?=$row['ten_hien_thi']?></h3>
                                                        <span><?=$row['ngaydang_baiviet']?></span>
                                                    </div>
                                            </div>
                                            <h3 class="title"><?=$row['ten_baiviet']?></h3>
                                            <p class="contentPost"><?=$row['mota_baiviet']?></p>
                                        </div>     
                                        <div class="thumb">
                                        <?php if(!empty($row['anh_baiviet'])) {  ?>
                                            <img src="../../../images/images_post/<?php echo $row['anh_baiviet']; ?>" alt="">
                                                <?php 
                                                }
                                                ?>
                                        </div>                           
                                    </div>
                                </div>                  
                    </div>
                <?php 
                    }
                    }
                 ?>
            </div>
</div>