<?php
require_once __DIR__.'/../models/HosoModel.php';
$pg = max(1, (int)($_GET['p'] ?? 1));
$data = hoso_paged($pg, 10);
$rows=$data['rows']; $total=$data['total']; $per=$data['perPage']; $page=$data['page'];
$pages = max(1, (int)ceil($total/$per));
?>
<div class="card">
    <h3>Bảng HOSO (<?= $total ?> bản ghi)</h3>
    <p><a class="linkcard" href="?page=hoso_add">+ Thêm hồ sơ</a></p>
    <table class="table">
        <tr>
        <th>MAHS</th><th>Họ tên</th><th>Ngày sinh</th><th>Địa chỉ</th>
        <th>Lớp</th><th>Toán</th><th>Lý</th><th>Hóa</th><th>Thao tác</th>
        </tr>
        <?php foreach($rows as $r): ?>
        <tr>
            <td><?= htmlspecialchars($r['MAHS']) ?></td>
            <td><?= htmlspecialchars($r['HOTEN']) ?></td>
            <td><?= htmlspecialchars($r['NGAYSINH']) ?></td>
            <td><?= htmlspecialchars($r['DIACHI']) ?></td>
            <td><?= htmlspecialchars($r['LOP']) ?></td>
            <td><?= $r['DIEMTOAN'] ?></td>
            <td><?= $r['DIEMLY'] ?></td>
            <td><?= $r['DIEMHOA'] ?></td>
            <td>
            <a href="?page=hoso_edit&mahs=<?= urlencode($r['MAHS']) ?>">Sửa</a> |
            <a href="?page=hoso_delete&mahs=<?= urlencode($r['MAHS']) ?>"
                onclick="return confirm('Xóa hồ sơ này?')">Xóa</a>
            </td>
        </tr>
        <?php endforeach ?>
    </table>
</div>
