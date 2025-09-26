<?php
$targetDir = dirname(__DIR__,2) . '/uploads';     // /th4/7.5/uploads
if (!is_dir($targetDir)) mkdir($targetDir, 0777, true);

$msg = ''; $url = null;
if ($_SERVER['REQUEST_METHOD']==='POST') {
    if (!isset($_FILES['file']) || $_FILES['file']['error']!==UPLOAD_ERR_OK) {
        $msg = 'Chưa chọn tệp hợp lệ.';
    } else {
        $f = $_FILES['file'];
        if ($f['size'] > 2*1024*1024) $msg = 'Tệp quá lớn (≤ 2MB).';
        else {
        $ext  = strtolower(pathinfo($f['name'], PATHINFO_EXTENSION));
        $name = 'up_'.date('Ymd_His').'_' . bin2hex(random_bytes(4)) . '.' . $ext;
        $dest = $targetDir . '/' . $name;
        if (move_uploaded_file($f['tmp_name'], $dest)) {
            $url = '/dauhuonggiang/th4/7.5/uploads/' . $name;     // URL xem tệp
        } else $msg = 'Không thể lưu tệp.';
        }
    }
}
?>
<div class="card">
    <h2>Admin • Upload</h2>
    <?php if($msg): ?>
        <div style="background:#fff7e0;border:1px solid #f59e0b;padding:8px 10px;border-radius:8px;margin:8px 0">
        <?= htmlspecialchars($msg) ?>
        </div>
    <?php endif; ?>

    <form method="post" enctype="multipart/form-data">
        <label>Chọn tệp (≤ 2MB):
        <input type="file" name="file" required>
        </label>
        <button type="submit">Upload</button>
    </form>

    <?php if($url): ?>
        <div class="card" style="margin-top:12px">
        <p>Đã lưu: <a href="<?= htmlspecialchars($url) ?>" target="_blank"><?= htmlspecialchars($url) ?></a></p>
        <?php if(preg_match('~\.(png|jpe?g|gif|webp)$~i',$url)): ?>
            <img src="<?= htmlspecialchars($url) ?>" style="max-width:100%;border:1px solid #eee;border-radius:10px">
        <?php endif; ?>
        </div>
    <?php endif; ?>
</div>
