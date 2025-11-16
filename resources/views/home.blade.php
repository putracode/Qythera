<!DOCTYPE html>
<html lang="id">

<head>
    <title>MedikaCare - Template Bootstrap 4 Gratis dari Colorlib</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,500,600,700" rel="stylesheet">

    <link rel="stylesheet" href="/medic/css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="/medic/css/animate.css">

    <link rel="stylesheet" href="/medic/css/owl.carousel.min.css">
    <link rel="stylesheet" href="/medic/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="/medic/css/magnific-popup.css">

    <link rel="stylesheet" href="/medic/css/aos.css">

    <link rel="stylesheet" href="/medic/css/ionicons.min.css">

    <link rel="stylesheet" href="/medic/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="/medic/css/jquery.timepicker.css">


    <link rel="stylesheet" href="/medic/css/flaticon.css">
    <link rel="stylesheet" href="/medic/css/icomoon.css">
    <link rel="stylesheet" href="/medic/css/style.css">
    {{-- @vite(['resources/css/app.css', 'resources/js/app.js'])     --}}
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
        <div class="container">
            <a class="navbar-brand" href="index.html">Medika<span>Care</span></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav"
                aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="oi oi-menu"></span> Menu
            </button>

            <div class="collapse navbar-collapse" id="ftco-nav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active"><a href="index.html" class="nav-link">Beranda</a></li>
                    <li class="nav-item"><a href="about.html" class="nav-link">Tentang Kami</a></li>
                    <li class="nav-item"><a href="services.html" class="nav-link">Layanan</a></li>
                    <li class="nav-item"><a href="doctors.html" class="nav-link">Dokter</a></li>
                    <li class="nav-item"><a href="contact.html" class="nav-link">Kontak</a></li>
                    <li class="nav-item cta"><a href="contact.html" class="nav-link" data-toggle="modal"
                            data-target="#modalRequest"><span>Buat Janji Temu</span></a></li>
                </ul>
            </div>
        </div>
    </nav>
    <section class="home-slider owl-carousel">
        <div class="slider-item" style="background-image: url('/medic/images/bg_1.jpg');">
            <div class="overlay"></div>
            <div class="container">
                <div class="row slider-text align-items-center" data-scrollax-parent="true">
                    <div class="col-md-6 col-sm-12 ftco-animate" data-scrollax=" properties: { translateY: '70%' }">
                        <h1 class="mb-4" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Layanan Medis
                            Modern di Lingkungan yang Tenang dan Nyaman</h1>
                        <p class="mb-4" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Sebuah klinik
                            modern yang didedikasikan untuk kesehatan Anda, memberikan pelayanan terbaik.</p>
                        <p data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><a href="/login"
                                class="btn btn-primary px-4 py-3">Buat Janji Temu</a></p>
                    </div>
                </div>
            </div>
        </div>

    </section>

    {{-- <section class="ftco-intro">
        <div class="container">
            <div class="row no-gutters">
                <div class="col-md-3 color-1 p-4">
                    <h3 class="mb-4">Kasus Darurat</h3>
                    <p>Untuk kasus darurat, silakan hubungi kami segera melalui nomor di bawah ini.</p>
                    <span class="phone-number">+ (123) 456 7890</span>
                </div>
                <div class="col-md-3 color-2 p-4">
                    <h3 class="mb-4">Jam Buka</h3>
                    <p class="openinghours d-flex">
                        <span>Senin - Jumat</span>
                        <span>8:00 - 19:00</span>
                    </p>
                    <p class="openinghours d-flex">
                        <span>Sabtu</span>
                        <span>10:00 - 17:00</span>
                    </p>
                    <p class="openinghours d-flex">
                        <span>Minggu</span>
                        <span>10:00 - 16:00</span>
                    </p>
                </div>
                <div class="col-md-6 color-3 p-4">
                    <h3 class="mb-2">Buat Janji Temu</h3>
                    <form action="#" class="appointment-form">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <div class="select-wrap">
                                        <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                                        <select name="" id="" class="form-control">
                                            <option value="">Pilih Layanan</option>
                                            <option value="">Pemeriksaan Umum</option>
                                            <option value="">Konsultasi Kesehatan</option>
                                            <option value="">Perawatan Luka</option>
                                            <option value="">Vaksinasi</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <div class="icon"><span class="icon-user"></span></div>
                                    <input type="text" class="form-control" id="appointment_name"
                                        placeholder="Nama">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <div class="icon"><span class="icon-paper-plane"></span></div>
                                    <input type="text" class="form-control" id="appointment_email"
                                        placeholder="Email">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <div class="icon"><span class="ion-ios-calendar"></span></div>
                                    <input type="text" class="form-control appointment_date"
                                        placeholder="Tanggal">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <div class="icon"><span class="ion-ios-clock"></span></div>
                                    <input type="text" class="form-control appointment_time" placeholder="Waktu">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <div class="icon"><span class="icon-phone2"></span></div>
                                    <input type="text" class="form-control" id="phone" placeholder="Telepon">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <input type="submit" value="Buat Janji Temu" class="btn btn-primary">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section> --}}

    <section class="ftco-section ftco-services">
        <div class="container">
            <div class="row justify-content-center mb-5 pb-3">
                <div class="col-md-7 text-center heading-section ftco-animate">
                    <h2 class="mb-2">Layanan Kami Menjaga Anda Tetap Sehat</h2>
                    <p>Kami menawarkan layanan medis berkualitas tinggi untuk semua kebutuhan kesehatan Anda.</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 d-flex align-self-stretch ftco-animate">
                    <div class="media block-6 services d-block text-center">
                        <div class="media-body p-2 mt-3">
                            <h3 class="heading">Pemeriksaan Umum</h3>
                            <p>Pemeriksaan kesehatan rutin untuk mendeteksi dan mencegah penyakit secara dini.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 d-flex align-self-stretch ftco-animate">
                    <div class="media block-6 services d-block text-center">
                        <div class="media-body p-2 mt-3">
                            <h3 class="heading">Konsultasi Dokter</h3>
                            <p>Bicarakan keluhan kesehatan Anda dengan dokter umum kami yang berpengalaman.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 d-flex align-self-stretch ftco-animate">
                    <div class="media block-6 services d-block text-center">
                        <div class="media-body p-2 mt-3">
                            <h3 class="heading">Layanan Vaksinasi</h3>
                            <p>Menyediakan berbagai jenis vaksin untuk anak-anak dan dewasa untuk perlindungan optimal.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 d-flex align-self-stretch ftco-animate">
                    <div class="media block-6 services d-block text-center">
                        <div class="media-body p-2 mt-3">
                            <h3 class="heading">Perawatan Medis</h3>
                            <p>Tindakan medis ringan seperti perawatan luka, ganti perban, dan lainnya.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-wrap mt-5">
            <div class="row d-flex no-gutters">
                <div class="col-md-6 img" style="background-image: url(/medic/images/about-2.jpg);">
                </div>
                <div class="col-md-6 d-flex">
                    <div class="about-wrap">
                        <div class="heading-section heading-section-white mb-5 ftco-animate">
                            <h2 class="mb-2">MedikaCare dengan sentuhan personal</h2>
                            <p>Kami percaya bahwa setiap pasien unik dan membutuhkan perhatian khusus.</p>
                        </div>
                        <div class="list-services d-flex ftco-animate">
                            <div class="icon d-flex justify-content-center align-items-center">
                                <span class="icon-check2"></span>
                            </div>
                            <div class="text">
                                <h3>Dokter Berpengalaman</h3>
                                <p>Tim dokter kami memiliki pengalaman bertahun-tahun dalam menangani berbagai kasus
                                    medis.</p>
                            </div>
                        </div>
                        <div class="list-services d-flex ftco-animate">
                            <div class="icon d-flex justify-content-center align-items-center">
                                <span class="icon-check2"></span>
                            </div>
                            <div class="text">
                                <h3>Fasilitas Teknologi Tinggi</h3>
                                <p>Kami menggunakan peralatan medis modern untuk diagnosis yang akurat dan perawatan
                                    efektif.</p>
                            </div>
                        </div>
                        <div class="list-services d-flex ftco-animate">
                            <div class="icon d-flex justify-content-center align-items-center">
                                <span class="icon-check2"></span>
                            </div>
                            <div class="text">
                                <h3>Klinik yang Nyaman</h3>
                                <p>Ruang tunggu dan ruang periksa kami dirancang untuk kenyamanan maksimal pasien.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center ">
                <div class="col-md-7 text-center heading-section ftco-animate">
                    <h2 class="mb-3">Temui Dokter Berpengalaman Kami</h2>
                    <p>Tim profesional kami siap membantu Anda. Mereka adalah para ahli di bidangnya masing-masing.</p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-6 d-flex mb-sm-4 ftco-animate">
                    <div class="staff">
                        <div class="img mb-4" style="background-image: url(/medic/images/person_5.jpg);"></div>
                        <div class="info text-center">
                            <h3><a href="teacher-single.html">Dr. Budi Santoso</a></h3>
                            <span class="position">Dokter Umum</span>
                            <div class="text">
                                <p>Lulusan terbaik dengan spesialisasi kesehatan keluarga dan pencegahan penyakit.</p>
                                <ul class="ftco-social">
                                    <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a>
                                    </li>
                                    <li class="ftco-animate"><a href="#"><span
                                                class="icon-facebook"></span></a></li>
                                    <li class="ftco-animate"><a href="#"><span
                                                class="icon-instagram"></span></a></li>
                                    <li class="ftco-animate"><a href="#"><span
                                                class="icon-google-plus"></span></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 d-flex mb-sm-4 ftco-animate">
                    <div class="staff">
                        <div class="img mb-4" style="background-image: url(/medic/images/person_6.jpg);"></div>
                        <div class="info text-center">
                            <h3><a href="teacher-single.html">Dr. Anita Wijaya</a></h3>
                            <span class="position">Dokter Umum</span>
                            <div class="text">
                                <p>Berpengalaman dalam menangani kasus darurat dan perawatan intensif.</p>
                                <ul class="ftco-social">
                                    <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a>
                                    </li>
                                    <li class="ftco-animate"><a href="#"><span
                                                class="icon-facebook"></span></a></li>
                                    <li class="ftco-animate"><a href="#"><span
                                                class="icon-instagram"></span></a></li>
                                    <li class="ftco-animate"><a href="#"><span
                                                class="icon-google-plus"></span></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 d-flex mb-sm-4 ftco-animate">
                    <div class="staff">
                        <div class="img mb-4" style="background-image: url(/medic/images/person_7.jpg);"></div>
                        <div class="info text-center">
                            <h3><a href="teacher-single.html">Dr. Citra Lestari</a></h3>
                            <span class="position">Dokter Anak</span>
                            <div class="text">
                                <p>Spesialis kesehatan anak dengan pendekatan ramah dan sabar.</p>
                                <ul class="ftco-social">
                                    <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a>
                                    </li>
                                    <li class="ftco-animate"><a href="#"><span
                                                class="icon-facebook"></span></a></li>
                                    <li class="ftco-animate"><a href="#"><span
                                                class="icon-instagram"></span></a></li>
                                    <li class="ftco-animate"><a href="#"><span
                                                class="icon-google-plus"></span></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 d-flex mb-sm-4 ftco-animate">
                    <div class="staff">
                        <div class="img mb-4" style="background-image: url(/medic/images/person_8.jpg);"></div>
                        <div class="info text-center">
                            <h3><a href="teacher-single.html">Rian Hidayat</a></h3>
                            <span class="position">Kepala Klinik</span>
                            <div class="text">
                                <p>Memastikan semua layanan berjalan lancar dan sesuai standar kualitas tertinggi.</p>
                                <ul class="ftco-social">
                                    <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a>
                                    </li>
                                    <li class="ftco-animate"><a href="#"><span
                                                class="icon-facebook"></span></a></li>
                                    <li class="ftco-animate"><a href="#"><span
                                                class="icon-instagram"></span></a></li>
                                    <li class="ftco-animate"><a href="#"><span
                                                class="icon-google-plus"></span></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row  mt-5 justify-conten-center">
                <div class="col-md-8 ftco-animate">
                    <p>Kesehatan Anda adalah prioritas kami. Kami terus berupaya meningkatkan kualitas layanan untuk
                        kepuasan semua pasien. Jangan ragu untuk menghubungi kami jika Anda memiliki pertanyaan lebih
                        lanjut.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section ftco-counter img" id="section-counter"
        style="background-image: url(/medic/images/bg_1.jpg);" data-stellar-background-ratio="0.5">
        <div class="container">
            <div class="row d-flex align-items-center">
                <div class="col-md-3 aside-stretch py-5">
                    <div class=" heading-section heading-section-white ftco-animate pr-md-4">
                        <h2 class="mb-3">Pencapaian Kami</h2>
                        <p>Dedikasi kami terhadap kesehatan telah diakui selama bertahun-tahun.</p>
                    </div>
                </div>
                <div class="col-md-9 py-5 pl-md-5">
                    <div class="row">
                        <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
                            <div class="block-18">
                                <div class="text">
                                    <strong class="number" data-number="14">0</strong>
                                    <span>Tahun Pengalaman</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
                            <div class="block-18">
                                <div class="text">
                                    <strong class="number" data-number="45">0</strong> <span>Staf Medis
                                        Terkualifikasi</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
                            <div class="block-18">
                                <div class="text">
                                    <strong class="number" data-number="4200">0</strong>
                                    <span>Pasien Puas</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
                            <div class="block-18">
                                <div class="text">
                                    <strong class="number" data-number="320">0</strong>
                                    <span>Pasien Per Tahun</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>




    <section class="ftco-quote" style="margin-top: 100px;">
        <div class="container">
            <div class="row">
                <div class="col-md-6 pr-md-5 aside-stretch py-5 choose">
                    <div class="heading-section heading-section-white mb-5 ftco-animate">
                        <h2 class="mb-2">Prosedur MedikaCare &amp; Layanan Berkualitas Tinggi</h2>
                    </div>
                    <div class="ftco-animate">
                        <p>Kami berkomitmen untuk menyediakan layanan kesehatan terbaik dengan prosedur standar
                            internasional. Kepercayaan dan kesembuhan pasien adalah prioritas utama kami.</p>
                        <ul class="un-styled my-5">
                            <li><span class="icon-check"></span>Staf Medis Profesional</li>
                            <li><span class="icon-check"></span>Diagnosis Akurat</li>
                            <li><span class="icon-check"></span>Perawatan Efektif</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6 py-5 pl-md-5">
                    <div class="heading-section mb-5 ftco-animate">
                        <h2 class="mb-2">Hubungi Kami</h2>
                    </div>
                    <form action="#" class="ftco-animate">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Nama Lengkap">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Email">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Telepon">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Website (Opsional)">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <textarea name="" id="" cols="30" rows="7" class="form-control" placeholder="Pesan"></textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="submit" value="Kirim Pesan" class="btn btn-primary py-3 px-5">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    {{-- <div id="map"></div> --}}

    <footer class="ftco-footer ftco-bg-dark ftco-section">
        <div class="container">
            <div class="row mb-5">
                <div class="col-md-3">
                    <div class="ftco-footer-widget mb-4">
                        <h2 class="ftco-heading-2">MedikaCare.</h2>
                        <p>Jauh di balik kata gunung, jauh dari negara Vokalia dan Consonantia, hiduplah teks-teks buta.
                        </p>
                    </div>
                    <ul class="ftco-footer-social list-unstyled float-md-left float-lft ">
                        <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                        <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                        <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
                    </ul>
                </div>
                <div class="col-md-6">
                    <div class="ftco-footer-widget mb-4 ml-md-5">
                        <h2 class="ftco-heading-2">Tautan Cepat</h2>
                        <ul class="list-unstyled">
                            <li><a href="#" class="py-2 d-block">Tentang Kami</a></li>
                            <li><a href="#" class="py-2 d-block">Layanan</a></li>
                            <li><a href="#" class="py-2 d-block">Dokter</a></li>

                            <li><a href="#" class="py-2 d-block">Kontak</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="ftco-footer-widget mb-4">
                        <h2 class="ftco-heading-2">Kantor</h2>
                        <div class="block-23 mb-3">
                            <ul>
                                <li><span class="icon icon-map-marker"></span><span class="text">203 Fake St.
                                        Mountain View, San Francisco, California, USA</span></li>
                                <li><a href="#"><span class="icon icon-phone"></span><span class="text">+2
                                            392 3929 210</span></a></li>
                                <li><a href="#"><span class="icon icon-envelope"></span><span
                                            class="text">info@domainanda.com</span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>



    {{-- <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div> --}}

    <div class="modal fade" id="modalRequest" tabindex="-1" role="dialog" aria-labelledby="modalRequestLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalRequestLabel">Buat Janji Temu</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="#">
                        <div class="form-group">
                            <input type="text" class="form-control" id="appointment_name"
                                placeholder="Nama Lengkap">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="appointment_email" placeholder="Email">
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control appointment_date"
                                        placeholder="Tanggal">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control appointment_time" placeholder="Waktu">
                                </div>
                            </div>
                        </div>


                        <div class="form-group">
                            <textarea name="" id="appointment_message" class="form-control" cols="30" rows="10"
                                placeholder="Pesan"></textarea>
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Buat Janji Temu" class="btn btn-primary">
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>


    <script src="/medic/js/jquery.min.js"></script>
    <script src="/medic/js/jquery-migrate-3.0.1.min.js"></script>
    <script src="/medic/js/popper.min.js"></script>
    <script src="/medic/js/bootstrap.min.js"></script>
    <script src="/medic/js/jquery.easing.1.3.js"></script>
    <script src="/medic/js/jquery.waypoints.min.js"></script>
    <script src="/medic/js/jquery.stellar.min.js"></script>
    <script src="/medic/js/owl.carousel.min.js"></script>
    <script src="/medic/js/jquery.magnific-popup.min.js"></script>
    <script src="/medic/js/aos.js"></script>
    <script src="/medic/js/jquery.animateNumber.min.js"></script>
    <script src="/medic/js/bootstrap-datepicker.js"></script>
    <script src="/medic/js/jquery.timepicker.min.js"></script>
    <script src="/medic/js/scrollax.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
    <script src="/medic/js/google-map.js"></script>
    <script src="/medic/js/main.js"></script>

</body>

</html>
