const table = document.getElementById('productTable');
const headers = table.querySelectorAll('th.sortable');
let sortDirection = {}; //lưu chiều sắp xếp

headers.forEach(header => {//mỗi cột gán 1 listener, data-col cho biết đang sắp cột nào
    header.addEventListener('click', () => {
        const colIndex = parseInt(header.dataset.col, 10);
        headers.forEach(h => h.classList.remove('sorted-asc', 'sorted-desc'));//chỉ một cột hiện mũi tên 
        sortDirection[colIndex] = !sortDirection[colIndex];//đảo chiều true->false
        
        //sắp xếp các hàng
        const rows = Array.from(table.tBodies[0].rows);
        rows.sort((a, b) => {
            const cellA = a.cells[colIndex].textContent.trim().toLowerCase();//lấy nội dung
            const cellB = b.cells[colIndex].textContent.trim().toLowerCase();
            return sortDirection[colIndex]
                ? cellA.localeCompare(cellB)   //tăng
                : cellB.localeCompare(cellA);  //giảm
        });

        //cập nhật theo thứ tự mới
        rows.forEach((row, i) => {
            row.cells[0].textContent = i + 1;  // cập nhật cột TT
            table.tBodies[0].appendChild(row);//di chuyển đến tt mới
        });

        //hiện mũi tên
        header.classList.add(sortDirection[colIndex] ? 'sorted-asc' : 'sorted-desc');
    });
});

//nút sắp xếp...
document.getElementById('sortByNameBtn').addEventListener('click', () => {
    table.querySelector('th.sortable[data-col="2"]').click();
});

const searchInput = document.getElementById('searchInput');//tìm

const escapeReg = s => s.replace(/[.*+?^${}()|[\]\\]/g, '\\$&');//vô hiệu hóa kí tự đặc biệt

//giữ nguyên nd ô
function baseText(cell) {
    if (!cell.dataset.orig) cell.dataset.orig = cell.textContent;
    return cell.dataset.orig;
}

searchInput.addEventListener('input', function () {
    const keyword = this.value.trim().toLowerCase();
    const rows = table.tBodies[0].rows;

    for (const row of rows) {
        let found = false;

        // Duyệt qua các cột dữ liệu
        for (let i = 1; i < row.cells.length; i++) {
            const cell = row.cells[i];
            const text = baseText(cell);             // giữ nguyên văn bản gốc
            const lower = text.toLowerCase();

            if (keyword && lower.includes(keyword)) {
                found = true;
                // Tô vàng cụm trùng khớp 
                const regex = new RegExp(`(${escapeReg(keyword)})`, 'gi');
                cell.innerHTML = text.replace(regex, '<span class="highlight">$1</span>');
            } else {
                cell.innerHTML = text; // xóa highlight nếu không khớp
            }
        }

        // Ẩn/hiện hàng theo kết quả tìm
        row.style.display = (found || keyword === "") ? "" : "none";
    }
});

