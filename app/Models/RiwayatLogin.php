<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RiwayatLogin extends Model
{
    protected $table = 'riwayat_login';
    public $timestamps = false;
    protected $fillable = ['user_id', 'waktu_login', 'ip_address', 'role'];
}
