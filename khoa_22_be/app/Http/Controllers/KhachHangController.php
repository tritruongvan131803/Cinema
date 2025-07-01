<?php

namespace App\Http\Controllers;

use App\Mail\MasterMail;
use App\Models\KhachHang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class KhachHangController extends Controller
{
    public function getData()
    {
        $data = KhachHang::all();
        return response()->json([
            'data' => $data
        ]);
    }

    public function addData(Request $request)
    {
        KhachHang::create([
            'ho_va_ten'     => $request->ho_va_ten,
            'email'         => $request->email,
            'so_dien_thoai' => $request->so_dien_thoai,
            'password'      => '123456',
            'cccd'          => $request->cccd,
            'ngay_sinh'     => $request->ngay_sinh,
            'is_block'      => 0,
        ]);
        return response()->json([
            'status' => true,
            'message' => 'Thêm khách hàng ' . $request->ho_va_ten . ' thành công',
        ]);
    }

    public function update(Request $request)
    {
        KhachHang::where('id', $request->id)->update([
            'ho_va_ten'     => $request->ho_va_ten,
            'email'         => $request->email,
            'so_dien_thoai' => $request->so_dien_thoai,
            'password'      => $request->password,
            'cccd'          => $request->cccd,
            'ngay_sinh'     => $request->ngay_sinh,
            'is_block'      => $request->is_block,
        ]);
        return response()->json([
            'status' => true,
            'message' => 'Cập nhật khách hàng ' . $request->ho_va_ten . ' thành công',
        ]);
    }

    public function destroy(Request $request)
    {
        KhachHang::where('id', $request->id)->delete();
        return response()->json([
            'status' => true,
            'message' => 'Xóa khách hàng thành công',
        ]);
    }

    public function changeStatus(Request $request)
    {
        $nhan_vien = KhachHang::where('id', $request->id)->first();
        $nhan_vien->is_block = !$nhan_vien->is_block;
        $nhan_vien->save();

        return response()->json([
            'status' => true,
            'message' => 'Thay đổi trạng thái thành công',
        ]);
    }
    public function dangNhap(Request $request){
        $check = KhachHang::where('email',$request->email)
                        ->where('password',$request->password)
                        ->first();
        if($check){
            return response()->json([
                'status'=>1,
                'message'=>"Dang nhap thanh cong",
                'token'=>$check->createToken('token_client')->plainTextToken,
            ]);
        }
        else{
            return response()->json([
                'status'=>0,
                'message'=>"Tai khoan khong hop le"
            ]);
        }
    }

    public function checkKhachHang(Request $request){
        $user = Auth::guard('sanctum')->user();
        if($user){
            return response()->json([
                'status'=>true,
                'ho_ten'=>$user->ho_va_ten,
            ]);
        }
        else{
            return response()->json([
                'status'=>false,
                'message'=>"Ban khong du quyen truy cap vao trang nay"
            ]);
        }
    }
    public function dangKy(Request $request)
    {
        $key = Str::uuid();
        KhachHang::create([
            'ho_va_ten'     => $request->ho_va_ten,
            'email'         => $request->email,
            'so_dien_thoai' => $request->so_dien_thoai,
            'password'      => $request->password,
            'cccd'          => $request->cccd,
            'ngay_sinh'     => $request->ngay_sinh,
            'is_block'      => 0,
            'is_active'    => 0, // Chưa kích hoạt tài khoản
            'hash_active'   => $key
        ]);
        
        $a = "Thông báo";
        $b = "view_1";
        $c['ho_va_ten'] = $request->ho_va_ten;
        $c['link']      = "http://localhost:5173/client/kich-hoat/" . $key;
        Mail::to("tritruongvan189@gmail.com")->send(new MasterMail($a, $b, $c));
        
        return response()->json([
            'status' => true,
            'message' => 'Đăng ký thành công, vui lòng kiểm tra email để kích hoạt tài khoản.',
        ]);
    }
    public function quenMatKhau(Request $request){
        $user = KhachHang::where('email', $request->email)->first();
        if ($user) {
            $key = Str::uuid();
            $a = "Thay đổi mật khẩu";
            $b = "view_2";
            $c['ho_va_ten'] = $user->ho_va_ten;
            $c['link']      = "http://localhost:5173/client/doi-mat-khau/" . $key; //gửi mã key
            $user->hash_reset = $key;
            $user->save(); // lưu mã key
            Mail::to("$request->email")->send(new MasterMail($a, $b, $c)); //gửi mã key đến email
            return response()->json([
                'status' => true,
                'message' => 'Vui lòng kiểm tra email để thay đổi mật khẩu.',
            ]);
        }
        else {
            return response()->json([
                'status' => false,
                'message' => 'Email không tồn tại trong hệ thống.',
            ]);
        }
    }
}
