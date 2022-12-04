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
                                <h5 class="card-title mb-0">Tambah Pasien</h5>
                            </div>
                            <div class="card-body p-4">
                                <form method="POST" action="{{ url('/') }}/admin/pasien/store">
                                    @csrf
                                    <div class="my-3">
                                        <label for="basiInput" class="form-label">Nama</label>
                                        <input type="text" name="nama" class="form-control" required>
                                    </div>
                                    <div class="my-3">
                                        <label for="basiInput" class="form-label">NIK</label>
                                        <input type="number" name="nik" class="form-control" required>
                                    </div>
                                    <div class="my-3">
                                        <label for="basiInput" class="form-label">KK</label>
                                        <input type="number" name="kk" class="form-control" required>
                                    </div>
                                    <div class="my-3">
                                        <label for="basiInput" class="form-label">Jenis Kelamin</label>
                                        <select class="form-select" name="jenis_kelamin">
                                            <option selected>-- Jenis Kelamin --</option>
                                            <option value="1">Laki - laki</option>
                                            <option value="2">Perempuan</option>
                                        </select>
                                    </div>
                                    <div class="my-3">
                                        <label for="basiInput" class="form-label">Alamat</label>
                                        <textarea name="alamat" class="form-control" cols="30" rows="10" required></textarea>
                                    </div>
                                    <div class="my-3">
                                        <label for="basiInput" class="form-label">Tempat Lahir</label>
                                        <input type="text" name="tmpLahir" class="form-control" required>
                                    </div>
                                    <div class="my-3">
                                        <label for="basiInput" class="form-label">Tanggal Lahir</label>
                                        <input type="date" name="tglLahir" class="form-control" required>
                                    </div>
                                    <div class="my-3">
                                        <label for="basiInput" class="form-label">Nama Orang Tua</label>
                                        <input type="text" name="orangTua" class="form-control" required>
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