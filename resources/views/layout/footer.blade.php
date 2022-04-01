<footer>
    <div class="footer">
        <div class="container footer-body">
            <div class="footer-item">
                <div class="d-flex justify-content-between">
                    <div class="col-md-3">
                        <img src="{{ $web->logo }}" alt="{{ $web->name }}" width="100px"/>
                        <h5 class="mt-4">{{ $web->name }}</h5>
                        <p>{{ $web->about }}</p>
                    </div>
                    <div>
                        <h5>Halaman</h5>
                        <ul class="pages">
                            <li><a href="{{ url('page/kebijakan-privasi') }}">Kebijakan Privasi</a></li>
                            <li><a href="{{ url('page/syrat-ketentuan') }}">Syarat & Ketentuan</a></li>
                            <li><a href="{{ url('page/kontak-kami') }}">Kontak Kami</a></li>
                        </ul>
                    </div>
                    <div class="sosmed">
                        <h5>Sosial Media</h5>
                        <a href="{{ $web->facebook }}"><i class="bi bi-facebook"></i></a>
                        <a href="{{ $web->twitter }}"><i class="bi bi-twitter"></i></a>
                        <a href="{{ $web->instagram }}"><i class="bi bi-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="mt-3 text-center copyright">
                Copyright © IKAPEKSI 2022. All rights reserved.
            </div>
        </div>
    </div>
</footer>

@push('script')
<script>
    $('.bars').on('click', () => {
        $('.background-navigation').show();
        $('.header').find('.navigation').show();
    })
    
    $('.background-navigation').on('click', () => {
        $('.header').find('.navigation').addClass('navigation-out');
        setTimeout(() => {
            $('.header').find('.navigation').removeClass('navigation-out');
            $('.header').find('.navigation').hide();
            $('.background-navigation').hide();
        }, 350);
    })
</script>
@endpush