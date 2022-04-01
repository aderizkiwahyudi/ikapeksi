<x-app-layout title="{{ $page->title }}">

    @push('meta')
            <meta property="og:title" content="{{ $page->title }}">
            <meta property="og:type" content="article"/>
            <meta property="og:url" content="{{ url('page/' . $page->slug) }}">
            <meta name="twitter:card" content="summary_large_image">
    @endpush
    
    <x-app-header></x-app-header>
    
    <div class="breadcrumb-container">
        <div class="container">
            <nav class="breadcrumb">
                <a class="breadcrumb-item" href="{{ url('/') }}">Home</a>
                <span class="breadcrumb-item">Halaman</span>
                <span class="breadcrumb-item active">{{ $page->title }}</span>
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
                        <h4>{{ $page->title }}</h3>
                        <small class="text-dark">
                            <i class="bi bi-clock"></i> {{ Helpers::hari($page->updated_at) }}, {{ Helpers::tanggal($page->updated_at) }}
                        </small>
                    </div>
                    <div class="news-text">
                        {!! $page->text !!}
                    </div>
                    <div class="share py-3">
                        <div class="d-flex align-items-center" id="share-sossial-buttons">
                            <div class="me-2">
                                Share
                            </div>
                            <!-- Untuk Email -->
                            <a class="btn btn-share-mail" href="mailto:?Subject={{ $page->title }}&Body={!! $page->text !!}">
                                <i class="bi bi-envelope-fill"></i>
                            </a>
                            <!-- Untuk Facebook -->
                            <a class="btn btn-share-facebook"  href="http://www.facebook.com/sharer.php?u={{ url('page/' . $page->slug) }}" target="_blank">
                                <i class="bi bi-facebook"></i>
                            </a>
                            <!-- Untuk Google+ -->
                            <a class="btn btn-share-gplus" href="https://plus.google.com/share?url={{ url('page/' . $page->slug) }}" target="_blank">
                                <i class="bi bi-google"></i>
                            </a>
                            <!-- Untuk Twitter -->
                            <a class="btn btn-share-twitter" href="https://twitter.com/share?url={{ url('page/' . $page->slug) }}&text={{ $page->title }}" target="_blank">
                                <i class="bi bi-twitter"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <x-app-footer></x-app-footer>
    
    @push('script')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    @endpush

</x-app-layout>