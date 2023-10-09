<?php
    //Check session
    function checkLogin(){
        if(!isset($_SESSION['id_taikhoan'])){
            header("location: home.php?title=login");
            return false;
        }
        return true;
    }
    //---Đăng nhập---
    //---Ngọc---
    function login($username, $password){
        GLOBAL $conn;
        $filter_username = mysqli_real_escape_string($conn, $username);
        $filter_password = mysqli_real_escape_string($conn, $password);

        $sql = "SELECT * FROM tb_tai_khoan WHERE tai_khoan = '$filter_username' AND mat_khau = '$filter_password'";
        $query = mysqli_query($conn, $sql);
        if(mysqli_num_rows($query) > 0){
            $row = mysqli_fetch_assoc($query);
            $_SESSION['id_taikhoan'] = $row['id_taikhoan'];
            $_SESSION['tai_khoan'] = $row['tai_khoan'];
            $_SESSION['ten_hien_thi'] = $row['ten_hien_thi'];
            $_SESSION['mat_khau'] = $row['mat_khau'];
            $_SESSION['doi_tuong'] = $row['doi_tuong'];
            $_SESSION['ngay_sinh'] = $row['ngay_sinh'];
            $_SESSION['gioi_tinh'] = $row['gioi_tinh'];
            $_SESSION['sdt'] = $row['sdt'];
            $_SESSION['hinh_anh'] = $row['hinh_anh'];
            return true;
        }
        return false;
    }
    //---Đăng kí---
    //---Ngọc---
    function register($username, $name, $pass, $phone, $bdate, $doi_tuong, $gioi_tinh){
        GLOBAL $conn;
        $filter_id = unique_id();
        $filter_name = mysqli_real_escape_string($conn, $name);
        $filter_username = mysqli_real_escape_string($conn, $username);
        $filter_pass = mysqli_real_escape_string($conn, $pass);
        $filter_phone = mysqli_real_escape_string($conn, $phone);
        $filter_bdate = mysqli_real_escape_string($conn, $bdate);
        $filter_doi_tuong = mysqli_real_escape_string($conn, $doi_tuong);
        $filter_gioi_tinh = mysqli_real_escape_string($conn, $gioi_tinh);
        
        $image = $_FILES['image']['name'];
        $image = mysqli_real_escape_string($conn, $image);
        $ext = pathinfo($image, PATHINFO_EXTENSION);
        $rename = $filter_id.'.'.$ext;
        $image_size = $_FILES['image']['size'];
        $image_tmp_name = $_FILES['image']['tmp_name'];
        $image_folder = 'images/images_user/'.$rename;

        $sql = "SELECT * FROM tb_tai_khoan WHERE tai_khoan = '".$username."'";
        $query = mysqli_query($conn, $sql);
        if(mysqli_num_rows($query) > 0){
            return false;
        } else{
            $sql = "INSERT INTO tb_tai_khoan (tai_khoan, ten_hien_thi, mat_khau, doi_tuong, ngay_sinh, gioi_tinh, sdt, hinh_anh ) 
            VALUES('$filter_username','$filter_name','$filter_pass','$filter_doi_tuong','$filter_bdate','$filter_gioi_tinh','$filter_phone', '$rename')";
            $query = mysqli_query($conn, $sql);
            move_uploaded_file($image_tmp_name, $image_folder);
            return true;
        }
    }
    //---Thêm khóa học---
    //---Phong---
    function addcourses($ten_khoahoc, $mota_khoahoc, $gia_khoahoc, $id_taikhoan){
        GLOBAL $conn;
        $tenKH = mysqli_real_escape_string($conn, $ten_khoahoc);
        $motaKH = mysqli_real_escape_string($conn, $mota_khoahoc);
        $gia = mysqli_real_escape_string($conn, $gia_khoahoc);
        $id_taikhoan = mysqli_real_escape_string($conn, $id_taikhoan);
        $flag = 0; 
        $file = $_FILES['image'];
        if (!empty($file['name'])) {
            $flag = 1;            
            $extension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
            $arr = ["gif", "jpg", "png", "jpeg"];
            if (!in_array($extension, $arr)){
                $message[] = 'File ảnh bìa chỉ nhận đuôi .jpg .jpeg .png .gif';
            }
            else {
                $tenFile = floor(microtime(true) * 1000) . "." .$extension;
            }
        }
        if ($flag == 0) {
            $sql = "INSERT INTO tb_khoa_hoc(ten_khoahoc, id_taikhoan, mota_khoahoc, gia_khoahoc, ngaydang_khoahoc) 
            VALUES('$tenKH', '$id_taikhoan', '$motaKH', '$gia', NOW())";                          
        } elseif ($flag == 1) {

            move_uploaded_file($file['tmp_name'], "images/images_courses/" . $tenFile);
            $sql = "INSERT INTO tb_khoa_hoc(ten_khoahoc, id_taikhoan, anh_khoahoc, mota_khoahoc, gia_khoahoc, ngaydang_khoahoc) 
            VALUES('$tenKH', '$id_taikhoan', '$tenFile', '$motaKH', '$gia', NOW())";            
        }
        mysqli_query($conn, $sql);
        echo '<script>alert("Thêm thành công"); window.location.href = "home.php?title=courses";</script>';
    }
    //---Sửa khóa học---
    //---Phong---
    function editcourses($ten_khoahoc, $mota_khoahoc, $gia_khoahoc, $id_Khoahoc){
        GLOBAL $conn;
        $filter_id = unique_id();
        $tenKH = mysqli_real_escape_string($conn, $ten_khoahoc);
        $motaKH = mysqli_real_escape_string($conn, $mota_khoahoc);
        $gia = mysqli_real_escape_string($conn, $gia_khoahoc);
        $id_Khoahoc = mysqli_real_escape_string($conn, $id_Khoahoc);

        $file = $_FILES['new_image'];
        if (!empty($file['name'])) {
            $flag = 1;            
            $extension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
            $arr = ["gif", "jpg", "png", "jpeg"];
            if (!in_array($extension, $arr)){
                $message[] = 'File ảnh bìa chỉ nhận đuôi .jpg .jpeg .png .gif';
            }
            else {
                $tenFile = floor(microtime(true) * 1000) . "." .$extension;
            }
        }
        if ($flag == 0) {
            $sql = "UPDATE tb_khoa_hoc SET ten_khoahoc='$tenKH', anh_khoahoc='', mota_khoahoc='$motaKH', gia_khoahoc='$gia'
                                            , ngaydang_khoahoc=NOW() WHERE id_Khoahoc=$id_Khoahoc";                      
        } elseif ($flag == 1) {
            move_uploaded_file($file['tmp_name'], "images/images_courses/" . $tenFile);
            $sql = "UPDATE tb_khoa_hoc SET ten_khoahoc='$tenKH', anh_khoahoc='$tenFile', mota_khoahoc='$motaKH', gia_khoahoc='$gia'
                                , ngaydang_khoahoc=NOW() WHERE id_Khoahoc=$id_Khoahoc";            
        }

        mysqli_query($conn, $sql);
        echo '<script>alert("Sửa thành công"); window.location.href = "home.php?title=courses";</script>';
    }
    //---Convert thành tiền tệ việt nam---
    //---Quân---
    function convertToVietnameseCurrency($amount) {
        $currencySymbol = "₫"; // Ký hiệu tiền tệ Việt Nam
        $formattedAmount = number_format($amount, 0, ',', '.');
        return $formattedAmount . ' ' . $currencySymbol;
    }
    //---Thông tin khóa học---
    //---Quân---
    function GetCoursesById($id_Khoahoc) {
        GLOBAL $conn;
        $filter_id_khoahoc = mysqli_real_escape_string($conn, $id_Khoahoc);
        $sql = "SELECT * FROM tb_khoa_hoc WHERE id_khoahoc = '".$filter_id_khoahoc."'";
        $query = mysqli_query($conn, $sql);
        if(mysqli_num_rows($query) > 0){
            $row = mysqli_fetch_assoc($query);
            return $row;
        }
    }

?>