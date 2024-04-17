<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelatihan extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'pelatihan';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nik',
        'nama',
        'nama_pelatihan',
        'kompetensi_yang_ditingkatkan',
        'jumlah_hari',
        'penyelenggara',
        'tgl_mulai',
        'tgl_selesai',
        'jenis_pelatihan',
        'eviden',
        'keterangan',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'tgl_mulai' => 'date',
        'tgl_selesai' => 'date',
    ];
}
