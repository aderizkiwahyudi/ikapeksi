<x-app-layout>

    @push('style')
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    @endpush
    
    <x-app-header></x-app-header>
    <section class="section-1 news">
        <div class="container">
            <a href="{{ url('news') }}" class="text-dark"><h4>BERITA TERBARU</h4></a>
            <div class="news-items">
                @if (count($news) == 0)
                    <p>Belum ada berita</p>
                @else 
                <div class="row">
                    <div class="col-md-6">
                        <div class="news-item mb-3">
                            <div class="thumbnail" style="background-image: url('{{ $news[0]->thumbnail }}');"></div>
                            <div class="news-item-body">
                                <div class="date">{{ Helpers::hari($news[0]->created_at) }}, {{ Helpers::tanggal($news[0]->created_at) }}</div>
                                <h2><a href="{{ url('news/' . $news[0]->slug) }}">{{ $news[0]->title }}</a></h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        @if (count($news) > 1)
                            <div class="row">
                                <?php unset($news[0]) ?>
                                @foreach ($news as $item)
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
                        @endif
                    </div>
                </div>
                @endif
            </div>
        </div>
    </section>
    <section class="section-2 opening">
        <div class="container">
            <div class="opening-box">
                <div class="row align-items-center">
                    <div class="col-md-4 mb-3">
                        <div class="opening-photo" style="background-image: url('{{ $web->photo }}')"></div>
                    </div>
                    <div class="col-md-8">
                        {!! $web->sambutan !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section-3 event">
        <div class="container">
            <div class="row">
                <div class="col-md-4 mb-3">
                    <div class="title-event">
                        <h3>Event</h3>
                        <h2>Temukan & ikuti berbagai event terbaru yang diadakan oleh IKAPEKSI</h2>
                        <div class="readmore">
                            <a href="{{ url('event') }}">Lihat Semua</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="owl-carousel event-carousel">
                        @forelse ($event as $item)
                            <div class="p-1">
                                <div class="event-item">
                                    @if($item->start_at < date('Y-m-d'))
                                        <div class="event-end">Event Selesai</div>
                                    @endif
                                    <div class="thumbnail-event" style="background-image: url('https://www.kadin.id/public/images/editor-c2ca6d0224b1c4010d6c4ba253e454a33bed88a0.jpeg')"></div>
                                    <div class="event-item-body">
                                        <div class="event-item-title">
                                            <h4>{{ substr($item->title, 0, 70) }}<?= strlen($item->title) > 70 ? "..." : "" ?></h4>
                                        </div>
                                        <div class="date">
                                            <h5><i class="bi bi-calendar"></i> {{ Helpers::hari($item->start_at) }}, {{ Helpers::tanggal($item->start_at) }}</h5>
                                            <h5><i class="bi bi-geo-alt"></i> {{ $item->location }}</h5>
                                        </div>
                                    </div>
                                    <a href="{{ url('event/' . $item->slug) }}" class="btn btn-registration btn-event">Daftar Sekarang</a>
                                </div>
                            </div>
                        @empty
                            <p>Belum ada event</p>
                        @endforelse 
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section-4 review">
        <div class="review-headline">
            <h4>KATA MEREKA</h4>
            <p>tentang Ikatan Pengusaha Kenshuusei Indonesia</p>
        </div>
        <div>
            @if(count($review) > 0)
                <div class="owl-carousel review-carousel">
                    @foreach($review as $item)
                        <div class="p-1">
                            <div class="review-item">
                                <div class="row align-items-center">
                                    <div class="col-md-2 mb-3">
                                        <div class="review-photo" style="background-image: url('{{ $item->photo }}')"></div>
                                    </div>
                                    <div class="col-md-9">
                                        <h5>{{ $item->name }}</h5>
                                        <p>
                                            {{ $item->text }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <p class="text-center">Belum ada review</p>
            @endif
        </div>
    </section>

    <x-app-footer></x-app-footer>
    
    @push('script')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script>
            $(document).ready(function(){
                $(".event-carousel").owlCarousel({
                    margin: 20,
                    responsive: {
                        0: {
                            items: 1,
                            autoplay: true,
                        },
                        756: {
                            items: 2,
                        }
                    }
                });

                $(".review-carousel").owlCarousel({
                    items: 2,
                    margin: 20,
                    center: true,
                    loop: true,
                });
            });
        </script>
    @endpush

</x-app-layout>