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
                width: 100%;
                background: #00000066;
                z-index: 1001;
                display: grid;
                place-items: center;
            }

            #map {
                height: 800px;
                width: 100%;
            }
            #map > div.leaflet-control-container > div.leaflet-bottom.leaflet-right > div{
                display: none!important;
            }
        </style>
        <link rel="stylesheet" href="{{asset('leaflet/leaflet.css')}}"/>
        <script src="{{asset('leaflet/leaflet.js')}}"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.27.2/axios.min.js" integrity="sha512-odNmoc1XJy5x1TMVMdC7EMs3IVdItLPlCeL5vSUPN2llYKMJ2eByTTAIiiuqLg+GdNr9hF6z81p27DArRFKT7A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="{{asset('js/leaflet.js')}}"></script>
    </x-slot>
    <section class="wrapper bg-light angled">
        <div class="container py-14 py-md-16">
            <div class="row">
                <div class="col-12">
                    <ul class="nav nav-tabs card-header-tabs" data-bs-tabs="tabs">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="true" data-bs-toggle="tab" href="#prognoza" onClick="changeData(1)"> <img
                                    src="{{asset('assets/img/icons/prognoza.svg')}}" class="w-10 d-inline-block" alt=""> <p class="mb-0 d-inline-block">Прогноза</p></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#meteorologija" onClick="changeData(2)"> <img
                                    src="{{asset('assets/img/icons/meteorologija.svg')}}" class="w-10 d-inline-block" alt=""> <p class="mb-0 d-inline-block">Метеорологија</p></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#seizmologija" onClick="changeData(3)"> <img
                                    src="{{asset('assets/img/icons/seizmologija.svg')}}" class="w-10 d-inline-block" alt=""> <p class="mb-0 d-inline-block">Сеизмологија</p></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#hidrologija" onClick="changeData(4)"> <img
                                    src="{{asset('assets/img/icons/hidrologija.svg')}}" class="w-10 d-inline-block" alt=""> <p class="mb-0 d-inline-block">Хидрологија</p></a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#ekologija" onClick="changeData(5)"> <img
                                    src="{{asset('assets/img/icons/ekologija.svg')}}" class="w-10 d-inline-block" alt=""> <p class="mb-0 d-inline-block">Животна средина</p></a>
                        </li>
                    </ul>
                </div>
                <div class="col-12 " style="position:relative;">
                    <div class="loader" id="loader">
                        <div class="lds-ripple"><div></div><div></div></div>
                    </div>
                    <div id="map" class="map"></div>
                    <div class="mapinfo"></div>
                    {{--                    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d11714.576362230699!2d18.96212075!3d42.7747318!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2s!4v1662984325285!5m2!1sen!2s" width="100%" height="800" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>--}}
                </div>
                <div class="col-lg-9 col-md-6 col-sm-12">
                    <div class="row">
                        <div class="col-lg-12 col-xl-12 col-xxl-12">
                            <x-section-separator text="Актуелности" simple></x-section-separator>

                            {{--                            <h3 class="display-4 mb-9">Check out some of our awesome projects with creative ideas and great design.</h3>--}}
                        </div>
                        <!-- /column -->
                    </div>
                    <!-- /.row -->
                    <div class="swiper-container blog grid-view mb-10" data-margin="30" data-dots="true"
                         data-items-xl="3" data-items-md="2" data-items-xs="1">
                        <div class="swiper">
                            <div class="swiper-wrapper">
                                @for($i = 0; $i < 6; $i++)
                                    <div class="swiper-slide">
                                        <x-article :article="['title' => 'Test article title']"></x-article>
                                        <!-- /article -->
                                    </div>
                                @endfor
                                <!--/.swiper-slide -->

                                <!--/.swiper-slide -->

                                <!--/.swiper-slide -->
                            </div>
                            <!-- /.swiper-wrapper -->
                        </div>
                        <!-- /.swiper -->
                    </div>
                    <!-- /.swiper-container -->
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 pt-10">
                    <div class="kad_img_upload_widget">
                        <a href="https://www.meteoalarm.eu/index2.php?lang=cp_RS&amp;day=0&amp;AT=0&amp;country=BA"
                           target="_blank"> <img
                                class="w-100"
                                src="https://rhmzrs.com/wp-content/uploads/2019/06/meteoalarm-logo.png">
                        </a></div>
                    <x-section-separator text="Анкета" simple></x-section-separator>

                </div>
            </div>

        </div>
        <!-- /.container -->
    </section>
</x-main-layout>
