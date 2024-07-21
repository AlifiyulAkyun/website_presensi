// database/seeders/MataKuliahSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MataKuliah;

class MataKuliahSeeder extends Seeder
{
    public function run()
    {
        $mataKuliahs = [
            ['kode' => 'MK001', 'nama' => 'Web Dasar', 'sks' => 3, 'semester' => 1, 'jadwal' => 'Senin 08:00 - 10:00'],
            ['kode' => 'MK002', 'nama' => 'Pemrograman Web', 'sks' => 4, 'semester' => 2, 'jadwal' => 'Rabu 10:00 - 12:00'],
            ['kode' => 'MK003', 'nama' => 'Basis Data', 'sks' => 3, 'semester' => 2, 'jadwal' => 'Jumat 08:00 - 10:00'],
            ['kode' => 'MK004', 'nama' => 'Bahasa Inggris', 'sks' => 2, 'semester' => 1, 'jadwal' => 'Kamis 10:00 - 12:00'],
        ];

        foreach ($mataKuliahs as $mataKuliah) {
            MataKuliah::create($mataKuliah);
        }
    }
}
