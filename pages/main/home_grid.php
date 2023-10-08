
<section class="quick-select">

   <h1 class="heading">quick options</h1>

<div class="box-container">

         <?php
            if($id_taikhoan != ''){
         ?>
         <div class="box">
            <h3 class="title">likes and comments</h3>
            <p>total likes : <span><?= $total_likes = 0; ?></span></p>
            <a href="likes.php" class="inline-btn">view likes</a>
            <p>total comments : <span><?= $total_comments = 0; ?></span></p>
            <a href="comments.php" class="inline-btn">view comments</a>
            <p>saved playlist : <span><?= $total_bookmarked = 0; ?></span></p>
            <a href="bookmark.php" class="inline-btn">view bookmark</a>
         </div>
         <?php
            }else{ 
         ?>
         <div class="box" style="text-align: center;">
            <h3 class="title">Vui lòng đăng nhập hoặc đăng ký</h3>
            <div class="flex-btn" style="padding-top: .5rem;">
               <a href="home.php??title=login" class="option-btn">Đăng nhập</a>
               <a href="home.php??title=register" class="option-btn">Đăng kí</a>
            </div>
         </div>
         <?php
         }
         ?>

      <div class="box">
         <h3 class="title">top categories</h3>
         <div class="flex">
            <a href="#"><i class="fas fa-code"></i><span>development</span></a>
            <a href="#"><i class="fas fa-chart-simple"></i><span>business</span></a>
            <a href="#"><i class="fas fa-pen"></i><span>design</span></a>
            <a href="#"><i class="fas fa-chart-line"></i><span>marketing</span></a>
            <a href="#"><i class="fas fa-music"></i><span>music</span></a>
            <a href="#"><i class="fas fa-camera"></i><span>photography</span></a>
            <a href="#"><i class="fas fa-cog"></i><span>software</span></a>
            <a href="#"><i class="fas fa-vial"></i><span>science</span></a>
         </div>
      </div>

      <div class="box">
         <h3 class="title">popular topics</h3>
         <div class="flex">
            <a href="#"><i class="fab fa-html5"></i><span>HTML</span></a>
            <a href="#"><i class="fab fa-css3"></i><span>CSS</span></a>
            <a href="#"><i class="fab fa-js"></i><span>javascript</span></a>
            <a href="#"><i class="fab fa-react"></i><span>react</span></a>
            <a href="#"><i class="fab fa-php"></i><span>PHP</span></a>
            <a href="#"><i class="fab fa-bootstrap"></i><span>bootstrap</span></a>
         </div>
      </div>

      <div class="box">
         <h3 class="title">become a tutor</h3>
         <p class="tutor">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Perspiciatis, nam?</p>
         <a href="teachers.html" class="inline-btn">get started</a>
      </div>

   </div>

</section>
<section class="courses">

<h1 class="heading">Khoá học Pro</h1>

<div class="box-container">

   <div class="box">
      <div class="tutor">
         <img src="images/pic-2.jpg" alt="">
         <div class="info">
            <h3>john deo</h3>
            <span>21-10-2022</span>
         </div>
      </div>
      <div class="thumb">
         <img src="images/thumb-1.png" alt="">
         <span>10 videos</span>
      </div>
      <h3 class="title">complete HTML tutorial</h3>
      <a href="home.php?title=detail" class="inline-btn">Xem chi tiết</a>
   </div>

   <div class="box">
      <div class="tutor">
         <img src="images/pic-3.jpg" alt="">
         <div class="info">
            <h3>john deo</h3>
            <span>21-10-2022</span>
         </div>
      </div>
      <div class="thumb">
         <img src="images/thumb-2.png" alt="">
         <span>10 videos</span>
      </div>
      <h3 class="title">complete CSS tutorial</h3>
      <a href="home.php?title=detail" class="inline-btn">Xem chi tiết</a>
   </div>

   <div class="box">
      <div class="tutor">
         <img src="images/pic-4.jpg" alt="">
         <div class="info">
            <h3>john deo</h3>
            <span>21-10-2022</span>
         </div>
      </div>
      <div class="thumb">
         <img src="images/thumb-3.png" alt="">
         <span>10 videos</span>
      </div>
      <h3 class="title">complete JS tutorial</h3>
      <a href="home.php?title=detail" class="inline-btn">Xem chi tiết</a>
   </div>

</div>
</section>

