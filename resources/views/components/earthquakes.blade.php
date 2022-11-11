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
    <script src="{{asset('js/earthquakes-stations-leaflet.js')}}"></script>
    <!-- Do what you can, with what you have, where you are. - Theodore Roosevelt -->
    <div id="map"></div>

    <br>

    <div class="flex flex-row">
            <button class="btn btn-primary" onclick="execute()">Прикажи све zemljotrese</button>
            <button class="btn btn-primary" onclick="execute('AUTOMATIC')">Прикажи automatske</button>
            <button class="btn btn-primary" onclick="execute('FINAL')">Прикажи obradjene</button>
    </div>
    <table id="example" class="table table-bordered table-striped" style="width:100%">
        <thead>
        <tr role="row">
            <th class="sorting_asc" tabindex="0" aria-controls="data-table" rowspan="1" colspan="1"
                aria-sort="ascending" aria-label="Термин: activate to sort column descending" style="width: 55px;">
                Термин
            </th>
            <th class="sorting_asc" tabindex="0" aria-controls="data-table" rowspan="1" colspan="1"
                aria-sort="ascending" aria-label="Термин: activate to sort column descending" style="width: 55px;">
                Tip
            </th>
            <th class="sorting" tabindex="0" aria-controls="data-table" rowspan="1" colspan="1"
                aria-label="Регион: activate to sort column ascending" style="width: 53px;">Регион
            </th>
            <th class="sorting" tabindex="0" aria-controls="data-table" rowspan="1" colspan="1"
                aria-label="Магнитуда: activate to sort column ascending" style="width: 72px;">Магнитуда
            </th>
            <th class="sorting" tabindex="0" aria-controls="data-table" rowspan="1" colspan="1"
                aria-label="Опис: activate to sort column ascending" style="width: 128px;">Опис
            </th>
        </tr>
        </thead>
    </table>

</div>
