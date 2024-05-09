<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/tin.css">
</head>

<body style="background-color: #f5f5f5;">

    <h2 style="text-align: center; margin-top: 16px;">Tin tức</h2>
    <div class="blog-area margin-bottom-80">
        <div class="container">
            <div class="row">
                <div class="col-md-9 col-sm-8 col-xs-12">
                    <div class="row">
                        <?php
                            $count = 0;
                            foreach ($tin as $menu_tin) :
                            $itemsPerPage = 6;
                            $currentPage = isset($_GET['page']) ? $_GET['page'] : 1;
							if($menu_tin['TrangThai']== 1){
                                ?>
                        <div class="col-md-6 col-sm-6 col-xs-12" style="overflow: hidden; height:430px">
                            <div class="single-blog">
                                <div class="blog-photo owl-item active"
                                    style="width: 400.2px; height: 260.2px; margin-right: 3px; overflow: hidden;">
                                    <a style="width: 100%; height: 100%; display: block; overflow: hidden;"
                                        href="index.php?mod=page&act=show_blog&MaTT=<?= $menu_tin['MaTT'] ?>">
                                        <img style="width: 100%; height: 100%; object-fit: cover;"
                                            src="<?= $menu_tin['HinhAnh'] ?>" alt="" />
                                    </a>
                                    <div class="blog-post-date">
                                        <span
                                            style="text-align: center; background-color: #42a5f5;"><?=$menu_tin['MaTT']?>th</span>
                                        <span
                                            style="text-align: center; background-color: #42a5f5;"><?= date('d-m-Y', strtotime($menu_tin['NgayDang'])) ?></span>
                                    </div>
                                </div>
                                <div class="blog-brief">
                                    <a href="index.php?mod=page&act=show_blog&MaTT=<?= $menu_tin['MaTT'] ?>">
                                        <p style=" font-size: 24px; color: black; line-height: 30px;">
                                            <?= substr($menu_tin['TieuDe'], 0, 75) ?>...
                                    </a>

                                    </p>
                                    <div class="like-comment">
                                        <a href="#"><i class="sp-like"></i><?=$menu_tin['luotthich']?></a>
                                        <a href="#"><i class="fa-regular fa-eye"></i><?=$menu_tin['luotxem']?></a>
                                    </div>
                                    <!-- <a class="shop-now"
                                        href="index.php?mod=page&act=show_blog&MaTT=<?= $menu_tin['MaTT'] ?>">Xem Chi
                                        Tiết</a> -->
                                </div>
                            </div>
                        </div>
                        <?php
								}
                                $count++;
                                endforeach;
                                $totalPages = count_tin_pages($itemsPerPage);
                                ?>
                    </div>
                    <?php
                              echo "<div class='pagination'>";
                              if ($totalPages > 1) {
                              // Hiển thị nút trước
                              if ($currentPage > 1) {
                                  echo "<a href='index.php?mod=page&act=blog&page=" . ($currentPage - 1) . "'>&laquo;</a>";
                              }

                              for ($i = max(1, $currentPage - 2); $i <= min($totalPages, $currentPage + 2); $i++) {
                                  echo "<a href='index.php?mod=page&act=blog&page=$i'";
                                  if ($i == $currentPage) {
                                      echo " class='active'";
                                  }
                                  echo ">$i</a>";
                              }

                              // Hiển thị nút sau
                              if ($currentPage < $totalPages) {
                                  echo "<a class='page-link' href='index.php?mod=page&act=blog&page=" . ($currentPage + 1) . "' >&raquo;</a>";
                              }
                              }
                              echo "</div>";
                            ?>
                </div>
                <div class="col-md-3 col-sm-4 col-xs-12">
                    <!-- widget-brand start -->
                    <aside class="widget widget-brand">
                        <h5 style="text-align: center;" class="sidebar-title">Tìm Kiếm Tin</h5>
                        <ul>
                            <form class="d-flex" action="index.php?mod=page&act=seach_blog" method="POST">
                                <input class="form-control me-2 khung" type="search" name="key_tin"
                                    placeholder="Thông Tin cần Tìm" aria-label="Search">
                                <button class="btn btn-outline-success timkiem" type="submit" id="search">Tìm
                                    Kiếm</button>
                            </form>
                        </ul>
                    </aside>
                    <!-- widget-brand end -->
                    <!-- widget-top-brand start -->
                    <aside class="widget top-rated">
                        <h5 style="text-align: center;" class="sidebar-title">Top Tin Được Yêu Thích</h5>
                        <div class="sidebar-product">
                            <!-- Single-product start -->
                            <?php foreach ($tin_luotthich as $menu_tin) : ?>
                            <div class="single-product">
                                <div class="product-photo">
                                    <a href="index.php?mod=page&act=show_blog&MaTT=<?= $menu_tin['MaTT'] ?>">
                                        <img class="primary-photo" src="<?= $menu_tin['HinhAnh'] ?>" alt="" />
                                    </a>
                                </div>
                                <div class="product-brief">
                                    <h2 style="font-size: 13px;"><a
                                            href="index.php?mod=page&act=show_blog&MaTT=<?= $menu_tin['MaTT'] ?>"><?= substr($menu_tin['TieuDe'], 0, 30) ?>...</a>
                                    </h2>
                                    <h10 style="font-size: smaller;">Số Lượt Thích: <?= $menu_tin['luotthich'] ?></h3>
                                </div>
                            </div>
                            <?php
                    				endforeach;
                    				?>
                            <!-- Single-product end -->
                        </div>
                    </aside>
                    <!-- widget-top-brand end -->
                    <!-- widget sidebar-banner start -->
                    <aside class="widget sidebar-banner margin-mbl">
                        <a href="#"><img src="img/banner/sidebar-1.jpg" alt="" /></a>
                    </aside>
                    <!-- widget sidebar-banner start -->
                </div>
            </div>
        </div>
    </div>
</body>

</html>