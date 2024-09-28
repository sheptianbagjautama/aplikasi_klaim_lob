<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Data_Log_Aktivitas extends Model
{
    use HasFactory;

    protected $connection = 'mysql2';
    protected $table = 'Data_Log_Aktivitas';
    public $timestamps = false;

    protected $fillable = [
        'tanggal_pengiriman',
        'jumlah_data',
        'status_pengiriman',
    ];
}
