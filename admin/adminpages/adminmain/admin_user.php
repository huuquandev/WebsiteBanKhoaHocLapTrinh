<div class="breadcrumbs">
            <div class="breadcrumbs-inner">
                <div class="row m-0">
                    <div class="col-sm-4">
                        <div class="page-header float-left">
                            <div class="page-title">
                                <h1>Người Dùng</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="page-header float-right">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="#">Người dùng</a></li>
                                    <li class="active"><a href="#">Danh sách tài khoản</a></li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
</div>
        
<div class="content">
            <div class="animated fadeIn">
                <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Tài khoản</strong>
                            </div>
                            <?php 
                            $sql = "SELECT * FROM tb_tai_khoan";  
                            $query = mysqli_query($conn, $sql);
                            if(mysqli_num_rows($query) > 0)
                            {
                            ?>
                            <div class="table-stats order-table ov-h">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th class="serial">#</th>
                                            <th class="avatar">Hình ảnh</th>
                                            <th>Tên</th>
                                            <th>Ngày sinh</th>
                                            <th>Giới tính</th>
                                            <th>Email</th>
                                            <th>Số điện thoại</th>
                                            <th>Hành động</th>
                                        </tr>
                                    </thead>
                                    <?php
                                        $count = 1; 
                                      while ($row = mysqli_fetch_assoc($query)) {      
                                     ?>
                                    <tbody>
                                        <tr>
                                            <td class="serial"><?=$count++?>.</td>
                                            <td class="avatar">
                                                <div class="round-img">
                                                    <a href="#"><img class="rounded-circle equal-size" src="../../../images/images_user/<?=$row['hinh_anh']?>" alt=""></a>
                                                </div>
                                            </td>
                                            <td>  <span class="name"><?=$row['ten_hien_thi']?></span> </td>
                                            <td> <span class="product"><?=$row['ngay_sinh']?></span> </td>
                                            <td><span class="sex"><?=($row['gioi_tinh'] == 1) ? 'Nam' : (($row['gioi_tinh'] == 2) ? 'Nữ' : 'Khác')?></span></td>
                                            <td>
                                                <span class="email"><?=$row['email']?></span>
                                            </td>
                                            <td>
                                                <span class="phone"><?=$row['sdt']?></span>
                                            </td>
                                            <td>
                                                <span class="badge-warrning iconOption"><i class="fa fa-pencil"></i></span>
                                                <span class="badge-pending iconOption"><i class="fa fa-trash-o"></i></span>
                                            </td>
                                        </tr>

                                    </tbody>
                                    <?php 
                                      }
                                     ?>
                                </table>
                            </div> <!-- /.table-stats -->
                            <?php 
                            }
                            ?>
                </div>
            </div>
</div>