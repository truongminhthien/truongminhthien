<h2 class="my-3">Sửa căn hộ</h2>

<?php
foreach ($tk as $tk) :
?>
<form action="" method="POST" enctype="multipart/form-data">

    <div class="row">
        <div class="col">

            <div class="mb-3">
                <label for="TenCanHo" class="form-label">Tên căn hộ</label>
                <input type="text" class="form-control" id="TenCanHo" aria-describedby="emailHelp" name="TenCanHo"
                    value="<?= $tk['TenCanHo'] ?>" required />
            </div>

            <div class="mb-3">
                <label for="GiaCH" class="form-label">Giá căn hộ: Ngày/VNĐ</label>
                <input type="text" class="form-control" id="GiaCH" aria-describedby="emailHelp" name="GiaCH"
                    value="<?= $tk['GiaCH'] ?>" oninput="validateNumberInput(this)" maxlength="11" required />
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
                    <option value="0" <?= ($tk['TrangThai'] == 0) ? 'selected' : '' ?>>Ẩn</option>
                    <option value="1" <?= ($tk['TrangThai'] == 1) ? 'selected' : '' ?>>Hiện</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="MaLoai" class="form-label">Mã loại</label>
                <select class="form-select" name="MaLoai" required>
                    <option value="1" <?= ($tk['MaLoai'] == 1) ? 'selected' : '' ?>>Căn hộ studio</option>
                    <option value="2" <?= ($tk['MaLoai'] == 2) ? 'selected' : '' ?>>Căn hộ thông thường</option>
                    <option value="3" <?= ($tk['MaLoai'] == 3) ? 'selected' : '' ?>>Căn hộ Mini</option>
                </select>
            </div>

        </div>



        <div class="col">

            <div class="mb-3">
                <label for="DiaChiCH" class="form-label">Địa chỉ</label>
                <input type="text" class="form-control" id="DiaChiCH" aria-describedby="emailHelp" name="DiaChiCH"
                    value="<?= $tk['DiaChiCH'] ?>" required />
            </div>

            <div class="mb-3">
                <label for="MaKV" class="form-label">khu vực</label>
                <select class="form-select" name="MaKV" required>
                    <option value="1" <?= ($tk['MaKV'] == 1) ? 'selected' : '' ?>>Quận 1</option>
                    <option value="2" <?= ($tk['MaKV'] == 2) ? 'selected' : '' ?>>Quận 2</option>
                    <option value="3" <?= ($tk['MaKV'] == 3) ? 'selected' : '' ?>>Quận 3</option>
                    <option value="4" <?= ($tk['MaKV'] == 4) ? 'selected' : '' ?>>Quận 4</option>
                    <option value="5" <?= ($tk['MaKV'] == 5) ? 'selected' : '' ?>>Quận 5</option>
                    <option value="6" <?= ($tk['MaKV'] == 6) ? 'selected' : '' ?>>Quận 6</option>
                    <option value="7" <?= ($tk['MaKV'] == 7) ? 'selected' : '' ?>>Quận 7</option>
                    <option value="8" <?= ($tk['MaKV'] == 8) ? 'selected' : '' ?>>Quận 8</option>
                    <option value="9" <?= ($tk['MaKV'] == 9) ? 'selected' : '' ?>>Quận 9</option>
                    <option value="10" <?= ($tk['MaKV'] == 10) ? 'selected' : '' ?>>Quận 10</option>
                    <option value="11" <?= ($tk['MaKV'] == 11) ? 'selected' : '' ?>>Quận 11</option>
                    <option value="12" <?= ($tk['MaKV'] == 12) ? 'selected' : '' ?>>Quận 12</option>
                    <option value="13" <?= ($tk['MaKV'] == 13) ? 'selected' : '' ?>>Quận Tân Bình</option>
                    <option value="14" <?= ($tk['MaKV'] == 14) ? 'selected' : '' ?>>Quận Phú Nhuận</option>
                    <option value="15" <?= ($tk['MaKV'] == 15) ? 'selected' : '' ?>>Quận Gò Vấp</option>
                    <option value="16" <?= ($tk['MaKV'] == 16) ? 'selected' : '' ?>>Quận Bình Thạnh</option>
                    <option value="17" <?= ($tk['MaKV'] == 17) ? 'selected' : '' ?>>Quận Bình Tân</option>
                    <option value="18" <?= ($tk['MaKV'] == 18) ? 'selected' : '' ?>>Quận Tân Phú</option>
                    <option value="19" <?= ($tk['MaKV'] == 19) ? 'selected' : '' ?>>Thành phố Thủ Đức</option>
                    <option value="20" <?= ($tk['MaKV'] == 20) ? 'selected' : '' ?>>Huyện Hóc Môn</option>
                    <option value="21" <?= ($tk['MaKV'] == 21) ? 'selected' : '' ?>>Huyện Củ Chi</option>
                    <option value="22" <?= ($tk['MaKV'] == 22) ? 'selected' : '' ?>>Huyện Nhà Bè</option>
                    <option value="23" <?= ($tk['MaKV'] == 23) ? 'selected' : '' ?>>Huyện Bình Chánh</option>
                    <option value="24" <?= ($tk['MaKV'] == 14) ? 'selected' : '' ?>>Huyện Cần Giờ</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="DienTich" class="form-label">Diện tích / m<sup>2</label>
                <input type="text" class="form-control" id="DienTich" aria-describedby="emailHelp" name="DienTich"
                    value="<?= $tk['DienTich'] ?>" required />
            </div>

            <div class="mb-3">
                <label for="SoPhong" class="form-label">Số phòng</label>
                <input type="text" class="form-control" id="SoPhong" aria-describedby="emailHelp" name="SoPhong"
                    value="<?= $tk['SoPhong'] ?>" required />
            </div>

        </div>
    </div>

    <div class="row">
        <div class="mb-3">
            <label required class="form-label">Hình ảnh hiện tại</label>
            <div class="row">
                <div class="col"><label for="Hinh1" class="form-label">Hình ảnh 1</label><img
                        class="rounded mx-auto d-block"
                        src="uploads/product/<?= $arrayHinhAnh = explode('||', $image['DSHinhAnh'])[0] ?>" alt=""
                        style="width:210px"></div>
                <div class="col"><label for="Hinh2" class="form-label">Hình ảnh 2</label><img
                        class="rounded mx-auto d-block"
                        src="uploads/product/<?= $arrayHinhAnh = explode('||', $image['DSHinhAnh'])[1]  ?>" alt=""
                        style="width:210px"></div>
                <div class="col"><label for="Hinh3" class="form-label">Hình ảnh 3</label><img
                        class="rounded mx-auto d-block"
                        src="uploads/product/<?= $arrayHinhAnh = explode('||', $image['DSHinhAnh'])[2]  ?>" alt=""
                        style="width:210px"></div>
                <div class="col"><label for="Hinh4" class="form-label">Hình ảnh 4</label><img
                        class="rounded mx-auto d-block"
                        src="uploads/product/<?= $arrayHinhAnh = explode('||', $image['DSHinhAnh'])[3]  ?>" alt=""
                        style="width:210px"></div>
            </div>
        </div>

        <div required class="mb-3">
            <div class="row">
                <div class="col"><label for="Hinh1" class="form-label">Thay đổi</label><input type="file"
                        class="form-control" id="Hinh1" aria-describedby="emailHelp" name="Hinh1" /></div>
                <div class="col"><label for="Hinh2" class="form-label">Thay đổi</label><input type="file"
                        class="form-control" id="Hinh2" aria-describedby="emailHelp" name="Hinh2" /></div>
                <div class="col"><label for="Hinh3" class="form-label">Thay đổi</label><input type="file"
                        class="form-control" id="Hinh3" aria-describedby="emailHelp" name="Hinh3" /></div>
                <div class="col"><label for="Hinh4" class="form-label">Thay đổi</label><input type="file"
                        class="form-control" id="Hinh4" aria-describedby="emailHelp" name="Hinh4" /></div>
            </div>
        </div>

        <div class="mb-3">
            <label for="MoTaCH" class="form-label">Mô tả</label>
            <textarea required type="text" class="form-control" id="MoTaCH" aria-describedby="emailHelp" name="MoTaCH"
                cols="30" rows="10" placeholder="<?= $tk['MoTaCH'] ?>"><?= $tk['MoTaCH'] ?></textarea>
        </div>






    </div>
    <button type="submit" name="submit" value="submit" class="btn btn-primary">Xác nhận</button>
    <?php endforeach; ?>
</form>
<br><br>