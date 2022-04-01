@push('style')
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
    <link rel="stylesheet" href="{{ asset('adminlte/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminlte/css/custom.min.css') }}">
@endpush

<div class="preloader flex-column justify-content-center align-items-center">
    <img src="{{ asset('img/loading.gif') }}" alt="Loading" width="200px">
</div>

<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
    </ul>
    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="far fa-user"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <a href="{{ url('administrator/pengaturan') }}" class="dropdown-item">
                    <i class="fas fa-cogs mr-2"></i> Pengaturan
                </a>
                <div class="dropdown-divider"></div>
                <a href="{{ url('administrator/logout') }}" class="dropdown-item dropdown-footer text-danger">Logout</a>
            </div>
        </li>
    </ul>
</nav>