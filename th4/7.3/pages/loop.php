<?php $n = isset($_GET['n']) ? max(1,(int)$_GET['n']) : 6; ?>
<div class="card">
    <h2>Vòng lặp</h2>
    <form method="get" action="">
        <input type="hidden" name="page" value="loop">
        <label>N: <input type="number" name="n" min="1" value="<?= $n ?>"></label>
        <button type="submit">In</button>
    </form>
</div>

<div class="card">
    <h3>For</h3>
    <pre><?php
        for($i=1;$i<=$n;$i++){ echo str_repeat('*',$i)."\n"; }
    ?></pre>

    <h3>While</h3>
    <pre><?php
        $i=1; while($i<=$n){ echo str_repeat('*',$i)."\n"; $i++; }
    ?></pre>

    <h3>Do-While</h3>
    <pre><?php
        $i=1; do { echo str_repeat('*',$i)."\n"; $i++; } while($i<=$n);
    ?></pre>
</div>

<style>
.card form label{display:inline-flex;gap:6px;margin-right:12px}
.card input[type=number]{width:120px;padding:8px;border:1px solid #ddd;border-radius:8px}
.card button{padding:8px 12px;border:0;border-radius:10px;cursor:pointer}
pre{background:#f7f7f7;border:1px solid #eee;padding:10px;border-radius:8px}
</style>
