<?php
global $L, $PAGE;
?>
<div class="card" style="max-width:700px">
    <div class="subnav">
        <a href="?page=<?= htmlspecialchars($PAGE) ?>&lang=vi"><?= $L['VIETNAMESE'] ?></a>
        <a href="?page=<?= htmlspecialchars($PAGE) ?>&lang=en"><?= $L['ENGLISH'] ?></a>

        <a class="<?= ($PAGE==='home')?'active':'' ?>" href="?page=home"><?= $L['HOME'] ?></a>
        <a class="<?= ($PAGE==='contact')?'active':'' ?>" href="?page=contact"><?= $L['CONTACT'] ?></a>
    </div>

    <h3><?= $L['CONTACT_FORM'] ?></h3>
    <form>
        <p><label><?= $L['LBL_USERNAME'] ?> <input type="text"></label></p>
        <p><label><?= $L['LBL_BIRTHDAY'] ?> <input type="date" placeholder="dd/mm/yyyy"></label></p>
        <p><label><?= $L['LBL_ADDRESS'] ?> <input type="text"></label></p>
        <p><label><?= $L['LBL_EMAIL'] ?> <input type="email"></label></p>
        <p><label><?= $L['LBL_PHONE'] ?> <input type="text"></label></p>
        <p><label><?= $L['LBL_COMMENT'] ?><br><textarea rows="4" style="width:100%"></textarea></label></p>
        <p>
        <button type="reset"><?= $L['BTN_RESET'] ?></button>
        <button type="submit"><?= $L['BTN_SUBMIT'] ?></button>
        </p>
    </form>
</div>
