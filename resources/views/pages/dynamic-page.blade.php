<x-main-layout>
    <section class="wrapper bg-light angled">
        <div class="container py-14 py-md-16">
            <div class="row">

                {{-- TODO: razmisliti o ovom prikazu bez escape-ovanja, nije bas bezbjedno --}}
                <div class="col-lg-9 col-xl-8 col-xxl-7">
                    <h1 class="fs-16 text-uppercase text-line text-primary mb-3">{{ $page->title }}</h1>
                    {!! $page->html_content !!}
                </div>
                <!-- /column -->

            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </section>
</x-main-layout>
