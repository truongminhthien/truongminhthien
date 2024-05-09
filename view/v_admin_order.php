<h2 class="my-3">Quản lý đơn hàng</h2>
<div class="row">
  <div class="col-md-2" style="margin-bottom: 10px;">
    <button class="btn btn-primary btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
      Tất cả các đơn
    </button>
    <ul class="dropdown-menu">

      <li><a class="dropdown-item" href="index.php?mod=admin&act=order&page=1&dang_duyet">Chờ xác nhận</a></li>
      <li><a class="dropdown-item" href="index.php?mod=admin&act=order&page=1&da_nhan">Đang nhận</a></li>
      <li><a class="dropdown-item" href="index.php?mod=admin&act=order&page=1&dang_tra">Đang Trả</a></li>
      <li><a class="dropdown-item" href="index.php?mod=admin&act=order&page=1&da_tra">Hoàng thành</a></li>
      <li><a class="dropdown-item" href="index.php?mod=admin&act=order&page=1&tre">Trễ hạn</a></li>
      <li><a class="dropdown-item" href="index.php?mod=admin&act=order&page=1&dang_huy">Đang hủy</a></li>
      <li><a class="dropdown-item" href="index.php?mod=admin&act=order&page=1&da_huy">Đã hủy</a></li>
      <!-- <li><a class="dropdown-item" href="#">Căn hộ thông thường</a></li>
            <li><a class="dropdown-item" href="#">Căn hộ Mini</a></li> -->
    </ul>
  </div>
</div>
</div>
<table class="table text-center align-middle table-striped table-hover">
  <thead>
    <tr>
      <th>STT</th>
      <th>Tên khách hàng</th>
      <th class="text-start">Tên căn hộ</th>
      <th>Ngày nhận căn hộ</th>
      <th>Ngày trả dự kiến</th>
      <th>Ngày trả</th>
      <th>Trễ hạn</th>
      <th>Tổng ngày</th>
      <th>Giá</th>
      <th>Trạng thái</th>
      <th>Hành động</th>
    </tr>
  </thead>
  <tbody>
    <?php $i = 1;
    foreach ($dsdon_hang as $dh) : ?>
      <tr>
        <td><?= ($page - 1) * 5 + $i ?></td>
        <td><?= $dh['TenKhachHang'] ?></td>
        <td class="text-start"><?= $dh['TenCanHo'] ?></td>
        <td><?= $dh['NgayNhan'] ?></td>
        <td><?= $dh['NgayTraDuKien'] ?></td>
        <td><?= $dh['NgayTra'] ?></td>
        <td style="color: red;">
          <?php
          date_default_timezone_set('Asia/Ho_Chi_Minh');

          $ngayHienTai = date("Y-m-d");
          $ngayTra = $dh['NgayTra'];
          $ngayTraDuKien = $dh['NgayTraDuKien'];

          $timestampNgayHienTai = strtotime($ngayHienTai);
          $timestampNgayTra = strtotime($ngayTra);
          $timestampNgayTraDuKien = strtotime($ngayTraDuKien);
          if ($dh['NgayTra'] > $dh['NgayTraDuKien']) {
            $chenhLechNgay = ($timestampNgayTra - $timestampNgayTraDuKien) / (60 * 60 * 24);
            echo  $chenhLechNgay;
          } elseif ($dh['TrangThaiDH'] == 'da_nhan' && $timestampNgayHienTai > $timestampNgayTra) {
            $chenhLechNgay = ($timestampNgayHienTai - $timestampNgayTra) / (60 * 60 * 24);
            echo  $chenhLechNgay;
          }
          ?>
        </td>
        <td><?php $timestampNhan = strtotime($dh['NgayNhan']);
            $timestampTra = strtotime($dh['NgayTraDuKien']);
            // Tính số ngày chênh lệch
            $soNgay = ($timestampTra - $timestampNhan) / (60 * 60 * 24);
            if (isset($chenhLechNgay)) {
              if ($chenhLechNgay > 1) {
                $soNgay = $soNgay + $chenhLechNgay;
              }
            }
            echo $soNgay  ?></td>
        <td style="color: red;">
          <?php echo number_format($dh['GiaCHHT'] * $soNgay) ?> đ
        </td>
        <td>
          <div class="box_tb">
            <?php
            date_default_timezone_set('Asia/Ho_Chi_Minh');
            $ngayHienTai = date("Y-m-d");

            $ngayTra = $dh['NgayTra'];
            // Chuyển đổi chuỗi ngày thành timestamp
            $timestampNgayHienTai = strtotime($ngayHienTai);
            $timestampNgayTra = strtotime($ngayTra);
            if ($dh['TrangThaiDH'] == 'da_huy') {
              echo '<div class="badge fs-6" style=" width: 100%; background-color: #ff7b7b;">
                                                 Đã hủy</div>';
            } else if ($dh['TrangThaiDH'] == 'dang_tra') {
              echo '<div class="badge fs-6" style=" width: 100%; background-color: #ff7b7b;">
                                                 Đang trả</div>';
            } else if ($dh['TrangThaiDH'] == 'dang_huy') {
              echo '<div class="badge fs-6" style=" width: 100%; background-color: #ff7b7b;">
                                                 Đang hủy</div>';
            } else if (
              $dh['TrangThaiDH'] == 'da_nhan' && $ngayHienTai >
              $dh['NgayTra']
            ) {
              echo '<div class="badge fs-6" style=" width: 100%; background-color: red;">
                                                 Quá hạn</div>';
            } else if (
              $dh['TrangThaiDH'] == 'da_nhan' && $ngayHienTai >
              $dh['NgayTra']
            ) {
              echo '<div class="badge fs-6" style=" width: 100%; background-color: red;">
                                                 Quá hạn</div>';
            } else if ($dh['TrangThaiDH'] == 'da_nhan') {
              echo '<div class="badge fs-6" style=" width: 100%; background-color: #5790ea;">
                                                 Đã nhận</div>';
            } else if ($dh['TrangThaiDH'] == 'da_tra') {
              echo '<div class="badge fs-6" style=" width: 100%; background-color: #5790ea;">
                                                 Hoàng thành</div>';
            } else if ($dh['TrangThaiDH'] == 'da_duyet') {
              echo '<div class="badge fs-6" style=" width: 100%; background-color: #5790ea;"> Đã duyệt</div>';
            } else {
              echo '<div class="badge fs-6" style=" width: 100%; background-color: #53ed67;">
                                                 Đang duyệt</div>';
            }
            ?>
          </div>

        </td>
        <td class="text-end">
          <a href="index.php?mod=admin&act=order-edit&id=<?= $dh['MaDH'] ?>" class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i></a>
          <!-- <button onclick="deleteOrder(<?= $dh['MaDH'] ?>)" class="btn btn-danger"><i
                        class="fa-solid fa-trash"></i></button> -->
        </td>
      </tr>
    <?php $i++;
    endforeach; ?>
  </tbody>
