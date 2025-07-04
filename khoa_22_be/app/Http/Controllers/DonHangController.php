<?php

namespace App\Http\Controllers;

use App\Mail\MasterMail;
use App\Models\ChiTietDichVu;
use App\Models\DichVu;
use App\Models\DonHang;
use App\Models\Ve;
use App\Models\Voucher;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;

class DonHangController extends Controller
{
    public function getData(Request $request)
    {
        $data = DonHang::leftjoin('khach_hangs', 'don_hangs.id_khach_hang', '=', 'khach_hangs.id')
                        ->leftjoin('ves','don_hangs.id_khach_hang','ves.id_don_dat_ve')
                        ->leftjoin('suat_chieus','ves.id_don_dat_ve','suat_chieus.id')
                        ->leftjoin('phims','suat_chieus.id_phim','phims.id')
            ->select('don_hangs.*', 'khach_hangs.ho_va_ten as ten_khach_hang', 'phims.ten_phim', 'phims.hinh_anh')
            ->get();

        return response()->json([
            'data' => $data,
        ]);
    }
    public function thanhToan(Request $request)
    {
        $user = Auth::guard('sanctum')->user();
        if (!$user || !($user instanceof \App\Models\KhachHang)) {
            return response()->json([
                'status' => false,
                'message' => 'Bạn chưa đăng nhập',
            ]);
        }
        $data = collect($request->list_ben_phai);

        $list_Ve = $data->where('type', 1)->pluck('id')->all();
        $list_dv = $data->where('type', 2)->pluck('id')->all();

        $ds_ve = Ve::where('id_don_dat_ve', 0)->whereIn('id', $list_Ve)->get();
       
        $c['ds_dv'] = [];
        $tien_dv = 0;
        foreach ($list_dv as $key => $value) {
            $tien_dv = $tien_dv + DichVu::where('id', $value)->first()->gia;
            array_push($c['ds_dv'], DichVu::where('id', $value)->first()); 
        }
            //TÍNH TỔNG TIỀN
        if (count($ds_ve) == count($list_Ve)) {
            $tien_ve = $ds_ve->sum('gia_ve');
            $tong_tien = $tien_ve + $tien_dv;

            // ÁP DỤNG VOUCHER
            $tien_giam_gia = 0;
            $now = Carbon::now();

            $voucher = Voucher::where('ma_code', $request->ma_code)
                ->where('tinh_trang', true)
                ->whereDate('thoi_gian_bat_dau', '<=', $now)
                ->whereDate('thoi_gian_ket_thuc', '>=', $now)
                ->first();

            if ($voucher && $tong_tien >= $voucher->so_tien_toi_da) {
                $tien_giam_gia = $tong_tien * $voucher->so_giam_gia / 100;
                if ($tien_giam_gia > $voucher->so_tien_giam_gia) {
                    $tien_giam_gia = $voucher->so_tien_giam_gia;
                }
            }
            // 
            $don_hang = DonHang::create([
                'id_khach_hang'                  => $user->id,
                'ma_don_hang'                    => 'BINI-' . Carbon::now()->timestamp,
                'ngay_dat'                       => Carbon::now(),
                'tien_thuc_nhan'                 => $tong_tien - $tien_giam_gia,
                'tong_tien'                      => $tong_tien,
                'giam_gia'                       => $tien_giam_gia,
                'is_thanh_toan'                  => 0,
                'id_voucher'                     => $voucher ? $voucher->id : 0
            ]);

            // Sau khi có đơn hàng => $list_Ve đã bán => nó đã có id_don_hang
            Ve::whereIn('id', $list_Ve)->update([
                'id_don_dat_ve' => $don_hang->id
            ]);

            foreach ($list_dv as $key => $value) {
                ChiTietDichVu::create([
                    'id_don_hang'      => $don_hang->id,
                    'id_dich_vu'       => $value,
                    'so_luong'         => 1, // Giả sử mỗi dịch vụ chỉ mua 1 lần
                    'don_gia'          => DichVu::where('id', $value)->first()->gia,
                    'thanh_tien'       => DichVu::where('id', $value)->first()->gia,
                    'ghi_chu'          => '',
                ]);
            }
            $SQL = Ve::join('suat_chieus','ves.id_suat_chieu','=','suat_chieus.id')
                ->join('phims','suat_chieus.id_phim','=','phims.id')
                ->select('phims.ten_phim', 'suat_chieus.ngay_chieu', 'suat_chieus.thoi_gian_bat_dau')
                ->first();
            $a = "Đặt vé thành công";
            $b = "view_3";
            $c['ten_phim']          = $SQL->ten_phim;
            $c['ngay_chieu']        = $SQL->ngay_chieu;
            $c['gio_chieu']         = $SQL->thoi_gian_bat_dau;
            $c['ds_ghe']            = $ds_ve;
            $c['ma_giam_gia']      = $request->ma_code ? $request->ma_code : "NOCODE";
            $c['tien_giam_gia']    = $tien_giam_gia;
            $c['tam_tinh']         = $tong_tien;
            $c['so_tien']          = $c['tam_tinh'] - $c['tien_giam_gia'];
            $c['ma_don_hang']      = $don_hang->ma_don_hang;
            $c['link_qr_code']     = "https://img.vietqr.io/image/TCB-18096868686868-compact.jpg?amount=" . $c['so_tien'] . "&addInfo=" . $c['ma_don_hang'];
            Mail::to("$user->email")->send(new MasterMail($a, $b, $c));
            return response()->json([
                'status' => true,
                'message' => ' Đơn hàng đã được tạo thành công',
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Vé có người mua rồi'
            ]);
        }
    }
    public function xoaDonHang($id_don_dat_ve)
    {
        $check = DonHang::where('id', $id_don_dat_ve)->where('is_thanh_toan', 0)->first();
        if ($check) {
            DonHang::where('id', $id_don_dat_ve)->delete();
            Ve::where('id_don_dat_ve', $id_don_dat_ve)->update([
                'id_don_dat_ve' => 0
            ]);
            ChiTietDichVu::where('id_don_hang', $id_don_dat_ve)->delete();
            return response()->json([
                'status' => true,
                'message' => 'Xóa đơn hàng thành công',
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Không thể xóa đơn hàng đã thanh toán',
            ]);
        }
    }
    public function getPhimByDonHang(Request $request)
    {
        $data = DonHang::join('ves','don_hangs.id', 'ves.id_don_dat_ve')
                        ->join('suat_chieus','ves.id_suat_chieu','suat_chieus.id')
                        ->join('phims','suat_chieus.id_phim','phims.id')
                        ->join('phong_chieus', 'suat_chieus.id_phong_chieu', 'phong_chieus.id')
                        ->where('ma_don_hang', $request->ma_hoa_don)
                        ->select('phims.ten_phim','suat_chieus.ngay_chieu',
                        'suat_chieus.thoi_gian_bat_dau','suat_chieus.thoi_gian_ket_thuc',
                        'phong_chieus.ten_phong','phims.the_loai', 'don_hangs.tong_tien',
                        'don_hangs.tien_thuc_nhan','don_hangs.giam_gia', 'don_hangs.ngay_dat',
                        'don_hangs.ma_don_hang')
                        ->first();

        $ds_ve = DonHang::join('ves','don_hangs.id', 'ves.id_don_dat_ve')
                        ->where('ma_don_hang', $request->ma_hoa_don )
                        ->select('ves.ma_ve','ves.ten_ghe', 'ves.gia_ve')
                        ->get();

        return response()->json([
            'data'  => $data,
            'ds_ve' => $ds_ve
        ]);
    }
    public function getPhimByDatVe(Request $request)
    {
        $data = DB::table('ves')
        ->join('suat_chieus', 'ves.id_suat_chieu', '=', 'suat_chieus.id')
        ->join('phims', 'suat_chieus.id_phim', '=', 'phims.id')
        ->join('phong_chieus', 'suat_chieus.id_phong_chieu', '=', 'phong_chieus.id')
        ->where('suat_chieus.id', $request->id_suat_chieu)
        ->select('phims.*', 'suat_chieus.thoi_gian_bat_dau','suat_chieus.thoi_gian_ket_thuc', 'suat_chieus.ngay_chieu')
        ->first();

    return response()->json([
        'data' => $data
    ]);
    }
}
