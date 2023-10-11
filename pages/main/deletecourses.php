<?php
        if (isset($_GET['id_khoahoc'])) {
        $idKH = $_GET['id_khoahoc'];
    }
        // echo $idHL;
        $sql='DELETE FROM tb_khoa_hoc WHERE id_khoahoc = '.$idKH.'';
        $query=mysqli_query($conn, $sql);
        echo '<script>alert("Xóa khóa học thành công");</script>';
        ?>
        <div class="d-flex justify-content-center mt-3">
            <form action="" method="POST" enctype="multipart/form-data" class="w-50">
                <a href="home.php?title=courses" class="btn btn-success">Trở lại</a>
            </form>
        </div>