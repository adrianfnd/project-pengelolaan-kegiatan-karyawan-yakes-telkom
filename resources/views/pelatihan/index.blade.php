@extends('layouts.header')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Data Pelatihan</h1>
        <p class="mb-4">Berikut adalah data pelatihan yang tersedia.</p>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data Pelatihan</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>NIK</th>
                                <th>Nama</th>
                                <th>Nama Pelatihan</th>
                                <th>Kompetensi Yang Ditingkatkan</th>
                                <th>Jumlah Hari</th>
                                <th>Penyelenggara</th>
                                <th>Tgl Mulai</th>
                                <th>Tgl Selesai</th>
                                <th>Jenis Pelatihan</th>
                                <th>Eviden</th>
                                <th>Keterangan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        {{-- <tfoot>
                            <tr>
                                <th>No.</th>
                                <th>NIK</th>
                                <th>Nama</th>
                                <th>Nama Pelatihan</th>
                                <th>Kompetensi Yang Ditingkatkan</th>
                                <th>Jumlah Hari</th>
                                <th>Penyelenggara</th>
                                <th>Tgl Mulai</th>
                                <th>Tgl Selesai</th>
                                <th>Jenis Pelatihan</th>
                                <th>Eviden</th>
                                <th>Keterangan</th>
                                <th>Action</th>
                            </tr>
                        </tfoot> --}}
                        <tbody>
                            @foreach($pelatihans as $index => $pelatihan)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $pelatihan->nik }}</td>
                                <td>{{ $pelatihan->nama }}</td>
                                <td>{{ $pelatihan->nama_pelatihan }}</td>
                                <td>{{ $pelatihan->kompetensi_yang_ditingkatkan }}</td>
                                <td>{{ $pelatihan->jumlah_hari }}</td>
                                <td>{{ $pelatihan->penyelenggara }}</td>
                                <td>{{ $pelatihan->tgl_mulai }}</td>
                                <td>{{ $pelatihan->tgl_selesai }}</td>
                                <td>{{ $pelatihan->jenis_pelatihan }}</td>
                                <td>{{ $pelatihan->eviden }}</td>
                                <td>{{ $pelatihan->keterangan }}</td>
                                <td>
                                    <center>
                                        <div class="row" style="justify-content: center;">
                                            <a href="{{ route('pelatihan.edit', $pelatihan->id) }}" class="btn btn-primary btn-sm btn-circle mr-1">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('pelatihan.destroy', $pelatihan->id) }}" method="POST" style="display: inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm btn-circle" onclick="return confirm('Are you sure you want to delete this item?')">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </center>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->
@endsection
