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
                'nama' => 'Air Terjun Lapopu',
                'deskripsi' => 'Air terjun tertinggi di NTT dengan air jernih berwarna biru kehijauan.',
                'alamat' => 'Manurara, Katikutana Selatan, Kabupaten Sumba Tengah',
                'foto' => '',
                'rating_google' => 4.6,
                'url_map_google' => 'https://maps.app.goo.gl/oiTaDMActrb5fsMk8',
                'is_active' => 1,
            ],
            [
                'nama' => 'Pantai Nihiwatu',
                'deskripsi' => 'Pantai dengan ombak terbaik untuk berselancar dan pemandangan matahari terbenam yang spektakuler.',
                'alamat' => 'Hoba Wawi, Wanokaka, Kabupaten Sumba Barat',
                'foto' => '',
                'rating_google' => 4.8,
                'url_map_google' => 'https://maps.app.goo.gl/4Yh3EgXsMoVhMQ5LA',
                'is_active' => 1,
            ],
            [
                'nama' => 'Pantai Binanatu',
                'deskripsi' => 'Pantai dengan perpaduan hamparan pasir putih dan batu karang yang megah.',
                'alamat' => 'Lokory, Tana Righu, Kabupaten Sumba Barat',
                'foto' => '',
                'rating_google' => 4.3,
                'url_map_google' => 'https://maps.google.com/?q=Pantai+Binanatu+Sumba',
                'is_active' => 1,
            ],
            [
                'nama' => 'Pantai Dassang',
                'deskripsi' => 'Destinasi pesisir yang sepi dan tenang, cocok untuk bersantai menikmati keindahan alam.',
                'alamat' => 'Harona Kalla, Laboya Barat, Kabupaten Sumba Barat',
                'foto' => '',
                'rating_google' => 4.4,
                'url_map_google' => 'https://maps.google.com/?q=Pantai+Dassang+Sumba',
                'is_active' => 1,
            ],
            [
                'nama' => 'Pantai Lailiang',
                'deskripsi' => 'Terkenal dengan air lautnya yang biru jernih dan suasana yang sangat menyegarkan.',
                'alamat' => 'Baliloku, Wanukaka, Kabupaten Sumba Barat',
                'foto' => '',
                'rating_google' => 4.6,
                'url_map_google' => 'https://maps.google.com/?q=Pantai+Lailiang+Sumba',
                'is_active' => 1,
            ],
            [
                'nama' => 'Pantai Marosi',
                'deskripsi' => 'Destinasi favorit dengan air laut sejernih kristal dan ombak yang menantang.',
                'alamat' => 'Patiala Bawa, Laboya, Kabupaten Sumba Barat',
                'foto' => '',
                'rating_google' => 4.6,
                'url_map_google' => 'https://maps.google.com/?q=Pantai+Marosi+Sumba',
                'is_active' => 1,
            ],
            [
                'nama' => 'Pantai Ngedo',
                'deskripsi' => 'Pantai tersembunyi dengan keindahan pasir putih bersih dan pesona alam yang asri.',
                'alamat' => 'Patiala Dete, Laboya Barat, Kabupaten Sumba Barat',
                'foto' => '',
                'rating_google' => 4.4,
                'url_map_google' => 'https://maps.google.com/?q=Pantai+Ngedo+Sumba',
                'is_active' => 1,
            ],
            [
                'nama' => 'Pantai Nihioka',
                'deskripsi' => 'Destinasi wisata pesisir yang menawarkan pemandangan tebing dan lautan biru yang memukau.',
                'alamat' => 'Wemangoma, Wanokaka, Kabupaten Sumba Barat',
                'foto' => '',
                'rating_google' => 3.7,
                'url_map_google' => 'https://maps.google.com/?q=Pantai+Nihioka+Sumba',
                'is_active' => 1,
            ],
            [
                'nama' => 'Pantai Pahiwi',
                'deskripsi' => 'Terkenal dengan tradisi Nyale dan hamparan pasir luas yang cocok untuk bersantai.',
                'alamat' => 'Wehura, Wanokaka, Kabupaten Sumba Barat',
                'foto' => '',
                'rating_google' => 4.5,
                'url_map_google' => 'https://maps.google.com/?q=Pantai+Pahiwi+Sumba',
                'is_active' => 1,
            ],
            [
                'nama' => 'Pantai Rua',
                'deskripsi' => 'Pantai yang tenang dengan pasir putih dan deretan pohon kelapa.',
                'alamat' => 'Rua, Wanokaka, Kabupaten Sumba Barat',
                'foto' => '',
                'rating_google' => 4.5,
                'url_map_google' => 'https://maps.app.goo.gl/idsogebrAw617d7J6',
                'is_active' => 1,
            ],
            [
                'nama' => 'Pantai Kerewei',
                'deskripsi' => 'Pantai eksotis dengan hamparan pasir putih yang luas dan deretan pohon kelapa.',
                'alamat' => 'Patiala Bawa, Laboya, Kabupaten Sumba Barat',
                'foto' => '',
                'rating_google' => 4.5,
                'url_map_google' => 'https://maps.google.com/?q=Pantai+Kerewei+Sumba',
                'is_active' => 1,
            ],
            [
                'nama' => 'Pantai Tarakaito',
                'deskripsi' => 'Pantai asri dengan keindahan alam yang masih perawan dan suasana yang tenang.',
                'alamat' => 'Gaura, Laboya Barat, Kabupaten Sumba Barat',
                'foto' => '',
                'rating_google' => 4.0,
                'url_map_google' => 'https://maps.google.com/?q=Pantai+Tarakaito+Sumba',
                'is_active' => 1,
            ],
            [
                'nama' => 'Pantai Tirung',
                'deskripsi' => 'Pantai dengan panorama alam yang menawan, pas untuk menikmati senja.',
                'alamat' => 'Gaura, Laboya Barat, Kabupaten Sumba Barat',
                'foto' => '',
                'rating_google' => 4.7,
                'url_map_google' => 'https://maps.google.com/?q=Pantai+Tirung+Sumba',
                'is_active' => 1,
            ],
            [
                'nama' => 'Pantai Wanokaka',
                'deskripsi' => 'Pantai yang luas dengan pemandangan indah, kental dengan nuansa budaya lokal.',
                'alamat' => 'Pahola, Wanukaka, Kabupaten Sumba Barat',
                'foto' => '',
                'rating_google' => 4.9,
                'url_map_google' => 'https://maps.google.com/?q=Pantai+Wanokaka+Sumba',
                'is_active' => 1,
            ],
            [
                'nama' => 'Pantai Watubela',
                'deskripsi' => 'Pantai indah dengan formasi batuan karang unik yang berpadu dengan pasir putih.',
                'alamat' => 'Patiala Bawa, Laboya, Kabupaten Sumba Barat',
                'foto' => '',
                'rating_google' => 4.7,
                'url_map_google' => 'https://maps.google.com/?q=Pantai+Watubela+Sumba',
                'is_active' => 1,
            ],
            [
                'nama' => 'Pantai Watukaka',
                'deskripsi' => 'Pantai memukau dengan nuansa alam yang masih alami dan pemandangan laut lepas.',
                'alamat' => 'Gaura, Laboya Barat, Kabupaten Sumba Barat',
                'foto' => '',
                'rating_google' => 4.9,
                'url_map_google' => 'https://maps.google.com/?q=Pantai+Watukaka+Sumba',
                'is_active' => 1,
            ],
        ];

        foreach ($wisata as $item) {
            Wisata::create($item);
        }
    }
}
