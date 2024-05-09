<div class="blog-area margin-bottom-80">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="row">
                    <div class="col-md-12">
                        <div class="author-info">
                            <div class="author-avatar"><img alt="" src="uploads/product/<?= $arrayHinhAnh = explode('||', $binhluancumotcanho[0]['DSHinhAnh'])[0];
                                                                                        ?>"></div>
                            <div class="author-description">
                                <h3><?= $binhluancumotcanho[0]['TenCanHo'] ?></h3>
                                <p><?php echo substr($binhluancumotcanho[0]['MoTaCH'], 0, 100) ?>...</p>
                            </div>
                        </div>
                        <div class="single-post-comments">
                            <form action="" method="post" id="commentForm">
                                <div class="comment-respond" id="toi">
                                    <h3 class="comment-reply-title">Leave a Reply </h3>
                                    <span class="email-notes">Your email address will not be published. Required fields
                                        are
                                        marked *</span>
                                    <div class="row">

                                        <div class="col-md-12">
                                            <p>Bình luận</p>
                                            <div class="" id="traloi"></div>
                                        </div>
                                        <div class="col-md-12 comment-form-comment">
                                            <p>Nội Dung Phản Hồi</p>
                                            <textarea rows="10" cols="30" id="message" name="noidung"></textarea>
                                            <input type="submit" name="submit" value="Post Comment">
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <div class="comments-area mt-3">
                                <div class="comments-heading">
                                    <h3><?= $binhluancumotcanho[0]['COUNT(MaCH)'] ?> Bình Luận</h3>
                                </div>
                                <div class="comments-list">
                                    <ul>


                                        <?php foreach ($binhluancumotcanho as $key) :; ?>
                                            <li>
                                                <div class="comments-details">
                                                    <div class="comments-list-img">
                                                        <img alt="" src="uploads/avatar/<?= $key['HinhAnh'] ?>">
                                                    </div>
                                                    <div class="comments-content-wrap">
                                                        <span>
                                                            <b><a href="#"><?= $key['TenKhachHang'] ?></a></b>
                                                            <span class="post-time"><?= $key['NgayDang'] ?></span>
                                                            <a href="#toi" onclick="toggleInput(this)">Trả lời <input type="radio" value="<?= $key['MaBL'] ?>" name="mabl" class="myInput" style="display: none;"></a>
                                                            <span style="    display: inline-block;">
                                                                <form action="index.php?mod=admin&act=binhlancuamotcanho&mach=<?= $_GET['mach'] ?>" method="post" onsubmit="return confirmSubmit()">
                                                                    <input type="hidden" name="mabl" value="<?= $key['MaBL'] ?>">
                                                                    <input type="submit" name="delete" value="Xóa">
                                                                </form>
                                                            </span>
                                                        </span>
                                                        <p><?= $key['NoiDung'] ?></p>
                                                    </div>
                                                </div>
                                            </li>
                                            <?php if ($key['MaPH'] != null) : ?>
                                                <li class="threaded-comments">
                                                    <div class="comments-details">
                                                        <div class="comments-list-img">
                                                            <img alt="" src="uploads/avatar/<?= $key['Anhadmin'] ?>">
                                                        </div>
                                                        <div class="comments-content-wrap">
                                                            <span>
                                                                <b><a href="#"><?= $key['Tenadmin'] ?></a></b>
                                                                <span class="post-time"><?= $key['ngaydang'] ?></span>
                                                            </span>
                                                            <p><?= $key['NDadmin'] ?></p>
                                                        </div>
                                                    </div>
                                                </li>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
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

<script>
    function toggleInput(clickedElement) {
        // Lấy ra phần tử input trong thẻ a được click
        var myInput = clickedElement.querySelector('.myInput');

        // Kiểm tra trạng thái checked của input và đảo ngược nó
        myInput.checked = !myInput.checked;

        // Thay đổi loại của input từ "radio" thành "number"
        myInput.type = "number";

        // Lấy phần tử li chứa thẻ a được click
        var parentLi = clickedElement.closest('li');

        // Lấy nội dung của phần tử li
        var liContent = parentLi.innerHTML;

        // Hiển thị nội dung trong div có id "traloi"
        document.getElementById('traloi').innerHTML = liContent;

        // Optional: Thêm hoặc xóa class để thay đổi giao diện của input
        if (myInput.checked) {
            myInput.classList.add('highlight');
        } else {
            myInput.classList.remove('highlight');
        }
    }
</script>
<script>
    document.getElementById('commentForm').addEventListener('submit', function(event) {
        // Lấy ra phần tử input có class là "myInput"
        var myInput = this.querySelector('.myInput');

        // Kiểm tra xem có phần tử input "myInput" không
        if (!myInput) {
            // Nếu không có, ngăn chặn sự kiện submit
            event.preventDefault();
            alert('Bạn cần chọn bình luận để phản hồi');
        }
    });
</script>
<script>
    function confirmSubmit() {
        // Câu hỏi mặc định
        var question = 'Bạn có chắc chắn muốn thực hiện hành động này?';
        // Hiển thị hộp thoại xác nhận và trả về kết quả
        return confirm(question);
    }
</script>