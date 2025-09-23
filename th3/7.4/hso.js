const frm = document.getElementById('frm-hoso');
const fMa = document.getElementById('mahs');
const fTen = document.getElementById('hoten');
const fNs = document.getElementById('ngaysinh');
const fDc = document.getElementById('diachi');
const fLop = document.getElementById('lop');
const fToan = document.getElementById('diemtoan');
const fLy = document.getElementById('diemly');
const fHoa = document.getElementById('diemhoa');

const reMa = /^[A-Z0-9]{8}$/;                 //MAHS: 8 ký tự A–Z/0–9
const reTen = /^[A-Za-zÀ-ỹ\s'.-]{1,50}$/;      //Họ tên: chữ có dấu + khoảng trắng
const reLop = /^[A-Z0-9]{6}$/;                 //LOP: 6 ký tự A–Z/0–9

function setErr(input, msg) {
    input.classList.add('is-invalid');
    const err = document.getElementById('err-' + input.id);
    if (err) err.textContent = msg || '';
    input.setAttribute('aria-invalid', 'true');
}
function clearErr(input) {
    input.classList.remove('is-invalid');
    const err = document.getElementById('err-' + input.id);
    if (err) err.textContent = '';
    input.removeAttribute('aria-invalid');
}
function validateMa() {
    let v = (fMa.value || '').trim().toUpperCase();
    fMa.value = v;
    if (!v) return setErr(fMa, 'Mã học sinh bắt buộc.'), false;
    if (v.length !== 8) return setErr(fMa, 'Phải đúng 8 ký tự.'), false;
    if (!reMa.test(v)) return setErr(fMa, 'Chỉ cho phép A–Z và 0–9.'), false;
    return clearErr(fMa), true;
}
function validateTen() {
    let v = (fTen.value || '').trim();
    if (!v) return setErr(fTen, 'Họ tên bắt buộc.'), false;
    if (v.length > 50) return setErr(fTen, 'Tối đa 50 ký tự.'), false;
    if (!reTen.test(v)) return setErr(fTen, 'Chỉ chữ cái, khoảng trắng, ., -, \'.'), false;
    return clearErr(fTen), true;
}
function validateNgaysinh() {
    const v = fNs.value;
    if (!v) return setErr(fNs, 'Ngày sinh bắt buộc.'), false;
    const d = new Date(v);
    if (Number.isNaN(+d)) return setErr(fNs, 'Ngày không hợp lệ.'), false;
    const today = new Date(); today.setHours(0, 0, 0, 0); //set hnay vê 00:00
    const oldest = new Date(); oldest.setFullYear(today.getFullYear() - 120); //không quá 120
    if (d > today) return setErr(fNs, 'Không được lớn hơn hôm nay.'), false;
    if (d < oldest) return setErr(fNs, 'Quá xa (trên 120 năm).'), false;
    return clearErr(fNs), true;
}
function validateDiachi() {
    const v = (fDc.value || '').trim();
    if (!v) return setErr(fDc, 'Địa chỉ bắt buộc.'), false;
    if (v.length > 150) return setErr(fDc, 'Tối đa 150 ký tự.'), false;
    return clearErr(fDc), true;
}
function validateLop() {
    let v = (fLop.value || '').trim().toUpperCase();
    fLop.value = v;
    if (!v) return setErr(fLop, 'Lớp bắt buộc.'), false;
    if (v.length !== 6) return setErr(fLop, 'Phải đúng 6 ký tự.'), false;
    if (!reLop.test(v)) return setErr(fLop, 'Chỉ A–Z và 0–9.'), false;
    return clearErr(fLop), true;
}

//dấu chấm động hoặc dấu phẩy động
function parseFloatLocale(s) {
    if (s === '' || s == null) return NaN;
    return Number(String(s).replace(',', '.'));
}
function validateDiem(input, label) {
    const raw = input.value;
    const n = parseFloatLocale(raw);
    if (raw === '' || raw == null) return setErr(input, label + ' bắt buộc.'), false;
    if (!Number.isFinite(n)) return setErr(input, label + ' phải là số.'), false;
    if (n < 0 || n > 10) return setErr(input, label + ' trong khoảng 0–10.'), false;
    return clearErr(input), true;
}

// Gắn sự kiện realtime
fMa.addEventListener('input', validateMa);
fTen.addEventListener('input', validateTen);
fNs.addEventListener('change', validateNgaysinh);
fNs.addEventListener('input', validateNgaysinh);
fDc.addEventListener('input', validateDiachi);
fLop.addEventListener('input', validateLop);
[fToan, fLy, fHoa].forEach(el => el.addEventListener('input', () => validateDiem(el, el.previousElementSibling.textContent)));

//min/max cho nsinh
(function setDateBounds() {
    const today = new Date();
    const y = today.getFullYear(), m = String(today.getMonth() + 1).padStart(2, '0'), d = String(today.getDate()).padStart(2, '0');
    fNs.max = `${y}-${m}-${d}`;
    fNs.min = `1900-01-01`;
})();

//lưu
frm.addEventListener('submit', (e) => {
    e.preventDefault();
    const checks = [
        validateMa(),
        validateTen(),
        validateNgaysinh(),
        validateDiachi(),
        validateLop(),
        validateDiem(fToan, 'Điểm Toán'),
        validateDiem(fLy, 'Điểm Lý'),
        validateDiem(fHoa, 'Điểm Hóa'),
    ];
    const ok = checks.every(Boolean);
    if (!ok) return;

    const prev = document.getElementById('preview');
    const body = document.getElementById('preview-body');
    body.innerHTML = `
        <ul style="margin:6px 0 0 16px">
          <li><b>MAHS:</b> ${fMa.value}</li>
          <li><b>HOTEN:</b> ${fTen.value}</li>
          <li><b>NGAYSINH:</b> ${fNs.value}</li>
          <li><b>DIACHI:</b> ${fDc.value}</li>
          <li><b>LOP:</b> ${fLop.value}</li>
          <li><b>DIEMTOAN:</b> ${fToan.value}</li>
          <li><b>DIEMLY:</b> ${fLy.value}</li>
          <li><b>DIEMHOA:</b> ${fHoa.value}</li>
        </ul>`;
    prev.hidden = false;
});

frm.addEventListener('reset', () => {
    [fMa, fTen, fNs, fDc, fLop, fToan, fLy, fHoa].forEach(clearErr);
    document.getElementById('preview').hidden = true;
});