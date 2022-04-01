<x-app-layout title="{{ $report->name }}">

    <x-app-header></x-app-header>
    
    <div class="breadcrumb-container">
        <div class="container">
            <nav class="breadcrumb">
                <a class="breadcrumb-item" href="{{ url('/') }}">Home</a>
                <a class="breadcrumb-item" href="{{ url('/laporan') }}">Laporan</a>
                <span class="breadcrumb-item">{{ $report->name }}</span>
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
                        <h5>Kegiatan</h5>
                        <small>Daftar Laporan Kegiatan</small>
                    </div>
                    <div class="row">
                    @forelse ($reports as $item)
                        <div class="col-md-4 mb-3">
                            <div class="report-item">
                                <div class="thumbnail-report" style="background-image: url('{{ $item->thumbnail }}')"></div>
                                <a href="{{ $item->file }}"><h5>{{ $item->name }}</h5></a>
                            </div>
                        </div>
                    @empty
                        <p>Belum ada laporan</p>
                    @endforelse
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