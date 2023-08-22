
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
            url: '../data/feeds/aut.json',
        },
        responsive: true,
        "columns": [
            { "data": "Станица" },
            {
                "data": "Температура",
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
            { "data": "Падавине" },
            { "data": "Релативна Влажност" },
        ],
        "language": {
            "url": "../js/Datatable/Serbian.json"
        }
    });
}

