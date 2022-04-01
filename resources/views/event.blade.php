<x-app-layout title="Event">
    
    <x-app-header></x-app-header>
    
    <div class="breadcrumb-container">
        <div class="container">
            <nav class="breadcrumb">
                <a class="breadcrumb-item" href="{{ url('/') }}">Home</a>
                <span class="breadcrumb-item active">Event</span>
            </nav>
        </div>
    </div>

    <div class="container">
        <div class="news-container my-5">
            <div class="row">
                <div class="col-md-3 mb-3">
                    <div class="widget categories event">
                        <ul>
                            <li class="active"><a href="{{ url('event') }}">Event</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-9 mb-3">
                    <div class="news-headline mb-3">
                        <h5>Event</h5>
                        <small>Daftar Event</small>
                    </div>
                    <div class="row event">
                        @forelse ($event as $item)
                            <div class="col-md-6 mb-3">
                                <div class="event-item">
                                    @if($item->start_at < date('Y-m-d'))
                                        <div class="event-end">Event Selesai</div>
                                    @endif
                                    <div class="thumbnail-event" style="background-image: url('https://www.kadin.id/public/images/editor-c2ca6d0224b1c4010d6c4ba253e454a33bed88a0.jpeg')"></div>
                                    <div class="event-item-body">
                                        <div class="event-item-title">
                                            <h4>{{ substr($item->title, 0, 100) }}<?= strlen($item->title) > 100 ? "..." : "" ?></h4>
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
                    <div class="py-3">
                        {{ $event->links() }}
                        @if(count($total) > $jumlahPerPage)
                            <div class="my-2">
                                <small>Halaman ke {{ $event->currentPage() }} dari {{ $lastPage }} Halaman</small>
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