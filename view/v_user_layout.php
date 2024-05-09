<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Good Apartment</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" href="apple-touch-icon.png">
    <!-- Place favicon.ico in the root directory -->
    <!-- bootstrap v3.3.6 css -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <!-- animate css -->
    <link rel="stylesheet" href="assets/css/animate.css">
    <!-- jquery-ui.min css -->
    <link rel="stylesheet" href="assets/css/jquery-ui.min.css">
    <!-- meanmenu css -->
    <link rel="stylesheet" href="assets/css/meanmenu.min.css">
    <!-- nivo-slider css -->
    <link rel="stylesheet" href="assets/lib/css/nivo-slider.css">
    <!-- owl.carousel css -->
    <link rel="stylesheet" href="assets/css/owl.carousel.css">
    <!-- flaticon css -->
    <link rel="stylesheet" href="assets/css/shopick-icon.css">
    <!-- pe-icon-7-stroke css -->
    <link rel="stylesheet" href="assets/css/pe-icon-7-stroke.css">
    <!-- lightbox css -->
    <link rel="stylesheet" href="assets/css/lightbox.min.css">
    <!-- style css -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- responsive css -->
    <link rel="stylesheet" href="assets/css/responsive.css">
    <!-- modernizr css -->
    <script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>
    <!-- Liên kết với Awesome -->
    <script src="https://kit.fontawesome.com/0cf775c6e4.js" crossorigin="anonymous"></script>
    <!-- Kết nối thư viện css của lịch -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link rel="stylesheet" type="text/css" href="https://npmcdn.com/flatpickr/dist/themes/material_blue.css">
    <!-- kết nối thư viện lịch  -->
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <!-- Hậu -->
    <!-- <link rel="stylesheet" href="assets/css/tin.css">
    <script src="https://kit.fontawesome.com/0cf775c6e4.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous"> -->
    <!-- Hậu -->
</head>

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

    <!-- HEADER-AREA START -->
    <header class="header-area">
        <!-- Header-Top Start -->
        <div class="header-top hidden-xs">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-sm-6">
                        <div class="header-top-left text-left">
                            <ul>
                                <li>
                                    <i style="font-size: 16px;" class="sp-phone"></i>
                                    <span style="font-size: 16px;">036 484 2677</span>
                                </li>
                                <li>
                                    <i style="font-size: 16px;" class="sp-email"></i>
                                    <span style="font-size: 16px;">gameming132@gmail.com</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <div class="header-top-right pull-right">

                            <div class="header-search">
                                <!-- <form action="#">
                                    <input type="text" placeholder="Tìm căn hộ..." />
                                    <button type="submit"><i class="sp-search"></i></button>
                                </form> -->
                                <ul>
                                    <li><a style="font-size: 16px;">

                                            <?php
if (isset($_SESSION['user'])) {
    echo $_SESSION['user']['TenKhachHang'];
} else {
    echo 'Tài Khoản';
}
?> <span><i class="sp-gear"></i></span>
                                        </a>
                                        <ul class="submenu" style="font-size: 16px;">
                                            <?php
