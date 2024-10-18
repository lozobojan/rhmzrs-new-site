@php
    $meta = [
        "title"                 => "РХМЗРС - Контакт",
        "description"           => "РХМЗРС - Контакт - Републички хидрометеоролошки завод Републике Србије - Хидрометеоролошки институт Србије КОНТАКТ",
        "keywords"              => "rhmzrs контакт рхмж рхм",
        "image"                 => asset('assets/img/meta-og.png'),
        "url"                   => Request::url(),
    ];
@endphp
<x-main-layout :meta="$meta">
    <style>
        .rev {
            direction: rtl;
            unicode-bidi: bidi-override;
        }
    </style>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.27.2/axios.min.js"
            integrity="sha512-odNmoc1XJy5x1TMVMdC7EMs3IVdItLPlCeL5vSUPN2llYKMJ2eByTTAIiiuqLg+GdNr9hF6z81p27DArRFKT7A=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <section class="wrapper image-wrapper bg-image bg-overlay bg-overlay-400 text-white"
             data-image-src="./assets/img/photos/bg3.jpg">
        <div class="container pt-17 pb-20 pt-md-19 pb-md-21 text-center">
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <h1 class="display-1 mb-3 text-white">КОНТАКТ</h1>
                    <!-- /nav -->
                </div>
                <!-- /column -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </section>
    <!-- /section -->
    <section class="wrapper bg-light ">
        <div class="container pb-11">
            <div class="row mb-14 mb-md-16">
                <div class="col-xl-10 mx-auto mt-n19">
                    <div class="card">
                        <div class="row gx-0">
                            <div class="col-lg-6 align-self-stretch">
                                <div class="map map-full rounded-top rounded-lg-start">
                                    <iframe
                                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2382.7058975209375!2d17.176105141283706!3d44.7495882894013!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x475e1cd35c0c4611%3A0xa09366a1960456fd!2sRepubli%C4%8Dki%20hidrometeoro%C5%A1ki%20zavod!5e0!3m2!1sen!2s!4v1663677986676!5m2!1sen!2s"
                                        style="width:100%; height: 100%; border:0" allowfullscreen></iframe>
                                    {{--                                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2382.7058975209375!2d17.176105141283706!3d44.7495882894013!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x475e1cd35c0c4611%3A0xa09366a1960456fd!2sRepubli%C4%8Dki%20hidrometeoro%C5%A1ki%20zavod!5e0!3m2!1sen!2s!4v1663677986676!5m2!1sen!2s" style="width:100%; height: 100%; border:0" allowfullscreen></iframe>--}}
                                    {{--                                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d25387.23478654725!2d-122.06115399490332!3d37.309248660190086!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x808fb4571bd377ab%3A0x394d3fe1a3e178b4!2sCupertino%2C%20CA%2C%20USA!5e0!3m2!1sen!2str!4v1645437305701!5m2!1sen!2str" ></iframe>--}}
                                </div>
                                <!-- /.map -->
                            </div>
                            <!--/column -->
                            <div class="col-lg-6">
                                <div class="p-5 p-md-8 p-lg-10">
                                    <div class="d-flex flex-row">
                                        <div>
                                            <div class="icon text-primary fs-28 me-4 mt-n1"><i
                                                    class="uil uil-location-pin-alt"></i></div>
                                        </div>
                                        <div class="align-self-start justify-content-start">
                                            <h5 class="mb-1">Адреса</h5>
                                            <address>Пут бањалучког одреда бб
                                                78000 Бања Лука
                                                Република Српска
                                                Босна и Херцеговина
                                                Поштански претинац: 147
                                            </address>
                                        </div>
                                    </div>
                                    <!--/div -->
                                    <div class="d-flex flex-row">
                                        <div>
                                            <div class="icon text-primary fs-28 me-4 mt-n1"><i
                                                    class="uil uil-phone-volume"></i></div>
                                        </div>
                                        <div>
                                            <h5 class="mb-1">Телефони</h5>
                                            <p>
                                                <strong>Централа:</strong><a
                                                    href="tel:+387 51/ 433-522"> +387 51/ 433-522</a><br>
                                                <strong>Факс:</strong><a
                                                    href="tel:+387 51/ 433-521"> +387 51/ 433-521</a><br>
                                                <strong>Директор:</strong><a
                                                    href="tel:051 460-852"> 051 460-852</a><br>
                                                <strong>Сеизмологија:</strong><a
                                                    href="tel:051 463-467"> 051 463-467</a><br>
                                                <strong>Метеорологија:</strong> <a
                                                    href="tel:051 461-681"> 051 461-681</a>; <a
                                                    href="tel:051 346-490">051 346-490</a><br>
                                                <strong>Хидрологија:</strong> <a
                                                    href="tel:051 315-538"> 051 315-538</a><br>
                                                <strong>Заштита ж. средине:</strong> <a
                                                    href="tel:051 346-494"> 051 346-494</a><br>
                                                <strong>Сабирни центар:</strong><a
                                                    href="tel:051 307-943"> 051 307-943</a> (тел/фаx)
                                            </p>
                                        </div>
                                    </div>
                                    <!--/div -->
                                    <div class="d-flex flex-row">
                                        <div>
                                            <div class="icon text-primary fs-28 me-4 mt-n1"><i
                                                    class="uil uil-envelope"></i></div>
                                        </div>
                                        <div>
                                            <h5 class="mb-1">Електронске адресе</h5>
                                            <p><strong>e-mail:</strong>
                                                rhmz@teol.net
                                                {{--                                                @obfuscate(rhmz@teol.net)--}}
                                                <br><strong>web:</strong>
                                                www.rhmzrs.com</p>
                                        </div>
                                    </div>
                                    <!--/div -->
                                </div>
                                <!--/div -->
                            </div>
                            <!--/column -->
                        </div>
                        <!--/.row -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /column -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-10 offset-lg-1 col-xl-8 offset-xl-2">
                    <h2 class="display-4 mb-3 text-center mb-10">Пошаљите нам поруку</h2>
                    <form class="contact-form needs-validatiaon" method="POST" action="{{ route('contact.send') }}" novalidate>
                        @csrf
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        <div class="row gx-4">
                            <div class="col-md-6">
                                <div class="form-floating mb-4">
                                    <input id="form_institution" type="text" name="institution" class="form-control"
                                           placeholder="организација">
                                    <label for="form_institution">Институција, организација, предузеће</label>
                                    <div class="valid-feedback"> Изгледа добро!</div>
                                    <div class="invalid-feedback"> Унесите назив своје институције.</div>
                                </div>
                            </div>
                            <!-- /column -->
                            <div class="col-md-6">
                                <div class="form-floating mb-4">
                                    <input id="form_name" type="text" name="name" class="form-control"
                                           placeholder="Марко Марковић" required>
                                    <label for="form_name">Ваше име*</label>
                                    <div class="valid-feedback"> Изгледа добро!</div>
                                    <div class="invalid-feedback"> Молимо Вас да унесете своје име.</div>
                                </div>
                            </div>
                            <!-- /column -->
                            <div class="col-md-6">
                                <div class="form-floating mb-4">
                                    <input id="form_email" type="email" name="email" class="form-control"
                                           placeholder="jane.doe@example.com" required>
                                    <label for="form_email">Email *</label>
                                    <div class="valid-feedback"> Изгледа добро!</div>
                                    <div class="invalid-feedback"> Молимо Вас да унесете своју е-пошту.</div>
                                </div>
                            </div>
                            <!-- /column -->
                            <div class="col-md-6">
                                <div class="form-floating mb-4">
                                    <input id="form_subject" type="text" name="subject" class="form-control"
                                           placeholder="предмет" required>
                                    <label for="form_subject">Предмет *</label>
                                    <div class="valid-feedback"> Изгледа добро!</div>
                                    <div class="invalid-feedback"> Молимо Вас да унесете предмет.</div>
                                </div>
                            </div>
                            <!-- /column -->
                            <div class="col-12">
                                <div class="form-floating mb-4">
                                    <textarea id="form_message" name="message" class="form-control"
                                              placeholder="Порука" style="height: 150px" required></textarea>
                                    <label for="form_message">Порука *</label>
                                    <div class="valid-feedback"> Изгледа добро!</div>
                                    <div class="invalid-feedback"> Молимо Вас да унесете поруку.</div>
                                </div>
                            </div>
                            <!-- /column -->
                            <div class="col-12 text-center">
                                <input type="submit" class="btn btn-primary rounded-pill btn-send mb-3"
                                       value="Пошаљи">
                                <p class="text-muted"><strong>*</strong> Обавезна поља.</p>
                            </div>
                            <!-- /column -->
                        </div>
                        <!-- /.row -->
                    </form>
                    <!-- /form -->
                </div>
                <!-- /column -->
            </div>

            <div class="row mt-10">
                <div class="col-lg-10 offset-lg-1 col-xl-8 offset-xl-2">
                    <h2 class="display-4 mb-6 text-center">Контакт информације</h2>
                    <div class="main col-lg-9 col-md-8 contact-info" role="main">
                        <div class="main-content">
                            {!! $page->html_content !!}
                        </div>

                        <!-- JavaScript to decode the emails -->
                        <script>
                            document.addEventListener('DOMContentLoaded', function () {
                                // Function to decode Base64 email
                                function decodeEmail(encodedEmail) {
                                    return atob(encodedEmail); // Decode Base64
                                }

                                // Find all obfuscated email links
                                const emailLinks = document.querySelectorAll('.obfuscated-email');

                                // Loop through each email link and decode the email address
                                emailLinks.forEach(function (link) {
                                    link.addEventListener('click', function (event) {
                                        // if css class clicked is present, do default action
                                        if (link.classList.contains('clicked')) {
                                            return;
                                        }

                                        event.preventDefault(); // Prevent the default behavior
                                        const encodedEmail = link.getAttribute('data-email');
                                        const decodedEmail = decodeEmail(encodedEmail);

                                        // Set the href and display the decoded email
                                        link.setAttribute('href', 'mailto:' + decodedEmail);
                                        // add css class clicked
                                        link.classList.add('clicked');
                                        link.innerText = decodedEmail; // Show the decoded email
                                    });
                                });
                            });
                        </script>



                    </div>
                    <!-- /form -->
                </div>
                <!-- /column -->
            </div>

            <!-- /.row -->
        </div>
        <!-- /.container -->
        <!-- /section -->



</x-main-layout>
