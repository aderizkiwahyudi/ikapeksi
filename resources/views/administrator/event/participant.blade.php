<x-app-layout title="Administrator">

    <div class="wrapper" id="wrapper">

        @push('style')
            <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
            <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css">
        @endpush

        <x-app-admin-header></x-app-admin-header>

        <x-app-admin-sidebar></x-app-admin-sidebar>

        <div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Peserta Event</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="{{ url('administrator') }}">Home</a></li>
                                <li class="breadcrumb-item active">Peserta Event</li>
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
                                            <h5 class="mb-0">Daftar Peserta Event</h5>
                                            <small></small>
                                        </div>
                                        <div class="col-md-6 text-end">
                                            {{-- <a href="{{ url('administrator/event/add') }}" class="btn btn-primary">Tambah</a> --}}
                                        </div>
                                    </div>
                                </div>
                                <div class="p-3">
                                    <table class="table table-bordered" id="table">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>NAMA</th>
                                                <th>EMAIL</th>
                                                <th>PERUSAHAAN</th>
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
            <script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
            <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
            <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>
            <script>
                $(document).ready( function () {
                    $('#table').DataTable({
                        processing: true,
                        serverSide: true,
                        ajax: '{!! route('event.participant', Request::segment(4)) !!}',
                        dom: 'Bfrtip',
                        buttons: [
                            'copy', 'csv', 'excel', 'pdf', 'print'
                        ],
                        columns: [
                            { data: 'DT_RowIndex', name: 'id' },
                            { data: 'name', name: 'name' },
                            { data: 'email', name: 'email' },
                            { data: 'company', name: 'company' },
                        ]
                    });
                });
            </script>
        @endpush

    </div>

</x-app-layout>