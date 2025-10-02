<?php
require_once __DIR__.'/../db.php';
$db = pdo();
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

if ($id <= 0) {//ko hop le
    echo "<div class='error'>ID sản phẩm không hợp lệ!</div>";
    exit;
}

$stmt = $db->prepare("SELECT p.*, c.name as category_name 
                     FROM products p 
                     LEFT JOIN categories c ON p.category_id = c.id 
                     WHERE p.id = ?");//lay sp theo id
$stmt->execute([$id]);
$product = $stmt->fetch();//lay1sp

if (!$product) {//khong co sp
    echo "<p>Không tìm thấy sản phẩm!</p>";
    return;
}
?>
<link rel="stylesheet" href="/dauhuonggiang/th4/7.13/style.css">

<div class="laptop-page">
    <div class="breadcrumb">
        <a href="/dauhuonggiang/th4/7.13/">Trang chủ</a> / 
        <a href="/dauhuonggiang/th4/7.13/?page=productList&category_id=<?= $product['category_id'] ?>">
            <?= htmlspecialchars($product['category_name']) ?>
        </a> / 
        <?= htmlspecialchars($product['name']) ?>
    </div>

    <div class="detail">
        <div class="detail-left">
            <img src="<?= htmlspecialchars($product['image']) ?>" 
                 alt="<?= htmlspecialchars($product['name']) ?>"
                 loading="eager">
        </div>

        <div class="detail-right">
            <h2><?= htmlspecialchars($product['name']) ?></h2>
            <p class="cat"><?= htmlspecialchars($product['category_name']) ?> | Mã: LP<?= str_pad($product['id'], 5, '0', STR_PAD_LEFT) ?></p>
            
            <div class="price-section">
                <?php if ($product['old_price'] > 0 && $product['old_price'] > $product['price']): ?>
                    <div class="old-price"><?= number_format($product['old_price'], 0, ',', '.') ?>đ 
                        <span class="disc">(-<?= round((($product['old_price'] - $product['price']) / $product['old_price']) * 100) ?>%)</span>
                    </div>
                <?php endif; ?>
                <div class="price"><?= number_format($product['price'], 0, ',', '.') ?>đ</div>
            </div>

            <div class="specs">
                <h4>Thông số kỹ thuật:</h4>
                <table>
                    <?php 
                    $specs = explode("\n", $product['specifications']);
                    foreach ($specs as $spec) {//lap, tach thong so
                        if (!empty(trim($spec))) {//ko rong 
                            $parts = explode(":", $spec, 2);
                            if (count($parts) == 2) {//co 2 phan
                                echo "<tr><td>" . htmlspecialchars(trim($parts[0])) . "</td><td>" . htmlspecialchars(trim($parts[1])) . "</td></tr>";//in thong so thanh 2 cot
                            } else {
                                echo "<tr><td colspan='2'>" . htmlspecialchars(trim($spec)) . "</td></tr>";
                            }
                        }
                    }
                    ?>
                </table>
            </div>

            <div class="desc">
                <h4>Mô tả:</h4>
                <p><?= nl2br(htmlspecialchars($product['description'])) ?></p>
            </div>
        </div>
    </div>

    <div class="back-link">
        <a href="/dauhuonggiang/th4/7.13/?page=productList&category_id=<?= $product['category_id'] ?>">← Quay lại danh sách</a>
    </div>
</div>

