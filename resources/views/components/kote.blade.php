<script src="{{asset('js/Datatable/jQuery-3.6.0/jquery-3.6.0.min.js')}}"></script>

<script type="text/javascript" src="{{ asset('js/Datatable/datatables.min.js') }}"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        $('#example').DataTable({
            ajax: {
                dataSrc: '',
                url: '../api/flood-defense-points',
            },
            "columns": [
                // { "data": "ordinal_number" },
                { "data": "place" },
                { "data": "river_basin.title" },
                { "data": "kote0" },
                { "data": "ordinary_value" },
                { "data": "extraordinary_value" },
                { "data": "nnv" },
                { "data": "vvv" },
            ],
            "language": {
                "url": "../js/Datatable/Serbian.json"
            }
        });
    });

</script>

<div>
    <table id="example" class="table table-bordered table-striped notranslate" style="width:100%">
        <thead>
        <tr role="row">
{{--            <th class="sorting" tabindex="0" aria-controls="data-table" rowspan="1" colspan="1"--}}
{{--                aria-label="No.: activate to sort column ascending" style="width: 22px;">Р.бр.--}}
{{--            </th>--}}
            <th class="sorting_asc" tabindex="0" aria-controls="data-table" rowspan="1" colspan="1"
                aria-label="Станица: activate to sort column descending" style="width: 56px;" aria-sort="ascending">
                Мјесто
            </th>
            <th class="sorting" tabindex="0" aria-controls="data-table" rowspan="1" colspan="1"
                aria-label="Код Станице: activate to sort column ascending" style="width: 56px;">Ријека
            </th>

            <th class="sorting" tabindex="0" aria-controls="data-table" rowspan="1" colspan="1"
                aria-label="Лат.: activate to sort column ascending" style="width: 29px;"> Kota "0"
            </th>
            <th class="sorting" tabindex="0" aria-controls="data-table" rowspan="1" colspan="1"
                aria-label="Лат.: activate to sort column ascending" style="width: 29px;">Редовно (cm)
            </th>
            <th class="sorting" tabindex="0" aria-controls="data-table" rowspan="1" colspan="1"
                aria-label="Лон.: activate to sort column ascending" style="width: 30px;">Ванредно (cm)
            </th>
            <th class="sorting" tabindex="0" aria-controls="data-table" rowspan="1" colspan="1"
                aria-label="Алт.: activate to sort column ascending" style="width: 29px;">	NNV
            </th>
            <th class="sorting" tabindex="0" aria-controls="data-table" rowspan="1" colspan="1"
                aria-label="Алт.: activate to sort column ascending" style="width: 29px;">	VVV
            </th>

        </tr>
        </thead>
    </table>
</div>
