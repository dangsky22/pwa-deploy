<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        // Data dummy dulu
        $totalKost = 5;
        $occupied  = 3;
        $available = 2;

        // Daftar kosan dummy
        $kostList = [
            [
                'nama' => 'Kost Anugerah',
                'alamat' => 'Jl. Melati No. 12, Jakarta',
                'total_kamar' => 10,
                'terisi' => 7,
                'kosong' => 3,
            ],
            [
                'nama' => 'Kost Harmoni',
                'alamat' => 'Jl. Kenanga No. 45, Bandung',
                'total_kamar' => 8,
                'terisi' => 5,
                'kosong' => 3,
            ],
            [
                'nama' => 'Kost Mawar',
                'alamat' => 'Jl. Mawar No. 22, Surabaya',
                'total_kamar' => 12,
                'terisi' => 12,
                'kosong' => 0,
            ],
        ];

        return view('owner.dashboard', compact('totalKost', 'occupied', 'available', 'kostList'));
    }
}
