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
                            <h1 class="m-0">Edit Berita</h1>
                            <p>Lakukan Perubahan Pada Berita</p>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="{{ url('administrator') }}">Home</a></li>
                                <li class="breadcrumb-item"><a href="{{ url('administrator/news') }}">Berita</a></li>
                                <li class="breadcrumb-item active">Edit</li>
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
                                                <input type="text" placeholder="Judul" value="{{ $news->title }}" name="title" id="title" class="form-control"/>
                                            </div>
                                            <div class="col-md-2">
                                                <button type="submit" class="btn btn-primary w-100">Simpan</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-9 mb-3">
                                        <textarea name="text" class="editor">{{ $news->text }}</textarea>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="bg-white shadow-sm border mb-3">
                                            <div class="widget-header p-3 border-bottom">
                                                <strong>Thumbnail</strong>
                                            </div>
                                            <div class="p-3">
                                                <div class="form-group">
                                                    <input type="file" name="thumbnail" id="thumbnail" class="form-control"/>
                                                </div>
                                                <img src="{{ $news->thumbnail }}" alt="thumbnail" width="100%"/>
                                            </div>
                                        </div>
                                        <div class="bg-white shadow-sm border mb-3">
                                            <div class="widget-header p-3 border-bottom">
                                                <strong>Kategori</strong>
                                            </div>
                                            <div class="p-3">
                                                <div class="form-group mb-0">
                                                    @foreach ($categories as $item)
                                                        <div class="form-group mb-1">
                                                            <input type="checkbox" name="categories[]" value="{{ $item->id }}" {{ in_array($item->id, $cs) ? 'checked' : '' }}/>
                                                            <label for="">{{ $item->name }}</label>                                                    
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </form>

        </div>

        <x-app-admin-footer></x-app-admin-footer>

        @push('script')
            <script src="{{ asset('plugin/ckeditor/build/ckeditor.js') }}"></script>
            <script src="{{ asset('plugin/ckfinder/ckfinder.js') }}"></script>
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
                });
            </script>
        @endpush

    </div>

</x-app-layout>