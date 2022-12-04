@extends('template')

@section('content')
    <!-- start hero section -->
        <section class="section pb-0 hero-section py-5 my-5 bg-stunting-web" id="hero">
            <div class="bg-overlay bg-overlay-pattern"></div>
            <div class="container pb-5 mb-5">
                <div class="col-12 mt-5">
                    <form class="col-12 m-0 p-0" method="GET" action="{{url('/')}}/pencarian">
                        <div class="input-group mb-3 position-relative">
                            <input type="text" class="form-control rounded-pill" name="search" placeholder="Search data Anda" aria-describedby="button">
                            <button class="submit-search top-50 position-absolute translate-middle" type="submit" id="button"><i class="ri-search-2-line"></i></button>
                        </div>
                    </form>
                    <div class="col-12">
                        <div class="col-12 p-3 m-0">
                            <h3 class="d-inline mt-4 mb-2"><b>Hasil Pencarian</b></h3>
                            <div class="col-12 p-4">
                                @foreach ($pasien as $a)
                                <a href="{{ url('/') }}/pencarian/{{ $a->id }}/detail">
                                    <div class="col-12 my-4 p-3 rounded shadow-lg" id="detail-pasien-stunting">
                                        <table class="table table-borderless table-sm">
                                            <tr>
                                                <td>Nama</td>
                                                <td>:</td>
                                                <td>{{ $a->nama }}</td>
                                            </tr>
                                            <tr>
                                                <td>Umur Pendaftaran</td>
                                                <td>:</td>
                                                <td>{{ $a->umur }} Tahun</td>
                                            </tr>
                                            <tr>
                                                <td>Tempat, Tgl Lahir</td>
                                                <td>:</td>
                                                <td>{{ $a->tmpLahir }}, {{ date('d/m/Y', strtotime($a->tglLahir)) }}</td>
                                            </tr>
                                            <tr>
                                                <td>Nama Orang Tua</td>
                                                <td>:</td>
                                                <td>{{ $a->orangTua }}</td>
                                            </tr>
                                            <tr>
                                                <td>Tanggal Mendaftar</td>
                                                <td>:</td>
                                                <td>{{ date('d F Y', strtotime($a->created_at)) }}</td>
                                            </tr>
                                        </table>
                                    </div>
                                </a>
                                @endforeach
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

@endsection