<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
          content="An impressive and flawless site template that includes various UI elements and countless features, attractive ready-made blocks and rich pages, basically everything you need to create a unique and professional website.">
    <meta name="keywords"
          content="bootstrap 5, business, corporate, creative, gulp, marketing, minimal, modern, multipurpose, one page, responsive, saas, sass, seo, startup, html5 template, site template">
    <meta name="author" content="elemis">
    <title>Sandbox - Modern & Multipurpose Bootstrap 5 Template</title>
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/plugins.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/colors/purple.css') }}">
    <link rel="preload" href="{{ asset('assets/css/fonts/urbanist.css') }}" as="style" onload="this.rel='stylesheet'">
</head>

<body>
<div class="page-frame bg-pale-primary">
    <div class="content-wrapper">
        <header class="wrapper">
            <nav class="navbar navbar-expand-lg classic transparent position-absolute navbar-dark">
                <div class="container flex-lg-row flex-nowrap align-items-center">
                    <div class="navbar-brand w-100">
                        <a href="/">
                            <img class="logo-dark" src="{{ asset('assets/img/brands/logo-header-small.png') }}"
                                 srcset="{{ asset('assets/img/logo-dark@2x.png') }} 2x" alt=""/>
                            <img class="logo-light" src="{{ asset('assets/img/brands/logo-header-small.png') }}"
                                 srcset="{{ asset('assets/img/logo-light@2x.png') }} 2x" alt=""/>
                        </a>
                    </div>
                    <div class="navbar-collapse offcanvas offcanvas-nav offcanvas-start">
                        <div class="offcanvas-header d-lg-none">
                            <h3 class="text-white fs-30 mb-0">Sandbox</h3>
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"
                                    aria-label="Close"></button>
                        </div>
                        <div class="offcanvas-body ms-lg-auto d-flex flex-column h-100">
                            <ul class="navbar-nav">
                                @foreach($links as $link)

                                    <x-navbar.link is-root="1" :link="$link"></x-navbar.link>

                                @endforeach

                            </ul>

                            <!-- /.navbar-nav -->
                            <div class="offcanvas-footer d-lg-none">
                                <div>
                                    <a href="mailto:first.last@email.com" class="link-inverse">info@email.com</a>
                                    <br/> 00 (123) 456 78 90 <br/>
                                    <nav class="nav social social-white mt-4">
                                        <a href="#"><i class="uil uil-twitter"></i></a>
                                        <a href="#"><i class="uil uil-facebook-f"></i></a>
                                        <a href="#"><i class="uil uil-dribbble"></i></a>
                                        <a href="#"><i class="uil uil-instagram"></i></a>
                                        <a href="#"><i class="uil uil-youtube"></i></a>
                                    </nav>
                                    <!-- /.social -->
                                </div>
                            </div>
                            <!-- /.offcanvas-footer -->
                        </div>
                        <!-- /.offcanvas-body -->
                    </div>
                    <!-- /.navbar-collapse -->
                    <div class="navbar-other w-100 d-flex ms-auto">
                        <ul class="navbar-nav flex-row align-items-center ms-auto">
                            <li class="nav-item dropdown language-select text-uppercase">
                                <a class="nav-link dropdown-item dropdown-toggle" href="#" role="button"
                                   data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">En</a>
                                <ul class="dropdown-menu">
                                    <li class="nav-item w-auto"><a href="#" title="Arabic"
                                                                        class="d-flex align-items-center gap-2 dropdown-item"><img
                                                data-gt-lazy-src="//rhmzrs.com/wp-content/plugins/gtranslate/flags/16/ar.png"
                                                height="16" width="16" alt="ar"
                                                src="//rhmzrs.com/wp-content/plugins/gtranslate/flags/16/ar.png">
                                            Arabic</a></li>
                                    <li class="nav-item w-auto"><a href="#"
                                                                        title="Chinese (Simplified)" class="d-flex align-items-center gap-2 dropdown-item"><img
                                                data-gt-lazy-src="//rhmzrs.com/wp-content/plugins/gtranslate/flags/16/zh-CN.png"
                                                height="16" width="16" alt="zh-CN"
                                                src="//rhmzrs.com/wp-content/plugins/gtranslate/flags/16/zh-CN.png">
                                            Chinese (Simplified)</a></li>
                                </ul>
                            </li>
                            <li class="nav-item d-lg-none">
                                <button class="hamburger offcanvas-nav-btn"><span></span></button>
                            </li>
                        </ul>
                        <!-- /.navbar-nav -->
                    </div>
                    <!-- /.navbar-other -->
                </div>
                <!-- /.container -->
            </nav>
            <!-- /.navbar -->
            <!-- /.offcanvas -->
        </header>
        <!-- /header -->
        <section class="video-wrapper bg-overlay bg-overlay-gradient px-0 mt-0 min-vh-50">
            <video poster="{{ asset('assets/img/photos/movie2.jpg') }}" src="{{ asset('assets/media/sky.mp4') }}"
                   autoplay loop playsinline muted></video>
            <div class="video-content">
                <div class="container text-center">
                    <div class="row">
                        <div class="col-lg-8 col-xl-6 text-center text-white mx-auto">
                            <img src="{{ asset('assets/img/brands/logo-header.png') }}" class="w-100 mt-12" alt="">
                        </div>
                        <!-- /column -->
                    </div>
                </div>
                <!-- /.video-content -->
            </div>
            <!-- /.content-overlay -->
        </section>
        <!-- /section -->
        {{--        <section class="wrapper bg-light">--}}
        {{--            <div class="container py-15 py-md-17">--}}
        {{--                {{ $slot }}--}}
        {{--            </div>--}}
        {{--            <!-- /.container -->--}}
        {{--        </section>--}}
        <!-- /section -->
        <!-- /section -->

        {{ $slot }}
    </div>
    <!-- /.content-wrapper -->
    <footer class="bg-dark text-inverse">
        <div class="container py-13 py-md-15">
            <div class="row gy-6 gy-lg-0">
                <div class="col-md-4 col-lg-4">
                    <div class="widget">
                        <img class="mb-4 w-75" src="{{ asset('assets/img/brands/logo-header.png') }}"
                             srcset="{{ asset('assets/img/brands/logo-header.png') }} 2x" alt=""/>
                        <p class="mb-4"><b>© {{ now()->year }}</b> СВА ПРАВА ЗАДРЖАНА РЕПУБЛИЧКИ ХИДРОМЕТЕОРОЛОШКИ ЗАВОД
                        </p>
                    </div>
                    <!-- /.widget -->
                </div>
                <!-- /column -->
                <div class="col-md-4 col-lg-4">
                    <p>Републикa Српскa<br>
                        Влада Републике Српске<br>
                        Министарство пољопривреде,<br>
                        шумарства и водопривреде<br>
                        <strong>Републички хидрометеоролошки завод</strong></p>
                    <!-- /.widget -->
                </div>
                <!-- /column -->
                <div class="col-md-4 col-lg-4">
                    <div class="widget">
                        <h4 class="widget-title text-white mb-3">Корисни линкови</h4>
                        <ul class="list-unstyled  mb-0">
                            <li><a href="/uslovi-koriscenja">Услови коришћења</a></li>
                            <li><a href="/pristup-informacijama">Приступ информацијама</a></li>
                        </ul>
                    </div>
                    <!-- /.widget -->
                </div>
                <!-- /column -->
            </div>
            <!--/.row -->
        </div>
        <!-- /.container -->
    </footer>
</div>
<!-- /.page-frame -->
<div class="progress-wrap">
    <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
        <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98"/>
    </svg>
</div>
<script src="{{ asset('assets/js/plugins.js') }}"></script>
<script src="{{ asset('assets/js/theme.js') }}"></script>
</body>

</html>
