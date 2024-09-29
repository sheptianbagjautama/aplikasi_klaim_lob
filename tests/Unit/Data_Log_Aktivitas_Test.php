<?php

namespace Tests\Unit;

use App\Models\Data_Log_Aktivitas;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class Data_Log_Aktivitas_Test extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_create_a_data_log_aktivitas_test()
    {
        // Arrange
        $data = [
            'tanggal_pengiriman' => '2024-09-01',
            'jumlah_data' => 100,
            'status_pengiriman' => 'SUKSES',
        ];

        // Act
        $data_log_aktivitas = Data_Log_Aktivitas::create($data);

        // Assert
        $this->assertInstanceOf(Data_Log_Aktivitas::class, $data_log_aktivitas);
        $this->assertEquals('2024-09-01', $data_log_aktivitas->tanggal_pengiriman);
        $this->assertEquals(100, $data_log_aktivitas->jumlah_data);
        $this->assertEquals('SUKSES', $data_log_aktivitas->status_pengiriman);
        $this->assertTrue(true);
    }
}
