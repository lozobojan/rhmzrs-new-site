
document.addEventListener('DOMContentLoaded', function () {
    $('#example').DataTable({
        ajax: {
            dataSrc: '',
            url: '../api/meteo-maps',
        },
        responsive: true,
        "columns": [
            { "data": "station_name" },
            { "data": "period" },
            { "data": "temperature" },
            { "data": "pressure" },
            { "data": "wind" },
            { "data": "rainfall" },
            { "data": "min_temp" },
            { "data": "max_temp" },
            { "data": "snow" }
        ],
        "language": {
            "url": "../js/Datatable/Serbian.json"
        }
    });

});



