<div class="row" style="justify-content: center;">
  <div class="col-md-4">
    <h2 class="my-3">Thêm tài khoản</h2>
    <?php if (isset($_SESSION['thongbao'])) : ?>
      <div class="alert alert-success" role="alert">
        <?= $_SESSION['thongbao'] ?>
      </div>
    <?php endif;
    unset($_SESSION['thongbao']); ?>

    <?php if (isset($_SESSION['loi'])) : ?>
      <div class="alert alert-danger" role="alert">
        <?= $_SESSION['loi'] ?>
      </div>
    <?php endif;
    unset($_SESSION['loi']); ?>
    <form action="" method="POST" s>

      <div class="mb-3">
        <label for="TenKhachHang" class="form-label">Họ và tên</label>
        <input type="text" class="form-control" id="TenKhachHang" aria-describedby="emailHelp" name="TenKhachHang" />
      </div>

      <div class="mb-3">
        <label for="SoDienThoai" class="form-label">Số điện thoại</label>
        <input type="text" class="form-control" id="SoDienThoai" aria-describedby="emailHelp" name="SoDienThoai" />
      </div>

      <div class="mb-3">
        <label for="Email" class="form-label">Email</label>
        <input type="emai" class="form-control" id="Email" aria-describedby="emailHelp" name="Email" />
      </div>

      <div class="mb-3">
        <label for="Quyen" class="form-label">Quyền</label>
        <select class="form-select" name="Quyen">
          <option value="0" selected>Bạn đọc</option>
          <option value="1">Quản lý</option>
        </select>
      </div>
      <button type="submit" name="submit" value="submit" class="btn btn-primary">Xác nhận</button>
    </form>
  </div>
</div>