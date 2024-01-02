<section class="about">

   <div class="row">

      <div class="image">
         <img src="images/about-img.svg" alt="">
      </div>

      <div class="content">
         <h3>why choose us?</h3>
         <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ut dolorum quasi illo? Distinctio expedita commodi, nemo a quam error repellendus sint, fugiat quis numquam eum eveniet sequi aspernatur quaerat tenetur.</p>
         <a href="home.php?title=courses" class="inline-btn">Các khóa học của chúng tôi</a>
         <?php
            if(isset($_GET['title'])){
                $tam = $_GET['title'];
                if($tam == "courses"){ 
                    include("main/courses.php");
                }
            }
            $sql = "SELECT * FROM tb_rating";
            $query = mysqli_query($conn, $sql);
      
        ?> 
      </div>

   </div>

   <div class="box-container">

      <div class="box">
         <i class="fas fa-graduation-cap"></i>
         <div>
            <h3>+10k</h3>
            <p>online courses</p>
         </div>
      </div>

      <div class="box">
         <i class="fas fa-user-graduate"></i>
         <div>
            <h3>+40k</h3>
            <p>brilliant students</p>
         </div>
      </div>

      <div class="box">
         <i class="fas fa-chalkboard-user"></i>
         <div>
            <h3>+2k</h3>
            <p>expert tutors</p>
         </div>
      </div>

      <div class="box">
         <i class="fas fa-briefcase"></i>
         <div>
            <h3>100%</h3>
            <p>job placement</p>
         </div>
      </div>

   </div>

</section> 

<section class="reviews">

   <h1 class="heading">Đánh giá</h1>

   <div class="box-container">
      <?php 
         if(mysqli_num_rows($query) > 0){
            while ($row = mysqli_fetch_array($query)) {

      ?>
      <div class="box">
         <p><?php echo $row['noidung_rate']; ?></p>
         <div class="student">
            <img src="images/pic-2.jpg" alt="">
            <div>
               <h3><?php echo $row['hoten_rate']; ?></h3>
               <div class="stars">
                  <?php for ($i=0; $i < $row['rate_score']; $i++) { 
                     echo '<i class="fas fa-star"></i>';
                  } ?>
                  <!-- <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star-half-alt"></i> -->
               </div>
            </div>
         </div>
      </div>
   <?php } 
}?>
      

   </div>

</section>