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
                }if($tam == "addcourses"){
                    $pageTitle = "Thêm khóa học";
                }if($tam == "editcourses"){
                    $pageTitle = "Sửa khóa học";
                }if($tam == "addplaylist"){
                    $pageTitle = "Thêm bài giảng";
                }if($tam == "editplaylist"){
                    $pageTitle = "Sửa bài giảng";
                }if($tam == "search"){
                    $pageTitle = "Tìm kiếm";
                }if($tam == "search_post"){
                    $pageTitle = "Tìm kiếm bài viết";
                }if($tam == "search_video"){
                    $pageTitle = "Tìm kiếm video";
                }if($tam == "search_courses"){
                    $pageTitle = "Tìm kiếm Khóa học";
                }if($tam == "post"){
                    $pageTitle = "Bài viết";
                }else if($tam == "postdetail"){
                    $pageTitle = "Chi tiết bài viết";
                }else if($tam == "addpost"){
                    $pageTitle = "Đăng bài viết";
                }else if($tam == "searchtag"){
                    $pageTitle = "Tìm kiếm theo tag";
                }
                
            }else{
                $tam = '';
                $pageTitle = "Trang chủ";
            }
            