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
                                        <li class="breadcrumb-item active">Tambah</li>
                                    </ol>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- end page title -->
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Tambah Artikel</h5>
                            </div>
                            <div class="card-body p-4">
                                <form method="POST" action="{{ url('/') }}/admin/artikel/store" enctype="multipart/form-data">
                                    @csrf
                                    <div class="my-3">
                                        <label for="basiInput" class="form-label">Judul</label>
                                        <input type="text" name="judul" class="form-control" required>
                                    </div>
                                    <div class="my-3">
                                        <label for="basiInput" class="form-label">Gambar</label>
                                        <input type="file" name="gambar" class="form-control" required>
                                    </div>
                                    <div class="my-3">
                                        <label for="basiInput" class="form-label">Isi</label>
                                        <textarea name="isi" id="ckeditor" class="ckeditor form-control" cols="30" rows="10"></textarea>
                                    </div>
                                    <div class="my-3">
                                        <button type="submit" class="btn btn-sm btn-success float-end"><i class=" ri-user-add-line"></i> Tambah</button>
                                    </div>
                                </form>
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