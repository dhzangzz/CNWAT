const expEl = document.getElementById('exp');
const currEl = document.getElementById('curr');
const calc = document.querySelector('.calc10');//khung máy tính

let current = '0';    //chuỗi số đang nhập
let prev = null;   //giá trị trước đó
let operator = null;   //toán tử
let overwrite = false;  //false: nối đuôi, true: thay thế current 

function updateScreen() {
    currEl.textContent = current;
    expEl.textContent = operator && prev !== null ? `${trimNum(prev)} ${operator}` : '';
}
function trimNum(n) {
    const s = String(n);
    return s.includes('.') ? parseFloat(s).toString() : s;//ép chuỗi
}
function inputDigit(d) {
    if (overwrite || current === '0') { current = d; overwrite = false; }//gán số mới
    else { current += d; }
    updateScreen();
}
function inputDot() {
    if (overwrite) { current = '0.'; overwrite = false; }
    else if (!current.includes('.')) { current += '.'; }//ch có . thì thêm
    updateScreen();
}
function setOperator(op) {
    const curVal = parseFloat(current);//chuỗi -> số
    if (operator && prev !== null && !overwrite) {//có phép tính trc, chưa overwrite
        prev = compute(prev, curVal, operator);       // tính tiếp chuỗi phép tính
        current = trimNum(prev);
    } else {
        prev = curVal;
    }
    operator = op;//ghi toán tử mới
    overwrite = true;//thay đổi current
    updateScreen();
}

function equals() {
    if (operator === null || prev === null) return;
    const curVal = parseFloat(current);
    const res = compute(prev, curVal, operator);
    current = isFinite(res) ? trimNum(res) : 'Lỗi';
    prev = null; operator = null; overwrite = true;
    updateScreen();
}

function compute(a, b, op) {
    switch (op) {
        case '+': return a + b;
        case '−': return a - b;
        case '×': return a * b;
        case '÷': return b === 0 ? NaN : a / b;
        default: return b;
    }
}
function clearAll() { current = '0'; prev = null; operator = null; overwrite = false; updateScreen(); }//C
function clearEntry() { current = '0'; overwrite = true; updateScreen(); }//CE
function backspace() {
    if (overwrite) { current = '0'; overwrite = false; }
    else { current = current.length > 1 ? current.slice(0, -1) : '0'; }//xóa kí tự cuối hoặc quay về 0
    updateScreen();
}
calc.addEventListener('click', (e) => {
    const btn = e.target.closest('button'); if (!btn) return;

    if (btn.dataset.num) return inputDigit(btn.dataset.num);
    if (btn.dataset.dot) return inputDot();
    if (btn.dataset.op) return setOperator(btn.dataset.op);
    if (btn.dataset.eq) return equals();

    if (btn.dataset.act === 'clear') return clearAll();
    if (btn.dataset.act === 'ce') return clearEntry();
    if (btn.dataset.act === 'back') return backspace();
});
document.addEventListener('keydown', (e) => {
    const k = e.key;
    if (/\d/.test(k)) return inputDigit(k);
    if (k === '.' || k === ',') return inputDot();
    if (k === '+' || k === '-') return setOperator(k === '+' ? '+' : '−');
    if (k === '*' || k === 'x' || k === 'X') return setOperator('×');
    if (k === '/') return setOperator('÷');
    if (k === 'Enter' || k === '=') return equals();
    if (k === 'Backspace') return backspace();
    if (k === 'Escape' || k === 'Delete') return clearAll();
});

// Khởi tạo
updateScreen();
