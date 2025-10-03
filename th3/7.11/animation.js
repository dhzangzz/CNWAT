let dongHo = null;
let khungHienTai = 0;
let huong = 1;

const danhSachHinh = [
    'images/stand.jpg',
    'images/jump1.jpg',
    'images/jump2.jpg',
    'images/jump3.jpg'
];

const anhNhanVat = document.getElementById('stickFigure');
const nutNhay = document.getElementById('jumpBtn');
const nutDung = document.getElementById('stopBtn');

function batDauAnimation() {
    if (dongHo) {
        return;
    }
    
    nutNhay.disabled = true;
    nutDung.disabled = false;
    
    dongHo = setInterval(() => {
        anhNhanVat.src = danhSachHinh[khungHienTai];
        khungHienTai += huong;
        
        if (khungHienTai >= danhSachHinh.length) {
            khungHienTai = danhSachHinh.length - 2;
            huong = -1;
        } else if (khungHienTai < 0) {
            khungHienTai = 1;
            huong = 1;
        }
    }, 200);
}

function dungAnimation() {
    if (dongHo) {
        clearInterval(dongHo);
        dongHo = null;
        khungHienTai = 0;
        huong = 1;
        anhNhanVat.src = danhSachHinh[0];
        nutNhay.disabled = false;
        nutDung.disabled = true;
    }
}

nutDung.disabled = true;

