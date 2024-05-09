<style>
.contact-info ul li {
    border-bottom: 1px solid #e8e8e9;
    float: left;
    font-size: 16px;
    line-height: 40px;
    list-style: outside none none;
    margin: 0;
    padding: 0;
    width: 100%;
}

.contact-info h3,
.contact-form h3 {
    border-bottom: 2px solid #e8e8e9 !important;
    font-size: 18px;
}

.page-banner-area {
    background: rgba(0, 0, 0, 0) url(uploads/product/bg-breadcrumb.jpg) no-repeat scroll center center;
}
</style>

<!-- PAGE-CONTENT START -->
<section class="page-content">
    <h2 style="text-align: center; margin-top: 16px;">Liên Hệ</h2>
    <!-- CONTACT-AREA START -->
    <div class="contact-area margin-bottom-80">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-4 col-xs-12">

                    <!-- widget-top-brand start -->
                    <aside class="widget top-rated">
                        <h5 class="sidebar-title">Căn Hộ Hàng Đầu</h5>
                        <div class="sidebar-product">
                            <!-- Single-product start -->
                            <?php foreach ($laych as $key) : extract($key) ?>
                            <div class="single-product">
                                <div class="product-photo">
                                    <a href="#">
                                        <img class="primary-photo"
                                            src="uploads//product/<?= $arrayHinhAnh = explode('||', $DSHinhAnh)[0] ?>"
                                            alt="" />
                                    </a>
                                </div>
                                <div class="product-brief">
                                    <h2><a href="#"><?php echo substr($TenCanHo, 0, 13) ?></a></h2>
                                    <h3><?php $gia_tien = number_format($GiaCH, 0, '.', ',');
                                            echo $gia_tien; ?>
                                        VNĐ</h3>
                                </div>
                            </div>
                            <?php endforeach; ?>
                            <!-- Single-product end -->
                        </div>
                    </aside>
                    <!-- widget-top-brand end -->
                </div>
                <div class="col-md-9 col-sm-8 col-xs-12">
                    <!-- Start Map area -->
                    <div class="map-area">
                        <div id="googleMap" style="width:100%;height:350px;">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7836.881734040705!2d106.62618160000001!3d10.854034200000005!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752bee0b0ef9e5%3A0x5b4da59e47aa97a8!2zQ8O0bmcgVmnDqm4gUGjhuqduIE3hu4FtIFF1YW5nIFRydW5n!5e0!3m2!1svi!2s!4v1700129502541!5m2!1svi!2s"
                                width="600" height="450" style="width:100%;height:350px;border:0;" allowfullscreen=""
                                loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                    <!-- End Map area -->
                    <div class="row">
                        <!-- contact-info start -->
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="contact-info">
                                <h3>Thông Tin Liên Hệ</h3>
                                <ul>
                                    <li>
                                        <i class="fa fa-map-marker"></i> <strong>Địa Chỉ:</strong>
                                        Công viên phần mềm Quang QTSC Building 1, Trung, P Q.12, Thành phố Hồ Chí
                                        Minh, Việt Nam
                                    </li>
                                    <li>
                                        <i class="fa fa-mobile"></i> <strong>Số Điện Thoại:</strong>
                                        +84123456789
                                    </li>
                                    <li>
                                        <i class="fa fa-envelope"></i> <strong>Email:</strong>
                                        <a href="#">gameming132@gmail.com</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- contact-info end -->
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="contact-form">
                                <h3><i class="fa fa-envelope-o"></i> Liên hệ trực tiếp</h3>
                                <div class="row">
                                    <form action="" method="POST">
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input name="ten" require type="text" placeholder="Họ Và Tên" required />
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input name="email" type="email" placeholder="Email" required />
                                        </div>
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <input name="tieude" type="text" placeholder="Tiêu Đề" required />
                                        </div>
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <textarea name="noidung" id="message" cols="30" rows="10"
                                                placeholder="Nội Dung" required></textarea>
                                            <input type="submit" name="gui" value="Gửi Thông Tin" />
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- CONTACT-AREA END -->
</section>
<!-- PAGE-CONTENT END -->