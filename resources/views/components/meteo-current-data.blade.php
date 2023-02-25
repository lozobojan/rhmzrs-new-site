<div>
    <script src="{{asset('js/Datatable/jQuery-3.6.0/jquery-3.6.0.min.js')}}"></script>
    <link rel="stylesheet" type="text/css" href="{{ asset('js/Datatable/datatables.min.css') }}"/>

    <script type="text/javascript" src="{{ asset('js/Datatable/datatables.min.js') }}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.27.2/axios.min.js" integrity="sha512-odNmoc1XJy5x1TMVMdC7EMs3IVdItLPlCeL5vSUPN2llYKMJ2eByTTAIiiuqLg+GdNr9hF6z81p27DArRFKT7A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{asset('js/meteo-current-data.js')}}"></script>
    <!-- Do what you can, with what you have, where you are. - Theodore Roosevelt -->
    <br>
    <style>
        td {
            text-align: center; color: #0c0c0c!important;
        }
        td p {
            color: #0c0c0c!important;
        }
    </style>

    <table id="example" class="table table-bordered table-striped" style="width:100%">
        <thead>
        <tr role="row">
            <th class="sorting" tabindex="0" aria-controls="data-table" rowspan="1" colspan="1"
                aria-label="Станица: activate to sort column ascending" style="width: 140px;">Станица
            </th>
            <th class="sorting_asc" tabindex="0" aria-controls="data-table" rowspan="1" colspan="1"
                aria-label="Опис: activate to sort column descending" style="width: 319px;" aria-sort="ascending">Опис
            </th>
            <th class="sorting_asc" tabindex="0" aria-controls="data-table" rowspan="1" colspan="1"
                aria-label="Опис: activate to sort column descending" style="width: 319px;" aria-sort="ascending">Слика
            </th>
        </tr>
        </thead>
    </table>

</div>
