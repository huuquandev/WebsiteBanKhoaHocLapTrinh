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
    $insert_order = "INSERT INTO tb_hoadon(ma_hoadon, id_taikhoan, id_khoahoc, ngay_mua, so_tien, phuongthuc_thanhtoan, trangthai_thanhtoan)
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
    if($phuongthuc_thanhtoan == 3){
        $momo_partner_code = $_GET['partnerCode'];
        $momo_order_id = $_GET['orderId'];
        $momo_amount = $_GET['amount'];
        $momo_order_info = $_GET['orderInfo'];
        $momo_order_type = $_GET['orderType'];
        $momo_trans_id = $_GET['transId'];
        $momo_pay_type = $_GET['payType'];
        $insert_momo = "INSERT INTO tb_momo(partner_code, order_id, amount, order_info, order_type, trans_id, pay_type, ma_hoadon)
                             VALUE ('$momo_partner_code', '$momo_order_id', '$momo_amount', '$momo_order_info', '$momo_order_type', '$momo_trans_id', '$momo_pay_type', '$ma_hoadon')";
        $order_momo = mysqli_query($conn, $insert_momo);

    }
    header("location:thankyou.php?code_order=$ma_hoadon");

?>
