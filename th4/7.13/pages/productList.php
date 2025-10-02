<?php
require_once __DIR__.'/../db.php';
$db = pdo();

$category_id = isset($_GET['category_id']) ? (int)$_GET['category_id'] : 0;//idsp

$category_name = "Tất cả sản phẩm";
if ($category_id > 0) {//co idsp
    $stmt = $db->prepare("SELECT name FROM categories WHERE id = ?");
    $stmt->execute([$category_id]);//lay ten sp
    $cat = $stmt->fetch();
    if ($cat) {//co ten sp
        $category_name = $cat['name'];
    }
}

if ($category_id > 0) {//co
    $stmt = $db->prepare("SELECT p.*, c.name as category_name 
                         FROM products p 
                         LEFT JOIN categories c ON p.category_id = c.id 
                         WHERE p.category_id = ? 
                         ORDER BY p.created_at DESC");//loc sp theo idsp
    $stmt->execute([$category_id]);
} else {//khong co idsp
    $stmt = $db->query("SELECT p.*, c.name as category_name 
                       FROM products p 
                       LEFT JOIN categories c ON p.category_id = c.id 
                       ORDER BY p.created_at DESC");//lay all sp
}
$products = $stmt->fetchAll();
?>
<link rel="stylesheet" href="/dauhuonggiang/th4/7.13/style.css">

<div class="laptop-page">
    <h3><?= htmlspecialchars($category_name) ?> (<?= count($products) ?> sản phẩm)</h3>

    <?php if (empty($products)): ?>
        <p>Không có sản phẩm nào!</p>
    <?php else: ?>
        <div class="products">
            <?php foreach ($products as $product): ?>
                <div class="product">
                    <a href="/dauhuonggiang/th4/7.13/?page=productDetail&id=<?= $product['id'] ?>">
                        <img src="<?= htmlspecialchars($product['image']) ?>" 
                             alt="<?= htmlspecialchars($product['name']) ?>"
                             loading="lazy">
                    </a>
                    <h4><a href="/dauhuonggiang/th4/7.13/?page=productDetail&id=<?= $product['id'] ?>">
                        <?= htmlspecialchars($product['name']) ?>
                    </a></h4>
                    <p class="cat"><?= htmlspecialchars($product['category_name']) ?></p>
                    <div class="price-box">
                        <?php if ($product['old_price'] > 0 && $product['old_price'] > $product['price']): ?>
                            <span class="old-price"><?= number_format($product['old_price'], 0, ',', '.') ?>đ</span>
                            <span class="disc">-<?= round((($product['old_price'] - $product['price']) / $product['old_price']) * 100) ?>%</span>
                        <?php endif; ?>
                        <div class="price"><?= number_format($product['price'], 0, ',', '.') ?>đ</div>
                    </div>
                    <div class="actions">
                        <a href="/dauhuonggiang/th4/7.13/?page=productDetail&id=<?= $product['id'] ?>" class="btn">Chi tiết</a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</div>

