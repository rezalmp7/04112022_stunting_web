@extends('template')

@section('content')
    <!-- start hero section -->
        <section class="section pb-0 hero-section py-5 my-5" id="hero">
            <div class="bg-overlay bg-overlay-pattern"></div>
            <div class="container pb-5 mb-5">
                <form class="col-12 m-0 p-0">
                    <div class="input-group mb-3 position-relative">
                        <input type="text" class="form-control rounded-pill" placeholder="Search data Anda" aria-describedby="button">
                        <button class="submit-search top-50 position-absolute translate-middle" type="submit" id="button"><i class="ri-search-2-line"></i></button>
                    </div>
                </form>
                <div class="col-12 my-3 mt-5 p-0">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ url('/') }}/artikel">Artikel</a></li>
                            <li class="breadcrumb-item active">{{ $artikel->judul }}</li>
                        </ol>
                    </div>
                </div>
                <div class="col-12 mb-5 pb-5">
                    <div class="card col-12 mb-5 p-3 shadow-lg" style="border-radius: 20px !important" id="artikel_show_home">
                        <div class="col-12 m-0 p-4">
                            <h1>{{ $artikel->judul }}</h1>
                            <p class="fs-6 text text-muted pt-1 pb-3"><b>{{ $artikel->create_by }}</b>, {{ date('d F Y', strtotime($artikel->created_at)) }}</p>
                            <div class="col-8">
                                <img class="img-thumbnail" alt="200x200" src="{{ url('/') }}/images/artikel/{{ $artikel->gambar }}" data-holder-rendered="true">
                            </div>
                            <div class="col-12 m-0 py-3">
                                {!! $artikel->description !!}
                            </div>
                            <div class="col-12 m-0 py-4">
                                <span class="p-0 m-0 fs-6 text text-muted">{{ $artikel->create_by }}</span>
                                <br />
                                <br />
                                <br />
                                <br />
                                <span class="p-0 m-0 fs-6 text text-muted">{{ date('d F Y', strtotime($artikel->created_at)) }}</span>
                            </div>
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