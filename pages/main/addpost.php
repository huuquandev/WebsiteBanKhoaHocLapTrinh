<section class="addpost">

   <h1 class="heading">Thêm bài viết</h1>

    <section class="form-container">

        <form class="addpost" action="" method="post" enctype="multipart/form-data">
            <h3>Thông tin bài viết</h3>
            <div class="flex">
                <div class="col">
                    <p>Tên bài viết <span>*</span></p>
                    <input type="text" name="ten_baiviet" placeholder="Nhập tên bài viết" maxlength="50" required class="box">               
                </div>
                <div class="col">
                    <p>Mô tả bài viết<span>*</span></p>
                    <textarea id="mota_baiviet" name="mota_baiviet" class="box" placeholder=" Nhập mô tả bài viết"> </textarea>
                </div>
                <div class="col">
                    <p>Nội dung bài viết<span>*</span></p>
                    <textarea id="noidung_baiviet" name="noidung_baiviet" class="box" placeholder=" Nhập Nội dung bài viết"> </textarea>
                    
                </div>
            </div>

            <input type="submit" name="submit" value="Thêm" class="btn">
        </form>

    </section>

</section>
<script>
      CKEDITOR.replace( 'noidung_baiviet' );
</script>
   