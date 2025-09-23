const tree = document.getElementById('tree79'); //gốc cây
const current = document.getElementById('tree79-current');//cây hiện tại

//gán trình nghe cho cả cây
tree.addEventListener('click', (e) => {
    const t = e.target;
    if (t.classList.contains('toggle')) {//nhấn nút
        const li = t.closest('li.node');//tìm nút gần nhất
        const isCollapsed = li.classList.toggle('collapsed');//đổi trạng thái của nút
        t.textContent = isCollapsed ? '+' : '−';//đổi dấu
        li.setAttribute('aria-expanded', String(!isCollapsed));
        return;
    }

    //bấm tên để chọn node
    if (t.classList.contains('label')) {
        tree.querySelectorAll('.node.selected').forEach(n => n.classList.remove('selected'));//bỏ nút chọn cũ
        const li = t.closest('li.node');//tìm nút vừa bấm
        li.classList.add('selected');//chọn
        current.textContent = t.textContent.trim();//cập nhật
    }
});

// Khởi tạo ký hiệu +/− đúng với trạng thái hiện tại
tree.querySelectorAll('li.node').forEach(li => {//quét qua tất cả các nút
    const btn = li.querySelector(':scope > .toggle');//chỉ lấy thư mục con trực tiếp
    if (btn) btn.textContent = li.classList.contains('collapsed') ? '+' : '−';
});

// Double-click vào tên để mở/đóng nhanh
tree.addEventListener('dblclick', (e) => {
    if (!e.target.classList.contains('label')) return;
    const li = e.target.closest('li.node');
    const btn = li.querySelector(':scope > .toggle');
    if (btn) btn.click();
});