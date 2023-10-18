<?php
global $conn;
   include_once './function.php';
   
if (isset($_POST['submit'])) {
   
   $Ho_ten = $_POST["Ho_ten"];
   $E_mail = $_POST["E_mail"];
   $So_dien_thoai = $_POST["So_dien_thoai"];
   $Noi_dung = $_POST["Noi_dung"];
      //insert dữ liệu
      $sql = "INSERT INTO tb_lienhe (Ho_ten, E_mail, So_dien_thoai, Noi_dung, Ngay_lienhe) 
      VALUES ('$Ho_ten', '$E_mail', '$So_dien_thoai', '$Noi_dung',NOW())";
      mysqli_query($conn, $sql);
      $message[] = 'liên hệ thành công!';
      if(isset($message)){
         foreach($message as $message){
            echo '
            <div class="message form">
               <span style="color: green">'.$message.'</span>
               <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
            </div>
            ';
         }
      }     
}
?>

<section class="contact">

   <div class="row">

      <div class="image">
         <img src="images/contact-img.svg" alt="">
      </div>
      <?php
      if($id_taikhoan != ""){
         $tai_khoan= GetAccountById($id_taikhoan);
     
       ?>
      <form action="" method="post">
         <h3>Thông tin liên hệ</h3>
         <input type="text" placeholder="Họ và tên" name="Ho_ten" required maxlength="50" class="box" value="<?php echo $tai_khoan['ten_hien_thi'];?>">
         <input type="email" placeholder="E-Mail" name="E_mail" required maxlength="50" class="box" value="<?php echo $tai_khoan['email'];?>">
         <input type="number" placeholder="Điện thoại" name="So_dien_thoai" required maxlength="50" class="box" value="<?php echo $tai_khoan['sdt'];?>">
         <textarea name="Noi_dung" class="box" placeholder="Nội dung liên hệ" required maxlength="1000" cols="30" rows="10"></textarea>
         <input type="submit" value="Gửi" class="inline-btn" name="submit">
      </form>
      <?php } else{
      ?>
      <form action="" method="post">
         <h3>Thông tin liên hệ</h3>
         <input type="text" placeholder="Họ và tên" name="Ho_ten" required maxlength="50" class="box">
         <input type="email" placeholder="E-Mail" name="E_mail" required maxlength="50" class="box">
         <input type="number" placeholder="Điện thoại" name="So_dien_thoai" required maxlength="50" class="box">
         <textarea name="Noi_dung" class="box" placeholder="Nội dung liên hệ" required maxlength="1000" cols="30" rows="10"></textarea>
         <input type="submit" value="Gửi" class="inline-btn" name="submit">
      </form>
      <?php
      }
       ?>
   </div>

   <div class="box-container">

      <div class="box">
         <i class="fas fa-phone"></i>
         <h3>Số điện thoại</h3>
         <a href="tel:1234567890">09665596666</a>
         <a href="tel:1112223333">01216088833</a>
      </div>
      
      <div class="box">
         <i class="fas fa-envelope"></i>
         <h3>email</h3>
         <a href="mailto:shaikhanas@gmail.com">shaikhanas@gmail.come</a>
         <a href="mailto:anasbhai@gmail.com">anasbhai@gmail.come</a>
      </div>

      <div class="box">
         <i class="fas fa-map-marker-alt"></i>
         <h3>office address</h3>
         <a href="#">flat no. 1, a-1 building, jogeshwari, mumbai, india - 400104</a>
      </div>

   </div>
</section>