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
                                <h4 class="mb-sm-0">Edit</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="{{ url('/') }}/admin/dashboard">Dashboard</a></li>
                                        <li class="breadcrumb-item"><a href="{{ url('/') }}/admin/pasien/{{ $pasien->id }}/show">{{ $pasien->nama }}</a></li>
                                        <li class="breadcrumb-item">Pemeriksaan</li>
                                        <li class="breadcrumb-item active">Edit</li>
                                    </ol>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- end page title -->
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Edit Pemeriksaan {{ $pasien->nama }}</h5>
                            </div>
                            <div class="card-body p-4">
                                <form method="POST" action="{{ url('/') }}/admin/pemeriksaan/{{ $pemeriksaan->id }}/update">
                                    @csrf
                                    <div class="my-3">
                                        <label for="basiInput" class="form-label">Nama Dokter</label>
                                        <input type="text" name="namaDokter" value="{{ $pemeriksaan->namaDokter }}" class="form-control">
                                    </div>
                                    <div class="my-3">
                                        <label for="basiInput" class="form-label">Tinggi Badan</label>
                                        <input type="text" name="tinggi_badan" step="0.01" value="{{ $pemeriksaan->tinggi_badan }}" class="form-control" required>
                                    </div>
                                    <div class="my-3">
                                        <label for="basiInput" class="form-label">Berat Badan</label>
                                        <input type="text" name="berat_badan" step="0.01" value="{{ $pemeriksaan->berat_badan }}" class="form-control" required>
                                    </div>
                                    <div class="my-3">
                                        <label for="basiInput" class="form-label">Lingkar Kepala</label>
                                        <input type="text" name="lingkar_kepala" step="0.01" value="{{ $pemeriksaan->lingkar_kepala }}" class="form-control" required>
                                    </div>
                                    <div class="my-3">
                                        <label for="basiInput" class="form-label">Lingkar Badan</label>
                                        <input type="text" name="lingkar_badan" step="0.01" value="{{ $pemeriksaan->lingkar_badan }}" class="form-control" required>
                                    </div>
                                    <div class="my-3">
                                        <label for="basiInput" class="form-label">Kategori</label>
                                        <select class="form-select" name="kategori">
                                            <option>-- Kategori --</option>
                                            <option @if($pemeriksaan->kategori == "sehat") selected @endif value="sehat">Sehat</option>
                                            <option @if($pemeriksaan->kategori == "kurang gizi") selected @endif value="kurang gizi">Kurang Gizi</option>
                                        </select>
                                    </div>
                                    <div class="my-3">
                                        <label for="basiInput" class="form-label">Catatan</label>
                                        <textarea name="catatan" class="form-control" cols="30" rows="10" required>{{ $pemeriksaan->catatan }}</textarea>
                                    </div>
                                    <div class="my-3">
                                        <button type="submit" class="btn btn-sm btn-warning float-end"><i class=" ri-user-add-line"></i> Edit</button>
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