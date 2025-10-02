<?php
require_once __DIR__.'/../db.php';
$db = pdo();
$stmt = $db->query("SELECT p.*, c.name as category_name 
                    FROM products p 
                    LEFT JOIN categories c ON p.category_id = c.id 
                    ORDER BY p.created_at DESC 
                    LIMIT 2");//lay 2 sp moi nhat
$newest_products = $stmt->fetchAll();
?>
<link rel="stylesheet" href="/dauhuonggiang/th4/7.13/style.css">

<div class="laptop-page">
    <div class="search-box">
        <form action="/dauhuonggiang/th4/7.13/" method="GET">
            <input type="hidden" name="page" value="productSearch">
            <input type="text" name="keyword" placeholder="Tìm kiếm sản phẩm..." 
                   value="<?= isset($_GET['keyword']) ? htmlspecialchars($_GET['keyword']) : '' ?>">
            <button type="submit">Tìm kiếm</button>
        </form>
    </div>

    <div class="section">
        <h3>DANH MỤC SẢN PHẨM</h3>
        <div class="categories">
            <?php
            $stmt = $db->query("SELECT * FROM categories ORDER BY name");//ds sp
            $categories = $stmt->fetchAll();
            foreach ($categories as $cat)://lap, link den productlist co id=idsp
            ?>
                <a href="/dauhuonggiang/th4/7.13/?page=productList&category_id=<?= $cat['id'] ?>" class="cat-item">
                    <?= htmlspecialchars($cat['name']) ?>
                </a>
            <?php endforeach; ?>
        </div>
    </div>

    <div class="section">
        <h3>SẢN PHẨM MỚI NHẤT</h3>
        
        <?php if (empty($newest_products)): ?>
            <p>Chưa có sản phẩm. Vui lòng thêm dữ liệu!</p>
        <?php else: ?>
            <div class="products">
                <?php foreach ($newest_products as $product): ?>
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
                            <?php if ($product['old_price'] > 0 && $product['old_price'] > $product['price']): ?><!--giacu>giamoi-->
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
</div>

