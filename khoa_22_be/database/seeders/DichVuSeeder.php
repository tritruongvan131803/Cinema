<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DichVuSeeder extends Seeder
{
    public function run(): void
    {
        $dichVu = [
            [
                'ten_dich_vu' => 'Bắp rang',
                'mo_ta' => 'Bắp rang bơ tươi, giòn ngon',
                'gia' => 45000,
                'tinh_trang' => 1,
                'hinh_anh'  => 'https://i.pinimg.com/736x/53/4f/c0/534fc0f803e3691c3171f0c736fbef34.jpg',
            ],
            [
                'ten_dich_vu' => 'Nước ngọt',
                'mo_ta' => 'Coca Cola, Pepsi, Sprite, Fanta',
                'gia' => 25000,
                'tinh_trang' => 1,
                 'hinh_anh'  => 'https://product.hstatic.net/200000709999/product/soda_ab24e4c5b5704e31bc2c510e7bb58c24_1024x1024.png',
            ],
            [
                'ten_dich_vu' => 'Combo 1',
                'mo_ta' => '1 bắp rang + 1 nước ngọt',
                'gia' => 65000,
                'tinh_trang' => 1,
                 'hinh_anh'  => 'https://cellphones.com.vn/sforum/wp-content/uploads/2023/07/gia-bap-nuoc-cgv-1.jpg',
            ],
            [
                'ten_dich_vu' => 'Combo 2',
                'mo_ta' => '1 bắp rang + 2 nước ngọt',
                'gia' => 85000,
                'tinh_trang' => 1,
                 'hinh_anh'  => 'https://cdn2.fptshop.com.vn/unsafe/1920x0/filters:format(webp):quality(75)/2023_11_6_638348793945260765_gia-bap-nuoc-cgv-2023-la-bao-nhieu-nhung-uu-dai-combo-moi-nhat-hien-nay-la-gi-7.jpg',
            ],
            [
                'ten_dich_vu' => 'Snack',
                'mo_ta' => 'Các loại snack đóng gói',
                'gia' => 20000,
                'tinh_trang' => 1,
                'hinh_anh'  => 'https://product.hstatic.net/200000495609/product/nack-bap-4x-oishi-vi-bap-nuong-bo-goi-lon-68g-banh-keo-an-vat-imnuts-2_e1f4ff30ec6f4a4786f23d4718fab299_master.jpg',
            ],
        ];
        DB::table('dich_vus')->truncate();
        DB::table('dich_vus')->delete();
        DB::table('dich_vus')->insert($dichVu);
    }
}
