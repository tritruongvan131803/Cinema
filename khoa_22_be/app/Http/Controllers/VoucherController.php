<?php

namespace App\Http\Controllers;

use App\Models\Voucher;
use Carbon\Carbon;
use Illuminate\Http\Request;

class VoucherController extends Controller
{
    public function getData()
    {
        $data = Voucher::all();
        return response()->json([
            'status' => true,
            'message' => 'Lấy dữ liệu thành công',
            'data' => $data
        ]);
    }

    public function addData(Request $request)
    {
        Voucher::create([
            'ma_code'               => $request->ma_code,
            'thoi_gian_bat_dau'     => $request->thoi_gian_bat_dau,
            'thoi_gian_ket_thuc'    => $request->thoi_gian_ket_thuc,
            'loai_giam'             => $request->loai_giam,
            'so_giam_gia'           => $request->so_giam_gia,
            'so_tien_toi_da'        => $request->so_tien_toi_da,
            've_toi_thieu'          => $request->ve_toi_thieu,
            'tinh_trang'            => $request->tinh_trang
        ]);
        return response()->json([
            'status' => true,
            'message' => 'Thêm voucher thành công',
        ]);
    }


    public function update(Request $request)
    {
        Voucher::where('id', $request->id)->update([
            'ma_code'               => $request->ma_code,
            'thoi_gian_bat_dau'     => $request->thoi_gian_bat_dau,
            'thoi_gian_ket_thuc'    => $request->thoi_gian_ket_thuc,
            'loai_giam'             => $request->loai_giam,
            'so_giam_gia'           => $request->so_giam_gia,
            'so_tien_toi_da'        => $request->so_tien_toi_da,
            've_toi_thieu'          => $request->ve_toi_thieu,
            'tinh_trang'            => $request->tinh_trang
        ]);


        return response()->json([
            'status' => true,
            'message' => 'Cập nhật voucher thành công',
        ]);
    }

    public function destroy(Request $request)
    {
        Voucher::where('id', $request->id)->delete();
        return response()->json([
            'status' => true,
            'message' => 'Xóa voucher thành công',
        ]);
    }

    public function changeStatus(Request $request)
    {
        $voucher = Voucher::where('id', $request->id)->first();
        $voucher->tinh_trang = !$voucher->tinh_trang;
        $voucher->save();

        return response()->json([
            'status' => true,
            'message' => 'Thay đổi trạng thái voucher thành công',
        ]);
    }
    public function apDungVoucher(Request $request){
        $now = Carbon::now();
        $data = Voucher::where('ma_code', $request->ma_code)
            ->where('tinh_trang', true)
            ->whereDate('thoi_gian_bat_dau', '<=', $now)
            ->whereDate('thoi_gian_ket_thuc', '>=', $now)
            ->first();

        if ($data) {
            return response()->json([
                'status' => true,
                'message' => 'Áp dụng voucher thành công',
                'data' => $data
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Voucher không hợp lệ hoặc đã hết hạn'
            ]);
        }
    }
}
