<?php
require_once __DIR__.'/../db.php';
$db = pdo();
$keyword = isset($_GET['keyword']) ? trim($_GET['keyword']) : '';
$products = [];

if (!empty($keyword)) {//co keyword
    $stmt = $db->prepare("SELECT p.*, c.name as category_name 
                         FROM products p 
                         LEFT JOIN categories c ON p.category_id = c.id 
                         WHERE p.name LIKE ? OR p.description LIKE ? OR p.specifications LIKE ?
                         ORDER BY p.created_at DESC");//loc sp theo keyword trong ten, mo ta, thong so
    $search_term = "%{$keyword}%";//tim kiem
    $stmt->execute([$search_term, $search_term, $search_term]);
    $products = $stmt->fetchAll();  
}
?>
<link rel="stylesheet" href="/dauhuonggiang/th4/7.13/style.css">

<div class="laptop-page">
    <h3>Tìm kiếm: "<?= htmlspecialchars($keyword) ?>" (<?= count($products) ?> kết quả)</h3>

    <?php if (empty($keyword)): ?>
        <p>Vui lòng nhập từ khóa tìm kiếm!</p>
    <?php elseif (empty($products)): ?>
        <p>Không tìm thấy sản phẩm nào!</p>
    <?php else: ?>
            <div class="products">
                <?php foreach ($products as $product): ?><!--lap, link den productdetail co id=idsp-->
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

