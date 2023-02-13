@extends('template')

@section('content')
    <!-- start hero section -->
        <section class="section pb-0 hero-section py-5 my-5 bg-stunting-web" id="hero">
            <div class="bg-overlay bg-overlay-pattern"></div>
            <div class="container-fluid p-5 mb-5">
                <div class="col-12 mt-5">
                    <div class="col-12 row">
                        <div class="col-4 p-3 m-0">
                            <h3 class="d-inline mt-4 mb-2"><b>Data Diri</b></h3>
                            
                            @php
                                $birthDate = new DateTime($pasien->tglLahir);
                                $today = new DateTime("today");   
                            @endphp
                            <div class="col-12 m-0 p-3 rounded shadow-lg" id="detail-pasien-stunting">
                                <table class="table fs-6 table-borderless table-sm">
                                    @php
                                        $nikArray = str_split($pasien->nik);  
                                        $kkArray = str_split($pasien->kk);  
                                    @endphp
                                    <tr>
                                        <td>Nama</td>
                                        <td>:</td>
                                        <td>{{ $pasien->nama }}</td>
                                    </tr>
                                    <tr>
                                        <td>NIK</td>
                                        <td>:</td>
                                        <td>{{ $nikArray[0].$nikArray[1].$nikArray[2]."xxxxxxxxxxxx" }}</td>
                                    </tr>
                                    <tr>
                                        <td>KK</td>
                                        <td>:</td>
                                        <td>{{ $kkArray[0].$kkArray[1].$kkArray[2]."xxxxxxxxxxxx" }}</td>
                                    </tr>
                                    <tr>
                                        <td>Umur Pendaftaran</td>
                                        <td>:</td>
                                        <td>{{ $today->diff($birthDate)->y }} Thn {{ $today->diff($birthDate)->m }} Bulan</td>
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
                        <div class="col-8 p-3 m-0">
                            <div class="card rounded-4 bg-transparent">
                                <div class="card-header bg-transparent">
                                    <h3 class="d-inline mt-4 mb-2"><b>Daftar Pemeriksaan</b></h3>
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
                                                <a class="btn btn-danger btn-sm" href="{{ url('/') }}/pencarian/{{ $pasien->id }}/detail" id="button-addon2">Clear</a>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="col-12 m-0 p-0" style="height: 500px; overflow-y: scroll; overflow-x: hidden;">
                                        @foreach ($pemeriksaan as $value)
                                        <div class="col-12 my-3 p-3 shadow-lg @if($value->kategori == "sehat") bg-success @else bg-danger @endif rounded-4">
                                            <div class="row">
                                                <div class="col">
                                                    <div class="m-0 p-0" style="color: rgb(0, 0, 0); font-size: 12px;">{{ date('d/m/Y', strtotime($value->created_at)) }}</div>
                                                    <div class="m-0 p-0" style="color: rgb(0, 0, 0); font-size: 12px;">{{ $value->namaDokter }}</div>
                                                    <table class="table p-0 my-3 table-borderless table-sm">
                                                        <tr>
                                                            <td class="p-0"><b>Tinggi Badan : </b> {{ $value->tinggi_badan }}</td>
                                                            <td class="p-0"><b>Berat Badan : </b> {{ $value->berat_badan }}</td>
                                                            <td class="p-0"><b>Lingkar Kepala : </b> {{ $value->lingkar_kepala }}</td>
                                                            <td class="p-0"><b>Lingkar Badan : </b> {{ $value->lingkar_badan }}</td>
                                                        </tr>
                                                    </table>
                                                    <p class="fs-6">
                                                        <b>Noted</b>: {{$value->catatan}}
                                                    </p>
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
                <div class="col-12 m-0">
                </div>
            </div>
            <!-- end container -->
            <div class="position-absolute start-0 end-0 bottom-0 hero-shape-svg">
                <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 1440 120">
                    <g mask="url(&quot;#SvgjsMask1003&quot;)" fill="none">
                        <path d="M 0,118 C 288,98.6 1152,40.4 1440,21L1440 140L0 140z">
                        </path>
                    </g>
                </svg>
            </div>
            <!-- end shape -->
        </section>
        <!-- end hero section -->

        <script>
            $("#filter").flatpickr(
                {
                    mode: "range"
                }
            );
        </script>
@endsection