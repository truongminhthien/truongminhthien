<!-- PAGE-CONTENT START -->
<section class="page-content">
    <!-- SINGLE-PRODUCT-AREA START -->
    <div class="single-product-aea margin-bottom-80">
        <div class="container">
            <div class="row">
                <?php if (isset($_SESSION['thongbaothue'])) : ?>
                    <div class="alert alert-success" role="alert">
                        <?= $_SESSION['thongbaothue'] ?>
                    </div>
                <?php endif;
                unset($_SESSION['thongbaothue']); ?>
                <div class="col-md-7 col-sm-7 col-xs-12">
                    <div class="single-product-tab-content">
                        <!-- Tab panes -->
                        <?php $arrayHinhAnh = explode('||', $product['DSHinhAnh']); ?>
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="img-one">
                                <img src="uploads/product/<?= $arrayHinhAnh[0] ?>" alt="" />
                                <a href="uploads/product/<?= $arrayHinhAnh[0]  ?>" data-lightbox="roadtrip" data-title="My caption">
                                    <span class="view-full-screen"><i class="sp-full-view"></i> Xem toàn màn hình</span>
                                </a>
                            </div>
                            <div role="tabpanel" class="tab-pane" id="img-two">
                                <img src="uploads/product/<?= $arrayHinhAnh[1]  ?>" alt="" />
                                <a href="uploads/product/<?= $arrayHinhAnh[1]  ?>" data-lightbox="roadtrip" data-title="My caption">
                                    <span class="view-full-screen"><i class="sp-full-view"></i> Xem toàn màn hình</span>
                                </a>
                            </div>
                            <div role="tabpanel" class="tab-pane" id="img-three">
                                <img src="uploads/product/<?= $arrayHinhAnh[2]  ?>" alt="" />
                                <a href="uploads/product/<?= $arrayHinhAnh[2]  ?>" data-lightbox="roadtrip" data-title="My caption">
                                    <span class="view-full-screen"><i class="sp-full-view"></i> Xem toàn màn hình</span>
                                </a>
                            </div>
                            <div role="tabpanel" class="tab-pane" id="img-four">
                                <img src="uploads/product/<?= $arrayHinhAnh[3]  ?>" alt="" />
                                <a href="uploads/product/<?= $arrayHinhAnh[3]  ?>" data-lightbox="roadtrip" data-title="My caption">
                                    <span class="view-full-screen"><i class="sp-full-view"></i> Xem toàn màn hình</span>
                                </a>
                            </div>
                        </div>
                        <!-- Nav tabs -->
                        <ul class="">
                            <li class="active"><a href="#img-one" data-toggle="tab"><img src="uploads/product/<?= $arrayHinhAnh[0]  ?>" alt="" /></a></li>
                            <li><a href="#img-two" data-toggle="tab"><img src="uploads/product/<?= $arrayHinhAnh[1]  ?>" alt="" /></a></li>
                            <li><a href="#img-three" data-toggle="tab"><img src="uploads/product/<?= $arrayHinhAnh[2]  ?>" alt="" /></a></li>
                            <li><a href="#img-four" data-toggle="tab"><img src="uploads/product/<?= $arrayHinhAnh[3]  ?>" alt="" /></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-5 col-sm-5 col-xs-12">
                    <div class="single-product-description">
                        <h3 class="title-3" style="line-height: normal;font-weight: 700"><?= $product['TenCanHo'] ?>
                        </h3>
                        <h4 style="color: red;"><?= number_format($product['GiaCH']) ?> / Ngày</h4>
                        <h5 style="font-size: 20px;font-weight: 600;">Địa chỉ: <?= $product['DiaChiCH'] ?></h5>
                        <div class="single-service" style="text-align: left; padding:20px; font-size: 20px;line-height: 30px;">
                            <h4 style="font-size: 32px; text-align: center; font-weight: 600;">Thông tin căn hộ</h4>
                            <div class="categories">
                                <span>Diện tích:</span>
                                <a href=""><?= $product['DienTich'] ?> m<sup>2</sup></a>
                            </div>
                            <div class="categories">
                                <span>Số phòng:</span>
                                <a href=""><?= $product['SoPhong'] ?></a>
                            </div>
                            <div class="categories">
                                <span>Loại căn hộ:</span>
                                <a href=""><?= $product['TenLoai'] ?></a>
                            </div>
                            <div class="categories">
                                <span>Khu vực: </span>
                                <a href="#"><?= $product['TenKV'] ?></a>
                            </div>
                            <div class="categories">
                                <span>Mã BDS:</span>
                                <a href=""><?= $_GET['id'] ?></a>
                            </div>

                            <div class="categories">
                                <span>Lượt xem:</span>
                                <a href=""><?= $product['LuotXem'] ?></a>
                            </div>

                            <div class="categories">
                                <span>Đánh giá:</span>
                                <a href=""><?php if ($product['saotb'] > 0) {
                                                echo round($product['saotb'], 1);
                                            } else {
                                                echo 5;
                                            } ?>
                                    <i class="sp-star star"></i>
                                </a>
                            </div>

                        </div>
                        <h3 style="margin-top: 10px;">CHỌN NGÀY THUÊ</h3>
                        <!-- <div class="alert alert-danger" role="alert">
                            fàeae
                        </div> -->
                        <form action="index.php?mod=page&act=rentnow" method="post" onsubmit="return validateForm()">
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="boxinput-date">
                                        <input type="text" id="datePicker1" name="datePicker1" class="inputdate" placeholder="Ngày nhận">
                                        <i class="fa-regular fa-calendar"></i>
                                    </div>
                                </div>
                                <div class="col-md-1 box-to">
                                    <p>Đến</p>
                                </div>
                                <div class="col-md-5">
                                    <div class="boxinput-date">
                                        <input type="text" id="datePicker2" name="datePicker2" class="inputdate" placeholder="Ngày trả">
                                        <i class="fa-regular fa-calendar"></i>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" value="<?= $_GET['id'] ?>" id="MaCH" name="mach">
                            <div class="product-counts fix margin-top-80">
                                <div class="single-pro-add-cart">
                                    <input type="submit" class="shop-now" value="Thuê ngay">
                                </div>
                            </div>
                        </form>
                        <script>
                            function validateForm() {
                                // Lấy giá trị của trường ngày
                                var dateValue1 = document.getElementById("datePicker1").value;
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
                                // Nếu có giá trị, cho phép submit form
                                return true;
                            }
                        </script>
                        <div class="single-pro-share" style="font-size: 18px;">
                            <input type="hidden" class="heart-mach" value="<?= $_GET['id'] ?>">
                            <input type="hidden" class="heart-matk" value="<?php if (isset($_SESSION['user'])) {
                                                                                echo $_SESSION['user']['MaTK'];
                                                                            } else {
                                                                                echo 0;
                                                                            }
                                                                            ?>">
                            <li><a><i class="sp-heart"></i><span><?php
                                                                    if (isset($_SESSION['user'])) {
                                                                        if ($product['canhoyt'] > 0) {
                                                                            echo "ĐÃ YÊU THÍCH";
                                                                        } else {
                                                                            echo "YÊU THÍCH";
                                                                        }
                                                                    } else {
                                                                        echo "YÊU THÍCH";
                                                                    }
                                                                    ?></span></a></li>
                            </ul>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- SINGLE-PRODUCT-AREA END -->
    <!-- SINGLE-PRODUCT-REVIEWS-AREA START -->
    <div class="single-product-reviews-area margin-bottom-80">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="discription-reviews-tab">
                        <!-- Nav tabs -->
                        <ul class="reviews-tab-menu" role="tablist">
                            <li role="presentation" class="active"><a href="#description" style="font-size: 30px;" data-toggle="tab">Mô tả căn
                                    hộ</a></li>
                            <li role="presentation"><a href="#reviews" style="font-size: 30px;" data-toggle="tab">Đánh
                                    giá</a></li>
                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="description">
                                <div class="single-pro-product-description">
                                    <h2 style="font-size: 26px; font-weight: 600;" class="title-4">
                                        <?= $product['TenCanHo'] ?></h2>
                                    <p style="font-size: 18px; line-height: 30px;">
                                        <?= $product['MoTaCH'] ?>
                                    </p>
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane" id="reviews">
                                <div class="product-page-comments">
                                    <h2>Hãy để lại cảm nhận của bạn sau khi thuê!</h2>

                                    <div class="review-form-wrapper">
                                        <h3>Thêm bài đánh giá</h3>
                                        <form action="index.php?mod=page&act=comment&id=<?= $_GET['id'] ?>" onsubmit="return validateFormn()" method="post">
                                            <div class=" your-rating">
                                                <h5>Bạn hài lòng?</h5>
                                                <span class="form-star">
                                                    <i class="sp-star"></i>
                                                </span>
                                                <span class="form-star">
                                                    <i class=" sp-star"></i>
                                                    <i class="sp-star"></i>
                                                </span>
                                                <span class="form-star">
                                                    <i class="sp-star"></i>
                                                    <i class="sp-star"></i>
                                                    <i class="sp-star"></i>
                                                </span>
                                                <span class="form-star">
                                                    <i class="sp-star"></i>
                                                    <i class="sp-star"></i>
                                                    <i class="sp-star"></i>
                                                    <i class="sp-star"></i>
                                                </span>
                                                <span class="form-star">
                                                    <i class="sp-star star"></i>
                                                    <i class="sp-star star"></i>
                                                    <i class="sp-star star"></i>
                                                    <i class="sp-star star"></i>
                                                    <i class="sp-star star"></i>
                                                </span>
                                            </div>
                                            <input type="hidden" value="<?php
                                                                        if (isset($_SESSION['user'])) {

                                                                            if ($comment[0]['soluong'] > 0) {
                                                                                echo 'true';
                                                                            } else {
                                                                                echo 'false';
                                                                            }
                                                                        } ?>" name="xacnhan" id="xacnhan">
                                            <input type="hidden" value="5" name="star">

                                            <textarea name="noidung" id="product-message" cols="30" rows="10" placeholder="Your Rating"></textarea>
                                            <div style="color: red;">
                                                <?php if (!isset($_SESSION['user'])) {
                                                    echo 'CẦN ĐĂNG NHẬP ĐỂ ĐÁNH GIÁ!';
                                                } ?>
                                            </div>
                                            <input type="submit" value="Xác nhận" <?php if (!isset($_SESSION['user'])) {
                                                                                        echo 'disabled';
                                                                                    } ?> />
                                        </form>
                                        <script>
                                            function validateFormn() {
                                                // Lấy giá trị của thẻ input xác nhận
                                                var xacnhanValue = document.getElementById("xacnhan").value;

                                                // Kiểm tra giá trị
                                                if (xacnhanValue !== "true") {
                                                    // Hiển thị thông báo alert nếu giá trị không phải là true
                                                    alert("Bạn chưa từng thuê căn hộ này, Hãy thuê và đánh giá ngay!");
                                                    return false; // Ngăn chặn việc submit biểu mẫu
                                                }

                                                // Thực hiện các xử lý khác nếu giá trị là true
                                                return true; // Cho phép submit biểu mẫu
                                            }
                                            // Lấy tất cả các đối tượng có class là 'form-star'
                                            var starContainers = document.querySelectorAll('.form-star');

                                            // Duyệt qua từng đối tượng 'form-star'
                                            starContainers.forEach(function(starContainer) {
                                                // Lắng nghe sự kiện click trên mỗi 'form-star'
                                                starContainer.addEventListener('click', function() {
                                                    // Loại bỏ lớp 'star' từ tất cả các thẻ 'i' trong tất cả các 'form-star'
                                                    starContainers.forEach(function(container) {
                                                        container.querySelectorAll('i').forEach(
                                                            function(star) {
                                                                star.classList.remove(
                                                                    'star');
                                                            });
                                                    });
                                                    // Thêm lớp 'star' vào các thẻ 'i' của 'form-star' được chọn
                                                    starContainer.querySelectorAll('i').forEach(
                                                        function(star, index) {
                                                            star.classList.add('star');
                                                        });

                                                    // Lấy số lượng thẻ 'i' trong 'form-star' được chọn và đặt giá trị vào input 'star'
                                                    var starValue = starContainer.querySelectorAll(
                                                        'i.star').length;
                                                    document.querySelector('input[name="star"]').value =
                                                        starValue;
                                                });
                                            });
                                        </script>
                                        <div class="single-post-comments">
                                            <div class="comments-area">
                                                <div class="comments-heading">
                                                    <h3><?php
                                                        if ($product['slyt'] > 0) {
                                                            echo $product['slyt'];
                                                        } else {
                                                            echo 0;
                                                        }
                                                        ?> Đánh giá</h3>
                                                </div>
                                                <div class="comments-list">
                                                    <ul>
                                                        <!-- Hiển thị các đánh giá  -->
                                                        <?php foreach ($allComment as $comment) : ?>
                                                            <li>
                                                                <div class="comments-details">
                                                                    <div class="comments-list-img">
                                                                        <img alt="" src="uploads/avatar/<?= $comment['HinhAnh'] ?>?">
                                                                    </div>
                                                                    <div class="comments-content-wrap">
                                                                        <span>
                                                                            <b><a href="#"><?= $comment['TenKhachHang'] ?></a></b>
                                                                            Ngày đăng:
                                                                            <span class="post-time"><?= $comment['NgayDang'] ?></span>
                                                                            <a href="#">
                                                                                <?php
                                                                                for ($i = 1; $i <= 5; $i++) {

                                                                                    if ($comment['SoSao'] >= $i) {
                                                                                        echo  '<i class="sp-star star"></i>';
                                                                                    } else {
                                                                                        echo  '<i class="sp-star "></i>';
                                                                                    }
                                                                                }
                                                                                ?>
                                                                            </a>
                                                                        </span>
                                                                        <p><?= $comment['NoiDung'] ?></p>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <?php if ($comment['MaPH'] != null) : ?>
                                                                <li class="threaded-comments">
                                                                    <div class="comments-details">
                                                                        <div class="comments-list-img">
                                                                            <img alt="" src="uploads/avatar/<?= $comment['Anhadmin'] ?>">
                                                                        </div>
                                                                        <div class="comments-content-wrap">
                                                                            <span>
                                                                                <b><a href="#"><?= $comment['Tenadmin'] ?></a></b>
                                                                                <span class="post-time"><?= $comment['ngaydang'] ?></span>
                                                                            </span>
                                                                            <p><?= $comment['NDadmin'] ?></p>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                            <?php endif; ?>
                                                        <?php endforeach; ?>
                                                        <!-- Kết thúc hiển thị đánh giá -->
                                                    </ul>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- SINGLE-PRODUCT-REVIEWS-AREA END -->
    <!-- SINGLE-PRODUCT-RELATED-AREA START -->
    <div class="single-product-related-area margin-bottom-80">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="related-product-title">
                        <h3>Căn hộ cùng khu vực</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="active-related-product shop-grid">
            <?php
            foreach ($Apartment as $apartment) :
                $arrayHinhAnh = explode('||', $apartment['DSHinhAnh']);
            ?>
                <!-- Single-product start -->
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
                        <div class="pro-rating">
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
                                        echo  '<a><i style="font-weight: bold;" class="sp-star star"></i></a>';
                                    } else {
                                        echo  '<a><i style="font-weight: 500;" class="sp-star"></i></a>';
                                    }
                                }
                            }
                            ?>

                        </div>
                        <h2 style="height: 60px;"><a href="index.php?mod=page&act=product&id=<?= $apartment['MaCH'] ?>"><?= substr($apartment['TenCanHo'], 0, 52) ?></a>
                        </h2>
                        <h3 style="color: red;"><?= number_format($apartment['GiaCH']) ?> đ/Ngày</h3>
                        <div class="column-product">
                            <div>
                                <ul>
                                    <li><?= $apartment['DienTich'] ?> m<sup>2</sup></li>
                                    <li><?= $apartment['SoPhong'] ?> Phòng</li>
                                </ul>
                            </div>
                            <div>
                                <ul>
                                    <li><?= $apartment['TenLoai'] ?></li>
                                    <li> <?php
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
            <?php endforeach; ?>

        </div>
    </div>
    <!-- SINGLE-PRODUCT-RELATED-AREA END -->
    <!-- SERVICE-AREA START -->


    <!-- SERVICE-AREA END -->
