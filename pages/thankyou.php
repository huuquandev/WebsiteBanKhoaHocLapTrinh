<?php
    session_start(); 
    include "../components/connect.php";
    include "../function.php";
    if($_SESSION['id_taikhoan']){
        $id_taikhoan = $_SESSION['id_taikhoan'];
    }else{
        header('location:../home.php?title=login');
    }
    $code_order = $_GET['code_order'];
    $orderItems = GetOrderByCode($code_order);
?>

<!DOCTYPE html>
<html class="thankyou-page">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
    <meta name="description" content="Educa. - Cảm ơn" />
    <title>Educa. - Cảm ơn</title>


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lipis/flag-icons@6.6.6/css/flag-icons.min.css" />

    <link rel="stylesheet" href="../css/checkout.vendor.min.css">


    <link rel="stylesheet" href="../css/checkout.min.css">
</head>
<body data-no-turbolink>
    <header class="banner">
        <div class="wrap">
            <div class="logo logo--left">

                <h1 class="shop__name">
                    <a href="../home.php">Educa.</a>
                </h1>

            </div>
        </div>
    </header>
    <div class="content">
        <form>
            <div class="wrap wrap--mobile-fluid">
                <main class="main main--nosidebar">
                    <header class="main__header">
                        <div class="logo logo--left">

                            <h1 class="shop__name">
                                <a href="../home.php">Educa.</a>
                            </h1>

                        </div>
                    </header>
                    <div class="main__content">
                        <article class="row">
                            <div class="col col--primary">
                                <section class="section section--icon-heading">
                                    <div class="section__icon unprintable">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="72px" height="72px">
											<g fill="none" stroke="#8EC343" stroke-width="2">
												<circle cx="36" cy="36" r="35" style="stroke-dasharray:240px, 240px; stroke-dashoffset: 480px;"></circle>
												<path d="M17.417,37.778l9.93,9.909l25.444-25.393" style="stroke-dasharray:50px, 50px; stroke-dashoffset: 0px;"></path>
											</g>
										</svg>
                                    </div>
                                    <div class="thankyou-message-container">
                                        <h2 class="section__title">Cảm ơn bạn đã mua khóa học</h2>

                                        <p class="section__text">
                                            Hệ thông đang kiểm tra thanh toán một email xác nhận sẽ được gửi tới <?=$orderItems['email']?>. <br/> Xin vui lòng kiểm tra email của bạn
                                        </p>


                                    </div>
                                </section>
                            </div>
                            <div class="col col--secondary">
                                <aside class="order-summary order-summary--bordered order-summary--is-collapsed" id="order-summary">
                                    <div class="order-summary__header">
                                        <div class="order-summary__title">
                                            Hóa hơn #<?=$orderItems['ma_hoadon']?>
                                        </div>
                                        <div class="order-summary__action hide-on-desktop unprintable">
                                            <a data-toggle="#order-summary" data-toggle-class="order-summary--is-collapsed" class="expandable">
												Xem chi tiết
											</a>
                                        </div>
                                    </div>
                                    <div class="order-summary__sections">
                                        <div class="order-summary__section order-summary__section--product-list order-summary__section--is-scrollable order-summary--collapse-element">
                                            <table class="product-table">
                                                <tbody>

                                                    <tr class="product">
                                                        <td class="product__image">
                                                            <div class="product-thumbnail">
                                                                <div class="product-thumbnail__wrapper">
                                                                    <img src="../images/images_courses/<?=$orderItems['anh_khoahoc']?>" alt="" class="product-thumbnail__image" />
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <th class="product__description">
                                                            <span class="product__description__name">Khóa học: <?=$orderItems['ten_khoahoc']?></span>


                                                        </th>
            
                                                        <td class="product__price">

                                                            <?php echo convertToVietnameseCurrency($orderItems['gia_khoahoc']); ?>

                                                        </td>
                                                    </tr>

                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="order-summary__section">
                                            <table class="total-line-table">
                                                <tbody class="total-line-table__tbody">


                                                    <tr class="total-line total-line--subtotal">
                                                        <th class="total-line__name">Tạm tính</th>
                                                        <td class="total-line__price"><?php echo convertToVietnameseCurrency($orderItems['gia_khoahoc']); ?></td>
                                                    </tr>

                                                    <tr class="total-line total-line--shipping-fee">
                                                        <th class="total-line__name">Giảm giá</th>
                                                        <td class="total-line__price">

                                                            0đ

                                                        </td>
                                                    </tr>

                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="order-summary__section">
                                            <table class="total-line-table">
                                                <tbody class="total-line-table__tbody">
                                                    <tr class="total-line payment-due">
                                                        <th class="total-line__name">
                                                            <span class="payment-due__label-total">Tổng cộng</span>
                                                        </th>
                                                        <td class="total-line__price">
                                                            <span class="payment-due__price"><?php echo convertToVietnameseCurrency($orderItems['so_tien']); ?></span>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </aside>
                            </div>
                            <div class="col col--primary">
                                <section class="section">
                                    <div class="section__content section__content--bordered">

                                        <div class="row">

                                            <div class="col col--md-two">
                                                <h2>Thông tin người mua</h2>
                                                <p><?=$orderItems['ten_hien_thi']?></p>

                                                <p><?=$orderItems['email']?></p>


                                                <p><?=$orderItems['sdt']?></p>

                                            </div>

                                            <div class="col col--md-two">
                                                <h2>Thông tin khóa học</h2>
                                                <p><?=$orderItems['ten_khoahoc']?></p>



                                                <p><?=$orderItems['mota_khoahoc']?></p>



                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col col--md-two">
                                                <h2>Phương thức thanh toán</h2>
                                                <?php
                                                    if($orderItems['phuongthuc_thanhtoan'] = 1){
                                                        echo '<p>Thanh toán chuyển khoản</p>';
                                                    }else if($orderItems['phuongthuc_thanhtoan'] = 2){
                                                        echo '<p>Thanh toán MOMO</p>';    
                                                    }else if($orderItems['phuongthuc_thanhtoan'] = 3){
                                                        echo '<p>Thanh toán VNPAY</p>';    

                                                    }
                                                 ?>
                                            </div>
                                            <!-- <div class="col col--md-two">
                                                <h2>Phương thức vận chuyển</h2>
                                                <p>Giao hàng tận nơi</p>
                                            </div> -->
                                        </div>

                                    </div>
                                </section>
                                <section class="section unprintable">
                                    <div class="field__input-btn-wrapper field__input-btn-wrapper--floating">
                                        <a href="../home.php" class="btn btn--large">Quay lại khóa học</a>
                                    </div>
                                </section>
                            </div>
                        </article>
                    </div>

                </main>
            </div>
        </form>
    </div>
</body>

</html>