</table>

<!-- Phân trang -->
<?php
$loai = '';

if (isset($_GET['dang_duyet'])) {
  $loai = 'dang_duyet';
} else if (isset($_GET['da_tra'])) {
  $loai = 'hoang_thanh';
} else if (isset($_GET['tre'])) {
  $loai = 'tre';
} else if (isset($_GET['dang_tra'])) {
  $loai = 'dang_tra';
} else if (isset($_GET['dang_huy'])) {
  $loai = 'dang_huy';
} else if (isset($_GET['da_nhan'])) {
  $loai = 'da_nhan';
} else if (isset($_GET['da_huy'])) {
  $loai = 'da_huy';
} else {
  $loai = '';
}
?>
<nav aria-label="Page navigation example">
  <ul class="pagination justify-content-center my-3">
    <li class="page-item <?= ($page <= 1) ? 'disabled' : '' ?>">
      <a class="rounded mx-1 page-link" href="index.php?mod=admin&act=order&page=<?php echo $page - 1;
                                                                                  echo '&' . $loai; ?>" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
      </a>
    </li>
    <?php for ($i = 1; $i <= $soTrang; $i++) : ?>
      <li class="page-item <?= ($page == $i) ? 'active' : '' ?>">
        <a class="rounded mx-1 page-link" href="index.php?mod=admin&act=order&page=<?php echo $i;
                                                                                    echo '&' . $loai; ?>">
          <?= $i ?>
        </a>
      </li>
    <?php endfor; ?>
    <li class="page-item <?= ($page >= $soTrang) ? 'disabled' : '' ?>">
      <a class="rounded mx-1 page-link" href="index.php?mod=admin&act=order&page=<?php echo $page + 1;
                                                                                  echo '&' . $loai; ?>" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
      </a>
    </li>
  </ul>
</nav>

<script>
  function deleteUser(MaTK) {
    var kq = confirm("Bạn có muốn xóa tài khoản này không?");
    if (kq) {
      window.location = '<?= $base_url ?>?mod=admin&act=user-delete&id=' + MaTK;
    }
  }
</script>