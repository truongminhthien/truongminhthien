<style>
.formstyle {
    padding: 40px 32px;
    background: rgb(255, 255, 255);
    box-shadow: rgba(177, 179, 181, 0.2) 0px 0px 16px;
    border-radius: 16px;
    margin: 80px 0 0 20px;
    border: 1px solid #a9d7de;
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

#matKhauError {
    color: red;
    margin: 5px;
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
                            <h3>Thay Đổi Mật Khẩu</h3>
                        </div>
                        <form action="#" method="post" onsubmit="return validateForm()" class="mb-5">
                            <div class="form-group first">
                                <label for="username" style="font-size: 16px;    font-weight: 500;">Nhập Mật
                                    Khẩu:</label>
                                <input type="password" name="MatKhau" placeholder="Nhập Mật Khẩu" id="MatKhau"
                                    class="form-control etwauR" id="username">
                                <div id="matKhauError" class="error-message"></div>

                            </div>
                            <input type="submit" name="submit" value="Xác Nhận" onclick="validateForm()"
                                class="btn btn-block btn-primary jLpDkO">
                        </form>
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>
<script>
function validateForm() {
    var matKhau = document.getElementById("MatKhau").value;
    var matKhauError = document.getElementById("matKhauError");
    // Kiểm tra mật khẩu
    if (matKhau.trim().length < 6) {
        matKhauError.innerHTML = "Mật khẩu phải có ít nhất 6 ký tự";
        document.getElementById("MatKhau").focus(); // Đặt trỏ chuột vào ô input Mật khẩu
        return false;
    } else {
        // Kiểm tra xem có ít nhất 1 chữ in hoa và 1 ký tự đặc biệt
        var uppercasePattern = /[A-Z]/;
        var specialCharPattern = /[!@#$%^&*()_+{}\[\]:;<>,.?~\\/-]/;

        if (!uppercasePattern.test(matKhau) || !specialCharPattern.test(matKhau)) {
            matKhauError.innerHTML = "Mật khẩu phải chứa ít nhất 1 chữ in hoa và 1 ký tự đặc biệt";
            document.getElementById("MatKhau").focus(); // Đặt trỏ chuột vào ô input Mật khẩu
            return false;
        } else {
            matKhauError.innerHTML = "";
        }
    }
    return true;
}
</script>
