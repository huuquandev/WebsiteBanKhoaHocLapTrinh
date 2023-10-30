<?php
if($id_taikhoan == ""){
    header('location:../cms/cmspages/cms_login.php');
}
 ?>

<section class="quick-select">

<h1 class="heading" style="
   position: relative;
    display: flex;
    align-items: center;
    justify-content: space-between;">
    Danh sách thẻ    
    <div class="flex-option" style="display: flex;" >
      <button class="btn" id="btnAdd" style="width: auto; background: green;" >Thêm thẻ</button>
      </div> 
   </h1>


   <div class="box-container">
    
      <div class="box">
      <?php
            $sqltags = "SELECT * FROM tb_tag";
            $querytags = mysqli_query($conn, $sqltags);
            if(mysqli_num_rows($querytags) > 0){
        ?>  
         <h3 class="title">Danh mục</h3>
        <div class="flex">

            <?php
            while($rowtags = mysqli_fetch_array($querytags)){
            ?>
             <a href="cms_dashboard.php?title=cms_search_tag&tag=<?php echo $rowtags['ten_tag']; ?>"><span><?php echo $rowtags['ten_tag'] ?></span></a>
            <?php 
            }
            ?>
        </div>
         <?php
         }
         ?>
      </div>

      <div class="box">
         <h3 class="title">Phổ biến</h3>
         <div class="flex">
            <a href="#"><span>HTML</span></a>
            <a href="#"><span>CSS</span></a>
            <a href="#"><span>javascript</span></a>
            <a href="#"><span>react</span></a>
            <a href="#"><span>PHP</span></a>
            <a href="#"><span>bootstrap</span></a>
         </div>
      </div>

   </div>

</section>
