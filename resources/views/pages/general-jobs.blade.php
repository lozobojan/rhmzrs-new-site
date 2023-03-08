@php
    $meta = [
        "title"                 => "РХМЗРС - Општи послови",
        "description"           => "Републички хидрометеоролошки завод Републике Србије Општи послови. Јавни конкурси, јавне набавке и документи.",
        "keywords"              => "rhmzrs контакт рхмж рхм општи послови јавни конкурси јавне набавке документи",
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
                        Општи послови
                    </h1>



                    <ul>
                        <li>
                            <a class="post-title h4 text-primary underline" href="#javni-konkursi">Јавни конкурси</a>
                        </li>
                        <li>
                            <a class="post-title h4 text-primary underline" href="#javne-nabavke">Јавне набавке</a>
                        </li>
                        <li>
                            <a class="post-title h4 text-primary underline" href="#dokumenti">Документи и прописи</a>
                        </li>
                    </ul>

                </div>
                <!-- /column -->

            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </section>

    <section id="javni-konkursi" class="wrapper bg-light angled">
        <div class="container py-14 py-md-16">
            <div class="row">


                <div class="col-lg-12 col-xl-12 col-xxl-12x">

                    {{-- TODO: razmisliti o ovom prikazu bez escape-ovanja, nije bas bezbjedno --}}
                    <h1 class="fs-32 text-uppercase text-line text-primary mb-3">Јавни конкурси</h1>

                    <section id="snippet-2" class="bg-light">
                        <div class=" pb-13 pb-md-14">

                            <!-- /.row -->
                            <div class="row">
                                @foreach($publicCompetitions as $item)
                                    {{--                                    <div class="col-xl-10 mx-auto">--}}

                                    {{--                                        <x-list-item :item="$item" type="javni-konkursi"></x-list-item>--}}
                                    {{--                                        <!-- /column -->--}}
                                    {{--                                    </div>--}}
                                    <div class="col-xl-12 mx-auto mb-6">

                                        <article class="border-2 p-4 rounded-3 shadow" style="position: relative;">
                                            <div class="post-header">
                                                <h2 class="post-title h3 mb-3"><a class="link-dark"
                                                                                  href="/javni-konkursi/{{$item->id}}">{{ $item->title }}</a>
                                                </h2>
                                            </div>
                                            <div class="post-content">
                                                <p>{{ strip_tags($item->description) }}</p>
                                            </div>
                                            <div class="post-footer">
                                                <ul class="post-meta">
                                                    <li class="post-date"><i
                                                            class="uil uil-calendar-alt"></i><span>{{ \Illuminate\Support\Carbon::parse($item->date)->format('d/m/Y') }}</span>
                                                    </li>
                                                    {{--            <li class="post-comments"><a href="#"><i class="uil uil-file-alt fs-15"></i>Coding</a></li>--}}
                                                </ul>
                                            </div>
                                            <div class="read-more d-none d-md-block"
                                                 style="position: absolute; top: 50%; right: 0; transform: translate(-10%, -50%)">
                                                <a href="/javni-konkursi/{{$item->id}}"
                                                   class="btn btn- btn-outline-primary rounded-pill">Прочитај више ></a>
                                            </div>
                                        </article>

                                    </div>
                                @endforeach
                                <!-- /.row -->
                            </div>
                            <!-- /.container -->
                            <!-- /.container -->
                    </section>

                </div>
                <!-- /column -->

            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </section>

    <x-slot name="additionalCss">
        <style>
            @charset "utf-8";
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
        </style>
    </x-slot>

    <section id="javne-nabavke" class="wrapper bg-light angled">
        <div class="container py-14 py-md-16">
            <div class="row">


                <div class="col-lg-12 col-xl-12 col-xxl-12x">

                    {{-- TODO: razmisliti o ovom prikazu bez escape-ovanja, nije bas bezbjedno --}}
                    <h1 class="fs-32 text-uppercase text-line text-primary mb-3"> Јавне набавке</h1>

                    <section id="snippet-2" class=" bg-light ">
                        <div class=" pb-13 pb-md-14">

                            <!-- /.row -->
                            <div class="row">
                                @foreach($publicPurchases as $item)
                                    <div class="col-xl-12 mx-auto mb-6">

                                        <article class="border-2 p-4 rounded-3 shadow" style="position: relative;">
                                            <div class="post-header">
                                                <h2 class="post-title h3 mb-3"><a class="link-dark"
                                                                                  href="/javne-nabavke/{{$item->id}}">{{ $item->title }}</a>
                                                </h2>
                                            </div>
                                            <div class="post-content">
                                                <p>{{ strip_tags($item->html_content) }}</p>
                                            </div>
                                            <div class="post-footer">
                                                <ul class="post-meta">
                                                    <li class="post-date"><i
                                                            class="uil uil-calendar-alt"></i><span>{{ \Illuminate\Support\Carbon::parse($item->date)->format('d/m/Y') }}</span>
                                                    </li>
                                                    {{--            <li class="post-comments"><a href="#"><i class="uil uil-file-alt fs-15"></i>Coding</a></li>--}}
                                                </ul>
                                            </div>
                                            <div class="read-more d-none d-md-block"
                                                 style="position: absolute; top: 50%; right: 0; transform: translate(-10%, -50%)">
                                                <a href="/javne-nabavke/{{$item->id}}"
                                                   class="btn btn- btn-outline-primary rounded-pill">Прочитај више ></a>
                                            </div>
                                        </article>

                                    </div>

                                @endforeach
                                <!-- /.row -->
                            </div>
                            <!-- /.container -->
                            <!-- /.container -->
                    </section>

                </div>
                <!-- /column -->

            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </section>


    <section id="dokumenti" class="wrapper bg-light angled">
        <div class="container py-14 py-md-16">
            <div class="row">


                <div class="col-lg-12 col-xl-12 col-xxl-12x">

                    <h1 class="fs-32 text-uppercase text-line text-primary mb-3">Документи и прописи</h1>

                    <section id="snippet-2" class="bg-light">
                        <div class=" pb-13 pb-md-14">

                            <!-- /.row -->
                            <div class="row">
                                @foreach($documents as $item)
                                    <div class="col-xl-12 mx-auto mb-6">

                                        <article class="border-2 p-4 rounded-3 shadow" style="position: relative;">
                                            <div class="post-header">
                                                <h2 class="post-title h3 mb-3"><a class="link-dark"
                                                                                  href="/dokumenti-i-propisi/{{$item->id}}">{{ $item->title }}</a>
                                                </h2>
                                            </div>
                                            <div class="post-content">
                                                <p>{{ strip_tags($item->description) }}</p>
                                            </div>
                                            <div class="post-footer">
                                                <ul class="post-meta">
                                                    <li class="post-date"><i
                                                            class="uil uil-calendar-alt"></i><span>{{ \Illuminate\Support\Carbon::parse($item->date)->format('d/m/Y') }}</span>
                                                    </li>
                                                    {{--            <li class="post-comments"><a href="#"><i class="uil uil-file-alt fs-15"></i>Coding</a></li>--}}
                                                </ul>
                                            </div>
                                            <div class="read-more"
                                                 style="position: absolute; top: 50%; right: 0; transform: translate(-10%, -50%)">
                                                <a href="/dokumenti-i-propisi/{{$item->id}}"
                                                   class="btn btn- btn-outline-primary rounded-pill">Отвори ></a>
                                            </div>
                                        </article>

                                    </div>
                                @endforeach
                                <!-- /.row -->
                            </div>
                            <!-- /.container -->
                            <!-- /.container -->
                    </section>

                </div>
                <!-- /column -->

            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </section>
</x-main-layout>
