<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kos;

class KosSeeder extends Seeder
{
    public function run()
    {
        Kos::create([
            'name' => 'M&S Stay Syariah Kost Eksklusif',
            'address' => 'Sleman',
            'typekost' => 'ekslusif',
            'price' => 1500000,
            'facilities' => 'AC, Wifi',
            'link' => 'https://shorturl.at/mA5sG',
        ]);

        Kos::create([
            'name' => 'Kost Putra Selatan Pasar Sleman',
            'address' => 'Sleman',
            'typekost' => 'putra',
            'price' => 1000000,
            'facilities' => 'Kamar Mandi Dalam, Wifi',
            'link' => 'https://shorturl.at/x7b8Q',
        ]);

        Kos::create([
            'name' => 'Kost Yani',
            'address' => 'Bantul',
            'typekost' => 'putra',
            'price' => 1000000,
            'facilities' => 'Kamar Mandi Dalam, Wifi, Lemari Pakaian',
            'link' => 'https://shorturl.at/JZr4p',
        ]);

        Kos::create([
            'name' => 'Kost Putri Amartha',
            'address' => 'Bantul',
            'typekost' => 'putri',
            'price' => 1000000,
            'facilities' => 'Kamar Mandi Dalam, Wifi, Meja Rias',
            'link' => 'https://shorturl.at/LIJSx',
        ]);

        Kos::create([
            'name' => 'Kos Sejahtera YIA',
            'address' => 'Kulon Progo',
            'typekost' => 'putra',
            'price' => 1000000,
            'facilities' => 'Kamar Mandi Dalam, Wifi, Parkir',
            'link' => 'https://shorturl.at/lmZp9',
        ]);
        Kos::create([
            'name' => 'Kost Omah Putih',
            'address' => 'Kota Yogyakarta',
            'typekost' => 'ekslusif',
            'price' => 1000000,
            'facilities' => 'Kamar Mandi Dalam, Wifi, Parkir, AC',
            'link' => 'ungu.in/sleman1',
        ]);
    }
}
