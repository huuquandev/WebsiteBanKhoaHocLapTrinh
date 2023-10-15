<section class="playlist-form">

   <h1 class="heading">Thêm khóa học</h1>

   <form action="" method="post" enctype="multipart/form-data">
      <p>Trạng thái khóa học <span>*</span></p>
      <select name="status" class="box" required>
         <option value="" selected disabled>-- Chọn trạng thái</option>
         <option value="Mở khóa">Mở khóa</option>
         <option value="Chưa mở Khóa">Chưa mở Khóa</option>
      </select>
      <p>Tiêu đề khóa học <span>*</span></p>
      <input type="text" name="title" maxlength="100" required placeholder="Tiêu đề khóa học" class="box">
      <p>Mô tả khóa học <span>*</span></p>
      <textarea name="description" class="box" required placeholder="Mô tả khóa học" maxlength="1000" cols="30" rows="10"></textarea>
      <p>Ảnh khóa học <span>*</span></p>
      <input type="file" name="image" accept="image/*" required class="box">
      <input type="submit" value="create playlist" name="submit" class="btn">
   </form>

</section>
