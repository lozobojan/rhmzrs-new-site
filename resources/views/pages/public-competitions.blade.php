<x-main-layout>
    <section class="wrapper bg-light angled">
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
</x-main-layout>
