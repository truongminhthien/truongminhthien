<style>
    .d794b7a0f7 {
        border-radius: 3px;
    }

    .a18aeea94d {
        border: solid 1px #e7e7e7;
    }

    .c82435a4b8 {
        padding: calc(4px * 4);
    }

    .product-brief div div ul li {
        font-weight: 400;
        text-transform: unset;
    }

    .column-product>div:nth-child(1) {
        flex: 1;
        padding-left: 25px;
    }

    .column-product>div:nth-child(2) {
        flex: 1;
    }

    .shop-list .product-brief h2 {
        margin-bottom: 0px;
    }

    .product-brief h3 {
        margin: 0 0 0 5px;
    }

    .column-product {
        margin: 0 0 5px 5px;
        border-bottom: 1px solid #dedede;
    }

    p {
        font-weight: 400 !important;
        margin: 0 0 0 5px;
    }

    .widget-categories ul li a.active {
        background: #00b4d8 none repeat scroll 0 0;
        border-color: transparent;
        color: #fff;
    }

    .product-toolbar {
        margin-left: -15px;
    }

    .product-toolbar h3 {
        margin: 0;
        font-weight: 400;

    }

    .sidebar-product .product-brief h2 {
        margin-bottom: 10px;
        margin-top: 0;
    }

    .shop-list .quick-view a {
        padding: 0 0 0 10px;

    }
</style>

