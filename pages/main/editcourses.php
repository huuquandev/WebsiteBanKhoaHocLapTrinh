<section class="editcourses">

   <h1 class="heading">Sửa khóa học</h1>

    <section class="form-container">

        <form class="register" action="" method="post" enctype="multipart/form-data">
        <h3>Thông tin khóa học</h3>
        <div class="flex">
            <div class="col">
                <p>Tên khóa học <span>*</span></p>
                <input type="text" name="ten_khoahoc" placeholder="Nhập tên khóa học" maxlength="50" required class="box">
                <p>Tên người đăng <span>*</span></p>
                <input type="text" name="ten_nguoidang" placeholder="Nhập tên người đăng" maxlength="20" required class="box">
            </div>
            <div class="col">
                <p>Mô tả <span>*</span></p>
                <input type="password" name="mota_khoahoc" placeholder="Nhập mô tả" maxlength="1000" class="box">
                <p>Giá tiền <span>*</span></p>
                <input type="number" name="giatien_khoahoc" placeholder="Nhập giá tiền" maxlength="20" required class="box">
            </div>
        </div>
        <p>Hình ảnh <span>*</span></p>
        <input type="file" name="image" accept="image/*" class="box">
        <input type="submit" name="submit" value="Lưu lại" class="btn">
        </form>

    </section>

</section>
