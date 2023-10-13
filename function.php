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
        $sql = "SELECT tb_khoa_hoc.*, tb_tai_khoan.hinh_anh, tb_tai_khoan.ten_hien_thi 
        FROM tb_khoa_hoc 
        JOIN tb_tai_khoan ON tb_khoa_hoc.id_taikhoan = tb_tai_khoan.id_taikhoan
        WHERE id_khoahoc = '".$filter_id_khoahoc."'";
        $query = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($query);
        return $row;
    }
    //---Tìm kiêm khóa học theo từ khóa---
    //---Quân---
    function Search_Courses($key_word) {
        GLOBAL $conn;
        $key_word = mysqli_real_escape_string($conn, $key_word);
        $sql = "SELECT tb_khoa_hoc.*, tb_tai_khoan.hinh_anh, tb_tai_khoan.ten_hien_thi
                FROM tb_khoa_hoc 
                JOIN tb_tai_khoan ON tb_khoa_hoc.id_taikhoan = tb_tai_khoan.id_taikhoan
                WHERE ten_khoahoc LIKE '%{$key_word}%'";
        $query = mysqli_query($conn, $sql);
        return $query;
    }
    //---Tìm kiếm bài viết theo từ khóa---
    //---Quân---
    function Search_Post($key_word) {
        GLOBAL $conn;
        $key_word = mysqli_real_escape_string($conn, $key_word);
        $sql = "SELECT tb_bai_viet.*, tb_tai_khoan.hinh_anh, tb_tai_khoan.ten_hien_thi
                FROM tb_bai_viet 
                JOIN tb_tai_khoan ON tb_bai_viet.id_taikhoan = tb_tai_khoan.id_taikhoan
                WHERE ten_baiviet LIKE '%{$key_word}%'";
        $query = mysqli_query($conn, $sql); 
        return $query;

    }
    //---Lấy danh thẻ tag bởi id bài viết---
    //---Quân---
    function GetTagByIdPost($id_post) {
        GLOBAL $conn;
        $sql = "SELECT tb_tag.ten_tag, tb_tag.id_tag
        FROM tb_bai_viet 
        INNER JOIN tb_baiviet_tags ON tb_bai_viet.id_baiviet = tb_baiviet_tags.id_baiviet
        INNER JOIN tb_tag ON tb_baiviet_tags.id_tag = tb_tag.id_tag
        WHERE tb_bai_viet.id_baiviet = $id_post";     
        $query = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($query);
        return $row;
    }
    //---Tìm kiếm bài viết theo tag---
    //---Quân---
    function Search_Tag($key_word) {
        GLOBAL $conn;
        $key_word = mysqli_real_escape_string($conn, $key_word);
        $sql = "SELECT tb_bai_viet.*, tb_tai_khoan.hinh_anh, tb_tai_khoan.ten_hien_thi
                FROM tb_bai_viet 
                JOIN tb_tai_khoan ON tb_bai_viet.id_taikhoan = tb_tai_khoan.id_taikhoan
                JOIN tb_baiviet_tags ON tb_bai_viet.id_baiviet = tb_baiviet_tags.id_baiviet_tag
                JOIN tb_tag ON tb_baiviet_tags.id_tag = tb_tag.id_tag
                WHERE tb_tag.ten_tag LIKE '%{$key_word}%'";
        $query = mysqli_query($conn, $sql); 
        return $query;

    }

    function GetLessonById($id_lesson){
        GLOBAL $conn;
        $filter_id_lesson = mysqli_real_escape_string($conn, $id_lesson);
        $sql = "SELECT *
        FROM tb_hoc_lieu
        JOIN tb_khoa_hoc ON tb_khoa_hoc.id_khoahoc = tb_hoc_lieu.id_khoahoc
        WHERE id_hoclieu = '".$filter_id_lesson."'";

        $query = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($query);
        return $row;
    }
    function GetCountLessonByCourses($id_Khoahoc){
        GLOBAL $conn;
        $filter_id_courses= mysqli_real_escape_string($conn, $id_Khoahoc);
        $sql = "SELECT * FROM tb_hoc_lieu WHERE id_khoahoc = '$filter_id_courses'";
        $query = mysqli_query($conn, $sql);
        $row = mysqli_num_rows($query);
        return $row;
    }
    function GetCountLikeByPost($id_post){
        GLOBAL $conn;
        $filter_id_post= mysqli_real_escape_string($conn, $id_post);
        $sql = "SELECT * FROM tb_thichbaiviet 
        JOIN tb_bai_viet ON tb_bai_viet.id_baiviet = tb_thichbaiviet.id_baiviet
        WHERE tb_bai_viet.id_baiviet = '$filter_id_post'";
        $query = mysqli_query($conn, $sql);
        $row = mysqli_num_rows($query);
        return $row;
    }
    function GetComentByPost($id_post){
        GLOBAL $conn;
        $filter_id_post= mysqli_real_escape_string($conn, $id_post);
        $sql = "SELECT * FROM tb_binh_luan
        JOIN tb_bai_viet ON tb_bai_viet.id_baiviet = tb_binh_luan.id_baiviet
        WHERE tb_bai_viet.id_baiviet = '$filter_id_post'";
        $query = mysqli_query($conn, $sql);
        return $query;
    }
?>