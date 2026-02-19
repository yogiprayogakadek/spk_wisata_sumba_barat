<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\HistoriPerhitungan;
use Carbon\Carbon;

class HistoriPerhitunganSeeder extends Seeder
{
    public function run(): void
    {
        $users = User::where('role', 'user')->pluck('id')->toArray();
        if (empty($users)) {
            $users = User::pluck('id')->toArray();
        }

        for ($i = 1; $i <= 20; $i++) {
            HistoriPerhitungan::create([
                'user_id' => $users[array_rand($users)],
                'tanggal' => Carbon::now()->subDays(rand(0, 30))->format('Y-m-d H:i:s'),
            ]);
        }
    }
}
