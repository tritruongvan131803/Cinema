<?php

namespace App\Http\Controllers;

use App\Models\KhachHang;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function kichHoatTaiKhoan(Request $request)
    {
        $kh = KhachHang::where('hash_active', $request->key)->first();

        if (!$kh) {
            return response()->json([
                'status' => false,
                'message' => 'Liên kết không hợp lệ hoặc đã hết hạn.'
            ], 404);
        }

        $kh->is_active = 1;
        $kh->hash_active = null; // Không cho dùng lại
        $kh->save();

        return response()->json([
            'status' => true,
            'message' => 'Kích hoạt tài khoản thành công.'
        ]);
    }
}
