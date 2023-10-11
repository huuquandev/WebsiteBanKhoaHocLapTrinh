<?php
        if (isset($_GET['idKH'])) {
        $idKH = $_GET['idKH'];
    }
    if (isset($_GET['idHL'])) {
         $idHL = $_GET['idHL'];
    }
        // echo $idHL;
        $sql='DELETE FROM tb_hoc_lieu WHERE id_hoclieu = '.$idHL.'';
        $query=mysqli_query($conn, $sql);
        echo '<script>alert("Xóa học liệu thành công");</script>';
        ?>
        <div class="d-flex justify-content-center mt-3">
            <form action="" method="POST" enctype="multipart/form-data" class="w-50">
                <a href="home.php?title=detailcourses&idKH=<?php echo $idKH; ?>" class="btn btn-success">Trở lại</a>
            </form>
        </div>