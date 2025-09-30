const TESTS = {
    t1: {
        title: 'TEST 1',
        questions: [
            {
                text: 'Cấu trúc dữ liệu Stack hoạt động theo nguyên tắc?',
                choices: ['FIFO', 'LIFO', 'Random'],
                answer: 1
            },
            {
                text: 'Độ phức tạp trung bình của tìm kiếm nhị phân (binary search) là?',
                choices: ['O(n)', 'O(log n)', 'O(n log n)'],
                answer: 1
            },
            {
                text: 'Trong JS, khai báo nào tạo bản sao nông (shallow copy) của mảng?',
                choices: ['arr.slice()', 'arr.push(x)', 'arr.pop()'],
                answer: 0
            },
            {
                text: 'Thẻ HTML nào dùng để chèn ảnh?',
                choices: ['<image>', '<img>', '<pic>'],
                answer: 1,
            },
            {
                text: 'Thuật toán sắp xếp nào có độ phức tạp O(n log n) trong MỌI trường hợp?',
                choices: ['Quick sort', 'Merge sort', 'Insertion sort'],
                answer: 1
            }
        ]
    },
    t2: {
        title: 'TEST 2',
        questions: [
            {
                text: 'CSS viết tắt của:',
                choices: ['Creative Style Sheets', 'Cascading Style Sheets', 'Colorful Style Sheets'],
                answer: 1,
            },
            {
                text: 'Phương thức nào để thêm phần tử vào cuối mảng trong JS?',
                choices: ['push()', 'pop()', 'shift()'],
                answer: 0,
            },
            {
                text: 'new Date().getDay() trả về:',
                choices: ['Ngày trong tháng (1..31)', 'Tháng (0..11)', 'Thứ (0..6)'],
                answer: 2,
            },
            {
                text: 'Trong HTML, thẻ nào dùng cho liên kết?',
                choices: ['<link>', '<a>', '<button>'],
                answer: 1,
            },
            {
                text: 'Trong JS, typeof null trả về?',
                choices: ['"null"', '"object"', '"undefined"'],
                answer: 1
            }
        ]
    }
};

// ===== 2) Render giao diện =====
const sel = (q) => document.querySelector(q);
const byId = (id) => document.getElementById(id);

function fillSelect() {
    const select = byId('test-select');
    select.innerHTML = '';
    for (const key of Object.keys(TESTS)) {
        const opt = document.createElement('option');
        opt.value = key;
        opt.textContent = TESTS[key].title;
        select.appendChild(opt);
    }
}

function renderTest(key) {
    const test = TESTS[key] || TESTS[Object.keys(TESTS)[0]];
    byId('test-title').textContent = test.title;
    const form = byId('quiz-form');
    form.innerHTML = ''; // reset
    byId('score-box').textContent = '';

    test.questions.forEach((q, i) => {
        const wrap = document.createElement('div');
        wrap.className = 'q';

        const qtext = document.createElement('div');
        qtext.className = 'qtext';
        qtext.textContent = `${i + 1}. ${q.text}`;
        wrap.appendChild(qtext);

        const ans = document.createElement('div');
        ans.className = 'ans';

        q.choices.forEach((c, j) => {
            const id = `q${i}_${j}`;
            const lab = document.createElement('label');
            lab.setAttribute('for', id);

            const inp = document.createElement('input');
            inp.type = 'radio';
            inp.name = `q${i}`;
            inp.id = id;
            inp.value = j;

            const span = document.createElement('span');
            span.textContent = c;

            lab.appendChild(inp);
            lab.appendChild(span);
            ans.appendChild(lab);
        });

        wrap.appendChild(ans);
        form.appendChild(wrap);
    });
}

function gradeCurrent() {
    // chấm điểm
    const select = byId('test-select');
    const test = TESTS[select.value];
    let correct = 0;

    test.questions.forEach((q, i) => {
        const checked = document.querySelector(`input[name="q${i}"]:checked`);
        // clear màu cũ
        document.querySelectorAll(`input[name="q${i}"]`).forEach(r => {
            r.parentElement.classList.remove('correct', 'wrong');
        });

        if (checked) {
            const picked = Number(checked.value);
            // gắn màu
            const correctLabel = document.getElementById(`q${i}_${q.answer}`).parentElement;
            if (picked === q.answer) {
                correct++;
                checked.parentElement.classList.add('correct');
            } else {
                checked.parentElement.classList.add('wrong');
                correctLabel.classList.add('correct');
            }
        } else {
            // chưa chọn: chỉ highlight đáp án đúng
            const correctLabel = document.getElementById(`q${i}_${q.answer}`).parentElement;
            correctLabel.classList.add('correct');
        }
    });

    byId('score-box').textContent = `Kết quả: ${correct} / ${test.questions.length}`;
}

function resetCurrent() {
    const form = byId('quiz-form');
    form.reset();
    document.querySelectorAll('.ans label').forEach(l => l.classList.remove('correct', 'wrong'));
    byId('score-box').textContent = '';
}

// ===== 3) Khởi tạo =====
document.addEventListener('DOMContentLoaded', () => {
    fillSelect();

    // Lấy test theo hash (?test=t2) nếu muốn
    const url = new URL(location.href);
    const t = url.searchParams.get('test');
    if (t && TESTS[t]) byId('test-select').value = t;

    renderTest(byId('test-select').value);

    byId('test-select').addEventListener('change', (e) => {
        // Đổi test ⇒ render lại
        renderTest(e.target.value);
    });

    byId('submit-btn').addEventListener('click', gradeCurrent);
    byId('reset-btn').addEventListener('click', resetCurrent);
});
