<x-app-layout title="Laporan">
    
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
                        <h5>Laporan</h5>
                        <small>Daftar Laporan</small>
                    </div>
                    @forelse ($report as $item)
                        <div class="row items mt-5">
                            <a href="{{ url('laporan/' . $item->slug) }}">
                                <div class="col-md-12 border-bottom report">
                                    <h4 class="text-dark">{{ $item->name }}</h4>
                                    <p class="text-dark">Anda bisa mengunduh dalam bentuk PDF</p>
                                </div>
                            </a>
                        </div>
                    @empty
                        <p>Belum ada laporan</p>
                    @endforelse
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