<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wilayah_Kerja extends Model
{
    use HasFactory;

    protected $connection = 'mysql';
    protected $table = 'wilayah_kerja';
    public $timestamps = false;

    protected $fillable = [
        'nama_wilker',
    ];
}
