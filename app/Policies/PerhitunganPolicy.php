<?php

namespace App\Policies;

use App\Models\HistoriPerhitungan;
use App\Models\User;

class PerhitunganPolicy
{
    public function manage(User $user, HistoriPerhitungan $histori): bool
    {
        return $user->role === 'admin' || $user->id === $histori->user_id;
    }
}
