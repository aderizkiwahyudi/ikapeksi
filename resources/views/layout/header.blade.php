<div class="background-navigation"></div>
<header>
    <div class="header container">
        <div class="d-flex align-items-center justify-content-between">
            <div class="logo">
                <a href="{{ url('/') }}"><img src="{{ $web->logo }}" alt="{{ $web->name }}" width="100px"/></a>
            </div>
            <div class="bars">
                <a href="javascript:void(0)"><i class="bi bi-list"></i></a>
            </div>
            <div class="navigation">
                <ul class="nav">
                    <li>
                        <a href="{{ url('/') }}">HOME</a>
                    </li>
                    <li>
                        <a href="#">TENTANG KAMI</a>
                        <ul class="submenus">
                            <li>
                                <a href="{{ url('/page/sejarah') }}">Sejarah</a>
                            </li>
                            <li>
                                <a href="{{ url('/page/uu-ad-art') }}">UU/AD/ART</a>
                            </li>
                            <li>
                                <a href="{{ url('/page/peraturan-dan-pedoman-organisasi') }}">Peraturan dan Pedomam Organisasi</a>
                            </li>
                            <li>
                                <a href="{{ url('/page/lambang') }}">Lambang</a>
                            </li>
                            <li>
                                <a href="{{ url('/page/mars-hymne') }}">Mars & Hymne</a>
                            </li>
                            <li>
                                <a href="{{ url('/page/struktur-organisasi') }}">Struktur Organisasi</a>
                            </li>
                            <li>
                                <a href="{{ url('/page/visi-misi') }}">Visi dan Misi</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">KEANGGOTAAN</a>
                        <ul class="submenus">
                            <li>
                                <a href="{{ url('/page/persyaratan-prosedur') }}">Persyaratan dan Prosedur</a>
                            </li>
                            <li>
                                <a href="{{ $web->pendaftaran }}">Pendaftaran Online</a>
                            </li>
                            <li>
                                <a href="{{ url('/page/asosiasi-himoynan') }}">Asosiasi/Himoynan</a>
                            </li>
                            <li>
                                <a href="{{ url('/page/asosiasi-terakreditasi') }}">Asosiasi Terakreditasi</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="{{ url('event') }}">EVENT</a>
                    </li>
                    <li>
                        <a href="#">PUBLIKASI</a>
                        <ul class="submenus">
                            <li>
                                <a href="{{ url('categories/berita-pusat') }}">Berita Pusat</a>
                            </li>
                            <li>
                                <a href="{{ url('categories/berita-daerah') }}">Berita Daerah</a>
                            </li>
                            <li>
                                <a href="{{ url('galeri/all') }}">Galeri</a>
                            </li>
                            <li>
                                <a href="{{ url('laporan') }}">Laporan</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0)">PROGRAM</a>
                        @if (count($program) > 0)
                            <ul class="submenus">
                                @foreach ($program as $item)
                                    <li>
                                        <a href="{{ $item->url }}">{{ $item->name }}</a>
                                    </li> 
                                @endforeach
                            </ul>
                        @endif
                    </li>
                </ul>
            </div>
            <div class="registration">
                <div class="text-end">
                    <a href="{{ $web->pendaftaran }}" class="btn btn-registration">Pendaftaran Online</a>
                </div>
            </div>
        </div>
    </div>
</header>