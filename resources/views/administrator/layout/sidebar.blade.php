<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="{{ url('administrator') }}" class="brand-link text-center">
        <span class="brand-text font-weight-light">Admin Dashboard</span>
    </a>
    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{ url('administrator') }}" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('administrator/news') }}" class="nav-link">
                        <i class="nav-icon fas fa-newspaper"></i>
                        <p>
                            Berita
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-list"></i>
                        <p>
                            Tentang Kami
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ url('administrator/page/sejarah') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Sejarah</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('administrator/page/uu-ad-art') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>UU/AD/ART</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('administrator/page/peraturan-dan-pedoman-organisasi') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Peraturan dan Pedoman</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('administrator/page/lambang') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Lambang</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('administrator/page/mars-hymne') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Mars & Hymne</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('administrator/page/struktur-organisasi') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Strtuktur Organisasi</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('administrator/page/visi-misi') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Visi & Misi</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Keanggotaan
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ url('administrator/page/persyaratan-prosedur') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Persyaratan & Prosedur</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('administrator/page/pendaftaran-online') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Pendaftaran Online</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('administrator/page/asosiasi-himoynan') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Asosiasi/Himoynan</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('administrator/page/asosiasi-terakreditasi') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Asosiasi Terakreditasi</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="{{ url('administrator/event') }}" class="nav-link">
                        <i class="nav-icon fas fa-calendar-alt"></i>
                        <p>
                            Event
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('administrator/galeri') }}" class="nav-link">
                        <i class="nav-icon fas fa-images"></i>
                        <p>
                            Galeri
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('administrator/laporan') }}" class="nav-link">
                        <i class="nav-icon fas fa-file-alt"></i>
                        <p>
                            Laporan
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('administrator/program') }}" class="nav-link">
                        <i class="nav-icon fas fa-project-diagram"></i>
                        <p>
                            Program
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('administrator/review') }}" class="nav-link">
                        <i class="nav-icon fas fa-star"></i>
                        <p>
                            Ulasan
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('administrator/pengaturan-web') }}" class="nav-link">
                        <i class="nav-icon fas fa-globe"></i>
                        <p>
                            Web
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('administrator/pengaturan') }}" class="nav-link">
                        <i class="nav-icon fas fa-cogs"></i>
                        <p>
                            Pengaturan
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('administrator/logout') }}" class="nav-link">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>
                            Logout
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>