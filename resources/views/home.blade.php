@extends('template')

@section('content')
    <!-- start hero section -->
        <section class="section pb-0 hero-section py-5 my-5" id="home">
            <div class="bg-overlay bg-stunting-web"></div>
            <div class="container pb-5 mb-5">
                <div class="col-12 my-5 py-5">
                    <div class="row justify-content-center">
                        <img class="col-sm-8 col-md-4 col-lg-2 col-10" src="{{ url('/') }}/assets/images/logo-sm.png">
                        <h1 class="col-12 m-0 text-center">
                            <b>SISTEM INFORMASI STUNTING KELURAHAN PLEBURAN</b>
                        </h1>
                        <div class="col-12 mt-5 pt-5 text-center label-home-search">
                            <b>Cari Data Anda</b>
                        </div>
                        <form class="col-12 m-0 p-0" method="GET" action="{{url('/')}}/pencarian">
                            <div class="input-group mb-3 position-relative">
                                <input type="text" class="form-control rounded-pill" name="search" placeholder="Search data Anda" aria-describedby="button">
                                <button class="submit-search top-50 position-absolute translate-middle" type="submit" id="button"><i class="ri-search-2-line"></i></button>
                            </div>
                        </form>
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