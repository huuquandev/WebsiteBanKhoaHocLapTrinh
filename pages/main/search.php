<?php
include_once './function.php';

if(isset($_GET['search_box'])){
    $keyword = $_GET['search_box'];
    $row_courses = Search_Courses($keyword);
    $row_posts = Search_Post($keyword);
}
?>

<section class="courses">
    <h1 class="heading">Kết quả tìm kiếm '<?php echo $keyword ?>'</h1>
    <?php
    if (mysqli_num_rows($row_courses) < 1 && mysqli_num_rows($row_posts) < 1) {
         echo '<p class="empty">Không có kết quả!</p>';
    } else {
    ?>
        <?php
        if (mysqli_num_rows($row_courses) > 0) {
        ?>
            <h3 class="heading" style="
            position: relative;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding-top: 15px;">
                Khóa học
                <div class="flex-option" style="display: flex;">
                    <a href="home.php?title=search_courses&search_box=<?php echo $keyword; ?>" style="font-size: 15px;">Xem thêm</a>
                </div>
            </h3>

            <div class="box-container">
                <?php
                while ($row_course = mysqli_fetch_assoc($row_courses)) {
                ?>
                    <div class="box">
                        <div class="tutor">
                            <img src="images/images_user/<?php echo $row_course['hinh_anh']; ?>" alt="">
                            <div class="info">
                                <h3><?php echo $row_course['ten_hien_thi']; ?></h3>
                                <span><?php echo $row_course['ngaydang_khoahoc']; ?></span>
                            </div>
                        </div>
                        <div class="thumb">
                            <img src="<?php echo "images/images_courses/" . $row_course['anh_khoahoc']; ?>" class="card-img-top" height="200vh" alt="Course Image">
                        </div>
                        <h3 class="title" style="min-height: 50px"><?php echo $row_course['ten_khoahoc']; ?></h3>
                        <?php
                        if (!empty($row_course['gia_khoahoc'])) {
                        ?>
                            <h5 class="title" style="font-size: 1.5rem; color:red"><?php echo convertToVietnameseCurrency($row_course['gia_khoahoc']); ?></h5>
                        <?php
                        } else {
                        ?>
                            <h5 class="title">Miễn phí</h5>
                        <?php
                        }
                        ?>
                        <a href="home.php?title=detailcourses&idKH=<?php echo $row_course['id_khoahoc']; ?>" style="display: block;" class="btn btn-success">Chi tiết</a>
                    </div>
                <?php
                }
                ?>
            </div>
        <?php
        }
        ?>
        <?php
        if (mysqli_num_rows($row_posts) > 0) {
        ?>
            <h3 class="heading" style="
            position: relative;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding-top: 15px;">
                Bài viết
                <div class="flex-option" style="display: flex;">
                    <a href="home.php?title=search_post&search_box=<?php echo $keyword; ?>" style="font-size: 15px;">Xem thêm</a>
                </div>
            </h3>
            <div class="box-container">
                <?php
                while ($row_post = mysqli_fetch_assoc($row_posts)) {
                ?>
                    <div class="box">
                        <div class="tutor">
                            <img src="images/images_user/<?php echo $row_post['hinh_anh']; ?>" alt="">
                            <div class="info">
                                <h3><?php echo $row_post['ten_hien_thi']; ?></h3>
                                <span><?php echo $row_post['ngaydang_baiviet']; ?></span>
                            </div>
                        </div>
                        <div class="thumb">
                            <img src="<?php echo "images/images_post/" . $row_post['anh_baiviet']; ?>" class=" card-img-top" height="200vh" alt="Course Image">
                        </div>
                        <h3 class="title" style="min-height: 50px"><?php echo $row_post['ten_baiviet']; ?></h3>
                        <a href="home.php?title=courses_content&idp=<?php echo $row_post['id_baiviet']; ?>" style="display: block;" class="btn btn-success">Chi tiết</a>
                    </div>
                <?php
                }
                ?>
            </div>
        <?php
        }
        ?>
    <?php
    }
    ?>
</section>
