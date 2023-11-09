
document.addEventListener('DOMContentLoaded', function () {

    syn();

});


function syn(){
    $('#example').show();
    $('#example2').hide();
    $('#example2').DataTable().destroy();

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
            { "data": "brzVjetra" },
            { "data": "kolicinaPadavine" },
            { "data": "minTemp" },
            { "data": "maxTemp" },
            { "data": "snijeg" },
            {
                "data": "marker",
                "render": function(data, type, row) {
                    return '<img src="../wp-content/plugins/hidrometeo/public/assets/images/icons/' + data + '" alt="Marker" height="42" width="42">';
                }
            },
        ],
        "language": {
            "url": "../js/Datatable/Serbian.json"
        }
    });

}

function aut(){

    // Hide table with id 'example'
    $('#example').hide();
    $('#example2').show();
    $('#example').DataTable().destroy();
    // Remove datatable if exists
    if ($.fn.DataTable.isDataTable('#example2')) {
        $('#example2').DataTable().destroy();
    }

    $('#example2').DataTable({
        ajax: {
            dataSrc: function(data){
                let termin = data['Вријеме'];
                parsed = Object.keys(data).map(key => {
                    if (key === "Вријеме") {
                        // dont include the key
                        return data[key];


                    } else {
                        return {
                            "Станица": key,
                            ...data[key]
                        };
                    }
                });

                // Remove the first element
                parsed.shift();
                // Set tag #termin with the value of termin
                $('#termin').text("Термин: " + termin);
                return parsed;
            },
            url: '../data/feeds/MeteoPodaci.json?t=' + new Date().getTime(),
        },
        responsive: true,
        "columns": [
            { "data": "Станица" },
            {
                "data": "Температура Ваздуха",
                render: function (data, type, row, meta) {
                    // Return number value rounded on 1 decimal if its not a number return data;
                    return isNaN(data) ? data : parseFloat(data).toFixed(1);
                },
            },
            { "data": "Притисак",
            render: function(data, type, row, meta){
                // Return number value rounded on 1 decimal if its not a number return data;
                return isNaN(data) ? data : Math.round(data * 10) / 10;
            }
            },
            { "data": "Вјетар",
                render: function(data, type, row, meta){
                    return row['Брзина Вјетра'] + ' m/s ' + row['Смјер Вјетра'];
                }
            },
            // { "data": "Падавине" },
            { "data": "Влажност Ваздуха" },
        ],
        "language": {
            "url": "../js/Datatable/Serbian.json"
        }
    });
}

