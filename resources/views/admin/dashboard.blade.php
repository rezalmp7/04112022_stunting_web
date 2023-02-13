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
                                <h4 class="mb-sm-0">Dashboard</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item active">Dashboards</li>
                                    </ol>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="row">
                        <div class="col-md-4">
                            <div class="d-flex flex-column h-100">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="card card-animate">
                                            <div class="card-body">
                                                <div class="d-flex justify-content-between">
                                                    <div>
                                                        <p class="fw-medium text-muted mb-0">Pasien Hari Ini</p>
                                                        <h2 class="mt-4 ff-secondary fw-semibold"><span class="counter-value" data-target="{{ $countPemeriksaan }}">0</span></h2>
                                                    </div>
                                                    <div>
                                                        <div class="avatar-sm flex-shrink-0">
                                                            <span class="avatar-title bg-soft-info rounded-circle fs-2">
                                                                <i data-feather="users" class="text-info"></i>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><!-- end card body -->
                                        </div> <!-- end card-->
                                    </div> <!-- end col-->

                                    <div class="col-12">
                                        <div class="card card-animate">
                                            <div class="card-body">
                                                <div class="d-flex justify-content-between">
                                                    <div>
                                                        <p class="fw-medium text-muted mb-0">Anak Stunting Hari Ini</p>
                                                        <h2 class="mt-4 ff-secondary fw-semibold"><span class="counter-value" data-target="{{ $countPemeriksaanKurangSehat }}">0</span></h2>
                                                    </div>
                                                    <div>
                                                        <div class="avatar-sm flex-shrink-0">
                                                            <span class="avatar-title bg-soft-info rounded-circle fs-2">
                                                                <i data-feather="activity" class="text-info"></i>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><!-- end card body -->
                                        </div> <!-- end card-->
                                    </div> <!-- end col-->
                                </div> <!-- end row-->

                            </div>
                        </div> <!-- end col-->

                        <div class="col-md-8">
                            <div class="row h-100">
                                <div class="col-12">
                                    <div class="card card-height-100">
                                        <div class="card-header align-items-center d-flex">
                                            <h4 class="card-title mb-0 flex-grow-1">Laporan Pemeriksaan Perbulan</h4>
                                        </div><!-- end card header -->

                                        <!-- card body -->
                                        <div class="card-body">
                                            <div id="chart" data-colors='["--vz-primary", "--vz-success"]' class="apex-charts" dir="ltr"></div>
                                        </div><!-- end card-body -->
                                        <!-- end card body -->
                                    </div><!-- end card -->
                                </div><!-- end col -->
                            </div> <!-- end row-->
                        </div><!-- end col -->

                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title mb-0">Data Anak</h5>
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
                    </div> <!-- end row-->
                </div>
                <!-- container-fluid -->
            </div>
            <!-- End Page-content -->

            <script>
                var data1 = [];
                var data2 = [];
                var tanggal = [];
            </script>
            @foreach ($pemeriksaan_all_array as $a)
                <script>
                    data1.push({{ $a }});
                </script>
            @endforeach
            @foreach ($pemeriksaan_kurang_gizi_array as $b)
                <script>
                    data2.push({{ $b }});
                </script>
            @endforeach
            @foreach ($pemeriksaan_tanggal as $c)
                <script>
                    tanggal.push('{{ $c }}');
                </script>
            @endforeach
            <script>
                var options = {
                    series: [
                        {
                            name: 'Anak Periksa',
                            type: 'column',
                            data: data1
                        }, {
                            name: 'Anak Stunting',
                            type: 'line',
                            data: data2
                        }
                    ],
                    chart: {
                        height: 350,
                        type: 'line',
                    },
                    stroke: {
                        width: [0, 4]
                    },
                    title: {
                        text: 'Pemeriksaan Hari Ini'
                    },
                    dataLabels: {
                        enabled: true,
                        enabledOnSeries: [1]
                    },
                        labels: tanggal,
                    xaxis: {
                        type: 'datetime'
                    },
                    yaxis: [
                        {
                            title: {
                                text: 'Pasien Periksa',
                            },
                            
                            }, {
                            opposite: true,
                            title: {
                                text: 'Pasien Kurang Gizi'
                            }
                        }
                    ]
                };

                var chart = new ApexCharts(document.querySelector("#chart"), options);
                chart.render();
            
            </script>
@endsection