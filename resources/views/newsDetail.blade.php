<x-app-layout title="{{ $news->title }}">

    @push('meta')
            <meta property="og:title" content="{{ $news->title }}">
            <meta property="og:type" content="article"/>
            <meta property="og:image" content="{{ $news->thumbnail }}">
            <meta property="og:url" content="{{ url('news/' . $news->slug) }}">
            <meta name="twitter:card" content="summary_large_image">
    @endpush
    
    <x-app-header></x-app-header>
    
    <div class="breadcrumb-container">
        <div class="container">
            <nav class="breadcrumb">
                <a class="breadcrumb-item" href="{{ url('/') }}">Home</a>
                <a class="breadcrumb-item" href="{{ url('/news') }}">Berita</a>
                <span class="breadcrumb-item active">{{ $news->title }}</span>
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
                    <div class="news-headline pb-3">
                        <h4>{{ $news->title }}</h3>
                        <small class="text-dark">
                            <i class="bi bi-clock"></i> {{ Helpers::hari($news->created_at) }}, {{ Helpers::tanggal($news->created_at) }}
                        </small>
                    </div>
                    <img src="{{ $news->thumbnail }}" alt="{{ $news->title }}" width="100%"/>
                    <div class="news-text pt-3">
                        {!! $news->text !!}
                    </div>
                    <div class="share py-3">
                        <div class="d-flex align-items-center" id="share-sossial-buttons">
                            <div class="me-2">
                                Share
                            </div>
                            <!-- Untuk Email -->
                            <a class="btn btn-share-mail" href="mailto:?Subject={{ $news->title }}&Body={!! $news->text !!}">
                                <i class="bi bi-envelope-fill"></i>
                            </a>
                            <!-- Untuk Facebook -->
                            <a class="btn btn-share-facebook"  href="http://www.facebook.com/sharer.php?u={{ url('news/' . $news->slug) }}" target="_blank">
                                <i class="bi bi-facebook"></i>
                            </a>
                            <!-- Untuk Google+ -->
                            <a class="btn btn-share-gplus" href="https://plus.google.com/share?url={{ url('news/' . $news->slug) }}" target="_blank">
                                <i class="bi bi-google"></i>
                            </a>
                            <!-- Untuk Twitter -->
                            <a class="btn btn-share-twitter" href="https://twitter.com/share?url={{ url('news/' . $news->slug) }}&text={{ $news->title }}" target="_blank">
                                <i class="bi bi-twitter"></i>
                            </a>
                        </div>
                    </div>
                    <div class="moreNews">
                        <h5>Berita Lainnya :</h5>
                        <div class="row">
                            <div class="row">
                                @foreach ($newsMore as $item)
                                    <div class="col-md-6">
                                        <div class="news-item news-item-right">
                                            <div class="thumbnail" style="background-image: url('{{ $item->thumbnail }}');"></div>
                                            <div class="news-item-body">
                                                <div class="date">{{ Helpers::hari($item->created_at) }}, {{ Helpers::tanggal($item->created_at) }}</div>
                                                <h2><a href="{{ url('news/' . $item->slug) }}">{{ $item->title }}</a></h2>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
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