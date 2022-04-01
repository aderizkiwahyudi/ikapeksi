<x-app-layout title="Berita">

    <x-app-header></x-app-header>
    
    <div class="breadcrumb-container">
        <div class="container">
            <nav class="breadcrumb">
                <a class="breadcrumb-item" href="{{ url('/') }}">Home</a>
                <span class="breadcrumb-item active">Berita</span>
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
                        <h5>Berita</h5>
                        <small>Daftar Berita Utama</small>
                    </div>
                    @forelse ($news as $item)
                        <div class="row items mt-5">
                            <div class="col-md-3">
                                <img src="{{ $item->thumbnail }}" alt="{{ $item->title }}" width="100%">
                            </div>
                            <div class="col-md-9">
                                <h4><a href="{{ url('news/' . $item->slug) }}">{{ $item->title }}</a></h4>
                                <div class="date">
                                    <i class="bi bi-clock"></i> {{ Helpers::hari($item->created_at) }}, {{ Helpers::tanggal($item->created_at) }}
                                </div>
                                <p>
                                    <?= htmlspecialchars(strip_tags(substr($item->text, 0, 150))) ?> ...
                                </p>
                            </div>
                        </div>
                    @empty
                        <p>Tidak ada berita</p>
                    @endforelse
                    <div class="py-3">
                        {{ $news->links() }}
                        @if(count($total) > $jumlahPerPage)
                            <div class="my-2">
                                <small>Halaman ke {{ $news->currentPage() }} dari {{ $lastPage }} Halaman</small>
                            </div>
                        @endif
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