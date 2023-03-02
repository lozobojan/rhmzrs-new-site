
document.addEventListener('DOMContentLoaded', function () {

    syn();

});


function syn(){

    // Remove datatable if exists
    if ($.fn.DataTable.isDataTable('#example')) {
        $('#example').DataTable().destroy();
    }

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
            { "data": "snow" },
            { "data": "image" },
        ],
        "language": {
            "url": "../js/Datatable/Serbian.json"
        }
    });
}

function aut(){

    // Remove datatable if exists
    if ($.fn.DataTable.isDataTable('#example')) {
        $('#example').DataTable().destroy();
    }

    $('#example').DataTable({
        ajax: {
            dataSrc: 'MeteoMapaGlavna',
            url: '../data/feeds/MeteoMapa.json',
        },
        responsive: true,
        "columns": [
            { "data": "StationName" },
            { "data": "termin" },
            { "data": "temperatura" },
            { "data": "pritisak" },
            { "data": "wind",
                render: function(data, type, row, meta){
                    return row.brzVjetra + ' m/s ' + row.cirSmjer + ' (' + row.latSmjer + ')';
                }
            },
            { "data": "kolicinaPadavine" },
            { "data": "minTemp" },
            { "data": "maxTemp" },
            { "data": "snijeg" },
            { "data": "marker",
            render : function(data, type, row, meta){
                return '<img src="../assets/img/icons/' + data + '" alt="image" style=""/>';
            }
            },
        ],
        "language": {
            "url": "../js/Datatable/Serbian.json"
        }
    });
}

