-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 01 Apr 2022 pada 18.52
-- Versi server: 10.4.21-MariaDB
-- Versi PHP: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `organisasi`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `slug` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Berita Ketua Umum', 'berita-ketua-umum', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'Berita Pusat', 'berita-pusat', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'Berita Daerah', 'berita-daerah', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `title` varchar(256) NOT NULL,
  `thumbnail` text NOT NULL,
  `text` text NOT NULL,
  `start_at` date NOT NULL,
  `end_at` date NOT NULL,
  `location` varchar(256) NOT NULL,
  `slug` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `events`
--

INSERT INTO `events` (`id`, `title`, `thumbnail`, `text`, `start_at`, `end_at`, `location`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Webinar Kewirausahaans', 'https://www.kadin.id/public/images/editor-c2ca6d0224b1c4010d6c4ba253e454a33bed88a0.jpeg', '<p>Kondisi umum peternak domba dan kambing saat ini 93% adalah peternak kecil dengan skala usaha 3 - 10 ekor, dengan kualitas bibit dan produktivitas yang rendah, inefisien perkandangan, serta tidak terintegrasi dengan sistem pasar.s</p>', '2022-05-01', '2002-05-05', 'Zoom Meeting', 'webinar-kewirausahaans', '2022-03-28 10:41:46', '2022-04-01 15:24:07'),
(2, 'Webinar “Inclusive Closed Loop, Upaya Menaikkelaskan Peternak Domba Kambing” Webinar “Inclusive Closed Loop, Upaya Menaikkelaskan Peternak Domba Kambing”', 'https://www.kadin.id/public/images/editor-c2ca6d0224b1c4010d6c4ba253e454a33bed88a0.jpeg', '[value-4]', '2022-03-29', '2022-03-29', '[value-7]', 'webinar-2', '2022-03-28 22:49:30', '2022-03-28 22:49:33');

-- --------------------------------------------------------

--
-- Struktur dari tabel `event_registrations`
--

CREATE TABLE `event_registrations` (
  `id` int(11) NOT NULL,
  `id_event` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `email` text NOT NULL,
  `company` varchar(256) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `event_registrations`
--

INSERT INTO `event_registrations` (`id`, `id_event`, `name`, `email`, `company`, `created_at`, `updated_at`) VALUES
(3, 1, 'Ade Rizki Wahyudi', 'unsri.himafia@gmail.com', 'Citiasia Inc', '2022-04-01 15:35:15', '2022-04-01 15:35:15');

-- --------------------------------------------------------

--
-- Struktur dari tabel `galleries`
--

CREATE TABLE `galleries` (
  `id` int(11) NOT NULL,
  `title` varchar(256) NOT NULL,
  `text` text NOT NULL,
  `slug` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `galleries`
--

INSERT INTO `galleries` (`id`, `title`, `text`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Galeri 20', '<p>Ketua Komite Tetap Pembinaan dan Pengembangan Konstruksi KADIN, Desiderius Viby Indrayana menggelar rapat bersama Direktorat Jenderal Bina Konstruksi Kementerian PUPR, Direktorat Jenderal Pembinaan, Pelatihan Vokasi dan Produktivitas Kemnaker, BNSP serta LPJK terkait Penuntasan Skema SKKNI Konstruksi (25/3/2022). Rapat tersebut dilaksanakan dalam rangka mendapatkan masukkan yang lebih komprehensif guna mendapatkan informasi aktual Mekanisme dan Penetapan SKKNI dari para stakeholder perumus skema SKKNI di bidang jasa konstruksi.</p>', 'galeri-20', '0000-00-00 00:00:00', '2022-04-01 16:52:08');

-- --------------------------------------------------------

--
-- Struktur dari tabel `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `title` varchar(256) NOT NULL,
  `thumbnail` text NOT NULL,
  `text` text NOT NULL,
  `slug` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `news`
--

INSERT INTO `news` (`id`, `title`, `thumbnail`, `text`, `slug`, `created_at`, `updated_at`) VALUES
(3, 'KADIN bersama Kemnaker, BPJS, Asosiasi dan SP Perkuat Sinergi Program Ketenagakerjaan', 'https://www.kadin.id/public/images/editor-ebad7bce58fd9beac1cd235a4149e4e022ad8dc5.jpeg', '<p>JAKARTA, 16 Maret 2022, Menindaklanjuti hasil putusan Rapat Pimpinan Nasional (Rapimnas) di Bali, 3-4 Desember 2021 lalu, pengurus bidang ketenagakerjaan Kamar Dagang dan Industri (KADIN) Indonesia menggelar Rapat Kerja Nasional (Rakernas) Ketenagakerjaan bertemakan “Penguatan Program Kerja Bidang Ketenagakerjaan,” secara hybrid, Rabu (16/03/2022) yang dihadiri seluruh WKU KADIN Indonesia dan perwakilan asosiasi di bawah KADIN Indonesia secara online dan dihadiri langsung oleh Menteri Tenaga Kerja RI, Ida Fauziyah dan Sekjen Kemnaker Anwar Sanusi beserta pejabat teras Kemnaker dan Dirut BPJS Ketenagakerjaan serta perwakilan APINDO.s</p>', 'kadin-bersama-kemnaker-bpjs-asosiasi-dan-sp-perkuat-sinergi-program-ketenagakerjaan', '2022-03-28 22:17:19', '2022-04-01 15:21:05');

-- --------------------------------------------------------

--
-- Struktur dari tabel `news_categories`
--

CREATE TABLE `news_categories` (
  `id` int(11) NOT NULL,
  `id_news` int(11) NOT NULL,
  `id_categories` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `news_categories`
--

INSERT INTO `news_categories` (`id`, `id_news`, `id_categories`, `created_at`, `updated_at`) VALUES
(12, 3, 3, '2022-04-01 15:21:05', '2022-04-01 15:21:05');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pages`
--

CREATE TABLE `pages` (
  `id` int(11) NOT NULL,
  `title` varchar(256) NOT NULL,
  `text` text NOT NULL,
  `slug` text NOT NULL,
  `permanent` int(11) DEFAULT 0,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pages`
--

INSERT INTO `pages` (`id`, `title`, `text`, `slug`, `permanent`, `created_at`, `updated_at`) VALUES
(1, 'Lambang Ikatan Pengusaha Kenshuuse', '<p>Lambang terdiri dari blablabla</p><p><img src=\"/ckfinder/userfiles/files/flat-design-logo-png-4.png\"></p>', 'lambang', 1, '2022-03-29 11:20:35', '2022-03-31 21:46:11'),
(2, 'Sejarah', '<p>Ini Halaman Sejarah</p>', 'sejarah', 1, '0000-00-00 00:00:00', '2022-03-31 21:43:32'),
(3, 'UU/AD/ART', '<p>Download UU <a href=\"https://\">(disini)</a></p><p>Download AD<a href=\"https://\">(disini)</a></p><p>Download ART<a href=\"https://\">(disini)</a></p>', 'uu-ad-art', 1, '0000-00-00 00:00:00', '2022-03-31 21:44:36'),
(4, 'Peraturan dan Pedoman Organisasi', '<p>Peraturan dan Pedoman Organisasi</p>', 'peraturan-dan-pedoman-organisasi', 1, '0000-00-00 00:00:00', '2022-03-31 21:45:07'),
(5, 'Mars & Hymne', '<p>Halaman Mars &amp; Hymne</p>', 'mars-hymne', 1, '0000-00-00 00:00:00', '2022-03-31 21:46:40'),
(6, 'Struktur Organisasi', '<p>Halaman Struktur Organisasi</p>', 'struktur-organisasi', 1, '0000-00-00 00:00:00', '2022-03-31 21:47:04'),
(7, 'Visi & Misi', '<p>Halaman Visi &amp; Misi</p>', 'visi-misi', 1, '0000-00-00 00:00:00', '2022-03-31 21:47:29'),
(8, 'Persyaratan dan Prosedur', '<p>Halaman Persyaratan dan Prosedur</p>', 'persyaratan-prosedur', 1, '0000-00-00 00:00:00', '2022-03-31 21:52:44'),
(9, 'Asosiasi/Himoynan', '<p>Halaman Asosiasi/Himoynan</p>', 'asosiasi-himoynan', 1, '0000-00-00 00:00:00', '2022-03-31 21:53:13'),
(10, 'Asosiasi Terakreditasi', '<p>Halaman Asosiasi Terakreditasi</p>', 'asosiasi-terakreditasi', 1, '0000-00-00 00:00:00', '2022-03-31 21:53:33');

-- --------------------------------------------------------

--
-- Struktur dari tabel `photos`
--

CREATE TABLE `photos` (
  `id` int(11) NOT NULL,
  `id_gallery` int(11) NOT NULL,
  `photo` text NOT NULL,
  `file_name` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `photos`
--

INSERT INTO `photos` (`id`, `id_gallery`, `photo`, `file_name`, `created_at`, `updated_at`) VALUES
(1, 1, 'https://www.kadin.id/public/gallery/739/gallery-9fd0aa58816b1c3e6c64f9628e2a7012957e437d.jpg', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 1, 'https://www.kadin.id/public/gallery/739/gallery-fb8343b63e3bff4eb8c1a786e9e579cc6394451a.jpg', '[value-4]', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 1, 'https://www.kadin.id/public/gallery/739/gallery-58d2887bb79e93daad35661dfb6611507a8c3e61.jpg', '[value-4]', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `programs`
--

CREATE TABLE `programs` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `url` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `programs`
--

INSERT INTO `programs` (`id`, `name`, `url`, `created_at`, `updated_at`) VALUES
(1, 'yajrabox', 'https://datatables.yajrabox.com/', '0000-00-00 00:00:00', '2022-04-01 10:22:06');

-- --------------------------------------------------------

--
-- Struktur dari tabel `reports`
--

CREATE TABLE `reports` (
  `id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `description` text NOT NULL,
  `slug` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `reports`
--

INSERT INTO `reports` (`id`, `name`, `description`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'tester', '', 'tester', '2022-04-01 10:35:47', '2022-04-01 10:36:54');

-- --------------------------------------------------------

--
-- Struktur dari tabel `report_files`
--

CREATE TABLE `report_files` (
  `id` int(11) NOT NULL,
  `id_report` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `file` text NOT NULL,
  `file_name` text NOT NULL,
  `slug` text NOT NULL,
  `thumbnail` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `report_files`
--

INSERT INTO `report_files` (`id`, `id_report`, `name`, `file`, `file_name`, `slug`, `thumbnail`, `created_at`, `updated_at`) VALUES
(1, 1, 'Penguatan Struktur Industri Baja - FGD Industri - Februari 2018 - Industri Logam Dasar', 'https://www.kadin.id/public/publication/12/publication-thumbnail-44d2be1d41d54ca1564acbba9a6644571e3c3e5e.jpg', 'test', '[value-6]', 'https://www.kadin.id/public/publication/12/publication-thumbnail-44d2be1d41d54ca1564acbba9a6644571e3c3e5e.jpg', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 1, 'Dukungan pada Investasi Smelter - Paparan FGD Industri Februari 2018 - AP3I', 'https://www.kadin.id/public/publication/12/publication-thumbnail-7d29bf86b65c6344bbcab53dae15448e44bf5aaa.jpg', '[value-5]', '[value-6]', 'https://www.kadin.id/public/publication/12/publication-thumbnail-7d29bf86b65c6344bbcab53dae15448e44bf5aaa.jpg', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 0, 'Soal Midsemester', 'http://127.0.0.1:8000/files/1648821306-SOAL MID.pdf', '1648820716-Cover Metode8.pdf', 'Ade Rizki Wahyudi', 'http://127.0.0.1:8000/img/1648821306-b73b5625-d76d-460d-b6b4-30f15ff4e1fc.jfif', '2022-04-01 13:45:16', '2022-04-01 13:55:28');

-- --------------------------------------------------------

--
-- Struktur dari tabel `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `text` text NOT NULL,
  `photo` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `reviews`
--

INSERT INTO `reviews` (`id`, `name`, `text`, `photo`, `created_at`, `updated_at`) VALUES
(1, 'Adlan Ridho P.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam fusce nulla turpis quam ultrices. Bibendum phasellus sapien magna integer est mi viverra. Sed blandit consequat vivamus porttitor molestie arcu. Placerat a volutpat lectus velit aliquam massa.', 'https://1.bp.blogspot.com/-xkSQiVSWVss/WAYh7HS4B4I/AAAAAAAAAKA/cJUtlh3kcSErmHAwW0GLU_6q5NP5wVLegCLcB/s1600/photo%2Bclose%2Bup.jpg', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'Ade R. W', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam fusce nulla turpis quam ultrices. Bibendum phasellus sapien magna integer est mi viverra. Sed blandit consequat vivamus porttitor molestie arcu. Placerat a volutpat lectus velit aliquam massa.', 'https://goldenspikecompany.com/wp-content/uploads/2020/04/singapore_AIRCREW_full-length_photography_Beautybox-e1586682811469.jpg', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(256) NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@admin.com', '$2y$10$JawYBsULWftE7ywYQ4lE5eu2xhUZcXM108XRJAvWzRtLs5sxIP76y', '2022-03-29 19:45:48', '2022-03-31 22:50:11');

-- --------------------------------------------------------

--
-- Struktur dari tabel `web`
--

CREATE TABLE `web` (
  `id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `logo` text NOT NULL,
  `about` text NOT NULL,
  `email` text NOT NULL,
  `instagram` text NOT NULL,
  `pendaftaran` text NOT NULL,
  `facebook` text NOT NULL,
  `twitter` text NOT NULL,
  `phone` varchar(25) NOT NULL,
  `sambutan` text NOT NULL,
  `photo` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `web`
--

INSERT INTO `web` (`id`, `name`, `logo`, `about`, `email`, `instagram`, `pendaftaran`, `facebook`, `twitter`, `phone`, `sambutan`, `photo`, `created_at`, `updated_at`) VALUES
(1, 'Ikatan Pengusaha Kenshuusei Indonesia', 'http://127.0.0.1:8000/img/logo.jpeg', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Similique molestiae nisi nam officiis possimus ullam! Doloremque autem, optio voluptatibus maiores rem officiis itaque qui voluptas. Quaerat omnis eius nesciunt reprehenderit.', 'support@ikapeksi.com', 'https://instagram.com', 'https://web.facebook.com/', 'https://facebook.com', 'https://twitter.com', '085383550237', '<p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam fusce nulla turpis quam ultrices. Bibendum phasellus sapien magna integer est mi viverra. Sed blandit consequat vivamus porttitor molestie arcu. Placerat a volutpat lectus velit aliquam massa.</p><p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam fusce nulla turpis quam ultrices. Bibendum phasellus sapien magna integer est mi viverra. Sed blandit consequat vivamus porttitor molestie arcu. Placerat a volutpat lectus velit aliquam massa.</p><p>- Ade Rizki Wahyudi, Ketua Umum </p>', 'https://ds393qgzrxwzn.cloudfront.net/resize/c500x500/cat1/img/images/0/402w4JmdkB.jpg', '2022-03-25 19:11:33', '2022-03-31 22:02:22');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `event_registrations`
--
ALTER TABLE `event_registrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `galleries`
--
ALTER TABLE `galleries`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `news_categories`
--
ALTER TABLE `news_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `photos`
--
ALTER TABLE `photos`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `programs`
--
ALTER TABLE `programs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `report_files`
--
ALTER TABLE `report_files`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `web`
--
ALTER TABLE `web`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `event_registrations`
--
ALTER TABLE `event_registrations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `galleries`
--
ALTER TABLE `galleries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `news_categories`
--
ALTER TABLE `news_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `photos`
--
ALTER TABLE `photos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `programs`
--
ALTER TABLE `programs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `reports`
--
ALTER TABLE `reports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `report_files`
--
ALTER TABLE `report_files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `web`
--
ALTER TABLE `web`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
