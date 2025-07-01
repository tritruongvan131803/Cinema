<?php

namespace App\Http\Controllers;

use App\Mail\MasterMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class TestController extends Controller
{
    public function testMail()
    {
        $a = "Đơn hàng thành công";
        $b = "view_4";
        $c['ho_va_ten']         = "Trương Văn Trí";
        $c['ma_don_hang']       = "BINI123456";
        $c['ten_phim']          = "Lật mặt 6: Tấm vé định mệnh";
        $c['suat_chieu']       = "2023-10-15 19:00:00";
        $c['thoi_gian_giao_dich'] = 10;
        $c['ds_ghe']            = collect([
            (object)['ten_ghe' => 'A13','loai_ghe' => 'Ghế VIP', 'gia_ve' => '300000'],
            (object)['ten_ghe' => 'A14', 'loai_ghe' => 'Ghế VIP', 'gia_ve' => '300000'],
            (object)['ten_ghe' => 'B12', 'loai_ghe' => 'Thường', 'gia_ve' => '300000'],
        ]);
        $c['ds_dv']            = collect([
            (object)['ten_dv' => 'Nước ngọt','mo_ta' => 'Nước ngọt lạnh', 'gia_ve' => '20000'],
            (object)['ten_dv' => 'Bỏng ngô', 'mo_ta' => 'Bỏng ngô bơ', 'gia_ve' => '30000'],
            (object)['ten_dv' => 'Snack', 'mo_ta' => 'Snack khoai tây', 'gia_ve' => '25000'],
        ]);
        $c['phuong_thuc_thanh_toan'] = "Chuyển khoản";
        $c['ma_giao_dich']    = "TCB-18096868686868";
        $c['ma_giam_gia']      = "Giamgia123";
        $c['tien_giam_gia']    = "50000";
        $c['tam_tinh']         = "250000";
        $c['so_tien']          = $c['tam_tinh'] - $c['tien_giam_gia'];
      
        $c['link_qr_code']     = "https://img.vietqr.io/image/TCB-18096868686868-compact.jpg?amount=". $c['so_tien'] ."&addInfo=".$c['ma_don_hang'];
        Mail::to("tritruongvan189@gmail.com")->send(new MasterMail($a, $b, $c));
    }
}
