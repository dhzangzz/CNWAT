<div class="card">
    <h2>Upload nhiều file sử dụng mảng kết hợp</h2>
    <form method="post" enctype="multipart/form-data" action="/dauhuonggiang/th4/7.3/?page=uploadprocess">
        <?php
        for ($i = 1; $i <= 10; $i++) {
            echo "File $i: <input type='file' name='files[]'><br>";
        }
        ?>
        <br>
        <input type="reset" value="Reset">
        <input type="submit" name="submit" value="Upload">
    </form>
</div>

<style>
.card form {margin:20px 0;}
.card input[type=file]{
    display:inline-block;
    margin:5px 5px 10px 5px;
    padding:5px;
    border:1px solid #ddd;
    background-color:#ffe6e6;
    border-radius:5px;
}
.card button, .card input[type=submit], .card input[type=reset]{
    padding:8px 12px;
    border:0;
    border-radius:10px;
    cursor:pointer;
    margin:5px;
}
.card input[type=submit]{
    background-color:#28a745;
    color:white;
}
.card input[type=reset]{
    background-color:#ffc107;
    color:black;
}
</style>
