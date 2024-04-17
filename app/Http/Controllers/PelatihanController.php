<?php

namespace App\Http\Controllers;

use App\Models\Pelatihan;
use Illuminate\Http\Request;

class PelatihanController extends Controller
{
    public function index()
    {
        $pelatihans = Pelatihan::all();

        return view('pelatihan.index', compact('pelatihans'));
    }

    public function create()
    {
        return view('pelatihan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'NIK' => 'required',
            'Nama' => 'required',
            'Nama_Pelatihan' => 'required',
            'Kompetensi_Yang_Ditingkatkan' => 'required',
            'Jumlah_Hari' => 'required|numeric',
            'Penyelenggara' => 'required',
            'Tgl_Mulai' => 'required|date',
            'Tgl_Selesai' => 'required|date',
            'Jenis_Pelatihan' => 'required|in:Internal,Publik',
            'EVIDEN' => 'required|in:Daftar hadir,Sertifikat,Notadinas',
            'Keterangan' => 'nullable',
        ]);

        Pelatihan::create($request->all());

        return redirect()->route('pelatihan.index')->with('success', 'Pelatihan berhasil ditambahkan');
    }

    public function show(Pelatihan $pelatihan)
    {
        return view('pelatihan.show', compact('pelatihan'));
    }

    public function edit(Pelatihan $pelatihan)
    {
        return view('pelatihan.edit', compact('pelatihan'));
    }

    public function update(Request $request, Pelatihan $pelatihan)
    {
        $request->validate([
            'NIK' => 'required',
            'Nama' => 'required',
            'Nama_Pelatihan' => 'required',
            'Kompetensi_Yang_Ditingkatkan' => 'required',
            'Jumlah_Hari' => 'required|numeric',
            'Penyelenggara' => 'required',
            'Tgl_Mulai' => 'required|date',
            'Tgl_Selesai' => 'required|date',
            'Jenis_Pelatihan' => 'required|in:Internal,Publik',
            'EVIDEN' => 'required|in:Daftar hadir,Sertifikat,Notadinas',
            'Keterangan' => 'nullable',
        ]);

        $pelatihan->update($request->all());

        return redirect()->route('pelatihan.index')->with('success', 'Pelatihan berhasil diperbarui');
    }

    public function destroy(Pelatihan $pelatihan)
    {
        $pelatihan->delete();

        return redirect()->route('pelatihan.index')->with('success', 'Pelatihan berhasil dihapus');
    }
}

