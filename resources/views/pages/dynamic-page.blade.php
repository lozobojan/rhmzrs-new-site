<x-main-layout>
    <x-slot name="additionalCss">
        <style>
            figure img {
                width: auto!important;
            }
        </style>
    </x-slot>
    <section class="wrapper bg-light angled">
        <div class="container py-14 py-md-16">
            <div class="row">


                <div class="col-lg-12 col-xl-12 col-xxl-12">

                    {{-- TODO: razmisliti o ovom prikazu bez escape-ovanja, nije bas bezbjedno --}}
                    <h1 class="fs-32 text-uppercase text-line text-primary mb-3">{{ $page->title }}</h1>
                    {!! $page->html_content !!}

                </div>
                <!-- /column -->

                @if($slug = 'mreza-meteoroloskih-stanica')
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
                        <script src="{{asset('js/meteo-stations-leaflet.js')}}"></script>
                    </x-slot>

                    <x-meteo-stations></x-meteo-stations>
                @endif

                @if($page->pagePosts)
                    @foreach($page->pagePosts as $post)
                        <x-article :simple="true" :subtext="true" :article="$post"></x-article>
{{--                        <p>{{ $post->title }}</p>--}}
                    @endforeach
                @endif

            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </section>
</x-main-layout>
