<?php 
if($id_taikhoan == ""){
    header('location:home.php?title=login');
}
include_once "function.php";
$new_password = "";
$confirm_password = "";
$warning = "";
if(isset($_POST['btn'])){
    // $user = $_SESSION['id'];
    $old_password = trim($_POST['old_password']);
    $new_password = trim($_POST['new_password']);
    $confirm_password = trim($_POST['confirm_password']);
    $data=getUserInfo($id_taikhoan);
    if (!empty($data) && $old_password == $data[0]['mat_khau']){
        if($old_password==$new_password){
            echo "<script>alert('Mật khẩu cũ và mật khẩu mới không được trùng nhau')</script>";
        }else{
            if(!empty($new_password)|| !empty($confirm_password)){
                if($new_password==$confirm_password){
                    $email= $_SESSION['email'];
                    // echo $email;
                    if(resetPassword($email, $new_password)){
                        echo "<script>alert('Đổi mật khẩu thành công')</script>";
                    }
                    else{
                        echo "<script>alert('Đổi mật khẩu không thành công')</script>";
                    }
                }else{
                    echo "<script>alert('Nhập mật khẩu không khớp')</script>";
                }
            }else{
                echo "<script>alert('Nhập vào nhanh lên!!! ')</script>";
            }

        }
  
    }else{
        echo "<script>alert('Nhập sai mật khẩu cũ!!! ')</script>";
    }

}
?>

<section class="editprofile">
<h1 class="heading">Đổi mật khẩu</h1>

<section class="form-container" style="min-height: calc(100vh - 19rem);">

 <form class="register" action="" method="post" enctype="multipart/form-data">
     <h3>Thông tin mật khẩu</h3>

     <label for="current_password">Mật khẩu cũ:</label>
     <input type="password" name="old_password" id="old_password" placeholder="Nhập mật khẩu cũ" maxlength="20"  class="box" required>
     <label for="new_password">Mật khẩu mới:</label>
     <input type="password" name="new_password" id="new_password" placeholder="Nhập mật khẩu mới" maxlength="20"  class="box" required>
     <label for="confirm_password">Xác nhận mật khẩu:</label>
     <input type="password" name="confirm_password" id="confirm_password" placeholder="Xác nhận mật khẩu mới" maxlength="20"  class="box" required>
     

     <input type="submit" name="btn" id="btn" value="Lưu lại" class="btn">
 </form>
 <p style="color:blue">
             <?php 
                 if(!empty($warning)){
                     echo $warning;
                 }
             ?>
         </p>

</section>

</section>