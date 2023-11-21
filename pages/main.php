<div class="main-content">
    <?php include 'sidebar.php'; ?>

    <div class="content-sidebar">        
    <?php
            if(isset($_GET['title'])){
                $tam = $_GET['title'];
                if($tam == "about"){
                    include("main/about.php");
                }else if($tam == "courses"){ 
                    include("main/courses.php");
                }else if($tam == "teachers"){
                    include("main/teachers.php");
                }else if($tam == "contact"){
                    include("main/contact.php");
                }else if($tam == "login"){
                    include("main/login.php");
                }else if($tam == "register"){
                    include("main/register.php");
                }else if($tam == "profile"){
                    include("main/profile.php");
                }else if($tam == "teacher_profile"){
                    include("main/teacher_profile.php");
                }else if($tam == "detailcourses"){
                    include("main/detailcourses.php");
                }else if($tam == "detaillesson"){
                    include("main/detaillesson.php");
                }if($tam == "search"){
                    include("main/search.php");
                }if($tam == "search_post"){
                    include("main/search_post.php");
                }if($tam == "search_video"){
                    include("main/search_video.php");
                }if($tam == "search_courses"){
                    include("main/search_courses.php");
                }if($tam == "post"){
                    include("main/post.php");
                }else if($tam == "postdetail"){
                    include("main/postdetail.php");
                }else if($tam == "searchtag"){
                    include("main/search_tag.php");
                }else if($tam == "edit_profile"){
                    include("main/editprofile.php");
                }else if($tam == "change_password"){
                    include("main/changepass.php");
                }else if($tam == "comment"){
                    include("main/comment.php");
                }else if($tam == "like"){
                    include("main/like.php");
                }else if($tam == "coursesbuy"){
                    include("main/coursesbuy.php");
                }
                
            }else{
                $tam = '';
                include("main/home_grid.php");
            }
            
        ?>  
    </div>

</div>
