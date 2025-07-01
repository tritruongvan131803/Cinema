<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class KhachHangSeeder extends Seeder
{
    public function run(): void
    {
        $khachHang = [
            [
                'ho_va_ten' => 'Phạm Thị Dung',
                'email' => 'dung.pham@gmail.com',
                'so_dien_thoai' => '0934567890',
                'password' => '123456',
                'ngay_sinh' => '1998-03-25',
                'avatar'    => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTbs2v0uFR7wdi4pE7aPfJVWYqTYA6TCsjGzw&s'
            ],
            [
                'ho_va_ten' => 'Nguyễn Văn A',
                'email' => 'nguyenvan.a@gmail.com',
                'so_dien_thoai' => '0912345678',
                'password' => Hash::make('123456'),
                'ngay_sinh' => '1998-03-25',
                'avatar'    => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTbs2v0uFR7wdi4pE7aPfJVWYqTYA6TCsjGzw&s'
            ],
            [
                'ho_va_ten' => 'Trần Thị B',
                'email' => 'tranthi.b@gmail.com',
                'so_dien_thoai' => '0945678901',
                'password' => Hash::make('123456'),
                'ngay_sinh' => '1998-03-25',
                'avatar'    => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQqHjzlT06c9-tkO9H8bQhNzDu67GadK6o21Q&s'
            ],
            [
                'ho_va_ten' => 'Lê Văn C',
                'email' => 'levan.c@gmail.com',
                'so_dien_thoai' => '0912345678',
                'password' => Hash::make('123456'),
                'ngay_sinh' => '1998-03-25',
                'avatar'    => 'https://jbagy.me/wp-content/uploads/2025/03/Hinh-anh-avatar-chibi-gau-truc-2.jpg'
            ],
            [
                'ho_va_ten' => 'Nguyễn Thị D',
                'email' => 'nguyenthi.d@gmail.com',
                'so_dien_thoai' => '0987654321',
                'password' => Hash::make('123456'),
                'ngay_sinh' => '1997-06-15',
                'avatar' => 'https://img.tripi.vn/cdn-cgi/image/width=700,height=700/https://gcs.tripi.vn/public-tripi/tripi-feed/img/474082XUL/avatar-bua-hai-huoc-va-bua-nhat_044337182.jpg'
            ],
            [
                'ho_va_ten' => 'Trần Minh E',
                'email' => 'tranminh.e@gmail.com',
                'so_dien_thoai' => '0901234567',
                'password' => Hash::make('123456'),
                'ngay_sinh' => '1995-11-08',
                'avatar' => 'https://live.staticflickr.com/4029/35667852906_6ffb006961_m.jpg'
            ],
            [
                'ho_va_ten' => 'Phạm Quỳnh F',
                'email' => 'phamquynh.f@gmail.com',
                'so_dien_thoai' => '0934567890',
                'password' => Hash::make('123456'),
                'ngay_sinh' => '2000-01-30',
                'avatar' => 'https://tophinhanh.net/wp-content/uploads/2024/01/avatar-maruko-cute-2.jpg'
            ],
        ];
        DB::table('khach_hangs')->truncate();
        DB::table('khach_hangs')->delete();
        DB::table('khach_hangs')->insert($khachHang);
    }
}
