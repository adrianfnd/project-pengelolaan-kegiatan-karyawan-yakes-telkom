<?php

namespace App\Http\Controllers;

use App\Models\Pelatihan;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

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

    public function exportExcel(Request $request)
    {
        $tgl_dari = $request->tgl_dari;
        $tgl_sampai = $request->tgl_sampai;

        $trainings = Pelatihan::orderBy('created_at')
                                ->get();

        $currentDateTime = now()->format('Y-m-d_H-i-s');
        $csvFileName = 'data_pelatihan_' . $currentDateTime . '.csv';
        $csvFile = fopen('php://temp', 'w');    
        
        $header = ['No', 'NIK', 'Nama', 'Nama Pelatihan', 'Kompetensi yang Ditingkatkan', 'Jumlah Hari', 'Penyelenggara', 'Tanggal Mulai', 'Tanggal Selesai', 'Jenis Pelatihan', 'Eviden', 'Keterangan','Atasan Nama'];
        fputcsv($csvFile, $header, ';');
    
        $counter = 1;
        foreach ($trainings as $training) {
            $rowData = [
                $counter++,
                $training->nik,
                $training->nama,
                $training->nama_pelatihan,
                $training->kompetensi_yang_ditingkatkan,
                $training->jumlah_hari,
                $training->penyelenggara,
                $training->tgl_mulai->format('Y-m-d'),
                $training->tgl_selesai->format('Y-m-d'),
                $training->jenis_pelatihan,
                $training->eviden,
                $training->keterangan,
                $training->nama_atasan
            ];
            fputcsv($csvFile, $rowData, ';');
        }
        
        rewind($csvFile);
        $csvData = stream_get_contents($csvFile);
        fclose($csvFile);

        return response()->streamDownload(function () use ($csvData) {
            echo $csvData;
        }, $csvFileName);
    }
    
}

