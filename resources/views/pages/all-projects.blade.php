@php
    $meta = [
        "title"                 => "РХМЗРС - Сви пројекти",
        "description"           => "РХМЗРС -  Сви пројекти",
        "keywords"              => "rhmzrs РХМЗРС - Документи и прописи",
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
                    <h1 class="fs-32 text-uppercase text-line text-primary mb-3"> Сви пројекти </h1>


                </div>
                <!-- /column -->

                <div class="row">
                    @foreach($projects as $post)
                        <div class="col-sm-12 col-md-6 col-lg-4 col-xl-4">

                        <x-article :subtext="true" :article="$post"></x-article>
{{--                        <p>{{ $post->title }}</p>--}}
                        </div>
                    @endforeach

                    <div class="col-12 mt-5 paginacija">

                    {{ $projects->links() }}
                    </div>
                </div>

            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </section>
</x-main-layout>
