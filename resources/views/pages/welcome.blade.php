@php
    $meta = [
        "title"                 => "Почетна - Републички хидрометеоролошки завод",
        "description"           => "Почетна - Републички хидрометеоролошки завод",
        "keywords"              => "rhmzrs",
        "image"                 => asset('assets/img/meta-og.png'),
        "url"                   => Request::url(),
    ];
@endphp
<x-main-layout :meta="$meta">
    <x-slot name="additionalJs">
        <style>
            .lds-ripple {
                display: inline-block;
                position: relative;
                width: 80px;
                height: 80px;
            }

            .btn.active, .btn:active {
                color: #fff;
                background-color: #747ed1;
                border-color: #747ed1;
                color: #fff;
            }

            .lds-ripple div {
                position: absolute;
                border: 4px solid #fff;
                opacity: 1;
                border-radius: 50%;
                animation: lds-ripple 1s cubic-bezier(0, 0.2, 0.8, 1) infinite;
            }

            .lds-ripple div:nth-child(2) {
                animation-delay: -0.5s;
            }

            @keyframes lds-ripple {
                0% {
                    top: 36px;
                    left: 36px;
                    width: 0;
                    height: 0;
                    opacity: 0;
                }
                4.9% {
                    top: 36px;
                    left: 36px;
                    width: 0;
                    height: 0;
                    opacity: 0;
                }
                5% {
                    top: 36px;
                    left: 36px;
                    width: 0;
                    height: 0;
                    opacity: 1;
                }
                100% {
                    top: 0px;
                    left: 0px;
                    width: 72px;
                    height: 72px;
                    opacity: 0;
                }
            }

            .loader {
                position: absolute;
                height: 100%;
                width: 98%;
                background: #00000066;
                z-index: 1001;
                display: grid;
                place-items: center;
            }

            #map {
                height: 800px;
                width: 100%;
            }

            .nav-pills > li > a {
                border-radius: 100px !important;
                /* background: #ccc; */
                border: 2px solid #3a7cd5 !important;
                margin: 8px;
                font-size: 18px;
                color: #3a7cd5 !important;
                font-weight: 700;
            }

            .nav-pills > li + li {
                margin-left: 2px;
            }

            .entry-content li {
                margin-bottom: 5px;
            }

            .nav-pills > li {
                float: left;
            }

            .nav > li {
                position: relative;
                display: block;
            }

            .nav-pills > li.active > a, .nav-pills > li.active > a:focus, .nav-pills > li.active > a:hover {
                color: #fff !important;
                border: none !important;
                border-radius: 100px !important;
                background-image: -moz-linear-gradient(-180deg, rgb(23, 176, 239) 0%, rgb(58, 123, 213) 100%) !important;
                background-image: -webkit-linear-gradient(-180deg, rgb(23, 176, 239) 0%, rgb(58, 123, 213) 100%) !important;
                background-image: -ms-linear-gradient(-180deg, rgb(23, 176, 239) 0%, rgb(58, 123, 213) 100%) !important;
                font-size: 18px;
                font-family: "Open Sans";
                color: rgb(255, 255, 255);
                font-weight: 700;
                padding: 12px 15px;
            }

            .nav-pills > li.active > a, .nav-pills > li.active > a:focus, .nav-pills > li.active > a:hover {
                color: #009ADE !important;
                background-color: #fff !important;
                border: 1px solid #009ADE !important;
            }

            .nav-pills > li.active > a, .nav-pills > li.active > a:focus, .nav-pills > li.active > a:hover {
                color: #fff;
                background-color: #428bca;
            }

            .nav-pills > li > a {
                border-radius: 100px !important;
                /* background: #ccc; */
                border: 2px solid #3a7cd5 !important;
                margin: 8px;
                font-size: 18px;
                color: #3a7cd5 !important;
                font-weight: 700;
            }

            .nav-pills > li > a {
                border-radius: 4px;
            }

            .nav > li > a {
                position: relative;
                display: block;
                padding: 10px 15px;
            }

            #dateButtons {
                display: flex;
                justify-content: center;
                margin-bottom: 5px;
            }

            .nav-pills > li.active > a, .nav-pills > li.active > a:focus, .nav-pills > li.active > a:hover {
                color: #009ADE !important;
                background-color: #fff !important;
                border: 1px solid #009ADE !important;
            }

            .nav-pills > li.active > a, .nav-pills > li.active > a:focus, .nav-pills > li.active > a:hover {
                color: #fff !important;
                border: none !important;
                border-radius: 100px !important;
                background-image: -moz-linear-gradient(-180deg, rgb(23, 176, 239) 0%, rgb(58, 123, 213) 100%) !important;
                background-image: -webkit-linear-gradient(-180deg, rgb(23, 176, 239) 0%, rgb(58, 123, 213) 100%) !important;
                background-image: -ms-linear-gradient(-180deg, rgb(23, 176, 239) 0%, rgb(58, 123, 213) 100%) !important;
                font-size: 18px;
                font-family: "Open Sans";
                color: rgb(255, 255, 255);
                font-weight: 700;
                padding: 12px 15px;
            }

            .btn:hover {
                background-image: -moz-linear-gradient(-180deg, rgb(23, 176, 239) 0%, rgb(58, 123, 213) 100%) !important;
                background-image: -webkit-linear-gradient(-180deg, rgb(23, 176, 239) 0%, rgb(58, 123, 213) 100%) !important;
                background-image: -ms-linear-gradient(-180deg, rgb(23, 176, 239) 0%, rgb(58, 123, 213) 100%) !important;
                color: white;
            }

            .weatherLabel-text {
                display: block;
                width: auto;
                height: 25px;
                padding: 1px;
                border-radius: 6px;
                font-size: 1em;
                font-weight: 400;
                line-height: 2.1;
                text-align: center;
                background-image: url(../images/icons/meteo-icons/podloga.png);
                background-repeat: no-repeat;
                background-size: contain;
                background-position: center;
                color: #fff;
                opacity: .8;
                transform: translate(-25px, 1px);
                width: 60px;
            }

            .meteoalarm {
                height: 151px !important;

            }

            img.leaflet-marker-icon, img.meteoDataLabel-image {
                width: 55px !important;
            }
            .meteoDataLabel-text {
                outline: #0c0c0c;
            }

            #map img {
                /*height: 30px!important;*/
            }
            #map > div.leaflet-control-container > div.leaflet-bottom.leaflet-right > div {
                display: none !important;
            }
        </style>
        <link rel="stylesheet" href="{{asset('leaflet/leaflet.css')}}"/>
        <script src="{{asset('js/Datatable/jQuery-3.6.0/jquery-3.6.0.min.js')}}"></script>

        <script src='https://unpkg.com/leaflet@1.7.1/dist/leaflet.js?ver=5.8.6' id='hidrometeo-map-leaflet-js'></script>
        <script src='{{asset('js/leaflet-markerwithlabel.js')}}' id='-main-js'></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.27.2/axios.min.js"
                integrity="sha512-odNmoc1XJy5x1TMVMdC7EMs3IVdItLPlCeL5vSUPN2llYKMJ2eByTTAIiiuqLg+GdNr9hF6z81p27DArRFKT7A=="
                crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="{{asset('js/leaflet.js')}}"></script>
    </x-slot>
    <section class="wrapper bg-light angled">
        <div class="container py-14 py-md-16">
            <div class="row">
                <div class="col-12">
                    {{--                    <ul class="nav nav-tabs card-header-tabs" data-bs-tabs="tabs">--}}
                    {{--                        <li class="nav-item">--}}
                    {{--                            <a class="nav-link active" aria-current="true" data-bs-toggle="tab" href="#prognoza"--}}
                    {{--                               onClick="changeData(1)"> <img--}}
                    {{--                                    src="{{asset('assets/img/icons/prognoza.svg')}}" class="w-10 d-inline-block" alt="">--}}
                    {{--                                <p class="mb-0 d-inline-block">Прогноза</p></a>--}}
                    {{--                        </li>--}}
                    {{--                        <li class="nav-item">--}}
                    {{--                            <a class="nav-link" data-bs-toggle="tab" href="#meteorologija" onClick="changeData(2)"> <img--}}
                    {{--                                    src="{{asset('assets/img/icons/meteorologija.svg')}}" class="w-10 d-inline-block"--}}
                    {{--                                    alt="">--}}
                    {{--                                <p class="mb-0 d-inline-block">Метеорологија</p></a>--}}
                    {{--                        </li>--}}
                    {{--                        <li class="nav-item">--}}
                    {{--                            <a class="nav-link" data-bs-toggle="tab" href="#seizmologija" onClick="changeData(3)"> <img--}}
                    {{--                                    src="{{asset('assets/img/icons/seizmologija.svg')}}" class="w-10 d-inline-block"--}}
                    {{--                                    alt="">--}}
                    {{--                                <p class="mb-0 d-inline-block">Сеизмологија</p></a>--}}
                    {{--                        </li>--}}
                    {{--                        <li class="nav-item">--}}
                    {{--                            <a class="nav-link" data-bs-toggle="tab" href="#hidrologija" onClick="changeData(4)"> <img--}}
                    {{--                                    src="{{asset('assets/img/icons/hidrologija.svg')}}" class="w-10 d-inline-block"--}}
                    {{--                                    alt="">--}}
                    {{--                                <p class="mb-0 d-inline-block">Хидрологија</p></a>--}}
                    {{--                        </li>--}}

                    {{--                        <li class="nav-item">--}}
                    {{--                            <a class="nav-link" data-bs-toggle="tab" href="#ekologija" onClick="changeData(5)"> <img--}}
                    {{--                                    src="{{asset('assets/img/icons/ekologija.svg')}}" class="w-10 d-inline-block"--}}
                    {{--                                    alt="">--}}
                    {{--                                <p class="mb-0 d-inline-block">Животна средина</p></a>--}}
                    {{--                        </li>--}}
                    {{--                    </ul>--}}
                    <div class="row control-hidrometeo-map">
                        <div class="text-center button__container">
                            <button type="button" class="btn btn-default active" id="weatherForecast">
                                Прогноза
                                <img src="{{asset('assets/img/icons/prognoza.svg')}}" style="height: 40px !important;"
                                     class="button__container--image">
                            </button>
                            <button type="button" class="btn btn-default" id="meteorology">
                                Метеорологија
                                <img src="{{asset('assets/img/icons/meteorologija.svg')}}"
                                     style="height: 40px !important;" class="button__container--image">
                            </button>
                            <button type="button" class="btn btn-default" id="seismology">
                                Сеизмологија
                                <img src="{{asset('assets/img/icons/seizmologija.svg')}}"
                                     style="height: 32px !important;margin-top: 4px;" class="button__container--image">
                            </button>
                            <button type="button" class="btn btn-default" id="hydrology">
                                Хидрологија
                                <img src="{{asset('assets/img/icons/hidrologija.svg')}}"
                                     style="height: 40px !important;" class="button__container--image">
                            </button>
                            <button type="button" class="btn btn-default" id="environment">
                                Животна средина
                                <img src="{{asset('assets/img/icons/ekologija.svg')}}"
                                     style="height: 32px !important;margin-top: 4px;" class="button__container--image">
                            </button>
                        </div>
                    </div>
                </div>
                <ul class="nav nav-pills" id="dateButtons"
                    style="margin-bottom: 0px !important;padding: 15px 0px 10px 0px;">

                </ul>

                <div class="row" style="padding-right: 0">
                    <div class="text-center map__container" style="padding-right: 0">
                        <div id="map"
                             class="map leaflet-container leaflet-touch leaflet-fade-anim leaflet-grab leaflet-touch-drag leaflet-touch-zoom"
                             tabindex="0" style="position: relative; padding-right: 0">

                        </div>
                        <script type="text/javascript">
                            function isIEBrowser() {

                                var map = document.getElementById('map');
                                var isIE = /Trident\/|MSIE/.test(window.navigator.userAgent)

                                if (isIE) {
                                    map.innerHTML = '<div class="ie-browser">Гоогле Мапа није у могућности да се прикаже. Молимо вас унаприједите свој интернет претраживач.</div>';
                                }
                            }

                            isIEBrowser();
                        </script>
                    </div>
                </div>
                {{--                <div class="col-12 " style="position:relative;">--}}
                {{--                    <div class="loader" id="loader">--}}
                {{--                        <div class="lds-ripple">--}}
                {{--                            <div></div>--}}
                {{--                            <div></div>--}}
                {{--                        </div>--}}
                {{--                    </div>--}}
                {{--                    <div id="map" class="map"></div>--}}
                {{--                    <div aria-labelledby="myModalLabel" class="modal left fade" id="emptymodal" role="dialog"--}}
                {{--                         tabindex="-1">--}}
                {{--                        <div class="modal-dialog" role="document">--}}
                {{--                            <div class="modal-content p-5"></div>--}}
                {{--                            <!-- modal-content -->--}}
                {{--                        </div>--}}
                {{--                        <!-- modal-dialog -->--}}
                {{--                    </div>--}}
                {{--                    <div class="mapinfo"></div>--}}
                {{--                    --}}{{--                    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d11714.576362230699!2d18.96212075!3d42.7747318!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2s!4v1662984325285!5m2!1sen!2s" width="100%" height="800" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>--}}
                {{--                </div>--}}
                <style>
                    .bg-green {
                        background-color: #00a65a;
                    }

                    .mapinfo__container {
                        border-bottom: 1px solid black;
                        padding-bottom: 10px;
                    }

                    .font-weight-bold {
                        font-weight: bold;
                    }

                    .bg-class-1 {
                        color: #0c0c0c;
                        background-color: #00ff00 !important;
                    }

                    .bg-class-2 {
                        background-color: #ffff00 !important;
                        color: #0c0c0c;
                    }

                    .bg-class-3 {
                        background-color: #ff9900 !important;
                    }

                    .bg-class-4 {
                        background-color: #ff0000 !important;
                    }

                    .bg-class-5 {
                        background-color: #990000 !important;
                        color: white;
                    }

                    .bg-class-undefined {
                        background-color: #ffffff !important;
                        color: #000000 !important;
                    }

                    .bg-class-undefined > h1 {
                        color: #000000 !important;
                    }

                    .bg-class-undefined > h4 {
                        color: #000000 !important;
                    }

                    .indeks-icon {
                        width: 20px;
                        height: 20px;
                        border-radius: 50%;
                        display: flex;
                        justify-content: center;
                        align-items: center;
                        font-size: 1.2rem;
                        font-weight: bold;
                    }
                </style>
                {{--                <div aria-labelledby="myModalLabel" class="modal left fade" id="emptymodal" role="dialog" tabindex="-1">--}}
                {{--                    <div class="modal-dialog" role="document">--}}
                {{--                        <div class="modal-title"></div>--}}
                {{--                        <div class="modal-content p-5"></div>--}}
                {{--                        <!-- modal-content -->--}}
                {{--                    </div>--}}
                {{--                    <!-- modal-dialog -->--}}
                {{--                </div>--}}

                <div aria-labelledby="myModalLabel" class="modal left mapinfo fade" tabindex="-1" id="emptymodal"
                     role="dialog" tabindex="-1">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header p-2">
                                <h5 class="modal-title modal-title"></h5>
                                <button type="button" class="close" data-dismiss="modal"
                                        onclick="$('#emptymodal').modal('hide');" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body p-5">
                            </div>
                            {{--                            <div class="modal-footer">--}}
                            {{--                                <button type="button" class="btn btn-primary">Save changes</button>--}}
                            {{--                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>--}}
                            {{--                            </div>--}}
                        </div>
                    </div>
                </div>

                @foreach($homepageCards as $card)
                    <div class="col-lg-3 col-md-6 col-sm-12 pt-10">
                        <div class="kad_img_upload_widget p-5 text-white {{ $card->color_class }}"
                             style="height: 151px;">
                            <a href="{{ $card->link }}"
                               class="text-white"
                               target="_blank">
                                <h6 class="text-white m-0">{{ $card->title }}</h6>
                                <p class="m-0">{{ $card->description }}</p>
                            </a></div>
                        {{--                    <x-section-separator text="Анкета" simple></x-section-separator>--}}
                        {{--                    <div class="px-3">--}}
                        {{--                        @foreach($questionnaires as $q)--}}
                        {{--                            <h2 class="post-title h4 bg-white mb-3"><a class="link-dark"--}}
                        {{--                                                                       href="{{ route('questionnaire.view', $q->id) }}">{{ $q['title'] }}</a>--}}
                        {{--                            </h2>--}}
                        {{--                        @endforeach--}}
                        {{--                    </div>--}}
                    </div>
                @endforeach
                <div class="col-lg-3 col-md-6 col-sm-12 pt-10">
                    <div class="kad_img_upload_widget">
                        <a href="https://www.meteoalarm.org/en/"
                           target="_blank"> <img
                                class="w-100 meteoalarm"
                                src="{{ asset('images/meteoalarm.png') }}">
                        </a></div>
                    {{--                    <x-section-separator text="Анкета" simple></x-section-separator>--}}
                    {{--                    <div class="px-3">--}}
                    {{--                        @foreach($questionnaires as $q)--}}
                    {{--                            <h2 class="post-title h4 bg-white mb-3"><a class="link-dark"--}}
                    {{--                                                                       href="{{ route('questionnaire.view', $q->id) }}">{{ $q['title'] }}</a>--}}
                    {{--                            </h2>--}}
                    {{--                        @endforeach--}}
                    {{--                    </div>--}}
                </div>


                <div class="col-lg-12 col-md-12 col-sm-12 mt-4">
                    <div class="row">
                        <div class="col-lg-12 col-xl-12 col-xxl-12">
                            <x-section-separator text="Актуелности" simple></x-section-separator>

                            {{--                            <h3 class="display-4 mb-9">Check out some of our awesome projects with creative ideas and great design.</h3>--}}
                        </div>
                        <!-- /column -->
                    </div>
                    <!-- /.row -->
                    <div class="container mb-10">
                        <div class="row">
                            @foreach($posts as $post)
                                <div class="col-lg-4 col-md-12 col-sm-12">
                                    <x-article :article="$post"></x-article>
                                    <!-- /article -->
                                </div>
                            @endforeach
                            <!--/.swiper-slide -->

                            <!--/.swiper-slide -->

                            <!--/.swiper-slide -->
                            <!-- /.swiper-wrapper -->
                        </div>
                        <!-- /.swiper -->
                    </div>
                    <!-- /.swiper-container -->
                </div>


                <div class="col-12" style="overflow: scroll">
                    @if(count($media))
                        <br>
                        <x-section-separator text="Последње датотеке" simple></x-section-separator>
                        <table class="table align-middle mb-0 bg-white table-bordered">
                            <thead class="bg-primary-light">
                            <tr>
                                <th>Датотека</th>
                                {{--                            <th>Објашњење</th>--}}
                                <th>Објашњење</th>
                                <th>Величина датотеке</th>
                                <th>Преузимање</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php
                                $attachments = $media;
                            @endphp
                            @foreach($attachments as $key => $media)
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <a href="/download/{{$media->id}}" class="d-flex gap-1 align-items-center">
                                                <div class="file-icon file-icon-md"
                                                     data-type="{{ last(explode('.',$media->file_name)) }}"></div>
                                                <p class="fw-bold"
                                                   style="padding-bottom: 0!important; margin: 0!important;">{{ explode('_',$media->name)[1] }}</p>
                                            </a>
                                        </div>
                                    </td>
                                    <td>{{ $media->custom_properties['description'] }}</td>
                                    <td>{{ $media->human_readable_size }}</td>
                                    <td>
                                        {{ $media->download_count }}
                                    </td>
                                </tr>

                            @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>

        </div>
        <!-- /.container -->
    </section>

    <x-slot name="additionalCss">
        <style>
            figure img {
                width: auto !important;
            }

            /*! fileicon.css v0.1.1 | MIT License | github.com/picturepan2/fileicon.css */
            /* fileicon.basic */
            .file-icon {
                font-family: Arial, Tahoma, sans-serif;
                font-weight: 300;
                display: inline-block;
                width: 24px;
                height: 32px;
                background: #018fef;
                position: relative;
                border-radius: 2px;
                text-align: left;
                -webkit-font-smoothing: antialiased;
            }

            .file-icon::before {
                display: block;
                content: "";
                position: absolute;
                top: 0;
                right: 0;
                width: 0;
                height: 0;
                border-bottom-left-radius: 2px;
                border-width: 5px;
                border-style: solid;
                border-color: #fff #fff rgba(255, 255, 255, .35) rgba(255, 255, 255, .35);
            }

            .file-icon::after {
                display: block;
                content: attr(data-type);
                position: absolute;
                bottom: 0;
                left: 0;
                font-size: 10px;
                color: #fff;
                text-transform: lowercase;
                width: 100%;
                padding: 2px;
                white-space: nowrap;
                overflow: hidden;
            }

            /* fileicons */
            .file-icon-xs {
                width: 12px;
                height: 16px;
                border-radius: 2px;
            }

            .file-icon-xs::before {
                border-bottom-left-radius: 1px;
                border-width: 3px;
            }

            .file-icon-xs::after {
                content: "";
                border-bottom: 2px solid rgba(255, 255, 255, .45);
                width: auto;
                left: 2px;
                right: 2px;
                bottom: 3px;
            }

            .file-icon-sm {
                width: 18px;
                height: 24px;
                border-radius: 2px;
            }

            .file-icon-sm::before {
                border-bottom-left-radius: 2px;
                border-width: 4px;
            }

            .file-icon-sm::after {
                font-size: 7px;
                padding: 2px;
            }

            .file-icon-lg {
                width: 48px;
                height: 64px;
                border-radius: 3px;
            }

            .file-icon-lg::before {
                border-bottom-left-radius: 2px;
                border-width: 8px;
            }

            .file-icon-lg::after {
                font-size: 16px;
                padding: 4px 6px;
            }

            .file-icon-xl {
                width: 96px;
                height: 128px;
                border-radius: 4px;
            }

            .file-icon-xl::before {
                border-bottom-left-radius: 4px;
                border-width: 16px;
            }

            .file-icon-xl::after {
                font-size: 24px;
                padding: 4px 10px;
            }

            /* fileicon.types */
            .file-icon[data-type=zip],
            .file-icon[data-type=rar] {
                background: #acacac;
            }

            .file-icon[data-type^=doc] {
                background: #307cf1;
            }

            .file-icon[data-type^=xls] {
                background: #0f9d58;
            }

            .file-icon[data-type^=ppt] {
                background: #d24726;
            }

            .file-icon[data-type=pdf] {
                background: #e13d34;
            }

            .file-icon[data-type=txt] {
                background: #5eb533;
            }

            .file-icon[data-type=mp3],
            .file-icon[data-type=wma],
            .file-icon[data-type=m4a],
            .file-icon[data-type=flac] {
                background: #8e44ad;
            }

            .file-icon[data-type=mp4],
            .file-icon[data-type=wmv],
            .file-icon[data-type=mov],
            .file-icon[data-type=avi],
            .file-icon[data-type=mkv] {
                background: #7a3ce7;
            }

            .file-icon[data-type=bmp],
            .file-icon[data-type=jpg],
            .file-icon[data-type=jpeg],
            .file-icon[data-type=gif],
            .file-icon[data-type=png] {
                background: #f4b400;
            }

            .bg-primary-light {
                background-color: #e9eaf8 !important;
            }

            table {
                width: 100%;
                /*border: 2px solid #ddd;*/
                padding: 5px;
            }

            table tr:nth-child(even) {
                background-color: #f2f2f2;
            }

            table td {
                padding: 5px;
                text-align: left;
            }

            /*Add small screens media query*/


            #example_wrapper {
                max-width: 100%;
                width: 100%;
                overflow: scroll;
            }
        </style>
    </x-slot>
</x-main-layout>
