<div class="card">
    <h2>UploadForm</h2>
    <form method="post" enctype="multipart/form-data" action="/dauhuonggiang/th4/7.3/?page=uploadprocess">
        <label>Chọn tệp (ảnh .jpg/.png/.gif, ≤ 2MB):
        <input type="file" name="file" accept=".jpg,.jpeg,.png,.gif" required>
        </label>
        <button type="submit">Upload</button>
    </form>
</div>

<style>
.card form label{display:block;margin:10px 0}
.card input[type=file]{display:block;margin-top:6px}
.card button{padding:8px 12px;border:0;border-radius:10px;cursor:pointer}
</style>
