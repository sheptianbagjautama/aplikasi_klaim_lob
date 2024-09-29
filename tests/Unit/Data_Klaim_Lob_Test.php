<?php

namespace Tests\Unit;

use App\Models\Data_Klaim_Lob;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class Data_Klaim_Lob_Test extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_create_a_data_klaim_test()
    {
        // Arrange
        $data = [
            'sub_cob' => 'Unit Testing KBG dan Suretyship',
            'penyebab_klaim' => 'Macet',
            'periode' => '2023-01-31',
            'wilayah_kerja_id' => 5,
            'tgl_keputusan_klaim' => '2023-02-01',
            'jumlah_terjamin' => 1,
            'nilai_beban_klaim' => 1234567,
            'debet_kredit' => 1,
        ];

        // Act
        $data_klaim_lob = Data_Klaim_Lob::create($data);

        // Assert
        $this->assertInstanceOf(Data_Klaim_Lob::class, $data_klaim_lob);
        $this->assertEquals('Unit Testing KBG dan Suretyship', $data_klaim_lob->sub_cob);
        $this->assertEquals('Macet', $data_klaim_lob->penyebab_klaim);
        $this->assertEquals('2023-01-31', $data_klaim_lob->periode);
        $this->assertEquals(5, $data_klaim_lob->wilayah_kerja_id);
        $this->assertEquals('2023-02-01', $data_klaim_lob->tgl_keputusan_klaim);
        $this->assertEquals(1, $data_klaim_lob->jumlah_terjamin);
        $this->assertEquals(1234567, $data_klaim_lob->nilai_beban_klaim);
        $this->assertEquals(1, $data_klaim_lob->debet_kredit);
        $this->assertTrue(true);
    }
}
