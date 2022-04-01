<x-app-layout title="Galeri">

    <x-app-header></x-app-header>
    
    <div class="breadcrumb-container">
        <div class="container">
            <nav class="breadcrumb">
                <a class="breadcrumb-item" href="{{ url('/') }}">Home</a>
                <span class="breadcrumb-item active">Galeri</span>
            </nav>
        </div>
    </div>

    <div class="container">
        <div class="news-container my-5">
            <div class="row">
                <div class="col-md-3 mb-3">
                    <x-app-widget-categories></x-app-widget-categories>
                </div>
                <div class="col-md-9 mb-3">
                    <div class="news-headline">
                        <h5>Galeri</h5>
                        <small>Daftar Galeri Terbaru</small>
                    </div>
                    <div class="row galeri">
                        @forelse ($gallery as $item)
                        <a href="{{ url('galeri/view/' . $item->slug) }}">
                            <div class="col-md-4 mt-3">
                                <div class="report-item">
                                    <div class="thumbnail-report" style="background-image: url('{{ $item->photo }}')"></div>
                                    <h5 class="text-dark mb-0">{{ $item->title }}</h5>
                                    <small class="text-dark">
                                        <i class="bi bi-clock"></i> {{ Helpers::hari($item->created_at) }}, {{ Helpers::tanggal($item->created_at) }}
                                    </small>
                                </div>
                            </div>
                        </a>
                        @empty
                            <p>Belum ada galeri</p>
                        @endforelse
                        <div class="col-md-12 py-3">
                            {{ $gallery->links() }}
                            @if(count($total) > $jumlahPerPage)
                                <div class="my-2">
                                    <small>Halaman ke {{ $gallery->currentPage() }} dari {{ $lastPage }} Halaman</small>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <x-app-footer></x-app-footer>
    
    @push('script')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script>
            $(document).ready(function(){
                
            });
        </script>
    @endpush

</x-app-layout>