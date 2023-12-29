<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/tailwindcss-colors.css">
    <link rel="stylesheet" href="../css/style.css">
    <title>Thanh toán</title>
</head>
<body>
    
    <!-- start: Payment -->
    <?php
    include "../components/connect.php";
    include "../function.php";
    $idKH = $_GET['courses'];
        $sql = "SELECT * FROM tb_khoa_hoc WHERE id_khoahoc = '$idKH'";
        $query = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($query);
    ?>
    <section class="payment-section">
        <div class="container">
            <div class="payment-wrapper">
                <div class="payment-left">
                    <div class="payment-header">
                        <div class="payment-header-icon"><i class="ri-flashlight-fill"></i></div>
                        <div class="payment-header-title">Thông tin thanh toán</div>
                        <p class="payment-header-description">Thanh toán khóa học <?=$row['ten_khoahoc']?></p>
                    </div>
                    <div class="payment-content">
                        <div class="payment-body">
                            <div class="payment-plan">
                                <div class="payment-plan-type">
                                    <img src="../images/1697012521337.png" class="imagesCourses"  alt="">
                                </div>
                                <div class="payment-plan-info">
                                    <div class="payment-plan-info-name"><?=$row['ten_khoahoc']?></div>
                                    <div class="payment-plan-info-price"><?php echo convertToVietnameseCurrency($row['gia_khoahoc']); ?></div>
                                </div>
                            </div>
                            <div class="payment-summary">
                                <div class="payment-summary-item">
                                    <div class="payment-summary-name">Giá khóa học</div>
                                    <div class="payment-summary-price"><?php echo convertToVietnameseCurrency($row['gia_khoahoc']); ?></div>
                                </div>
                                <div class="payment-summary-item">
                                    <div class="payment-summary-name">Giảm giá</div>
                                    <div class="payment-summary-price">0</div>
                                </div>
                                <div class="payment-summary-divider"></div>
                                <div class="payment-summary-item payment-summary-total">
                                    <div class="payment-summary-name">Tổng</div>
                                    <div class="payment-summary-price"><?php echo convertToVietnameseCurrency($row['gia_khoahoc']); ?></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="payment-right">
                    <div action="" class="payment-form">
                        <h1 class="payment-title">Phương thức thanh toán</h1>
                        <div class="payment-method">
                            <form action="payment_momo.php"  class="payment-method-item" method="POST" target="_blank" enctype="application/x-www-form-urlencoded">
                                <button type="submit"><img src="../images/Logo-MoMo-Square.webp" alt=""></button>
                            </form>
                            <form action=""  class="payment-method-item" method="POST" target="_blank" enctype="application/x-www-form-urlencoded">
                                <button type="submit"><img src="../images/Logo-VNPAY-QR.webp" alt=""></button>
                            </form>
                        </div>
                        <h3 class="local-payment-title">Chuyển khoản QR</h3>
                            <div class="PaymentContent_bank-detail__HbGrO">
                                <div class="PaymentContent_qr-code__Sjawx">
                                    <img src="https://img.vietqr.io/image/Vietcombank-9353538222-znVvEh.jpg?accountName=Cong%20Ty%20Co%20Phan%20Cong%20Nghe%20Giao%20duc%20F8&amp;amount=1299000&amp;addInfo=F8C1QJTG" alt="Vietcombank - 9353538222 - 1299000 - F8C1QJTG" style="opacity: 1;">
                                </div>
                                <ul class="PaymentContent_instruction__bRL9x">
                                    <li>Bước 1: Mở app ngân hàng và quét mã QR.</li>
                                    <li>Bước 2: Đảm bảo nội dung chuyển khoản là <span>F8C1QJTG</span>. </li>
                                    <li>Bước 3: Thực hiện thanh toán.</li>
                                </ul>
                            </div>
                        <h3 class="local-payment-title">Chuyển khoản thủ công</h3>
                        <div class="payment-form-group">
                            <h2 class="payment-form-control" id="cardNumber">19038393431014</h2>
                            <label for="email" class="payment-form-label payment-form-label-required">Số tài khoản</label>
                        </div>
                        <div class="payment-form-group-flex">
                            <div class="payment-form-group">
                                <h2 class="payment-form-control" id="NameCard">Techcombank</h2>
                                <label for="expiry-date" class="payment-form-label payment-form-label-required">Ngân hàng</label>
                            </div>
                            <div class="payment-form-group">
                                <h2 class="payment-form-control" id="NameCard">Phạm Hữu Quân</h2>
                                <label for="cvv" class="payment-form-label payment-form-label-required">Tên người nhận</label>
                            </div>
                        </div>
                        <div class="payment-form-group">
                            <h2 class="payment-form-control" id="titeCard">Thanh toán khóa học</h2>
                            <label for="card-number" class="payment-form-label payment-form-label-required">Nội dung chuyển</label>
                        </div>
                        <button type="submit" class="payment-form-submit-button"><i class="ri-wallet-line"></i> Thanh toán</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end: Payment -->

</body>
</html>