if (isset($_SESSION['user'])) {
    if ($_SESSION['user']['Quyen'] == 1) {
        echo '<li><a href="index.php?mod=admin&act=dashboard">Vào quản trị</a></li>';
    }
    echo '<li><a href="index.php?mod=user&act=updateusr">Tài khoản</a></li>';
    echo '<li><a href="index.php?mod=page&act=history">Lịch sử thuê</a></li>';
    echo '<li><a href="index.php?mod=logout">Đăng xuất</a></li>';
} else {
    echo '<li><a href="index.php?mod=user&act=login">Đăng nhập</a></li>';
    echo '<li><a href="index.php?mod=user&act=register">Đăng ký</a></li>';
}
?>

                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Header-Top End -->
        <!-- Main-Header Start -->
        <div class="main-header">
            <div class="container">
                <div class="row">
                    <div class="col-md-2 col-sm-6 col-xs-12">
                        <div class="logo">
                            <a href="index.php"><img style="height: 70px;" src="uploads/logo1.jpg" alt="" /></a>
                        </div>
                    </div>
                    <div class="col-md-8 hidden-sm hidden-xs">
                        <div class="main-menu pull-right" style="font-size: 18px;">
                            <nav>
                                <ul>
                                    <li><a href="index.php?mod=page&act=home">Trang Chủ</a>
                                    </li>
                                    <li><a href="index.php?mod=page&act=apartment">Căn hộ</a>
                                        <ul class="submenu">
                                            <li class="submenu-title"><a href="#">Loại căn hộ</a></li>
                                            <li><a href="?mod=page&act=apartment&loai=2">Căn hộ thông thường</a></li>
                                            <li><a href="?mod=page&act=apartment&loai=1">Căn hộ studio</a></li>
                                            <li><a href="?mod=page&act=apartment&loai=3">Căn hộ Mini</a></li>

                                        </ul>
                                    </li>
                                    <li><a href="index.php?mod=page&act=blog">Tin tức</a></li>
                                    <li><a href="<?php
if (isset($_SESSION['user'])) {
    echo 'index.php?mod=page&act=history';
} else {
    echo 'index.php?mod=page&act=login';
}
?>">Lịch sử</a></li>
                                    <li><a href="index.php?mod=page&act=contact">Liên hệ</a>
                                    </li>
                                    <li><a href="index.php?mod=page&act=about">Giới thiệu</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-6 col-xs-12">
                        <div class="total-cart">
                            <ul>
                                <li>
                                    <a href="<?php
if (isset($_SESSION['user'])) {
    echo 'index.php?mod=page&act=heart';
} else {
    echo 'index.php?mod=page&act=login';
}
?>">
                                        <span class="total-cart-number" style="font-size: 16px;">Căn hộ yêu thích</span>
                                        <span><i class="sp-heart"></i></span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Main-Header End -->
        <!-- Mobile-menu start -->
        <div class="mobile-menu-area hidden-md hidden-lg">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="mobile-menu">
                            <nav id="dropdown">
                                <ul>
                                    <li><a href="index.php?mod=page&act=home">Trang chủ</a> </li>
                                    <li><a href="index.php?mod=page&act=apartment">Căn hộ</a>
                                        <ul class="submenu">
                                            <li class="submenu-title"><a href="#">Loại căn hộ</a></li>
                                            <li><a href="?mod=page&act=apartment&loai=2">Căn hộ thông thường</a></li>
                                            <li><a href="?mod=page&act=apartment&loai=1">Căn hộ Studio</a></li>
                                            <li><a href="?mod=page&act=apartment&loai=3">Căn hộ Mini</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="index.php?mod=page&act=blog">Tin tức</a></li>
                                    <li><a href="<?php
if (isset($_SESSION['user'])) {
    echo 'index.php?mod=page&act=history';
} else {
    echo 'index.php?mod=page&act=login';
}
?>">Lịch sử</a></li>
                                    <li><a href="index.php?mod=page&act=contact">Liên hệ</a>
                                    </li>
                                    <li><a href="index.php?mod=page&act=about">Giới thiệu</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Mobile-menu end -->
    </header>
    <!-- HEADER-AREA END -->
    <!-- <pre>
        <?php
// @print_r($_SESSION['user']);
?>
    </pre> -->
    <?php
