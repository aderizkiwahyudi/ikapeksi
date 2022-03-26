<x-app-layout>

    @push('style')
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    @endpush

    <header>
        <div class="header container">
            <div class="d-flex align-items-center justify-content-between">
                <div class="logo">
                    <img src="{{ asset('img/logo.jpeg') }}" alt="Ikatan Pengusaha Kenshuusei Indonesia" width="100px"/>
                </div>
                <div class="nav">
                    <ul class="nav">
                        <li>
                            <a href="#">HOME</a>
                        </li>
                        <li>
                            <a href="#">TENTANG KAMI</a>
                            <ul class="submenus">
                                <li>
                                    <a href="#">Sejarah</a>
                                </li>
                                <li>
                                    <a href="#">UU/AD/ART</a>
                                </li>
                                <li>
                                    <a href="#">Peraturan dan Pedomam Organisasi</a>
                                </li>
                                <li>
                                    <a href="#">Lambang Mars & Hymne</a>
                                </li>
                                <li>
                                    <a href="#">Struktur Organisasi</a>
                                </li>
                                <li>
                                    <a href="#">Visi dan Misi</a>
                                </li>
                                <li>
                                    <a href="#">Peraturan dan Pedomam Organisasi</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#">KEANGGOTAAN</a>
                            <ul class="submenus">
                                <li>
                                    <a href="#">Persyaratan dan Prosedur</a>
                                </li>
                                <li>
                                    <a href="#">Pendaftaran Online</a>
                                </li>
                                <li>
                                    <a href="#">Asosiasi/Himoynan</a>
                                </li>
                                <li>
                                    <a href="#">Asosiasi Terakreditasi</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#">EVENT</a>
                        </li>
                        <li>
                            <a href="#">PUBLIKASI</a>
                            <ul class="submenus">
                                <li>
                                    <a href="#">Berita Pusat</a>
                                </li>
                                <li>
                                    <a href="#">Berita Daerah</a>
                                </li>
                                <li>
                                    <a href="#">Galeri</a>
                                </li>
                                <li>
                                    <a href="#">Laporan</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#">PROGRAM</a>
                        </li>
                    </ul>
                </div>
                <div class="registration">
                    <div class="text-end">
                        <a href="#" class="btn btn-registration">Pendaftaran Online</a>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <section class="section-1 news">
        <div class="container">
            <h4>BERITA TERBARU</h4>
            <div class="news-items">
                <div class="row">
                    <div class="col-md-6">
                        <div class="news-item">
                            <div class="thumbnail" style="background-image: url('https://cdn-2.tstatic.net/tribunnews/foto/bank/images/ilustrasi-pengeroyokan_20171128_062502.jpg');"></div>
                            <div class="news-item-body">
                                <div class="date">JUMAT, 24 MARET 2022</div>
                                <h2><a href="#">Pilih SCBD atau Pindah Cikarang demi Karier? Cikarang Aja, SCBD Nggak Semenarik Itu</a></h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="news-item news-item-right">
                                    <div class="thumbnail" style="background-image: url('https://cdn-2.tstatic.net/tribunnews/foto/bank/images/ilustrasi-pengeroyokan_20171128_062502.jpg');"></div>
                                    <div class="news-item-body">
                                        <div class="date">JUMAT, 24 MARET 2022</div>
                                        <h2><a href="#">Pilih SCBD atau Pindah Cikarang demi Karier? Cikarang Aja, SCBD Nggak Semenarik Itu</a></h2>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="news-item news-item-right">
                                    <div class="thumbnail" style="background-image: url('https://cdn-2.tstatic.net/tribunnews/foto/bank/images/ilustrasi-pengeroyokan_20171128_062502.jpg');"></div>
                                    <div class="news-item-body">
                                        <div class="date">JUMAT, 24 MARET 2022</div>
                                        <h2><a href="#">Pilih SCBD atau Pindah Cikarang demi Karier? Cikarang Aja, SCBD Nggak Semenarik Itu</a></h2>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="news-item news-item-right">
                                    <div class="thumbnail" style="background-image: url('https://cdn-2.tstatic.net/tribunnews/foto/bank/images/ilustrasi-pengeroyokan_20171128_062502.jpg');"></div>
                                    <div class="news-item-body">
                                        <div class="date">JUMAT, 24 MARET 2022</div>
                                        <h2><a href="#">Pilih SCBD atau Pindah Cikarang demi Karier? Cikarang Aja, SCBD Nggak Semenarik Itu</a></h2>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="news-item news-item-right">
                                    <div class="thumbnail" style="background-image: url('https://cdn-2.tstatic.net/tribunnews/foto/bank/images/ilustrasi-pengeroyokan_20171128_062502.jpg');"></div>
                                    <div class="news-item-body">
                                        <div class="date">JUMAT, 24 MARET 2022</div>
                                        <h2><a href="#">Pilih SCBD atau Pindah Cikarang demi Karier? Cikarang Aja, SCBD Nggak Semenarik Itu</a></h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section-2 opening">
        <div class="container">
            <div class="opening-box">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam fusce nulla turpis quam ultrices. Bibendum phasellus sapien magna integer est mi viverra. Sed blandit consequat vivamus porttitor molestie arcu. Placerat a volutpat lectus velit aliquam massa..
                        </p>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam fusce nulla turpis quam ultrices. Bibendum phasellus sapien magna integer est mi viverra. Sed blandit consequat vivamus porttitor molestie arcu. Placerat a volutpat lectus velit aliquam massa.
                        </p>
                        <p class="mb-0">
                            - Ade Rizki Wahyudi, Ketua Umum
                        </p>
                    </div>
                    <div class="col-md-4">
                        <div class="opening-photo" style="background-image: url('https://km-unsri.com/assets/kmunsri/img/sambutan/ORW-e8f8d35d45cd61-c8ebeb0c0f.png')"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section-3 event">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="title-event">
                        <h3>Event</h3>
                        <h2>Temukan & ikuti berbagai event terbaru yang diadakan oleh IKAPEKSI</h2>
                        <div class="readmore">
                            <a href="#">Lihat Semua</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="owl-carousel event-carousel">
                        <div class="p-1">
                            <div class="event-item">
                                <div class="thumbnail-event" style="background-image: url('https://www.kadin.id/public/images/editor-c2ca6d0224b1c4010d6c4ba253e454a33bed88a0.jpeg')"></div>
                                <div class="event-item-body">
                                    <div class="event-item-title">
                                        <h4>Webinar “Inclusive Closed Loop, Upaya Menaikkelaskan Peternak Domba Kambing”</h4>
                                    </div>
                                    <div class="date">
                                        <h5>Kamis, 20 Maret 2022</h5>
                                    </div>
                                </div>
                                <a href="#" class="btn btn-registration btn-event">Daftar Sekarang</a>
                            </div>
                        </div>
                        <div class="p-1">
                            <div class="event-item">
                                <div class="thumbnail-event" style="background-image: url('https://www.kadin.id/public/images/editor-c2ca6d0224b1c4010d6c4ba253e454a33bed88a0.jpeg')"></div>
                                <div class="event-item-body">
                                    <div class="event-item-title">
                                        <h4>Webinar “Inclusive Closed Loop, Upaya Menaikkelaskan Peternak Domba Kambing”</h4>
                                    </div>
                                    <div class="date">
                                        <h5>Kamis, 20 Maret 2022</h5>
                                    </div>
                                </div>
                                <a href="#" class="btn btn-registration btn-event">Daftar Sekarang</a>
                            </div>
                        </div>
                        <div class="p-1">
                            <div class="event-item">
                                <div class="thumbnail-event" style="background-image: url('https://www.kadin.id/public/images/editor-c2ca6d0224b1c4010d6c4ba253e454a33bed88a0.jpeg')"></div>
                                <div class="event-item-body">
                                    <div class="event-item-title">
                                        <h4>Webinar “Inclusive Closed Loop, Upaya Menaikkelaskan Peternak Domba Kambing”</h4>
                                    </div>
                                    <div class="date">
                                        <h5>Kamis, 20 Maret 2022</h5>
                                    </div>
                                </div>
                                <a href="#" class="btn btn-registration btn-event">Daftar Sekarang</a>
                            </div>
                        </div>
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
            <div class="owl-carousel review-carousel">
                <div class="p-1">
                    <div class="review-item">
                        <div class="row align-items-center">
                            <div class="col-md-4">
                                <div class="review-photo" style="background-image: url('https://km-unsri.com/assets/kmunsri/img/sambutan/ORW-e8f8d35d45cd61-c8ebeb0c0f.png')"></div>
                            </div>
                            <div class="col-md-8">
                                <h5>Ade Rizki Wahyudi</h5>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Dolor vel quis pharetra semper feugiat. Duis id sed mattis mattis tortor dictum bibendum.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="p-1">
                    <div class="review-item">
                        <div class="row align-items-center">
                            <div class="col-md-4">
                                <div class="review-photo" style="background-image: url('https://km-unsri.com/assets/kmunsri/img/sambutan/ORW-e8f8d35d45cd61-c8ebeb0c0f.png')"></div>
                            </div>
                            <div class="col-md-8">
                                <h5>Ade Rizki Wahyudi</h5>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Dolor vel quis pharetra semper feugiat. Duis id sed mattis mattis tortor dictum bibendum.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="p-1">
                    <div class="review-item">
                        <div class="row align-items-center">
                            <div class="col-md-4">
                                <div class="review-photo" style="background-image: url('https://km-unsri.com/assets/kmunsri/img/sambutan/ORW-e8f8d35d45cd61-c8ebeb0c0f.png')"></div>
                            </div>
                            <div class="col-md-8">
                                <h5>Ade Rizki Wahyudi</h5>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Dolor vel quis pharetra semper feugiat. Duis id sed mattis mattis tortor dictum bibendum.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer>
        <div class="footer">
            <div class="container footer-body">
                <div class="footer-item">
                    <div class="d-flex justify-content-between">
                        <div class="col-md-3">
                            <img src="{{ asset('img/logo.jpeg') }}" alt="Ikatan Pengusaha Kenshuusei Indonesia" width="100px"/>
                            <h5 class="mt-4">Ikatan Pengusaha Kenshuusei Indonesia</h5>
                            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Similique molestiae nisi nam officiis possimus ullam! Doloremque autem, optio voluptatibus maiores rem officiis itaque qui voluptas. Quaerat omnis eius nesciunt reprehenderit.</p>
                        </div>
                        <div>
                            <h5>Halaman</h5>
                            <ul class="pages">
                                <li><a href="#">Kebijakan Privasi</a></li>
                                <li><a href="#">Syarat & Ketentuan</a></li>
                                <li><a href="#">Kontak Kami</a></li>
                            </ul>
                        </div>
                        <div class="sosmed">
                            <h5>Sosial Media</h5>
                            <a href="#"><i class="bi bi-facebook"></i></a>
                            <a href="#"><i class="bi bi-twitter"></i></a>
                            <a href="#"><i class="bi bi-instagram"></i></a>
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
        <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script>
            $(document).ready(function(){
                $(".event-carousel").owlCarousel({
                    items: 2,
                    margin: 20,
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