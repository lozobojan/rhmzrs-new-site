
document.addEventListener('DOMContentLoaded', function () {
    $('#example').DataTable({
        ajax: {
            dataSrc: '',
            url: '../api/meteo-maps',
        },
        responsive: true,
        "columns": [
            { "data": "station_name" },
            { "data": "description" },
            { "data": "image" }
        ],
        "language": {
            "url": "../js/Datatable/Serbian.json"
        }
    });

});



