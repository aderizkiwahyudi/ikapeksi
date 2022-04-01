<x-app-layout title="{{ $gallery->title }}">

    @push('meta')
            <meta property="og:title" content="{{ $gallery->title }}">
            <meta property="og:type" content="article"/>
            <meta property="og:image" content="{{ $gallery->thumbnail }}">
            <meta property="og:url" content="{{ url('gallery/view/' . $gallery->slug) }}">
            <meta name="twitter:card" content="summary_large_image">
    @endpush

    @push('style')
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/viewerjs/1.10.4/viewer.min.css" integrity="sha512-OgbWuZ8OyVQxlWHea0T9Bdy1oDhs380WxLMaLZbuitQ/mdntHBPnApxbTebB9N5KoHZd3VMkk3G2cTY563nu5w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    @endpush
    
    <x-app-header></x-app-header>
    
    <div class="breadcrumb-container">
        <div class="container">
            <nav class="breadcrumb">
                <a class="breadcrumb-item" href="{{ url('/') }}">Home</a>
                <a class="breadcrumb-item" href="{{ url('/news') }}">Berita</a>
                <span class="breadcrumb-item active">{{ $gallery->title }}</span>
            </nav>
        </div>
    </div>

    <div class="container">
        <div class="news-container galery-container my-5">
            <div class="row">
                <div class="col-md-3 mb-3">
                    <x-app-widget-categories></x-app-widget-categories>
                </div>
                <div class="col-md-9 mb-3">
                    <div class="news-headline pb-3">
                        <h4>{{ $gallery->title }}</h3>
                        <small class="text-dark">
                            <i class="bi bi-clock"></i> {{ Helpers::hari($gallery->created_at) }}, {{ Helpers::tanggal($gallery->created_at) }}
                        </small>
                    </div>
                    <div class="news-text">
                        {!! $gallery->text !!}
                    </div>
                    <div class="moreNews">
                        <div class="row" id="images">
                            @foreach ($photos as $item)
                                <div class="col-md-4 mb-3">
                                    <div class="news-item news-item-right">
                                        <img src="{{ $item->photo }}" alt="Photos" width="100%"/>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <x-app-footer></x-app-footer>
    
    @push('script')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/viewerjs/1.10.4/viewer.min.js" integrity="sha512-2HLzgJH7ZNywnEDB1HqijieFxszStt3QXS8Qk9m/VMUV/asMWlz9PmibHsvWIz9rtKOOr28z8zu1iJ3pf/TTHQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script>
            $(document).ready(function(){
                const gallery = new Viewer(document.getElementById('images'));
            });
        </script>
    @endpush

</x-app-layout>