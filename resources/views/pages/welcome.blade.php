<x-main-layout>
    <section class="wrapper bg-light angled">
        <div class="container py-14 py-md-16">
            <div class="row">
                <div class="col-lg-9 col-xl-8 col-xxl-7">
                    <h2 class="fs-16 text-uppercase text-line text-primary mb-3">Case Studies</h2>
                    <h3 class="display-4 mb-9">Check out some of our awesome projects with creative ideas and great design.</h3>
                </div>
                <!-- /column -->
            </div>
            <!-- /.row -->
            <div class="swiper-container blog grid-view mb-10" data-margin="30" data-dots="true" data-items-xl="3" data-items-md="2" data-items-xs="1">
                <div class="swiper">
                    <div class="swiper-wrapper">
                        @for($i = 0; $i < 6; $i++)
                            <div class="swiper-slide">
                                <x-article></x-article>
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
        <!-- /.container -->
    </section>
</x-main-layout>
