<?php
// /dauhuonggiang/th4/7.2/pages/Calculate.php

// 1) Giai thừa
function factorial(int $n): int {
    $f = 1;
    for ($i = 2; $i <= $n; $i++) $f *= $i;
    return $f;
}

$r = 10;                               // bán kính yêu cầu
$fact10 = factorial(10);               // 10!
$area   = M_PI * $r * $r;              // S = πr²
$volume = 4/3 * M_PI * $r * $r * $r;   // V = 4/3 πr³
?>
<div class="card">
    <h2>Calculate (r = <?= $r ?>)</h2>

    <ul style="margin:8px 0 0 18px; line-height:1.8">
        <li>
        Giai thừa 10: <b><?= number_format($fact10, 0, ',', '.') ?></b>
        <?php /* 10! = 3,628,800 */ ?>
        </li>
        <li>
        Diện tích hình tròn (πr²): 
        <b><?= number_format($area, 4, ',', '.') ?></b>
        </li>
        <li>
        Thể tích khối cầu (4/3·πr³): 
        <b><?= number_format($volume, 4, ',', '.') ?></b>
        </li>
    </ul>
</div>

<div class="card">
    <div class="hello-track">
        <span class="hello">Hello 👋</span>
    </div>
</div>

<style>
/* Khung “đường chạy” cho chữ Hello */
.hello-track{
    position: relative;
    height: 48px;
    border: 1px dashed #d1d5db;
    border-radius: 10px;
    overflow: hidden;
    background: #fafafa;
    margin-top: 8px;
}

/* Dòng chữ chạy qua lại bằng CSS animation */
.hello{
    position: absolute;
    top: 50%;
    left: -120px;                   /* xuất phát hơi ngoài mép trái */
    transform: translateY(-50%);
    font-weight: 700;
    padding: 6px 10px;
    border-radius: 8px;
    background: #fff7e0;
    border: 1px solid #f59e0b;
    animation: hello-run 4s linear infinite alternate;
}

@keyframes hello-run{
    from { left: -120px; }
    to   { left: calc(100% - 60px); }   /* chạy tới gần mép phải */
}
</style>
