<?php
   if($id_taikhoan == ""){
      header('location:home.php?title=login');
   }

   include_once './function.php';

   if (isset($_GET['idU'])) {
      $idU = $_GET['idU'];
      $row = GetAccountById($idU);   
   }
   $edit_enable = "";
   if(isset($_POST['submit'])){

      $id = unique_id();
      $name = trim($_POST['name']);
      // $username =  trim($_POST['username']);
      // $pass = trim($_POST['pass']);
      // $cfpass = trim($_POST['cfpass']);
      $phone = $_POST['phone'];
      $bdate = $_POST['bdate'];
      $doi_tuong = 1;
      $gioi_tinh = $_POST['sex'];
      $sdt=$_POST['phone'];
      if(UpdateInfor($idU, $name, $bdate, $gioi_tinh,$sdt)){
         echo "<script>alert('Thay đổi thành công!');location.href = location.href;</script>";
     }
     else{
      echo "<script>alert('Thay đổi không thành công!')</script>";
     }
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
      <input type="text" name="name" placeholder="Nhập tên hiển thị" maxlength="50"  class="box" value="<?php echo $row["ten_hien_thi"] ?>"<?php if(!$edit_enable){echo "disabled";}?>>
      <p>Giới tính<span></span></p>
       <select name="sex" class="box" id="sexSelect" required <?php if(!$edit_enable){echo "disabled";}?>>
               <option value="0">Nam</option>
               <option value="1">Nữ</option>
               <option value="2">Khác</option>
      </select>
      <p>Số điện thoại<span></span></p>
      <input type="number" name="phone" placeholder="Nhập số điện thoại" maxlength="20" required class="box" value="<?php echo $row["sdt"] ?>"<?php if(!$edit_enable){echo "disabled";}?>>
      <p>Ngày sinh <span></span></p>
      <input type="date" name="bdate" maxlength="20" required class="box" value="<?php echo $row["ngay_sinh"] ?>"<?php if(!$edit_enable){echo "disabled";}?>>
      <input type="submit" class="btn btn-warning" name="btn-edit" id="btn-edit" value="Chỉnh sửa.">
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
<script>
    $(document).ready(function(){
        $('#btn-edit').click(function(event){
            event.preventDefault(); // Ngăn chặn hành động mặc định của nút submit
            $('input').prop('disabled', false); // Tắt thuộc tính disabled của các trường input
            $('#sexSelect').prop('disabled', false);
            $('#btn-edit').prop('disabled', true); // Tắt nút "btn-edit"
            $('#btn-save').prop('hidden', false); // Tắt thuộc tính disabled của các trường input
        });
    });
</script>