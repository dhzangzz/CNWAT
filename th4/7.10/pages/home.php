<?php
// đảm bảo nhìn thấy biến từ index/layout
global $L, $PAGE;
?>
<div class="card">
    <div class="subnav">
        <a href="?page=<?= htmlspecialchars($PAGE) ?>&lang=vi"><?= $L['VIETNAMESE'] ?></a>
        <a href="?page=<?= htmlspecialchars($PAGE) ?>&lang=en"><?= $L['ENGLISH'] ?></a>

        <a class="<?= ($PAGE==='home')?'active':'' ?>" href="?page=home"><?= $L['HOME'] ?></a>
        <a class="<?= ($PAGE==='contact')?'active':'' ?>" href="?page=contact"><?= $L['CONTACT'] ?></a>
    </div>

    <h2><?= $L['WELCOME'] ?></h2>
</div>
