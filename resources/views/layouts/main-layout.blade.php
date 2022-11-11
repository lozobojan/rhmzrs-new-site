<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/plugins.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/colors/purple.css') }}">
    <link rel="preload" href="{{ asset('assets/css/fonts/urbanist.css') }}" as="style" onload="this.rel='stylesheet'">
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <meta name='robots' content='index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1'/>
    <meta name='keywords' content='{{ $metaKeywords }}'/>

    <!-- Primary Meta Tags -->
    <title>{{ $metaTitle }}</title>
    <meta name="title" content="{{ $metaTitle }}">
    <meta name="description" content="{{ $metaDescription }}">
    <meta property="og:locale" content="sr_RS"/>
    <link rel="canonical" href="{{ $metaUrl }}"/>

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ $metaUrl }}">
    <meta property="og:title" content="{{ $metaTitle }}">
    <meta property="og:description" content="{{ $metaDescription }}">
    <meta property="og:image" content="{{ $metaImage }}">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="{{ $metaUrl }}">
    <meta property="twitter:title" content="{{ $metaTitle }}">
    <meta property="twitter:description" content="{{ $metaDescription }}">
    <meta property="twitter:image" content="{{ $metaImage }}">

    {{ $additionalCss ?? '' }}

    <style>
        @media print {
            .card {
                -webkit-box-shadow: none;
                -moz-box-shadow: none;
                box-shadow: none !important;
            }

            .blog-single {
                margin-top: 1rem !important;
            }
        }

        .map-scroll:before {
            content: 'Use ctrl + scroll to zoom the map';
            position: absolute;
            top: 50%;
            left: 50%;
            z-index: 1000;
            transform: translate(-50%, -50%);
            font-size: 34px;
            color: white;
        }

        .map-scroll:after {
            position: absolute;
            left: 0;
            right: 0;
            bottom: 0;
            top: 0;
            content: '';
            background: #00000061;
            z-index: 999;
        }

        body > div.Uc2NEf > div:nth-child(3) > div:nth-child(2) > div.I3zNcc.yF4pU {
            display: none !important;
        }
    </style>

</head>

