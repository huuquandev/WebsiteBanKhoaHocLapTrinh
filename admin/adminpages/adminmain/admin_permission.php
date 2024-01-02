<?php 
   include_once ("../function.php");
?>

<div class="breadcrumbs">
            <div class="breadcrumbs-inner">
                <div class="row m-0">
                    <div class="col-sm-4">
                        <div class="page-header float-left">
                            <div class="page-title">
                                <h1>Phân quyền</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="page-header float-right">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="#">Phân quyền</a></li>
                                    <li class="active"><a href="#">Danh sách vai trò</a></li>
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
                                <strong class="card-title">Vai trò</strong>
                                <span class="badge-complete iconOption" style="float: right;"><i class="fa fa-plus-square-o"></i></span>
                            </div>
                            <div class="card-body order_table_list">
                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Tên vai trò</th>
                                            <th>Chức năng</th>
                                            <th>Hành động</th>
                                        </tr>
                                    </thead>
                                    <?php 
                                        $sql = "SELECT tb_vaitro.ten_vaitro, GROUP_CONCAT(tb_quyen.ten_quyen SEPARATOR ', ') AS 'quyen'
                                        FROM tb_vaitro
                                        JOIN tb_quyen_vaitro ON tb_vaitro.id_vaitro = tb_quyen_vaitro.id_vaitro
                                        JOIN tb_quyen ON tb_quyen_vaitro.id_quyen = tb_quyen.id_quyen
                                        GROUP BY tb_vaitro.ten_vaitro;";  
                                        $query = mysqli_query($conn, $sql);
                                        if(mysqli_num_rows($query) > 0)
                                        {
                                            $count = 1; 
                                            while ($row = mysqli_fetch_assoc($query)) {     
                                    ?>
                                    <tbody>
                                        <tr>
                                            <td><?=$count++?>.</td>
                                            <td><?=$row['ten_vaitro']?></td>
                                            <td><?=$row['quyen']?></td>                        
                                            <td>
                                                <span class="badge-warrning iconOption"><i class="fa fa-pencil"></i></span>
                                                <span class="badge-pending iconOption"><i class="fa fa-trash-o"></i></span>
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
            var user = 
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
