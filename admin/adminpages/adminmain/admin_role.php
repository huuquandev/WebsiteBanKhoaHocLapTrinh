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
                                    <li class="active"><a href="#">Danh sách quyền</a></li>
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
                                <strong class="card-title">Quyền</strong>
                                <span class="badge-complete iconOption" style="float: right;" id="addRole"><i class="fa fa-plus-square-o"></i></span>
                            </div>
                            <div class="card-body order_table_list">
                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Tên quyền</th>
                                            <th>Hành động</th>
                                        </tr>
                                    </thead>
                                    <?php 
                                        $sql = "SELECT * FROM tb_quyen";  
                                        $query = mysqli_query($conn, $sql);
                                        if(mysqli_num_rows($query) > 0)
                                        {
                                            $count = 1; 
                                            while ($row = mysqli_fetch_assoc($query)) {     
                                    ?>
                                    <tbody>
                                        <tr>
                                            <td><?=$count++?>.</td>
                                            <td><?=$row['ten_quyen']?></td>
                                            <td>
                                                <span class="badge-warrning iconOption" id="editrole" data-id="<?=$row['id_quyen']?>" data-name="<?=$row['ten_quyen']?>"><i class="fa fa-pencil"></i></span>
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
        <div class="modal fade" id="modal-default1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Thêm quyền</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="btnClose">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h5 style="padding-top: 10px;" class="codeOrder"></h5>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Tên quyền</label>
                            <input type="text" class="form-control" id="Rolename_1" name="Rolename_1" placeholder="Thêm bài viết" required>
                        </div>    
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" id="btnClose" data-dismiss="modal">Đóng</button>
                        <button type="button" class="btn btn-primary" id="btnaddRole">Thêm</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="modal-default2">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Cập nhật quyền</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="btnClose">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h5 style="padding-top: 10px;" class="codeOrder"></h5>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" id="txtRoleId" value="0" />

                        <div class="form-group">
                            <label>Tên quyền</label>
                            <input type="text" class="form-control" id="Rolename_2" name="Rolename_2" placeholder="Thêm bài viết" required>
                        </div>    
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" id="btnClose" data-dismiss="modal">Đóng</button>
                        <button type="button" class="btn btn-primary" id="btnUpdateRole">Cập nhật</button>
                    </div>
                </div>
            </div>
        </div>
<script>
    $(document).ready(function () {
        $('body').on('click', '#addRole', function () {
            $('#modal-default1').modal('show');            
        });
        $('body').on('click', '#btnaddRole', function () {
            var name_role = $("#Rolename_1").val();        
            $.ajax({
                url: "adminpages/adminmain/commons/add_role.php",
                type: "post",
                dataType: "json",
                data: { name_role: name_role },
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
        $('body').on('click', '#editrole', function () {
            let name = $(this).data("name");
            let id = $(this).data("id");
            $('#Rolename_2').val(name);
            $('#txtRoleId').val(id);
            $('#modal-default2').modal('show');            
        });
        $('body').on('click', '#btnUpdateRole', function () {
            var name_role = $("#Rolename_2").val();        
            var id_role = $("#txtRoleId").val();      
            if (name_role.trim() === '') {
                alert("Vui lòng điền tên quyền");
                return;
            }
            $.ajax({
                url: "adminpages/adminmain/commons/update_role.php",
                type: "post",
                dataType: "json",
                data: { name_role: name_role, id_role: id_role },
                success: function (response) {
                    if (response == true) {
                        location.reload();
                        $('#modal-default').modal('hide');     
                        alert("Cập nhật thành công")          
                    } 
                },
                error: function (xhr, status, error) {
                    console.error(xhr.responseText);
                    alert("Ajax request failed!");
                }
            });
        });
    });
</script>
