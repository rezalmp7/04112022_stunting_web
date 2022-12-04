@extends('admin/template')

@section('content')
    <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                <h4 class="mb-sm-0">Tambah</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="{{ url('/') }}/admin/dashboard">Dashboard</a></li>
                                        <li class="breadcrumb-item"><a href="{{ url('/') }}/admin/pemeriksaan">Pasien</a></li>
                                        <li class="breadcrumb-item active">Tambah</li>
                                    </ol>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- end page title -->
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Tambah Pemeriksaan </h5>
                            </div>
                            <div class="card-body p-4">
                                <form method="POST" action="{{ url('/') }}/admin/pemeriksaan/{{ $pasien->id }}/store">
                                    @csrf
                                    <div class="my-3">
                                        <label for="basiInput" class="form-label">Nama Dokter</label>
                                        <input type="text" name="namaDokter" class="form-control" required>
                                    </div>
                                    <div class="my-3">
                                        <label for="basiInput" class="form-label">Tinggi Badan</label>
                                        <input type="text" name="tinggi_badan" step="0.01" class="form-control" required>
                                    </div>
                                    <div class="my-3">
                                        <label for="basiInput" class="form-label">Berat Badan</label>
                                        <input type="text" name="berat_badan" step="0.01" class="form-control" required>
                                    </div>
                                    <div class="my-3">
                                        <label for="basiInput" class="form-label">Lingkar Kepala</label>
                                        <input type="text" name="lingkar_kepala" step="0.01" class="form-control" required>
                                    </div>
                                    <div class="my-3">
                                        <label for="basiInput" class="form-label">Lingkar Badan</label>
                                        <input type="text" name="lingkar_badan" step="0.01" class="form-control" required>
                                    </div>
                                    <div class="my-3">
                                        <label for="basiInput" class="form-label">Kategori</label>
                                        <select class="form-select" name="kategori">
                                            <option selected>-- Kategori --</option>
                                            <option value="sehat">Sehat</option>
                                            <option value="kurang gizi">Kurang Gizi</option>
                                        </select>
                                    </div>
                                    <div class="my-3">
                                        <label for="basiInput" class="form-label">Catatan</label>
                                        <textarea name="catatan" class="form-control" cols="30" rows="10" required></textarea>
                                    </div>
                                    <div class="my-3">
                                        <button class="btn btn-sm btn-success float-end"><i class=" ri-user-add-line"></i> Tambah</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- container-fluid -->
            </div>
            <!-- End Page-content -->
@endsection