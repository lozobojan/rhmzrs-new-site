<div>

    <style>
        #map {
            height: 800px;
            width: 100%;
        }

        #map > div.leaflet-control-container > div.leaflet-bottom.leaflet-right > div {
            display: none !important;
        }

        #example p {
            margin: 0 !important;
        }

        #example_previous > a, #example_next > a {
            width: 100%;
            padding-left: 4px;
            padding-right: 4px;
        }

        #example_paginate > ul {
            justify-content: flex-end;
        }

        #example_paginate {
            width: min-content;
            float: right;
        }
    </style>
    <link rel="stylesheet" href="{{asset('leaflet/leaflet.css')}}"/>
    <script src="{{asset('leaflet/leaflet.js')}}"></script>
    <script src="{{asset('js/Datatable/jQuery-3.6.0/jquery-3.6.0.min.js')}}"></script>
    <link rel="stylesheet" type="text/css" href="{{ asset('js/Datatable/datatables.min.css') }}"/>

    <script type="text/javascript" src="{{ asset('js/Datatable/datatables.min.js') }}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.27.2/axios.min.js"
            integrity="sha512-odNmoc1XJy5x1TMVMdC7EMs3IVdItLPlCeL5vSUPN2llYKMJ2eByTTAIiiuqLg+GdNr9hF6z81p27DArRFKT7A=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{asset('js/seismic-stations-leaflet.js')}}"></script>
    <!-- Do what you can, with what you have, where you are. - Theodore Roosevelt -->
    <div id="map"></div>
    <div aria-labelledby="myModalLabel" class="modal left fade" id="emptymodal" role="dialog" tabindex="-1">
        <div class="modal-dialog" role="document">
            <div class="modal-content p-5"></div>
            <!-- modal-content -->
        </div>
        <!-- modal-dialog -->
    </div>
    <br>
    Мрежа сеизмолошких станица  Републике Српске састоји се од 9  дигиталних аутоматских станица од којих су три  са широкопојасним сензором (Бањалука, Хан Пијесак и Мраковица)  а остале су краткопериодичне. Сензори на свим станицама су трокомпонентни што значи да се регистрација земљотреса врши у вертикалном и два хоризонтална правца сјевер-југ и исток-запад. Прикупљање и обрада података се врши у Бањој Луци а са свих станица је обезбијеђен пренос података у реалном времену. Просторни распоред станица је приказан на мапи а детаљни подаци о свакој локацији и инсталисаној опреми у табели.


    <br>
    <br>

        <table id="example" class="table table-bordered table-striped" style="width:100%">
        <thead>
        <tr role="row">
{{--            <th class="sorting" tabindex="0" aria-controls="data-table" rowspan="1" colspan="1"--}}
{{--                aria-label="No.: activate to sort column ascending" style="width: 22px;">No.--}}
{{--            </th>--}}
            <th class="sorting_asc" tabindex="0" aria-controls="data-table" rowspan="1" colspan="1"
                aria-label="Станица: activate to sort column descending" style="width: 56px;" aria-sort="ascending">
                Станица
            </th>
            <th class="sorting" tabindex="0" aria-controls="data-table" rowspan="1" colspan="1"
                aria-label="Код Станице: activate to sort column ascending" style="width: 56px;">Код Станице
            </th>

            <th class="sorting" tabindex="0" aria-controls="data-table" rowspan="1" colspan="1"
                aria-label="Лат.: activate to sort column ascending" style="width: 29px;">Лат.
            </th>
            <th class="sorting" tabindex="0" aria-controls="data-table" rowspan="1" colspan="1"
                aria-label="Лон.: activate to sort column ascending" style="width: 30px;">Лон.
            </th>
            <th class="sorting" tabindex="0" aria-controls="data-table" rowspan="1" colspan="1"
                aria-label="Алт.: activate to sort column ascending" style="width: 29px;">Алт.
            </th>

        </tr>
        </thead>
    </table>

</div>
