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
                            <h1 class="m-0">Laporan</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="{{ url('administrator') }}">Home</a></li>
                                <li class="breadcrumb-item active">Laporan</li>
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
                                            <h5 class="mb-0">Daftar Laporan</h5>
                                            <small></small>
                                        </div>
                                        <div class="col-md-6 text-end">
                                            <a href="javascript:void(0)" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add">Tambah</a>
                                            
                                            <!-- Modal -->
                                            <div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <form method="post">
                                                            @csrf
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Tambah Data</h5>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body text-start">
                                                                <div class="form-group">
                                                                    <label for="">Nama Laporan</label>
                                                                    <input type="text" name="name" id="name" placeholder="Masukan Nama Program" class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-primary">Save</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            
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
                                    
                                    <table class="table table-bordered" id="table">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>NAMA LAPORAN</th>
                                                <th>ACTION</th>
                                            </tr>
                                        </thead>
                                    </table>

                                    <!-- Modal Edit -->
                                    <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <form id="form" method="post">
                                                    @csrf
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Tambah Data</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body text-start">
                                                        <div class="form-group">
                                                            <label for="">Nama Program</label>
                                                            <input type="text" name="name" id="name" placeholder="Masukan Nama Program" class="form-control edit-name">
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Save</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
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
                    const id = $(this).data('id');

                    $('#table').DataTable({
                        processing: true,
                        serverSide: true,
                        ajax: '{!! route('laporan.index') !!}',
                        columns: [
                            { data: 'DT_RowIndex', name: 'id' },
                            { data: 'name', name: 'name' },
                            { data: 'action', name: 'action' },
                        ],
                        "initComplete":function( settings, json){
                            $('.edit').on('click', function(data){

                                const dataID = $(this).data('id');
                                let action = `<?= url('administrator/laporan/edit/${dataID}') ?>`;

                                $('.edit-name').val($(this).data('name'))
                                $('#form').attr('action', action);
                                $('#edit').modal('show');
                            });
                        }
                    });

                    
                });
            </script>
        @endpush

    </div>

</x-app-layout>