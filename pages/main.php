<div id="main">    
    <div class="maincontent">
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
                }else if($tam == "playlist"){
                    include("main/playlist.php");
                }else if($tam == "watch-video"){
                    include("main/watch-video.php");
                }
                
            }else{
                $tam = '';
                include("main/home_grid.php");
            }
            
        ?>        
    </div>     
 </div>