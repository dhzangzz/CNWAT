<?php
require __DIR__.'/../libs/connectDB.php';
$classID = $_GET['classID'] ?? '';
// Lấy info lớp
$cls = $conn->prepare("SELECT id,className FROM classes WHERE id=?");
$cls->bind_param('s',$classID);
$cls->execute();
$info = $cls->get_result()->fetch_assoc();

?>
<div class="card">
    <?php if(!$info): ?>
        <h3>Không tìm thấy lớp</h3>
        <p><a href="?page=listClass3">Quay lại danh sách lớp</a></p>
    <?php else: ?>
        <h3>Danh sách sinh viên trong lớp: <?= htmlspecialchars($info['id']) ?> - <?= htmlspecialchars($info['className']) ?></h3>
        <?php
        $st = $conn->prepare("SELECT id,studentName,studentAddress,studentGender
                                FROM students WHERE classID=? ORDER BY id");
        $st->bind_param('s',$classID);
        $st->execute();
        $rs = $st->get_result();
        ?>
        <table class="table">
        <tr>
            <th>Mã SV</th><th>Tên</th><th>Địa chỉ</th><th>Giới tính</th><th>Thao tác</th>
        </tr>
        <?php while($row = $rs->fetch_assoc()): ?>
            <tr>
            <td><?= htmlspecialchars($row['id']) ?></td>
            <td><?= htmlspecialchars($row['studentName']) ?></td>
            <td><?= htmlspecialchars($row['studentAddress']) ?></td>
            <td><?= htmlspecialchars($row['studentGender']) ?></td>
            <td><a href="?page=studentDetail&id=<?= urlencode($row['id']) ?>">Chi tiết</a></td>
            </tr>
        <?php endwhile; ?>
        </table>
    <?php endif; ?>
</div>
<?php require __DIR__.'/../libs/closeConnectDB.php'; ?>
