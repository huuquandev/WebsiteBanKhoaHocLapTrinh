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
                }if($tam == "cms_post_detail"){
                    include("cmsmain/cms_post_detail.php");
                }if($tam == "cms_add_post"){
                    include("cmsmain/cms_add_post.php");
                }if($tam == "cms_comment"){
                    include("cmsmain/cms_comment.php");
                }if($tam == "cms_like"){
                    include("cmsmain/cms_like.php");
                }if($tam == "add_playlist"){
                    include("cmsmain/add_playlist.php");
                }if($tam == "add_courses"){
                    include("cmsmain/add_courses.php");
                }if($tam == "edit_playlist"){
                    include("cmsmain/edit_playlist.php");
                }if($tam == "detail_lesson"){
                    include("cmsmain/detail_lesson.php");
                }if($tam == "edit_post"){
                    include("cmsmain/edit_post.php");
                }if($tam == "cms_profile"){
                    include("cmsmain/cms_profile.php");
                }if($tam == "cms_detail"){
                    include("cmsmain/cms_profile.php");
                }if($tam == "edit_cms_profile"){
                    include("cmsmain/cms_edit_profile.php");
                }if($tam == "cms_edit_profile"){
                    include("cmsmain/cms_edit_profile.php");
                }if($tam == "cms_change_password"){
                    include("cmsmain/cms_change_pass.php");
                }if($tam == "cms_search"){
                    include("cmsmain/cms_search.php");
                }if($tam == "cms_search_courses"){
                    include("cmsmain/cms_search_courses.php");
                }if($tam == "cms_search_post"){
                    include("cmsmain/cms_search_post.php");
                }if($tam == "cms_search_tag"){
                    include("cmsmain/cms_search_tag.php");
                }
                
            }else{
                $tam = '';
                include("cmsmain/cms_home_gird.php");
            }
            
        ?>        
    </div>     
 </div>