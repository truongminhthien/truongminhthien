<style>
.formstyle {
    padding: 40px 32px;
    background: rgb(255, 255, 255);
    box-shadow: rgb(176 176 176 / 41%) 0px 0px 16px;
    border-radius: 16px;
    margin: 40px 0 0 20px;
}

.etwauR {
    width: 100%;
    height: 48px;
    box-sizing: border-box;
    border-radius: 4px;
}

.mb-5 {
    margin-bottom: 16px;
}

.jLpDkO {
    display: flex;
    -webkit-box-align: center;
    align-items: center;
    -webkit-box-pack: center;
    justify-content: center;
    outline: none;
    border-radius: 24px;
    font-size: 16px;
    background-color: #00B4D8;
    font-weight: 400;
    width: 100%;
    height: 48px;
    border: 1px solid var(--cement-light);
    box-sizing: border-box;
}

.UaotO h3 {
    font-size: 28px;
    color: #00B4D8;
    margin-bottom: 8px;
}

.content {
    margin: 20px 0 20px;
}

@media (max-width: 767px) {
    .formstyle {
        margin: 0;
    }
}
</style>

<div class="content">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <img src="uploads/welcome.png" alt="Image" class="img-fluid">
            </div>
            <div class="col-md-6 contents">
                <div class="row justify-content-center">
                    <div class="col-md-10 formstyle">
                        <div class="mb-5 UaotO">
                            <h3>Đăng Nhập</h3>
                            <p class="mb-5" style="    font-size: 18px;">Chào mừng bạn đến với Goodapartmet.</p>
                        </div>
                        <?php if (isset($_SESSION['loi'])): ?>
                        <div class="alert alert-danger" role="alert">
                            <?=$_SESSION['loi']?>
                        </div>
                        <?php endif;unset($_SESSION['loi'])?>
                        <form action="#" method="post" class="mb-5">
                            <div class="form-group first">
                                <label for="username" style="font-size: 16px;    font-weight: 500;">Nhập số điện
                                    thoại</label>
                                <input type="text" name="sodienthoai" placeholder="Nhập số điện thoại"
                                    class="form-control etwauR" id="username">

                            </div>
                            <div class="form-group last mb-4">
                                <label for="password" style="font-size: 16px;    font-weight: 500;">Nhập mật khẩu của
                                    bạn</label>
                                <input type="password" name="matkhau" placeholder="Nhập mật khẩu của bạn"
                                    class="form-control etwauR" id="password">

                            </div>

                            <div class="d-flex mb-5 align-items-center">
                                <span class="ml-auto"><a href="index.php?mod=user&act=forgotpass"
                                        class="forgot-pass">Quên Mật Khẩu?</a></span>
                            </div>

                            <input type="submit" name="submit" value="Đăng Nhập"
                                class="btn btn-block btn-primary jLpDkO">
                        </form>
                        <div class="sc-sc4voz-18 idkGGQ">Bạn chưa có tài khoản?
                            <span><a href="index.php?mod=user&act=register">Đăng ký ngay</a></span>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>