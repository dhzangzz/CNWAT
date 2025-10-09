<?php
// đảm bảo nhìn thấy biến từ index/layout
global $L, $PAGE;
?>
<div class="card">
    <div class="subnav">
        <div class="subnav-left">
            <a class="<?= ($PAGE==='home')?'active':'' ?>" href="?page=home"><?= $L['HOME'] ?></a>
            <a class="<?= ($PAGE==='contact')?'active':'' ?>" href="?page=contact"><?= $L['CONTACT'] ?></a>
        </div>
        <div class="subnav-right">
            <a href="?page=<?= htmlspecialchars($PAGE) ?>&lang=vi"><?= $L['VIETNAMESE'] ?></a>
            <a href="?page=<?= htmlspecialchars($PAGE) ?>&lang=en"><?= $L['ENGLISH'] ?></a>
        </div>
    </div>

    <h2><?= $L['WELCOME'] ?></h2>
</div>
