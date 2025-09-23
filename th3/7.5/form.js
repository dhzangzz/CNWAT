const $ = (q) => document.querySelector(q);
const $$ = (q) => Array.from(document.querySelectorAll(q));

const E = {
    name: $('#eName'),
    gender: $('#eGender'),
    email: $('#eEmail'),
    dob: $('#eDob'),
    phone: $('#ePhone'),
    pwd: $('#ePwd'),
    pwd2: $('#ePwd2'),
};

const DOB_PLACE = 'nn/tt/nnnn';

/* chuan hoa ho ten */
const normalizeName = (s) =>
    s.trim()
        .replace(/\s+/g, ' ')
        .toLowerCase()
        .replace(/(^|\s)([^\s])/g, m => m.toUpperCase());

$('#fullName').addEventListener('blur', () => {
    const v = normalizeName($('#fullName').value);
    $('#fullName').value = v;
});

/* kiểm tra email sdt ngay sinh */
const emailOk = (v) => /^[a-z0-9]+([._-]?[a-z0-9]+)*@[a-z0-9-]+(\.[a-z0-9-]+)+$/i.test(v);
const phoneOk = (v) => /^\d{9,11}$/.test(v);

const validDate = (dmy) => {
    const m = /^(\d{2})\/(\d{2})\/(\d{4})$/.exec(dmy);
    if (!m) return false;
    const dd = +m[1], mm = +m[2], yyyy = +m[3];
    const d = new Date(yyyy, mm - 1, dd);
    return d.getFullYear() === yyyy && d.getMonth() + 1 === mm && d.getDate() === dd;
};

const dob = $('#dob');

dob.addEventListener('focus', () => {
    dob.classList.remove('ghost');
    if (dob.value === DOB_PLACE) dob.value = '';
});

dob.addEventListener('input', (e) => {
    // tu chen / khi nhap ngay sinh
    if (dob.classList.contains('ghost')) return;
    let v = dob.value.replace(/[^\d]/g, '');
    if (v.length >= 3 && v.length <= 4) v = v.slice(0, 2) + '/' + v.slice(2);
    if (v.length > 4) v = v.slice(0, 2) + '/' + v.slice(2, 4) + '/' + v.slice(4, 8);
    dob.value = v.slice(0, 10);
});

dob.addEventListener('blur', () => {
    if (!dob.value.trim()) {
        dob.value = DOB_PLACE;
        dob.classList.add('ghost');
    }
});

/*chap nhan thi validate all */
const validateAll = () => {
    // clear lỗi
    Object.values(E).forEach(s => s.textContent = '');

    let ok = true;

    // bắt buộc: họ tên
    const name = $('#fullName').value.trim();
    if (!name) { E.name.textContent = 'Vui lòng nhập họ tên.'; ok = false; }

    // bắt buộc: giới tính
    const g = $$('input[name="gender"]:checked')[0]?.value;
    if (!g) { E.gender.textContent = 'Hãy chọn giới tính.'; ok = false; }

    // email
    const mail = $('#email').value.trim();
    if (!emailOk(mail)) { E.email.textContent = 'Email không hợp lệ.'; ok = false; }

    // dob
    const d = dob.value.trim();
    if (d === DOB_PLACE || !validDate(d)) {
        E.dob.textContent = 'Ngày sinh không hợp lệ (dd/mm/yyyy).';
        ok = false;
    }

    // phone
    const phone = $('#phone').value.trim();
    if (!phoneOk(phone)) { E.phone.textContent = 'Số điện thoại 9–11 chữ số.'; ok = false; }

    // mật khẩu
    const p1 = $('#pwd').value, p2 = $('#pwd2').value;
    if (p1.length < 6) { E.pwd.textContent = 'Mật khẩu tối thiểu 6 ký tự.'; ok = false; }
    if (p1 !== p2) { E.pwd2.textContent = 'Mật khẩu gõ lại không đúng.'; ok = false; }

    if (!ok) {
        // focus vào input có lỗi đầu tiên
        const errOrder = [
            ['#fullName', E.name], ['input[name="gender"]', E.gender],
            ['#email', E.email], ['#dob', E.dob],
            ['#phone', E.phone], ['#pwd', E.pwd], ['#pwd2', E.pwd2]
        ];
        for (const [sel, span] of errOrder) {
            if (span.textContent) { const el = document.querySelector(sel); el?.focus(); break; }
        }
        return false;
    }

    alert(`Đăng ký thành công!\nHọ tên: ${name}\nGiới tính: ${g}\nEmail: ${mail}\nNgày sinh: ${d}\nĐiện thoại: ${phone}`);
    return true;
};

$('#btn-ok').addEventListener('click', validateAll);

/* ====== Bước 2.5: keyup Enter ở tất cả input → nhảy sang ô kế tiếp ====== */
$('#regForm').addEventListener('keyup', (e) => {
    if (e.key !== 'Enter' || e.target.tagName === 'TEXTAREA') return;
    e.preventDefault();
    const controls = $$('#regForm input, #regForm select, #regForm textarea, #btn-ok')
        .filter(el => !el.disabled && el.type !== 'hidden');
    const idx = controls.indexOf(e.target);
    if (idx >= 0 && idx < controls.length - 1) controls[idx + 1].focus();
});

/* === Khởi tạo: trỏ caret vào Họ tên, giữ placeholder cho ngày sinh === */
window.addEventListener('DOMContentLoaded', () => {
    $('#fullName').focus();
    if (!dob.value) { dob.value = DOB_PLACE; dob.classList.add('ghost'); }
});
