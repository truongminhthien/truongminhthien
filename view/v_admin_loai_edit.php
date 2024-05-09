
<?php if (isset($_SESSION['thongbao'])) : ?>
  <div class="alert alert-success" role="alert">
    <?= $_SESSION['thongbao'] ?>
  </div>
<?php endif;
unset($_SESSION['thongbao']); ?>

<h2 class="my-3">Sửa Loại</h2>

<form action="" method="POST" enctype="multipart/form-data">

 <div class="mb-3">
    <label for="TenLoai" class="form-label">Tên Loại</label>
    <div class="col-md-4">
    <input type="text" class="form-control" id="TenLoai" aria-describedby="emailHelp" name="TenLoai" value="<?= $loai['TenLoai'] ?>"/>
    </div>
  </div>

  <button type="submit" name="submit" value="submit" class="btn btn-primary">Xác nhận</button>
</form>
