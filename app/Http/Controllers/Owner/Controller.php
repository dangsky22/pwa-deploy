<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KostanUnit; // Model untuk unit kostan

class OwnerController extends Controller
{
    public function dashboard()
    {
        return view('owner.dashboard');
    }

    public function create()
    {
        return view('owner.create');
    }

    public function store(Request $request)
    {
        // Logic untuk menyimpan unit baru
        $validated = $request->validate([
            'nama_unit' => 'required|string|max:255',
            'tipe_unit' => 'required|in:single,sharing,studio',
            'harga_bulanan' => 'required|numeric|min:0',
            'ukuran_kamar' => 'required|numeric|min:0',
            'alamat' => 'required|string',
            'kecamatan' => 'required|string',
            'kota' => 'required|string',
            'deskripsi' => 'nullable|string',
            'fasilitas' => 'array',
            'foto_unit.*' => 'image|mimes:jpeg,png,jpg,gif|max:10240'
        ]);

        // Save to database
        KostanUnit::create($validated);
        
        return redirect()->route('owner.dashboard')->with('success', 'Unit berhasil ditambahkan!');
    }

    public function manage()
    {
        // Logic untuk menampilkan semua unit
        $units = KostanUnit::where('owner_id', auth()->id())->get();
        return view('owner.manage', compact('units'));
    }
}