<?php
    //Check session
    function checkLogin(){
        if(!isset($_SESSION['id_taikhoan'])){
            header("location: home.php?title=login");
            return false;
        }
        return true;
    }
    //login
    function login($username, $password){
        GLOBAL $conn;
        $filter_username = mysqli_real_escape_string($conn, $username);
        $filter_password = mysqli_real_escape_string($conn, $password);

        $sql = "select * from tb_tai_khoan where tai_khoan = '$filter_username' and mat_khau = '$filter_password'";
        $query = mysqli_query($conn, $sql);
        if(mysqli_num_rows($query) > 0){
            while ($row = mysqli_fetch_assoc($query)){
                $_SESSION['id_taikhoan'] = $row['id_taikhoan'];
                $_SESSION['tai_khoan'] = $row['tai_khoan'];
                $_SESSION['ten_hien_thi'] = $row['ten_hien_thi'];
                $_SESSION['mat_khau'] = $row['mat_khau'];
                $_SESSION['doi_tuong'] = $row['doi_tuong'];
                $_SESSION['ngay_sinh'] = $row['ngay_sinh'];
                $_SESSION['gioi_tinh'] = $row['gioi_tinh'];
                $_SESSION['sdt'] = $row['sdt'];
                $_SESSION['hinh_anh'] = $row['hinh_anh'];
            } 
            return true;
        }
        return false;
    }
    //register
    function register($username, $name, $pass, $phone, $bdate, $doi_tuong, $gioi_tinh, $image){
        GLOBAL $conn;
        $filter_id = unique_id();
        $filter_name = mysqli_real_escape_string($conn, $name);
        $filter_username = mysqli_real_escape_string($conn, $_POST['username']);
        $filter_pass = mysqli_real_escape_string($conn, $pass);
        $filter_phone = mysqli_real_escape_string($conn, $phone);
        $filter_bdate = mysqli_real_escape_string($conn, $bdate);
        $filter_doi_tuong = mysqli_real_escape_string($conn, $doi_tuong);;
        $filter_gioi_tinh = mysqli_real_escape_string($conn, $gioi_tinh);;
        $filter_image = mysqli_real_escape_string($conn, $image);
        $ext = pathinfo($image, PATHINFO_EXTENSION);
        $rename = unique_id().'.'.$ext;
        $image_size = $_FILES['image']['size'];
        $image_tmp_name = $_FILES['image']['tmp_name'];
        $image_folder = 'uploaded_files/'.$rename;

        $sql = "select * from tb_tai_khoan where tai_khoan = '".$username."'";
        $query = mysqli_query($conn, $sql);
        if(mysqli_num_rows($query) > 0){
            return false;
        } else{
            $sql = "insert into tb_tai_khoan (tai_khoan, ten_hien_thi, mat_khau, doi_tuong, ngay_sinh, gioi_tinh, sdt, hinh_anh ) 
            values('$filter_username','$filter_name','$filter_pass','$filter_doi_tuong','$filter_bdate','$filter_gioi_tinh','$filter_phone', '$filter_image')";
            $query = mysqli_query($conn, $sql);
            move_uploaded_file($image_tmp_name, $image_folder);
            return true;
        }
    }
?>