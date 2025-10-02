<?php require __DIR__.'/../libs/connectDB.php'; ?>
<div class="card">
    <h3>Danh sách các lớp (cách 2: <code>mysqli_fetch_array(MYSQLI_NUM)</code>)</h3>
    <?php
        $sql = "SELECT id, className FROM classes ORDER BY id";
        $result = $conn->query($sql);
        echo '<ul>';
        while ($row = mysqli_fetch_array($result, MYSQLI_NUM)) {
        [$id, $name] = $row;
        echo '<li><a href="?page=listStudentsInClass&classID='.urlencode($id).'">'
            .htmlspecialchars($id).' - '.htmlspecialchars($name).'</a></li>';
        }
        echo '</ul>';
    ?>
</div>
<?php require __DIR__.'/../libs/closeConnectDB.php'; ?>
