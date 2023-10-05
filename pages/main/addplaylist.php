<section class="addplaylist">

   <h1 class="heading">Thêm bài giảng</h1>

    <section class="form-container">

        <form class="register" action="" method="post" enctype="multipart/form-data">

        <h3>Thông tin bài giảng</h3>
        <p>Tên bài giảng <span>*</span></p>
        <input type="text" name="ten_baigiang" placeholder="Nhập tên bài giảng" maxlength="50" required class="box">
        <p>Bài tập <span>*</span></p>
        <input type="file" name="bai_tap" accept="*/*" class="box">
        <p>Hình nền<span>*</span></p>
        <input type="file" name="hinhnen_baigiang" accept="image/*" class="box">
        <p>Video<span>*</span></p>
        <input type="file" name="video_baigiang" accept="video/*" class="box">
        <p>Mô tả bài giảng<span>*</span></p>
        <textarea id="mota_baigiang" name="mota_baigiang" class="box">

        </textarea>
        <input type="submit" name="submit" value="Thêm" class="btn">

        </form>

    </section>

</section>
