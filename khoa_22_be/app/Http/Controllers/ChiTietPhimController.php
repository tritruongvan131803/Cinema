<?php

namespace App\Http\Controllers;

use App\Models\Phim;
use Illuminate\Http\Request;

class ChiTietPhimController extends Controller
{
    public function getDataPhim(Request $request)
    {
        $data = Phim::where('id', $request->id)->first();
        if ($data) {
            return response()->json([
                'status'     =>  true,
                'data'       =>  $data
            ]);
        }
        return response()->json([
            'status'     =>  false,
            'message'    =>  "Không tồn tại phim này!!!"
        ]);
    }
}
