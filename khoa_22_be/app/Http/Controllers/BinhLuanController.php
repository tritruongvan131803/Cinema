<?php

namespace App\Http\Controllers;

use App\Models\BinhLuan;
use Illuminate\Http\Request;

class BinhLuanController extends Controller
{
    public function getData(){
        $data = BinhLuan::get();

        return response()->json([
            'data'=> $data
        ]);
    }
}
