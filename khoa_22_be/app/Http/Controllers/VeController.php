<?php

namespace App\Http\Controllers;

use App\Models\SuatChieu;
use App\Models\Ve;
use Illuminate\Http\Request;

class VeController extends Controller
{
    public function getData()
    {
        $ve = Ve::join('suat_chieus', 'suat_chieus.id', 'ves.id_suat_chieu')
            ->join('phims', 'phims.id', 'suat_chieus.id_phim')
            ->join('phong_chieus', 'phong_chieus.id', 'suat_chieus.id_phong_chieu')
            ->select('ves.*', 'phims.ten_phim', 'phong_chieus.ten_phong', 'suat_chieus.thoi_gian_bat_dau', 'suat_chieus.ngay_chieu')
            ->get();
        return response()->json([
            'data' => $ve
        ]);
    }

    public function addData(Request $request)
    {
        Ve::create([
            'ma_ve'             => $request->ma_ve,
            'gia_ve'            => $request->gia_ve,
            'id_don_dat_ve'     => $request->id_don_dat_ve,
            'id_suat_chieu'     => $request->id_suat_chieu,
            'ten_ghe'           => $request->ten_ghe,
            'tinh_trang'        => $request->tinh_trang
        ]);

        return response()->json([
            'status' => true,
            'message' => 'Thêm vé thành công',
        ]);
    }

    public function update(Request $request)
    {
        Ve::where('id', $request->id)->update([
            'ma_ve'             => $request->ma_ve,
            'gia_ve'            => $request->gia_ve,
            'id_don_dat_ve'     => $request->id_don_dat_ve,
            'id_suat_chieu'     => $request->id_suat_chieu,
            'ten_ghe'           => $request->ten_ghe,
            'tinh_trang'        => $request->tinh_trang
        ]);

        return response()->json([
            'status' => true,
            'message' => 'Cập nhật vé thành công',
        ]);
    }

    public function destroy(Request $request)
    {
        Ve::where('id', $request->id)->delete();

        return response()->json([
            'status' => true,
            'message' => 'Xóa vé thành công',
        ]);
    }

    public function changeStatus(Request $request)
    {
        $ve = Ve::where('id', $request->id)->first();

        if ($ve->tinh_trang == Ve::CHUA_THANH_TOAN)
            $ve->tinh_trang = Ve::DA_THANH_TOAN;
        else if ($ve->tinh_trang == Ve::DA_THANH_TOAN)
            $ve->tinh_trang = Ve::DA_HUY;
        else {
            $ve->tinh_trang = Ve::CHUA_THANH_TOAN;
        }
        $ve->save();

        return response()->json([
            'status' => true,
            'message' => 'Thay đổi trạng thái vé thành công',
        ]);
    }
    public function getAllVe($id_suat_chieu)
    {
        $data = Ve::where('id_suat_chieu', $id_suat_chieu)->get();
        $phong_chieu = SuatChieu::where('suat_chieus.id',$id_suat_chieu)->join('phong_chieus','suat_chieus.id_phong_chieu','phong_chieus.id')
                                ->first();
        if (count($data) > 0) {
            return response()->json([
                'status'        => true,
                'data'          => $data,
                'hang_ngang'    => $phong_chieu->hang_ngang
            ]);
        } else {
            return response()->json([
                'status'    => false,
                'message'      => "phim có đâu mà mua"
            ]);
        }
    }
}
