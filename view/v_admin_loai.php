<div class="row">
    <h3 class="py-2 col">Quản lý loại</h3>
    <a href="index.php?mod=admin&act=loai-add" class="py-2 col text-end"><button type="button"
            class="btn btn-primary">Thêm loại</button></a>
</div>
<hr>
<table class="table">
    <thead>
        <tr>
            <th scope="col" class="col-2">Mã loại</th>
            <th scope="col">Tên loại</th>
            <th scope="col" class="col-2 text-center">Xóa & sửa</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($loai as $loai_row) :
  ?>
        <tr>
            <th scope="row" class="col-2"><?= $loai_row['MaLoai'] ?></th>
            <td><?= $loai_row['TenLoai'] ?></td>
            <td class="text-center">
                <a href="index.php?mod=admin&act=loai-delete&MaLoai=<?= $loai_row['MaLoai'] ?>"
                    onclick="return confirm('Bạn chắc chắn muốn xóa?')" class="delete mx-2"><i
                        class="fa-solid fa-trash-can" style="color: #ff0000;"></i></a>
                <a href="index.php?mod=admin&act=loai-edit&MaLoai=<?= $loai_row['MaLoai'] ?>" class="fix"><i
                        class="fa-solid fa-pen-to-square" style="color: #fbd202;"></i></a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>