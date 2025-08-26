@extends('layouts.app')

@section('content')
<div class="container mx-auto px-6 py-8">
    <h2 class="text-2xl font-bold mb-6">Tambah Unit Kost Baru</h2>

    <form class="bg-white rounded-2xl shadow p-6 max-w-lg mx-auto">
        <div class="mb-4">
            <label class="block mb-2 font-medium">Nama Kost</label>
            <input type="text" class="w-full border rounded-lg p-3 focus:ring focus:ring-blue-300">
        </div>

        <div class="mb-4">
            <label class="block mb-2 font-medium">Alamat</label>
            <textarea class="w-full border rounded-lg p-3 focus:ring focus:ring-blue-300"></textarea>
        </div>

        <div class="mb-4">
            <label class="block mb-2 font-medium">Jumlah Kamar</label>
            <input type="number" class="w-full border rounded-lg p-3 focus:ring focus:ring-blue-300">
        </div>

        <div class="text-right">
            <button type="submit" class="bg-blue-600 text-white px-6 py-3 rounded-xl shadow hover:bg-blue-700 transition">
                Simpan
            </button>
        </div>
    </form>
</div>
@endsection
