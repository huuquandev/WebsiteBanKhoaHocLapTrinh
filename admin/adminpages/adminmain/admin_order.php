<?php 
   include_once ("../function.php");
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
                                    <li><a href="#">Tài chính</a></li>
                                    <li class="active"><a href="#">Danh sách hóa đơn</a></li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
</div>
<div class="content">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Hóa đơn</strong>
                            </div>
                            <div class="card-body order_table_list">
                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Mã hóa đơn</th>
                                            <th>Khóa học</th>
                                            <th>Người mua</th>
                                            <th>Số tiền</th>
                                            <th>Trạng thái</th>
                                            <th>Hành động</th>
                                        </tr>
                                    </thead>
                                    <?php 
                                        $sql = "SELECT tb_hoadon.*, tb_tai_khoan.ten_hien_thi, tb_khoa_hoc.ten_khoahoc
                                        FROM tb_hoadon 
                                        JOIN tb_tai_khoan ON tb_tai_khoan.id_taikhoan = tb_hoadon.id_taikhoan 
                                        JOIN tb_khoa_hoc ON tb_khoa_hoc.id_khoahoc = tb_hoadon.id_khoahoc";  
                                        $query = mysqli_query($conn, $sql);
                                        if(mysqli_num_rows($query) > 0)
                                        {
                                            $count = 1; 
                                            while ($row = mysqli_fetch_assoc($query)) {     
                                    ?>
                                    <tbody>
                                        <tr>
                                            <td><?=$count++?>.</td>
                                            <td>#<?=$row['ma_hoadon']?></td>
                                            <td><?=$row['ten_khoahoc']?></td>
                                            <td><?=$row['ten_hien_thi']?></td>
                                            <td><?=convertToVietnameseCurrency($row['so_tien'])?></td>
                                            <td>
                                                <?php 
                                                    if($row['trangthai_thanhtoan'] == 1){
                                                        echo '<span class="badge badge-complete">Đã thanh toán</span>';
                                                    }else{
                                                        echo '<span class="badge badge-pending">Chưa thanh toán</span>';
                                                    }
                                                ?>
                                            </td>
                                            <td>
                                                <span class="badge-warrning iconOption" data-id="<?=$row['id_hoadon']?>" id="btnCapNhat" data-code="<?=$row['ma_hoadon']?>" data-method="<?=$row['trangthai_thanhtoan']?>" data-user="<?=$row['id_taikhoan']?>" data-courses="<?=$row['id_khoahoc']?>"><i class="fa fa-pencil"></i></span>
                                                <a href="admin_dashboard.php?title=admin_order_details&orderid=<?=$row['id_hoadon']?>" class="badge-complete iconOption" data-id="<?=$row['id_hoadon']?>" id="btnXem"><i class="fa fa-eye"></i></a>
                                            </td>
                                        </tr>
                                        
                                    </tbody>
                                    <?php 
                                            }
                                    }
                                    ?>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="modal-default">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Cập nhật trạng thái</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="btnClose">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h5 style="padding-top: 10px;" class="codeOrder"></h5>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" id="txtOrderId" value="0" />
                        <input type="hidden" id="txtUserId" value="0" />
                        <input type="hidden" id="txtCoursesrId" value="0" />

                        <div class="form-group">
                            <label>Trạng thái</label>
                            <select class="form-control" id="ddTrangthai">
                                <option value="1">Đã thanh toán</option>
                                <option value="0">Chưa thanh toán</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" id="btnClose" data-dismiss="modal">Đóng</button>
                        <button type="button" class="btn btn-primary" id="btnSave">Cập nhật</button>
                    </div>
                </div>
            </div>
        </div>

<script>
    $(document).ready(function () {
        $('body').on('click', '#btnCapNhat', function () {
            var id = $(this).data("id");
            var code = $(this).data("code");
            var tt = $(this).data("method");
            var user = $(this).data("user");
            var courses = $(this).data("courses");
            $('#txtOrderId').val(id);
            $('#txtUserId').val(user);
            $('#txtCoursesrId').val(courses);

            $('.codeOrder').text("Hóa đơn: #" + code);
            var optionList = document.getElementById("ddTrangthai");
            for (var i = 0; i < optionList.options.length; i++) {
                if (optionList.options[i].value == tt) {
                    optionList.options[i].selected = true;
                }
            }
            $('#modal-default').modal('show');            
        });
        $('body').on('click', '#btnSave', function () {
            var id = $("#txtOrderId").val();
            var tt = $("#ddTrangthai").val();
            var user = $("#txtUserId").val();
            var courses = $("#txtCoursesrId").val();
            $.ajax({
                url: "adminpages/adminmain/commons/update_status_order.php",
                type: "post",
                dataType: "json",
                data: { orderId: id, trangThai: tt, userId: user, coursesId: courses },
                success: function (response) {
                    if (response == true) {
                        location.reload();
                        $('#modal-default').modal('hide');                  
                    } 
                },
                error: function (xhr, status, error) {
                    console.error(xhr.responseText);
                    alert("Ajax request failed!");
                }
            });
        });


        $('body').on('click', '#btnClose', function () {
            $('#modal-default').modal('hide');
        });
    });
</script>
