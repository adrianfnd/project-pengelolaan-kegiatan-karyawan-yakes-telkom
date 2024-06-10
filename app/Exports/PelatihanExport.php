<?php

namespace App\Exports;


use App\Models\Pelatihan;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PelatihanExport implements FromCollection, WithHeadings
{
    protected $trainings;

    public function __construct($trainings)
    {
        $this->trainings = $trainings;
    }

    public function collection()
    {
        $mappedData = $this->trainings->map(function ($training, $index) {
            return [
                $index + 1,
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
        });

        return $mappedData;
    }

    public function headings(): array
    {
        return [
            'No',
            'NIK',
            'Nama',
            'Nama Pelatihan',
            'Kompetensi yang Ditingkatkan',
            'Jumlah Hari',
            'Penyelenggara',
            'Tanggal Mulai',
            'Tanggal Selesai',
            'Jenis Pelatihan',
            'Eviden',
            'Keterangan',
            'Atasan Nama',
        ];
    }
}