<section class="courses">

   <h1 class="heading">Khoá học miễn phí</h1>

   <div class="box-container">

      <div class="box">
         <div class="tutor">
            <img src="images/pic-2.jpg" alt="">
            <div class="info">
               <h3>john deo</h3>
               <span>21-10-2022</span>
            </div>
         </div>
         <div class="thumb">
            <img src="images/thumb-1.png" alt="">
            <span>10 videos</span>
         </div>
         <h3 class="title">complete HTML tutorial</h3>
         <a href="home.php?title=detail" class="inline-btn">Xem chi tiết</a>
      </div>

      <div class="box">
         <div class="tutor">
            <img src="images/pic-3.jpg" alt="">
            <div class="info">
               <h3>john deo</h3>
               <span>21-10-2022</span>
            </div>
         </div>
         <div class="thumb">
            <img src="images/thumb-2.png" alt="">
            <span>10 videos</span>
         </div>
         <h3 class="title">complete CSS tutorial</h3>
         <a href="home.php?title=detail" class="inline-btn">Xem chi tiết</a>
      </div>

      <div class="box">
         <div class="tutor">
            <img src="images/pic-4.jpg" alt="">
            <div class="info">
               <h3>john deo</h3>
               <span>21-10-2022</span>
            </div>
         </div>
         <div class="thumb">
            <img src="images/thumb-3.png" alt="">
            <span>10 videos</span>
         </div>
         <h3 class="title">complete JS tutorial</h3>
         <a href="home.php?title=detail" class="inline-btn">Xem chi tiết</a>
      </div>

      <div class="box">
         <div class="tutor">
            <img src="images/pic-5.jpg" alt="">
            <div class="info">
               <h3>john deo</h3>
               <span>21-10-2022</span>
            </div>
         </div>
         <div class="thumb">
            <img src="images/thumb-4.png" alt="">
            <span>10 videos</span>
         </div>
         <h3 class="title">complete Boostrap tutorial</h3>
         <a href="home.php?title=detail" class="inline-btn">Xem chi tiết</a>
      </div>

      <div class="box">
         <div class="tutor">
            <img src="images/pic-6.jpg" alt="">
            <div class="info">
               <h3>john deo</h3>
               <span>21-10-2022</span>
            </div>
         </div>
         <div class="thumb">
            <img src="images/thumb-5.png" alt="">
            <span>10 videos</span>
         </div>
         <h3 class="title">complete JQuery tutorial</h3>
         <a href="home.php?title=detail" class="inline-btn">Xem chi tiết</a>
      </div>


   </div>


</section>
<section class="courses">

   <h1 class="heading">Bài viết nổi bật</h1>

   <div class="box-container">
   <div class="box">
         <div class="tutor">
            <img src="images/pic-2.jpg" alt="">
            <div class="info">
               <h3>john deo</h3>
               <span>21-10-2022</span>
            </div>
         </div>
         <div class="thumb">
            <img src="images/thumb-1.png" alt="">
            <span>10 videos</span>
         </div>
         <h3 class="title">complete HTML tutorial</h3>
         <a href="playlist.html" class="inline-btn">Xem chi tiết</a>
      </div>

      <div class="box">
         <div class="tutor">
            <img src="images/pic-3.jpg" alt="">
            <div class="info">
               <h3>john deo</h3>
               <span>21-10-2022</span>
            </div>
         </div>
         <div class="thumb">
            <img src="images/thumb-2.png" alt="">
            <span>10 videos</span>
         </div>
         <h3 class="title">complete CSS tutorial</h3>
         <a href="playlist.html" class="inline-btn">Xem chi tiết</a>
      </div>

      <div class="box">
         <div class="tutor">
            <img src="images/pic-4.jpg" alt="">
            <div class="info">
               <h3>john deo</h3>
               <span>21-10-2022</span>
            </div>
         </div>
         <div class="thumb">
            <img src="images/thumb-3.png" alt="">
            <span>10 videos</span>
         </div>
         <h3 class="title">complete JS tutorial</h3>
         <a href="playlist.html" class="inline-btn">Xem chi tiết</a>
      </div>

      <div class="box">
         <div class="tutor">
            <img src="images/pic-5.jpg" alt="">
            <div class="info">
               <h3>john deo</h3>
               <span>21-10-2022</span>
            </div>
         </div>
         <div class="thumb">
            <img src="images/thumb-4.png" alt="">
            <span>10 videos</span>
         </div>
         <h3 class="title">complete Boostrap tutorial</h3>
         <a href="playlist.html" class="inline-btn">Xem chi tiết</a>
      </div>

      <div class="box">
         <div class="tutor">
            <img src="images/pic-6.jpg" alt="">
            <div class="info">
               <h3>john deo</h3>
               <span>21-10-2022</span>
            </div>
         </div>
         <div class="thumb">
            <img src="images/thumb-5.png" alt="">
            <span>10 videos</span>
         </div>
         <h3 class="title">complete JQuery tutorial</h3>
         <a href="playlist.html" class="inline-btn">Xem chi tiết</a>
      </div>
      
   </div>
</section>
<section class="playlist-videos">

   <h1 class="heading">Video nổi bật</h1>

   <div class="box-container">
      <div class="box">
            <a href="home.php??title=watch-video">   
               <i class="fas fa-play"></i>
               <img src="images/post-1-1.png" alt="">
               <h3>complete HTML tutorial (part 01)</h3>
            </a>
         
      </div>
      <div class="box">
            <a href="home.php??title=watch-videol">
               <i class="fas fa-play"></i>
               <img src="images/post-1-2.png" alt="">
               <h3>complete HTML tutorial (part 02)</h3>
            </a>   
         
      </div>
      <div class="box">
            <a href="home.php??title=watch-video">
               <i class="fas fa-play"></i>
               <img src="images/post-1-3.png" alt="">
               <h3>complete HTML tutorial (part 03)</h3>
            </a> 
         
      </div>
      <div class="box">
            <a href="home.php??title=watch-video">
               <i class="fas fa-play"></i>
               <img src="images/post-1-4.png" alt="">
               <h3>complete HTML tutorial (part 04)</h3>
            </a>
         
      </div>     
   </div>
</section>