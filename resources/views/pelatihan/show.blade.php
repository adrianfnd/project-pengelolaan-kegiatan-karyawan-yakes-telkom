@extends('layouts.header')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Detail Data Pelatihan</h1>
        <p class="mb-4">Berikut adalah detail dari data pelatihan yang dipilih.</p>
        
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Detail Data Pelatihan</h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <strong>NIK:</strong>
                        <p>{{ $pelatihan->nik }}</p>
                    </div>
                    <div class="col-md-4">
                        <strong>Nama:</strong>
                        <p>{{ $pelatihan->nama }}</p>
                    </div>
                    <div class="col-md-4">
                        <strong>Nama Pelatihan:</strong>
                        <p>{{ $pelatihan->nama_pelatihan }}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <strong>Kompetensi Yang Ditingkatkan:</strong>
                        <p>{{ $pelatihan->kompetensi_yang_ditingkatkan }}</p>
                    </div>
                    <div class="col-md-4">
                        <strong>Jumlah Hari:</strong>
                        <p>{{ $pelatihan->jumlah_hari }}</p>
                    </div>
                    <div class="col-md-4">
                        <strong>Penyelenggara:</strong>
                        <p>{{ $pelatihan->penyelenggara }}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <strong>Tanggal Mulai:</strong>
                        <p>{{ date('Y-m-d', strtotime($pelatihan->tgl_mulai)) }}</p>
                    </div>
                    <div class="col-md-4">
                        <strong>Tanggal Selesai:</strong>
                        <p>{{ date('Y-m-d', strtotime($pelatihan->tgl_selesai)) }}</p>
                    </div>
                    <div class="col-md-4">
                        <strong>Jenis Pelatihan:</strong>
                        <p>{{ $pelatihan->jenis_pelatihan }}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <strong>Eviden:</strong>
                        <p>{{ $pelatihan->eviden }}</p>
                    </div>
                    <div class="col-md-8">
                        <strong>Keterangan:</strong>
                        <p>{{ $pelatihan->keterangan }}</p>
                    </div>
                </div>
                <div class="form-group">
                    <a href="{{ route('pelatihan.index') }}" class="btn btn-secondary">Kembali</a>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->
@endsection
