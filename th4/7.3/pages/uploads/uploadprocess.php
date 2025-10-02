<?php
$targetDir = __DIR__ . '/../uploads';
if (!is_dir($targetDir)) mkdir($targetDir, 0777, true);

$msg = '';
$uploadedFiles = array();
$errors = array();

if (!isset($_FILES['files']) || !is_array($_FILES['files']['name'])) {
    $msg = 'Không nhận được file nào.';
} else {
    $fileCount = count($_FILES['files']['name']);
    
    for ($i = 0; $i < $fileCount; $i++) {//xu ly tung file
        if ($_FILES['files']['error'][$i] === UPLOAD_ERR_OK) {//ko co loi
            $file_info = array(//tt file
                'name' => $_FILES['files']['name'][$i],
                'size' => $_FILES['files']['size'][$i],
                'tmp_name' => $_FILES['files']['tmp_name'][$i],
                'type' => $_FILES['files']['type'][$i]
            );
            
            if ($file_info['size'] > 2*1024*1024) {//kthuoc
                $errors[] = "File {$file_info['name']}: Quá lớn (giới hạn 2MB).";
                continue;
            }
            //tao ten moi
            $ext = pathinfo($file_info['name'], PATHINFO_EXTENSION);
            $newFilename = 'file_' . date('Ymd_His') . '_' . bin2hex(random_bytes(4)) . '_' . ($i+1) . '.' . strtolower($ext);
            $destPath = $targetDir . '/' . $newFilename;
            
            if (move_uploaded_file($file_info['tmp_name'], $destPath)) {//luu file
                $webPath = '/dauhuonggiang/th4/7.3/uploads/' . $newFilename;
                $uploadedFiles[] = array(
                    'original_name' => $file_info['name'],
                    'filename' => $newFilename,
                    'file_path' => $webPath,
                    'size' => $file_info['size']
                );
            } else {
                $errors[] = "File {$file_info['name']}: Không thể lưu file.";
            }
        } else {
            $errors[] = "File ".($_FILES['files']['name'][$i] ?? "Không tên").": Lỗi upload.";
        }
    }
}
?>
<div class="card">
    <h2>Kết quả Upload:</h2>
    
    <?php if($msg): ?>
        <div style="color:#b42318; padding:10px; background:#ffeaea; border-radius:5px; margin:10px 0;">
            <strong>Lỗi:</strong> <?= htmlspecialchars($msg) ?>
        </div>
    <?php endif; ?>
    
    <?php if(!empty($errors)): ?>
        <div style="color:#b42318; padding:10px; background:#ffeaea; border-radius:5px; margin:10px 0;">
            <strong>Các lỗi xảy ra:</strong>
            <ul>
                <?php foreach($errors as $error): ?>
                    <li><?= htmlspecialchars($error) ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>
    
    <?php if(!empty($uploadedFiles)): ?>
        <div style="color:#28a745; padding:10px; background:#eaffea; border-radius:5px; margin:10px 0;">
            <strong>Upload thành công! Đã upload <?= count($uploadedFiles) ?> file:</strong>
        </div>
        
        <table border="1" style="width:100%; border-collapse:collapse; margin:10px 0;">
            <thead>
                <tr style="background:#f8f9fa;">
                    <th style="padding:10px;">STT</th>
                    <th style="padding:10px;">Tên File Gốc</th>
                    <th style="padding:10px;">Tên File Đã Lưu</th>
                    <th style="padding:10px;">Đường Dẫn Download</th>
                    <th style="padding:10px;">Kích Thước</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($uploadedFiles as $index => $file): ?>
                    <tr>
                        <td style="padding:10px; text-align:center;"><?= $index + 1 ?></td>
                        <td style="padding:10px;"><?= htmlspecialchars($file['original_name']) ?></td>
                        <td style="padding:10px;"><?= htmlspecialchars($file['filename']) ?></td>
                        <td style="padding:10px;"><a href="<?= htmlspecialchars($file['file_path']) ?>" target="_blank"><?= htmlspecialchars($file['file_path']) ?></a></td>
                        <td style="padding:10px; text-align:right;"><?= number_format($file['size'] / 1024, 2) ?> KB</td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        
        <div style="margin-top:20px;">
            <strong>Danh sách đường dẫn download:</strong>
            <ol>
                <?php foreach($uploadedFiles as $file): ?>
                    <li><code><?= htmlspecialchars($file['file_path']) ?></code></li>
                <?php endforeach; ?>
            </ol>
        </div>
    <?php endif; ?>
    
    <p><a href="/dauhuonggiang/th4/7.3/?page=uploadform">Quay lại UploadForm</a></p>
</div>
