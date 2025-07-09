<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BaiVietController;
use App\Http\Controllers\BinhLuanController;
use App\Http\Controllers\ChiTietBaiVietController;
use App\Http\Controllers\ChiTietPhimController;
use App\Http\Controllers\ChucNangController;
use App\Http\Controllers\ChucVuController;
use App\Http\Controllers\TheLoaiPhimController;
use App\Http\Controllers\PhongChieuController;
use App\Http\Controllers\DichVuController;
use App\Http\Controllers\DonHangController;
use App\Http\Controllers\GheController;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\KhachHangController;
use App\Http\Controllers\NhanVienController;
use App\Http\Controllers\PhimController;
use App\Http\Controllers\SuatChieuController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\VeController;
use App\Http\Controllers\VoucherController;
use App\Models\BinhLuan;
use App\Models\Ve;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

//token
Route::get('/check-admin',[NhanVienController::class,'checkAdmin']);
Route::get('/check-khach-hang',[KhachHangController::class, 'checkKhachHang']);
Route::get('/test-mail',[TestController::class, 'testMail']);
//Dang Nhap
Route::post("/admin/dang-nhap",[NhanVienController::class,'dangNhap']);
//Nhân Viên
Route::get('/admin/nhan-vien/get-data', [NhanVienController::class, 'getData']);
Route::post('/admin/nhan-vien/add-data', [NhanVienController::class, 'addData']);
Route::post('/admin/nhan-vien/update', [NhanVienController::class, 'update']);
Route::post('/admin/nhan-vien/delete', [NhanVienController::class, 'destroy']);
Route::post('/admin/nhan-vien/change-status', [NhanVienController::class, 'changeStatus']);

Route::post('/admin/in-ve/get-phim',[DonHangController::class,'getPhimByDonHang']);
//Chức Vụ
Route::get('/admin/chuc-vu/get-data', [ChucVuController::class, 'getData']);
Route::post('/admin/chuc-vu/add-data', [ChucVuController::class, 'addData']);
Route::post('/admin/chuc-vu/update', [ChucVuController::class, 'update']);
Route::post('/admin/chuc-vu/delete', [ChucVuController::class, 'destroy']);
Route::post('/admin/chuc-vu/change-status', [ChucVuController::class, 'changeStatus']);

//Chức Năng
Route::get('/admin/chuc-nang/get-data', [ChucNangController::class, 'getData']);


//Khách Hàng
Route::get('/admin/khach-hang/get-data', [KhachHangController::class, 'getData']);
Route::post('/admin/khach-hang/add-data', [KhachHangController::class, 'addData']);
Route::post('/admin/khach-hang/update', [KhachHangController::class, 'update']);
Route::post('/admin/khach-hang/delete', [KhachHangController::class, 'destroy']);
Route::post('/admin/khach-hang/change-status', [KhachHangController::class, 'changeStatus']);

//Phim
Route::get('/admin/phim/get-data', [PhimController::class, 'getData']);
Route::post('/admin/phim/add-data', [PhimController::class, 'addData']);
Route::post('/admin/phim/update', [PhimController::class, 'update']);
Route::post('/admin/phim/delete', [PhimController::class, 'destroy']);
Route::post('/admin/phim/change-status', [PhimController::class, 'changeStatus']);


//Phong Chieu
Route::get('/admin/phong-chieu/get-data', [PhongChieuController::class, 'getData']);
Route::post('/admin/phong-chieu/add-data', [PhongChieuController::class, 'addData']);
Route::post('/admin/phong-chieu/update', [PhongChieuController::class, 'update']);
Route::post('/admin/phong-chieu/delete', [PhongChieuController::class, 'destroy']);
Route::post('/admin/phong-chieu/change-status', [PhongChieuController::class, 'changeStatus']);
Route::post('/admin/phong-chieu/tao-ghe-auto', [PhongChieuController::class, 'taoGheAuto']);


//Dịch Vụ
Route::get('/admin/dich-vu/get-data', [DichVuController::class, 'getData']);
Route::post('/admin/dich-vu/add-data', [DichVuController::class, 'addData']);
Route::post('/admin/dich-vu/update', [DichVuController::class, 'update']);
Route::post('/admin/dich-vu/delete', [DichVuController::class, 'destroy']);
Route::post('/admin/dich-vu/change-status', [DichVuController::class, 'changeStatus']);


