<?php
    session_start(); 
    include "../components/connect.php";
    include "../function.php";
    $id_taikhoan = $_SESSION['id_taikhoan'];
    $idKH = $_GET['courses'];
    $sql = "SELECT * FROM tb_khoa_hoc WHERE id_khoahoc = '$idKH'";
    $query = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($query);
    $ma_hoadon = rand(0, 9999);
    $phuongthuc_thanhtoan = $_GET['method'];
    $so_tien = $row['gia_khoahoc'];
    $insert_order = "INSERT INTO tb_hoadon(ma_hoadon, id_taikhoan, id_khoahoc, ngay_mua, so_tien, phuongthuc_thanhtoan)
                     VALUE ('$ma_hoadon', '$id_taikhoan', '$idKH', NOW(), '$so_tien', $phuongthuc_thanhtoan, 0)";
    $order_query = mysqli_query($conn, $insert_order);

    if($phuongthuc_thanhtoan == 2){
        $vnp_Amount = $_GET['vnp_Amount'];
        $vnp_BankCode = $_GET['vnp_BankCode'];
        $vnp_BankTranNo = $_GET['vnp_BankTranNo'];
        $vnp_CardType = $_GET['vnp_CardType'];
        $vnp_OrderInfo = $_GET['vnp_OrderInfo'];
        $vnp_PayDate = $_GET['vnp_PayDate'];
        $vnp_TmnCode = $_GET['vnp_TmnCode'];
        $vnp_TransactionNo = $_GET['vnp_TransactionNo'];
        $insert_vnpay = "INSERT INTO tb_vnpay(so_tien_vnpay, bankcode_vnpay, banktrano_vnpay, cardtype_vnpay, orderinfo_vnpay, paydate_vnpay, tmncode_vnpay, transactinono_vnpay, ma_hoadon)
        VALUE ('$vnp_Amount', '$vnp_BankCode', '$vnp_BankTranNo', '$vnp_CardType', '$vnp_OrderInfo', '$vnp_PayDate', '$vnp_TmnCode', '$vnp_TransactionNo', '$ma_hoadon')";
        $order_vnpay = mysqli_query($conn, $insert_vnpay);

    }
    
    header("location:thankyou.php?code_order=$ma_hoadon");

?>
