<?php
            if(isset($_GET['title'])){
                $tam = $_GET['title'];
                if($tam == "admin_user"){
                    include("adminmain/admin_user.php");
                }if($tam == "admin_courses"){
                    include("adminmain/admin_courses.php");
                }if($tam == "admin_post"){
                    include("adminmain/admin_post.php");
                }if($tam == "admin_login"){
                    include("admin_login.php");
                }if($tam == "admin_register"){
                    include("admin_register.php");
                }if($tam == "admin_forget"){
                    include("admin_forgetpassword.php");
                }if($tam == "admin_order"){
                    include("adminmain/admin_order.php");
                }if($tam == "admin_role"){
                    include("adminmain/admin_role.php");
                }if($tam == "admin_permission"){
                    include("adminmain/admin_permission.php");
                }
                
            }else{
                $tam = '';
                include("adminmain/admin_home_gird.php");
            }
    ?> 
