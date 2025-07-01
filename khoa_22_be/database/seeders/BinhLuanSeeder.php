<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BinhLuanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $binh_luan = [
            [
                'id_khach_hang'     => 1,
                'id_phim'           => 3,
                'noi_dung'          => 'Mình rất ấn tượng với kỹ xảo trong phim này.',
            ],
            [
                'id_khach_hang' => 3,
                'id_phim' => 7,
                'noi_dung' => 'Phim rất hay, nội dung hấp dẫn và diễn xuất tốt!',
            ],
            [
                'id_khach_hang' => 5,
                'id_phim' => 2,
                'noi_dung' => 'Âm thanh sống động, hình ảnh mãn nhãn.',
            ],
            [
                'id_khach_hang' => 1,
                'id_phim' => 10,
                'noi_dung' => 'Một bộ phim đầy cảm xúc, xem mà rơi nước mắt.',
            ],
            [
                'id_khach_hang' => 6,
                'id_phim' => 4,
                'noi_dung' => 'Cốt truyện rất mới lạ, không bị nhàm chán.',
            ],
            [
                'id_khach_hang' => 2,
                'id_phim' => 1,
                'noi_dung' => 'Diễn xuất tự nhiên, cảm giác rất thật.',
            ],
            [
                'id_khach_hang' => 4,
                'id_phim' => 9,
                'noi_dung' => 'Phim hơi dài nhưng kết thúc rất mãn nguyện.',
            ],
            [
                'id_khach_hang' => 7,
                'id_phim' => 5,
                'noi_dung' => 'Phim giải trí ổn, phù hợp xem cuối tuần.',
            ],
            [
                'id_khach_hang' => 2,
                'id_phim' => 6,
                'noi_dung' => 'Tình tiết lôi cuốn, không thể rời mắt.',
            ],
            [
                'id_khach_hang' => 1,
                'id_phim' => 11,
                'noi_dung' => 'Hài hước, duyên dáng và ý nghĩa.',
            ],
            [
                'id_khach_hang' => 5,
                'id_phim' => 3,
                'noi_dung' => 'Một bộ phim xuất sắc từ đầu đến cuối!',
            ],
            [
                'id_khach_hang' => 3,
                'id_phim' => 8,
                'noi_dung' => 'Nội dung sáng tạo, rất đáng để xem thử.',
            ],
            [
                'id_khach_hang' => 6,
                'id_phim' => 11,
                'noi_dung' => 'Phim này mang lại cảm giác mới mẻ.',
            ],
            [
                'id_khach_hang' => 4,
                'id_phim' => 6,
                'noi_dung' => 'Tình tiết hơi nhanh nhưng vẫn dễ hiểu.',
            ],
            [
                'id_khach_hang' => 2,
                'id_phim' => 3,
                'noi_dung' => 'Xem đi xem lại vẫn thấy cuốn hút.',
            ],
            [
                'id_khach_hang' => 7,
                'id_phim' => 8,
                'noi_dung' => 'Phim mang thông điệp nhân văn sâu sắc.',
            ],
            [
                'id_khach_hang' => 5,
                'id_phim' => 1,
                'noi_dung' => 'Hơi khó hiểu ở đoạn giữa phim.',
            ],
            [
                'id_khach_hang' => 1,
                'id_phim' => 4,
                'noi_dung' => 'Một tác phẩm điện ảnh đáng nhớ!',
            ],
            [
                'id_khach_hang' => 2,
                'id_phim' => 5,
                'noi_dung' => 'Mình cười suốt từ đầu đến cuối.',
            ],
            [
                'id_khach_hang' => 6,
                'id_phim' => 10,
                'noi_dung' => 'Không khí trong phim rất ấm áp và gần gũi.',
            ],
            [
                'id_khach_hang' => 3,
                'id_phim' => 2,
                'noi_dung' => 'Một trải nghiệm điện ảnh rất thú vị.',
            ],
        ];

        DB::table('binh_luans')->truncate();
        DB::table('binh_luans')->delete();
        DB::table('binh_luans')->insert($binh_luan);
    }
}
