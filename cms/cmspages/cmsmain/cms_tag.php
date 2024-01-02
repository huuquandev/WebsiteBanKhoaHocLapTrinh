<?php
   if($id_taikhoan == ""){
      header('location:../cms/cmspages/cms_login.php');
   }
   if (isset($_POST['submit'])) {
      $name_tag = $_POST["name_tag"];
      $sql = "INSERT INTO tb_tag (ten_tag) VALUES ('$name_tag')";
      if ($conn->query($sql) === TRUE) {
         echo '<script>alert("Thêm thẻ thành công");</script>';
      } else {
          echo "Lỗi: " . $sql . "<br>" . $conn->error;
      }
      
  }
 ?>

<section class="quick-select">

<h1 class="heading" style="
   position: relative;
    display: flex;
    align-items: center;
    justify-content: space-between;">
    Danh sách thẻ    
    <div class="flex-option option1" style="display: flex;" >
      <button class="btn btnedittag" id="btnEditTag" style="width: auto; background: orange;" >Chỉnh sửa</button>
      <button class="btn btnaddtag" id="btnAddTag" style="width: auto; background: green;" >Thêm thẻ</button>
    </div> 
    <div class="flex-option option2" style="display: none;" >
      <button class="btn btnclosetag" id="btnCloseTag" style="width: auto; background: red;" >Hủy</button>
      <button class="btn btnsavetag" id="btnSaveTag" style="width: auto; background: green;" >Lưu</button>
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
             <a href="cms_dashboard.php?title=cms_search_tag&tag=<?php echo $rowtags['ten_tag']; ?>"><span><?php echo $rowtags['ten_tag'] ?></span><i class="fa-solid fa-minus deleteTag" style="display: none;"></i></a>
            <?php 
            }
            ?>
        </div>
         <?php
         }
         ?>
      </div>

      <div class="box">
         <?php
            $sqltrendtag = "SELECT id_tag, ten_tag, COUNT(*) AS so_lan_su_dung
            FROM (
                SELECT id_tag, ten_tag FROM tb_tag WHERE id_tag IN (
                    SELECT id_tag FROM tb_baiviet_tags
                    UNION ALL
                    SELECT id_tag FROM tb_khoahoc_tags
                )
            ) AS tags_su_dung
            GROUP BY id_tag, ten_tag
            HAVING COUNT(*) >= 1
            ORDER BY so_lan_su_dung DESC;";
            $querytrendtag = mysqli_query($conn, $sqltrendtag);
            if(mysqli_num_rows($querytrendtag) > 0){
          ?>
         <h3 class="title">Phổ biến</h3>
         <div class="flex">
         <?php
            while($rowtags = mysqli_fetch_array($querytrendtag)){
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
            <input type="text" name="name_tag" maxlength="100" required placeholder="nhập tên thẻ" class="box">
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
   //Hiển thị thêm sửa xóa
   let btneditag = document.querySelector('.btnedittag');
   let btnaddtag = document.querySelector('.btnaddtag');
   let btnclosetag = document.querySelector('.btnclosetag');
   let btnsavetag = document.querySelector('.btnsavetag');

   var icontag = document.querySelectorAll(".deleteTag");
   var isEditing = false;

   function toggleEditState() {
      let option2 = document.querySelector('.option2');
      let option1 = document.querySelector('.option1');
      if (isEditing) {
         icontag.forEach(function (tag) {
            tag.style.display = "none";
         });
         option1.style.display = "flex"
         option2.style.display = "none"
      } else {

          icontag.forEach(function (tag) {
            tag.style.display = "";
         });
         option2.style.display = "flex"
         option1.style.display = "none"
      }
      isEditing = !isEditing;
   }

   btneditag.addEventListener("click", toggleEditState);
   btnclosetag.addEventListener("click", toggleEditState);

   var selectedTags = [];

    icontag.forEach(icon => {
        icon.addEventListener('click', function(event) {
            event.preventDefault();

            const anchorTag = this.parentNode;
            const tagName = anchorTag.querySelector('span').textContent;

            const tagIndex = selectedTags.indexOf(tagName);

            if (tagIndex !== -1) {
                selectedTags.splice(tagIndex, 1); 
            } else {
                selectedTags.push(tagName); 
            }

            anchorTag.parentNode.removeChild(anchorTag);
        });
    });
      btnsavetag.addEventListener('click', function() {
         $.ajax({
                  url: "cmspages/cmsmain/commons/delete_tags.php", 
                  type: "post",
                  dataType: "json",          
                  data: { tags: selectedTags },
                  success: function (response) {
                        if(response > 0){
                           alert("Xóa thành công " + response + " thẻ");
                           location.reload(); 
                        }
                  },
                  error: function (xhr, status, error) {
                     console.error(xhr.responseText);
                     alert("Ajax request failed!");
                  }
         });
      });

</script>