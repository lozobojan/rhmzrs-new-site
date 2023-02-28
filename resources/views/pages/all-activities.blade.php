@php
    $meta = [
        "title"                 => "РХМЗРС - Све актуелности",
        "description"           => "РХМЗРС -  Све актуелности",
        "keywords"              => "rhmzrs РХМЗРС - Све актуелности",
        "image"                 => asset('assets/img/meta-og.png'),
        "url"                   => Request::url(),
    ];
@endphp
<x-main-layout :meta="$meta">
    <style>
        .paginacija > nav > div.flex.justify-between.flex-1.sm\:hidden{
            margin-bottom: 20px;
        }
    </style>
    <section class="wrapper bg-light angled">
        <div class="container py-14 py-md-16">
            <div class="row">


                <div class="col-lg-12 col-xl-12 col-xxl-12">

                    {{-- TODO: razmisliti o ovom prikazu bez escape-ovanja, nije bas bezbjedno --}}
                    <h1 class="fs-32 text-uppercase text-line text-primary mb-3"> Све актуелности </h1>

                    <form method="GET" action="{{ route('all-activities') }}">
                        <div class="row">
                            <div class="col-sm-12 col-md-10">
                                <div class="form-floating mb-4">
                                    <input id="term" type="text" name="term" class="form-control" placeholder="...">
                                    <label for="term">Претрага*</label>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-2">
                                <input type="submit" class="btn btn-primary  btn-send mb-3" value="Претрази">

                            </div>
                        </div>
                    </form>

                </div>
                <!-- /column -->

                <div class="row">
                    @foreach($activities as $post)
                        <div class="col-sm-12 col-md-6 col-lg-4 col-xl-4">

                        <x-article :subtext="true" :article="$post"></x-article>
{{--                        <p>{{ $post->title }}</p>--}}
                        </div>
                    @endforeach

                    <div class="col-12 mt-5 paginacija">

                    {{ $activities->links() }}
                    </div>
                </div>

            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </section>
</x-main-layout>
