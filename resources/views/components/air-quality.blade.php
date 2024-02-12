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

        #example_paginate, #tp_paginate {
            width: min-content;
            float: right;
        }

        #mapa > div > div > div > h1 {
            display: none;
        }

        #mapa > div {
            padding-top: 10px !important;
        }

        .bg-class-1 {
            background-color: #00ff00!important;
        }

        .bg-class-2 {
            background-color: #ffff00!important;
        }

        .bg-class-3 {
            background-color: #ff9900!important;
        }

        .bg-class-4 {
            background-color: #ff0000!important;
        }

        .bg-class-5 {
            background-color: #990000!important;
        }
        .bg-class-undefined {
            background-color: #ffffff!important;
            color: #60697b!important;
        }
    </style>
    <link rel="stylesheet" href="{{asset('leaflet/leaflet.css')}}"/>


    <script src="{{asset('leaflet/leaflet.js')}}"></script>
    <link rel="stylesheet" href="//unpkg.com/leaflet-gesture-handling/dist/leaflet-gesture-handling.min.css"
          type="text/css">
    <script src="{{asset('js/Datatable/jQuery-3.6.0/jquery-3.6.0.min.js')}}"></script>
    <link rel="stylesheet" type="text/css" href="{{ asset('js/Datatable/datatables.min.css') }}"/>

    <script type="text/javascript" src="{{ asset('js/Datatable/datatables.min.js') }}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.27.2/axios.min.js"
            integrity="sha512-odNmoc1XJy5x1TMVMdC7EMs3IVdItLPlCeL5vSUPN2llYKMJ2eByTTAIiiuqLg+GdNr9hF6z81p27DArRFKT7A=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{asset('js/air-quality-leaflet.js')}}"></script>
    <script></script>
    <!-- Do what you can, with what you have, where you are. - Theodore Roosevelt -->
    {{--    <div id="map"></div>--}}


    {{--    <div aria-labelledby="myModalLabel" class="modal left fade" id="emptymodal" role="dialog" tabindex="-1">--}}
    {{--        <div class="modal-dialog" role="document">--}}
    {{--            <div class="modal-content p-5"></div>--}}
    {{--            <!-- modal-content -->--}}
    {{--        </div>--}}
    {{--        <!-- modal-dialog -->--}}
    {{--    </div>--}}

    <br>
    <h1 id="podaci" class="fs-32 mt-5 text-uppercase text-line text-primary mb-3 notranslate">Тренутни подаци</h1>
    <table id="example" class="table table-bordered table-striped" style="width:100%">
        <thead>
        <tr role="row">
            <th class="sorting_asc" tabindex="0" aria-controls="data-table" rowspan="1" colspan="1"
                aria-sort="ascending" aria-label="Станица: activate to sort column descending" style="width: 56px;">
                Вријеме
            </th>
            <th class="sorting_asc" tabindex="0" aria-controls="data-table" rowspan="1" colspan="1"
                aria-sort="ascending" aria-label="Станица: activate to sort column descending" style="width: 56px;">
                Станица
            </th>
            <th class="sorting" tabindex="0" aria-controls="data-table" rowspan="1" colspan="1"
                aria-label="О3: activate to sort column ascending" style="width: 35px;">О3
            </th>
            <th class="sorting" tabindex="0" aria-controls="data-table" rowspan="1" colspan="1"
                aria-label="CO: activate to sort column ascending" style="width: 59px;">CO
            </th>
            <th class="sorting" tabindex="0" aria-controls="data-table" rowspan="1" colspan="1"
                aria-label="SО2: activate to sort column ascending" style="width: 59px;">SО2
            </th>
            <th class="sorting" tabindex="0" aria-controls="data-table" rowspan="1" colspan="1"
                aria-label="NO: activate to sort column ascending" style="width: 63px;">NO
            </th>
            <th class="sorting" tabindex="0" aria-controls="data-table" rowspan="1" colspan="1"
                aria-label="NO2: activate to sort column ascending" style="width: 51px;">NO2
            </th>
            <th class="sorting" tabindex="0" aria-controls="data-table" rowspan="1" colspan="1"
                aria-label="NOx: activate to sort column ascending" style="width: 51px;">NOx
            </th>
            <th class="sorting" tabindex="0" aria-controls="data-table" rowspan="1" colspan="1"
                aria-label="PM10: activate to sort column ascending" style="width: 38px;">PM10
            </th>
            <th class="sorting" tabindex="0" aria-controls="data-table" rowspan="1" colspan="1"
                aria-label="PM25: activate to sort column ascending" style="width: 38px;">PM25
            </th>
            {{--            <th class="sorting" tabindex="0" aria-controls="data-table" rowspan="1" colspan="1"--}}
            {{--                aria-label="PM25: activate to sort column ascending" style="width: 38px;">IK--}}
            {{--            </th>--}}
            {{--            <th class="sorting" tabindex="0" aria-controls="data-table" rowspan="1" colspan="1"--}}
            {{--                aria-label="Опис: activate to sort column ascending" style="width: 61px;">Опис--}}
            {{--            </th>--}}
        </tr>
        </thead>
    </table>


    <h1 id="podaci" class="fs-32 mt-5 text-uppercase text-line text-primary mb-3">Индекс квалитета ваздуха</h1>
    <table id="tp" class="table table-bordered table-striped" style="width:100%">
        <thead>
        <tr role="row">
            <th class="sorting_asc" tabindex="0" aria-controls="data-table" rowspan="1" colspan="1"
                aria-sort="ascending" aria-label="Станица: activate to sort column descending" style="width: 56px;">
                Вријеме
            </th>
            <th class="sorting_asc" tabindex="0" aria-controls="data-table" rowspan="1" colspan="1"
                aria-sort="ascending" aria-label="Станица: activate to sort column descending" style="width: 56px;">
                Станица
            </th>
            <th class="sorting" tabindex="0" aria-controls="data-table" rowspan="1" colspan="1"
                aria-label="О3: activate to sort column ascending" style="width: 35px;">О3
            </th>
            <th class="sorting" tabindex="0" aria-controls="data-table" rowspan="1" colspan="1"
                aria-label="CO: activate to sort column ascending" style="width: 59px;">CO
            </th>
            <th class="sorting" tabindex="0" aria-controls="data-table" rowspan="1" colspan="1"
                aria-label="SО2: activate to sort column ascending" style="width: 59px;">SО2
            </th>
            <th class="sorting" tabindex="0" aria-controls="data-table" rowspan="1" colspan="1"
                aria-label="NO2: activate to sort column ascending" style="width: 51px;">NO2
            </th>
            <th class="sorting" tabindex="0" aria-controls="data-table" rowspan="1" colspan="1"
                aria-label="PM10: activate to sort column ascending" style="width: 38px;">PM10
            </th>
            <th class="sorting" tabindex="0" aria-controls="data-table" rowspan="1" colspan="1"
                aria-label="PM25: activate to sort column ascending" style="width: 38px;">PM25
            </th>
            <th class="sorting" tabindex="0" aria-controls="data-table" rowspan="1" colspan="1"
                aria-label="PM25: activate to sort column ascending" style="width: 38px;">Индекс
            </th>
            {{--            <th class="sorting" tabindex="0" aria-controls="data-table" rowspan="1" colspan="1"--}}
            {{--                aria-label="Опис: activate to sort column ascending" style="width: 61px;">Опис--}}
            {{--            </th>--}}
        </tr>
        </thead>
    </table>

</div>
