<?php
   if($id_taikhoan == ""){
      header('location:../cms/cmspages/cms_login.php');
   }
   include_once './function.php';

   if (isset($_GET['idU'])) {
      $idU = $_GET['idU'];
      $row = GetAccountById($idU);   
   }

   if(isset($_POST['submit'])){

      $id = unique_id();
      $name = trim($_POST['name']);
      $username =  trim($_POST['username']);
      $phone = $_POST['phone'];
      $bdate = $_POST['bdate'];
      $doi_tuong = 1;
      $gioi_tinh = $_POST['sex'];
   }

   if(isset($message)){
      foreach($message as $message){
         echo '
         <div class="message form">
            <span>'.$message.'</span>
            <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
         </div>
         ';
      }
   }
   
?>
<section class="editprofile">
   <h1 class="heading">Chỉnh sửa hồ sơ</h1>

   <section class="form-container" style="min-height: calc(100vh - 19rem);">

   <form class="register" action="" method="post" enctype="multipart/form-data">
      <h3>Thông tin tài khoản</h3>
      <p>Tên hiển thị</p>
      <input type="text" name="name" placeholder="Nhập tên hiển thị" maxlength="50"  class="box" value="<?php echo $row["ten_hien_thi"] ?>">
      <p>Giới tính<span></span></p>
       <select name="sex" class="box" id="sexSelect" required>
               <option value="0">Nam</option>
               <option value="1">Nữ</option>
               <option value="2">Khác</option>
      </select>
      <p>Số điện thoại<span></span></p>
      <input type="number" name="phone" placeholder="Nhập số điện thoại" maxlength="20" required class="box" value="<?php echo $row["sdt"] ?>">
      <p>Ngày sinh <span></span></p>
      <input type="date" name="bdate" maxlength="20" required class="box" value="<?php echo $row["ngay_sinh"] ?>">
      <p>Ảnh đại diện <span></span></p>
      <input type="file" name="image" accept="image/*" class="box">
      <input type="submit" name="submit" value="Lưu lại" class="btn">
   </form>

   </section>

</section>

<?php
   $gender = $row["gioi_tinh"];

   // Sử dụng PHP để tạo mã JavaScript với giá trị giới tính
   echo '<script>';
   echo 'var gender = ' . json_encode($gender) . ';';
   echo 'var selectElement = document.getElementById("sexSelect");';
   echo 'for (var i = 0; i < selectElement.options.length; i++) {';
   echo '    if (selectElement.options[i].value == gender) {';
   echo '        selectElement.selectedIndex = i;';
   echo '        break;';
   echo '    }';
   echo '}';
   echo '</script>';
?>