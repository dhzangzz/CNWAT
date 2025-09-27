<div class="card">
    <nav class="subnav">
        <a class="<?= ($PAGE??($_GET['page']??''))==='home' ? 'active' : '' ?>" href="?page=home">Home</a>
        <a class="<?=
            in_array(($PAGE??($_GET['page']??'')), ['list','detail','edit','delete'], true)
            ? 'active' : '' ?>" href="?page=list">List</a>
        <a class="<?= ($PAGE??($_GET['page']??''))==='add'  ? 'active' : '' ?>" href="?page=add">Add</a>
    </nav>

    <h2>Quản lý sinh viên bằng file</h2>
    <p>Review thao tác file + data flow: list, add, edit, detail, upload.</p>
</div>
