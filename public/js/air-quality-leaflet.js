let timestampAPI = Date.now();
const config = {
    API: {
        ecoInformation: '../api/eco-information',
    },
    MAP: {
        element: 'map',
        latLng: {lat: 44.1, lng: 17.8},
        zoomLevel: 7.9,
        typeControl: false,
        scrollwheel: false,
        mapType: 'roadmap',
        iconsURL: 'images/icons/',
        capitalCity: {
            title: 'Banja Luka',
            lat: 44.7725,
            lng: 17.186,
            icon: 'images/icons/general-icons/capital_big.png',
            zindex: -1
        }
    }
};


document.addEventListener('DOMContentLoaded', function () {
    // let map = L.map(config.MAP.element, {
    //     gestureHandling: true,
    //     minZoom: 7.9,
    //     maxBounds: L.latLngBounds(L.latLng(42.374778,15.31494), L.latLng(45.583290, 20.192871)),
    // }).setView(config.MAP.latLng, config.MAP.zoomLevel);
    // //disable default scroll
    // map.scrollWheelZoom.disable();
    //
    // map.on('click', function(e) {
    //     $('.modal').modal('hide');
    // });
    //
    // $("#map").bind('mousewheel DOMMouseScroll', function (event) {
    //     event.stopPropagation();
    //     if (event.ctrlKey == true) {
    //         event.preventDefault();
    //         map.scrollWheelZoom.enable();
    //         $('#map').removeClass('map-scroll');
    //         setTimeout(function(){
    //             map.scrollWheelZoom.disable();
    //         }, 1000);
    //     } else {
    //         map.scrollWheelZoom.disable();
    //         $('#map').addClass('map-scroll');
    //     }
    //
    // });

    $(window).bind('mousewheel DOMMouseScroll', function (event) {
        $('#map').removeClass('map-scroll');
    })
    $('#example').DataTable({
        ajax: {
            dataSrc: '',
            url: config.API.ecoInformation,
        },
        "columns": [
            { "data": "period" },
            { "data": "station_name" },
            { "data": "o3" },
            { "data": "co" },
            { "data": "so2" },
            { "data": "no" },
            { "data": "no2" },
            { "data": "nox" },
            { "data": "pm10" },
            { "data": "pm25" },
            // { "data": "ik" },
        ],
        "language": {
            "url": "../js/Datatable/Serbian.json"
        }
    });

    $('#tp').DataTable({
        ajax: {
            dataSrc: 'indeks',
            url: '/data/EkoPodaci.json',
        },
        "columns": [
            { "data": "vrijeme" },
            { "data": "stanica" },
            { "data": "O3",
                // Render first array element of data and ssecond if 1 set td class to red
                "render": function ( data, type, row, meta ) {
                    return data[0];
                },
                // Add class to td
                "createdCell": function (td, cellData, rowData, row, col) {
                    $(td).addClass(`bg-class-${rowData['O3'][1]}`);
                    $(td).addClass('text-white');
                }
            },
            { "data": "CO",
                // Render first array element of data and ssecond if 1 set td class to red
                "render": function ( data, type, row, meta ) {
                    return data[0];
                },
                // Add class to td
                "createdCell": function (td, cellData, rowData, row, col) {
                    $(td).addClass(`bg-class-${rowData['CO'][1]}`);
                    $(td).addClass('text-white');
                } },
            { "data": "SO2",
                // Render first array element of data and ssecond if 1 set td class to red
                "render": function ( data, type, row, meta ) {
                    return data[0];
                },
                // Add class to td
                "createdCell": function (td, cellData, rowData, row, col) {
                    $(td).addClass(`bg-class-${rowData['SO2'][1]}`);
                    $(td).addClass('text-white');
                } },
            { "data": "NO2",
                // Render first array element of data and ssecond if 1 set td class to red
                "render": function ( data, type, row, meta ) {
                    return data[0];
                },
                // Add class to td
                "createdCell": function (td, cellData, rowData, row, col) {
                    $(td).addClass(`bg-class-${rowData['NO2'][1]}`);
                    $(td).addClass('text-white');
                } },
            { "data": "PM10",
                // Render first array element of data and ssecond if 1 set td class to red
                "render": function ( data, type, row, meta ) {
                    return data[0];
                },
                // Add class to td
                "createdCell": function (td, cellData, rowData, row, col) {
                    $(td).addClass(`bg-class-${rowData['PM10'][1]}`);
                    $(td).addClass('text-white');
                } },
            { "data": "PM2.5",
                defaultContent: "*",
                // Render first array element of data and ssecond if 1 set td class to red
                "render": function ( data, type, row, meta ) {
                    return row["PM2.5"][0];
                },
                // Add class to td
                "createdCell": function (td, cellData, rowData, row, col) {
                    $(td).addClass(`bg-class-${rowData['PM2.5'][1]}`);
                    $(td).addClass('text-white');
                }
            },
            { "data": "indeks",
                // Render first array element of data and ssecond if 1 set td class to red
                "render": function ( data, type, row, meta ) {
                    return row["indeks"][0];
                },
                // Add class to td
                "createdCell": function (td, cellData, rowData, row, col) {
                    $(td).addClass(`bg-class-${rowData['indeks'][1]}`);
                    $(td).addClass('text-white');
                } },
        ],
        "language": {
            "url": "../js/Datatable/Serbian.json"
        }
    });

    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);
    let data = [];
    let markerArr = [];

    axios.get(`${config.API.ecoInformation}`).then(rs => {
        data = rs.data;
        data.forEach(item => {
            let marker = L.marker(
                [item.lat, item.lng],
                {
                    icon:
                        L.icon({
                            iconUrl: item.icon,
                        }),
                    description: item.description,
                }
            ).addTo(map)
                .on('click', markerOnClick);
            markerArr.push(marker);
        })
    })

    function markerOnClick(e) {
        console.log(e)
        var id = e.target.options.description;
        $(".modal-content").html('<div class="modal-header p-2">\n' +
            '                                <h5 class="modal-title modal-title"></h5>\n' +
            '                                <button type="button" class="close" data-dismiss="modal" onclick="$(\'#emptymodal\').modal(\'hide\');" aria-label="Close">\n' +
            '                                    <span aria-hidden="true">&times;</span>\n' +
            '                                </button>\n' +
            '                            </div>' + id);
        $('#emptymodal').modal('show');
    }
});




