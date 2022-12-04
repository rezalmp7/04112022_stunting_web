@extends('template')

@section('content')
    <!-- start hero section -->
        <section class="section pb-0 hero-section py-5 my-5 bg-stunting-web" id="hero">
            <div class="container pb-5 mb-5">
                <div class="col-12 mt-5">
                    <form class="col-12 m-0 p-0" method="GET" action="{{url('/')}}/pencarian">
                        <div class="input-group mb-3 position-relative">
                            <input type="text" class="form-control rounded-pill" name="search" placeholder="Search data Anda" aria-describedby="button">
                            <button class="submit-search top-50 position-absolute translate-middle" type="submit" id="button"><i class="ri-search-2-line"></i></button>
                        </div>
                    </form>
                    <div class="col-12 mb-5">
                        <div class="col-12 my-4 rounded shadow-lg table-responsive bg-light">
                            <table class="table">
                                <thead>
                                    <th class="text-center">Nama Balita</th>
                                    <th class="text-center">NIK</th>
                                    <th class="text-center">NO. KK</th>
                                    <th class="text-center">Tempat Tanggal Lahir</th>
                                    <th class="text-center">Jenis Kelamin</th>
                                    <th class="text-center">Umur (Tahun)</th>
                                    <th class="text-center">Nama Ibu Kandung</th>
                                    <th class="text-center">Alamat</th>
                                    <th class="text-center">Catatan Khusus</th>
                                </thead>
                                <tbody>
                                    @foreach ($pemeriksaan as $a)
                                    @php
                                        $birthDate = new DateTime($a->tglLahir);
                                        $today = new DateTime("today");   
                                    @endphp
                                    <tr class="fs-6">
                                        <th scope="row">{{ $a->nama }}</th>
                                        <td>{{ $a->nik }}</td>
                                        <td>{{ $a->kk }}</td>
                                        <td>{{ $a->tmpLahir }}, {{ date('d/m/Y', strtotime($a->tglLahir)) }}</td>
                                        <td>@if ($a->jenis_kelamin == "1")
                                            Laki - laki
                                        @else
                                            Perempuan
                                        @endif</td>
                                        <td>{{ $today->diff($birthDate)->y }} Thn {{ $today->diff($birthDate)->m }} Bulan</td>
                                        <td>{{ $a->orangTua }}</td>
                                        <td>{{ $a->alamat }}</td>
                                        <td>{{ $a->catatan }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
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

@endsection