//Voucher
Route::get('/admin/voucher/get-data', [VoucherController::class, 'getData']);
Route::post('/admin/voucher/add-data', [VoucherController::class, 'addData']);
Route::post('/admin/voucher/update', [VoucherController::class, 'update']);
Route::post('/admin/voucher/delete', [VoucherController::class, 'destroy']);
Route::post('/admin/voucher/change-status', [VoucherController::class, 'changeStatus']);


//Suất Chiếu
Route::get('/admin/suat-chieu/get-data', [SuatChieuController::class, 'getData']);
Route::post('/admin/suat-chieu/add-data', [SuatChieuController::class, 'addData']);
Route::post('/admin/suat-chieu/update', [SuatChieuController::class, 'update']);
Route::post('/admin/suat-chieu/delete', [SuatChieuController::class, 'destroy']);
Route::post('/admin/suat-chieu/change-status', [SuatChieuController::class, 'changeStatus']);
Route::post('/admin/suat-chieu/tao-ve-auto', [SuatChieuController::class, 'taoVeAuto']);


//Vé
Route::get('/admin/ve/get-data', [VeController::class, 'getData']);
Route::post('/admin/ve/add-data', [VeController::class, 'addData']);
Route::post('/admin/ve/update', [VeController::class, 'update']);
Route::post('/admin/ve/delete', [VeController::class, 'destroy']);
Route::post('/admin/ve/change-status', [VeController::class, 'changeStatus']);

// Ghế
Route::get('/admin/ghe/get-data', [GheController::class, 'getData']);
Route::post('/admin/ghe/add-data', [GheController::class, 'addData']);
Route::post('/admin/ghe/update', [GheController::class, 'update']);
Route::post('/admin/ghe/delete', [GheController::class, 'destroy']);
Route::post('/admin/ghe/change-status', [GheController::class, 'changeStatus']);


// Bài Viết
Route::get('/admin/bai-viet/get-data', [BaiVietController::class, 'getData']);
Route::post('/admin/bai-viet/add-data', [BaiVietController::class, 'addData']);
Route::post('/admin/bai-viet/update', [BaiVietController::class, 'update']);
Route::post('/admin/bai-viet/delete', [BaiVietController::class, 'destroy']);
Route::post('/admin/bai-viet/change-status', [BaiVietController::class, 'changeStatus']);

//admin-donhang
Route::get('/admin/don-hang/load-Data', [DonHangController::class, 'getData']);
Route::get('/admin/don-hang/delete/{id}', [DonHangController::class, 'xoaDonHang']);

// Bình luận
Route::get('/admin/binh-luan/get-data', [BinhLuanController::class, 'getData']);

// Soát vé
Route::post('/admin/soat-ve', [VeController::class, 'soatVe']);


// Client

//Trang Chu
Route::get('/client/home-page', [HomePageController::class, 'homepageData']);
Route::get('/client/dich-vu/get-data', [DichVuController::class, 'getData']);

//Dang Nhap
Route::post("/client/dang-nhap",[KhachHangController::class,'dangNhap']);
//Dang Ky
Route::post("/client/dang-ky",[KhachHangController::class,'dangKy']);
Route::post("/client/quen-mat-khau", [KhachHangController::class, 'quenMatKhau']);
Route::post('/kich-hoat-tai-khoan', [AuthController::class, 'kichHoatTaiKhoan']);

//Chi Tiet Phim
Route::post('/client/chi-tiet-phim/get-data', [ChiTietPhimController::class, 'getDataPhim']);
//Chi Tiet Bài Viết
Route::post('/client/chi-tiet-bai-viet/get-data', [ChiTietBaiVietController::class, 'getDataBaiViet']);
Route::get('/client/dat-ve/{id_suat_chieu}', [VeController::class, 'getAllVe']);
Route::post('/client/ap-voucher', [VoucherController::class, 'apDungVoucher']);

//Dat Ve
Route::middleware('auth:sanctum')->post('/client/dat-ve/thanh-toan', [DonHangController::class, 'thanhToan']);
Route::get('/client/dat-ve/get-Data', [DonHangController::class, 'getData']);
Route::post('/client/dat-ve/delete', [DonHangController::class, 'destroy']);

//client phim
Route::get('/client/phim-dang-chieu', [PhimController::class, 'getData']);
Route::post('/client/get-phim', [DonHangController::class, 'getPhimByDatVe']);


