<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/tin.css">
</head>

<body>
    <div class="container" style="margin-top: 80px;">
        <div class="row">
            <div class="col-sm-9 w-100%">

                <?php
                echo '
        <h1>' . $show_tin['TieuDe'] . '</h1>
        <span style=" font-size: 18px; line-height: 30px; margin-bottom: 10px; ">' . $show_tin['MoTa'] . '</span>
        <div style="display: flex; justify-content: flex-end; margin-top: 10px; margin-right: 10px;">
        <div class="tin-info">
		<a style="width: 30px;height: 30px; margin-right: 10px;" href="index.php?mod=page&act=like_tin&MaTT=' . $show_tin['MaTT'] . '" class="like-button">
        <i class="fa-regular fa-thumbs-up" style="color: #eb0000; font-size: 27px;"></i></a>
    	<span class="tin-likes"> ' . $show_tin['luotthich'] . '</span>
		<i style=" color: #007BFF; margin-top: 6px; font-size: 20px; margin-right: 10px;" class="fa-regular fa-eye"></i>
        <span class="tin-views"> ' . $show_tin['luotxem'] . '</span>
		<i style=" color: #007BFF; margin-top: 6px; font-size: 20px; margin-right: 10px;" class="fa-solid fa-calendar-days"></i>
        <span class="tin-date"> ' . date('d-m-Y', strtotime($show_tin['NgayDang'])) . '</span>
        </div>
        </div>
        
		<span>' . $show_tin['NoiDung'] . '</span>
        ';
                ?>
                <h1>Một số tin khác</h1>
                <?php
                foreach ($tin_khac as $menu_tin) :
                ?>
                    <div class="col-md-6 col-sm-6 col-xs-12" style="overflow: hidden; height:430px">
                        <div class="single-blog">
                            <div class="blog-photo owl-item active" style="width: 400.2px; height: 260.2px; margin-right: 3px; overflow: hidden;">
                                <a style="width: 100%; height: 100%; display: block; overflow: hidden;" href="#">
                                    <img style="width: 100%; height: 100%; object-fit: cover;" src="<?= $menu_tin['HinhAnh'] ?>" alt="" />
                                </a>
                                <div class="blog-post-date">
                                    <span style="text-align: center; background-color: #42a5f5;"><?= $menu_tin['MaTT'] ?>th</span>
                                    <span style="text-align: center; background-color: #42a5f5;"><?= date('d-m-Y', strtotime($menu_tin['NgayDang'])) ?></span>
                                </div>
                            </div>
                            <div class="blog-brief">
                                <p style="font-size: 20px; color:black"><?= substr($menu_tin['TieuDe'], 0, 75) ?>...</p>
                                <div class="like-comment">
                                    <a href="#"><i class="sp-like"></i><?= $menu_tin['luotthich'] ?></a>
                                    <a href="#"><i class="fa-regular fa-eye"></i><?= $menu_tin['luotxem'] ?></a>
                                </div>
                                <a class="shop-now" href="index.php?mod=page&act=show_blog&MaTT=<?= $menu_tin['MaTT'] ?>">Xem Chi Tiết</a>
                            </div>
                        </div>
                    </div>
                <?php
                endforeach; ?>

            </div>
            <div class="col-md-3 col-sm-4 col-xs-12">
                <!-- widget-brand start -->
                <aside class="widget widget-brand">
                    <h5 style="text-align: center;" class="sidebar-title">Tìm Kiếm Tin</h5>
                    <ul>
                        <form class="d-flex" action="index.php?mod=page&act=seach_blog" method="POST">
                            <input class="form-control me-2 khung" type="search" name="key_tin" placeholder="Thông Tin cần Tìm" aria-label="Search">
                            <button class="btn btn-outline-success timkiem" type="submit" id="search">Tìm Kiếm</button>
                        </form>
                    </ul>
                </aside>
                <!-- widget-brand end -->
                <!-- widget-top-brand start -->
                <aside class="widget top-rated">
                    <h5 style="text-align: center;" class="sidebar-title">Top Tin Xem Nhiều Nhất</h5>
                    <div class="sidebar-product">
                        <!-- Single-product start -->
                        <?php foreach ($tin_luotxem as $menu_tin) : ?>
                            <div class="single-product">
                                <div class="product-photo">
                                    <a href="index.php?mod=page&act=show_blog&MaTT=<?= $menu_tin['MaTT'] ?>">
                                        <img class="primary-photo" src="<?= $menu_tin['HinhAnh'] ?>" alt="" />
                                    </a>
                                </div>
                                <div class="product-brief">
                                    <h2 style="font-size: 13px;"><a href="index.php?mod=page&act=show_blog&MaTT=<?= $menu_tin['MaTT'] ?>"><?= substr($menu_tin['TieuDe'], 0, 30) ?>...</a>
                                    </h2>
                                    <h10 style="font-size: smaller;">Số Lượt Xem: <?= $menu_tin['luotxem'] ?></h3>
                                </div>
                            </div>
                        <?php
                        endforeach;
                        ?>
                        <!-- Single-product end -->
                    </div>
                </aside>
                <!-- widget-brand end -->
                <!-- widget-top-brand start -->
                <aside class="widget top-rated">
                    <h5 style="text-align: center;" class="sidebar-title"> Căn Hộ Liên Quan </h5>
                    <div class="sidebar-product">
                        <!-- Single-product start -->
                        <?php foreach ($can_ho as $can_ho) :
                            $arrayHinhAnh = explode('||', $can_ho['DSHinhAnh'])
                        ?>
                            <div class="single-product">
                                <div class="product-photo">
                                    <a href="index.php?mod=page&act=product&id=<?= $can_ho['MaCH'] ?>">
                                        <img class="primary-photo" src="uploads/product/<?= $arrayHinhAnh[0] ?>" alt="" />
                                    </a>
                                </div>
                                <div class="product-brief">
                                    <h2 style="font-size: 13px;"><a href="index.php?mod=page&act=product&id=<?= $can_ho['MaCH'] ?>"><?= substr($can_ho['TenCanHo'], 0, 30) ?>...</a>
                                    </h2>
                                    <h10 style="font-size: smaller;">Giá: <a style="color: red;" href="index.php?mod=page&act=product&id=<?= $can_ho['MaCH'] ?>"><?= number_format($can_ho['GiaCH']) ?></a>
                                        VNĐ</h3>
                                </div>
                            </div>
                        <?php
                        endforeach;
                        ?>
                        <!-- Single-product end -->
                    </div>
                </aside>
            </div>
        </div>
    </div>