<?php

namespace Tests\Unit;

use App\Models\Data_Integrasi;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class Data_Integrasi_Test extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_create_a_data_integrasi_test()
    {
        // Arrange
        $data = [
            'lob' => 'Unit Testing LOB',
            'penyebab_klaim' => 'Macet',
            'periode' => '2024-01-01',
            'nilai_beban_klaim' => 1234567,
        ];

        // Act
        $data_integrasi = Data_Integrasi::create($data);

        // Assert
        $this->assertInstanceOf(Data_Integrasi::class, $data_integrasi);
        $this->assertEquals('Unit Testing LOB', $data_integrasi->sub_cob);
        $this->assertEquals('Macet', $data_integrasi->penyebab_klaim);
        $this->assertEquals('024-01-01', $data_integrasi->periode);
        $this->assertEquals(1234567, $data_integrasi->nilai_beban_klaim);
        $this->assertTrue(true);
    }
}
