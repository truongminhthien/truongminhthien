<!-- PAGE-CONTENT START -->
<section class="page-content">
    >
    <!-- CHECKOUT-AREA START -->
    <div class="checkout-area margin-bottom-80">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h3 class="title-6 margin-bottom-50"
                        style=" font-size: 32px; font-weight: 600;text-align: center;margin-top: 20px;">
                        Thủ tục thanh toán</h3>
                </div>
            </div>

            <div class="coupon-area" style="<?php if (isset($_SESSION['user'])) {
                                                echo 'display: none;';
                                            }  ?>">
                <div class="row">
                    <div class="col-md-12">
                        <div class="coupon-accordion">
                            <!-- ACCORDION START -->
                            <h3>Lưu ý: <span id="showlogin"> Đăng nhập ngay</span></h3>

                            <!-- Genaral Login start -->
                            <div class="coupon-info margin-bottom-50">
                                <p class="coupon-text margin-bottom-50">Bạn cần đăng nhập để có thể thuê căn hộ của
                                    chúng tôi!</p>
                            </div>
                            <!-- Genaral Login end -->

                        </div>
                    </div>
                </div>
            </div>
            <!-- Checkout-Billing-details and order start -->
            <div class="checkout-bill-order">
                <form action="index.php?mod=page&act=buy" method="post">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="checkout-bill">
                                <h3 class="title-7 margin-bottom-50" style="font-size: 24px;">Thôg tin khách hàng</h3>
                            </div>
                            <div class="row coupon-info">
                                <div class="col-md-12">
                                    <p class="form-row-first">
                                        <label>Tên <span class="required">*</span></label>
                                        <input type="text" disabled value="<?php if (isset($_SESSION['user'])) {
                                                                                echo $_SESSION['user']['TenKhachHang'];
                                                                            }; ?>" />
                                    </p>
                                </div>
                            </div>
                            <div class="row coupon-info">
                                <div class="col-md-12">
                                    <p class="form-row-first">
                                        <label>Email </label>
                                        <input type="text" disabled value="<?php if (isset($_SESSION['user'])) {
                                                                                echo $_SESSION['user']['Email'];
                                                                            }; ?>" />
                                    </p>
                                </div>
                            </div>
                            <div class="row coupon-info">
                                <div class="col-md-12">
                                    <p class="form-row-first">
                                        <label>Số điện thoại <span class="required">*</span></label>
                                        <input type="text" disabled value="<?php if (isset($_SESSION['user'])) {
                                                                                echo $_SESSION['user']['SoDienThoai'];
                                                                            }; ?>" />
                                    </p>
                                </div>

                            </div>
                            <div class="row coupon-info">
                                <div class="col-md-12">
                                    <p class="form-row-first">
                                        <label>Địa chỉ </label>
                                        <input type="text" disabled value="<?php if (isset($_SESSION['user'])) {
                                                                                echo $_SESSION['user']['DiaChiKhachHang'];
                                                                            }; ?>" />
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
                                                <th class="product-total"
                                                    style="width: 60%;font-size: 18px;font-weight: 600;">Thông tin</th>
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
                                                <td class="product-total"><?= $_POST['datePicker1'] ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="product-name">Ngày Trả </td>
                                                <td class="product-total">
                                                    <?= $_POST['datePicker2'] ?></td>
                                            </tr>
                                            <tr>
                                                <td class="product-name">Tổng ngày thuê </td>
                                                <td class="product-total"><?= $soNgay ?></td>
                                            </tr>
                                            <tr>
                                                <td class="product-name order-total">Tổng thanh toán</td>
                                                <td class="product-total order-total">
                                                    <?= number_format($apartment_rentnow['GiaCH'] * $soNgay) ?> VND</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div class="payment-method">
                                        <div class="payment-accordion">
                                            <!-- ACCORDION START -->
                                            <h3 class="payment-accordion-toggle active">Chuyển khoản</h3>
                                            <div class="payment-content default">
                                                <p>Chuyển khoản giúp khách hàng nhanh chóng thanh toán đơn thuê căn hộ
                                                    của mình, nhân viên của chúng tôi sẽ nhanh chóng xác nhận đơn hàng
                                                    trong 10p dến 1h.</p>
                                            </div>
                                            <!-- ACCORDION END -->
                                            <!-- ACCORDION START -->
                                            <h3 class="payment-accordion-toggle">Tại quầy giao dịch</h3>
                                            <div class="payment-content">
                                                <p>Bạn hãy đến trung tâm Fpoly để thanh toán, sau khi thanh toán đơn
                                                    thuê sẽ được xác nhận.</p>
                                            </div>
                                            <!-- ACCORDION END -->
                                            <!-- ACCORDION START -->
                                            <h3 class="payment-accordion-toggle">PayPal</h3>
                                            <div class="payment-content">
                                                <p>Pay via PayPal; you can pay with your credit card if you don’t have a
                                                    PayPal account.</p>
                                                <a href="#"><img src="assets/img/bg/payment.png" alt="" /></a>
                                            </div>
                                            <!-- ACCORDION END -->
                                            <div style="color: red;">

                                                <?= !isset($_SESSION['user']) ? 'CẦN ĐĂNG NHẬP ĐỂ THANH TOÁN!' : ''; ?>
                                            </div>
                                        </div>
                                        <div class="order-button-payment">
                                            <input type="hidden" value="<?= $apartment_rentnow['MaCH'] ?>" name="mach">
                                            <input type="hidden" value="<?php if (isset($_SESSION['user'])) {
                                                                            echo $_SESSION['user']['MaTK'];
                                                                        }; ?>" name="matk">
                                            <input type="hidden" value="<?= $ngayNhan ?>" name="ngaynhan">
                                            <input type="hidden" value="<?= $ngayTra ?>" name="ngaytra">
                                            <input type="hidden" value="<?= $apartment_rentnow['GiaCH']?>" name="giach">
                                            <input type="submit" value="Xác nhận"
                                                <?= isset($_SESSION['user']) ? '' : 'disabled'; ?> />
                                        </div>
                                    </div>
                                </div>
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