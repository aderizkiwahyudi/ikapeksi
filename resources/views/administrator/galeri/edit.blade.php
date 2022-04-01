<x-app-layout title="Administrator">

    <div class="wrapper" id="wrapper">

        @push('style')
        @endpush

        <x-app-admin-header></x-app-admin-header>

        <x-app-admin-sidebar></x-app-admin-sidebar>

        <div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Galeri</h1>
                            <p>Edit Galeri</p>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="{{ url('administrator') }}">Home</a></li>
                                <li class="breadcrumb-item"><a href="{{ url('administrator/news') }}">Galeri</a></li>
                                <li class="breadcrumb-item active">Add</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
      
            <form method="post" enctype="multipart/form-data">
                @csrf
                <section class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                @if($errors->any())
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        <strong>Gagal! </strong>
                                        <ul>
                                            @foreach ($errors->all() as $item)
                                                <li>{{ $item }}</li>
                                            @endforeach
                                        </ul> 
                                    </div>
                                @endif
                                <div class="row">
                                    <div class="col-md-12 mb-3">
                                        <div class="row align-items-center">
                                            <div class="col-md-10">
                                                <input type="text" value="{{ $galeri->title }}" placeholder="Judul" name="title" id="title" class="form-control"/>
                                            </div>
                                            <div class="col-md-2">
                                                <button type="submit" class="btn btn-primary w-100">Simpan</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <textarea name="text" class="editor">{{ $galeri->text }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row my-3">
                            <div class="col-md-12">
                                <div class="bg-white shadow-sm rounded">
                                    <div class="p-3 border-bottom">
                                        <div class="row align-items-center justify-content-between">
                                            <div class="col-md-6">
                                                <h5 class="mb-0">Daftar Foto</h5>
                                                <small></small>
                                            </div>
                                            <div class="col-md-6 text-end">
                                                <a href="javascript:void(0)" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modelId">Tambah</a>                                          
                                            </div>
                                        </div>
                                    </div>
                                    <div class="p-3">
                                        <table class="table table-bordered" id="table">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>GAMBAR</th>
                                                    <th>ACTION</th>
                                                </tr>
                                            </thead>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </form>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <form action="{{ route('add.photo', Request::segment(4)) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Tambah Gambar</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <input type="file" name="photo[]" id="photo" class="form-control" required multiple/>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <x-app-admin-footer></x-app-admin-footer>

        @push('script')
            <script src="{{ asset('plugin/ckeditor/build/ckeditor.js') }}"></script>
            <script src="{{ asset('plugin/ckfinder/ckfinder.js') }}"></script>
            <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
            <script>
                $(document).ready( function () {
                    ClassicEditor
                    .create( document.querySelector( '.editor' ), {
                        licenseKey: '',
                        ckfinder: {
                            uploadUrl: '{!! asset("plugin/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files&responseType=json") !!}',
                            options: {
                                resourceType: 'Images'
                            }
                        },
                    })
                    .then( editor => {
                        window.editor = editor;
                    })
                    .catch( error => {
                        console.error( 'Oops, something went wrong!' );
                        console.error( 'Please, report the following error on https://github.com/ckeditor/ckeditor5/issues with the build id and the error stack trace:' );
                        console.warn( 'Build id: nyny6d5pm98w-f9z6zbpoy7ms' );
                        console.error( error );
                    });
                    
                    $('#table').DataTable({
                        processing: true,
                        serverSide: true,
                        ajax: '{!! route('galeri.photo.index', Request::segment(4)) !!}',
                        columns: [
                            { data: 'DT_RowIndex', name: 'id' },
                            { data: 'photo', name: 'photo' },
                            { data: 'action', name: 'action' },
                        ]
                    });
                });
            </script>
        @endpush

    </div>

</x-app-layout>