<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller as BaseController;
use Illuminate\Http\Request;

class Controller extends BaseController
{
    public function index()
    {
        // Logic untuk menampilkan daftar kost milik owner
        return view('owner.kost.index');
    }

    public function create()
    {
        return view('owner.create');
    }

    public function store(Request $request)
    {
        // Logic untuk menyimpan kost baru
        // Validasi dan simpan data
        
        return redirect()->route('owner.dashboard')->with('success', 'Unit kost berhasil ditambahkan!');
    }

    public function edit($id)
    {
        // Logic untuk edit kost
        return view('owner.edit', compact('id'));
    }

    public function update(Request $request, $id)
    {
        // Logic untuk update kost
        return redirect()->route('owner.dashboard')->with('success', 'Unit kost berhasil diupdate!');
    }

    public function destroy($id)
    {
        // Logic untuk hapus kost
        return redirect()->route('owner.dashboard')->with('success', 'Unit kost berhasil dihapus!');
    }
}