<?php
            if(isset($_GET['title'])){
                $tam = $_GET['title'];
                if($tam == "about"){
                    $pageTitle = "giới thiệu";
                }else if($tam == "courses"){ 
                    $pageTitle = "Khóa học";
                }else if($tam == "teachers"){
                    $pageTitle = "Người đăng";
                }else if($tam == "contact"){
                    $pageTitle = "liên hệ";
                }else if($tam == "login"){
                    $pageTitle = "Đăng nhập";
                }else if($tam == "register"){
                    $pageTitle = "Đăng ký";
                }else if($tam == "profile"){
                    $pageTitle = "Hồ sơ";
                }else if($tam == "teacher_profile"){
                    $pageTitle = "Hồ sơ";
                }else if($tam == "detailcourses"){
                    $pageTitle = "Chi tiết khóa học";
                }else if($tam == "detaillesson"){
                    $pageTitle = "Chi tiết bài giảng";
                }if($tam == "search"){
                    $keyword = $_GET['search_box'];
                    $pageTitle = 'Tìm kiếm \''. $keyword.'\'';
                }if($tam == "search_post"){
                    $keyword = $_GET['search_box'];
                    $pageTitle = 'Tìm kiếm bài viết \''.$keyword.'\'';
                }if($tam == "search_courses"){
                    $keyword = $_GET['search_box'];
                    $pageTitle = 'Tìm kiếm khóa học \''.$keyword.'\'';
                }if($tam == "post"){
                    $pageTitle = "Bài viết";
                }else if($tam == "postdetail"){
                    $pageTitle = "Chi tiết bài viết";
                }else if($tam == "searchtag"){
                    $keyword = $_GET['tag'];
                    $pageTitle = 'Tìm kiếm theo tag \''.$keyword.'\'';
                }else if($tam == "edit_profile"){
                    $pageTitle = "Chỉnh sửa hồ sơ";
                }else if($tam == "change_password"){
                    $pageTitle = "Đổi mật khẩu";
                }else if($tam == "comment"){
                    $pageTitle = "Bình luận";
                }else if($tam == "like"){
                    $pageTitle = "Lượt thích";
                }else if($tam == "coursesbuy"){
                    $pageTitle = "Khóa học đã mua";
                }
                
            }else{
                $tam = '';
                $pageTitle = "Trang chủ";
            }
?>
            