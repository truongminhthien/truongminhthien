<style>
.error-title h1 {
    color: #000000b0;
}
</style>
<section class="page-content">
    <!-- 404-AREA START -->
    <div class="area-404 margin-bottom-80">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="error">
                        <div class="error-title">
                            <h1>Thành Công!</h1>
                        </div>
                        <div class="eror-brief">
                            <h2>Cảm Ơn Bạn.</h2>
                            <?php
if (isset($_SESSION['thongbao'])) {
    echo $_SESSION['thongbao'];
} else {
    echo '
    <h3>Chúng Tôi Sẽ Liên Hệ Với Bạn Sớm Nhất.</h3>';
}
;unset($_SESSION['thongbao']);
?>
                        </div>

                        <div class="back-home">
                            <a href="?mod=page&act=home" style="    background-color: #00b4d7;"> Trang chủ</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- 404-AREA END -->
</section>