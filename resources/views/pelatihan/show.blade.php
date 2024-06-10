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
                <div id="evaluationForm">
                    <h5 class="text-center mt-4 mb-3" style="font-weight: bold;">FORM EVALUASI PELATIHAN</h5>
                    <table class="table table-bordered mt-4">
                        <tbody>
                            <tr>
                                <th>Judul Pelatihan</th>
                                <td colspan="2"> : </td>
                                <td colspan="3">{{ $pelatihan->nama_pelatihan }}</td>
                            </tr>
                            <tr>
                                <th>Tanggal Pelaksanaan</th>
                                <td colspan="2"> : </td>
                                <td colspan="3">
                                    <?php
                                    setlocale(LC_TIME, 'id_ID');
                                    echo strftime('%e %B %Y', strtotime($pelatihan->tgl_mulai)) . ' sampai dengan ' . strftime('%e %B %Y', strtotime($pelatihan->tgl_selesai));
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <th>Nama Peserta Pelatihan</th>
                                <td colspan="2"> : </td>
                                <td colspan="3">{{ $pelatihan->nama }}</td>
                            </tr>
                            <tr>
                                <th>Penyelenggara Pelatihan</th>
                                <td colspan="2"> : </td>
                                <td colspan="3">{{ $pelatihan->penyelenggara }}</td>
                            </tr>
                            <tr>
                                <th>Tujuan Pelatihan</th>
                                <td colspan="2"> : </td>
                                <td colspan="3">
                                    {{ $pelatihan->kompetensi_yang_ditingkatkan }}
                                </td>
                            </tr>
                        </tbody>
                    </table>

                    <table class="table table-bordered mt-4">
                        <tbody>
                            <tr>
                                <td colspan="6">
                                    <strong>A. Evaluasi Penyelenggaraan Pelatihan</strong>
                                    <p>(Diisi oleh peserta setelah mengikuti pelatihan)</p>
                                    <p style="margin-bottom: -5px;">Ket : 5: sangat puas; 4: puas; 3: cukup puas; 2: kurang
                                        puas; 1: tidak puas</p>
                                </td>
                            </tr>
                            <tr>
                                <th class="text-center">Kriteria Evaluasi</th>
                                <th colspan="5" class="text-center">Kepuasan</th>
                            </tr>
                            <tr>
                                <td>1. Kelengkapan bahan pelatihan</td>
                                <th class="text-center">5</th>
                                <th class="text-center">4</th>
                                <th class="text-center">3</th>
                                <th class="text-center">2</th>
                                <th class="text-center">1</th>
                            </tr>
                            <tr>
                                <td>2. Kedalaman pembahasan</td>
                                <th class="text-center">5</th>
                                <th class="text-center">4</th>
                                <th class="text-center">3</th>
                                <th class="text-center">2</th>
                                <th class="text-center">1</th>
                            </tr>
                            <tr>
                                <td>3. Efisiensi penggunaan waktu</td>
                                <th class="text-center">5</th>
                                <th class="text-center">4</th>
                                <th class="text-center">3</th>
                                <th class="text-center">2</th>
                                <th class="text-center">1</th>
                            </tr>
                            <tr>
                                <td>4. Keterkaitan program dengan pekerjaan Anda</td>
                                <th class="text-center">5</th>
                                <th class="text-center">4</th>
                                <th class="text-center">3</th>
                                <th class="text-center">2</th>
                                <th class="text-center">1</th>
                            </tr>
                            <tr>
                                <td>5. Manfaat program bagi anda/perusahaan</td>
                                <th class="text-center">5</th>
                                <th class="text-center">4</th>
                                <th class="text-center">3</th>
                                <th class="text-center">2</th>
                                <th class="text-center">1</th>
                            </tr>
                            <tr>
                                <td>6. Pengetahuan/pemahaman Instruktur terhadap topik</td>
                                <th class="text-center">5</th>
                                <th class="text-center">4</th>
                                <th class="text-center">3</th>
                                <th class="text-center">2</th>
                                <th class="text-center">1</th>
                            </tr>
                            <tr>
                                <td>7. Komunikasi dan atensi Instruktur terhadap peserta</td>
                                <th class="text-center">5</th>
                                <th class="text-center">4</th>
                                <th class="text-center">3</th>
                                <th class="text-center">2</th>
                                <th class="text-center">1</th>
                            </tr>
                            <tr>
                                <td>8. Kemampuan Instruktur membawakan materi</td>
                                <th class="text-center">5</th>
                                <th class="text-center">4</th>
                                <th class="text-center">3</th>
                                <th class="text-center">2</th>
                                <th class="text-center">1</th>
                            </tr>
                            <tr>
                                <td colspan="6">
                                    <strong>Komentar/Saran:</strong>
                                    <p>Tanda Tangan Peserta: ..................................</p>
                                    <p style="margin-left: 180px; margin-top: -20px; margin-bottom: -5px;">
                                        {{ $pelatihan->nama }}</p>
                                </td>
                            </tr>

                            <tr>
                                <td colspan="6">
                                    <strong>C. Evaluasi Efektivitas Pelatihan</strong>
                                    <p>(Diisi oleh atasan langsung untuk menilai efektivitas pelatihan setelah 3 bulan
                                        penerapan)</p>
                                    <p>• Apakah Tujuan Pelatihan tercapai? Ya</p>
                                    <p>• Apakah nilai tambah/peningkatan yang terjadi hasil pelatihan bagi
                                        peserta/perusahaan:
                                    </p>
                                    <p>Tanda Tangan Peserta: ..................................</p>
                                    <p style="margin-left: 180px; margin-top: -20px; margin-bottom: -5px;">
                                        {{ $pelatihan->nama }}</p>
                                    <p>Tanda Tangan Atasan Langsung: ..................................</p>
                                    <p style="margin-left: 255px; margin-top: -20px; margin-bottom: -5px;">
                                        {{ $pelatihan->nama_atasan }}</p>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="form-group">
                    <a href="{{ route('pelatihan.index') }}" class="btn btn-secondary">Kembali</a>
                    <button onclick="printEvaluationForm()" class="btn btn-primary">Print</button>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->
    <script>
        function printEvaluationForm() {
            var printContents = document.getElementById('evaluationForm').innerHTML;
            var originalContents = document.body.innerHTML;
            document.body.innerHTML = printContents;
            window.print();
            document.body.innerHTML = originalContents;
        }
    </script>
@endsection
