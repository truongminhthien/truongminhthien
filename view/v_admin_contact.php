<a href="index.php?mod=admin&act=user-add" class="btn btn-success float-end">Thêm tài khoản</a>
<h2 class="my-3">Liên hệ</h2>
<table class="table text-center align-middle">
  <thead>
    <tr>
      <th>STT</th>
      <th class="text-start">Tên người liên hệ</th>
      <!-- <th>Số điện thoại</th> -->
      <th class="text-start">Email</th>
      <th class="text-start">Tiêu đề</th>
      <!-- <th>Quyền</th> -->
      <th class="text-start">Nội dung</th>
      <th class="text-end">Thao tác</th>
    </tr>
  </thead>
  <tbody>
    <?php $i = 1;
    foreach ($dsLH as $lh) : ?>
      <tr>
  <td><?= $i ?></td>
  <td class="text-start"><?= $lh['TenNguoiLienHe'] ?></td>
  <td class="text-start"><?= $lh['Email'] ?></td>
  <td class="text-start"><?= $lh['TieuDe'] ?></td>
  <td class="text-start"><?= $lh['NoiDung'] ?></td>
  <td class="text-end">
  <button onclick="deleteContact(<?= $lh['MaLH'] ?>)" class="btn btn-danger"><i class="fa-solid fa-trash"></i></button>      
  </td>
</tr>

    <?php $i++;
    endforeach; ?>
  </tbody>
</table>

<script>
  function deleteContact(MaLH) {
    var kq = confirm("Bạn có muốn xóa không?");
    if (kq) {
      window.location = 'index.php?mod=admin&act=DeleteContact&MaLH=' + MaLH;
    }
  }
</script>