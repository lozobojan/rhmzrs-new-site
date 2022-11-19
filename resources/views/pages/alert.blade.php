@php
    $notags = strip_tags($alert->html_content);
    $subtext = substr($notags, 0, 200);
   $meta = [
       "title"                 => "РХМЗРС - $alert->title",
       "description"           => $subtext,
       "keywords"              => "rhmzrs",
       "image"                 => asset('assets/img/meta-og.png'),
       "url"                   => Request::url(),
   ];
@endphp
<x-main-layout :meta="$meta">
    <x-slot name="additionalCss">
        <style>
            .post-content img {
                width: auto;
                max-width: 100%;
                height: auto;
            }
        </style>
    </x-slot>
    <section class="wrapper bg-soft-primary d-print-none">
        <div class="container pt-10 pb-19 pt-md-14 pb-md-20 text-center">
            <div class="row">
                <div class="col-md-10 col-xl-8 mx-auto">
                    <div class="post-header">
                        <!-- /.post-category -->
                        <h1 class="display-1 mb-4">{{ $alert->title }}</h1>
                        <ul class="post-meta mb-5">
                            <li class="post-date"><i
                                    class="uil uil-calendar-alt"></i><span>{{ \Illuminate\Support\Carbon::parse($alert->created_at)->format('d/m/Y') }}</span>
                            </li>
                            {{--                            <li class="post-author"><a href="#"><i class="uil uil-user"></i><span>Makogai Bog</span></a></li>--}}
                        </ul>
                        <!-- /.post-meta -->
                    </div>
                    <!-- /.post-header -->
                </div>
                <!-- /column -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </section>
    <!-- /section -->
    <section class="wrapper bg-light">
        <div class="container pb-14 pb-md-16">
            <div class="row">
                <div class="col-lg-10 mx-auto">
                    <div class="blog single mt-n17">
                        <div class="card">
                            <figure class="card-img-top"><img src="./assets/img/photos/b1.jpg" alt=""/></figure>
                            <div class="card-body">

                                <div class="container text-center d-none d-print-block">
                                    <div class="row">
                                        <div class="col-md-10 col-xl-8 mx-auto">
                                            <div class="post-header">
                                                <!-- /.post-category -->
                                                <h1 class="display-1 mb-4 mt-8">{{ $alert->title }}</h1>
                                                <ul class="post-meta mb-5">
                                                    <li class="post-date"><i
                                                            class="uil uil-calendar-alt"></i><span>{{ \Illuminate\Support\Carbon::parse($alert->created_at)->format('d/m/Y') }}</span>
                                                    </li>
                                                </ul>
                                                <!-- /.post-meta -->
                                            </div>
                                            <!-- /.post-header -->
                                        </div>
                                        <!-- /column -->
                                    </div>
                                    <!-- /.row -->
                                </div>


                                <div class="classic-view">
                                    <article class="post">
                                        <div class="post-content mb-5">
                                            {!!  $alert->description !!}

                                        </div>
                                        <!-- /.post-content -->
                                        <div
                                            class="post-footer d-md-flex flex-md-row justify-content-md-between align-items-center mt-8 d-print-none">
                                            <div>
                                            </div>
                                        </div>
                                        <!-- /.post-footer -->
                                    </article>
                                    <!-- /.post -->
                                </div>
                                <!-- /.classic-view -->
                                <!-- /.comment-form -->
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.blog -->
                </div>
                <!-- /column -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </section>


</x-main-layout>
