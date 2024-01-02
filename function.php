<?php
    require('mail/send_mail.php');
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
    function login($email, $password){
        GLOBAL $conn;
        $filter_email = mysqli_real_escape_string($conn, $email);
        $filter_password = mysqli_real_escape_string($conn, $password);

        $sql = "SELECT * FROM tb_tai_khoan WHERE email = '$filter_email' AND mat_khau = '$filter_password'";
        $query = mysqli_query($conn, $sql);
        if(mysqli_num_rows($query) > 0){
            $row = mysqli_fetch_assoc($query);
            $_SESSION['id_taikhoan'] = $row['id_taikhoan'];
            $_SESSION['email'] = $row['email'];
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
    //---Đăng nhập CMS---
    //---Ngọc---
    function loginCMS($email, $password){
        GLOBAL $conn;
        $filter_email = mysqli_real_escape_string($conn, $email);
        $filter_password = mysqli_real_escape_string($conn, $password);

        $sql = "SELECT * FROM tb_cms_tai_khoan WHERE email = '$filter_email' AND mat_khau = '$filter_password'";
        $query = mysqli_query($conn, $sql);
        if(mysqli_num_rows($query) > 0){
            $row = mysqli_fetch_assoc($query);
            $_SESSION['cms_id_tai_khoan'] = $row['id_cms_taikhoan'];
            $_SESSION['cms_email'] = $row['email'];
            $_SESSION['cms_ten_hien_thi'] = $row['ten_hien_thi'];
            $_SESSION['cms_mat_khau'] = $row['mat_khau'];
            $_SESSION['cms_doi_tuong'] = $row['doi_tuong'];
            $_SESSION['cms_ngay_sinh'] = $row['ngay_sinh'];
            $_SESSION['cms_gioi_tinh'] = $row['gioi_tinh'];
            $_SESSION['cms_sdt'] = $row['sdt'];
            $_SESSION['cms_hinh_anh'] = $row['hinh_anh'];
            return true;
        }
        return false;
    }
    //---Đăng kí---
    //---Ngọc---
    function register($email, $name, $pass, $phone, $bdate, $doi_tuong, $gioi_tinh){
        GLOBAL $conn;
        $filter_id = unique_id();
        $filter_name = mysqli_real_escape_string($conn, $name);
        $filter_email = mysqli_real_escape_string($conn, $email);
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

        $sql = "SELECT * FROM tb_tai_khoan WHERE email = '".$filter_email."'";
        $query = mysqli_query($conn, $sql);
        $arr = ["gif", "jpg", "png", "jpeg"];
        $flag = 0;
        if (!in_array($ext, $arr)) {
            $flag = 1;
        }else{
            if(mysqli_num_rows($query) > 0){
                $flag = 2;
            } else{
                $sql = "INSERT INTO tb_tai_khoan (email, ten_hien_thi, mat_khau, doi_tuong, ngay_sinh, gioi_tinh, sdt, hinh_anh ) 
                VALUES('$filter_email','$filter_name','$filter_pass','$filter_doi_tuong','$filter_bdate','$filter_gioi_tinh','$filter_phone', '$rename')";
                $query = mysqli_query($conn, $sql);
                move_uploaded_file($image_tmp_name, $image_folder);
                $flag = 0;
            }
        }
        
        return $flag;
    }
    //---Đăng kí CMS---
    //---Ngọc---
    function registerCMS($email, $name, $pass, $phone, $bdate, $doi_tuong, $gioi_tinh){
        GLOBAL $conn;
        $filter_id = unique_id();
        $filter_name = mysqli_real_escape_string($conn, $name);
        $filter_email = mysqli_real_escape_string($conn, $email);
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
        $image_folder = '../../images/images_user/'.$rename;

        $sql = "SELECT * FROM tb_cms_tai_khoan WHERE email = '".$filter_email."'";
        $arr = ["gif", "jpg", "png", "jpeg"];
        $flag = 0;
        $query = mysqli_query($conn, $sql);
        if (!in_array($ext, $arr)) {
            $flag = 1;
        }else{
            if(mysqli_num_rows($query) > 0){
                $flag = 2;
            } else{
                $sql = "INSERT INTO tb_cms_tai_khoan (email, ten_hien_thi, mat_khau, doi_tuong, ngay_sinh, gioi_tinh, sdt, hinh_anh ) 
                VALUES('$filter_email','$filter_name','$filter_pass','$filter_doi_tuong','$filter_bdate','$filter_gioi_tinh','$filter_phone', '$rename')";
                $query = mysqli_query($conn, $sql);
                move_uploaded_file($image_tmp_name, $image_folder);
                $flag = 0;
            }
        }
        return $flag;

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
    function GetAccountById($id_taikhoan) {
        GLOBAL $conn;
        $filter_id_taikhoan = mysqli_real_escape_string($conn, $id_taikhoan);
        $sql = "SELECT * FROM tb_tai_khoan WHERE tb_tai_khoan.id_taikhoan = $filter_id_taikhoan";
        $query = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($query);
        return $row;
    }
    //---Thông tin khóa học---
    //---Quân---
    function GetCoursesById($id_Khoahoc) {
        GLOBAL $conn;
        $filter_id_khoahoc = mysqli_real_escape_string($conn, $id_Khoahoc);
        $sql = "SELECT tb_khoa_hoc.*, tb_cms_tai_khoan.hinh_anh, tb_cms_tai_khoan.ten_hien_thi 
        FROM tb_khoa_hoc 
        JOIN tb_cms_tai_khoan ON tb_khoa_hoc.id_taikhoan = tb_cms_tai_khoan.id_cms_taikhoan
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
        $sql = "SELECT tb_khoa_hoc.*, tb_cms_tai_khoan.hinh_anh, tb_cms_tai_khoan.ten_hien_thi
                FROM tb_khoa_hoc 
                JOIN tb_cms_tai_khoan ON tb_khoa_hoc.id_taikhoan = tb_cms_tai_khoan.id_cms_taikhoan
                WHERE ten_khoahoc LIKE '%{$key_word}%'";
        $query = mysqli_query($conn, $sql);
        return $query;
    }
    function CMS_Search_Courses($key_word, $id_taikhoan) {
        GLOBAL $conn;
        $key_word = mysqli_real_escape_string($conn, $key_word);
        $sql = "SELECT tb_khoa_hoc.*, tb_cms_tai_khoan.hinh_anh, tb_cms_tai_khoan.ten_hien_thi
                FROM tb_khoa_hoc 
                JOIN tb_cms_tai_khoan ON tb_khoa_hoc.id_taikhoan = tb_cms_tai_khoan.id_cms_taikhoan
                WHERE ten_khoahoc LIKE '%{$key_word}%' AND tb_cms_tai_khoan.id_cms_taikhoan = $id_taikhoan";
        $query = mysqli_query($conn, $sql);
        return $query;
    }
    //---Tìm kiếm bài viết theo từ khóa---
    //---Quân---
    function Search_Post($key_word) {
        GLOBAL $conn;
        $key_word = mysqli_real_escape_string($conn, $key_word);
        $sql = "SELECT tb_baiviet_tags.*, tb_bai_viet.*,tb_tag.ten_tag, tb_cms_tai_khoan.ten_hien_thi, tb_cms_tai_khoan.hinh_anh
                FROM tb_baiviet_tags 
                JOIN tb_bai_viet ON tb_bai_viet.id_baiviet = tb_baiviet_tags.id_baiviet
                JOIN tb_cms_tai_khoan ON tb_bai_viet.id_taikhoan = tb_cms_tai_khoan.id_cms_taikhoan
                JOIN tb_tag ON tb_tag.id_tag = tb_baiviet_tags.id_tag
                WHERE ten_baiviet LIKE '%{$key_word}%'";
        $query = mysqli_query($conn, $sql); 
        return $query;

    }
    function CMS_Search_Post($key_word, $id_taikhoan) {
        GLOBAL $conn;
        $key_word = mysqli_real_escape_string($conn, $key_word);
        $sql = "SELECT tb_baiviet_tags.*, tb_bai_viet.*,tb_tag.ten_tag, tb_cms_tai_khoan.ten_hien_thi, tb_cms_tai_khoan.hinh_anh
                FROM tb_baiviet_tags 
                JOIN tb_bai_viet ON tb_bai_viet.id_baiviet = tb_baiviet_tags.id_baiviet
                JOIN tb_cms_tai_khoan ON tb_bai_viet.id_taikhoan = tb_cms_tai_khoan.id_cms_taikhoan
                JOIN tb_tag ON tb_tag.id_tag = tb_baiviet_tags.id_tag
                WHERE ten_baiviet LIKE '%{$key_word}%' AND tb_cms_tai_khoan.id_cms_taikhoan = $id_taikhoan";
        $query = mysqli_query($conn, $sql); 
        return $query;

    }
    //---Tìm kiếm bài viết theo tag---
    //---Quân---
    function Search_Tag($key_word) {
        GLOBAL $conn;
        $key_word = mysqli_real_escape_string($conn, $key_word);
        $sql = "SELECT tb_baiviet_tags.*, tb_bai_viet.*,tb_tag.ten_tag, tb_cms_tai_khoan.ten_hien_thi, tb_cms_tai_khoan.hinh_anh
                FROM tb_baiviet_tags 
                JOIN tb_bai_viet ON tb_bai_viet.id_baiviet = tb_baiviet_tags.id_baiviet
                JOIN tb_cms_tai_khoan ON tb_bai_viet.id_taikhoan = tb_cms_tai_khoan.id_cms_taikhoan
                JOIN tb_tag ON tb_tag.id_tag = tb_baiviet_tags.id_tag
                WHERE tb_tag.ten_tag LIKE '%{$key_word}%'";
        $query = mysqli_query($conn, $sql); 
        return $query;

    }
    function CMS_Search_Tag($key_word, $id_taikhoan) {
        GLOBAL $conn;
        $key_word = mysqli_real_escape_string($conn, $key_word);
        $sql = "SELECT tb_baiviet_tags.*, tb_bai_viet.*,tb_tag.ten_tag, tb_cms_tai_khoan.ten_hien_thi, tb_cms_tai_khoan.hinh_anh
                FROM tb_baiviet_tags 
                JOIN tb_bai_viet ON tb_bai_viet.id_baiviet = tb_baiviet_tags.id_baiviet
                JOIN tb_cms_tai_khoan ON tb_bai_viet.id_taikhoan = tb_cms_tai_khoan.id_cms_taikhoan
                JOIN tb_tag ON tb_tag.id_tag = tb_baiviet_tags.id_tag
                WHERE tb_tag.ten_tag LIKE '%{$key_word}%' AND tb_cms_tai_khoan.id_cms_taikhoan = $id_taikhoan";
        $query = mysqli_query($conn, $sql); 
        return $query;

    }
    //---Lấy bài giảng theo id---
    //---Quân---
    function GetLessonById($id_lesson){
        GLOBAL $conn;
        $filter_id_lesson = mysqli_real_escape_string($conn, $id_lesson);
        $sql = "SELECT tb_hoc_lieu.*, tb_cms_tai_khoan.hinh_anh, tb_cms_tai_khoan.ten_hien_thi 
        FROM tb_hoc_lieu
        JOIN tb_khoa_hoc ON tb_khoa_hoc.id_khoahoc = tb_hoc_lieu.id_khoahoc
        JOIN tb_cms_tai_khoan ON tb_cms_tai_khoan.id_cms_taikhoan = tb_khoa_hoc.id_taikhoan
        WHERE id_hoclieu = $filter_id_lesson";

        $query = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($query);
        return $row;
    }
    //---Lấy số lượng bài giảng trong khóa học theo id---
    //---Quân---
    function GetCountLessonByCourses($id_Khoahoc){
        GLOBAL $conn;
        $filter_id_courses= mysqli_real_escape_string($conn, $id_Khoahoc);
        $sql = "SELECT * FROM tb_hoc_lieu WHERE id_khoahoc = '$filter_id_courses'";
        $query = mysqli_query($conn, $sql);
        $row = mysqli_num_rows($query);
        return $row;
    }
    //---Lấy số lượng lượt thích trong khóa học theo id---
    //---Quân---
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
    //---Lấy số lượng lượt thích trong bình luận theo id---
    //---Quân---
    function GetCountLikeByComment($id_comment){
        GLOBAL $conn;
        $filter_id_comment = mysqli_real_escape_string($conn, $id_comment);
        $sql = "SELECT * FROM tb_thichbinhluan 
        JOIN tb_binh_luan ON tb_binh_luan.id_binhluan = tb_thichbinhluan.id_binhluan
        WHERE tb_binh_luan.id_binhluan = '$filter_id_comment'";
        $query = mysqli_query($conn, $sql);
        $row = mysqli_num_rows($query);
        return $row;
    }
    //---Lấy số lượng bình luận trong bài viết theo id---
    //---Quân---
    function GetCommentByPost($id_post){
        GLOBAL $conn;
        $filter_id_post= mysqli_real_escape_string($conn, $id_post);
        $sql = "SELECT * FROM tb_binh_luan
        JOIN tb_bai_viet ON tb_bai_viet.id_baiviet = tb_binh_luan.id_baiviet
        WHERE tb_bai_viet.id_baiviet = '$filter_id_post'";
        $query = mysqli_query($conn, $sql);
        return $query;
    }
    //---Lấy số lượng bình luận trong bài viết theo id---
    //---Quân---
    function GetPostById($id_post){
        GLOBAL $conn;
        $filter_id_post= mysqli_real_escape_string($conn, $id_post);
        $sql = "SELECT * FROM tb_bai_viet WHERE tb_bai_viet.id_baiviet = '$filter_id_post'";
        $query = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($query);
        return $row;
    }
    //---Lấy hóa đơn theo mã hóa đơn---
    //---Quân---
    function GetOrderByCode($code_order){
        GLOBAL $conn;
        $filter_code_order = mysqli_real_escape_string($conn, $code_order);
        $sql = "SELECT tb_hoadon.*, tb_tai_khoan.*, tb_khoa_hoc.*
        FROM tb_hoadon 
        JOIN tb_tai_khoan ON tb_tai_khoan.id_taikhoan = tb_hoadon.id_taikhoan
        JOIN tb_khoa_hoc ON tb_khoa_hoc.id_khoahoc = tb_hoadon.id_khoahoc
        WHERE tb_hoadon.ma_hoadon  = '$filter_code_order'";
        $query = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($query);
        return $row;
    }
    //---Lấy hóa đơn theo id---
    //---Quân---
    function GetOrderById($Id_order){
        GLOBAL $conn;
        $filter_Id_order = mysqli_real_escape_string($conn, $Id_order);
        $sql = "SELECT tb_hoadon.*, tb_tai_khoan.*, tb_khoa_hoc.*, tb_cms_tai_khoan.ten_hien_thi AS ten_nguoi_dang, tb_cms_tai_khoan.hinh_anh AS anh_nguoi_dang
        FROM tb_hoadon 
        JOIN tb_tai_khoan ON tb_tai_khoan.id_taikhoan = tb_hoadon.id_taikhoan
        JOIN tb_khoa_hoc ON tb_khoa_hoc.id_khoahoc = tb_hoadon.id_khoahoc
        JOIN tb_cms_tai_khoan ON tb_khoa_hoc.id_taikhoan = tb_cms_tai_khoan.id_cms_taikhoan
        WHERE tb_hoadon.id_hoadon  = '$filter_Id_order'";
        $query = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($query);
        return $row;
    }
    //---Xóa thẻ hoặc nhiểu thẻ---
    //---Quân---
    function deleteTags($tags) {
        GLOBAL $conn;
        $deletedCount = 0;  
        foreach ($tags as $name_Tag) {
            $filter_name_Tag = mysqli_real_escape_string($conn, $name_Tag);
            $sql = "DELETE FROM tb_tag WHERE tb_tag.ten_tag = '$filter_name_Tag'";
            $query = mysqli_query($conn, $sql); 
            $deletedCount += mysqli_affected_rows($conn);
        }
    
        return $deletedCount;
    }
    //---Update trạng thái thanh toán cho hóa đơn---
    //---Quân---
    function UpdateStatusOrder($id_order, $status, $id_user, $id_courses) {
        GLOBAL $conn;
        $filter_id_order = mysqli_real_escape_string($conn, $id_order);
        $filter_status = mysqli_real_escape_string($conn, $status);
        $filter_id_user = mysqli_real_escape_string($conn, $id_user);
        $filter_id_courses = mysqli_real_escape_string($conn, $id_courses);
        $sql = "UPDATE tb_hoadon SET tb_hoadon.trangthai_thanhtoan='$filter_status' WHERE tb_hoadon.id_hoadon=$filter_id_order";    
        $query = mysqli_query($conn, $sql); 
        if ($query) {    
            if($filter_status == 1){
                $sql_insertBycourses = "INSERT INTO tb_khoahoc_damua(id_khoahoc, id_taikhoan, ngay_mua) 
                                 VALUES('$filter_id_courses', '$filter_id_user', NOW())";   
                $query_insertBycourses = mysqli_query($conn, $sql_insertBycourses); 

                $sql_user = "SELECT * FROM tb_tai_khoan WHERE tb_tai_khoan.id_taikhoan = $filter_id_user";    
                $query_user = mysqli_query($conn, $sql_user); 
                $row = mysqli_fetch_assoc($query_user);

                $mail = new Mailer();
                $tieude = "Xác nhận thanh toán khóa học";
                $noidung = $row['ten_hien_thi'];
                $mailmuakhoahoc = $row['email'];              
                $mail->xacnhanthanhtoan($tieude, $noidung, $mailmuakhoahoc);
            }
            return true;
        } else {
            return false;
        }
    }
    //---Thêm quyền---
    //---Quân---
    function addRole($ten_quyen){
        GLOBAL $conn;
        $filter_ten_quyen = mysqli_real_escape_string($conn, $ten_quyen);
        $sql = "INSERT INTO tb_quyen(ten_quyen) VALUES('$filter_ten_quyen')";     
        $query = mysqli_query($conn, $sql); 
        if($query){
            return true;
        }else{
            return false;
        }
    }
    //---Sửa quyền---
    //---Quân---
    function UpdateRole($ten_quyen, $id_quyen){
        GLOBAL $conn;
        $filter_ten_quyen = mysqli_real_escape_string($conn, $ten_quyen);
        $filter_id_quyen = mysqli_real_escape_string($conn, $id_quyen);

        $sql = "UPDATE tb_quyen SET tb_quyen.ten_quyen='$filter_ten_quyen' WHERE tb_quyen.id_quyen=$filter_id_quyen";     
        $query = mysqli_query($conn, $sql); 
        if($query){
            return true;
        }else{
            return false;
        }
    }
    //---Thêm bài viết
    function addPost($tieu_de, $mo_ta, $noi_dung, $id_tag, $id_taikhoan){
        GLOBAL $conn;
        $filter_id = unique_id();
        $filter_tieu_de = mysqli_real_escape_string($conn, $tieu_de);
        $filter_mo_ta = mysqli_real_escape_string($conn, $mo_ta);
        $filter_noi_dung = mysqli_real_escape_string($conn, $noi_dung);
        $message = []; // Khởi tạo mảng thông báo lỗi
    
        $fileimg = $_FILES['hinhanh_baiviet']['name'];
        if (!empty($fileimg)) {
            $image = mysqli_real_escape_string($conn, $fileimg);
            $ext = pathinfo($image, PATHINFO_EXTENSION);
            $arr = ["gif", "jpg", "png", "jpeg"];
            if (!in_array($ext, $arr)) {
                $message[] = "File ảnh bìa chỉ nhận đuôi .jpg .jpeg .png .gif";
            } else {
                $rename = $filter_id . '.' . $ext;
                $image_tmp_name = $_FILES['hinhanh_baiviet']['tmp_name'];
                $image_folder = '../images/images_post/'.$rename;
                if (move_uploaded_file($image_tmp_name, $image_folder)) {
                    $sql = "INSERT INTO tb_bai_viet (ten_baiviet, mota_baiviet, noidung_baivet, ngaydang_baiviet, id_taikhoan, anh_baiviet, xoa_baiviet) VALUES ('$filter_tieu_de', '$filter_mo_ta', '$filter_noi_dung', NOW(), '$id_taikhoan', '$rename',0)";
                } else {
                    $message[] = "Không thể di chuyển file ảnh";
                }
            }
        } else {
            $sql = "INSERT INTO tb_bai_viet (ten_baiviet, mota_baiviet, noidung_baivet, ngaydang_baiviet, id_taikhoan, xoa_baiviet) VALUES ('$filter_tieu_de', '$filter_mo_ta', '$filter_noi_dung', NOW(), '$id_taikhoan', 0)";
        }
    
        if (empty($message)) {
            if ($conn->query($sql) === TRUE) {
                if ($id_tag != null) {
                    $id_baiviet = $conn->insert_id;
                    $sql = "INSERT INTO tb_baiviet_tags (id_tag, id_baiviet) VALUES ('$id_tag', '$id_baiviet')";
                    $conn->query($sql);
                }
                return true;
            } else {
                return false;
            }
        } else {
            return $message;
        }
    }
    //------ Doi mat khau---------------
    function resetPassword($email, $newpassword){
        GLOBAL $conn;
        $filter_email = mysqli_real_escape_string($conn, $email);
        $filter_newpassword = mysqli_real_escape_string($conn, $newpassword);
        $sql = "update tb_tai_khoan set mat_khau = '".$filter_newpassword."' where email = '".$filter_email."'";
        $query = mysqli_query($conn, $sql);
        if($query){
            return true;
        } else{
            return false;
        }
    }
    function deleteCodeConfirmByemail($email) {
        GLOBAL $conn;
    
        // Chuẩn bị câu truy vấn DELETE
        $sql = "DELETE FROM code_confirm WHERE email = '$email'";
    
        // Thực thi câu truy vấn DELETE
        $query = mysqli_query($conn, $sql);
        
        // Kiểm tra xem câu truy vấn đã thành công hay không
        if($query){
            return true;
        } else{
            return false;
        }
    }
    
    function checkIfPasswordEqualNewPassword($username, $newpassword, $email){
        GLOBAL $conn;
        
        // Lấy thông tin tài khoản từ cơ sở dữ liệu
        $sql = "SELECT password FROM tb_tai_khoan WHERE password = '".$newpassword."' AND email='".$email."'";
        $query = mysqli_query($conn, $sql);
        
        // Kiểm tra số lượng bản ghi trả về
        if(mysqli_num_rows($query) != 0) {
            return true; // Mật khẩu trong cơ sở dữ liệu giống với mật khẩu mới
        } 
        
        return false; // Mật khẩu trong cơ sở dữ liệu không giống với mật khẩu mới
        }
        function getUserInfo($user){
            GLOBAL $conn;
            $filter_user = mysqli_real_escape_string($conn, $user);
            $data = array();
            $sql = "SELECT * FROM tb_tai_khoan WHERE id_taikhoan = '$filter_user'";
            $query = mysqli_query($conn, $sql);
            if(mysqli_num_rows($query) > 0){
                while ($row = mysqli_fetch_assoc($query)) {
                    array_push($data, $row);
                }
            }
            return $data;
        }
        function UpdateInfor($id, $name, $ngaysinh,$gioitinh,$sdt){
            GLOBAL $conn;
            $filter_id = mysqli_real_escape_string($conn, $id);
            $filter_name = mysqli_real_escape_string($conn, $name);
            $filter_ngaysinh = mysqli_real_escape_string($conn, $ngaysinh);
            $filter_gioitinh = mysqli_real_escape_string($conn, $gioitinh);
            $filter_sdt = mysqli_real_escape_string($conn, $sdt);

            echo 		$filter_ngaysinh;
            $sql = "UPDATE tb_tai_khoan SET ten_hien_thi = '$filter_name',  ngay_sinh = '$filter_ngaysinh', gioi_tinh ='$gioitinh', sdt='$sdt' WHERE id_taikhoan = '$filter_id'";
            $query = mysqli_query($conn, $sql);
            if($query){
                return true;
            } else{
                return false;
            }
	}
    
?>