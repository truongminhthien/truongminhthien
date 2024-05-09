<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý tin tức</title>
    <link rel="stylesheet" href="assets/css/tin.css">
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        .column1 {
            width: 80%;
        }

        .column3 {
            width: 10%;
            text-align: center;
        }

        .column2 {
            width: 10%;
            text-align: center;
        }
    </style>
</head>

<body>
    <h1 style="text-align: center; margin-top: 10px;">Quản lý tin tức</h1>
    <p style="margin-bottom: 70px; margin-top: 10px;"><a href="index.php?mod=admin&act=quanlytin_add" class="btn btn-success float-end">Thêm tin tức</a></p>
    <table>
        <tr>
            <th class="column1">Các Tin</th>
            <th class="column2">Trạng Thái Tin</th>
            <th class="column3">Chức Năng</th>
        </tr>
        <?php
        foreach ($tin_tuc as $tin_tuc) :
            $itemsPerPage = 5;
            $currentPage = isset($_GET['page']) ? $_GET['page'] : 1;
        ?>
            <tr>
                <td class="column1">
                    <div class="tin">
                        <div class="tin-left room" style="display: flex; align-items: center;">
                            <img class="tin-image" src="<?= $tin_tuc['HinhAnh'] ?>" alt="tin Image">
                        </div>
                        <div class="tin-right">
                            <div class="tin-title"><a href="index.php?mod=page&act=show_blog&MaTT=<?= $tin_tuc['MaTT'] ?>"><?= $tin_tuc['MaTT'] ?>.<?= $tin_tuc['TieuDe'] ?></a>
                            </div>
                            <div class="tin-infos">
                                <span class="tin-viewss">Lượt Xem: <?= $tin_tuc['luotxem'] ?></span>
                                <span class="tin-likess">Lượt Thích:
                                    <?= $tin_tuc['luotthich'] ?></span>
                                <span class="tin-dates">Ngày đăng:
                                    <?= date('d-m-Y H:i:s', strtotime($tin_tuc['NgayDang'])) ?></span>
                            </div>
                            <div class="tin-description">
                                <?= $tin_tuc['MoTa'] ?>
                            </div>
                        </div>
                    </div>
                </td>
                <td class="column2">
                    <?php
                    if ($tin_tuc['TrangThai'] == 1) {
                        echo '<a href="index.php?mod=admin&act=an_tin&MaTT=' . $tin_tuc['MaTT'] . '"><button type="button" class="btn btn-success">Hiện</button></a>';
                    } else if ($tin_tuc['TrangThai'] == 0) {
                        echo '<a href="index.php?mod=admin&act=hien_tin&MaTT=' . $tin_tuc['MaTT'] . '"><button type="button" class="btn btn-danger">Ẩn</button></a>';
                    }
                    ?>
                </td>
                <td class="column3"><a class="btn btn-danger" href="index.php?mod=admin&act=quanlytin&MaTT=<?php echo $tin_tuc['MaTT']; ?>" onclick="return confirm('Bạn chắc chắn muốn xóa?')"><i class="fa-solid fa-trash"></i></a>
                    <a class="btn btn-warning" href="index.php?mod=admin&act=quanlytin_edit&MaTT=<?php echo $tin_tuc['MaTT']; ?>"><i class="fa-solid fa-pen-to-square"></i></a>
                </td>
            </tr>
        <?php
        endforeach;
        ?>
    </table>


    <?php

    $totalPages = count_tin_pages($itemsPerPage);

    echo "<div class='pagination'>";
    if ($totalPages > 1) {
        // Hiển thị nút trước
        if ($currentPage > 1) {
            echo "<a href='index.php?mod=admin&act=quanlytin&page=" . ($currentPage - 1) . "'>&laquo;</a>";
        }

        for ($i = max(1, $currentPage - 2); $i <= min($totalPages, $currentPage + 2); $i++) {
            echo "<a href='index.php?mod=admin&act=quanlytin&page=$i'";
            if ($i == $currentPage) {
                echo " class='active'";
            }
            echo ">$i</a>";
        }

        // Hiển thị nút sau
        if ($currentPage < $totalPages) {
            echo "<a href='index.php?mod=admin&act=quanlytin&page=" . ($currentPage + 1) . "'>&raquo;</a>";
        }
    }
    echo "</div>";
    ?>


</body>

</html>