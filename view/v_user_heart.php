<section class="page-content">

    <!-- SHOPPING-CART-AREA START -->
    <div class="shopping-cart-area margin-bottom-80">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h3 class="title-6 margin-bottom-50"
                        style=" margin: 35px;text-align: center;font-size: 34px;font-weight: 600; color: #5b5b5b;">Các
                        căn hộ đã được yêu thích</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <form action="#">
                        <div class="table-content table-responsive">
                            <table>
                                <thead>
                                    <tr>
                                        <th class="product-thumbnail">Hình ảnh</th>
                                        <th class="product-name">Tên căn hộ</th>
                                        <th class="product-edit">Địa chỉ</th>
                                        <th class="product-price">Đặc điểm</th>
                                        <th class="product-quantity">Giá/Ngày</th>
                                        <th class="product-subtotal">Star</th>
                                        <th class="product-remove">Xóa</th>
                                    </tr>
                                </thead>
                                <!-- hiển thị các căn hộ đã được yêu thích -->
                                <?php foreach ($heart_Apartment as $Apartment) :
                                    $arrayHinhAnh = explode('||', $Apartment['DSHinhAnh']); ?>
                                <tbody>
                                    <tr>
                                        <td class="product-thumbnail"><a href="#"><img
                                                    src="uploads/product/<?= $arrayHinhAnh[0] ?>" alt="" /></a></td>
                                        <td class="product-name"><a
                                                href="index.php?mod=page&act=product&id=<?= $Apartment['mach2'] ?>"><?= $Apartment['TenCanHo'] ?></a>
                                        </td>
                                        <td class="product-edit"><a href="#"><?= $Apartment['DiaChiCH'] ?></a></td>
                                        <td class="product-quantity">
                                            Số phòng: <?= $Apartment['SoPhong'] ?>
                                            <br>
                                            Diện tích: <?= $Apartment['DienTich']  ?> m<sup>2</sup>
                                        </td>
                                        <td class="product-price" style="color:red;">
                                            <span class="amount">
                                                <?= number_format($Apartment['GiaCH']) . ' VND' ?>
                                            </span>
                                        </td>
                                        <td class="product-subtotal"><?php
                                                                            if ($Apartment['sosao'] == '') {
                                                                                echo '5 Sao';
                                                                            } else {
                                                                                echo intval($Apartment['sosao']) . ' Sao';
                                                                            }
                                                                            ?></td>
                                        <td class="product-remove"><a
                                                href="index.php?mod=page&act=remove_heart&id=<?= $Apartment['MaYT'] ?>"><i
                                                    class="pe-7s-close"></i></a></td>
                                    </tr>
                                </tbody>
                                <?php endforeach; ?>
                            </table>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- SHOPPING-CART-AREA END -->