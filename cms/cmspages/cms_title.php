<?php
            if(isset($_GET['title'])){
                $tam = $_GET['title'];
                if($tam == "cms_courses"){
                    $pageTitle = "Khóa học";
                }if($tam == "detail_courses"){
                    $pageTitle = "Chi tiết khóa học";
                }if($tam == "edit_courses"){
                    $pageTitle = "Chỉnh sửa khóa học";
                } if($tam == "cms_post"){
                    $pageTitle = "Bài viết";
                } 
            }else{
                $tam = '';
                $pageTitle = "Trang chủ";
            }
            