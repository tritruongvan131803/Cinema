<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class KhachHang extends Authenticatable
{
    use HasFactory, HasApiTokens, Notifiable;
    
    protected $table = 'khach_hangs';

    protected $fillable = [
        'ho_va_ten',
        'email',
        'so_dien_thoai',
        'password',
        'cccd',
        'ngay_sinh',
        'avatar',
        'hash_reset',
        'hash_active',
        'is_active',
        'is_block',
    ];

}
