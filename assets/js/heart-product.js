$('.action-btn').on('click', function () {
    const actionBtn = $(this); // Lưu trữ tham chiếu của phần tử .action-btn

    const idCH = actionBtn.find('.heart-mach').val();
    const idTK = actionBtn.find('.heart-matk').val();

    // Create a new FormData object
    const formData = new FormData();

    // Append idCH and idTK to the FormData object
    formData.append('idCH', idCH);
    formData.append('idTK', idTK);

    // Tiến hành gửi Ajax để upload file ảnh và dữ liệu
    $.ajax({
        url: 'model/m_load_heart.php',
        type: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        success: function (response) {
            // Xử lý phản hồi từ máy chủ (nếu cần)
            console.log(response);
            if (response == 'LOGIN') { // Nếu chưa đăng nhập đưa đi đăng nhập
                window.location.href = "index.php?mod=page&act=login";
            } else {
                actionBtn.find('span').html(response); // Sử dụng biến actionBtn thay vì this
            }
        },
        error: function (xhr, status, error) {
            // Xử lý lỗi (nếu có)
        }
    });
});
$('.single-pro-share').on('click', function () {
    const actionBtn = $(this); // Lưu trữ tham chiếu của phần tử .action-btn

    const idCH = actionBtn.find('.heart-mach').val();
    const idTK = actionBtn.find('.heart-matk').val();

    // Create a new FormData object
    const formData = new FormData();

    // Append idCH and idTK to the FormData object
    formData.append('idCH', idCH);
    formData.append('idTK', idTK);

    // Tiến hành gửi Ajax để upload file ảnh và dữ liệu
    $.ajax({
        url: 'model/m_load_heart.php',
        type: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        success: function (response) {
            // Xử lý phản hồi từ máy chủ (nếu cần)
            console.log(response);
            if (response == 'LOGIN') { // Nếu chưa đăng nhập đưa đi đăng nhập
                window.location.href = "index.php?mod=page&act=login";
            } else {
                actionBtn.find('span').html(response); // Sử dụng biến actionBtn thay vì this
            }
        },
        error: function (xhr, status, error) {
            // Xử lý lỗi (nếu có)
        }
    });
});