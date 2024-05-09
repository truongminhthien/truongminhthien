<style>
.formstyle {
    padding: 40px 70px;
    background: rgb(255, 255, 255);
    box-shadow: rgba(177, 179, 181, 0.2) 0px 0px 16px;
    border-radius: 16px;
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
    margin-top: 20px;
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

.justify-content-center {
    display: flex;
    justify-content: center;
}

#hoTenError {
    color: red;
    margin: 5px;
}

#soDienThoaiError {
    color: red;
    margin: 5px;
}

#emailError {
    color: red;
    margin: 5px;
}

#diaChiError {
    color: red;
    margin: 5px;
}

#matKhauError {
    color: red;
    margin: 5px;
}
</style>
<div class="content">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 contents formstyle ">
                <div class="mb-5 UaotO">
                    <h3>Đăng Ký</h3>
                    <p class="mb-5" style="    font-size: 18px;">Đăng ký tài khoản Goodapartmet để nhận được ưu
                        đãi và tin tức thị trường mới nhất. </p>
                </div>
                <?php if (isset($_SESSION['loi'])): ?>
                <div class="alert alert-danger" role="alert">
                    <?=$_SESSION['loi']?>
                </div>
                <?php endif;unset($_SESSION['loi'])?>
                <form action="#" method="post" onsubmit="return validateForm()" enctype="multipart/form-data"
                    enctype="multipart/form-data" class="mb-5">
                    <div class="form-group first">
                        <label for="username" style="font-size: 16px;    font-weight: 500;">Họ Và Tên:</label>
                        <input type="text" name="HoTen" value="<?php if (isset($HoTen)) {echo $HoTen;}?>"
                            placeholder="Nhập Họ Và Tên" class="form-control etwauR" id="HoTen">
                        <div id="hoTenError" class="error-message"></div>
                    </div>
                    <div class="form-group last mb-4">
                        <label for="password" style="font-size: 16px;    font-weight: 500;">Số Điện Thoại:</label>
                        <input type="text" name="SoDienThoai" placeholder="Nhập Số Điện Thoại"
                            value="<?php if (isset($SoDienThoai)) {echo $SoDienThoai;}?>" class="form-control etwauR"
                            id="SoDienThoai">
                        <div id="soDienThoaiError" class="error-message"></div>
                    </div>
                    <div class="form-group first">
                        <label for="username" style="font-size: 16px;    font-weight: 500;">Email:</label>
                        <input type="email" name="Email" value="<?php if (isset($Email)) {echo $Email;}?>"
                            placeholder="Nhập Email" class="form-control etwauR" id="Email">
                        <div id="emailError" class="error-message"></div>
                    </div>
                    <div class="form-group first">
                        <label for="username" style="font-size: 16px;    font-weight: 500;">Địa Chỉ:</label>
                        <input type="text" name="DiaChi" value="<?php if (isset($DiaChi)) {echo $DiaChi;}?>"
                            placeholder="Nhập Địa Chỉ" class="form-control etwauR" id="DiaChi">
                        <div id="diaChiError" class="error-message"></div>
                    </div>
                    <div class="form-group last mb-4">
                        <label for="password" style="font-size: 16px;    font-weight: 500;">Mật Khẩu:</label>
                        <input type="password" name="MatKhau" value="<?php if (isset($MatKhau)) {echo $MatKhau;}?>"
                            placeholder="Nhập Mật Khẩu" class="form-control etwauR" id="MatKhau">
                        <div id="matKhauError" class="error-message"></div>
                    </div>

                    <div class="form-group last mb-5">
                        <label for="password" style="font-size: 16px;    font-weight: 500;">Hình Ảnh:</label>
                        <input type="file" name="HinhAnh" id="HinhAnh" class=" form-control etwauR">

                    </div>

                    <input type="submit" name="submit" value="Đăng Ký" onclick="validateForm()"
                        class="btn btn-block btn-primary jLpDkO">
                </form>
                <div class="sc-sc4voz-18 idkGGQ">
                    <p>
                        - Qua việc đăng nhập hoặc tạo tài khoản, bạn đồng ý với các Điều khoản
                        và
                        Điều kiện cũng như Chính sách An toàn và Bảo mật của chúng tôi
                    </p>
                </div>

            </div>

        </div>
    </div>
</div>
<script>
function validateForm() {
    var hoTen = document.getElementById("HoTen").value;
    var soDienThoai = document.getElementById("SoDienThoai").value;
    var email = document.getElementById("Email").value;
    var diaChi = document.getElementById("DiaChi").value;
    var matKhau = document.getElementById("MatKhau").value;

    var hoTenError = document.getElementById("hoTenError");
    var soDienThoaiError = document.getElementById("soDienThoaiError");
    var emailError = document.getElementById("emailError");
    var diaChiError = document.getElementById("diaChiError");
    var matKhauError = document.getElementById("matKhauError");

    // Các kiểm tra lỗi

    // Kiểm tra xem trường Họ tên có được điền không
    if (hoTen.trim() === "") {
        hoTenError.innerHTML = "Vui lòng nhập Họ Và Tên";
        document.getElementById("HoTen").focus(); // Đặt trỏ chuột vào ô input Họ tên
        return false;
    } else {
        hoTenError.innerHTML = "";
    }

    // Kiểm tra số điện thoại
    if (soDienThoai.trim() === "") {
        soDienThoaiError.innerHTML = "Số điện thoại không được để trống";
        document.getElementById("SoDienThoai").focus(); // Đặt trỏ chuột vào ô input Số điện thoại
        return false;
    } else {
        var phoneNumberPattern = /^\d{10}$/;
        if (!phoneNumberPattern.test(soDienThoai)) {
            soDienThoaiError.innerHTML = "Số điện thoại không hợp lệ";
            document.getElementById("SoDienThoai").focus(); // Đặt trỏ chuột vào ô input Số điện thoại
            return false;
        } else {
            soDienThoaiError.innerHTML = "";
        }
    }

    // Kiểm tra địa chỉ email
    if (email.trim() === "") {
        emailError.innerHTML = "Email không được để trống";
        document.getElementById("Email").focus(); // Đặt trỏ chuột vào ô input Email
        return false;
    } else {
        var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailPattern.test(email)) {
            emailError.innerHTML = "Email không hợp lệ";
            document.getElementById("Email").focus(); // Đặt trỏ chuột vào ô input Email
            return false;
        } else {
            emailError.innerHTML = "";
        }
    }

    // Kiểm tra trường Địa chỉ
    if (diaChi.trim() === "") {
        diaChiError.innerHTML = "Địa chỉ không được để trống";
        document.getElementById("DiaChi").focus(); // Đặt trỏ chuột vào ô input Địa chỉ
        return false;
    } else {
        diaChiError.innerHTML = "";
    }

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

    // Thêm các kiểm tra lỗi cho các trường khác

    // Nếu tất cả các kiểm tra lỗi đều đúng, biểu mẫu sẽ được gửi đi
    return true;
}
</script>