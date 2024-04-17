@extends('layouts.header')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Data Pelatihan</h1>
        <p class="mb-4">Berikut adalah data pelatihan yang tersedia.</p>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Edit Data Pelatihan</h6>
            </div>
            <div class="card-body">
                @if (session('success'))
                    <div class="alert alert-success" >
                        {{ session('success') }}
                    </div>
                @endif

                @if ($errors->any())
                    <div class="alert alert-danger">
                        {{ $errors->first() }}
                    </div>
                @endif

                <form id="editForm" action="{{ route('pelatihan.update', $pelatihan->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="nik">NIK:</label>
                        <input type="number" class="form-control" id="nik" name="nik" maxlength="16" value="{{ $pelatihan->nik }}">
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama:</label>
                        <input type="text" class="form-control" id="nama" name="nama" value="{{ $pelatihan->nama }}">
                    </div>
                    <div class="form-group">
                        <label for="nama_pelatihan">Nama Pelatihan:</label>
                        <input type="text" class="form-control" id="nama_pelatihan" name="nama_pelatihan" value="{{ $pelatihan->nama_pelatihan }}">
                    </div>
                    <div class="form-group">
                        <label for="kompetensi_yang_ditingkatkan">Kompetensi Yang Ditingkatkan:</label>
                        <input type="text" class="form-control" id="kompetensi_yang_ditingkatkan" name="kompetensi_yang_ditingkatkan" value="{{ $pelatihan->kompetensi_yang_ditingkatkan }}">
                    </div>
                    <div class="form-group">
                        <label for="jumlah_hari">Jumlah Hari:</label>
                        <input type="text" class="form-control" id="jumlah_hari" name="jumlah_hari" value="{{ $pelatihan->jumlah_hari }}">
                    </div>
                    <div class="form-group">
                        <label for="penyelenggara">Penyelenggara:</label>
                        <input type="text" class="form-control" id="penyelenggara" name="penyelenggara" value="{{ $pelatihan->penyelenggara }}">
                    </div>
                    <div class="form-group">
                        <label for="tgl_mulai">Tanggal Mulai:</label>
                        <input type="date" class="form-control" id="tgl_mulai" name="tgl_mulai" value="{{ date('Y-m-d', strtotime($pelatihan->tgl_mulai)) }}">
                    </div>
                    <div class="form-group">
                        <label for="tgl_selesai">Tanggal Selesai:</label>
                        <input type="date" class="form-control" id="tgl_selesai" name="tgl_selesai" value="{{ date('Y-m-d', strtotime($pelatihan->tgl_selesai)) }}">
                    </div>                    
                    <div class="form-group">
                        <label for="jenis_pelatihan">Jenis Pelatihan:</label>
                        <select class="form-control" id="jenis_pelatihan" name="jenis_pelatihan">
                            <option value="Internal" {{ $pelatihan->jenis_pelatihan == 'Internal' ? 'selected' : '' }}>Internal</option>
                            <option value="Publik" {{ $pelatihan->jenis_pelatihan == 'Publik' ? 'selected' : '' }}>Publik</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="eviden">Eviden:</label>
                        <select class="form-control" id="eviden" name="eviden">
                            <option value="Daftar hadir" {{ $pelatihan->eviden == 'Daftar hadir' ? 'selected' : '' }}>Daftar hadir</option>
                            <option value="Sertifikat" {{ $pelatihan->eviden == 'Sertifikat' ? 'selected' : '' }}>Sertifikat</option>
                            <option value="Notadinas" {{ $pelatihan->eviden == 'Notadinas' ? 'selected' : '' }}>Notadinas</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="keterangan">Keterangan:</label>
                        <input type="text" class="form-control" id="keterangan" name="keterangan" value="{{ $pelatihan->keterangan }}">
                    </div>
                    <div class="form-group">
                        <a href="#" class="btn btn-secondary" data-toggle="modal" data-target="#backModal">Kembali</a>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#submitModal">Edit</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

    <!-- Submit Modal -->
    <div class="modal fade" id="submitModal" tabindex="-1" role="dialog" aria-labelledby="submitModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="submitModalLabel">Konfirmasi Edit</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Apakah Anda yakin ingin menyimpan perubahan ini?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" form="editForm" class="btn btn-primary">Edit</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Back Modal -->
    <div class="modal fade" id="backModal" tabindex="-1" role="dialog" aria-labelledby="backModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="backModalLabel">Konfirmasi Kembali</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Apakah Anda yakin ingin kembali tanpa menyimpan perubahan?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <a href="{{ route('pelatihan.index') }}" class="btn btn-primary">Kembali</a>
                </div>
            </div>
        </div>
    </div>
@endsection