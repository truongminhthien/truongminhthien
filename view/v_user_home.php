<!-- PAGE-CONTENT START -->
<style>
    /* .nivo-caption {
    opacity: 1;
} */
    .box-to {
        padding: 0;
        /* width: 45px; */
    }

    .box-to p {
        text-align: center;
        background-color: #61a7ef;
        width: 50px;
        border-radius: 5px;
        line-height: 55px;
        color: white;
        transform: translateY(-22%);
    }

    .inputdate {
        /* max-width: 180px; */
        background-color: #45a4f2;
        padding: 15px;
        font-family: "Roboto Mono", monospace;
        color: #ffffff;
        font-size: 18px;
        border: none;
        outline: none;
        border-radius: 5px;
        color: #ffffff;
        width: 100%;
    }

    .flatpickr-input[placeholder="Ngày nhận"]::placeholder {
        color: white;
        /* Màu của placeholder */
        opacity: 0.7;
        /* Độ mờ của placeholder */
    }

    .flatpickr-input[placeholder="Ngày trả"]::placeholder {
        color: white;
        /* Màu của placeholder */
        opacity: 0.7;
        /* Độ mờ của placeholder */
    }

    input[placeholder="Địa điểm"]::placeholder {
        color: white;
        /* Màu của placeholder */
        opacity: 0.7;
        /* Độ mờ của placeholder */
    }

    .boxinput-date {
        position: relative;
        display: inline;
    }

    .boxinput-date i {
        position: absolute;
        right: 20px;
        top: 50%;
        transform: translate(0, -50%);
        color: white;
        /* Màu của placeholder */
        opacity: 0.7;
        font-size: 20px;
    }

    .shop-now {
        border: 2px solid gray;
    }

    .btnsm:hover {
        background-color: #0872ca;
    }
