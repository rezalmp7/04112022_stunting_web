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
                                <h4 class="mb-sm-0">Artikel</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="{{ url('/') }}/admin/dashboard">Dashboard</a></li>
                                        <li class="breadcrumb-item"><a href="{{ url('/') }}/admin/admin">Artikel</a></li>
                                        <li class="breadcrumb-item active">Info</li>
                                    </ol>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- end page title -->
                    <div class="col-12">
                        <a class="btn btn-sm btn-danger my-4" href="{{ url('/') }}/admin/artikel"><i class="ri-arrow-left-s-line"></i> Kembali</a>
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0">{{ $artikel->judul }}</h5>
                            </div>
                            <div class="card-body p-4">
                                <img class="col-6" src="{{ url('/') }}/images/artikel/{{ $artikel->gambar }}" />
                                <div class="col-12 py-5">
                                    {!! $artikel->description !!}
                                </div>
                                <div class="col-12 pt-3 pb-5 mb-5" style="color: #888888">
                                    {{ $artikel->create_by }}
                                </div>
                                <div class="col-12 pt-3" style="color: #888888">
                                    {{ date('d F Y', strtotime($artikel->created_at)) }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- container-fluid -->
            </div>
            <!-- End Page-content -->
            <script>
                ClassicEditor
				.create( document.querySelector( '.ckeditor' ), {
					
					licenseKey: '',
					
					
					
				} )
				.then( editor => {
					window.editor = editor;
			
					
					
					
				} )
				.catch( error => {
					console.error( 'Oops, something went wrong!' );
					console.error( 'Please, report the following error on https://github.com/ckeditor/ckeditor5/issues with the build id and the error stack trace:' );
					console.warn( 'Build id: dcxyp633umh-hv5gksn00e91' );
					console.error( error );
				} );
            </script>
@endsection