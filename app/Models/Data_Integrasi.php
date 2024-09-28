<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Data_Integrasi extends Model
{
    use HasFactory;

    protected $connection = 'mysql2';
    protected $table = 'Data_Integrasi';
    public $timestamps = false;

    protected $fillable = [
        'lob',
        'penyebab_klaim',
        'periode',
        'nilai_beban_klaim',
    ];
}
