<?php

namespace App\Http\Controllers;

use App\Models\Pelatihan;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

use App\Exports\PelatihanExport;

class PelatihanController extends Controller
{
    public function index(Request $request)
    {
        $query = Pelatihan::query();

        if ($request->has('filter') && $request->has('search')) {
            $filter = $request->input('filter');
            $search = $request->input('search');
            $query->where($filter, 'LIKE', "%$search%");
        }

        $pelatihans = $query->paginate(10);

        return view('pelatihan.index', compact('pelatihans'));
    }

    public function create()
    {
        return view('pelatihan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nik' => 'required|numeric|unique:pelatihan',
            'nama' => 'required',
            'nama_pelatihan' => 'required',
            'kompetensi_yang_ditingkatkan' => 'required',
            'jumlah_hari' => 'required|numeric',
            'penyelenggara' => 'required',
            'tgl_mulai' => 'required|date',
            'tgl_selesai' => 'required|date',
            'jenis_pelatihan' => 'required|in:Internal,Publik',
            'eviden' => 'required|in:Daftar hadir,Sertifikat,Notadinas',
            'keterangan' => 'nullable',
            'nama_atasan' => 'required',
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
            'nik' => 'required|numeric|unique:pelatihan,nik,' . $pelatihan->id,
            'nama' => 'required',
            'nama_pelatihan' => 'required',
            'kompetensi_yang_ditingkatkan' => 'required',
            'jumlah_hari' => 'required|numeric',
            'penyelenggara' => 'required',
            'tgl_mulai' => 'required|date',
            'tgl_selesai' => 'required|date',
            'jenis_pelatihan' => 'required|in:Internal,Publik',
            'eviden' => 'required|in:Daftar hadir,Sertifikat,Notadinas',
            'keterangan' => 'nullable',
            'nama_atasan' => 'required',
        ]);

        $pelatihan->update($request->all());

        return redirect()->route('pelatihan.index')->with('success', 'Pelatihan berhasil diperbarui');
    }

    public function destroy(Pelatihan $pelatihan)
    {
        $pelatihan->delete();

        return redirect()->route('pelatihan.index')->with('success', 'Pelatihan berhasil dihapus');
    }
    
    public function exportExcel()
    {
        $trainings = Pelatihan::orderBy('created_at')->get();

        $currentDateTime = now()->format('Y-m-d_H-i-s');
        $fileName = 'data_pelatihan_' . $currentDateTime . '.xlsx';

        return Excel::download(new PelatihanExport($trainings), $fileName);
    }
}