</section>

<!-- PAGE-CONTENT END -->
<style>
    .flatpickr-day[data-date="2023-11-28"] {
        background-color: yellow;
        /* Đổi màu nền của ngày 28 thành màu vàng */
        color: red;
        /* Đổi màu chữ của ngày 28 thành màu đỏ */
        font-weight: bold;
        /* Tô đậm chữ của ngày 28 */
    }

    .box-to {
        padding: 0;
        width: 45px;
    }

    .box-to p {
        text-align: center;
        background-color: #61a7ef;
        width: 50px;
        border-radius: 5px;
        line-height: 55px;
        color: white;
    }

    .inputdate {
        max-width: 180px;
        background-color: #45a4f2;
        padding: 15px;
        font-family: "Roboto Mono", monospace;
        color: #ffffff;
        font-size: 18px;
        border: none;
        outline: none;
        border-radius: 5px;
        color: #ffffff;
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
</style>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>

<?php

// Khởi tạo mảng $hiddenDate
$hiddenDate1 = [];

// Duyệt qua mỗi phần tử trong $sqlResult
foreach ($hiddenDate as $row) {
    // Tạo một mảng mới với cấu trúc 'NgayNhan' và 'NgayTra' từ dữ liệu của mỗi hàng
    $hiddenDate1[] = [
        'NgayNhan' => $row['NgayNhan'],
        'NgayTra' => $row['NgayTra'],
    ];
}
// Hiển thị mảng $hiddenDate
// var_dump($hiddenDate1);
$additionalDates = [];
foreach ($hiddenDate1 as $dateRange) {
    $startDate = new DateTime($dateRange['NgayNhan']);
    $endDate = new DateTime($dateRange['NgayTra']);
    $interval = new DateInterval('P1D'); // Mỗi ngày
    $currentDate = clone $startDate;
    while ($currentDate <= $endDate) {
        $additionalDates[] = $currentDate->format('Y-m-d');
        $currentDate->add($interval);
    }
}
usort($additionalDates, function ($a, $b) {
    return strtotime($a) - strtotime($b);
});
// Kiểm tra kết quả
// var_dump($additionalDates);
$jsArray = json_encode($additionalDates);
?>

<script>
    let hiddenDates = <?php echo $jsArray; ?>.map(date => ({
        date: new Date(date)
    }));
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
        disable: hiddenDates.map(date => date.date.toLocaleDateString()),
    };

    const modifiedDates = hiddenDates.map(date => new Date(date.date.getTime() - 24 * 60 * 60 * 1000));

    const datePicker1 = flatpickr("#datePicker1", {
        ...config1,
        minDate: "today",
        disable: modifiedDates
            .filter(modifiedDate =>
                hiddenDates.some(originalDate => modifiedDate.getTime() === originalDate.date.getTime())
            )
            .map(date => date.toLocaleDateString()),
    });
    const modifiedDatest = hiddenDates.map(date => new Date(date.date.getTime() + 24 * 60 * 60 * 1000));
    const datePicker2 = flatpickr("#datePicker2", {
        ...config1,
        minDate: "today",
        disable: modifiedDatest
            .filter(modifiedDate =>
                hiddenDates.some(originalDate => modifiedDate.getTime() === originalDate.date.getTime())
            )
            .map(date => date.toLocaleDateString()),
    });


    datePicker1.config.onChange.push((selectedDates, dateStr, instance) => {
        // Set minDate for datePicker2 based on the selected date in datePicker1
        const minDate = selectedDates[0];
        minDate.setDate(minDate.getDate() + 1);
        console.log(hiddenDates.map(date => date.date.toLocaleDateString()));
        // Lặp qua mảng hiddenDates để kiểm tra xem minDate có trùng khớp không\
        // Tạo mảng chuỗi từ mảng hiddenDates
        const hiddenDatesStrings = hiddenDates.map(date => date.date.toLocaleDateString());

        // Sử dụng forEach để lặp qua mỗi phần tử trong mảng chuỗi

        const foundDate = hiddenDatesStrings.find(dateString => {
            const hiddenDate = moment(dateString, "DD/MM/YYYY");
            // Xác định định dạng ngày tháng
            const selectedDate = moment(dateStr, "DD/MM/YYYY").add(1, 'days').toDate();;

            console.log(selectedDate.valueOf(), '<', hiddenDate.valueOf());

            return selectedDate <= hiddenDate;
        });

        if (foundDate) {
            const maxDate = moment(foundDate, "DD/MM/YYYY").add(1, 'days').toDate();
            console.log(dateStr, '==', foundDate);
            datePicker2.set("maxDate", maxDate);
        } else {
            // Tạo một đối tượng Date hiện tại
            var currentDate = new Date();
            // Thêm 3 tháng vào ngày hiện tại
            var maxDate = new Date(currentDate);
            maxDate.setMonth(currentDate.getMonth() + 3);
            // Sử dụng phương thức set để đặt giá trị maxDate
            datePicker2.set('maxDate', maxDate);
        }

        // Cập nhật minDate cho datePicker2
        datePicker2.set("minDate", minDate);
        // Lấy mảng ngày cần ẩn, bao gồm ngày được chọn và những ngày trước đó

    });
</script>