</pre>
<section class="page-content">
    <!-- SHOP-AREA START -->
    <div class="shop-area margin-bottom-80">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <span class="shop-border"></span>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                    <!-- widget-categories start -->
                    <aside class="widget widget-categories">
                        <h5>Loại Căn Hộ</h5>
                        <ul>
                            <?php foreach ($loaicanho as $key) : extract($key) ?>
                                <?php
                                // Lấy giá trị tham số 'loai' từ URL
                                $loaiCanHoDuocChon = isset($_GET['loai']) ? $_GET['loai'] : '';

                                // Kiểm tra xem link hiện tại có phải là link được chọn hay không
                                $isActive = ($loaiCanHoDuocChon == $MaLoai) ? 'active' : '';
                                ?>
                                <li><a href="?mod=page&act=apartment&loai=<?= $MaLoai ?>" class="<?= $isActive ?>"><?= $TenLoai ?></a></li>
                            <?php endforeach; ?>
                        </ul>
                    </aside>

                    <!-- widget-categories end -->
                    <!--khu vực-->
                    <aside class="widget widget-categories">
                        <h5>Khu Vực</h5>
                        <ul>
                            <?php foreach ($laykv as $key) : extract($key) ?>
                                <?php
                                // Lấy giá trị tham số 'khuvuc' từ URL
                                $khuVucDuocChon = isset($_GET['khuvuc']) ? $_GET['khuvuc'] : '';

                                // Kiểm tra xem link hiện tại có phải là link được chọn hay không
                                $isActive = ($khuVucDuocChon == $MaKV) ? 'active' : '';
                                ?>
                                <li><a href="?mod=page&act=apartment&khuvuc=<?= $MaKV ?>" class="<?= $isActive ?>"><?= $TenKV ?></a></li>
                            <?php endforeach; ?>
                        </ul>
                    </aside>

                    <!--khu vực-->
                    <!-- shop-filter start -->
                    <aside class="widget shop-filter">
                        <h3 class="sidebar-title">Giá</h3>
                        <div class="info_widget">
                            <div id="slider-range"></div>
                            <form action="?mod=page&act=locgia" method="post">
                                <div id="amount">
                                    <input type="text" value="<?= $giamdthap ?>" name="first_price" class="first_price w-100px " />
                                    <input type="text" value="<?= $giamdcao ?>" name="last_price" class="last_price w-100px " />
                                </div>
                                <button type="submit" name="submit" class="shop-now">Filter</button>
                            </form>

                        </div>
                    </aside>
                    <!-- shop-filter end -->
                    <!-- widget-top-brand start -->
                    <aside class="widget top-rated hidden-sm">
                        <h5 class="sidebar-title">Căn Hộ Hàng Đầu</h5>
                        <div class="sidebar-product">
                            <!-- Single-product start -->
                            <?php foreach ($laych as $key) : extract($key) ?>
                                <div class="single-product">
                                    <div class="product-photo">
                                        <a href="?mod=page&act=product&id=<?= $MaCH ?>">
                                            <img class="primary-photo" src="uploads//product/<?= $arrayHinhAnh = explode('||', $DSHinhAnh)[0] ?>" alt="" />
                                        </a>
                                    </div>
                                    <div class="product-brief">
                                        <h2><a href="?mod=page&act=product&id=<?= $MaCH ?>"><?php echo substr($TenCanHo, 0, 13) ?></a>
                                        </h2>
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
                    <!-- widget sidebar-banner start -->
                    <aside class="widget sidebar-banner">
                        <a href="#"><img src="img/banner/sidebar-1.jpg" alt="" /></a>
                    </aside>
                    <!-- widget sidebar-banner start -->
                </div>
                <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                    <!-- Shop-Content start -->
                    <div class="shop-content">
                        <div class="product-toolbar">
                            <h3>
                                <?php
                                if (isset($_SESSION['thongbao'])) {
                                    echo $_SESSION['thongbao'];
                                } else {
                                    echo 'Tất Cả Các Căn Hộ';
                                };
                                unset($_SESSION['thongbao']);
                                ?>
                            </h3>
                        </div>
                        <!-- product-toolbar end -->
                        <!-- Shop-product start -->
                        <div role="tabpanel" class="tab-pane active" id="list-view">
                            <div class="row shop-list">
                                <!-- Single-product start -->
                                <?php foreach ($laycanho as $key) : extract($key); ?>
                                    <div class="col-md-12 d794b7a0f7 a18aeea94d c82435a4b8">
                                        <div class="single-product">
                                            <div class="product-photo">
                                                <a href="?mod=page&act=product&id=<?= $MaCH ?>">
                                                    <img class="primary-photo" src="uploads/product/<?= $arrayHinhAnh = explode('||', $DSHinhAnh)[0] ?>" alt="" />
                                                    <img class="secondary-photo" src="uploads//product/<?= $arrayHinhAnh = explode('||', $DSHinhAnh)[1] ?>" alt="" />
                                                </a>
                                                <div class="pro-action">
                                                    <a class="action-btn"><i class="sp-heart"></i><span>
                                                            <?php
                                                            if (isset($_SESSION['user'])) {
                                                                if ($canhoyt > 0) {
                                                                    echo "ĐÃ YÊU THÍCH";
                                                                } else {
                                                                    echo "YÊU THÍCH";
                                                                }
                                                            } else {
                                                                echo "YÊU THÍCH";
                                                            }
                                                            ?>
                                                        </span>
                                                        <input type="hidden" class="heart-mach" value="<?= $MaCH ?>">
                                                        <input type="hidden" class="heart-matk" value="<?php if (isset($_SESSION['user'])) {
                                                                                                            echo $_SESSION['user']['MaTK'];
                                                                                                        } else {
                                                                                                            echo 0;
                                                                                                        }
                                                                                                        ?>"></a>
                                                </div>
                                            </div>
                                            <div class="product-brief m-0">
                                                <h2><a href="?mod=page&act=product&id=<?= $MaCH ?>"><?= $TenCanHo ?></a>
                                                </h2>
                                                <h3><?php $gia_tien = number_format($GiaCH, 0, '.', ',');
                                                    echo $gia_tien; ?>
                                                    VNĐ</h3>
                                                <div class="porduct-desc">
                                                    <p style="    line-height: 28px;  font-size: 16px;">
                                                        <?php echo substr($MoTaCH, 0, 300) ?>...
                                                    </p>
                                                </div>
                                                <div class="column-product">
                                                    <div>
                                                        <ul>
                                                            <li><?= $DienTich ?> m<sup>2</sup></li>
                                                            <li><?= $SoPhong ?> Phòng</li>
                                                        </ul>
                                                    </div>
                                                    <div>
                                                        <ul>
                                                            <li><?= $TenLoai ?></li>
                                                            <li> <?= $TenKV ?></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="pro-quick-view">
                                                    <div class="quick-view">
                                                        <a href="?mod=page&act=product&id=<?= $MaCH ?>" title="Quick View">Xem
                                                            Thông Tin Chi
                                                            Tiết</a>
                                                    </div>
                                                    <div class="pro-rating">
                                                        <?php $saotb = (float) $saotb;
                                                        $saotb = floor($saotb);
                                                        if ($saotb < 1) {
                                                            echo '<a><i style="font-weight: bold;" class="sp-star star"></i></a>
																							            <a><i style="font-weight: bold;" class="sp-star star"></i></a>
																							            <a><i style="font-weight: bold;" class="sp-star star"></i></a>
																							            <a><i style="font-weight: bold;" class="sp-star star"></i></a>
																							            <a><i style="font-weight: bold;" class="sp-star star"></i></a>';
                                                        } else {
                                                            for ($i = 1; $i <= 5; $i++) {
                                                                if ($saotb >= $i) {
                                                                    echo '<a><i style="font-weight: bold;" class="sp-star star"></i></a>';
                                                                } else {
                                                                    echo '<a><i style="font-weight: 500;" class="sp-star"></i></a>';
                                                                }
                                                            }
                                                        }
                                                        ?>


                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                                <!-- Single-product end -->
                            </div>
                        </div>
                    </div>
                    <div class="product-toolbar">
                        <!-- pagination -->
                        <div class="shop-pagination">
                            <?php
                            $currentPage = $page = isset($_GET['page']) ? intval($_GET['page']) : 1; // Trang hiện tại
                            if ($sotrang > 5) {
                                $pagesToShow = 5;
                            } else {
                                $pagesToShow = $sotrang;
                            }

                            $half = floor($pagesToShow / 2);
                            $startPage = max(1, $currentPage - $half);
                            $endPage = min($sotrang, $currentPage + $half);

                            // Đảm bảo số trang không vượt quá giới hạn
                            if ($endPage - $startPage + 1 < $pagesToShow) {
                                if ($currentPage <= $half) {
                                    $endPage = $pagesToShow;
                                } else {
                                    $startPage = $sotrang - $pagesToShow + 1;
                                }
                            }
                            if (isset($_GET['loai'])) {
                                $timkiem = '?mod=page&act=apartment&loai=' . $_GET['loai'] . '&page=';
                            } else if (isset($_GET['khuvuc'])) {
                                $timkiem = '?mod=page&act=apartment&khuvuc=' . $_GET['khuvuc'] . '&page=';
                            } else if (isset($_GET['giathap']) || isset($_GET['giacao'])) {
                                $timkiem = '?mod=page&act=apartment&giathap=' . $_GET['giathap'] . '&giacao=' . $_GET['giacao'] . '&page=';
                            } else {
                                $timkiem = '?mod=page&act=apartment&page=';
                            }

                            ?>
                            <ul>
                                <li class="page-item <?php echo ($currentPage <= 1) ? 'disabled' : ''; ?>">
                                    <a class="page-link" href="<?php echo ($currentPage > 1) ? '' . $timkiem . '' . ($currentPage - 1) : ' '; ?>"><i class="sp-arrow-bold-left"></i></a>
                                </li>
                                <?php

                                // Hiển thị danh sách các trang nếu có nhiều hơn một trang
                                if ($endPage > 1) {
                                    for ($i = $startPage; $i <= $endPage; $i++) {
                                        $isActive = ($i == $currentPage) ? 'active' : '';
                                        echo '<li class="mx-1 page-item ' . $isActive . '"><a class="page-link" href="' . $timkiem . '' . $i . '">' . $i . '</a></li>';
                                    }
                                }
                                ?>

                                <li class="page-item <?php echo ($currentPage >= $sotrang) ? 'disabled' : ''; ?>">
                                    <a class="page-link" href="<?php echo ($currentPage < $sotrang) ? '' . $timkiem . '' . ($currentPage + 1) : '#'; ?>"><i class="sp-arrow-bold-right"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- product-toolbar end -->
                    <!-- Shop-product end -->
                </div>
                <!-- Shop-Content end -->
            </div>
        </div>
    </div>
    </div>
    <!-- SHOP-AREA END -->
</section>