<body>
<div class="page-frame bg-pale-primary">
    <div class="content-wrapper">
        <header class="wrapper d-print-none">
            <nav class="navbar navbar-expand-xxl classic transparent position-absolute navbar-dark d-print-none">
                <div class="container-fluid flex-lg-row flex-nowrap align-items-center">
                    <div class="navbar-brand w-100">
                        <a href="/">
                            <img class="logo-dark" src="{{ asset('assets/img/brands/logo-header-small.png') }}"
                                 srcset="{{ asset('assets/img/brands/logo-header-small.png') }}" alt=""/>
                            <img class="logo-light" src="{{ asset('assets/img/brands/logo-header-small.png') }}"
                                 srcset="{{ asset('assets/img/brands/logo-header-small.png') }}" alt=""/>
                        </a>
                    </div>
                    <div class="navbar-collapse offcanvas offcanvas-nav offcanvas-start">
                        <div class="offcanvas-header d-xxl-none">
                            <h3 class="text-white fs-30 mb-0"><img class=""
                                                                   src="{{ asset('assets/img/brands/logo-header-small.png') }}"
                                                                   alt=""/>
                            </h3>
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"
                                    aria-label="Close"></button>
                        </div>
                        <div class="offcanvas-body ms-lg-auto d-flex flex-column h-100">
                            <ul class="navbar-nav" id="navbar">
                                @foreach($links as $link)

                                    <x-navbar.link is-root="1" :link="$link"></x-navbar.link>

                                @endforeach

                            </ul>

                            <!-- /.offcanvas-footer -->
                        </div>
                        <!-- /.offcanvas-body -->
                    </div>
                    <!-- /.navbar-collapse -->
                    <div class="navbar-other w-100 d-flex ms-auto">
                        <script src="{{asset('js/Datatable/jQuery-3.6.0/jquery-3.6.0.min.js')}}"></script>
                        <div id="topbar-search" class="topbar-widget">

                            <style type="text/css">
                                #goog-gt-tt {
                                    display: none !important;
                                }

                                .goog-te-banner-frame {
                                    display: none !important;
                                }

                                .goog-te-menu-value:hover {
                                    text-decoration: none !important;
                                }

                                .goog-text-highlight {
                                    background-color: transparent !important;
                                    box-shadow: none !important;
                                }

                                body {
                                    top: 0 !important;
                                }

                                #google_translate_element2 {
                                    display: none !important;
                                }
                            </style>
                            <div id="google_translate_element2">
                            </div>
                            <script type="text/javascript">
                                function googleTranslateElementInit2() {
                                    new google.translate.TranslateElement({
                                        pageLanguage: 'sr',
                                        autoDisplay: false
                                    }, 'google_translate_element2');
                                }
                            </script>
                            <script type="text/javascript"
                                    src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit2"></script>
                            <script type="text/javascript">
                                function GTranslateGetCurrentLang() {
                                    var keyValue = document['cookie'].match('(^|;) ?googtrans=([^;]*)(;|$)');
                                    return keyValue ? keyValue[2].split('/')[2] : null;
                                }

                                function GTranslateFireEvent(element, event) {
                                    try {
                                        if (document.createEventObject) {
                                            var evt = document.createEventObject();
                                            element.fireEvent('on' + event, evt)
                                        } else {
                                            var evt = document.createEvent('HTMLEvents');
                                            evt.initEvent(event, true, true);
                                            element.dispatchEvent(evt)
                                        }
                                    } catch (e) {
                                    }
                                }

                                function doGTranslate(lang_pair) {
                                    if (lang_pair.value) lang_pair = lang_pair.value;
                                    if (lang_pair == '') return;
                                    var lang = lang_pair.split('|')[1];
                                    if (GTranslateGetCurrentLang() == null && lang == lang_pair.split('|')[0]) return;
                                    var teCombo;
                                    var sel = document.getElementsByTagName('select');
                                    for (var i = 0; i < sel.length; i++) if (/goog-te-combo/.test(sel[i].className)) {
                                        teCombo = sel[i];
                                        break;
                                    }
                                    if (document.getElementById('google_translate_element2') == null || document.getElementById('google_translate_element2').innerHTML.length === 0 || teCombo.length == 0 || teCombo.innerHTML.length == 0) {
                                        setTimeout(function () {
                                            doGTranslate(lang_pair)
                                        }, 500)
                                    } else {
                                        teCombo.value = lang;
                                        GTranslateFireEvent(teCombo, 'change');
                                        GTranslateFireEvent(teCombo, 'change')
                                    }
                                }

                                if (GTranslateGetCurrentLang() != null) jQuery(document).ready(function () {

                                    var lang_html = jQuery('div.switcher div.option').find('img[alt="' + GTranslateGetCurrentLang() + '"]').parent().html();
                                    if (typeof lang_html != 'undefined') jQuery('div.switcher div.selected a').html(lang_html.replace('data-gt-lazy-', ''));
                                });


                            </script>
                        </div>


                        <ul class="navbar-nav flex-row align-items-center ms-auto notranslate">
                            <select class="form-select notranslate" id="jezici" aria-label="Default select example">
                                <option value="sr|ar">Arabic</option>
                                <option value="sr|zh-CN">Chinese (Simplified)</option>
                                <option value="sr|en">English</option>
                                <option value="sr|fr">French</option>
                                <option value="sr|de">German</option>
                                <option value="sr|el">Greek</option>
                                <option value="sr|it">Italian</option>
                                <option value="sr|pt">Portuguese</option>
                                <option value="sr|ru">Russian</option>
                                <option value="sr|sr">Serbian</option>
                                <option value="sr|es">Spanish</option>
                            </select>
                            <script>
                                document.querySelector('#jezici').addEventListener('change', function () {
                                    doGTranslate(this.value);
                                });
                                if (GTranslateGetCurrentLang() != null) jQuery(document).ready(function () {
                                    // alert('sr|' + GTranslateGetCurrentLang())
                                    // $('#jezici').val('sr|' + GTranslateGetCurrentLang());
                                    $("#jezici option[value='sr|"+ GTranslateGetCurrentLang() +"']").prop("selected", true)
                                });
                            </script>
                            <li class="nav-item d-xxl-none">
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
        <section class="video-wrapper bg-overlay bg-overlay-gradient px-0 mt-0 min-vh-50 d-print-none">
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
    <footer class="bg-dark text-inverse d-print-none">
        <div class="container pt-13 pt-md-13 pb-8 pb-md-10">
            <div class="row gy-6 gy-lg-0 pb-6">
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <a href="/ankete" class="btn btn-primary rounded mb-0 text-nowrap w-100"
                       style="height: 80px">Анкета</a>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <a href="{{asset('assets/Zahtjev-za-podacima.doc')}}"
                       class="btn btn-primary rounded mb-0 text-nowrap w-100"
                       style="height: 80px; background-color: #00a7bd; border-color:#00a7bd ">
                        <img src="{{ asset('assets/img/down-arrow.png') }}" class="me-2" alt=""> <span class="ml-4"> Захтјев
                        за подацима </span>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <a href="http://apk.vladars.net/index.php?institucija=25"
                       class="btn btn-white rounded mb-0 text-nowrap w-100 p-0" style="height: 80px">
                        <img src="{{ asset('assets/img/306x100.png') }}" class="h-100" alt="">
                    </a>
                    {{--                    <a href="http://apk.vladars.net/index.php?institucija=25" class="w-100"><img class="w-100"--}}
                    {{--                                                                                                 height="100"--}}
                    {{--                                                                                                 src="https://rhmzrs.com/wp-content/uploads/2018/09/306x100.jpg"--}}
                    {{--                                                                                                 class="rounded-pill image wp-image-814  attachment-full size-full"--}}
                    {{--                                                                                                 alt="" loading="lazy"--}}
                    {{--                                                                                                 style="max-width: 100%; height: auto;"></a>--}}
                </div>
            </div>
            <div class="row gy-6 gy-lg-0">
                <div class="col-md-4 col-lg-4">
                    <div class="widget">

                        <p><strong>Републички хидрометеоролошки завод</strong><br>Пут бањалучког одреда бб<br>78000 Бања
                            Лука<br>Република Српска<br>Босна и Херцеговина<br><strong>Поштански претинац: 147</strong>
                        </p>
                    </div>
                    <!-- /.widget -->
                </div>
                <!-- /column -->
                <div class="col-md-4 col-lg-4">
                    <p>
                        <strong>Централа:</strong><a href="tel:+387 51/ 433-522">+387 51/ 433-522</a><br>
                        <strong>Факс:</strong><a href="tel:+387 51/ 433-521">+387 51/ 433-521</a><br>
                        <strong>Директор:</strong><a href="tel:051 460-852">051 460-852</a><br>
                        <strong>Сеизмологија:</strong><a href="tel:051 463-467">051 463-467</a><br>
                        <strong>Метеорологија:</strong> <a href="tel:051 461-681">051 461-681</a>; <a
                            href="tel:051 346-490">051 346-490</a><br>
                        <strong>Хидрологија:</strong> <a href="tel:051 315-538">051 315-538</a><br>
                        <strong>Заштита ж. средине:</strong> <a href="tel:051 346-494">051 346-494</a><br>
                        <strong>Сабирни центар:</strong><a href="tel:051 307-943">051 307-943</a> (тел/фаx)
                    </p>
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
        <div class="row">
            <div class="col-12 d-flex justify-content-center align-items-center gap-2 flex-column flex-md-row">
                <img class="mb-4 h-12" src="{{ asset('assets/img/brands/logo-header.png') }}"
                     srcset="{{ asset('assets/img/brands/logo-header.png') }} 2x" alt=""/>
                <p class="mb-4 text-center"><b>© {{ now()->year }}</b> СВА ПРАВА ЗАДРЖАНА РЕПУБЛИЧКИ ХИДРОМЕТЕОРОЛОШКИ
                    ЗАВОД
                </p>
            </div>
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
{{ $additionalJs ?? '' }}
</body>

</html>
