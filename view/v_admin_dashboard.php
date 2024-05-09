<h2 class="my-3">Tổng quan</h2>
<div class="row">
  <div class="col-md-4">
    <div class="card text-primary mb-3">
      <div class="card-body">
        <h5 class="card-title">
          <i class="fa-solid fa-building me-3"></i>Căn hộ
        </h5>
        <p class="card-text fs-1 text-center"><?php echo $tkCanHo ?></p>
      </div>
    </div>
  </div>
  <div class="col-md-4">
    <div class="card text-success mb-3">
      <div class="card-body">
        <h5 class="card-title">
          <i class="fa-solid fa-user me-3"></i>Người dùng
        </h5>
        <p class="card-text fs-1 text-center"><?= $tkNguoiDung ?></p>
      </div>
    </div>
  </div>
  <div class="col-md-4">
    <div class="card text-danger mb-3">
      <div class="card-body">
        <h5 class="card-title">
          <i class="fa-solid fa-globe me-3"></i>Khu vực
        </h5>
        <p class="card-text fs-1 text-center"><?= $tkKhuVuc ?></p>
      </div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-md-4">
    <div class="card text-warning mb-3">
      <div class="card-body">
        <h5 class="card-title">
          <i class="fa-solid fa-arrows-left-right me-3"></i>Loại căn hộ
        </h5>
        <p class="card-text fs-1 text-center"><?= $tkLoai ?></p>
      </div>
    </div>
  </div>
  <div class="col-md-4">
    <div class="card text-info mb-3">
      <div class="card-body">
        <h5 class="card-title">
          <i class="fa-solid fa-comments me-3"></i>Bình luận
        </h5>
        <p class="card-text fs-1 text-center"><?= $tkBinhLuan ?></p>
      </div>
    </div>
  </div>
  <div class="col-md-4">
    <div class="card text-dark mb-3">
      <div class="card-body">
        <h5 class="card-title">
          <i class="fa-solid fa-newspaper me-3"></i>Tin tức
        </h5>
        <p class="card-text fs-1 text-center"><?= $tkTinTuc ?></p>
      </div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-md">
    <h5 class="text-bg-secondary my-3 p-2">Những bình luận gần đây</h5>
    <table class="table align-middle">
      <thead>
        <tr>
          <th>Tên</th>
          <th>Căn hộ</th>
          <th>Bình luận</th>
          <th>Thời gian</th>
          <th class="text-center">Số sao</th>
        </tr>
      </thead>

      <tbody>
        <?php foreach ($dsBL as $bl) : ?>
          <tr>
            <td><?= $bl['TenKhachHang'] ?></td>
            <td class="text-capitalize"><?= $bl['TenCanHo'] ?></td>
            <td class="text-capitalize"><?= $bl['NoiDung'] ?></td>
            <td><?= $bl['NgayDang'] ?></td>
            <td class="text-center"><?= $bl['SoSao'] ?></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>

<div class="row">
  <div class="col-md-6">
    <h5 class="text-bg-secondary my-3 p-2">Căn hộ phổ biến nhất</h5>
    <table class="table align-middle">
      <thead>
        <tr>
          <th class="text-center">Tên</th>
          <th class="text-center">Ngày đăng căn hộ</th>
          <th class="text-center">Lượt xem</th>
        </tr>
      </thead>

      <tbody>
        <?php foreach ($apapopular as $apartment) : ?>
          <tr>
            <td class="text-capitalize"><?= $apartment['TenCanHo'] ?></td>
            <td class="text-center"><?= $apartment['NgayDangCH'] ?></td>
            <td class="text-center"><?= $apartment['LuotXem'] ?></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
  <div class="col-md-6">
    <h5 class="text-bg-secondary my-3 p-2">Căn hộ được đánh giá cao nhất</h5>
    <table class="table align-middle">
      <thead>
        <tr>
          <th class="text-center">Tên</th>
          <th class="text-center">Giá</th>
          <th class="text-center text-nowrap">Lượt đánh giá</th>
        </tr>
      </thead>

      <tbody>
        <?php foreach ($apartment_best as $apabest) : ?>
          <tr>
            <td class="text-capitalize"><?= $apabest['TenCanHo'] ?></td>
            <td class="text-center"><?= $apabest['GiaCH'] ?></td>
            <td class="text-center"><?= number_format($apabest['AVG(bl.SoSao)'], 1, ',', '.') ?></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>

<div class="row">
  <div class="col-md-6">
    <h5 class="text-bg-secondary my-3 p-2">Tin tức gần đây</h5>
    <table class="table align-middle">
      <thead>
        <tr>
          <th class="text-center">Tiêu đề</th>
          <th class="text-center">Ngày đăng</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($news as $tin_tuc) : ?>
          <tr>
            <td class="text-capitalize"><?= $tin_tuc['TieuDe'] ?></td>
            <td class="text-center text-nowrap"><?= $tin_tuc['NgayDang'] ?></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
  <div class="col-md-6">
    <h5 class="text-bg-secondary my-3 p-2">Người đăng ký gần đây</h5>
    <table class="table align-middle">
      <thead>
        <tr>
          <th>Tên</th>
          <th>Email</th>
          <th class="text-center">Số điện thoại</th>
        </tr>
      </thead>

      <tbody>
        <?php foreach ($user_gan_day as $tai_khoan_gan_day) : ?>
          <tr>
            <td><?= $tai_khoan_gan_day['TenKhachHang'] ?></td>
            <td><?= $tai_khoan_gan_day['Email'] ?></td>
            <td class="text-center"><?= $tai_khoan_gan_day['SoDienThoai'] ?></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>