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
                                        <li class="breadcrumb-item"><a href="{{ url('/') }}/admin/pemeriksaan">Pasien</a></li>
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
                                <h5 class="card-title mb-0">Edit Pasien</h5>
                            </div>
                            <div class="card-body p-4">
                                <form method="POST" action="{{ url('/') }}/admin/pasien/update/{{ $pasien->id }}">
                                    @csrf
                                    <div class="my-3">
                                        <label for="basiInput" class="form-label">Nama</label>
                                        <input type="text" name="nama" class="form-control" value="{{ $pasien->nama }}" required>
                                    </div>
                                    <div class="my-3">
                                        <label for="basiInput" class="form-label">Umur</label>
                                        <input type="number" name="umur" class="form-control" value="{{ $pasien->umur }}" required>
                                    </div>
                                    <div class="my-3">
                                        <label for="basiInput" class="form-label">Alamat</label>
                                        <textarea name="alamat" class="form-control" cols="30" rows="10" required>{{ $pasien->alamat }}</textarea>
                                    </div>
                                    <div class="my-3">
                                        <label for="basiInput" class="form-label">Tempat Lahir</label>
                                        <input type="text" name="tmpLahir" class="form-control" value="{{ $pasien->tmpLahir }}" required>
                                    </div>
                                    <div class="my-3">
                                        <label for="basiInput" class="form-label">Tanggal Lahir</label>
                                        <input type="date" name="tglLahir" class="form-control" value="{{ $pasien->tglLahir }}" required>
                                    </div>
                                    <div class="my-3">
                                        <label for="basiInput" class="form-label">Nama Orang Tua</label>
                                        <input type="text" name="orangTua" class="form-control" value="{{ $pasien->orangTua }}" required>
                                    </div>
                                    <div class="my-3">
                                        <button class="btn btn-sm btn-warning float-end"><i class="ri-edit-2-line"></i> Edit</button>
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