<div>
    {{--    <script src="{{asset('js/Datatable/jQuery-3.6.0/jquery-3.6.0.min.js')}}"></script>--}}
    <link rel="stylesheet" type="text/css" href="{{ asset('js/Datatable/datatables.min.css') }}"/>
    <script
        src="https://code.jquery.com/jquery-3.6.1.min.js"
        integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ="
        crossorigin="anonymous"></script>

    <script type="text/javascript" src="{{ asset('js/Datatable/datatables.min.js') }}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.27.2/axios.min.js"
            integrity="sha512-odNmoc1XJy5x1TMVMdC7EMs3IVdItLPlCeL5vSUPN2llYKMJ2eByTTAIiiuqLg+GdNr9hF6z81p27DArRFKT7A=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{asset('js/public-data-ecology.js')}}"></script>
    <!-- Do what you can, with what you have, where you are. - Theodore Roosevelt -->

    <br>
    {{--    <a href="https://www.youtube.com/embed/KK9bwTlAvgo?autoplay=0" type="text/html" data-framer="iframe-1">LinkText</a>--}}
    <div class="flex flex-row">
        <a class="btn btn-primary" href="?type=all">Прикажи све гасове </a>
        <a class="btn btn-primary" href="?type=direct">Прикажи директне гасове </a>
        <a class="btn btn-primary" href="?type=indirect">Прикажи индиректне  гасове </a>
    </div>
    <table id="example" class="table table-bordered table-striped" style="width:100%">
        <thead>
        <tr role="row">
            {{--            {{ dd($gasses) }}--}}
            <th>gas</th>
            @foreach($years as $year)
                <th class="sorting" tabindex="0" aria-controls="data-table" rowspan="1" colspan="1"
                    aria-label="Станица: activate to sort column ascending" style="width: 140px;">
                    {{ $year }}
                </th>
        @endforeach
        </tr>
        </thead>
        <tbody>
        @foreach($gasses as $key => $gas)
            <tr>
                <th>{{$key}}</th>
                @foreach($years as $year)
                <td>
                    {{ $gas[$year] }}
                </td>
                @endforeach
            </tr>
        @endforeach
        </tbody>

    </table>

</div>
