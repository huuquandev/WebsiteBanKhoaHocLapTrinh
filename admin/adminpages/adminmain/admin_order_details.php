<?php 
   include_once ("../function.php"); 
   $id_order = $_GET['orderid'];
   $orderItems = GetOrderById($id_order);
?>

<div class="breadcrumbs">
            <div class="breadcrumbs-inner">
                <div class="row m-0">
                    <div class="col-sm-4">
                        <div class="page-header float-left">
                            <div class="page-title">
                                <h1>Tài chính</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="page-header float-right">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="admin_dashboard.php?title=admin_order">Danh sách hóa đơn</a></li>
                                    <li class="active"><a href="admin_dashboard.php?title=admin_order_details&orderid=<?=$id_order?>">Chi tiết hóa đơn</a></li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
</div>
<div class="content">
    <div class="card mb-4">
            <div class="card-header">
                Chi tiết hóa đơn
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Hóa đơn</label>
                            <p class="form-control">#<?=$orderItems['ma_hoadon']?></p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Người mua</label>
                            <p class="form-control"><?=$orderItems['ten_hien_thi']?></p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Giá trị khóa học</label>
                            <p class="form-control"><?=convertToVietnameseCurrency($orderItems['so_tien'])?></p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Số điện thoại</label>
                            <p class="form-control"><?=$orderItems['sdt']?></p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Ngày tạo</label>
                            <p class="form-control"><?=$orderItems['ngay_mua']?></p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Email</label>
                            <p class="form-control"><?=$orderItems['email']?></p>
                        </div>
                    </div>                  
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Trạng thái</label>
                                <p class="form-control">
                                    <?php
                                        if($orderItems['trangthai_thanhtoan'] == 1){
                                            echo '<b class="span_pending" style="color: #4BB543; font-weight: 600;">Đã thanh toán</b>';
                                        }else{
                                            echo '<b class="span_pending" style="color: #fc0a0a; font-weight: 600;">Chưa thanh toán</b>';
                                        } 
                                    ?>
                                </p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Phương thức thanh toán</label>
                            <?php 
                                    if($orderItems['phuongthuc_thanhtoan'] == 1){
                                        echo '<p class="form-control">Chuyển khoản</p>';
                                    }else if($orderItems['phuongthuc_thanhtoan'] == 2){
                                        echo '<p class="form-control">Thanh toán qua VNPAY</p>';
                                    }else if($orderItems['phuongthuc_thanhtoan'] == 3){
                                        echo '<p class="form-control">Thanh toán qua MOMO</p>';
                                    }
                                ?>
                        </div>
                    </div>
                </div>
                <h4>Thông tin khóa học</h4>
                <hr>
                <div class="detail-order">
                    <div class="column">    
                        <div class="thumb">
                            <img src="../../../images/images_courses/<?=$orderItems['anh_khoahoc']?>" alt="">
                        </div>
                    </div>
                    <div class="column">
                        <div class="tutor">
                                <img src="../../../images/images_user/<?=$orderItems['anh_nguoi_dang']?>" alt="">
                                <div class="info">
                                    <h3><?=$orderItems['ten_nguoi_dang']?></h3>
                                    <span><?=$orderItems['ngaydang_khoahoc']?></span>
                                </div>
                            </div>   
                        <div class="details">     
                            <h3><?=$orderItems['ten_khoahoc']?></h3>
                            <p><?=$orderItems['mota_khoahoc']?></p>
                            <h5 class="title" style="font-size: 1.5rem; color:red"><?=convertToVietnameseCurrency($orderItems['gia_khoahoc'])?></h5>

                        </div>
                        <div class="title-content">
                                <ul>
                                    <li class="content_Chapter">
                                        <strong>13 </strong> chương
                                    </li>
                                    <li class="content_lesson">•</li>
                                    <li>
                                        <strong>170 </strong> bài học
                                    </li>
                                    <li class="content_lesson">•</li>
                                    <li>
                                        <span>Thời lượng <strong>31 giờ 21 phút</strong>
                                        </span>
                                    </li>
                                </ul>
                        </div>
                    </div>
                </div>
            </div>
    </div>
</div>