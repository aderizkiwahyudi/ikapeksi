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
                            <h1 class="m-0">Pendaftaran Online</h1>
                            <p>Perbarui URL Pendaftaran</p>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="{{ url('administrator') }}">Home</a></li>
                                <li class="breadcrumb-item">Halaman</li>
                                <li class="breadcrumb-item active">Pendaftaran Online</li>
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

                                @if(Session::has('success'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        <strong>Berhasil! </strong> {{ Session::get('success') }}
                                    </div>
                                @endif
                                <div class="row">
                                    <div class="col-md-12 mb-3">
                                        <div class="row align-items-center">
                                            <div class="col-md-10">
                                                <input type="url" placeholder="URL" value="{{ $web->pendaftaran }}" name="url" id="url" class="form-control"/>
                                            </div>
                                            <div class="col-md-2">
                                                <button type="submit" class="btn btn-primary w-100">Simpan</button>
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

    </div>

</x-app-layout>