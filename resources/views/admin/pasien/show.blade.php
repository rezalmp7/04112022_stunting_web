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
                                <h4 class="mb-sm-0">Detail</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="{{ url('/') }}/admin/dashboard">Dashboard</a></li>
                                        <li class="breadcrumb-item"><a href="{{ url('/') }}/admin/pemeriksaan">Pasien</a></li>
                                        <li class="breadcrumb-item active">Detail</li>
                                    </ol>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- end page title -->
                    <div class="col-12">
                        <div class="col-12 p-3 m-0">
                            <h3 class="d-inline mt-4 mb-2"><b>Data Diri</b></h3><a href="{{ url('/') }}/admin/pasien/{{ $pasien->id }}/edit" class="text-warning mx-3 fs-4"><i class="ri-edit-circle-fill"></i></a>
                            <div class="col-12 m-0 p-3 rounded shadow-lg" id="detail-pasien-stunting">
                                <table class="table table-borderless table-sm">
                                    <tr>
                                        <td>Nama</td>
                                        <td>:</td>
                                        <td>{{ $pasien->nama }}</td>
                                    </tr>
                                    <tr>
                                        <td>Umur Pendaftaran</td>
                                        <td>:</td>
                                        <td>{{ $pasien->umur }} Tahun</td>
                                    </tr>
                                    <tr>
                                        <td>Tempat, Tgl Lahir</td>
                                        <td>:</td>
                                        <td>{{ $pasien->tmpLahir }}, {{ date('d/m/Y', strtotime($pasien->tglLahir)) }}</td>
                                    </tr>
                                    <tr>
                                        <td>Nama Orang Tua</td>
                                        <td>:</td>
                                        <td>{{ $pasien->orangTua }}</td>
                                    </tr>
                                    <tr>
                                        <td>Tanggal Mendaftar</td>
                                        <td>:</td>
                                        <td>{{ date('d F Y', strtotime($pasien->created_at)) }}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <div class="col-12 p-3 m-0">
                            <div class="card rounded-4">
                                <div class="card-header">
                                    <h3 class="d-inline mt-4 mb-2"><b>Daftar Pemeriksaan</b></h3><a href="{{ url('/') }}/admin/pemeriksaan/{{ $pasien->id }}/create" class="text-success mx-3 fs-4"><i class="ri-heart-add-fill"></i></a>
                                </div>
                                <div class="card-body">
                                    <div class="col-12 m-0 p-3">
                                        <form method="GET" action="#">
                                            <div class="input-group form-sm mb-3">
                                                @if($filter != null)
                                                <input type="text" name="filter" value="{{ $filter }}" class="form-control form-control-sm" placeholder="filter" id="filter">
                                                @else
                                                <input type="text" name="filter" class="form-control form-control-sm" placeholder="filter" id="filter">
                                                @endif
                                                <button class="btn btn-primary btn-sm" type="submit" id="button-addon2">Filter</button>
                                                <a class="btn btn-danger btn-sm" href="{{ url('/') }}/admin/pasien/{{ $pasien->id }}/show" id="button-addon2">Clear</a>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="col-12 m-0 p-0" style="height: 500px; overflow-y: scroll; overflow-x: hidden;">
                                        @foreach ($pemeriksaan as $value)
                                        <div class="col-12 my-3 p-3 shadow-lg rounded-4">
                                            <div class="row">
                                                <div class="col-auto">
                                                    <a href="{{ url('/') }}/admin/pemeriksaan/{{ $value->id }}/edit" class="text-warning fs-4"><i class="ri-edit-circle-fill"></i></a>
                                                    <a href="{{ url('/') }}/admin/pemeriksaan/{{ $value->id }}/destroy" onclick="return confirm('Ingin menghapus diagnosa ini?');" class="text-danger fs-4"><i class="ri-delete-bin-fill"></i></a>
                                                </div>
                                                <div class="col">
                                                    <div class="m-0 p-0" style="color: grey; font-size: 12px;">{{ date('d/m/Y', strtotime($value->created_at)) }}</div>
                                                    <div class="m-0 p-0" style="color: rgb(94, 94, 94); font-size: 12px;">{{ $value->namaDokter }}</div>
                                                    <table class="table p-0 my-3 table-borderless table-sm">
                                                        <tr>
                                                            <td class="p-0"><b>Diagnosis</b></td>
                                                            <td class="p-0">:</td>
                                                            <td class="p-0">{{ $value->description }}</td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- container-fluid -->
            </div>
            <!-- End Page-content -->
            <script>
                $("#filter").flatpickr(
                    {
                        mode: "range"
                    }
                );
            </script>
@endsection