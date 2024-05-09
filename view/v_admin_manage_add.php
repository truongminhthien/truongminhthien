<h2 class="my-3">Thêm căn hộ</h2>


<form action="" method="POST" enctype="multipart/form-data">


  <!-- hàng 1 -->
  <div class="row">
    <!-- cột 1 -->
    <div class="col">

      <div class="mb-3">
        <label for="TenCanHo" class="form-label">Tên căn hộ</label>
        <input type="text" class="form-control" id="TenCanHo" aria-describedby="emailHelp" name="TenCanHo" required />
      </div>

      <div class="mb-3">
        <label for="GiaCH" class="form-label">Giá căn hộ: Ngày/VNĐ</label>
        <input type="text" required maxlength="10" class="form-control" id="GiaCH" aria-describedby="emailHelp" name="GiaCH" oninput="validateNumberInput(this)" maxlength="11" />
      </div>
      <script>
        function validateNumberInput(input) {
          // Loại bỏ các ký tự không phải số từ giá trị nhập vào
          input.value = input.value.replace(/[^0-9]/g, '');
          // Kiểm tra nếu độ dài vượt quá 11 chữ số, thì cắt bớt
          if (input.value.length > 11) {
            input.value = input.value.slice(0, 11);
          }
        }
      </script>
      <div class="mb-3">
        <label for="TrangThai" class="form-label">Trạng thái</label>
        <select class="form-select" name="TrangThai" required>
          <option value="0">ẩn</option>
          <option value="1">hiện</option>
        </select>
      </div>

      <div class="mb-3">
        <label for="MaLoai" class="form-label">Mã loại</label>
        <select class="form-select" name="MaLoai" required>
          <option value="1">Căn hộ studio</option>
          <option value="2">Căn hộ thông thường</option>
          <option value="3">Căn hộ Mini</option>
        </select>
      </div>

    </div>
    <!-- cột 1 -->


    <!-- cột 2 -->
    <div class="col">

      <div class="mb-3">
        <label for="DiaChiCH" class="form-label">Địa chỉ</label>
        <input required type="text" class="form-control" id="DiaChiCH" aria-describedby="emailHelp" name="DiaChiCH" />
      </div>

      <div class="mb-3">
        <label for="MaKV" class="form-label">Mã khu vực</label>
        <select class="form-select" name="MaKV" required>
          <option value="1">Quận 1</option>
          <option value="2">Quận 2</option>
          <option value="3">Quận 3</option>
          <option value="4">Quận 4</option>
          <option value="5">Quận 5</option>
          <option value="6">Quận 6</option>
          <option value="7">Quận 7</option>
          <option value="8">Quận 8</option>
          <option value="9">Quận 9</option>
          <option value="10">Quận 10</option>
          <option value="11">Quận 11</option>
          <option value="12">Quận 12</option>
          <option value="13">Quận Tân Bình</option>
          <option value="14">Quận Phú Nhuận</option>
          <option value="15">Quận Gò Vấp</option>
          <option value="16">Quận Bình Thạnh</option>
          <option value="17">Quận Bình Tân</option>
          <option value="18">Quận Tân Phú</option>
          <option value="19">Thành phố Thủ Đức</option>
          <option value="20">Huyện Hóc Môn</option>
          <option value="21">Huyện Củ Chi</option>
          <option value="22">Huyện Nhà Bè</option>
          <option value="23">Huyện Bình Chánh</option>
          <option value="24">Huyện Cần Giờ</option>
        </select>
      </div>

      <div class="mb-3">
        <label for="DienTich" class="form-label">Diện tích / m<sup>2</label>
        <input type="number" class="form-control" id="DienTich" min=0 aria-describedby="emailHelp" name="DienTich" required />
      </div>

      <div class="mb-3">
        <label for="SoPhong" class="form-label">Số phòng</label>
        <input type="number" class="form-control" id="SoPhong" min=0 aria-describedby="emailHelp" name="SoPhong" required />
      </div>

    </div>
    <!-- cột 2 -->

  </div>
  <!-- hàng 1 -->

  <!-- hàng 2 -->
  <div class="row">

    <div class="mb-3">
      <div class="row">
        <div class="col"><label for="Hinh1" class="form-label">Hình ảnh 1</label><input type="file" class="form-control" id="Hinh1" aria-describedby="emailHelp" name="Hinh1" required /></div>
        <div class="col"><label for="Hinh2" class="form-label">Hình ảnh 2</label><input type="file" class="form-control" id="Hinh2" aria-describedby="emailHelp" name="Hinh2" required /></div>
        <div class="col"><label for="Hinh3" class="form-label">Hình ảnh 3</label><input type="file" class="form-control" id="Hinh3" aria-describedby="emailHelp" name="Hinh3" required /></div>
        <div class="col"><label for="Hinh4" class="form-label">Hình ảnh 4</label><input type="file" class="form-control" id="Hinh4" aria-describedby="emailHelp" name="Hinh4" required /></div>
      </div>
    </div>

    <div class="mb-3">
      <label for="MoTaCH" class="form-label">Mô tả</label>
      <textarea type="text" class="form-control" id="MoTaCH" aria-describedby="emailHelp" name="MoTaCH" cols="30" rows="10" placeholder="Mô tả"></textarea>
    </div>

  </div>
  <!-- hàng 2 -->


  <button type="submit" name="submit" value="submit" class="btn btn-primary">Xác nhận</button>
</form>
<br>
<br>