</style>
<section class="page-content">
    <!-- SLIDER-AREA START -->
    <div class="slider-area margin-bottom-20">
        <div class="bend niceties preview-2">
            <div id="ensign-nivoslider" class="slides">
                <img style="" src="uploads/product/Banner11.png" alt="" title="#slider-direction-1" />
                <img style="" src="uploads/product/Banner22.png" alt="" title="#slider-direction-2" />
                <img style="" src="uploads/product/Banner33.png" alt="" title="#slider-direction-3" />
            </div>
            <!-- direction 1 -->
            <div id="slider-direction-1" style="opacity: 1;" class="t-cn slider-direction">
                <div class="slider-progress"></div>
                <div class="slider-content t-lfl s-tb">
                    <div class="title-container s-tb-c title-compress">
                        <div class="slider-1">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- NEW-COLLECTION START -->
    <!-- Mở nội dung tiêm kiếm -->
    <div class="best-sell-area">
        <div class="container" style="transform: translateY(-100px);position: relative;z-index: 99;">
            <div class="row">
                <div class="col-md-12">
                    <form action="index.php?mod=page&act=timkiem" method="post" onsubmit="return validateForm()">
                        <div class="row text-center" style=" background-color: #ffffff73; padding: 5px; border-radius: 5px;">
                            <div class="col-md-3 col-xs-6" style="border-radius: 5px;padding:5px ;">
                                <div class="boxinput-date">
                                    <input type="text" id="datePicker1" name="datePicker1" class="inputdate" placeholder="Ngày nhận">
                                    <i class="fa-regular fa-calendar"></i>
                                </div>
                            </div>
                            <div class="col-md-3 col-xs-6" style="border-radius: 5px;padding: 5px;">
                                <div class="boxinput-date">
                                    <input type="text" id="datePicker2" name="datePicker2" class="inputdate" placeholder="Ngày trả">
                                    <i class="fa-regular fa-calendar"></i>
                                </div>
                            </div>
                            <div class="col-md-4" style="border-radius: 5px;padding: 5px; position: relative;">
                                <div class="boxinput-date">
                                    <select id="cars" class="inputdate" name="datePicker3">
                                        <option selected>Chọn Địa Điểm</option>
                                        <?php foreach ($laykv as $key) : extract($key) ?>
                                            <option value="<?= $MaKV ?>"><?= $TenKV ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <i class="fa-solid fa-location-dot" style="position: absolute; top: 80px;color: white; right: 20px; font-size: 20px;"></i>
                            </div>
                            <div class="col-md-2" style="border-radius: 5px;padding: 5px;">
                                <div class="boxinput-date ">
                                    <input type="submit" id="datePicker3" name="datePicker" class="inputdate btnsm" value="Tìm ngay">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Đóng nội dung tiềm kiếm -->
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title text-center">
                    <h2 class="border-left-right-btm">Các địa điểm nổi bật</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 col-xs-6">
                <a href="?mod=page&act=apartment&khuvuc=1">
                    <img src="uploads/cho_ben_thanh.png" alt="" style="border-radius: 10px; width: 100%;">
                    <h4 style="margin-top: 10px;">Quận 1</h4>
                </a>
            </div>
            <!-- <div class="col-md-4 d-md-none d-sm-block ">
                <a href="index.php?mod=page&act=apartment&khuvuc=2">
                    <img src="uploads/view-chup-hinh-dep-quan-2.png" alt="" style="border-radius: 10px;">
                    <h4 style="margin-top: 10px;">Quận 2</h4>
                </a>

            </div> -->
            <div class="col-md-4 col-xs-6">
                <a href="index.php?mod=page&act=apartment&khuvuc=3">
                    <img src="uploads/nha-tho-va-chua-noi-tieng-o-quan-3-thanh-pho-ho-chi-minh.png" alt="" style="border-radius: 10px;    width: 100%;">
                    <h4 style="margin-top: 10px;">Quận 3</h4>
                </a>

            </div>
            <!-- <div class="col-md-3">
                <img src="uploads/quận 5 13.png" alt="" style="border-radius: 10px;">
                <h4 style="margin-top: 10px;">Quận 5</h4>
            </div> -->
            <!-- <div class="col-md-2">
                <img src="uploads/quan-7-gan-nhung-quan-nao.png" alt="" style="border-radius: 10px;">
                <h4 style="margin-top: 10px;">Quận 7</h4>
            </div> -->
            <div class="col-md-4 col-xs-6">
                <a href="index.php?mod=page&act=apartment&khuvuc=12"><img src="uploads/quan-12-co-gi-vui-6-min 2.png" alt="" style="border-radius: 10px;    width: 100%;">
                    <h4 style="margin-top: 10px;">Quận 12</h4>
                </a>
            </div>
        </div>
    </div>
    <!-- PRODUCT-AREA END -->
    <div class="best-sell-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title text-center">
                        <h2 class="border-left-right-btm">yêu thích nhất</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <!-- best-sell-menu -->
                    <!-- <ul role="tablist" class="best-sell-menu">
                        <li role="presentation" class="active"><a href="#men" role="tab" data-toggle="tab">Men</a></li>
                        <li role="presentation"><a href="#women" role="tab" data-toggle="tab">Women</a></li>
                        <li role="presentation"><a href="#accessories" role="tab" data-toggle="tab">Accessories</a></li>
                    </ul> -->
                    <!-- best-sell-product -->
                    <div class="tab-content best-sell-product">
                        <div role="tabpanel" class="tab-pane fade in active" id="men">

                            <div class="row">
                                <?php
                                $j = 0;
                                foreach ($toplike_Apartment as $apartment) :
                                    if ($j % 2 == 0) {
                                        echo '<div class="col-md-4 col-sm-6 col-xs-12">';
                                    }
                                    $arrayHinhAnh = explode('||', $apartment['DSHinhAnh']);
                                ?>
                                    <div class="single-product">
                                        <div class="product-photo">
                                            <a href="index.php?mod=page&act=product&id=<?= $apartment['MaCH'] ?>">
                                                <img class="primary-photo" src="uploads/product/<?= $arrayHinhAnh[0] ?>" alt="" />
                                                <img class="secondary-photo" src="uploads/product/<?= $arrayHinhAnh[0] ?>" alt="" />
                                                <div class="heart-product">
                                                    <?= $apartment['tong_like'] ?>
                                                    <i class="sp-heart"></i>
                                                </div>
                                            </a>
                                            <div class="pro-action">
                                                <a class="action-btn">
                                                    <i class="sp-heart"></i>
                                                    <span>
                                                        <?php
                                                        if (isset($_SESSION['user'])) {
                                                            if ($apartment['canhoyt'] > 0) {
                                                                echo "ĐÃ YÊU THÍCH";
                                                            } else {
                                                                echo "YÊU THÍCH";
                                                            }
                                                        } else {
                                                            echo "YÊU THÍCH";
                                                        }
                                                        ?>
                                                    </span>
                                                    <input type="hidden" class="heart-mach" value="<?= $apartment['MaCH'] ?>">
                                                    <input type="hidden" class="heart-matk" value="<?php if (isset($_SESSION['user'])) {
                                                                                                        echo $_SESSION['user']['MaTK'];
                                                                                                    } else {
                                                                                                        echo 0;
                                                                                                    }
                                                                                                    ?>">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="product-brief">
                                            <div class="pro-rating" style="text-align: center;">
                                                <?php
                                                if (!isset($_SESSION['user'])) {
                                                    echo '<a><i style="font-weight: bold;" class="sp-star star"></i></a>
					                            <a><i style="font-weight: bold;" class="sp-star star"></i></a>
					                            <a><i style="font-weight: bold;" class="sp-star star"></i></a>
					                            <a><i style="font-weight: bold;" class="sp-star star"></i></a>
					                            <a><i style="font-weight: bold;" class="sp-star star"></i></a>';
                                                } else if ($apartment['saotb'] < 1) {
                                                    echo '<a><i style="font-weight: bold;" class="sp-star star"></i></a>
                            <a><i style="font-weight: bold;" class="sp-star star"></i></a>
                            <a><i style="font-weight: bold;" class="sp-star star"></i></a>
                            <a><i style="font-weight: bold;" class="sp-star star"></i></a>
                            <a><i style="font-weight: bold;" class="sp-star star"></i></a>';
                                                } else {

                                                    for ($i = 1; $i <= 5; $i++) {

                                                        if ($apartment['saotb'] >= $i) {
                                                            echo '<a><i style="font-weight: bold;" class="sp-star star"></i></a>';
                                                        } else {
                                                            echo '<a><i style="font-weight: 500;" class="sp-star"></i></a>';
                                                        }
                                                    }
                                                }
                                                ?>

                                            </div>
                                            <h2 style="height: 60px; text-align: center; "><a href="index.php?mod=page&act=product&id=<?= $apartment['MaCH'] ?>"><?= substr($apartment['TenCanHo'], 0, 52) ?></a>
                                            </h2>
                                            <h3 style="color: red;text-align: center;">
                                                <?= number_format($apartment['GiaCH']) ?> <span class="noinhoa">đ</span>/Ngày
                                            </h3>
                                            <div class="column-product" style="text-align: center;">
                                                <div>
                                                    <ul>
                                                        <li style="padding-left: 25px;"><?= $apartment['DienTich'] ?>
                                                            <span class="noinhoa">m</span><sup>2</sup>
                                                        </li>
                                                        <li style="padding-left: 25px;"><?= $apartment['SoPhong'] ?> Phòng
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div>
                                                    <ul>
                                                        <li style="padding-left: 25px;"><?= $apartment['TenLoai'] ?></li>
                                                        <li style="padding-left: 25px;">
                                                            <?php
                                                            $arrayDiaChi = explode(',', $apartment['DiaChiCH']);
                                                            $arrayDiaChi = array_slice($arrayDiaChi, -2);
                                                            array_pop($arrayDiaChi);
                                                            $Quan = implode(',', $arrayDiaChi);
                                                            echo $Quan;
                                                            ?></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Single-product end -->


                                <?php
                                    $j++;
                                    if ($j % 2 == 0) {
                                        echo '</div>';
                                    }
                                endforeach;

                                // Kiểm tra xem có cần đóng div cuối không

                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- BEST-SELL-AREA END -->
    <!-- BEST-SELL-AREA START -->
    <div class="best-sell-area" style="margin-bottom: 40px;">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title text-center">
                        <h2 class="border-left-right-btm">Mới cập nhật</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <!-- best-sell-menu -->
                    <!-- <ul role="tablist" class="best-sell-menu">
                        <li role="presentation" class="active"><a href="#men" role="tab" data-toggle="tab">Men</a></li>
                        <li role="presentation"><a href="#women" role="tab" data-toggle="tab">Women</a></li>
                        <li role="presentation"><a href="#accessories" role="tab" data-toggle="tab">Accessories</a></li>
                    </ul> -->
                    <!-- best-sell-product -->
                    <div class="tab-content best-sell-product">
                        <div role="tabpanel" class="tab-pane fade in active" id="men">

                            <div class="row">
                                <?php
                                foreach ($news_Apartment as $apartment) :
                                    $arrayHinhAnh = explode('||', $apartment['DSHinhAnh']);
                                ?>
                                    <div class="col-lg-4 col-md-6 col-sm-6 padding-0" style="color: white;">
                                        <div class="single-collection">
                                            <div class="collection-photo">

                                                <a href="index.php?mod=page&act=product&id=<?= $apartment['MaCH'] ?>"><img style="max-height: 359px;" src="uploads/product/<?= $arrayHinhAnh[0] ?>" alt="" /></a>
                                            </div>
                                            <div class="collection-brief">

                                                <span><?php $apartment['TenCanHo'] ?></span></h2>
                                                <ul>
                                                    <li><?= $apartment['DienTich'] ?> <span class="noinhoa">m</span><sup>2</sup></li>
                                                    <li><?= $apartment['SoPhong'] ?> Phòng</li>
                                                    <li><?php

                                                        $arrayDiaChi = explode(',', $apartment['DiaChiCH']);
                                                        $DiaChi = array_slice($arrayDiaChi, -2);
                                                        echo implode(',', $DiaChi);
                                                        ?></li>
                                                    <li><?= $apartment['TenLoai'] ?></li>
                                                </ul>
                                                <a href="index.php?mod=page&act=product&id=<?= $apartment['MaCH'] ?>" class="shop-now active-shop-now">Thuê ngay</a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Single-product end -->
                                <?php
                                endforeach;

                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- BEST-SELL-AREA START -->
    <div class="best-sell-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title text-center">
                        <h2 class="border-left-right-btm">Xem nhiều nhất</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <!-- best-sell-menu -->
                    <!-- <ul role="tablist" class="best-sell-menu">
                        <li role="presentation" class="active"><a href="#men" role="tab" data-toggle="tab">Men</a></li>
                        <li role="presentation"><a href="#women" role="tab" data-toggle="tab">Women</a></li>
                        <li role="presentation"><a href="#accessories" role="tab" data-toggle="tab">Accessories</a></li>
                    </ul> -->
                    <!-- best-sell-product -->
                    <div class="tab-content best-sell-product">
                        <div role="tabpanel" class="tab-pane fade in active" id="men">

                            <div class="row">
                                <?php
                                $j = 0;
                                foreach ($topEye_Apartment as $apartment) :
                                    $arrayHinhAnh = explode('||', $apartment['DSHinhAnh']);
                                    if ($j % 2 == 0) {
                                        echo '<div class="col-md-4 col-sm-6 col-xs-12">';
                                    }
                                ?>
                                    <div class="single-product">
                                        <div class="product-photo">
                                            <a href="index.php?mod=page&act=product&id=<?= $apartment['MaCH'] ?>">
                                                <img class="primary-photo" src="uploads/product/<?= $arrayHinhAnh[0] ?>" alt="" />
                                                <img class="secondary-photo" src="uploads/product/<?= $arrayHinhAnh[0] ?>" alt="" />
                                                <div class="heart-product">
                                                    <?= $apartment['tong_like'] ?>
                                                    <i class="sp-heart"></i>
                                                </div>
                                            </a>
                                            <div class="pro-action">
                                                <a class="action-btn">
                                                    <i class="sp-heart"></i>
                                                    <span>
                                                        <?php
                                                        if (isset($_SESSION['user'])) {
                                                            if ($apartment['canhoyt'] > 0) {
                                                                echo "ĐÃ YÊU THÍCH";
                                                            } else {
                                                                echo "YÊU THÍCH";
                                                            }
                                                        } else {
                                                            echo "YÊU THÍCH";
                                                        }
                                                        ?>
                                                    </span>
                                                    <input type="hidden" class="heart-mach" value="<?= $apartment['MaCH'] ?>">
                                                    <input type="hidden" class="heart-matk" value="<?php if (isset($_SESSION['user'])) {
                                                                                                        echo $_SESSION['user']['MaTK'];
                                                                                                    } else {
                                                                                                        echo 0;
                                                                                                    }
                                                                                                    ?>">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="product-brief">
                                            <div class="pro-rating" style="text-align: center;">
                                                <?php
                                                if (!isset($_SESSION['user'])) {
                                                    echo '<a><i style="font-weight: bold;" class="sp-star star"></i></a>
					                            <a><i style="font-weight: bold;" class="sp-star star"></i></a>
					                            <a><i style="font-weight: bold;" class="sp-star star"></i></a>
					                            <a><i style="font-weight: bold;" class="sp-star star"></i></a>
					                            <a><i style="font-weight: bold;" class="sp-star star"></i></a>';
                                                } else if ($apartment['saotb'] < 1) {
                                                    echo '<a><i style="font-weight: bold;" class="sp-star star"></i></a>
                            <a><i style="font-weight: bold;" class="sp-star star"></i></a>
                            <a><i style="font-weight: bold;" class="sp-star star"></i></a>
                            <a><i style="font-weight: bold;" class="sp-star star"></i></a>
                            <a><i style="font-weight: bold;" class="sp-star star"></i></a>';
                                                } else {

                                                    for ($i = 1; $i <= 5; $i++) {

                                                        if ($apartment['saotb'] >= $i) {
                                                            echo '<a><i style="font-weight: bold;" class="sp-star star"></i></a>';
                                                        } else {
                                                            echo '<a><i style="font-weight: 500;" class="sp-star"></i></a>';
                                                        }
                                                    }
                                                }
                                                ?>

                                            </div>
                                            <h2 style="height: 60px; text-align: center; "><a href="index.php?mod=page&act=product&id=<?= $apartment['MaCH'] ?>"><?= substr($apartment['TenCanHo'], 0, 52) ?></a>
                                            </h2>
                                            <h3 style="color: red;text-align: center;">
                                                <?= number_format($apartment['GiaCH']) ?> <span class="noinhoa">đ</span>/Ngày
                                            </h3>
                                            <div class="column-product" style="text-align: center;">
                                                <div>
                                                    <ul>
                                                        <li style="padding-left: 25px;"><?= $apartment['DienTich'] ?>
                                                            <span class="noinhoa">m</span><sup>2</sup>
                                                        </li>
                                                        <li style="padding-left: 25px;"><?= $apartment['SoPhong'] ?> Phòng
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div>
                                                    <ul>
                                                        <li style="padding-left: 25px;"><?= $apartment['TenLoai'] ?></li>
                                                        <li style="padding-left: 25px;">
                                                            <?php
                                                            $arrayDiaChi = explode(',', $apartment['DiaChiCH']);
                                                            $arrayDiaChi = array_slice($arrayDiaChi, -2);
                                                            array_pop($arrayDiaChi);
                                                            $Quan = implode(',', $arrayDiaChi);
                                                            echo $Quan;
                                                            ?></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Single-product end -->


                                <?php
                                    $j++;
                                    if ($j % 2 == 0) {
                                        echo '</div>';
                                    }
                                endforeach;

                                // Kiểm tra xem có cần đóng div cuối không

                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- BEST-SELL-AREA END -->
    <!-- ALL-PRODUCT-VIEW START -->
    <div class="all-product-view-area margin-bottom-80">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="all-product-view">
                        <div class="row">
                            <div class="col-md-7 col-sm-8 col-xs-12 col-sm-offset-1 col-md-offset-2">
                                <div class="all-product-brief">
                                    <h2>Chúng tôi cung cấp căn hộ tốt nhất!</h2>
                                    <p style="font-size: 16px;line-height: 25px;">Hãy tham khảo thêm các căn hộ khác để
                                        có thêm nhiều lựa chọn cho bạn. Tin tưởng
                                        chúng tôi uy tín, chất lượng, trải nghiệm tuyệt vời là những gì bạn sẽ cảm nhận
                                        được.
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-3 col-xs-12">
                                <div class="all-product-view-link">
                                    <a href="index.php?mod=page&act=apartment" class="shop-now">Xem ngay</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ALL-PRODUCT-VIEW END -->

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title text-center">
                    <h2 class="border-left-right-btm">Các Loại căn hộ</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-xs-6">
                <a href="index.php?mod=page&act=apartment&loai=2">
                    <img src="uploads/thiet-ke-xay-dung-44.jpg" alt="" style="border-radius: 10px;">
                    <h4 style="margin-top: 10px;">Căn hộ thông thường</h4>
                </a>

            </div>
            <div class="col-md-6 col-xs-6">
                <a href="index.php?mod=page&act=apartment&loai=1">
                    <img src="uploads/0_fI3hneXi_07w_uZW.jpg" alt="" style="border-radius: 10px;">
                    <h4 style="margin-top: 10px;">Căn hộ Studio</h4>
                </a>

            </div>

        </div>
        <div class="row">
            <div class="col-md-4 col-xs-4">
                <a href="index.php?mod=page&act=apartment&loai=4">
                    <img src="uploads/officetel-1_1560935324.png" alt="" style="border-radius: 10px;">
                    <h4 style="margin-top: 10px;"> Căn hộ Officetel</h4>
                </a>

            </div>
            <div class="col-md-4 col-xs-4">
                <a href="index.php?mod=page&act=apartment&loai=5">
                    <img src="uploads/14b344ac219339e4dadb8f6e8dae5620.png" alt="" style="border-radius: 10px;">
                    <h4 style="margin-top: 10px;">Căn hộ Penthouse</h4>
                </a>

            </div>
            <div class="col-md-4 col-xs-4">
                <a href="index.php?mod=page&act=apartment&loai=6">
                    <img src="uploads/94ec2aeb446802fee316dd8b6d1979d4.png" alt="" style="border-radius: 10px;">
                    <h4 style="margin-top: 10px;">Căn hộ Dulex</h4>
                </a>

            </div>

        </div>
    </div>
    <!-- SERVICE-AREA START -->

    <div class="support-area margin-bottom-80 ">
        <div class="row" style="margin: 0;">
            <div class="col-md-12">
                <div class="section-title text-center">
                    <h2 class="border-left-right-btm">thế mạnh</h2>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="single-support">
                        <i class="pe-7s-cup"></i>
                        <h3><a href="#">Đơn vị cho thuê hàng đầu</a></h3>
                        <p style="font-size: 16px;line-height: 25px;">Giá cho thuê căn hộ chung cư Mini rơi vào khoảng 4
                            - 12 triệu/tháng với đầy đủ Nội
                            thất
                            cao
                            cấp và Dịch vụ quản lý tiêu chuẩn. Khách hàng thuê chủ yếu: Chuyên gia, Nhân sự cấp
                            cao
                            và
                            Sinh viên </p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="single-support">
                        <i class="pe-7s-medal"></i>
                        <h3><a href="#">Đơn vị cho thuê hàng đầu</a></h3>
                        <p style="font-size: 16px;line-height: 25px;">Tự hào là đơn vị quản lý - dịch vụ - đối tác triển
                            khai hàng đầu trong lĩnh vực cho
                            thuê
                            căn
                            hộ - chung cư Mini tại thành phố Hà Nội. Với kinh nghiệm triển khai cho thuê 250 tòa
                            chung
                            cư tại Hà Nội. </p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="single-support">
                        <i class="pe-7s-graph"></i>
                        <h3><a href="#">Top 1 về dịch vụ quản lý</a></h3>
                        <p style="font-size: 16px;line-height: 25px;">Mô hình có đầy đủ yếu tố để phục vụ và đáp ứng
                            trọn vẹn: Dọn vệ sinh hàng ngày; Giặt
                            phơi
                            2
                            lần/tuần; Phí điện, nước, internet theo nhà nước, bảo vệ 24/7 và miễn phí phí quản
                            lý
                            tòa
                            nhà. </p>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- SERVICE-AREA END -->

