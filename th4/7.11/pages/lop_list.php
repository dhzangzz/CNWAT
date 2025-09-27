<?php
require_once __DIR__.'/../models/LopModel.php';
$rows = lop_all();
?>
<div class="card">
    <h3>Bảng LOP</h3>
    <p><a class="linkcard" href="?page=lop_add">+ Thêm lớp</a></p>
    <table class="table">
        <tr><th>MALOP</th><th>TENLOP</th><th>KHOAHOC</th><th>GVCN</th><th>Thao tác</th></tr>
        <?php foreach($rows as $r): ?>
        <tr>
            <td><?= htmlspecialchars($r['MALOP']) ?></td>
            <td><?= htmlspecialchars($r['TENLOP']) ?></td>
            <td><?= (int)$r['KHOAHOC'] ?></td>
            <td><?= htmlspecialchars($r['GVCN']) ?></td>
            <td>
            <a href="?page=lop_edit&malop=<?= urlencode($r['MALOP']) ?>">Sửa</a> |
            <a href="?page=lop_delete&malop=<?= urlencode($r['MALOP']) ?>"
                onclick="return confirm('Xóa lớp này?')">Xóa</a>
            </td>
        </tr>
        <?php endforeach ?>
    </table>
</div>
