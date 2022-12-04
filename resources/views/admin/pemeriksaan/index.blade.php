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
                                <h4 class="mb-sm-0">Pemeriksaan</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item active">Pemeriksaan</li>
                                    </ol>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- end page title -->
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0 d-inline">List Pemeriksaan</h5>
                                <a href="{{ url('/') }}/admin/pasien/create" class="btn btn-success btn-sm float-end"><i class=" ri-user-add-line"></i> Tambah Pasien</a>
                            </div>
                            <div class="card-body">
                                <table id="example" class="table dt-responsive nowrap table-striped align-middle" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th data-ordering="false">No.</th>
                                            <th>Nama</th>
                                            <th>Umur</th>
                                            <th>Alamat</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($pasien as $item => $value)
                                        @php
                                            $birthDate = new DateTime($value->tglLahir);
	                                        $today = new DateTime("today");   
                                        @endphp
                                        <tr>
                                            <td>{{ $item+1 }}</td>
                                            <td>{{ $value->nama }}  </td>
                                            <td>{{ $today->diff($birthDate)->y }} Thn {{ $today->diff($birthDate)->m }} Bulan</td>
                                            <td>{{ $value->alamat }}  </td>
                                            <td>
                                                <div class="dropdown d-inline-block">
                                                    <button class="btn btn-soft-secondary btn-sm dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                        <i class="ri-more-fill align-middle"></i>
                                                    </button>
                                                    <ul class="dropdown-menu dropdown-menu-end">
                                                        <li><a href="{{ url('/') }}/admin/pasien/{{ $value->id }}/show" class="dropdown-item"><i class="ri-eye-fill align-bottom me-2 text-muted"></i> View</a></li>
                                                        <li><a href="{{ url('/') }}/admin/pasien/{{ $value->id }}/show" class="dropdown-item"><i class="ri-heart-2-line align-bottom me-2 text-muted"></i> Periksan</a></li>
                                                        <li><a href="{{ url('/') }}/admin/pasien/{{ $value->id }}/edit" class="dropdown-item edit-item-btn"><i class="ri-pencil-fill align-bottom me-2 text-muted"></i> Edit</a></li>
                                                        <li>
                                                            <a href="{{ url('/') }}/admin/pasien/{{ $value->id }}/destroy" onclick="return confirm('Ingin menghapus {{ $value->nama }} dari daftar pasien?');" class="dropdown-item remove-item-btn">
                                                                <i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i> Delete
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- container-fluid -->
            </div>
            <!-- End Page-content -->
@endsection