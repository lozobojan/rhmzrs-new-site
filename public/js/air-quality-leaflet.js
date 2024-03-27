let timestampAPI = Date.now();
const config = {
    API: {
        ecoInformation: '../data/feeds/EkoPodaci.json?t=' + timestampAPI,
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
            url: config.API.ecoInformation,
            dataSrc: function(json) {
                var trenutniData = [];
                for (var stationName in json.trenutni) {
                    if (json.trenutni.hasOwnProperty(stationName)) {
                        var record = json.trenutni[stationName];
                        record.station_name = stationName; // Add station name to the record
                        trenutniData.push(record);
                    }
                }
                return trenutniData;
            }
        },
        "columns": [
            { "data": "vrijeme", "width": "160px" },
            { "data": "stanica", "width": "100px" },
            { "data": "O3" },
            { "data": "CO" },
            { "data": "SO2" },
            { "data": "NO" },
            { "data": "NO2" },
            { "data": "NOx" },
            { "data": "PM10" },
            {
                "data": "PM2\\.5", // Escape dot with double backslashes
                "defaultContent": "-" // Default content if data is missing
            },
            { "data": "H2S" },
            { "data": "C6H6" },
            // { "data": "ik" },
        ],
        "language": {
            "url": "../js/Datatable/Serbian.json"
        }
    });

    $('#tp').DataTable({
        ajax: {
            url: '/data/feeds/EkoPodaci.json',
            dataSrc: function(json) {
                var indeksData = [];
                for (var station in json.indeks) {
                    var stationData = json.indeks[station];
                    stationData['station'] = station; // Add the station name to the data
                    indeksData.push(stationData);
                }
                return indeksData;
            }
        },
        columns: [
            { "data": "vrijeme", "width": "130px" },
            { "data": "station", "width": "100px" }, // 'station' is the added key for the station name
            {
                "data": "O3",
                "render": function (data) { return Array.isArray(data) ? data[0] : data; },
                "createdCell": function (td, cellData) { $(td).addClass(`bg-class-${Array.isArray(cellData) ? cellData[1] : 'undefined'}`).addClass('text-white'); }
            },
            {
                "data": "SO2",
                "render": function (data) { return Array.isArray(data) ? data[0] : data; },
                "createdCell": function (td, cellData) { $(td).addClass(`bg-class-${Array.isArray(cellData) ? cellData[1] : 'undefined'}`).addClass('text-white'); }
            },
            {
                "data": "NO2",
                "render": function (data) { return Array.isArray(data) ? data[0] : data; },
                "createdCell": function (td, cellData) { $(td).addClass(`bg-class-${Array.isArray(cellData) ? cellData[1] : 'undefined'}`).addClass('text-white'); }
            },
            {
                "data": "PM10",
                "render": function (data) { return Array.isArray(data) ? data[0] : data; },
                "createdCell": function (td, cellData) { $(td).addClass(`bg-class-${Array.isArray(cellData) ? cellData[1] : 'undefined'}`).addClass('text-white'); }
            },
            {
                "data": "PM2\\.5", // Handle the dot notation
                "defaultContent": "*",
                "render": function (data) { return Array.isArray(data) ? data[0] : data; },
                "createdCell": function (td, cellData) { $(td).addClass(`bg-class-${Array.isArray(cellData) ? cellData[1] : 'undefined'}`).addClass('text-white'); }
            },
            {
                "data": "indeks",
                "render": function (data) { return Array.isArray(data) ? data[0] : data; },
                "createdCell": function (td, cellData) { $(td).addClass(`bg-class-${Array.isArray(cellData) ? cellData[1] : 'undefined'}`).addClass('text-white'); }
            }
        ],
        language: {
            url: "../js/Datatable/Serbian.json"
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




