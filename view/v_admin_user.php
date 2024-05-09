<a href="index.php?mod=admin&act=user-add" class="btn btn-success float-end">Thêm tài khoản</a>
<h2 class="my-3">Tài khoản</h2>
<table class="table text-center align-middle">
    <thead>
        <tr>
            <th>STT</th>
            <th>Ảnh</th>
            <th class="text-start">Họ tên</th>
            <th>Số điện thoại</th>
            <th class="text-start">Email</th>
            <th class="text-start">Địa chỉ</th>
            <th>Quyền</th>
            <th class="text-end">Hành động</th>
        </tr>
    </thead>
    <tbody>
        <?php $i = 1;
    foreach ($dsTK as $tk) : ?>
        <tr>
            <td><?= ($page - 1) * 5 + $i ?></td>
            <td>
                <img class="rounded-circle" src="uploads/avatar/<?= $tk['HinhAnh'] ?>"
                    style="width: 32px; height: 32px" />
            </td>
            <td class="text-start"><?= $tk['TenKhachHang'] ?></td>
            <td><?= $tk['SoDienThoai'] ?></td>
            <td class="text-start"><?= $tk['Email'] ?></td>
            <td class="text-start"><?= $tk['DiaChiKhachHang'] ?></td>
            <td>
                <?php
          switch ($tk['Quyen']) {
            case '1':
              echo '<span class="badge text-bg-danger fs-6" style="width: 80%;">Quản lý</span>';
              break;

            default:
              echo '<span class="badge text-bg-primary fs-6" style="width: 80%;">Khách</span>';
              break;
          }
          ?>
            </td>
            <td class="text-end">
                <a href="index.php?mod=admin&act=user-edit&id=<?= $tk['MaTK'] ?>" class="btn btn-warning"><i
                        class="fa-solid fa-pen-to-square"></i></a>
                <button onclick="deleteUser(<?= $tk['MaTK'] ?>)" class="btn btn-danger"><i
                        class="fa-solid fa-trash"></i></button>
            </td>
        </tr>
        <?php $i++;
    endforeach; ?>
    </tbody>
</table>

<!-- Phân trang -->
<nav aria-label="Page navigation example">
    <ul class="pagination justify-content-center my-3">
        <li class="page-item <?= ($page <= 1) ? 'disabled' : '' ?>">
            <a class="rounded mx-1 page-link" href="index.php?mod=admin&act=user&page=<?= $page - 1 ?>"
                aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
            </a>
        </li>
        <?php for ($i = 1; $i <= $soTrang; $i++) : ?>
        <li class="page-item <?= ($page == $i) ? 'active' : '' ?>">
            <a class="rounded mx-1 page-link" href="index.php?mod=admin&act=user&page=<?= $i ?>">
                <?= $i ?>
            </a>
        </li>
        <?php endfor; ?>
        <li class="page-item <?= ($page >= $soTrang) ? 'disabled' : '' ?>">
            <a class="rounded mx-1 page-link" href="index.php?mod=admin&act=user&page=<?= $page + 1 ?>"
                aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
            </a>
        </li>
    </ul>
</nav>

<script>
function deleteUser(MaTK) {
    var kq = confirm("Bạn có muốn xóa tài khoản này không?");
    if (kq) {
        window.location = 'index.php?mod=admin&act=user-delete&id=<?= $tk['MaTK'] ?>';
    }
}
</script>