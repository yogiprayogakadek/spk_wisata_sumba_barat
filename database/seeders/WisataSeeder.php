<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Wisata;

class WisataSeeder extends Seeder
{
    public function run(): void
    {
        $wisata = [
            [
                'nama' => 'Pantai Nihiwatu',
                'deskripsi' => 'Pantai dengan ombak terbaik untuk berselancar dan pemandangan matahari terbenam yang spektakuler.',
                'alamat' => 'Hoba Wawi, Wanokaka, Kabupaten Sumba Barat',
                'foto' => '',
                'rating_google' => 4.8,
                'url_map_google' => 'https://maps.app.goo.gl/nihiwatu',
                'is_active' => 1,
            ],
            [
                'nama' => 'Kampung Adat Prai Ijing',
                'deskripsi' => 'Kampung adat dengan rumah-rumah tradisional Sumba yang unik di atas bukit.',
                'alamat' => 'Tebara, Kota Waikabubak, Kabupaten Sumba Barat',
                'foto' => '',
                'rating_google' => 4.7,
                'url_map_google' => 'https://maps.app.goo.gl/praiijing',
                'is_active' => 1,
            ],
            [
                'nama' => 'Air Terjun Lapopu',
                'deskripsi' => 'Air terjun tertinggi di NTT dengan air jernih berwarna biru kehijauan.',
                'alamat' => 'Manurara, Katikutana Selatan, Kabupaten Sumba Tengah',
                'foto' => '',
                'rating_google' => 4.6,
                'url_map_google' => 'https://maps.app.goo.gl/lapopu',
                'is_active' => 1,
            ],
            [
                'nama' => 'Pantai Rua',
                'deskripsi' => 'Pantai yang tenang dengan pasir putih dan deretan pohon kelapa.',
                'alamat' => 'Rua, Wanokaka, Kabupaten Sumba Barat',
                'foto' => '',
                'rating_google' => 4.5,
                'url_map_google' => 'https://maps.app.goo.gl/ruabeach',
                'is_active' => 1,
            ],
            [
                'nama' => 'Bukit Wairinding',
                'deskripsi' => 'Hamparan perbukitan savana yang luas dan eksotis.',
                'alamat' => 'Pambotanjara, Waingapu, Kabupaten Sumba Timur',
                'foto' => '',
                'rating_google' => 4.7,
                'url_map_google' => 'https://maps.app.goo.gl/wairinding',
                'is_active' => 1,
            ],
        ];

        foreach ($wisata as $item) {
            Wisata::create($item);
        }
    }
}
