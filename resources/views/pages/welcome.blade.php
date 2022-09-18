<x-main-layout>
    <section class="wrapper bg-light angled">
        <div class="container py-14 py-md-16">
            <div class="row">
                <div class="col-12">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d11714.576362230699!2d18.96212075!3d42.7747318!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2s!4v1662984325285!5m2!1sen!2s" width="100%" height="800" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
                <div class="col-lg-9 col-md-6 col-sm-12">
                    <div class="row">
                        <div class="col-lg-12 col-xl-12 col-xxl-12">
                            <x-section-separator text="Актуелности" simple></x-section-separator>

                            {{--                            <h3 class="display-4 mb-9">Check out some of our awesome projects with creative ideas and great design.</h3>--}}
                        </div>
                        <!-- /column -->
                    </div>
                    <!-- /.row -->
                    <div class="swiper-container blog grid-view mb-10" data-margin="30" data-dots="true"
                         data-items-xl="3" data-items-md="2" data-items-xs="1">
                        <div class="swiper">
                            <div class="swiper-wrapper">
                                @for($i = 0; $i < 6; $i++)
                                    <div class="swiper-slide">
                                        <x-article :article="['title' => 'Test article title']"></x-article>
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
                <div class="col-lg-3 col-md-6 col-sm-12 pt-10">
                    <div class="kad_img_upload_widget">
                        <a href="https://www.meteoalarm.eu/index2.php?lang=cp_RS&amp;day=0&amp;AT=0&amp;country=BA"
                           target="_blank"> <img
                                class="w-100"
                                src="https://rhmzrs.com/wp-content/uploads/2019/06/meteoalarm-logo.png">
                        </a></div>
                    <x-section-separator text="Анкета" simple></x-section-separator>

                </div>
            </div>

        </div>
        <!-- /.container -->
    </section>
</x-main-layout>
