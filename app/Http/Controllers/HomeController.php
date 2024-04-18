<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Pelatihan;
use Carbon\Carbon;

class HomeController extends Controller
{
    public function dashboard()
    {
        $total_data = Pelatihan::count();
    
        // Menghitung data pelatihan hari ini
        $data_hari_ini = Pelatihan::whereDate('tgl_mulai', date('Y-m-d'))->count();
    
        // Menghitung data pelatihan internal
        $data_internal = Pelatihan::where('jenis_pelatihan', 'Internal')->count();
    
        // Menghitung data pelatihan publik
        $data_publik = Pelatihan::where('jenis_pelatihan', 'Publik')->count();
    
        // Menghitung data pelatihan dengan eviden "Daftar hadir"
        $data_daftar_hadir = Pelatihan::where('eviden', 'Daftar hadir')->count();
    
        // Menghitung data pelatihan dengan eviden "Sertifikat"
        $data_sertifikat = Pelatihan::where('eviden', 'Sertifikat')->count();
    
        // Menghitung data pelatihan dengan eviden "Notadinas"
        $data_notadinas = Pelatihan::where('eviden', 'Notadinas')->count();
    
        // Menghitung data pelatihan dalam 7 hari terakhir
        $start_date = now()->subDays(7)->startOfDay();
        $end_date = now()->endOfDay();
        $data_7_days = Pelatihan::whereBetween('tgl_mulai', [$start_date, $end_date])
                        ->get()
                        ->groupBy(function($date) {
                            return Carbon::parse($date->tgl_mulai)->format('Y-m-d');
                        })
                        ->map(function($item, $key) {
                            return $item->count();
                        });           
    
        return view('dashboard', compact('total_data', 'data_hari_ini', 'data_internal', 'data_publik', 'data_daftar_hadir', 'data_sertifikat', 'data_notadinas', 'data_7_days'));
    }
    
}