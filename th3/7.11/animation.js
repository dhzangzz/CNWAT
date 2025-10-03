let dongHo = null;
let khungHienTai = 0;//chi so anh
let huong = 1;//1=tien,-1=lui

const danhSachHinh = [
    'images/stand.jpg',
    'images/jump1.jpg',
    'images/jump2.jpg',
    'images/jump3.jpg'
];
//tham chieu toi anh, nut bam
const anhNhanVat = document.getElementById('stickFigure');
const nutNhay = document.getElementById('jumpBtn');
const nutDung = document.getElementById('stopBtn');

function batDauAnimation() {
    if (dongHo) {
        return;//neu dang chay thi ko lam j
    }
    
    nutNhay.disabled = true;//vo hieu hoa nut nhay
    nutDung.disabled = false;
    
    dongHo = setInterval(() => {//tao dong ho
        anhNhanVat.src = danhSachHinh[khungHienTai];//gan anh
        khungHienTai += huong;
        
        if (khungHienTai >= danhSachHinh.length) {
            khungHienTai = danhSachHinh.length - 2;
            huong = -1;
        } else if (khungHienTai < 0) {
            khungHienTai = 1;
            huong = 1;
        }
    }, 200);//0.2s
}

function dungAnimation() {
    if (dongHo) {
        clearInterval(dongHo);//dung dong ho
        dongHo = null;
        khungHienTai = 0;
        huong = 1;
        anhNhanVat.src = danhSachHinh[0];
        nutNhay.disabled = false;
        nutDung.disabled = true;
    }
}

nutDung.disabled = true;

