<x-app-layout title="Administrator">

    <div class="wrapper" id="wrapper">

        @push('style')
            <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
        @endpush

        <x-app-admin-header></x-app-admin-header>

        <x-app-admin-sidebar></x-app-admin-sidebar>

        <div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Galeri</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="{{ url('administrator') }}">Home</a></li>
                                <li class="breadcrumb-item active">Galeri</li>
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
                                            <h5 class="mb-0">Daftar Galeri</h5>
                                            <small></small>
                                        </div>
                                        <div class="col-md-6 text-end">
                                            <a href="{{ url('administrator/galeri/add') }}" class="btn btn-primary">Tambah</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="p-3">
                                    <table class="table table-bordered" id="table">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>JUDUL</th>
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

        </div>

        <x-app-admin-footer></x-app-admin-footer>

        @push('script')
            <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
            <script>
                $(document).ready( function () {
                    $('#table').DataTable({
                        processing: true,
                        serverSide: true,
                        ajax: '{!! route('galeri.index') !!}',
                        columns: [
                            { data: 'DT_RowIndex', name: 'id' },
                            { data: 'title', name: 'title' },
                            { data: 'action', name: 'action' },
                        ]
                    });
                });
            </script>
        @endpush

    </div>

</x-app-layout>