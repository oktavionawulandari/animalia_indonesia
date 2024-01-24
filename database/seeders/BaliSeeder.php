<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Regency;
use App\Models\SubDistrict;

class BaliSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $regencies = [
            ['name' => 'Badung'],
            ['name' => 'Denpasar'],
            ['name' => 'Gianyar'],
            ['name' => 'Bangli'],
            ['name' => 'Tabanan'],
            ['name' => 'Klungkung'],
            ['name' => 'Karangasem'],
            ['name' => 'Buleleng'],
            ['name' => 'Jembrana'],
            // Tambahkan regencies lainnya
        ];

        foreach ($regencies as $regencyData) {
            Regency::create($regencyData);
        }

        // Menambahkan data sub_districts
        $subDistricts = [
            ['regency_name' => 'Badung', 'name' => 'Kuta'],
            ['regency_name' => 'Badung', 'name' => 'Kuta Selatan'],
            ['regency_name' => 'Badung', 'name' => 'Kuta Utara'],
            ['regency_name' => 'Badung', 'name' => 'Mengwi'],
            ['regency_name' => 'Badung', 'name' => 'Abiansemal'],
            ['regency_name' => 'Badung', 'name' => 'Petang'],
            ['regency_name' => 'Denpasar', 'name' => 'Denpasar Barat'],
            ['regency_name' => 'Denpasar', 'name' => 'Denpasar Selatan'],
            ['regency_name' => 'Denpasar', 'name' => 'Denpasar Timur'],
            ['regency_name' => 'Denpasar', 'name' => 'Denpasar Utara'],
            ['regency_name' => 'Gianyar', 'name' => 'Blahbatuh'],
            ['regency_name' => 'Gianyar', 'name' => 'Gianyar'],
            ['regency_name' => 'Gianyar', 'name' => 'Payangan'],
            ['regency_name' => 'Gianyar', 'name' => 'Sukawati'],
            ['regency_name' => 'Gianyar', 'name' => 'Tampaksiring'],
            ['regency_name' => 'Gianyar', 'name' => 'Tegallalang'],
            ['regency_name' => 'Gianyar', 'name' => 'Ubud'],
            ['regency_name' => 'Bangli', 'name' => 'Bangli'],
            ['regency_name' => 'Bangli', 'name' => 'Kintamani'],
            ['regency_name' => 'Bangli', 'name' => 'Susut'],
            ['regency_name' => 'Bangli', 'name' => 'Tembuku'],
            ['regency_name' => 'Tabanan', 'name' => 'Baturiti'],
            ['regency_name' => 'Tabanan', 'name' => 'Kediri'],
            ['regency_name' => 'Tabanan', 'name' => 'Kerambitan'],
            ['regency_name' => 'Tabanan', 'name' => 'Marga'],
            ['regency_name' => 'Tabanan', 'name' => 'Penebel'],
            ['regency_name' => 'Tabanan', 'name' => 'Pupuan'],
            ['regency_name' => 'Tabanan', 'name' => 'Selemadeg'],
            ['regency_name' => 'Tabanan', 'name' => 'Selemadeg Barat'],
            ['regency_name' => 'Tabanan', 'name' => 'Selemadeg Timur'],
            ['regency_name' => 'Klungkung', 'name' => 'Banjarangkan'],
            ['regency_name' => 'Klungkung', 'name' => 'Dawan'],
            ['regency_name' => 'Klungkung', 'name' => 'Klungkung'],
            ['regency_name' => 'Klungkung', 'name' => 'Nusa Penida'],
            ['regency_name' => 'Karangasem', 'name' => 'Abang'],
            ['regency_name' => 'Karangasem', 'name' => 'Bebandem'],
            ['regency_name' => 'Karangasem', 'name' => 'Karangasem'],
            ['regency_name' => 'Karangasem', 'name' => 'Kubu'],
            ['regency_name' => 'Karangasem', 'name' => 'Manggis'],
            ['regency_name' => 'Karangasem', 'name' => 'Rendang'],
            ['regency_name' => 'Karangasem', 'name' => 'Selat'],
            ['regency_name' => 'Karangasem', 'name' => 'Sidemen'],
            ['regency_name' => 'Karangasem', 'name' => 'Kubu'],
            ['regency_name' => 'Buleleng', 'name' => 'Banjar'],
            ['regency_name' => 'Buleleng', 'name' => 'Buleleng'],
            ['regency_name' => 'Buleleng', 'name' => 'Busung Biu'],
            ['regency_name' => 'Buleleng', 'name' => 'Gerokgak'],
            ['regency_name' => 'Buleleng', 'name' => 'Kubutambahan'],
            ['regency_name' => 'Buleleng', 'name' => 'Sawan'],
            ['regency_name' => 'Buleleng', 'name' => 'Seririt'],
            ['regency_name' => 'Buleleng', 'name' => 'Sukasada'],
            ['regency_name' => 'Buleleng', 'name' => 'Tejakula'],
            ['regency_name' => 'Jembrana', 'name' => 'Jembrana'],
            ['regency_name' => 'Jembrana', 'name' => 'Melaya'],
            ['regency_name' => 'Jembrana', 'name' => 'Mendoyo'],
            ['regency_name' => 'Jembrana', 'name' => 'Negara'],
            ['regency_name' => 'Jembrana', 'name' => 'Pekutatan'],
            // Tambahkan sub_districts lainnya
        ];

        foreach ($subDistricts as $subDistrictData) {
            $regency = Regency::where('name', $subDistrictData['regency_name'])->first();
            SubDistrict::create([
                'regency_id' => $regency->id,
                'name' => $subDistrictData['name'],
            ]);
        }
    }
}
