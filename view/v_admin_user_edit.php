<h2 class="my-3 text-center">Sửa tài khoản</h2>

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
<div class="d-flex align-items-center justify-content-center">
    <form class="w-50" action="" method="POST" id="myForm">

        <div class="mb-3">
            <label for="TenKhachHang" class="form-label">Họ và tên</label>
            <input type="text" class="form-control" id="TenKhachHang" aria-describedby="emailHelp" name="TenKhachHang"
                value="<?= $tk['TenKhachHang'] ?>" />
        </div>

        <div class="mb-3">
            <label for="SoDienThoai" class="form-label">Số điện thoại</label>
            <input type="number" class="form-control" id="SoDienThoai" aria-describedby="emailHelp" name="SoDienThoai"
                required pattern="[0-9]{10,12}" value="<?= $tk['SoDienThoai'] ?>" />
            <div class="error-message" id="SoDienThoaiSai"></div>
        </div>

        <div class="mb-3">
            <label for="Email" class="form-label">Email</label>
            <input type="email" class="form-control" id="Email" aria-describedby="emailHelp" name="Email"
                value="<?= $tk['Email'] ?>" />
        </div>

        <div class="mb-3">
            <label for="Quyen" class="form-label">Quyền</label>
            <select class="form-select" name="Quyen">
                <option value="0" <?= ($tk['Quyen'] == 0) ? 'selected' : '' ?>>Khách</option>
                <option value="1" <?= ($tk['Quyen'] == 1) ? 'selected' : '' ?>>Quản lý</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="DiaChiKhachHang" class="form-label">Địa chỉ khách hàng</label>
            <input type="text" class="form-control" id="DiaChiKhachHang" aria-describedby="emailHelp"
                name="DiaChiKhachHang" value="<?= $tk['DiaChiKhachHang'] ?>" />
        </div>

        <button type="submit" name="submit" value="submit" class="btn btn-primary">Xác nhận</button>
    </form>
</div>

<script>
document.getElementById("myForm").addEventListener("submit", function(event) {
    var SoDienThoai = document.getElementById("SoDienThoai").value;
    var SoDienThoaiSai = document.getElementById("SoDienThoaiSai");

    SoDienThoaiSai.innerHTML = "";

    // Kiểm tra xem số điện thoại có đúng định dạng không
    var phonePattern = /^[0-9]{10,12}$/;
    if (!phonePattern.test(SoDienThoai)) {
        SoDienThoaiSai.innerHTML = "Số điện thoại không hợp lệ";
        event.preventDefault();
    }
});
</script>
<style>
.error-message {
    color: red;
}
</style>