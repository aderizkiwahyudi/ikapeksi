<x-app-layout title="{{ $event->title }}">

    @push('meta')
            <meta property="og:title" content="{{ $event->title }}">
            <meta property="og:type" content="article"/>
            <meta property="og:image" content="{{ $event->thumbnail }}">
            <meta property="og:url" content="{{ url('news/' . $event->slug) }}">
            <meta name="twitter:card" content="summary_large_image">
    @endpush
    
    <x-app-header></x-app-header>
    
    <div class="breadcrumb-container">
        <div class="container">
            <nav class="breadcrumb">
                <a class="breadcrumb-item" href="{{ url('/') }}">Home</a>
                <a class="breadcrumb-item" href="{{ url('/event') }}">Event</a>
                <span class="breadcrumb-item active">{{ $event->title }}</span>
            </nav>
        </div>
    </div>

    <div class="container">
        <div class="news-container my-5">
            <div class="row">
                <div class="col-md-3 mb-3">
                    <div class="widget categories event">
                        <div class="p-4 shadow-sm rounded">
                            <div class="event-detail-headline">Informasi Event</div>
                            <div class="event-detail-body mt-4">
                                <div class="mb-4">
                                    <p class="mb-0"><strong>Mulai</strong></p>
                                    <p>{{ Helpers::hari($event->start_at) }}, {{ Helpers::tanggal($event->start_at) }}</p>
                                </div>
                                <div class="mb-4">
                                    <p class="mb-0"><strong>Berakhir</strong></p>
                                    <p>{{ Helpers::hari($event->end_at) }}, {{ Helpers::tanggal($event->end_at) }}</p>
                                </div>
                                <div class="mb-4">
                                    <p class="mb-0"><strong>Lokasi</strong></p>
                                    <p>{{ $event->location }}</p>
                                </div>
                                <a href="javascript:void(0)" class="btn btn-registration btn-event w-100" data-bs-toggle="modal" data-bs-target="#registrationEvent">Daftar Sekarang</a>
                            </div>
                            
                            @if($event->start_at > date('Y-m-d'))
                                <!-- Modal -->
                                <div class="modal fade" id="registrationEvent" tabindex="-1" role="dialog" aria-labelledby="registrationEvent" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <form method="post">
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $event->id }}"/>
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Form Pendaftaran</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="mb-3 form-group">
                                                        <label for="name" class="form-label">Nama Lengkap</label>
                                                        <input type="text" name="name" id="" class="form-control" placeholder="" aria-describedby="name">
                                                    </div>
                                                    <div class="mb-3 form-group">
                                                        <label for="email" class="form-label">Email</label>
                                                        <input type="email" name="email" id="" class="form-control" placeholder="" aria-describedby="email">
                                                    </div>
                                                    <div class="mb-3 form-group">
                                                        <label for="name" class="form-label">Perusahaan</label>
                                                        <input type="text" name="company" id="" class="form-control" placeholder="" aria-describedby="instansi">
                                                    </div>
                                                    <div id="alert"></div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-registration btn-event w-100" id="registration">Daftar Sekarang</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @else 
                                <!-- Modal -->
                                <div class="modal fade" id="registrationEvent" tabindex="-1" role="dialog" aria-labelledby="registrationEvent" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <form method="post">
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $event->id }}"/>
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Form Pendaftaran</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="alert alert-warning" role="alert">
                                                        <strong>Event sudah berakhir</strong>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-md-9 mb-3">
                    <div class="news-headline pb-3">
                        <h4>{{ $event->title }}</h3>
                    </div>
                    <img src="{{ $event->thumbnail }}" alt="{{ $event->title }}" width="100%"/>
                    <div class="news-text pt-3">
                        {!! $event->text !!}
                    </div>
                    <div class="share pt-3">
                        <div class="d-flex align-items-center" id="share-sossial-buttons">
                            <div class="me-2">
                                Share
                            </div>
                            <!-- Untuk Email -->
                            <a class="btn btn-share-mail" href="mailto:?Subject={{ $event->title }}&Body={!! $event->text !!}">
                                <i class="bi bi-envelope-fill"></i>
                            </a>
                            <!-- Untuk Facebook -->
                            <a class="btn btn-share-facebook"  href="http://www.facebook.com/sharer.php?u={{ url('event/' . $event->slug) }}" target="_blank">
                                <i class="bi bi-facebook"></i>
                            </a>
                            <!-- Untuk Google+ -->
                            <a class="btn btn-share-gplus" href="https://plus.google.com/share?url={{ url('event/' . $event->slug) }}" target="_blank">
                                <i class="bi bi-google"></i>
                            </a>
                            <!-- Untuk Twitter -->
                            <a class="btn btn-share-twitter" href="https://twitter.com/share?url={{ url('event/' . $event->slug) }}&text={{ $event->title }}" target="_blank">
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
        <script>
            $(document).ready(function(){
                $('#registration').on('click', function(){
                    let el = $(this);
                    el.attr('disabled', true).html('Loading');

                    let data = $('form').serializeArray();

                    $.ajax({
                        url: "{{ route('eventRegistration') }}",
                        type: 'POST',
                        data: data,
                    }).done(function(response) {
                        response = JSON.parse(response);
                        el.removeAttr('disabled').html("Daftar Sekarang");

                        if(response.success){
                            $('#alert').html(`
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    ${response.message}
                                </div>
                            `);
                        }else{
                            $('#alert').html(`
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    ${response.message}
                                </div>
                            `);
                        }
                    });
                });
            });
        </script>
    @endpush

</x-app-layout>