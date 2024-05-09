<style>
</style>
<h2 class="my-3">Chi tiết đơn thuê</h2>
<?php if (isset($_SESSION['thongbao'])) : ?>
    <div class="alert alert-success" role="alert">
        <?= $_SESSION['thongbao'] ?>
    </div>
<?php endif;
unset($_SESSION['thongbao']); ?>
<form action="" method="POST">
    <div class="row" style="margin-bottom: 20px;">
        <div class="col-md-3">
            <label for="TrangThaiHienTai" class="form-label">Trạng thái hiện tại</label>
            <select class="form-select" name="TrangThaiHienTai" disabled>
                <option value="da_huy" <?= ($dh['TrangThai'] == 'da_huy') ? 'selected' : '' ?>>Đã hủy</option>
                <option value="dang_duyet" <?= ($dh['TrangThai'] == 'dang_duyet') ? 'selected' : '' ?> disabled>Đang
                    duyệt
                </option>
                <option value="da_duyet" <?= ($dh['TrangThai'] == 'da_duyet') ? 'selected' : '' ?> disabled>Đã duyệt
                </option>
                <option value="da_nhan" <?= ($dh['TrangThai'] == 'da_nhan') ? 'selected' : '' ?> disabled>Đã nhận
                </option>
                <option value="da_tra" <?= ($dh['TrangThai'] == 'da_tra') ? 'selected' : '' ?> disabled>Đã trả</option>
            </select>
        </div>
        <div class="col-md-3">
            <label for="TrangThai" class="form-label">Trạng thái thay đổi</label>
            <select class="form-select" name="TrangThai">
                <option value="da_huy" <?= ($dh['TrangThai'] == 'da_huy') ? 'selected' : '' ?>>Đã hủy</option>
                <option value="dang_duyet" <?= ($dh['TrangThai'] == 'dang_duyet') ? 'selected' : '' ?>>Đang duyệt
                </option>
                <option value="da_duyet" <?= ($dh['TrangThai'] == 'da_duyet') ? 'selected' : '' ?>>Đã duyệt</option>
                <option value="da_nhan" <?= ($dh['TrangThai'] == 'da_nhan') ? 'selected' : '' ?>>Đã nhận </option>
                <option value="da_tra" <?= ($dh['TrangThai'] == 'da_tra') ? 'selected' : '' ?>>Đã trả
                    <?php date_default_timezone_set('Asia/Ho_Chi_Minh');
                    echo $ngayHienTai = date("Y-m-d"); ?>
                </option>
            </select>
        </div>
    </div>
    <button type="submit" name="submit" value="submit" class="btn btn-primary">Xác nhận</button>
</form>
<section class="page-content">
    <!-- CHECKOUT-AREA START -->
    <div class="checkout-area margin-bottom-80">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h3 class="title-6 margin-bottom-50" style=" font-size: 32px; font-weight: 600;text-align: center;margin-top: 20px;">
                        Thông tin đơn thuê</h3>
                </div>
            </div>
            <!-- Checkout-Billing-details and order start -->
            <div class="checkout-bill-order">
                <form action="index.php?mod=page&act=buy" method="post">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="checkout-bill">
                                <h3 class="title-7 margin-bottom-50" style="font-size: 24px;">Thôg tin khách hàng
                                    (<?= $TaiKhoan['MaTK'] ?>)</h3>
                            </div>
                            <div class="row coupon-info">
                                <div class="col-md-12">
                                    <p class="form-row-first">
                                        <label>Tên <span class="required">*</span></label>
                                        <input type="text" disabled value="<?= $TaiKhoan['TenKhachHang'] ?>" />
                                    </p>
                                </div>
                            </div>
                            <div class="row coupon-info">
                                <div class="col-md-12">
                                    <p class="form-row-first">
                                        <label>Email </label>
                                        <input type="text" disabled value="<?= $TaiKhoan['Email'] ?>" />
                                    </p>
                                </div>
                            </div>
                            <div class="row coupon-info">
                                <div class="col-md-12">
                                    <p class="form-row-first">
                                        <label>Số điện thoại <span class="required">*</span></label>
                                        <input type="text" disabled value="<?= $TaiKhoan['SoDienThoai'] ?>" />
                                    </p>
                                </div>

                            </div>
                            <div class="row coupon-info">
                                <div class="col-md-12">
                                    <p class="form-row-first">
                                        <label>Địa chỉ </label>
                                        <input type="text" disabled value="<<?= $TaiKhoan['DiaChiKhachHang'] ?>" />
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="your-order">
                                <h3 class="title-7 margin-bottom-50" style="font-size: 24px;">Thông tin đơn thuê</h3>
                                <div class="your-order-table table-responsive">
                                    <table>
                                        <thead>
                                            <tr>
                                                <th class="product-name" style="    font-size: 18px;font-weight: 600;">
                                                    Thuộc tính</th>
                                                <th class="product-total" style="width: 60%;font-size: 18px;font-weight: 600;">Thông tin</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="product-name">Mã căn hộ</td>
                                                <td class="product-total"><?= $apartment_rentnow['MaCH'] ?></td>
                                            </tr>
                                            <tr>
                                                <td class="product-name">Tên căn hộ</td>
                                                <td class="product-total"><?= $apartment_rentnow['TenCanHo'] ?></td>
                                            </tr>
                                            <tr>
                                                <td class="product-name">Giá/Ngày </td>
                                                <td class="product-total">
                                                    <?= number_format($apartment_rentnow['GiaCH']) ?> VND</td>
                                            </tr>
                                            <tr>
                                                <td class="product-name">Ngày nhận </td>
                                                <td class="product-total"><?= $dh['NgayNhan'] ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="product-name">Ngày trả dự kiến</td>
                                                <td class="product-total">
                                                    <?= $dh['NgayTraDuKien'] ?></td>
                                            </tr>
                                            <tr>
                                                <td class="product-name">Ngày trả</td>
                                                <td class="product-total">
                                                    <?= $dh['NgayTraDuKien'] ?></td>
                                            </tr>
                                            <tr>
                                                <td class="product-name">Trễ hạn</td>
                                                <td class="product-total">
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
                                                    } elseif ($dh['TrangThai'] == 'da_nhan' && $timestampNgayHienTai > $timestampNgayTra) {
                                                        $chenhLechNgay = ($timestampNgayHienTai - $timestampNgayTra) / (60 * 60 * 24);
                                                        echo  $chenhLechNgay;
                                                    }
                                                    ?></td>
                                            </tr>
                                            <tr>
                                                <td class="product-name">Tổng ngày thuê </td>
                                                <td class="product-total"><?php $timestampNhan = strtotime($dh['NgayNhan']);
                                                                            $timestampTra = strtotime($dh['NgayTraDuKien']);
                                                                            // Tính số ngày chênh lệch
                                                                            $soNgay = ($timestampTra - $timestampNhan) / (60 * 60 * 24);
                                                                            if (isset($chenhLechNgay)) {
                                                                                if ($chenhLechNgay > 1) {
                                                                                    $soNgay = $soNgay + $chenhLechNgay;
                                                                                }
                                                                            }
                                                                            echo $soNgay  ?></td>
                                            </tr>
                                            <tr>
                                                <td class="product-name order-total">Tổng thanh toán</td>
                                                <td class="product-total order-total">
                                                    <?= number_format($dh['GiaCHHT'] * $soNgay) ?> VND
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </div>
                </form>
            </div>
            <!-- Checkout-Billing-details and order end -->
        </div>
    </div>
    <!-- CHECKOUT-AREA END -->

</section>
<!-- PAGE-CONTENT END -->