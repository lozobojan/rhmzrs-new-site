@php
    $meta = [
        "title"                 => "РХМЗРС - ". $page->title,
        "description"           => "РХМЗРС - ". $page->title,
        "keywords"              => "rhmzrs РХМЗРС - Документи и прописи",
        "image"                 => asset('assets/img/meta-og.png'),
        "url"                   => Request::url(),
    ];
@endphp
<x-main-layout :meta="$meta">
    <x-slot name="additionalCss">
        <style>
            #docs_paginate {
                width: min-content;
                float: right;
            }
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


    <script src="{{asset('js/Datatable/jQuery-3.6.0/jquery-3.6.0.min.js')}}"></script>
    <link rel="stylesheet" type="text/css" href="{{ asset('js/Datatable/datatables.min.css') }}"/>

    <script type="text/javascript" src="{{ asset('js/Datatable/datatables.min.js') }}"></script>
    <script>
        $(document).ready(function () {
            $('#docs').DataTable({
                "language": {
                    "url": "../js/Datatable/Serbian.json"
                }
            });
        });
    </script>
    <section class="wrapper bg-light angled">
        <div class="container py-14 py-md-16">
            <div class="row">


                <div class="col-lg-12 col-xl-12 col-xxl-12">

                    {{-- TODO: razmisliti o ovom prikazu bez escape-ovanja, nije bas bezbjedno --}}
                    <h1 class="fs-32 text-uppercase text-line text-primary mb-3">{{ $page->title }}</h1>
                    {!! $page->html_content !!}



                    @if(count($page->attachments))
                        <br>
                        <x-section-separator text="Прилози" simple></x-section-separator>
                        <table class="table align-middle mb-0 bg-white table-bordered" id="docs">
                            <thead class="bg-primary-light">
                            <tr>
                                <th>Датотека</th>
                                <th>Објашњење</th>
                                <th>Величина датотеке</th>
                                <th>Преузимање</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php
                                $attachments = $page->attachments->reverse();
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
                <!-- /column -->

                @if($slug == 'mreza-meteoroloskih-stanica')
                    <x-meteo-stations></x-meteo-stations>
                @endif
                @if($slug == 'seizmologija-akcelerometarska-mreza')
                    <x-accelero-stations></x-accelero-stations>
                @endif
                @if($slug == 'seizmologija-stanice')
                    <x-seismic-stations></x-seismic-stations>
                @endif
                @if($slug == 'seizmologija-zemljotresi')
                    <x-earthquakes></x-earthquakes>
                @endif
                @if($slug == 'kvalitet-vazduha-trenutni-podaci' || $slug == 'kvalitet-vazduha-mapa-mjernih-stanica')
                    <x-air-quality></x-air-quality>
                @endif
                @if($slug == 'registar-postrojenja-i-zagadivaca-mapa-zagadjivaca')
                    <x-eco-pollutants></x-eco-pollutants>
                @endif
                @if($slug == 'hidrologija-mapa-stanica')
                    <x-hydro-stations></x-hydro-stations>
                @endif
                @if($slug == 'hidrologija-podaci')
                    <x-hydro-stations></x-hydro-stations>
                @endif
                @if($slug == 'rijecni-slivovi')
                    <x-river-basins></x-river-basins>
                @endif
                @if($slug == 'kote-odbrane-od-poplava')
                    <x-kote></x-kote>
                @endif
                @if($slug == 'ekologija-javno-dostupni-podaci')
                    <x-public-data-ecology></x-public-data-ecology>
                @endif
                @if($slug == 'meteorologija-aktuelni-podaci')
                    <x-meteo-current-data></x-meteo-current-data>
                @endif
                @if($slug == 'meteorologija-trenutne-temperature')
                    <x-current-temperatures></x-current-temperatures>
                @endif
                @if($slug == 'meteorologija-pritisak')
                    <x-preasures></x-preasures>
                @endif
                @if($slug == 'meteorologija-vjetar')
                    <x-wind></x-wind>
                @endif
                @if($slug == 'meteorologija-bioprognoza')
                    <x-bio-prognoses></x-bio-prognoses>
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
