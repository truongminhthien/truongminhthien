<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Quản lý</title>
    <link href="assets/bootstrap-5.3.2-dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <link rel="stylesheet" href="assets/css/admin-manage.css">
    <link href="assets/bootstrap-5.3.2-dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="assets/css/shopick-icon.css">

    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div id="openMenu" class="col-md-2 p-0 collapse collapse-horizontal show"
                style="min-height: 100vh; background-color: #00B4D8;">
                <!-- <strong class="text-center d-block p-3 text-white">TRANG QUẢN LÝ</strong> -->
                <img src="./uploads/product/logongang.jpg" class="mx-auto d-block" style="width: 70%">
                <div class="list-group list-group-item-primary m-3">
                    <a href="index.php?mod=admin&act=dashboard"
                        class="list-group-item list-group-item-action <?= (strpos($view_name, 'dashboard')) ? 'active' : '' ?>">
                        Tổng quan
                    </a>
                    <a href="index.php?mod=admin&act=user"
                        class="list-group-item list-group-item-action <?= (strpos($view_name, 'user')) ? 'active' : '' ?>">Tài
                        khoản</a>
                    <a href="index.php?mod=admin&act=manage"
                        class="list-group-item list-group-item-action <?= (strpos($view_name, 'manage')) ? 'active' : '' ?>">Căn
                        hộ</a>
                    <a href="index.php?mod=admin&act=comment"
                        class="list-group-item list-group-item-action <?= (strpos($view_name, 'comment')) ? 'active' : '' ?>">Bình
                        luận</a>
                    <a href="index.php?mod=admin&act=quanlytin"
                        class="list-group-item list-group-item-action <?= (strpos($view_name, 'tin_tuc')) ? 'active' : '' ?>">Tin
                        tức</a>
                    <a href="index.php?mod=admin&act=khuvuc"
                        class="list-group-item list-group-item-action <?= (strpos($view_name, 'khuvuc')) ? 'active' : '' ?>">Khu
                        vực</a>
                    <a href="index.php?mod=admin&act=loai"
                        class="list-group-item list-group-item-action <?= (strpos($view_name, 'loai')) ? 'active' : '' ?>">Loại</a>
                    <a href="index.php?mod=admin&act=order"
                        class="list-group-item list-group-item-action <?= (strpos($view_name, 'order')) ? 'active' : '' ?>">Đơn
                        hàng</a>
                    <a href="index.php?mod=admin&act=contact"
                        class="list-group-item list-group-item-action <?= (strpos($view_name, 'contact')) ? 'active' : '' ?>">Liên
                        hệ</a>
                </div>
            </div>
            <div class="col-md p-0">
                <nav class="navbar navbar-expand-lg" data-bs-theme="dark" style="background-color: #00B4D8;">
                    <div class="container-fluid">
                        <button class="btn btn-outline-light me-2" type="button" data-bs-toggle="collapse"
                            data-bs-target="#openMenu" aria-expanded="false" aria-controls="openMenu">
                            <i class="fa-solid fa-bars"></i>
                        </button>
                        <a class="navbar-brand" href="#">Good Apartment</a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                        aria-expanded="false">
                                        Xin chào, <?= $_SESSION['user']['TenKhachHang'] ?>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a class="dropdown-item" href="index.php?mod=page&act=home">Xem trang
                                                chủ</a>
                                        </li>
                                        <li>
                                            <hr class="dropdown-divider" />
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="index.php?mod=logout">Đăng xuất</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
                <div class="container">
                    <?php include_once 'view/v_' . $view_name . '.php'; ?>
                </div>
            </div>
        </div>
    </div>

    <script src="https://kit.fontawesome.com/49f904a2f1.js" crossorigin="anonymous"></script>

    <!-- <script src="assets/bootstrap-5.3.2-dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script> -->
    <script src="assets/bootstrap-5.3.2-dist/js/bootstrap.bundle.min.js">
    </script>
</body>

</html>