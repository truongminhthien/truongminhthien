<style>
body {
    background-color: #f9f9fa
}

.user-card-full {
    overflow: hidden;
}

.card {
    border-radius: 5px;
    -webkit-box-shadow: 0 1px 20px 0 rgba(69, 90, 100, 0.08);
    box-shadow: 0 1px 20px 0 rgba(69, 90, 100, 0.08);
    border: none;
    margin-bottom: 30px;
}

.m-r-0 {
    margin-right: 0px;
}

.m-l-0 {
    margin-left: 0px;
}

.user-card-full .user-profile {
    border-radius: 5px 0 0 5px;
}

.bg-c-lite-green {
    background: -webkit-gradient(linear, left top, right top, from(#f29263), to(#ee5a6f));
    background: linear-gradient(to right, #5ad0ee, #6486a9);
}

.user-profile {
    padding: 20px 0;
}

.card-block {
    padding: 1.25rem;
}

.m-b-25 {
    margin-bottom: 25px;
}

.img-radius {
    border-radius: 100%;
}

.page-content {
    margin-top: 40px;
}

h6 {
    font-size: 14px;
}

.card .card-block p {
    line-height: 25px;
    font-size: 18px;
}

@media only screen and (min-width: 1400px) {
    p {
        font-size: 14px;
    }
}

.card-block {
    padding: 1.25rem;
}

.b-b-default {
    border-bottom: 1px solid #e0e0e0;
}

.m-b-20 {
    margin-bottom: 20px;
}

.p-b-5 {
    padding-bottom: 5px !important;
}

.card .card-block p {
    line-height: 25px;
}

.m-b-10 {
    margin-bottom: 10px;
}

.text-muted {
    color: #919aa3 !important;
    font-size: 16px;
}

.b-b-default {
    border-bottom: 1px solid #e0e0e0;
}

.f-w-600 {
    font-weight: 600;
    font-size: 20px;
}

.m-b-20 {
    margin-bottom: 20px;
}

.m-t-40 {
    margin-top: 20px;
}

.p-b-5 {
    padding-bottom: 5px !important;
}

.m-b-10 {
    margin-bottom: 10px;
}

.m-t-40 {
    margin-top: 20px;
}

.user-card-full .social-link li {
    display: inline-block;
}

.user-card-full .social-link li a {
    font-size: 20px;
    margin: 0 10px 0 0;
    -webkit-transition: all 0.3s ease-in-out;
    transition: all 0.3s ease-in-out;
}

.btn {
    display: inline-block;
    font-weight: 400;
    float: right;
    text-align: center;
    white-space: nowrap;
    margin: 0 40px 14px 0;
    vertical-align: middle;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    border: 1px solid transparent;
    padding: 0.375rem 0.75rem;
    font-size: 1rem;
    line-height: 1.5;
    border-radius: 0.25rem;
    transition: color .15s ease-in-out, background-color .15s ease-in-out, border-color .15s ease-in-out, box-shadow .15s ease-in-out;
}

input[type="password"],
input[type="text"],
input[type="email"],
.contact-right-content input[type="tel"],
.contact-right-content textarea {
    padding: 0.8em 1em;
    color: #495057;
    border: none;
    border-radius: 0em;
    font-size: 16px;
    font-weight: 500;
    letter-spacing: 1px;
    margin-bottom: 2em;
    -webkit-appearance: none;
    outline: none;
    /* display: block; */
    width: 100%;
    background: #f0f1f3;
}


#imageOptions {
    cursor: pointer;
}

#matKhauError {
    color: red;
    margin: 5px;
}
</style>
<div class="container">
    <div class="page-content page-container" id="page-content">
        <div class="padding">
            <div class="row container d-flex justify-content-center">
                <div class="col-xl-12 col-md-12">
                    <div class="card user-card-full">
                        <form action="" method="post" enctype="multipart/form-data" onsubmit="return validateForm()">
                            <div class="row m-l-0 m-r-0">
                                <div class="col-sm-4 bg-c-lite-green user-profile">
                                    <div class="card-block text-center text-white">

                                        <div id="userImageContainer" style="    height: 140px;">
                                            <img src="uploads/avatar/<?=$_SESSION['user']['HinhAnh']?>"
                                                class="img-radius" style="width: 110px;height: 110px;"
                                                alt="User-Profile-Image" id="userImage">
                                            <ul id="imageOptions">
                                                <li onclick="selectImage()" style="font-size: 12px;">Chọn hình ảnh</li>
                                            </ul>
                                        </div>
                                        <input type="file" name="HinhAnh" id="imageInput" style="display: none;"
                                            onchange="displaySelectedImage(this)">
                                        <h6 class="f-w-600"><?=$_SESSION['user']['TenKhachHang']?></h6>
                                    </div>
                                </div>
                                <div class="col-sm-8">
                                    <div class="card-block">
                                        <h6 class="m-b-20 p-b-5 b-b-default f-w-600">Thông Tin Tài Khoản</h6>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <p class="m-b-10 f-w-600" style="    margin: 0;">Họ Và Tên:</p>
                                                <input type="text" name="Hoten"
                                                    value="<?=$_SESSION['user']['TenKhachHang']?>"
                                                    style="text-transform: capitalize; margin: 0; background: #ffffff; padding-left: 0;">
                                            </div>
                                            <div class="col-sm-6">
                                                <p class="m-b-10 f-w-600" style="    margin: 0;">Mật Khẩu:</p>
                                                <input type="password" name="MatKhau" id="MatKhau"
                                                    style="text-transform: capitalize;border-radius: 4px; margin: 0;box-shadow: rgb(176 176 176 / 41%) 0px 0px 16px;padding-left: 0;">
                                                <div id="matKhauError" class="error-message"></div>
                                            </div>
                                        </div>

                                        <div class="row" style="    margin-top: 10px;">
                                            <div class="col-sm-6">
                                                <p class="m-b-10 f-w-600">Email:</p>
                                                <input type="email" name="Email" value="<?=$_SESSION['user']['Email']?>"
                                                    style="margin: 0; background: #ffffff; padding-left: 0;">
                                            </div>
                                            <div class="col-sm-6">
                                                <p class="m-b-10 f-w-600">Số Điện Thoại:</p>
                                                <input type="text" name="SoDienThoai"
                                                    value="<?=$_SESSION['user']['SoDienThoai']?>"
                                                    style="text-transform: capitalize; margin: 0; background: #ffffff; padding-left: 0;">
                                            </div>
                                        </div>
                                        <h6 class="m-b-20 m-t-40 p-b-5 b-b-default f-w-600">Địa Chỉ:</h6>
                                        <input type="text" name="DiaChi"
                                            value="<?=$_SESSION['user']['DiaChiKhachHang']?>"
                                            style="text-transform: capitalize; margin: 0; background: #ffffff; padding-left: 0;">
                                        <div class="btn btn-primary">
                                            <input type="submit" name="submit" value="Cập Nhật" onclick="validateForm()"
                                                style="font-size: 16px;">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
function selectImage() {
    // Khi người dùng nhấn vào "Chọn hình ảnh", kích hoạt sự kiện click trên input file ẩn
    document.getElementById('imageInput').click();
}

function displaySelectedImage(input) {
    // Hiển thị hình ảnh được chọn sau khi người dùng đã chọn file
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
            document.getElementById('userImage').src = e.target.result;
        };

        reader.readAsDataURL(input.files[0]);
    }

    // Ẩn ul sau khi đã chọn xong hình ảnh
    document.getElementById('imageOptions').style.display = 'none';
}
</script>
<script>
function validateForm() {
    var matKhau = document.getElementById("MatKhau").value;
    var matKhauError = document.getElementById("matKhauError");
    if (matKhau.trim() === "") {
        return;
    } else {
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
}
</script>