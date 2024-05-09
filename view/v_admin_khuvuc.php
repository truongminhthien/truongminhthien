<div class="row">
<h3 class="py-2 col">Quản lý khu vực</h3>
<a href="index.php?mod=admin&act=khuvuc-add" class="py-2 col text-end"><button type="button" class="btn btn-primary">Thêm khu vực</button></a>
</div>

<hr>
<table class="table">
  <thead>
    <tr>
      <th scope="col" class="col-2">Mã khu vực</th>
      <th scope="col">Tên khu vực</th>
      <th scope="col" class="col-2 text-center">Xóa & sửa</th>
    </tr>
  </thead>
  <tbody>
  <?php
        foreach ($khuvuc as $khuvuc_row) :
  ?>
    <tr>
      <th scope="row" class="col-2"><?= $khuvuc_row['MaKV'] ?></th>
      <td><?= $khuvuc_row['TenKV'] ?></td>
      <td class="text-center">
        <a href="index.php?mod=admin&act=khuvuc-delete&MaKV=<?= $khuvuc_row['MaKV'] ?>" onclick="return confirm('Bạn chắc chắn muốn xóa?')" class="delete mx-2"><i class="fa-solid fa-trash-can" style="color: #ff0000;"></i></a>
        <a href="index.php?mod=admin&act=khuvuc-edit&MaKV=<?= $khuvuc_row['MaKV'] ?>"class="fix"><i class="fa-solid fa-pen-to-square" style="color: #fbd202;"></i></a>
      </td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>