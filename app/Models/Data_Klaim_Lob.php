<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Data_Klaim_Lob extends Model
{
    use HasFactory;

    protected $connection = 'mysql';
    protected $table = 'Data_Klaim_Lob';
    // protected $primaryKey = 'id_klaim_lob';
    public $timestamps = false;

    protected $fillable = [
        'sub_cob',
        'penyebab_klaim',
        'periode',
        'wilayah_kerja_id',
        'tgl_keputusan_klaim',
        'jumlah_terjamin',
        'nilai_beban_klaim',
        'debet_kredit',
    ];
}
