<x-app-layout title="Administrator">

    <div class="wrapper" id="wrapper">

        <x-app-admin-header></x-app-admin-header>

        <x-app-admin-sidebar></x-app-admin-sidebar>

        <div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Laporan</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="{{ url('administrator') }}">Home</a></li>
                                <li class="breadcrumb-item"><a href="{{ url('administrator/laporan') }}">Laporan</a></li>
                                <li class="breadcrumb-item">Files</li>
                                <li class="breadcrumb-item active">Add</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
      
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="bg-white shadow-sm rounded">
                                <div class="p-3 border-bottom">
                                    <div class="row align-items-center justify-content-between">
                                        <div class="col-md-6">
                                            <h5 class="mb-0">Tambah Laporan</h5>
                                            <small>Tambah Files Laporan Anda</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="p-3">
                                    @if($errors->any())
                                        <div class="alert alert-danger" role="alert">
                                            <strong>Gagal!</strong>
                                            <ul>
                                                @foreach ($errors->all() as $item)
                                                    <li>{{ $item }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                    <form method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <label for="">Nama</label>
                                            <input type="text" placeholder="Enter name" name="name" class="form-control"/>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Thumbnail</label>
                                            <input type="file" name="thumbnail" class="form-control"/>
                                        </div>
                                        <div class="form-group">
                                            <label for="">File PDF</label>
                                            <input type="file" name="file" class="form-control"/>
                                        </div>
                                        <button type="submit" class="btn btn-primary w-100">SIMPAN</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        </div>

        <x-app-admin-footer></x-app-admin-footer>

    </div>

</x-app-layout>