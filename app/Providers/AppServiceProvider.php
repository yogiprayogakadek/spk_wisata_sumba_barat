<?php

namespace App\Providers;

use App\Models\HistoriPerhitungan;
use App\Policies\PerhitunganPolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        Gate::policy(HistoriPerhitungan::class, PerhitunganPolicy::class);
    }
}
