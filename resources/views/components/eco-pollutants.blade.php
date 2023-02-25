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
    <link rel="stylesheet" href="//unpkg.com/leaflet-gesture-handling/dist/leaflet-gesture-handling.min.css"
          type="text/css">
    <script src="{{asset('js/Datatable/jQuery-3.6.0/jquery-3.6.0.min.js')}}"></script>
    <link rel="stylesheet" type="text/css" href="{{ asset('js/Datatable/datatables.min.css') }}"/>

    <script type="text/javascript" src="{{ asset('js/Datatable/datatables.min.js') }}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.27.2/axios.min.js"
            integrity="sha512-odNmoc1XJy5x1TMVMdC7EMs3IVdItLPlCeL5vSUPN2llYKMJ2eByTTAIiiuqLg+GdNr9hF6z81p27DArRFKT7A=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{asset('js/eco-pollutants-leaflet.js')}}"></script>
    <script></script>
    <!-- Do what you can, with what you have, where you are. - Theodore Roosevelt -->
    <div id="map"></div>

    <br>

    <table id="example" class="table table-bordered table-striped" style="width:100%">
        <thead>
        <tr role="row">
            <th class="sorting_asc" tabindex="0" aria-controls="data-table" rowspan="1" colspan="1"
                aria-sort="ascending" aria-label="Станица: activate to sort column descending" style="width: 56px;">
                Станица
            </th>
            <th class="sorting" tabindex="0" aria-controls="data-table" rowspan="1" colspan="1"
                aria-label="О3: activate to sort column ascending" style="width: 35px;">lat
            </th>
            <th class="sorting" tabindex="0" aria-controls="data-table" rowspan="1" colspan="1"
                aria-label="CO: activate to sort column ascending" style="width: 59px;">lng
            </th>
        </tr>
        </thead>
    </table>

</div>
