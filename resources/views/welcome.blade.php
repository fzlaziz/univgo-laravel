<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">

    <title>UnivGO</title>

    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" href="{{ asset('logo.svg') }}" type="image/ico">
    <link rel="stylesheet" href="{{ asset('assets/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/LineIcons.2.0.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.4.5.2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/default.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

</head>

<body>
    <div class="preloader">
        <div class="loader">
            <div class="ytp-spinner">
                <div class="ytp-spinner-container">
                    <div class="ytp-spinner-rotator">
                        <div class="ytp-spinner-left">
                            <div class="ytp-spinner-circle"></div>
                        </div>
                        <div class="ytp-spinner-right">
                            <div class="ytp-spinner-circle"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="header_area">
        <div class="header_navbar">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <nav class="navbar sticky navbar-expand-lg">
                            <div class="navbar-brand">
                                <img src="assets/images/logo.png" alt="" class="image-class">
                                <h3>UnivGO</h3>
                            </div>
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="toggler-icon"></span>
                                <span class="toggler-icon"></span>
                                <span class="toggler-icon"></span>
                            </button>

                            <div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent">
                                <ul id="nav" class="navbar-nav ml-auto">
                                    <li class="nav-item active">
                                        <a class="page-scroll" href="#home">Home</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="page-scroll" href="#features">Feature</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="page-scroll" href="#about">About</a>
                                    </li>
                                </ul>
                            </div> <!-- navbar collapse -->
                        </nav> <!-- navbar -->
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
        </div> <!-- header navbar -->

        <div id="home" class="header_hero d-lg-flex align-items-center">
            <img class="shape shape-1" src="assets/images/shape-1.svg" alt="shape">
            <img class="shape shape-2" src="assets/images/shape-2.svg" alt="shape">
            <img class="shape shape-3" src="assets/images/shape-3.svg" alt="shape">

            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="header_hero_content mt-45">
                            <h2 class="header_title wow fadeInLeftBig" data-wow-duration="1.3s" data-wow-delay="0.2s">UnivGO</h2>
                            <p class="wow fadeInLeftBig" data-wow-duration="1.3s" data-wow-delay="0.6s">
                                UnivGO adalah aplikasi direktori kampus yang dirancang untuk memudahkan kamu dalam menemukan informasi seputar kampus di Indonesia.
                                UnivGO memudahkan kamu menemukan kampus terdekat, top 10 PTN, politeknik, dan swasta terbaik, serta berita kampus dan fitur pencarian program studi.
                            </p>
                            <ul>
                                <li><a class="main-btn main-btn-2 wow fadeInUp" data-wow-duration="1.3s" data-wow-delay="1.4s" href="https://github.com/fzlaziz/univgo-flutter/releases">Download App</a></li>
                            </ul>
                        </div> <!-- header hero content -->
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
            <div class="header_image d-flex align-items-end">
                <div class="image wow fadeInRightBig" data-wow-duration="1.3s" data-wow-delay="1.8s">
                    <img src="assets/images/head.png" alt="header App">
                    <img src="assets/images/dots.svg" alt="dots" class="dots">
                </div> <!-- image -->
            </div> <!-- header image -->
        </div> <!-- header hero -->
    </section>


    <section id="features" class="features_area pt-35 pb-80">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-7 col-sm-8">
                    <div class="single_features mt-30 features_1 text-center wow fadeInUp" data-wow-duration="1.3s" data-wow-delay="0.2s">
                        <div class="features_icon">
                            <i class="lni lni-map-marker"></i>
                        </div>
                        <div class="features_content">
                            <h4 class="features_title">Temukan Kampus Terdekat</h4>
                            <p>
                                Jelajahi kampus-kampus terdekat dengan lokasi Anda dan temukan yang paling sesuai dengan kebutuhan Anda.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-7 col-sm-8">
                    <div class="single_features mt-30 features_2 text-center wow fadeInUp" data-wow-duration="1.3s" data-wow-delay="0.5s">
                        <div class="features_icon">
                            <i class="lni lni-star"></i>
                        </div>
                        <div class="features_content">
                            <h4 class="features_title">Ranking, Ulasan, dan Berita Kampus</h4>
                            <p>
                                Lihat ranking, ulasan, dan berita dari berbagai kampus untuk membantu Anda memilih kampus terbaik.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-7 col-sm-8">
                    <div class="single_features mt-30 features_3 text-center wow fadeInUp" data-wow-duration="1.3s" data-wow-delay="0.9s">
                        <div class="features_icon">
                            <i class="lni lni-search"></i>
                        </div>
                        <div class="features_content">
                            <h4 class="features_title">Pencarian Kampus dan Program Studi</h4>
                            <p>
                                Cari kampus dan program studi yang sesuai dengan minat dan kebutuhan akademik Anda dengan mudah.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="about" class="about_area pt-30 pb-80">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-9">
                    <div class="about_image mt-50 wow fadeInRightBig" data-wow-duration="1.3s" data-wow-delay="0.5s">
                        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" data-interval="5000">
                            <ol class="carousel-indicators">
                                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                              </ol>
                            <div class="carousel-inner">
                              <div class="carousel-item active">
                                <img src="assets/images/home1.jpg" class="d-block" alt="">
                              </div>
                              <div class="carousel-item">
                                <img src="assets/images/profile_campus1.jpg" class="d-block" alt="">
                              </div>
                            </div>
                            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev" style="color: black;">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                              </a>
                            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next" style="color: black;">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                            </a>
                        </div>
                        <img class="dots" src="assets/images/dots.svg" alt="dots">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about_content mt-45 wow fadeInLeftBig" data-wow-duration="1.3s" data-wow-delay="0.5s">
                        <div class="section_title">
                            <h4 class="title">Rekomendasi Kampus Terdekat</h4>
                            <p>
                                Memanfaatkan teknologi berbasis lokasi untuk memberikan saran kampus yang berada di sekitar pengguna. Dengan fitur ini, pengguna dapat mengetahui jarak kampus Rekomendasi juga dilengkapi dengan ulasan dan rating dari pengguna lain, sehingga memudahkan pengambilan keputusan.
                            </p>
                        </div>
                        <!-- <a class="main-btn" href="#">Discover</a> -->

                    </div> <!-- about image -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>

    <section id="about" class="about_area pt-30 pb-80">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 order-5 order-lg-1">
                    <div class="about_content mt-45 wow fadeInRightBig" data-wow-duration="1.3s" data-wow-delay="0.5s">
                        <div class="section_title">
                            <h4 class="title">Top Perguruan Tinggi</h4>
                            <p>
                                Memberikan informasi tentang kampus-kampus terbaik di Indonesia yang terbagi menjadi tiga kategori, yaitu PTN, Politeknik, dan PTS. Informasi yang disajikan mencakup peringkat nasional, akreditasi, program studi unggulan, serta berbagai prestasi yang telah diraih oleh kampus-kampus tersebut. Dengan adanya fitur ini, pengguna dapat menentukan pilihan kampus berdasarkan kualitas dan reputasinya.
                            </p>
                        </div>
                        <!-- <a class="main-btn" href="#">Discover</a> -->

                    </div> <!-- about image -->
                </div>
                <div class="col-lg-6 col-md-9 order-1 order-lg-5">
                    <div class="about_image_right mt-50 wow fadeInLeftBig" data-wow-duration="1.3s" data-wow-delay="0.5s">
                        <div id="carouselData1" class="carousel slide" data-ride="carousel" data-interval="5000">
                            <ol class="carousel-indicators">
                                <li data-target="#carouselData1" data-slide-to="0" class="active"></li>
                                <li data-target="#carouselData1" data-slide-to="1"></li>
                              </ol>
                            <div class="carousel-inner">
                              <div class="carousel-item active">
                                <img src="assets/images/top1.jpg" class="d-block" alt="">
                              </div>
                              <div class="carousel-item">
                                <img src="assets/images/top2.jpg" class="d-block" alt="">
                              </div>
                            </div>
                            <a class="carousel-control-prev" href="#carouselData1" role="button" data-slide="prev" style="color: black;">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                              </a>
                            <a class="carousel-control-next" href="#carouselData1" role="button" data-slide="next" style="color: black;">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                            </a>
                        </div>
                        <img class="dots" src="assets/images/dots.svg" alt="dots">
                    </div> <!-- about image -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>

    <section id="about" class="about_area pt-30 pb-80">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-9">
                    <div class="about_image mt-50 wow fadeInRightBig" data-wow-duration="1.3s" data-wow-delay="0.5s">
                        <div id="carouselData2" class="carousel slide" data-ride="carousel" data-interval="5000">
                            <ol class="carousel-indicators">
                                <li data-target="#carouselData2" data-slide-to="0" class="active"></li>
                                <li data-target="#carouselData2" data-slide-to="1"></li>
                                <li data-target="#carouselData2" data-slide-to="2"></li>
                                <li data-target="#carouselData2" data-slide-to="3"></li>
                                <li data-target="#carouselData2" data-slide-to="4"></li>
                                <li data-target="#carouselData2" data-slide-to="5"></li>
                                <li data-target="#carouselData2" data-slide-to="6"></li>
                                <li data-target="#carouselData2" data-slide-to="7"></li>
                                <li data-target="#carouselData2" data-slide-to="8"></li>
                              </ol>
                            <div class="carousel-inner">
                              <div class="carousel-item active">
                                <img src="assets/images/profile_campus1.jpg" class="d-block" alt="">
                              </div>
                              <div class="carousel-item">
                                <img src="assets/images/profile_campus2.jpg" class="d-block" alt="">
                              </div>
                              <div class="carousel-item">
                                <img src="assets/images/profile_campus3.jpg" class="d-block" alt="">
                              </div>
                              <div class="carousel-item">
                                <img src="assets/images/profile_campus4.jpg" class="d-block" alt="">
                              </div>
                              <div class="carousel-item">
                                <img src="assets/images/profile_campus5.jpg" class="d-block" alt="">
                              </div>
                              <div class="carousel-item">
                                <img src="assets/images/profile_campus6.jpg" class="d-block" alt="">
                              </div>
                              <div class="carousel-item">
                                <img src="assets/images/review1.jpg" class="d-block" alt="">
                              </div>
                              <div class="carousel-item">
                                <img src="assets/images/review2.jpg" class="d-block" alt="">
                              </div>
                            </div>
                            <a class="carousel-control-prev" href="#carouselData2" role="button" data-slide="prev" style="color: black;">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                              </a>
                            <a class="carousel-control-next" href="#carouselData2" role="button" data-slide="next" style="color: black;">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                            </a>
                        </div>
                        <img class="dots" src="assets/images/dots.svg" alt="dots">
                    </div> <!-- about image -->
                </div>
                <div class="col-lg-6">
                    <div class="about_content mt-45 wow fadeInLeftBig" data-wow-duration="1.3s" data-wow-delay="0.5s">
                        <div class="section_title">
                            <h4 class="title">
                                Profile Dan Informasi Lengkap Kampus
                            </h4>
                            <p>
                                Menyediakan detail mendalam tentang setiap kampus. Informasi yang ditampilkan meliputi program studi yang ditawarkan, akreditasi, fasilitas kampus, biaya pendidikan, hingga kontak resmi kampus seperti alamat, nomor telepon, email, dan website. Selain itu, pengguna juga dapat melihat galeri foto, video profil, dan testimoni dari mahasiswa atau alumni. Fitur ini bahkan terintegrasi dengan aplikasi peta untuk memudahkan navigasi ke lokasi kampus yang dipilih.
                            </p>
                        </div>
                        <!-- <a class="main-btn" href="#">Discover</a> -->

                    </div> <!-- about image -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>

    <section id="about" class="about_area pt-30 pb-80">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 order-5 order-lg-1">
                    <div class="about_content mt-45 wow fadeInRightBig" data-wow-duration="1.3s" data-wow-delay="0.5s">
                        <div class="section_title">
                            <h4 class="title">Pencarian dan Filter Pencarian</h4>
                            <p>
                                Dirancang untuk membantu pengguna menemukan kampus yang sesuai dengan kebutuhan mereka. Dengan fitur ini, pengguna dapat mencari kampus berdasarkan nama, lokasi, jurusan, akreditasi, atau biaya pendidikan. Selain itu, terdapat filter tambahan untuk menyortir hasil pencarian berdasarkan level studi, kategori seperti PTN, PTS, atau Politeknik, lokasi kampus, serta akreditasi kampus.
                            </p>
                        </div>
                        <!-- <a class="main-btn" href="#">Discover</a> -->

                    </div> <!-- about image -->
                </div>
                <div class="col-lg-6 col-md-9 order-1 order-lg-5">
                    <div class="about_image_right mt-50 wow fadeInLeftBig" data-wow-duration="1.3s" data-wow-delay="0.5s">
                        <img class="dots" src="assets/images/dots.svg" alt="dots">
                        <div id="catouselData3" class="carousel slide" data-ride="carousel" data-interval="5000">
                            <ol class="carousel-indicators">
                                <li data-target="#catouselData3" data-slide-to="0" class="active"></li>
                                <li data-target="#catouselData3" data-slide-to="1"></li>
                                <li data-target="#catouselData3" data-slide-to="2"></li>
                              </ol>
                            <div class="carousel-inner">
                              <div class="carousel-item active">
                                <img src="assets/images/search_campus.jpg" class="d-block" alt="">
                              </div>
                              <div class="carousel-item">
                                <img src="assets/images/search_prodi.jpg" class="d-block" alt="">
                              </div>
                              <div class="carousel-item">
                                <img src="assets/images/filter_search.jpg" class="d-block" alt="">
                              </div>
                            </div>
                            <a class="carousel-control-prev" href="#catouselData3" role="button" data-slide="prev" style="color: black;">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                              </a>
                            <a class="carousel-control-next" href="#catouselData3" role="button" data-slide="next" style="color: black;">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div> <!-- about image -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>

    <section id="about" class="about_area pt-30 pb-80">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-9">
                    <div class="about_image mt-50 wow fadeInRightBig" data-wow-duration="1.3s" data-wow-delay="0.5s">
                        <img class="dots" src="assets/images/dots.svg" alt="dots">
                        <div id="carouselData4" class="carousel slide" data-ride="carousel" data-interval="5000">
                            <ol class="carousel-indicators">
                                <li data-target="#carouselData4" data-slide-to="0" class="active"></li>
                                <li data-target="#carouselData4" data-slide-to="1"></li>
                                <li data-target="#carouselData4" data-slide-to="2"></li>
                              </ol>
                            <div class="carousel-inner">
                              <div class="carousel-item active">
                                <img src="assets/images/news_list.jpg" class="d-block" alt="">
                              </div>
                              <div class="carousel-item">
                                <img src="assets/images/news_detail.jpg" class="d-block" alt="">
                              </div>
                              <div class="carousel-item">
                                <img src="assets/images/news_home.jpg" class="d-block" alt="">
                              </div>
                            </div>
                            <a class="carousel-control-prev" href="#carouselData4" role="button" data-slide="prev" style="color: black;">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                              </a>
                            <a class="carousel-control-next" href="#carouselData4" role="button" data-slide="next" style="color: black;">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div> <!-- about image -->
                </div>
                <div class="col-lg-6">
                    <div class="about_content mt-45 wow fadeInLeftBig" data-wow-duration="1.3s" data-wow-delay="0.5s">
                        <div class="section_title">
                            <h4 class="title">
                                Berita Terkini
                            </h4>
                            <p>
                                Menghadirkan informasi terbaru seputar dunia pendidikan. Pengguna dapat membaca berita mengenai kebijakan pemerintah, beasiswa, inovasi teknologi pendidikan, hingga acara kampus yang sedang berlangsung. Artikel-artikel dalam fitur ini dilengkapi dengan fitur kolom komentar untuk diskusi.
                            </p>
                        </div>
                        <!-- <a class="main-btn" href="#">Discover</a> -->

                    </div> <!-- about image -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>

    <section id="app_features">

    </section>

    <section id="screenshot">

    </section>

    <section id="download" class="blog_area download_app_area pt-80 mb-80">
        <div class="container">
            <div class="download_app">
                <div class="download_shape">
                    <img src="assets/images/shape-5.svg" alt="shape">
                </div>
                <div class="download_shape_2">
                    <img src="assets/images/shape-6.png" alt="shape">
                </div>
                <div class="download_app_content">
                    <h3 class="download_title">Download UnivGO Sekarang!</h3>
                    <p>Find Your Campus, Everywhere Anytime</p>
                    <ul>
                        <li>
                            <a class="main-btn main-btn-2 d-flex align-items-center" href="https://github.com/fzlaziz/univgo-flutter/releases">Download App</a>
                        </li>
                    </ul>
                </div>  <!-- download app content -->
            </div> <!-- download app -->
        </div> <!-- container -->
        <div class="download_app_image d-none d-lg-flex align-items-end">
            <div class="image wow fadeInRightBig" data-wow-duration="1.3s" data-wow-delay="0.5s">
                <img src="assets/images/head.png" alt="download">
            </div> <!-- image -->
        </div> <!-- download app image -->
    </section>

    <!--====== DOWNLOAD APP PART ENDS ======-->


    <!--====== FOOTER PART START ======-->

    <section id="footer" class="footer_area pb-80">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <div class="footer_copyright text-center">
                        <p>Copyright &copy; 2025 UnivGO. Designed and Developed by <a href="https://uideck.com" rel="nofollow">UIdeck</a></p>
                    </div>
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>


    <a href="#" class="back-to-top"><i class="lni lni-chevron-up"></i></a>


    <script src="{{ asset('assets/js/vendor/jquery-1.12.4.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/modernizr-3.7.1.min.js') }}"></script>
    <script src="{{ asset('assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.4.5.2.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('assets/js/scrolling-nav.js') }}"></script>
    <script src="{{ asset('assets/js/wow.min.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>

    <script>
        function initCarousel() {
        const slides = document.querySelectorAll('.slide');
        const dots = document.querySelectorAll('.dot');
        let currentSlide = 0;

        function showSlide(index) {
            slides.forEach(slide => slide.classList.remove('active'));
            dots.forEach(dot => dot.classList.remove('active'));

            slides[index].classList.add('active');
            dots[index].classList.add('active');
        }

        function nextSlide() {
            currentSlide = (currentSlide + 1) % slides.length;
            showSlide(currentSlide);
        }
        dots.forEach((dot, index) => {
            dot.addEventListener('click', () => {
            currentSlide = index;
            showSlide(currentSlide);
            });
        });
        setInterval(nextSlide, 3000);
        }
        document.addEventListener('DOMContentLoaded', initCarousel);
    </script>
</body>

</html>
