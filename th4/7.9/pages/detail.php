<?php
$id  = (int)($_GET['id'] ?? 0);
$rows = read_all();
$sv   = null;
foreach($rows as $r) if ((int)$r[0]===$id){ $sv=$r; break; }
if(!$sv){ echo '<div class="card">Không tìm thấy.</div>'; return; }
[$id,$name,$dob,$addr,$img,$class] = $sv;
?>
<div class="card">
    <nav class="subnav">
        <a class="<?= ($PAGE??($_GET['page']??''))==='home' ? 'active' : '' ?>" href="?page=home">Home</a>
        <a class="<?=
            in_array(($PAGE??($_GET['page']??'')), ['list','detail','edit','delete'], true)
            ? 'active' : '' ?>" href="?page=list">List</a>
        <a class="<?= ($PAGE??($_GET['page']??''))==='add'  ? 'active' : '' ?>" href="?page=add">Add</a>
    </nav>
    <h2>Chi tiết sinh viên</h2>
    <div style="display:grid;grid-template-columns:180px 1fr;gap:16px">
        <div>
        <?php if($img && is_file(__DIR__.'/../uploads/'.$img)): ?>
            <img src="/dauhuonggiang/th4/7.9/uploads/<?= htmlspecialchars($img) ?>" style="width:180px;border-radius:10px;border:1px solid #eee">
        <?php else: ?>
            <div style="width:180px;height:180px;border:1px dashed #ddd;border-radius:10px;display:flex;align-items:center;justify-content:center;color:#888">No Image</div>
        <?php endif; ?>
        </div>
        <div>
        <p><b><?= htmlspecialchars($name) ?></b></p>
        <p><?= htmlspecialchars($dob) ?></p>
        <p><?= htmlspecialchars($addr) ?></p>
        <p><?= htmlspecialchars($class) ?></p>
        </div>
    </div>
</div>
