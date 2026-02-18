<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\HistoriPerhitungan;
use App\Models\Kriteria;
use App\Models\SubKriteria;
use App\Models\User;
use App\Models\Wisata;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        if ($user->role === 'admin') {
            return redirect()->route('dashboard.admin');
        }

        return redirect()->route('dashboard.user');
    }

    public function adminIndex()
    {
        $stats = [
            'wisata'      => Wisata::count(),
            'kriteria'    => Kriteria::count(),
            'subKriteria' => SubKriteria::count(),
            'histori'     => HistoriPerhitungan::count(),
            'users'       => User::count(),
        ];

        $wisataAktif    = Wisata::where('is_active', true)->count();
        $wisataTerbaru  = Wisata::latest()->take(5)->get(['id', 'nama', 'alamat', 'rating_google', 'is_active']);
        $kriteria       = Kriteria::with('subKriteria')->get(['id', 'nama', 'sifat', 'bobot']);
        $historiTerbaru = HistoriPerhitungan::latest()->take(5)->get(['id', 'tanggal', 'created_at']);
        $totalAdmin     = User::where('role', 'admin')->count();
        $totalUser      = User::where('role', 'user')->count();

        return view('main.dashboard.admin.index', compact(
            'stats',
            'wisataAktif',
            'wisataTerbaru',
            'kriteria',
            'historiTerbaru',
            'totalAdmin',
            'totalUser'
        ));
    }

    public function userIndex()
    {
        $wisataList     = Wisata::where('is_active', true)->latest()->get(['id', 'nama', 'alamat', 'rating_google', 'is_active']);
        $kriteria       = Kriteria::with('subKriteria')->get(['id', 'nama', 'sifat', 'bobot']);
        $historiTerbaru = HistoriPerhitungan::latest()->take(5)->get(['id', 'tanggal', 'created_at']);
        $totalWisata    = $wisataList->count();
        $totalKriteria  = $kriteria->count();
        $totalHistori   = HistoriPerhitungan::count();

        return view('main.dashboard.user.index', compact(
            'wisataList',
            'kriteria',
            'historiTerbaru',
            'totalWisata',
            'totalKriteria',
            'totalHistori'
        ));
    }
}
