<h3 class="fw-bold">Quản lý căn hộ</h3>
<hr>

<div class="row">
    <!-- Example single danger button -->
    <div class="btn-group col-2">
        <button class="btn btn-primary btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown"
            aria-expanded="false">
            Loại căn hộ
        </button>
        <ul class="dropdown-menu">
            <?php
        foreach ($type as $type_row) :
        ?>
            <li><a class="dropdown-item"
                    href="index.php?mod=admin&act=manage&MaLoai=<?= $type_row['MaLoai'] ?>"><?= $type_row['TenLoai'] ?></a>
            </li>
            <!-- <li><a class="dropdown-item" href="#">Căn hộ thông thường</a></li>
            <li><a class="dropdown-item" href="#">Căn hộ Mini</a></li> -->
            <?php endforeach; ?>
        </ul>
    </div>

    <div class="col text-end">
        <a href="index.php?mod=admin&act=manage-add"><button type="button" class="btn btn-primary">Thêm căn
                hộ</button></a>
    </div>
</div>
<br>
<br>
<table>
    <tr>
        <th class="th1" style="border: 1px solid #000000;">Danh sách căn hộ</th>
        <th class="th2 text-center" style="border: 1px solid #000000;">Trạng thái</th>
        <th class="th3 text-center" style="border: 1px solid #000000;">Xóa & sửa</th>
    </tr>
    <?php
        foreach ($product as $product_row) :
          $arrayHinhAnh = explode('||', $product_row['DSHinhAnh']);

          $product_row['MoTaCH'] = substr($product_row['MoTaCH'], 0, 380);

          if ($product_row['TrangThai']==1){
            $product_row['TrangThai']='<button type="button" class="btn btn-success">hiện</button>';
          } else if($product_row['TrangThai']==0){
            $product_row['TrangThai']='<button type="button" class="btn btn-danger">ẩn</button>';
          }
        ?>
    <tr>
        <td class="td1" style="border: 1px solid #000000;">
            <div class="container">
                <div class="row">
                    <div class="col-2">
                        <img src="uploads/product/<?= $arrayHinhAnh[0] ?>" class="rounded py-1" style="width:100%">
                    </div>
                    <div class="col-10 ">
                        <h5 class="mb-0">Tên căn hộ: <?= $product_row['TenCanHo'] ?></h5>
                        <p class="mb-0">+Mô tả: <?= $product_row['MoTaCH'] ?><a href="#" class="link-underline-light">
                                Xem thêm...</a></p>
                        <p class="mb-0">+Địa chỉ: <?= $product_row['DiaChiCH'] ?></p>
                        <p class="fw-bold text-danger mb-0">+Giá: <?= number_format($product_row['GiaCH']) ?> VNĐ/Ngày
                        </p>
                    </div>
                </div>
            </div>
        </td style="border: 1px solid #000000;">
        <td class="td2" style="border: 1px solid #000000;">
            <?= $product_row['TrangThai']?>
        </td>
        <td class="td3" style="border: 1px solid #000000;">
            <a href="index.php?mod=admin&act=manage-delete&MaCH=<?= $product_row['MaCH'] ?>"
                onclick="return confirm('Bạn chắc chắn muốn xóa?')" class="delete"><i class="fa-solid fa-trash-can"
                    style="color: #ff0000;"></i></a>
            <a href="index.php?mod=admin&act=manage-edit&MaCH=<?= $product_row['MaCH'] ?>" class="fix"><i
                    class="fa-solid fa-pen-to-square" style="color: #fbd202;"></i></a>
        </td>
    </tr>
    <?php endforeach; ?>

</table>

<?php if (isset($_GET['MaLoai'])==null): ?>
<nav aria-label="Page navigation example">
    <ul class="pagination justify-content-center">
        <li class="page-item <?=($page<=1)?'disabled':'' ?>">
            <a class="page-link" href="index.php?mod=admin&act=manage&page=<?=$page-1 ?>" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
            </a>
        </li>
        <?php for($i=1;$i<=$sotrang;$i++): ?>
        <li class="page-item <?=($page==$i)?'active':'' ?>">
            <a class="page-link" href="index.php?mod=admin&act=manage&page=<?=$i ?>"><?=$i ?></a>
        </li>
        <?php endfor; ?>
        <li class="page-item <?=($page>=$sotrang)?'disabled':'' ?>">
            <a class="page-link" href="index.php?mod=admin&act=manage&page=<?=$page+1 ?>" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
            </a>
        </li>
    </ul>
</nav>
<?php endif;?>



<?php if (isset($_GET['MaLoai'])): ?>
<nav aria-label="Page navigation example">
    <ul class="pagination justify-content-center">
        <li class="page-item <?=($page<=1)?'disabled':'' ?>">
            <a class="page-link" href="index.php?mod=admin&act=manage&MaLoai=<?=$loai ?>&page=<?=$page-1 ?>"
                aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
            </a>
        </li>
        <?php for($i=1;$i<=$sotrang;$i++): ?>
        <li class="page-item <?=($page==$i)?'active':'' ?>">
            <a class="page-link" href="index.php?mod=admin&act=manage&MaLoai=<?=$loai ?>&page=<?=$i ?>"><?=$i ?></a>
        </li>
        <?php endfor; ?>
        <li class="page-item <?=($page>=$sotrang)?'disabled':'' ?>">
            <a class="page-link" href="index.php?mod=admin&act=manage&MaLoai=<?=$loai ?>&page=<?=$page+1 ?>"
                aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
            </a>
        </li>
    </ul>
</nav>
<?php endif;?>
<br>