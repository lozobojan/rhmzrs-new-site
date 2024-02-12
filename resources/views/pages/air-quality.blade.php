@php
    $meta = [
        "title"                 => "РХМЗРС - Контрола квалитета ваздуха",
        "description"           => "Контрола квалитета ваздуха у Републици Србији. Подаци о квалитету важдуха, мапа мјерних станица, извјештаји.",
        "keywords"              => "rhmzrs контрола квалитета ваздуха подаци мапа извјештаји",
        "image"                 => asset('assets/img/meta-og.png'),
        "url"                   => Request::url(),
    ];
@endphp
<x-main-layout :meta="$meta">

    <section class="wrapper bg-light angled">
        <div class="container py-5 py-md-5">
            <div class="row">


                <div class="col-lg-12 col-xl-12 col-xxl-12x">
                    <h1 class="fs-32 text-uppercase text-line text-primary mb-3">
                        Контрола квалитета ваздуха
                    </h1>



                    <ul>

                        <li>
                            <a class="post-title h4 text-primary underline" href="#mapa">
                                Подаци о квалитету важдуха
                            </a>
                        </li>
                        <li>
                            <a class="post-title h4 text-primary underline" href="#izvjestaji">
                                Извјештаји
                            </a>
                        </li>
                    </ul>

                </div>
                <!-- /column -->

            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </section>



<section id="mapa" class="wrapper bg-light angled">
        <div class="container py-14 py-md-16">
            <div class="row">


                <div class="col-lg-12 col-xl-12 col-xxl-12">

                    {{-- TODO: razmisliti o ovom prikazu bez escape-ovanja, nije bas bezbjedno --}}
                    <h1 class="fs-32 text-uppercase text-line text-primary mb-3">Мапа мјерних станица</h1>

                    <x-air-quality></x-air-quality>
                </div>
                <!-- /column -->

            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </section>



    <x-slot name="additionalCss">
        <style>
            figure img {
                width: auto!important;
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

    <section id="izvjestaji" class="wrapper bg-light angled">
        <div class="container py-14 py-md-16">
            <div class="row">
                <div class="col-lg-12 col-xl-12 col-xxl-12">
                    <h1 class="fs-32 text-uppercase text-line text-primary mb-3">{{ $page->title }}</h1>
                    <ul class="nav nav-tabs" id="reportTabs" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="monthly-tab" data-bs-toggle="tab" data-bs-target="#monthly" type="button" role="tab" aria-controls="monthly" aria-selected="true">Месечни</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="daily-tab" data-bs-toggle="tab" data-bs-target="#daily" type="button" role="tab" aria-controls="daily" aria-selected="false">Дневни</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="annual-tab" data-bs-toggle="tab" data-bs-target="#annual" type="button" role="tab" aria-controls="annual" aria-selected="false">Годишњи</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="other-tab" data-bs-toggle="tab" data-bs-target="#other" type="button" role="tab" aria-controls="other" aria-selected="false">Остало</button>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="monthly" role="tabpanel" aria-labelledby="monthly-tab">
                            <!-- Tabela za Mesečne izveštaje -->
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>Датотека</th>
{{--                                    <th>Опис</th>--}}
                                    <th>Величина</th>
                                    <th>Преузимања</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($groupedAttachments['M'] ?? [] as $media)
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
{{--                                        <td>{{ $media->custom_properties['description'] }}</td>--}}
                                        <td>{{ $media->human_readable_size }}</td>
                                        <td>{{ $media->download_count }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane fade" id="daily" role="tabpanel" aria-labelledby="daily-tab">
                            <!-- Tabela za Dnevne izveštaje -->
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>Датотека</th>
{{--                                    <th>Опис</th>--}}
                                    <th>Величина</th>
                                    <th>Преузимања</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($groupedAttachments['D'] ?? [] as $media)
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
{{--                                        <td>{{ $media->custom_properties['description'] }}</td>--}}
                                        <td>{{ $media->human_readable_size }}</td>
                                        <td>{{ $media->download_count }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane fade" id="annual" role="tabpanel" aria-labelledby="annual-tab">
                            <!-- Tabela za Godišnje izveštaje -->
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>Датотека</th>
{{--                                    <th>Опис</th>--}}
                                    <th>Величина</th>
                                    <th>Преузимања</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($groupedAttachments['G'] ?? [] as $media)
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
{{--                                        <td>{{ $media->custom_properties['description'] }}</td>--}}
                                        <td>{{ $media->human_readable_size }}</td>
                                        <td>{{ $media->download_count }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane fade" id="other" role="tabpanel" aria-labelledby="annual-tab">
                            <!-- Tabela za Godišnje izveštaje -->
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>Датотека</th>
                                    {{--                                    <th>Опис</th>--}}
                                    <th>Величина</th>
                                    <th>Преузимања</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($groupedAttachments['Other'] ?? [] as $media)
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
                                        {{--                                        <td>{{ $media->custom_properties['description'] }}</td>--}}
                                        <td>{{ $media->human_readable_size }}</td>
                                        <td>{{ $media->download_count }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>




</x-main-layout>
