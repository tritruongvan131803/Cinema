<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class VoucherSeeder extends Seeder
{
    public function run(): void
    {
        $vouchers = [
            [
                'ma_code' => 'WELCOME2024',
                'thoi_gian_bat_dau' => Carbon::now(),
                'thoi_gian_ket_thuc' => Carbon::now()->addMonths(1),
                'so_giam_gia' => 20, // 20%
                'so_tien_toi_da' => 100_000,
                'so_tien_giam_gia' => 25_000,
                'tinh_trang' => 1, // 1: Hoạt động
            ],
            [
                'ma_code' => 'MEMBER50K',
                'thoi_gian_bat_dau' => Carbon::now(),
                'thoi_gian_ket_thuc' => Carbon::now()->addMonths(2),
                'so_giam_gia' => 50, // 50%
                'so_tien_toi_da' => 50_000,
                'so_tien_giam_gia' => 15_000,
                'tinh_trang' => 1,
            ],
            [
                'ma_code' => 'COMBO30',
                'thoi_gian_bat_dau' => Carbon::now(),
                'thoi_gian_ket_thuc' => Carbon::now()->addWeeks(2),
                'so_giam_gia' => 30, // 30%
                'so_tien_toi_da' => 50_000,
                'so_tien_giam_gia' => 25_000,
                'tinh_trang' => 1,
            ],
        ];
        DB::table('vouchers')->truncate();
        DB::table('vouchers')->delete();
        DB::table('vouchers')->insert($vouchers);
    }
}
