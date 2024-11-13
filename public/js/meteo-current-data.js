
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
            // { "data": "brzVjetra", // add m/s at the end },
            // render brzVjetra + ' m/s'
            { "data": "brzVjetra", render: (data, type, row) => {return data === "null" ?"nan" : data + ' m/s'} },
            { "data": "kolicinaPadavine", render: (data, type, row) => {return data === "null" ?"nan" : data} },
            { "data": "minTemp", render: (data, type, row) => {return data === "null" ?"nan" : data} },
            { "data": "maxTemp", render: (data, type, row) => {return data === "null" ?"nan" : data} },
            { "data": "snijeg", render: (data, type, row) => {return data === "null" ?"nan" : data} },
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
                let termin = data[0]['Вријеме'].replace('T', " ");
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
                "data": "Вријеме",
                render: function(data, type, row, meta) {
                    // Check if the data matches the ISO format (yyyy-mm-ddThh:mm:ss)
                    const isoDateRegex = /^\d{4}-\d{2}-\d{2}T\d{2}:\d{2}:\d{2}$/;
                    if (isoDateRegex.test(data)) {
                        // Convert ISO date format to dd.mm.yyyy hh:mm
                        const dateObj = new Date(data);
                        const day = ('0' + dateObj.getDate()).slice(-2);
                        const month = ('0' + (dateObj.getMonth() + 1)).slice(-2); // Months are 0-based in JS
                        const year = dateObj.getFullYear();
                        const hours = ('0' + dateObj.getHours()).slice(-2);
                        const minutes = ('0' + dateObj.getMinutes()).slice(-2);

                        return `${day}.${month}.${year} ${hours}:${minutes}`;
                    } else {
                        // If the date doesn't match the expected format, return it as is

                        return data;
                    }
                }
            },
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
                    return row['Брзина Вјетра'] != '*' ? row['Брзина Вјетра'] + ' m/s ' + row['Смјер Вјетра'] : '';
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

