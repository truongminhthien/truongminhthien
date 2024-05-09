<style>
td {
    border: 1px solid #000000;
    padding: 8px;
}
</style>
<h3 class="fw-bold">Quản lý Bình Luận</h3>
<hr>
<div class="container">
    <div class="row shop-list">
        <table>
            <tr>
                <th class="th1">Danh Sách</th>
                <th>Hành Động</th>
                <!-- <th class="text-"><a href="#"><button type="button" class="btn btn-primary">Thêm</button></a></th> -->
            </tr>
            <?php foreach ($laycancobinhluan as $key) : extract($key) ?>
            <tr>
                <td class="td1">
                    <div class="container">
                        <div class="row">
                            <div class="col-2">
                                <img src="uploads/product/<?= $arrayHinhAnh = explode('||', $DSHinhAnh)[0]; ?>"
                                    class="img-thumbnail" alt="...">
                            </div>
                            <div class="col-10 ">
                                <h5 class="mb-0">Tên căn hộ: <?= $TenCanHo ?></h5>
                                <p class="fw-bold text-danger mb-0">+Giá: <?= $GiaCH ?> VNĐ/Ngày</p>
                                <div class="p-3 mb-2 bg-secondary-subtle text-emphasis-secondary"
                                    style="  display: flex; border-radius: 2px;">
                                    <div>
                                        <img src="uploads/avatar/<?= $HinhAnh ?>" alt=""
                                            style="height: 50px; margin-right: 20px;">
                                    </div>
                                    <div class="">
                                        <?php
                                            for ($i = 1; $i <= 5; $i++) {

                                                if ($SoSao >= $i) {
                                                    echo '<a><i style="font-weight: bold;" class="sp-star star"></i></a>';
                                                } else {
                                                    echo '<a><i style="font-weight: 500;" class="sp-star"></i></a>';
                                                }
                                            }
                                            ?>
                                        <?= $NgayDang ?>
                                        <p class="mb-0">+Người Bình Luận: <?= $TenKhachHang ?></p>

                                        <p class="mb-0">+Bình Luận: <?= $NoiDung ?></p>


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </td>
                <td class="text-center">
                    <a href="?mod=admin&act=binhlancuamotcanho&mach=<?= $MaCH ?>" class="btn btn-success">Xem Chi
                        Tiết</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>

    </div>
</div>