</section>

<!-- PAGE-CONTENT END -->
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>

<script>
    const config1 = {
        dateFormat: "d/m/Y",
        locale: {
            weekdays: {
                shorthand: ["CN", "T2", "T3", "T4", "T5", "T6", "T7"],
                longhand: ["Chủ Nhật", "Thứ Hai", "Thứ Ba", "Thứ Tư", "Thứ Năm", "Thứ Sáu", "Thứ Bảy"]
            },
            months: {
                shorthand: ["Th.1", "Th.2", "Th.3", "Th.4", "Th.5", "Th.6", "Th.7", "Th.8", "Th.9", "Th.10",
                    "Th.11", "Th.12"
                ],
                longhand: ["Tháng 1", "Tháng 2", "Tháng 3", "Tháng 4", "Tháng 5", "Tháng 6", "Tháng 7",
                    "Tháng 8", "Tháng 9", "Tháng 10", "Tháng 11", "Tháng 12"
                ]
            },
            rangeSeparator: " đến "
        },
    };



    const datePicker1 = flatpickr("#datePicker1", {
        ...config1,
        minDate: "today",
    });
    const datePicker2 = flatpickr("#datePicker2", {
        ...config1,
        minDate: "today",
    });
    datePicker1.config.onChange.push((selectedDates, dateStr, instance) => {
        // Cập nhật minDate cho datePicker2
        const minDate = selectedDates[0];
        minDate.setDate(minDate.getDate() + 1);
        datePicker2.set("minDate", minDate);
        // Lấy mảng ngày cần ẩn, bao gồm ngày được chọn và những ngày trước đó
    });
</script>
<script>
    function validateForm() {
        // Lấy giá trị của trường ngày
        var dateValue1 = document.getElementById("datePicker1").value;
        var location = document.getElementById("cars").value;
        var dateValue2 = document.getElementById("datePicker2").value;
        // Kiểm tra xem giá trị có tồn tại hay không
        if (dateValue1.trim() === "") {
            alert("Vui lòng chọn ngày trước khi chọn thuê!");
            return false;
        }
        if (dateValue2.trim() === "") {
            alert("Vui lòng chọn ngày trước khi chọn thuê!");
            return false;
        }
        if (location.trim() === "Chọn Địa Điểm") {
            alert("Vui lòng chọn địa điểm cần tìm!");
            return false;
        }
        // Nếu có giá trị, cho phép submit form
        return true;
    }
</script>