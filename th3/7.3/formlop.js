const frm = document.getElementById('frm-lop');
const fMa = document.getElementById('malop');
const fTen = document.getElementById('tenlop');
const fKhoa = document.getElementById('khoahoc');
const fGv = document.getElementById('gvcn');

//quy tắc ktra
const reMa = /^[A-Z0-9]{6}$/;                        //6 ký tự chữ IN HOA hoặc số
const reGv = /^[A-Za-zÀ-ỹ\s'.-]{1,50}$/;             //tên có dấu, khoảng trắng, . - '

//báo lỗi
function setErr(input, msg) {
    input.classList.add('is-invalid');//gán thêm class vào ô nhập
    const errEl = document.getElementById('err-' + input.id);//id lỗi = err- + id nhập
    if (errEl) errEl.textContent = msg || '';//ghi lỗi
    input.setAttribute('aria-invalid', 'true');
}
//xóa lỗi
function clearErr(input) {
    input.classList.remove('is-invalid');//gỡ class
    const errEl = document.getElementById('err-' + input.id);
    if (errEl) errEl.textContent = '';
    input.removeAttribute('aria-invalid');
}

// Các hàm kiểm tra riêng cho từng trường
function validateMa() {
    let v = (fMa.value || '').trim().toUpperCase();//cắt khoảng trắng, in hoa
    fMa.value = v; //gán lại
    if (!v) return setErr(fMa, 'Mã lớp bắt buộc.'), false;//nếu rỗng
    if (v.length !== 6) return setErr(fMa, 'Phải đúng 6 ký tự.'), false;
    if (!reMa.test(v)) return setErr(fMa, 'Chỉ cho phép A–Z và 0–9.'), false;//sai kiểu kí tự
    return clearErr(fMa), true;
}

function validateTen() {
    let v = (fTen.value || '').trim();
    if (!v) return setErr(fTen, 'Tên lớp bắt buộc.'), false;
    if (v.length > 50) return setErr(fTen, 'Tối đa 50 ký tự.'), false;
    return clearErr(fTen), true;
}

function validateKhoa() {
    let v = fKhoa.value;
    if (v === '' || v === null) return setErr(fKhoa, 'Khóa học bắt buộc.'), false;
    const n = Number(v);
    if (!Number.isInteger(n)) return setErr(fKhoa, 'Phải là số nguyên.'), false;
    if (n < 1 || n > 200) return setErr(fKhoa, 'Giá trị 1–200.'), false;
    return clearErr(fKhoa), true;
}

function validateGv() {
    let v = (fGv.value || '').trim();
    if (!v) return setErr(fGv, 'GVCN bắt buộc.'), false;
    if (v.length > 50) return setErr(fGv, 'Tối đa 50 ký tự.'), false;
    if (!reGv.test(v)) return setErr(fGv, 'Chỉ chữ cái, khoảng trắng, ., -, \'.'), false;
    return clearErr(fGv), true;
}

// Gán kiểm tra theo thời gian thực
fMa.addEventListener('input', validateMa);
fTen.addEventListener('input', validateTen);
fKhoa.addEventListener('input', validateKhoa);
fGv.addEventListener('input', validateGv);

// Submit form (giả lập lưu): nếu hợp lệ thì hiện “xem trước”
frm.addEventListener('submit', (e) => {
    e.preventDefault();
    const ok =
        validateMa() &
        validateTen() &
        validateKhoa() &
        validateGv();

    if (!ok) return; // có lỗi -> dừng

    const prev = document.getElementById('preview');
    const body = document.getElementById('preview-body');
    body.innerHTML = `
        <ul style="margin:6px 0 0 16px">
          <li><b>MALOP:</b> ${fMa.value}</li>
          <li><b>TENLOP:</b> ${fTen.value}</li>
          <li><b>KHOAHOC:</b> ${fKhoa.value}</li>
          <li><b>GVCN:</b> ${fGv.value}</li>
        </ul>`;
    prev.hidden = false;
});

// Reset -> xóa lỗi, ẩn preview
frm.addEventListener('reset', () => {
    [fMa, fTen, fKhoa, fGv].forEach(clearErr);
    document.getElementById('preview').hidden = true;
});