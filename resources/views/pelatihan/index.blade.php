@php
    $roles = auth()->user()->roles;

    $filter = request()->input('filter');
    $search = request()->input('search');
@endphp

@extends('layouts.header')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Data Pelatihan</h1>
        <p class="mb-4">Berikut adalah data pelatihan yang tersedia.</p>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data Pelatihan</h6>
            </div>
            <div class="card-body">
                <div class="d-flex justify-content-between mb-3">
                    <div class="mr-3">
                        <form method="GET" action="{{ route('pelatihan.index') }}" class="mb-4">
                            <div class="row">
                                <div class="col-md-4">
                                    <input type="text" name="search" class="form-control" placeholder="Search"
                                        value="{{ $search }}">
                                </div>
                                <div class="col-md-3">
                                    <select name="filter" class="form-control">
                                        <option value="" disabled selected>Pilih Filter</option>
                                        <option value="nik" {{ $filter == 'nik' ? 'selected' : '' }}>NIK</option>
                                        <option value="nama" {{ $filter == 'nama' ? 'selected' : '' }}>Nama</option>
                                        <option value="nama_pelatihan" {{ $filter == 'nama_pelatihan' ? 'selected' : '' }}>
                                            Nama Pelatihan</option>
                                        <option value="kompetensi_yang_ditingkatkan"
                                            {{ $filter == 'kompetensi_yang_ditingkatkan' ? 'selected' : '' }}>Kompetensi
                                            Yang Ditingkatkan</option>
                                        <option value="jumlah_hari" {{ $filter == 'jumlah_hari' ? 'selected' : '' }}>Jumlah
                                            Hari</option>
                                        <option value="penyelenggara" {{ $filter == 'penyelenggara' ? 'selected' : '' }}>
                                            Penyelenggara</option>
                                        <option value="tgl_mulai" {{ $filter == 'tgl_mulai' ? 'selected' : '' }}>Tanggal
                                            Mulai</option>
                                        <option value="tgl_selesai" {{ $filter == 'tgl_selesai' ? 'selected' : '' }}>Tanggal
                                            Selesai</option>
                                        <option value="jenis_pelatihan"
                                            {{ $filter == 'jenis_pelatihan' ? 'selected' : '' }}>Jenis Pelatihan</option>
                                        <option value="eviden" {{ $filter == 'eviden' ? 'selected' : '' }}>Eviden</option>
                                        <option value="keterangan" {{ $filter == 'keterangan' ? 'selected' : '' }}>
                                            Keterangan</option>
                                        <option value="nama_atasan" {{ $filter == 'nama_atasan' ? 'selected' : '' }}>Nama
                                            Atasan</option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <button type="submit" class="btn btn-primary">Search</button>
                                    <button type="button" onclick="resetForm()" class="btn btn-secondary">Reset</button>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="mr-3">
                        <a href="{{ route('pelatihan.create') }}" class="btn btn-success mr-2">Tambah Pelatihan</a>
                        @if ($roles == 1)
                            <button type="button" class="btn btn-success" data-toggle="modal"
                                data-target="#exportExcelModal">Export Excel</button>
                        @endif
                    </div>
                </div>

                <div class="table-responsive">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            {{ $errors->first() }}
                        </div>
                    @endif
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
                                <th>Nama Atas</th>
                                <th>
                                    <Center>Aksi</Center>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pelatihans as $index => $pelatihan)
                                <tr>
                                    <td>{{ $pelatihans->firstItem() + $index }}</td>
                                    <td>{{ $pelatihan->nik }}</td>
                                    <td>{{ $pelatihan->nama }}</td>
                                    <td>{{ $pelatihan->nama_pelatihan }}</td>
                                    <td>{{ $pelatihan->kompetensi_yang_ditingkatkan }}</td>
                                    <td>{{ $pelatihan->jumlah_hari }}</td>
                                    <td>{{ $pelatihan->penyelenggara }}</td>
                                    <td>{{ $pelatihan->tgl_mulai->format('Y-m-d') }}</td>
                                    <td>{{ $pelatihan->tgl_selesai->format('Y-m-d') }}</td>
                                    <td>{{ $pelatihan->jenis_pelatihan }}</td>
                                    <td>{{ $pelatihan->eviden }}</td>
                                    <td>{{ $pelatihan->keterangan }}</td>
                                    <td>{{ $pelatihan->nama_atasan }}</td>
                                    <td>
                                        <div class="d-flex justify-content-center">
                                            @if ($roles == 1)
                                                <a href="{{ route('pelatihan.edit', $pelatihan->id) }}"
                                                    class="btn btn-primary btn-sm btn-circle mr-1">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <a href="{{ route('pelatihan.show', $pelatihan->id) }}"
                                                    class="btn btn-info btn-sm btn-circle mr-1">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                                <button type="button" class="btn btn-danger btn-sm btn-circle"
                                                    data-toggle="modal" data-target="#deleteModal{{ $pelatihan->id }}">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            @else
                                                <a href="{{ route('pelatihan.show', $pelatihan->id) }}"
                                                    class="btn btn-info btn-sm btn-circle mr-1">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                            @endif
                                        </div>
                                    </td>
                                </tr>

                                <!-- Export Excel Modal -->
                                <div class="modal fade" id="exportExcelModal" tabindex="-1" role="dialog"
                                    aria-labelledby="exportExcelModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exportExcelModalLabel">Konfirmasi Export Excel
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <p>Apakah Anda ingin mengekspor data ke dalam format Excel?</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Batal</button>
                                                <form action="{{ route('pelatihan.export.excel') }}" method="POST">
                                                    @csrf
                                                    <button type="submit" class="btn btn-primary">Export</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Delete Modal -->
                                <div class="modal fade" id="deleteModal{{ $pelatihan->id }}" tabindex="-1" role="dialog"
                                    aria-labelledby="deleteModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="deleteModalLabel">Konfirmasi Hapus</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                Apakah Anda yakin ingin menghapus data pelatihan ini?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Batal</button>
                                                <form action="{{ route('pelatihan.destroy', $pelatihan->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Hapus</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-end">
                        {{ $pelatihans->appends(['filter' => request()->input('filter'), 'search' => request()->input('search')])->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

    <script>
        function resetForm() {
            window.location.href = "{{ route('pelatihan.index') }}";
        }
    </script>
@endsection
