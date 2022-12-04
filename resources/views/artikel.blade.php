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
                    <div class="row col-12 pb-5 mb-5">
                        <div class="col-6 m-0 p-3">
                            <div class="mt-4 mt-sm-5 pt-sm-5 mb-sm-n5 demo-carousel">
                                <div class="demo-img-patten-top d-none d-sm-block">
                                    <img src="{{ url('/') }}/assets/images/landing/img-pattern.png" class="d-block img-fluid" alt="...">
                                </div>
                                <div class="demo-img-patten-bottom d-none d-sm-block">
                                    <img src="{{ url('/') }}/assets/images/landing/img-pattern.png" class="d-block img-fluid" alt="...">
                                </div>
                                <div class="carousel slide carousel-fade" data-bs-ride="carousel">
                                    <div class="carousel-inner shadow-lg p-2 bg-white rounded">
                                        @foreach ($artikel as $item => $a)
                                        <div class="carousel-item @if($item == 0) active @endif" data-bs-interval="2000">
                                            <img src="{{ url('/') }}/images/artikel/{{ $a->gambar }}" class="d-block w-100" alt="...">
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 m-0 p-3" id="artikel_home">
                            <div class="row col-12 m-0 p-0">
                                @foreach ($artikel as $a)
                                <a class="col-6" href="{{ url('/') }}/artikel/show/{{ $a->id }}">
                                    <div class="card rounded-lg">
                                        <img src="{{ url('/') }}/images/artikel/{{ $a->gambar }}" class="card-img-top" alt="...">
                                        <div class="card-body">
                                            <p class="card-text text-center p-0 m-0"><b>{{ $a->judul }}</b></p>
                                            <span class="writerName">{{ $a->create_by }}</span>
                                            <ul class="list-group list-group-flush p-0 m-0">
                                                <li class="list-group-item p-0 m-0">{{ date('d F Y', strtotime($a->created_at)) }}</li>
                                            </ul>
                                        </div>
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