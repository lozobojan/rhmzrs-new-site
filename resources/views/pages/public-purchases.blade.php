<x-main-layout>
    <section class="wrapper bg-light angled">
        <div class="container py-14 py-md-16">
            <div class="row">


                <div class="col-lg-12 col-xl-12 col-xxl-12x">

                    {{-- TODO: razmisliti o ovom prikazu bez escape-ovanja, nije bas bezbjedno --}}
                    <h1 class="fs-32 text-uppercase text-line text-primary mb-3">	Јавне набавке</h1>

                    <section id="snippet-2" class="wrapper bg-light wrapper-border">
                        <div class="container pb-13 pb-md-14">

                            <!-- /.row -->
                            <div class="row">
                                @foreach($publicPurchases as $item)
                                    <div class="col-xl-10 mx-auto">

                                        <x-list-item :item="$item" type="javne-nabavke"></x-list-item>
                                        <!-- /column -->
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
