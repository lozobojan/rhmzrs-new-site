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

        .legenda {
        /*    Render small box with light gray background and some padding and round corners it has 2 p tags in t*/
            background-color: #f9f9f9;
            padding: 10px;
            border-radius: 5px;
            margin-top: 10px;
        }
    </style>
    <div class="flex flex-row">
        <a class="btn btn-primary" href="#" onclick="syn()">Синоптичке станице </a>
        <a class="btn btn-primary" href="#" onclick="aut()">Аутоматске станице </a>
    </div>
    <table id="example" class="table table-bordered table-striped notranslate" style="width:100%">
        <thead>
        <tr role="row">
            <th class="sorting" tabindex="0" aria-controls="data-table" rowspan="1" colspan="1"
                aria-label="Станица: activate to sort column ascending" style="width: 140px;">Станица
            </th>
            <th class="sorting_asc" tabindex="0" aria-controls="data-table" rowspan="1" colspan="1"
                aria-label="Опис: activate to sort column descending" style="width: 319px;" aria-sort="ascending">Термин
            </th>
            <th class="sorting_asc" tabindex="0" aria-controls="data-table" rowspan="1" colspan="1"
                aria-label="Опис: activate to sort column descending" style="width: 319px;" aria-sort="ascending">Температура
            </th>
            <th class="sorting_asc" tabindex="0" aria-controls="data-table" rowspan="1" colspan="1"
                aria-label="Опис: activate to sort column descending" style="width: 319px;" aria-sort="ascending">Притисак
            </th>
            <th class="sorting_asc" tabindex="0" aria-controls="data-table" rowspan="1" colspan="1"
                aria-label="Опис: activate to sort column descending" style="width: 319px;" aria-sort="ascending">Вјетар
            </th>
            <th class="sorting_asc" tabindex="0" aria-controls="data-table" rowspan="1" colspan="1"
                aria-label="Опис: activate to sort column descending" style="width: 319px;" aria-sort="ascending">Количина падавина
            </th>
            <th class="sorting_asc" tabindex="0" aria-controls="data-table" rowspan="1" colspan="1"
                aria-label="Опис: activate to sort column descending" style="width: 319px;" aria-sort="ascending">Мин. темп.
            </th>
            <th class="sorting_asc" tabindex="0" aria-controls="data-table" rowspan="1" colspan="1"
                aria-label="Опис: activate to sort column descending" style="width: 319px;" aria-sort="ascending">Макс. темп.
            </th>
            <th class="sorting_asc" tabindex="0" aria-controls="data-table" rowspan="1" colspan="1"
                aria-label="Опис: activate to sort column descending" style="width: 319px;" aria-sort="ascending">Висина снијега
            </th>
            <th class="sorting_asc" tabindex="0" aria-controls="data-table" rowspan="1" colspan="1"
                aria-label="Опис: activate to sort column descending" style="width: 319px;" aria-sort="ascending">Слика
            </th>
        </tr>
        </thead>
    </table>
    <h4 id="termin" class="py-4"></h4>
    <p class="infoinfo">*Ови подаци су аутоматски генерисани и могу садржати одређене грешке. Молимо вас да их користите са опрезом и обратите се надлежним службама за тачне информације.</p>
    <div class="legenda">
        <p class="infoinfo">* податак се не мјери</p>
        <p class="infoinfo">- нема података</p>
    </div>
    <table id="example2" class="table table-bordered table-striped notranslate" style="width:100%">
        <thead>
        <tr role="row">
            <th class="sorting" tabindex="0" aria-controls="data-table" rowspan="1" colspan="1"
                aria-label="Станица: activate to sort column ascending" style="width: 140px;">Станица
            </th>
            <th class="sorting" tabindex="0" aria-controls="data-table" rowspan="1" colspan="1"
                aria-label="Вријеме: activate to sort column ascending" style="width: 140px;">Термин
            </th>
            <th class="sorting_asc" tabindex="0" aria-controls="data-table" rowspan="1" colspan="1"
                aria-label="Опис: activate to sort column descending" style="width: 319px;" aria-sort="ascending">Температура
            </th>
            <th class="sorting_asc" tabindex="0" aria-controls="data-table" rowspan="1" colspan="1"
                aria-label="Опис: activate to sort column descending" style="width: 319px;" aria-sort="ascending">Притисак
            </th>
            <th class="sorting_asc" tabindex="0" aria-controls="data-table" rowspan="1" colspan="1"
                aria-label="Опис: activate to sort column descending" style="width: 319px;" aria-sort="ascending">Вјетар
            </th>
{{--            <th class="sorting_asc" tabindex="0" aria-controls="data-table" rowspan="1" colspan="1"--}}
{{--                aria-label="Опис: activate to sort column descending" style="width: 319px;" aria-sort="ascending">Падавине--}}
{{--            </th>--}}
            <th class="sorting_asc" tabindex="0" aria-controls="data-table" rowspan="1" colspan="1"
                aria-label="Опис: activate to sort column descending" style="width: 319px;" aria-sort="ascending">Рел. влажност
            </th>
        </tr>
        </thead>
    </table>

</div>
