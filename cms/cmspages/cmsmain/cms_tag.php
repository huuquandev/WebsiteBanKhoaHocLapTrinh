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
      <button class="btn btnaddtag" id="btnAddTag" style="width: auto; background: green;" >Thêm thẻ</button>
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
<div class="form-tag">
      <div class="addtag">
         <div class="close-side-bar">
               <i class="fas fa-times"></i>
            </div>
         <h3>Thêm thẻ</h3>
         <form action="" method="post" enctype="multipart/form-data">
            <p>Tên thẻ <span>*</span></p>
            <input type="text" name="title" maxlength="100" required placeholder="nhập tên thẻ" class="box">
            <input type="submit" value="Thêm" name="submit" class="btn">
         </form>
      </div>
</div>
<script>
   let addtag = document.querySelector('.addtag');

   document.querySelector('#btnAddTag').onclick = () =>{
   addtag.classList.toggle('active');
   searchForm.classList.remove('active');
   overlay.classList.toggle('active');
   
}
   document.querySelector('.addtag .close-side-bar').onclick = () =>{
   addtag.classList.remove('active');
   overlay.classList.remove('active');
   }

</script>