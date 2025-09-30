<?php
$targetDir = __DIR__ . '/../uploads';
if (!is_dir($targetDir)) mkdir($targetDir, 0777, true);

$msg = ''; $url = null;
if (!isset($_FILES['file']) || $_FILES['file']['error']!==UPLOAD_ERR_OK) {
    $msg = 'Không nhận được tệp hợp lệ.';
    } else {
    $f = $_FILES['file'];
    if ($f['size'] > 2*1024*1024) {
        $msg = 'Tệp quá lớn (giới hạn 2MB).';
    } else {
        $finfo = finfo_open(FILEINFO_MIME_TYPE);//mo file info
        $mime = finfo_file($finfo, $f['tmp_name']);//lay mime (loai file)
        finfo_close($finfo);
        $ok = in_array($mime, ['image/jpeg','image/png','image/gif'], true);//ktra 
        if (!$ok) $msg = 'Chỉ cho phép ảnh JPEG/PNG/GIF.';
        else {
        $ext = pathinfo($f['name'], PATHINFO_EXTENSION);
        $name = 'img_'.date('Ymd_His').'_' . bin2hex(random_bytes(4)) . '.' . strtolower($ext);
        $dest = $targetDir . '/' . $name;
        if (move_uploaded_file($f['tmp_name'], $dest)) {
            // URL xem ảnh (đường dẫn web)
            $url = '/dauhuonggiang/th4/7.3/uploads/' . $name;
        } else $msg = 'Không thể lưu tệp.';
        }
    }
}
?>
<div class="card">
    <h2>UploadProcess</h2>
    <?php if($msg): ?>
        <p style="color:#b42318"><?= htmlspecialchars($msg) ?></p>
    <?php else: ?>
        <p>Upload thành công!</p>
        <p><img src="<?= htmlspecialchars($url) ?>" alt="uploaded" style="max-width:100%;border-radius:10px;border:1px solid #eee"></p>
        <p>Đường dẫn: <code><?= htmlspecialchars($url) ?></code></p>
    <?php endif; ?>
    <p><a href="/dauhuonggiang/th4/7.3/?page=uploadform">Quay lại UploadForm</a></p>
</div>
