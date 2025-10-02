<?php
require __DIR__.'/../libs/connectDB.php';
$id = $_GET['id'] ?? '';

$st = $conn->prepare("SELECT s.*, c.className
                      FROM students s
                      LEFT JOIN classes c ON c.id = s.classID
                      WHERE s.id=?");
$st->bind_param('s',$id);
$st->execute();
$data = $st->get_result()->fetch_assoc();
?>
<div class="card" style="max-width:680px">
    <?php if(!$data): ?>
        <h3>Không tìm thấy sinh viên</h3>
    <?php else: ?>
        <h3>Chi tiết sinh viên</h3>
        <p><b>Mã SV:</b> <?= htmlspecialchars($data['id']) ?></p>
        <p><b>Họ tên:</b> <?= htmlspecialchars($data['studentName']) ?></p>
        <p><b>Giới tính:</b> <?= htmlspecialchars($data['studentGender']) ?></p>
        <p><b>Ngày sinh:</b> <?= htmlspecialchars($data['studentBirthday']) ?></p>
        <p><b>Địa chỉ:</b> <?= htmlspecialchars($data['studentAddress']) ?></p>
        <p><b>Lớp:</b> <?= htmlspecialchars($data['classID']) ?> - <?= htmlspecialchars($data['className']) ?></p>
    <?php endif; ?>
    <p style="margin-top:12px"><a class="linkcard" href="javascript:history.back()">← Quay lại</a></p>
</div>
<?php require __DIR__.'/../libs/closeConnectDB.php'; ?>
