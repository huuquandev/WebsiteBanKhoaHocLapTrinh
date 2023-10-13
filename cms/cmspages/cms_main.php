<div id="main">    
    <div class="maincontent">
        <?php
            if(isset($_GET['title'])){
                $tam = $_GET['title'];
                if($tam == "cms_courses"){
                    include("cmsmain/cms_courses.php");
                }if($tam == "detail_courses"){
                    include("cmsmain/detail_courses.php");
                }if($tam == "edit_courses"){
                    include("cmsmain/edit_courses.php");
                }if($tam == "cms_post"){
                    include("cmsmain/cms_post.php");
                }
                
            }else{
                $tam = '';
                include("cmsmain/cms_home_gird.php");
            }
            
        ?>        
    </div>     
 </div>