<?php

namespace App\Http\Controllers;

use App\Models\Data_Integrasi;
use App\Models\Data_Klaim_Lob;
use App\Models\Data_Log_Aktivitas;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class IndexController extends Controller
{
    public function index()
    {
        $LOBS = Data_Klaim_Lob::select('sub_cob')->groupBy('sub_cob')->get();
        $summary_LOBS = Data_Klaim_Lob::select(
            'sub_cob',
            'penyebab_klaim',
            DB::raw('SUM(jumlah_terjamin) as jumlah_nasabah'),
            DB::raw('SUM(nilai_beban_klaim) as beban_claim')
        )->groupBy('sub_cob', 'penyebab_klaim')->get();

        $datas = [];

        foreach ($LOBS as $key_LOB => $LOB) {
            $total_nasabah = 0;
            $total_beban_klaim = 0;

            foreach ($summary_LOBS as $key_summary_LOBS => $summary_LOB) {
                if ($summary_LOB['sub_cob'] == $LOB['sub_cob']) {
                    array_push($datas, $summary_LOB);

                    $total_nasabah += $summary_LOB['jumlah_nasabah'];
                    $total_beban_klaim += $summary_LOB['beban_claim'];
                }
            }

            $summary =  (object) [
                'sub_cob' => "Subtotal " . $LOB['sub_cob'],
                'penyebab_klaim' => '',
                'jumlah_nasabah' => $total_nasabah,
                'beban_claim' => $total_beban_klaim,
            ];

            array_push($datas, $summary);
        }

        return view('index', ['datas' => $datas]);
    }

    public function kirimClainPenampungan(Request $request)
    {
        $LOBS = Data_Klaim_Lob::whereIn('sub_cob', array("KUR", "PEN"))->get();

        try {
            //Mengirimkan data klaim ke table Data_Integrasi di database kedua
            Data_Integrasi::insert(
                $LOBS->map(function ($item) {
                    $data['lob'] = $item['sub_cob'];
                    $data['penyebab_klaim'] = $item['penyebab_klaim'];
                    $data['periode'] = $item['periode'];
                    $data['nilai_beban_klaim'] = $item['nilai_beban_klaim'];
                    return $data;
                })->toArray()
            );

            //Simpan Log Aktivitas ketika proses pengiriman data klaim berhasil
            Data_Log_Aktivitas::create([
                'tanggal_pengiriman' => Carbon::now(),
                'jumlah_data' => $LOBS->count(),
                'status_pengiriman' => "SUKSES"
            ]);

            return response()->json([
                'message' => 'Berhasil mengirimkan data klaim ke database penampungan sebanyak ' . $LOBS->count(),
                'is_error' => false
            ]);
        } catch (Exception $e) {
            //Simpan Log Aktivitas ketika proses pengiriman data gagal
            Data_Log_Aktivitas::create([
                'tanggal_pengiriman' => Carbon::now(),
                'jumlah_data' => $LOBS->count(),
                'status_pengiriman' => "GAGAL"
            ]);

            return response()->json([
                'message' => $e->getMessage(),
                'is_error' => true
            ], 500);
        }
    }
}
