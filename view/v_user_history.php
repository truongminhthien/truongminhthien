<section class="page-content">

    <!-- SHOPPING-CART-AREA START -->
    <div class="shopping-cart-area margin-bottom-80">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h3 class="title-6 margin-bottom-50" style=" margin: 35px;text-align: center;font-size: 34px;font-weight: 600; color: #5b5b5b;">Các
                        đơn thuê căn hộ của bạn</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">

                    <div class="table-content table-responsive">
                        <table>
                            <thead>
                                <tr>
                                    <th class="product-thumbnail">Hình ảnh</th>
                                    <th class="product-name">Tên căn hộ</th>
                                    <th class="product-edit">Địa chỉ</th>
                                    <th class="product-price">Ngày thuê</th>
                                    <th class="product-quantity" style="width: 15%;">Giá</th>
                                    <th class="product-remove">Ngày lập đơn</th>
                                    <th class="product-subtotal">Hành động</th>

                                </tr>
                            </thead>
                            <!-- hiển thị các căn hộ đã được yêu thích -->
                            <?php foreach ($history_Apartment  as $Apartment) :
                                $arrayHinhAnh = explode('||', $Apartment['DSHinhAnh']); ?>
                                <tbody>
                                    <tr>
                                        <td class="product-thumbnail"><a href="#"><img src="uploads/product/<?= $arrayHinhAnh[0] ?>" alt="" /></a>
                                            <div class="box_tb">
                                                <?php
                                                date_default_timezone_set('Asia/Ho_Chi_Minh');
                                                $ngayHienTai = date("Y-m-d");

                                                $ngayTra = $Apartment['NgayTra'];
                                                // Chuyển đổi chuỗi ngày thành timestamp
                                                $timestampNgayHienTai = strtotime($ngayHienTai);
                                                $timestampNgayTra = strtotime($ngayTra);

                                                if ($Apartment['TrangThai'] == 'da_huy') {
                                                    echo '<div style=" width: 100%; background-color: #ff7b7b; padding: 2px;">
                                                 Đã hủy</div>';
                                                } else if ($Apartment['TrangThai'] == 'dang_tra') {
                                                    echo '<div style=" width: 100%; background-color: #5790ea; padding: 2px;">
                                                 Đang trả</div>';
                                                } else if ($Apartment['TrangThai'] == 'dang_huy') {
                                                    echo '<div style=" width: 100%; background-color: #ff7b7b; padding: 2px;">
                                                 Đang hủy</div>';
                                                } else if (
                                                    $Apartment['TrangThai'] == 'da_nhan' && $ngayHienTai >
                                                    $Apartment['NgayTra']
                                                ) {
                                                    echo '<div style=" width: 100%; background-color: red; padding: 2px;">
                                                 Quá hạn</div>';
                                                } else if (
                                                    $Apartment['TrangThai'] == 'da_nhan' && $ngayHienTai >
                                                    $Apartment['NgayTra']
                                                ) {
                                                    echo '<div style=" width: 100%; background-color: red; padding: 2px;">
                                                 Quá hạn</div>';
                                                } else if ($Apartment['TrangThai'] == 'da_nhan') {
                                                    echo '<div style=" width: 100%; background-color: #5790ea;  padding: 2px;">
                                                 Đã nhận</div>';
                                                } else if ($Apartment['TrangThai'] == 'da_tra') {
                                                    echo '<div style=" width: 100%; background-color: #5790ea;  padding: 2px;">
                                                 Hoàng thành</div>';
                                                } else if ($Apartment['TrangThai'] == 'da_duyet') {
                                                    echo '<div style=" width: 100%; background-color: #5790ea; padding: 2px;"> Đã duyệt</div>';
                                                } else {
                                                    echo '<div style=" width: 100%; background-color: #53ed67;  padding: 2px;">
                                                 Đang duyệt</div>';
                                                }
                                                ?>
                                            </div>
                                        </td>

                                        <td class="product-name"><a href="index.php?mod=page&act=product&id=<?= $Apartment['mach'] ?>"><?= $Apartment['TenCanHo'] ?></a>
                                        </td>
                                        <td class="product-edit"><a href="#"><?= $Apartment['DiaChiCH'] ?></a></td>
                                        <td class="product-quantity">

                                            Ngày nhận:
                                            <?= $ngayDangFormatted = date('d/m/Y', strtotime($Apartment['NgayNhan'])); ?>
                                            <br>Ngày trả dự kiến:
                                            <?= $ngayDangFormatted = date('d/m/Y', strtotime($Apartment['NgayTraDuKien'])); ?>
                                            <br>

                                            <?php if ($Apartment['TrangThai'] == 'da_tra' || $Apartment['TrangThai'] == 'dang_tra') {
                                                echo 'Ngày trả:' . $ngayDangFormatted = date('d/m/Y', strtotime($Apartment['NgayTra']));
                                            } ?>
                                            <br>

                                            <span style="color: red;"> <?php
                                                                        date_default_timezone_set('Asia/Ho_Chi_Minh');

                                                                        $ngayHienTai = date("Y-m-d");
                                                                        $ngayTra = $Apartment['NgayTra'];
                                                                        $ngayTraDuKien = $Apartment['NgayTraDuKien'];

                                                                        $timestampNgayHienTai = strtotime($ngayHienTai);
                                                                        $timestampNgayTra = strtotime($ngayTra);
                                                                        $timestampNgayTraDuKien = strtotime($ngayTraDuKien);
                                                                        if ($Apartment['NgayTra'] > $Apartment['NgayTraDuKien']) {
                                                                            $chenhLechNgay = ($timestampNgayTra - $timestampNgayTraDuKien) / (60 * 60 * 24);
                                                                            echo 'Trễ hạn: ' . $chenhLechNgay . " ngày";
                                                                        } elseif ($Apartment['TrangThai'] == 'da_nhan' && $timestampNgayHienTai > $timestampNgayTra) {
                                                                            $chenhLechNgay = ($timestampNgayHienTai - $timestampNgayTra) / (60 * 60 * 24);
                                                                            echo 'Trễ hạn: ' . $chenhLechNgay . " ngày";
                                                                        }
                                                                        ?></span>
                                            <br>
                                            Tổng:
                                            <?php $timestampNhan = strtotime($Apartment['NgayNhan']);
                                            $timestampTra = strtotime($Apartment['NgayTraDuKien']);
                                            // Tính số ngày chênh lệch
                                            $soNgay = ($timestampTra - $timestampNhan) / (60 * 60 * 24);
                                            if (isset($chenhLechNgay)) {
                                                if ($chenhLechNgay > 1) {
                                                    $soNgay = $soNgay + $chenhLechNgay;
                                                }
                                            }
                                            echo $soNgay  ?>
                                            Ngày
                                        </td>
                                        <td class="product-price" style="color:black;">
                                            <span class="amount">
                                                Giá thuê/Ngày:
                                                <div style="color:red;">
                                                    <?= number_format($Apartment['GiaCH']) . ' VND' ?></div>
                                                <br>
                                                Tổng giá thuê:
                                                <div style="color:red;">
                                                    <?= number_format($Apartment['GiaCHHT'] * $soNgay) . ' VND' ?></div>
                                            </span>
                                        </td>
                                        <td class="product-remove"> Ngày thuê:
                                            <?php echo $ngayDangFormatted = date('d/m/Y H:i:s', strtotime($Apartment['NgayLapDon']));
                                            // Ngày hiện tại
                                            ?>
                                        </td>
                                        <td class="product-subtotal">
                                            <?php
                                            echo '<form action="index.php?mod=page&act=history_update" method="post"
                                                onsubmit="return confirmSubmit()">'
                                                . '<input type="hidden" name="id" value="' . $Apartment['MaDH'] . '">';
                                            // Ngày hiện tại
                                            date_default_timezone_set('Asia/Ho_Chi_Minh');
                                            $ngayHienTai = date("Y-m-d");
                                            // Ngày trả của căn hộ (giả sử $Apartment['NgayTra'] là một chuỗi ngày trong định dạng "Y-m-d")
                                            $ngayTra = $Apartment['NgayTra'];
                                            // Chuyển đổi chuỗi ngày thành timestamp
                                            $timestampNgayHienTai = strtotime($ngayHienTai);
                                            $timestampNgayTra = strtotime($ngayTra);

                                            if ($Apartment['TrangThai'] == 'da_huy') {
                                                echo '<div style=" width: 100%; background-color: #ff7b7b; border-radius: 5px; padding: 2px;">Đã hủy</div>';
                                            } else if ($Apartment['TrangThai'] == 'dang_tra') {
                                                echo '<div  style=" width: 100%; background-color: #5790ea; border-radius: 5px; padding: 2px;">Đang trả</div>';
                                            } else if ($Apartment['TrangThai'] == 'dang_huy') {
                                                echo '<div  style=" width: 100%; background-color: #ff7b7b; border-radius: 5px; padding: 2px;">Đang hủy</div>';
                                            } else if ($Apartment['TrangThai'] == 'da_nhan' && $ngayHienTai > $Apartment['NgayTra']) {
                                                echo '<input type="submit" name="tra" style=" width: 100%; background-color: #ff0000; border-radius: 5px; padding: 5px;color: #3e3e3e;"
                                                    value="Trả ngay">';
                                            } else if ($Apartment['TrangThai'] == 'da_nhan') {
                                                echo '<input type="submit" name="tra"
                                                    style=" width: 100%; background-color: #ff0000; border-radius: 5px; padding: 5px;color: #3e3e3e;"
                                                    value="Trả ngay">';
                                            } else if ($Apartment['TrangThai'] == 'da_tra') {
                                                echo '<div style=" width: 100%; background-color: #5790ea; border-radius: 5px; padding: 2px;">Đã hoàn thành</div>';
                                            } else if ($Apartment['TrangThai'] == 'da_duyet') {
                                                echo '<input type="submit" name="huy" style=" width: 100%; background-color: #ff7b7b; border-radius: 5px; padding: 5px;color: #3e3e3e;"
                                                        value="Hủy đơn">';
                                            } else {
                                                echo '<input type="submit" name="huy" style=" width: 100%; background-color: #ff7b7b; border-radius: 5px; padding: 5px;color: #3e3e3e;"
                                                        value="Hủy đơn">';
                                            }
                                            ?>
                                            </form>

                                            <script>
                                                function confirmSubmit() {
                                                    // Lấy giá trị của TrangThai để xác định câu hỏi cần hiển thị
                                                    var trangThai = "<?php echo $Apartment['TrangThai']; ?>";

                                                    // Câu hỏi mặc định
                                                    var question = 'Bạn có chắc chắn muốn thực hiện hành động này?';

                                                    // Xác định câu hỏi dựa trên giá trị của TrangThai
                                                    if (trangThai == 'da_nhan' || trangThai == 'da_tra' || trangThai ==
                                                        'da_duyet') {
                                                        question = 'Bạn có chắc chắn muốn thực hiện hành động này?';
                                                    }

                                                    // Hiển thị hộp thoại xác nhận và trả về kết quả
                                                    return confirm(question);
                                                }
                                            </script>


                                        </td>
                                    </tr>
                                </tbody>
                            <?php endforeach; ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- SHOPPING-CART-AREA END -->