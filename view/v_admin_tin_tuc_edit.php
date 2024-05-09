<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa tin tức</title>
    <script src="https://cdn.ckeditor.com/ckeditor5/34.2.0/super-build/ckeditor.js"></script>
    <link rel="stylesheet" href="assets/css/tin_ad.css">
</head>

<body>
    <h1>Sửa tin tức</h1>

    <?php
    $MaTT = $_GET['MaTT'];
    $tin_tuc = get_tin_tuc_by_id($MaTT);
    ?>

    <form action="index.php?mod=admin&act=quanlytin_edit&MaTT=<?php echo $MaTT; ?>" method="post" enctype="multipart/form-data">
        <label for="TieuDe">Tiêu đề:</label>
        <input type="text" name="TieuDe" value="<?php echo $tin_tuc['TieuDe']; ?>" required><br>

        <label for="MoTa">Mô tả:</label>
        <textarea name="MoTa" rows="4" required><?php echo $tin_tuc['MoTa']; ?></textarea><br>
        <div class="row">
            <div class="col-md-6">
                <label for="MaKV">Khu Vực:</label>
                <select name="MaKV" required>
                    <!-- Assuming $tin_tuc['MaKV'] contains the selected value -->
                    <?php
                    $Edit_MaKV = $tin_tuc['MaKV'];
                    $khuVucList = array(
                        1 => 'Quận 1', 2 => 'Quận 2', 3 => 'Quận 3', 4 => 'Quận 4', 5 => 'Quận 5', 6 => 'Quận 6', 7 => 'Quận 7',
                        8 => 'Quận 8', 9 => 'Quận 9', 1 => 'Quận 1', 11 => 'Quận 11', 12 => 'Quận 12', 13 => 'Quận Tân Bình', 14 => 'Quận Phú Nhuận',
                        15 => 'Quận Gò Vấp', 16 => 'Quận Bình Thạnh', 17 => 'Quận Bình Tân', 18 => 'Quận Tân Phú', 19 => 'Thành phố Thủ Đức', 20 => 'Huyện Hóc Môn',
                        21 => 'Huyện Củ Chi', 22 => 'Huyện Nhà Bè', 23 => 'Huyện Bình Chánh', 24 => 'Huyện Cần Giờ'
                    );
                    foreach ($khuVucList as $key => $value) {
                        $selected = ($key == $Edit_MaKV) ? 'selected' : '';
                        echo "<option value='$key' $selected>$value</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="col-md-6">
                <label for="trangthai">Trạng Thái:</label>
                <select name="TrangThai" required>
                    <?php
                    $Edit_TrangThai = $tin_tuc['TrangThai'];
                    $trangThaiList = array(
                        1 => 'Hoạt động',
                        0 => 'Không hoạt động',
                    );

                    foreach ($trangThaiList as $key => $value) {
                        $selected = ($key == $Edit_TrangThai) ? 'selected' : '';
                        echo "<option value='$key' $selected>$value</option>";
                    }
                    ?>
                </select>
            </div>
        </div>
        <label for="HinhAnh">Link Hình ảnh:</label>
        <input type="text" name="HinhAnh" value="<?php echo $tin_tuc['HinhAnh']; ?>" required><br>
        <label for="NoiDung">Nội dung:</label>
        <textarea name="NoiDung" id="NoiDung" class="form-control bg-light"><?= htmlspecialchars($tin_tuc['NoiDung']) ?></textarea>
        <input style="margin-left: 340px; margin-top: 40px; background-color: blue;" type="submit" name="submit" value="Lưu thay đổi">
    </form>

</body>

</html>
<script>
    CKEDITOR.ClassicEditor.create(document.getElementById("NoiDung"), {
        toolbar: {
            items: [
                'heading', '|', 'findAndReplace', 'selectAll', '|',
                'bold', 'italic', 'underline', 'subscript', 'superscript', 'removeFormat', '|',
                'bulletedList', 'numberedList', '|', 'outdent', 'indent', '|',
                '-',
                'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor', 'highlight', '|',
                'alignment', '|',
                'link', 'insertImage', 'insertTable', 'mediaEmbed', '|',
                'horizontalLine', '|', 'sourceEditing'
            ],
            shouldNotGroupWhenFull: true
        },
        // Changing the language of the interface requires loading the language file using the <script> tag.
        // language: 'es',
        list: {
            properties: {
                styles: true,
                startIndex: true,
                reversed: true
            }
        },
        // https://ckeditor.com/docs/ckeditor5/latest/features/headings.html#configuration
        heading: {
            options: [{
                    model: 'paragraph',
                    title: 'Paragraph',
                    class: 'ck-heading_paragraph'
                },
                {
                    model: 'heading1',
                    view: 'h1',
                    title: 'Heading 1',
                    class: 'ck-heading_heading1'
                },
                {
                    model: 'heading2',
                    view: 'h2',
                    title: 'Heading 2',
                    class: 'ck-heading_heading2'
                },
                {
                    model: 'heading3',
                    view: 'h3',
                    title: 'Heading 3',
                    class: 'ck-heading_heading3'
                },
                {
                    model: 'heading4',
                    view: 'h4',
                    title: 'Heading 4',
                    class: 'ck-heading_heading4'
                },
                {
                    model: 'heading5',
                    view: 'h5',
                    title: 'Heading 5',
                    class: 'ck-heading_heading5'
                },
                {
                    model: 'heading6',
                    view: 'h6',
                    title: 'Heading 6',
                    class: 'ck-heading_heading6'
                }
            ]
        },
        // https://ckeditor.com/docs/ckeditor5/latest/features/editor-placeholder.html#using-the-editor-configuration
        placeholder: 'Vui Lòng Nhập Nội Dung Vào Đây',
        // https://ckeditor.com/docs/ckeditor5/latest/features/font.html#configuring-the-font-family-feature
        fontFamily: {
            options: [
                'default',
                'Arial, Helvetica, sans-serif',
                'Courier New, Courier, monospace',
                'Georgia, serif',
                'Lucida Sans Unicode, Lucida Grande, sans-serif',
                'Tahoma, Geneva, sans-serif',
                'Times New Roman, Times, serif',
                'Trebuchet MS, Helvetica, sans-serif',
                'Verdana, Geneva, sans-serif'
            ],
            supportAllValues: true
        },
        // https://ckeditor.com/docs/ckeditor5/latest/features/font.html#configuring-the-font-size-feature
        fontSize: {
            options: [10, 12, 14, 'default', 18, 20, 22],
            supportAllValues: true
        },
        // Be careful with the setting below. It instructs CKEditor to accept ALL HTML markup.
        // https://ckeditor.com/docs/ckeditor5/latest/features/general-html-support.html#enabling-all-html-features
        htmlSupport: {
            allow: [{
                name: /.*/,
                attributes: true,
                classes: true,
                styles: true
            }]
        },
        // Be careful with enabling previews
        // https://ckeditor.com/docs/ckeditor5/latest/features/html-embed.html#NoiDung-previews
        htmlEmbed: {
            showPreviews: true
        },
        // https://ckeditor.com/docs/ckeditor5/latest/features/link.html#custom-link-attributes-decorators
        link: {
            decorators: {
                addTargetToExternalLinks: true,
                defaultProtocol: 'https://',
                toggleDownloadable: {
                    mode: 'manual',
                    label: 'Downloadable',
                    attributes: {
                        download: 'file'
                    }
                }
            }
        },
        // https://ckeditor.com/docs/ckeditor5/latest/features/mentions.html#configuration
        mention: {
            feeds: [{
                marker: '@',
                feed: [
                    '@apple', '@bears', '@brownie', '@cake', '@cake', '@candy', '@canes', '@chocolate',
                    '@cookie', '@cotton', '@cream',
                    '@cupcake', '@danish', '@donut', '@dragée', '@fruitcake', '@gingerbread', '@gummi',
                    '@ice', '@jelly-o',
                    '@liquorice', '@macaroon', '@marzipan', '@oat', '@pie', '@plum', '@pudding',
                    '@sesame', '@snaps', '@soufflé',
                    '@sugar', '@sweet', '@topping', '@wafer'
                ],
                minimumCharacters: 1
            }]
        },
        // The "super-build" contains more premium features that require additional configuration, disable them below.
        // Do not turn them on unless you read the documentation and know how to configure them and setup the editor.
        removePlugins: [
            // These two are commercial, but you can try them out without registering to a trial.
            // 'ExportPdf',
            // 'ExportWord',
            'CKBox',
            'CKFinder',
            'EasyImage',
            // This sample uses the Base64UploadAdapter to handle image uploads as it requires no configuration.
            // https://ckeditor.com/docs/ckeditor5/latest/features/images/image-upload/base64-upload-adapter.html
            // Storing images as Base64 is usually a very bad idea.
            // Replace it on production website with other solutions:
            // https://ckeditor.com/docs/ckeditor5/latest/features/images/image-upload/image-upload.html
            // 'Base64UploadAdapter',
            'RealTimeCollaborativeComments',
            'RealTimeCollaborativeTrackChanges',
            'RealTimeCollaborativeRevisionHistory',
            'PresenceList',
            'Comments',
            'TrackChanges',
            'TrackChangesData',
            'RevisionHistory',
            'Pagination',
            'WProofreader',
            // Careful, with the Mathtype plugin CKEditor will not load when loading this sample
            // from a local file system (file://) - load this site via HTTP server if you enable MathType
            'MathType'
        ]
    });
</script>
<style>
    .ck-editor__editable_inline {
        min-height: 250px;
        max-height: 450px;
    }
</style>