include_once 'view/v_' . $view_name . '.php';
?>
    <!-- FOOTER-AREA START -->
    <footer class="footer-area">
        <div class="footer-top" style="opacity: 1 !important;">
            <div class="footer">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4 col-sm-4 col-xs-12">
                            <div class="single-footer footer-logo">
                                <img style="width: 200px;" src="uploads/product/logongang.jpg" alt="" />
                                <p>Đây là tài liệu trình bày quá trình phát triển của dự án website cho thuê căn hộ dịch
                                    vụ Good Apartment. Website nhằm mục đích tìm hiểu và học tập.</p>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-12">
                            <div class="single-footer footer-menu">
                                <h2>Nhóm phát triển</h2>
                                <ul style=" width: 200px; margin: 0 auto;  list-style-type: none; padding: 0 0 0 20px;">
                                    <li><a href="#">Phan Trọng Phước </a></li>
                                    <li><a href="#">Lê Hoàng Phúc</a></li>
                                    <li><a href="#">Trương Minh thiện</a></li>
                                    <li><a href="#">Nguyễn Phúc Hậu</a></li>
                                    <li><a href="#">Võ Hùng Vĩ</a></li>
                                    <li><a href="#">Trần Thanh Tú</a></li>
                                </ul>
                            </div>
                        </div>
                        <style>
                        .single-footer {
                            text-align: center;
                            /* Căn giữa nội dung trong div */
                        }

                        .single-footer ul {
                            list-style-type: none;
                            /* Loại bỏ dấu chấm của danh sách */
                            padding: 0;
                            /* Loại bỏ padding mặc định của danh sách */
                        }

                        .single-footer li {
                            text-align: left;
                            /* Căn chữ canh trái trong danh sách */
                        }
                        </style>
                        <div class="col-md-4 col-sm-4 col-xs-12">
                            <div class="single-footer footer-contact" style="width: 280px; margin: 0 auto;">
                                <h2>Liên hệ</h2>
                                <ul>
                                    <li>
                                        <i class="sp-phone"></i>
                                        <span> 036 484 2677, 033 827 3455</span>
                                    </li>
                                    <li>
                                        <i class="sp-email"></i>
                                        <span>phuocptps31829@gmail.com</span>
                                    </li>
                                    <li>
                                        <i class="sp-map-marker"></i>
                                        <span>Fpoly Quận 12 Hồ Chí Minh</span>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <!-- <div class="col-md-3 col-sm-4 col-xs-12">
                            <div class="single-footer footer-message">
                                <form action="#">
                                    <h2>Liên kết</h2>
                                    <div class="footer-message-box">
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <div class="footer-social text-left">
                                                <a href="#"><i class="sp-facebook"></i></a>
                                                <a href="#"><i class="sp-twitter"></i></a>
                                                <a href="#"><i class="sp-linkedin"></i></a>
                                                <a href="#"><i class="sp-google"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div> -->
                    </div>
                </div>
            </div>
        </div>
        </div>
        <div class="copyright">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="copyright-brief">
                            <p>Copyright &copy; <a href=""></a> Nhóm Good Apartment</p>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <!-- <div class="footer-social text-right">
                            <a href="#"><i class="sp-facebook"></i></a>
                            <a href="#"><i class="sp-twitter"></i></a>
                            <a href="#"><i class="sp-linkedin"></i></a>
                            <a href="#"><i class="sp-google"></i></a>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- FOOTER-AREA END -->


    <!-- all js here -->
    <!-- jquery latest version -->
    <script src="assets/js/vendor/jquery-1.12.0.min.js"></script>
    <!-- bootstrap js -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- jquery.nivo.slider js -->
    <script src="assets/lib/js/jquery.nivo.slider.js"></script>
    <script src="assets/lib/home.js"></script>
    <!-- owl.carousel js -->
    <script src="assets/js/owl.carousel.min.js"></script>
    <!-- meanmenu js -->
    <script src="assets/js/jquery.meanmenu.js"></script>
    <!-- jquery-ui js -->
    <script src="assets/js/jquery-ui.min.js"></script>
    <!-- lightbox.min js -->
    <script src="assets/js/lightbox.min.js"></script>
    <!-- countdon.min js -->
    <script src="assets/js/countdon.min.js"></script>
    <!-- wow js -->
    <script src="assets/js/wow.min.js"></script>
    <script type="text/javascript">
    new WOW().init();
    </script>
    <!-- plugins js -->
    <script src="assets/js/plugins.js"></script>
    <!-- main js -->
    <script src="assets/js/main.js"></script>
    <!-- Thêm chức năng yêu thích -->
    <script src="assets/js/heart-product.js"></script>

</body>

</html>