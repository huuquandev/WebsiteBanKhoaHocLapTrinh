<?php
            if(isset($_GET['title'])){
                $tam = $_GET['title'];
                if($tam == "cms_courses"){
                    $pageTitle = "Khóa học";
                }if($tam == "detail_courses"){
                    $pageTitle = "Chi tiết khóa học";
                }if($tam == "edit_courses"){
                    $pageTitle = "Chỉnh sửa khóa học";
                }if($tam == "cms_post"){
                    $pageTitle = "Bài viết";
                }if($tam == "cms_post_detail"){
                    $pageTitle = "Chi tiết bài viết";
                }if($tam == "cms_add_post"){
                    $pageTitle = "Đăng bài viết";
                }if($tam == "cms_comment"){
                    $pageTitle = "Danh sách bình luận";
                }if($tam == "cms_like"){
                    $pageTitle = "Danh sách lượt thích";
                }if($tam == "add_playlist"){
                    $pageTitle = "Thêm bài giảng";
                }if($tam == "edit_playlist"){
                    $pageTitle = "Chỉnh sửa bài giảng";
                }if($tam == "detail_lesson"){
                    $pageTitle = "Chi tiết bài giảng";
                }if($tam == "edit_post"){
                    $pageTitle = "Chỉnh sửa bài viết";
                }if($tam == "cms_profile"){
                    $pageTitle = "Hồ sơ";
                }if($tam == "cms_edit_profile"){
                    $pageTitle = "chỉnh sửa hồ sơ";
                }if($tam == "cms_change_password"){
                    $pageTitle = "Đổi mật khẩu";
                }if($tam == "cms_search"){
                    $keyword = $_GET['search_box'];
                    $pageTitle = 'Tìm kiếm \''. $keyword.'\'';
                }if($tam == "cms_search_courses"){
                    $keyword = $_GET['search_box'];
                    $pageTitle = 'Tìm kiếm khóa học \''.$keyword.'\'';
                }if($tam == "cms_search_post"){
                    $keyword = $_GET['search_box'];
                    $pageTitle = 'Tìm kiếm bài viết \''.$keyword.'\'';
                }if($tam == "cms_search_tag"){
                    $keyword = $_GET['tag'];
                    $pageTitle = 'Tìm kiếm theo tag \''.$keyword.'\'';
                }if($tam == "cms_tags"){
                    $pageTitle = "Tags";
                }
            }else{
                $tam = '';
                $pageTitle = "Trang chủ";
            }
?>
            