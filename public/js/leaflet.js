// let timestampAPI = Date.now();
// config = {
//     API: {
//         weatherForecastLink: 'weather.json',
//         meteoMaps: 'api/meteo-maps',
//         ecoInformation: 'api/eco-information',
//         hydroInformation: 'api/hydro-information',
//         earthquakes: 'api/earthquakes'
//     },
//     MAP: {
//         element: 'map',
//         latLng: {lat: 44.1, lng: 17.8},
//         zoomLevel: 7.9,
//         typeControl: false,
//         scrollwheel: false,
//         mapType: 'roadmap',
//         iconsURL: 'images/icons/',
//         capitalCity: {
//             title: 'Banja Luka',
//             lat: 44.7725,
//             lng: 17.186,
//             icon: 'images/icons/general-icons/capital_big.png',
//             zindex: -1
//         }
//     }
// };
//
//
// document.addEventListener('DOMContentLoaded', function () {
//     changeData(1);
// });
// async function getRequest(url) {
//     let response = await fetch(url), jsonData = await response.json();
//     return jsonData;
// }
//
// function setDateButtons(data) {
//     let dateButton, dateListItem, navigation = document.querySelector('#dateButtons');
//     for (let i = 0; i < data[0].forecasts.forecast.length; i++) {
//         if (Object.keys(data[0].forecasts.forecast[i]).length) {
//             dateListItem = document.createElement('li');
//             dateListItem.setAttribute('role', 'presentation');
//             dateListItem.setAttribute('class', 'nav__pills-item');
//             dateButton = document.createElement('a');
//             dateButton.setAttribute('href', '#');
//             dateButton.setAttribute('id', 'dateLink');
//             dateButton.setAttribute('data-dan', data[0].forecasts.forecast[i].datetime);
//             dateButton.setAttribute('data-date', data[0].forecasts.forecast[i].datetime);
//             dateButton.innerText = formatWeatherForecastDate(data[0].forecasts.forecast[i].datetime);
//             dateListItem.appendChild(dateButton);
//             navigation.appendChild(dateListItem);
//         }
//     }
// }
//
// function formatWeatherForecastDate(date) {
//     let currentDate = date.substring(0, 8).replace(/(\d{4})(\d{2})(\d{2})/, '$1.$2.$3');
//     let currentDateSplited = currentDate.split('.');
//     return currentDateSplited[2] + '.' + currentDateSplited[1] + '.' + currentDateSplited[0];
// }
//
//
// function addActiveClass() {
//     let dateNavItems = document.querySelectorAll('.nav__pills-item'),
//         mainNavLinks = document.querySelectorAll('#weatherForecast, #meteorology, #seismology, #hydrology, #environment');
//     dateNavItems[0].classList.add('active');
//     // mainNavLinks[0].classList.add('active');
//     for (let i = 0; i < dateNavItems.length; i++) {
//         dateNavItems[i].addEventListener('click', function () {
//             let activeListItem = document.querySelectorAll('li.active');
//             activeListItem[0].className = activeListItem[0].className.replace(' active', '');
//             this.classList.add('active');
//         });
//     }
//     for (let i = 0; i < mainNavLinks.length; i++) {
//         mainNavLinks[i].addEventListener('click', function () {
//             let activeButton = document.querySelectorAll('button.active');
//             activeButton[0].className = activeButton[0].className.replace(' active', '');
//             this.classList.add('active');
//         });
//     }
// }
//
// function getDateLinkAttr(data) {
//     let dateNavLinks = document.querySelectorAll('#dateLink'), dateNavLinkData = 0;
//     for (let i = 0; i < dateNavLinks.length; i++) {
//         dateNavLinks[i].addEventListener('click', function (event) {
//             event.preventDefault();
//             dateNavLinkData = dateNavLinks[i].attributes[2].nodeValue;
//             let filteredData = filterWeatherData(JSON.parse(data), dateNavLinkData);
//             initMap.removeAllMarkers();
//             initMap.addMarkerForWeatherForecast(filteredData);
//             initMap.addWeatherForecastInfoWindow(JSON.parse(data));
//         });
//     }
// }
//
// function filterFirstWeatherData(data) {
//     let arrEl = '';
//     let tempArr = [];
//     for (let i = 0; i < data.length; i++) {
//         if (Object.keys(data[i]).length != 0) {
//             arrEl = data[i].forecasts.forecast.shift();
//             data[i].forecasts.forecast = [];
//             data[i].forecasts.forecast.push(arrEl);
//         }
//     }
// }
//
//
//
// function initMap() {
//     var weatherForecastMarkers = [], seismicMarkers = [], hidroMarkers = [], meteoDataMarkers = [],
//         ecologyDataMarkers = [], initialized = false
//     mapElement = document.getElementById(config.MAP.element), uluru = config.MAP.latLng;
//     var mapOptions = {
//         zoom: config.MAP.zoomLevel,
//         center: uluru,
//         mapTypeId: config.MAP.mapType,
//         mapTypeControl: config.MAP.typeControl,
//         scrollwheel: config.MAP.scrollwheel
//     };
//     var container = L.DomUtil.get('map');
//     if (container != null) {
//         container._leaflet_id = null;
//     }
//     var map = L.map(config.MAP.element).setView(config.MAP.latLng, config.MAP.zoomLevel);
//     L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'}).addTo(map);
//
//     function addMarkerForWeatherForecast(data) {
//         if (data.length) {
//             for (let i = 0; i < data.length; i++) {
//                 if (Object.keys(data[i])) {
//                     let latLng = new LeafLeatGoogle.LatLng(data[i].lat, data[i].lon);
//                     for (let j = 0; j < data[i].forecasts.forecast.length; j++) {
//                         let minTemp = data[i].forecasts.forecast[j].min != 'undefined' ? data[i].forecasts.forecast[j].min : 'NN';
//                         let maxTemp = data[i].forecasts.forecast[j].max != 'undefined' ? data[i].forecasts.forecast[j].max : 'NN';
//                         var marker = new LeafLeatGoogle.MarkerWithLabel({
//                             position: latLng,
//                             map: map,
//                             labelClass: 'weatherLabel',
//                             labelContent: `${minTemp}Â°C&nbsp;${maxTemp}Â°C`,
//                             htmlIcon: true,
//                             icon: config.MAP.iconsURL + 'meteo-icons/' + data[i].forecasts.forecast[j].symbol + '.png',
//                             name: data[i].name,
//                             dataid: data[i]['@name'],
//                         });
//                         weatherForecastMarkers.push(marker);
//                     }
//                 }
//             }
//         }
//     }
//     function addWeatherForecastInfoWindow(data) {
//         for (let i = 0; i < weatherForecastMarkers.length; i++) {
//             weatherForecastMarkers[i].map_marker.on('click', function () {
//                 let filterdWeatherDataForCity = data.filter(function (obj) {
//                     return obj['@name'] == weatherForecastMarkers[i].marker.dataid;
//                 });
//                 contentWindowContent(filterdWeatherDataForCity);
//                 openMapForecastWeatherWindow();
//                 closeButton();
//             });
//         }
//     }
//     function removeAllMarkers() {
//         for (let i = 0; i < weatherForecastMarkers.length; i++) {
//             weatherForecastMarkers[i].map.removeLayer(weatherForecastMarkers[i].map_marker);
//         }
//         weatherForecastMarkers = [];
//     }
//
//     initMap.addMarkerForWeatherForecast = addMarkerForWeatherForecast;
//     initMap.addWeatherForecastInfoWindow = addWeatherForecastInfoWindow;
//     initMap.removeAllMarkers = removeAllMarkers;
// }
//
// function getWeatherForecastEvents() {
//     let weatherForecastButton = document.querySelector('#weatherForecast');
//     getRequest(config.API.weatherForecastLink).then(function (data) {
//         let country = data.countries.country.filter((country) => {
//             return country['@name'] == 'Bosnia';
//         });
//         window.originalWeatherForecastData = JSON.stringify(country['0'].location_id);
//         setDateButtons(country['0'].location_id);
//         addActiveClass();
//         getDateLinkAttr(window.originalWeatherForecastData);
//         filterFirstWeatherData(country['0'].location_id);
//         initMap();
//         initMap.addMarkerForWeatherForecast(country['0'].location_id);
//         initMap.addWeatherForecastInfoWindow(JSON.parse(window.originalWeatherForecastData));
//     });
//
//     getRequest(config.API.weatherForecastLink).then(function (data) {
//         let country = data.countries.country.filter((country) => {
//             return country['@name'] == 'Bosnia';
//         });
//         setDateButtons(country['0'].location_id);
//         addActiveClass();
//         getDateLinkAttr(window.originalWeatherForecastData);
//         filterFirstWeatherData(country['0'].location_id);
//         initMap();
//         initMap.addMarkerForWeatherForecast(country['0'].location_id);
//         initMap.addWeatherForecastInfoWindow(country['0'].location_id);
//     });
//
// }
//
//
// let map = L.map(config.MAP.element, {
//     minZoom: 7.9,
//     maxBounds: L.latLngBounds(L.latLng(42.374778,15.31494), L.latLng(45.583290, 20.192871)),
// }).setView(config.MAP.latLng, config.MAP.zoomLevel);
//
// map.scrollWheelZoom.disable();
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
//
// $(window).bind('mousewheel DOMMouseScroll', function (event) {
//     $('#map').removeClass('map-scroll');
// })
//
//
// L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
//     attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
// }).addTo(map);
// let data = [];
//
// let markerArr = [];
//
//
// function addToMap(type) {
//     let loader = document.getElementById('loader');
//     loader.style.display = 'grid';
//     if (markerArr.length > 0) {
//         markerArr.forEach(marker => {
//             marker.remove();
//         })
//     }
//     axios.get(`${type}`).then(rs => {
//         data = rs.data;
//         data.forEach(item => {
//             console.log(item.lat, item.lng)
//             let marker = L.marker(
//                 [item.lat, item.lng],
//                 {
//                     icon:
//                         L.icon({
//                             iconUrl: item.icon,
//                         }),
//                     description: item.description
//
//                 }
//             ).addTo(map)
//                 .on('click', markerOnClick);
//             markerArr.push(marker);
//         })
//         loader.style.display = 'none';
//     })
//
// }
//
// function markerOnClick(e) {
//     console.log(e)
//     var id = e.target.options.description;
//     $(".modal-content").html('This is marker ' + id);
//     $('#emptymodal').modal('show');
// }
// // changeData function to fetch data from api and update the leaflet map
// function changeData(type) {
//     switch (type) {
//         case 1:
//             addToMap(config.API.meteoMaps)
//             break;
//         case 2:
//             addToMap(config.API.meteoMaps)
//             break;
//         case 3:
//             addToMap(config.API.earthquakes)
//             break;
//         case 4:
//             addToMap(config.API.hydroInformation)
//             break;
//         case 5:
//             addToMap(config.API.ecoInformation)
//             break;
//         default:
//             data = [];
//     }
// }
//





var ajaxurl = "https:\/\/rhmzrs.com\/wp-admin\/admin-ajax.php";
var hidrometeo_assets = ".\/wp-content\/plugins\/hidrometeo\/public\/assets\/";
var hidrometeo_feeds = ".\/data\/feeds\/";

var mainWeatherLocation = hidrometeo_feeds;
var timestampAPI = Date.now();
var config = {
    API: {
        weatherForecastLink: hidrometeo_feeds + 'pointweather.json?t=' + timestampAPI,
        meteoData: hidrometeo_feeds + 'MeteoMapa.json?t=' + timestampAPI,
        ecologyDataLink: hidrometeo_feeds + 'EkoPodaci.json?t=' + timestampAPI,
        waterLevelLink: hidrometeo_feeds + 'HidroPodaci.json?t=' + timestampAPI,
        seismicEventsLink: hidrometeo_feeds + 'zemljotresi.json?t=' + timestampAPI
    },
    MAP: {
        element: 'map',
        latLng: {lat: 44.1, lng: 17.8},
        zoomLevel: 7.9,
        typeControl: false,
            minZoom: 7.9,
    maxBounds: L.latLngBounds(L.latLng(42.374778,15.31494), L.latLng(45.583290, 20.192871)),
        scrollwheel: false,
        mapType: 'roadmap',
        iconsURL: hidrometeo_assets + 'images/icons/',
        capitalCity: {
            title: 'Banja Luka',
            lat: 44.7725,
            lng: 17.186,
            icon: hidrometeo_assets + 'images/icons/general-icons/capital_big.png',
            zindex: -1
        }
    }
};
document.addEventListener('DOMContentLoaded', function () {
    getWeatherForecastEvents();
    getMeteorologyEvents();
    getSeismicEvents();
    getWaterLevelEvents();
    getEcologyEvents();
});

async function getRequest(url) {
    let response = await fetch(url), jsonData = await response.json();
    return jsonData;
}

function setDateButtons(data) {
    let dateButton, dateListItem, navigation = document.querySelector('#dateButtons');
    for (let i = 0; i < data[0].forecasts.forecast.length; i++) {
        if (Object.keys(data[0].forecasts.forecast[i]).length) {
            dateListItem = document.createElement('li');
            dateListItem.setAttribute('role', 'presentation');
            dateListItem.setAttribute('class', 'nav__pills-item');
            dateButton = document.createElement('a');
            dateButton.setAttribute('href', '#');
            dateButton.setAttribute('id', 'dateLink');
            dateButton.setAttribute('data-dan', data[0].forecasts.forecast[i].datetime);
            dateButton.setAttribute('data-date', data[0].forecasts.forecast[i].datetime);
            dateButton.innerText = formatWeatherForecastDate(data[0].forecasts.forecast[i].datetime);
            dateListItem.appendChild(dateButton);
            navigation.appendChild(dateListItem);
        }
    }
}

function removeDateButtons() {
    let dateListButtons = document.querySelectorAll('.nav__pills-item');
    if (dateListButtons.length > 0) {
        for (let i = 0; i < dateListButtons.length; i++) {
            dateListButtons[i].remove();
        }
    }
}

function getDateLinkAttr(data) {
    let dateNavLinks = document.querySelectorAll('#dateLink'), dateNavLinkData = 0;
    for (let i = 0; i < dateNavLinks.length; i++) {
        dateNavLinks[i].addEventListener('click', function (event) {
            event.preventDefault();
            dateNavLinkData = dateNavLinks[i].attributes[2].nodeValue;
            let filteredData = filterWeatherData(JSON.parse(data), dateNavLinkData);
            initMap.removeAllMarkers();
            initMap.addMarkerForWeatherForecast(filteredData);
            initMap.addWeatherForecastInfoWindow(JSON.parse(data));
        });
    }
}

function filterWeatherData(data, filterParam) {
    let arrEl = '';
    for (let i = 0; i < data.length; i++) {
        if (Object.keys(data[i]).length != 0) {
            arrEl = data[i].forecasts.forecast.filter((obj) => {
                return obj.datetime == filterParam;
            });
            data[i].forecasts.forecast = arrEl;
        }
    }
    return data;
}

function filterFirstWeatherData(data) {
    let arrEl = '';
    let tempArr = [];
    for (let i = 0; i < data.length; i++) {
        if (Object.keys(data[i]).length != 0) {
            arrEl = data[i].forecasts.forecast.shift();
            data[i].forecasts.forecast = [];
            data[i].forecasts.forecast.push(arrEl);
        }
    }
}

function formatWeatherForecastDate(date) {
    let currentDate = date.substring(0, 8).replace(/(\d{4})(\d{2})(\d{2})/, '$1.$2.$3');
    let currentDateSplited = currentDate.split('.');
    return currentDateSplited[2] + '.' + currentDateSplited[1] + '.' + currentDateSplited[0];
}

function addActiveClass() {
    let dateNavItems = document.querySelectorAll('.nav__pills-item'),
        mainNavLinks = document.querySelectorAll('#weatherForecast, #meteorology, #seismology, #hydrology, #environment');
    dateNavItems[0].classList.add('active');
    mainNavLinks[0].classList.add('active');
    for (let i = 0; i < dateNavItems.length; i++) {
        dateNavItems[i].addEventListener('click', function () {
            let activeListItem = document.querySelectorAll('li.active');
            activeListItem[0].className = activeListItem[0].className.replace(' active', '');
            this.classList.add('active');
        });
    }
    for (let i = 0; i < mainNavLinks.length; i++) {
        mainNavLinks[i].addEventListener('click', function () {
            let activeButton = document.querySelectorAll('button.active');
            activeButton[0].className = activeButton[0].className.replace(' active', '');
            this.classList.add('active');
        });
    }
}

function initMap() {
    var weatherForecastMarkers = [], seismicMarkers = [], hidroMarkers = [], meteoDataMarkers = [],
        ecologyDataMarkers = [], initialized = false
    mapElement = document.getElementById(config.MAP.element), uluru = config.MAP.latLng;
    var mapOptions = {
        zoom: config.MAP.zoomLevel,
        center: uluru,
        mapTypeId: config.MAP.mapType,
        mapTypeControl: config.MAP.typeControl,
        scrollwheel: config.MAP.scrollwheel
    };
    var container = L.DomUtil.get('map');
    if (container != null) {
        container._leaflet_id = null;
    }
    var map = L.map(config.MAP.element, {
        minZoom: 7.9,
        maxBounds: L.latLngBounds(L.latLng(42.374778,15.31494), L.latLng(45.583290, 20.192871)),
        dragging: false,
        tap: false
    }).setView(config.MAP.latLng, config.MAP.zoomLevel);
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'}).addTo(map);

    map.scrollWheelZoom.disable();

    $("#map").bind('mousewheel DOMMouseScroll', function (event) {
    event.stopPropagation();
    if (event.ctrlKey == true) {
        event.preventDefault();
        map.scrollWheelZoom.enable();
        $('#map').removeClass('map-scroll');
        setTimeout(function(){
            map.scrollWheelZoom.disable();
        }, 1000);
    } else {
        map.scrollWheelZoom.disable();
        $('#map').addClass('map-scroll');
    }

});

$(window).bind('mousewheel DOMMouseScroll', function (event) {
    $('#map').removeClass('map-scroll');
})

    function addMarkerForWeatherForecast(data) {
        if (data.length) {
            for (let i = 0; i < data.length; i++) {
                if (Object.keys(data[i])) {
                    let latLng = new LeafLeatGoogle.LatLng(data[i].lat, data[i].lon);
                    for (let j = 0; j < data[i].forecasts.forecast.length; j++) {
                        let minTemp = data[i].forecasts.forecast[j].min != 'undefined' ? data[i].forecasts.forecast[j].min : 'NN';
                        let maxTemp = data[i].forecasts.forecast[j].max != 'undefined' ? data[i].forecasts.forecast[j].max : 'NN';
                        var marker = new LeafLeatGoogle.MarkerWithLabel({
                            position: latLng,
                            map: map,
                            labelClass: 'weatherLabel',
                            labelContent: `${minTemp}°C\u00A0${maxTemp}°C`,
                            htmlIcon: true,
                            icon: config.MAP.iconsURL + 'meteo-icons/' + data[i].forecasts.forecast[j].symbol + '.png',
                            name: data[i].name,
                            dataid: data[i]['@name'],
                        });
                        weatherForecastMarkers.push(marker);
                    }
                }
            }
        }
    }

    function addMarkerForSeismicEvent(data) {
        if (data.length > 0) {
            for (let i = 0; i < data.length; i++) {
                if (Object.keys(data[i])) {
                    let latLng = new LeafLeatGoogle.LatLng(data[i].lat, data[i].lon);
                    var marker = new LeafLeatGoogle.MarkerWithLabel({
                        position: latLng,
                        map: map,
                        labelClass: 'seismicLabel',
                        labelContent: 'MI ' + data[i].magnituda,
                        icon: i < data.length - 1 ? config.MAP.iconsURL + 'seismic-icons/earthquake2.png' : config.MAP.iconsURL + 'seismic-icons/earthquake.png'
                    });
                }
                seismicMarkers.push(marker);
            }
        }
    }

    function addMarkerForHidrologyEvent(data) {
        if (data.length > 0) {
            for (let i = 0; i < data.length; i++) {
                if (Object.keys(data[i])) {
                    // console.log(data);
                    let latLng = new LeafLeatGoogle.LatLng(data[i]['Lat'], data[i]['Lon']);
                    try {
                        var marker = new LeafLeatGoogle.MarkerWithLabel({
                            position: latLng,
                            map: map,
                            labelClass: 'hidrologyLabel',
                            labelContent: data[i]['Станица'],
                            icon: config.MAP.iconsURL + 'hidro-icons/hidro.png'
                        });
                    } catch (err) {
                        console.log('test');
                    }
                }
                hidroMarkers.push(marker);
            }
        }
    }

    function addMarkerForMeteoDataEvent(data) {
        if (data.length > 0) {
            for (let i = 0; i < data.length; i++) {
                if (Object.keys(data[i]) && data[i] != undefined && data[i] != null) {
                    let latLng = new LeafLeatGoogle.LatLng(data[i].lat, data[i].lon);
                    var marker = new LeafLeatGoogle.MarkerWithLabel({
                        position: latLng,
                        map: map,
                        labelClass: 'meteoDataLabel',
                        labelContent: data[i].StationName,
                        icon: data[i].marker == 'null' ? config.MAP.iconsURL + 'na.png' : config.MAP.iconsURL + data[i].marker,
                        iconSize: [70, 50]
                    });
                }
                meteoDataMarkers.push(marker);
            }
        }
    }
    function addMarkerForEcologyEvent(data) {
        // console.log(data)
        if (data) {
            for (let stationName in data) {
                let stationData = data[stationName];
                console.log(stationData)

                // You might need to include logic to get the lat and lon from somewhere
                let latLng = new LeafLeatGoogle.LatLng(stationData.Lat, stationData.Lon);

                // You might also need to adjust how you get the index or other values
                var marker = new LeafLeatGoogle.MarkerWithLabel({
                    position: latLng,
                    map: map,
                    labelClass: 'hidrologyLabel',
                    icon: stationData.indeks ? '/assets/img/icons/class-' + stationData.indeks[1] + '.png' : '/assets/img/icons/marker-icon.png',
                    labelContent: stationData.stanica
                });

                ecologyDataMarkers.push(marker);
            }
        }
    }

    // function addMarkerForEcologyEvent(data) {
    //     console.log("data", data)
    //     if (data.length > 0) {
    //         for (let i = 0; i < data.length; i++) {
    //             if (Object.keys(data[i])) {
    //                 let latLng = new LeafLeatGoogle.LatLng(data[i].lat, data[i].lon);
    //                 var marker = new LeafLeatGoogle.MarkerWithLabel({
    //                     position: latLng,
    //                     map: map,
    //                     labelClass: 'hidrologyLabel',
    //                     icon: data[i].indeks[1] ?  '/assets/img/icons/class-' + data[i].indeks[1] + '.png' : '/assets/img/icons/marker-icon.png',
    //                     labelContent: data[i].StationName
    //                 });
    //             }
    //             ecologyDataMarkers.push(marker);
    //         }
    //     }
    // }

    function addWeatherForecastInfoWindow(data) {
        for (let i = 0; i < weatherForecastMarkers.length; i++) {
            weatherForecastMarkers[i].map_marker.on('click', function () {
                let filterdWeatherDataForCity = data.filter(function (obj) {
                    return obj['@name'] == weatherForecastMarkers[i].marker.dataid;
                });
                markerOnClick(filterdWeatherDataForCity)
                contentWindowContent(filterdWeatherDataForCity);
                // openMapForecastWeatherWindow();
                // closeButton();
            });
        }
    }

    function addSeismicInfoWindow(data) {
        for (let i = 0; i < seismicMarkers.length; i++) {
            seismicMarkers[i].map_marker.on('click', function () {
                let infoWindow = new LeafLeatGoogle.InfoWindow();
                for (let j = 0; j < data.length; j++) {
                    markerOnClick('<div class="seismic__info--window"><h4>' +
                        data[i].termin +
                        ' - Земљотрес код ' +
                        data[i].region +
                        ' </h4><p><strong>' +
                        data[i].desc +
                        '</strong></p><div>')
                    // infoWindow.setContent(seismicMarkers[i], '<div class="seismic__info--window"><h4>' +
                    //     data[i].termin +
                    //     ' - Земљотрес код ' +
                    //     data[i].region +
                    //     ' </h4><p><strong>' +
                    //     data[i].desc +
                    //     '</strong></p><div>');
                }
            });
        }
    }

    function addHidrologyInfoWindow(data) {
        console.log(data)
        for (let i = 0; i < hidroMarkers.length; i++) {
            console.log(hidroMarkers[i])
            hidroMarkers[i].map_marker.on('click', function () {
                let infoWindow = new LeafLeatGoogle.InfoWindow();
                for (let j = 0; j < data.length; j++) {
                    markerOnClick('<div class="hidro__info--window"><h4>' +
                        data[i]['Станица'] +
                        '</h4><strong>' +
                        data[i].desc +
                        '</strong><div>')
                    // infoWindow.setContent(hidroMarkers[i], '<div class="hidro__info--window"><h4>' +
                    //     data[i].StationName +
                    //     '</h4><strong>' +
                    //     data[i].desc +
                    //     '</strong><div>');
                }
            });
        }
    }

    function addMeteoDataInfoWindow(data) {
        for (let i = 0; i < meteoDataMarkers.length; i++) {
            meteoDataMarkers[i].map_marker.on('click', function () {
                let infoWindow = new LeafLeatGoogle.InfoWindow();
                for (let j = 0; j < data.length; j++) {
                    markerOnClick('<div class="hidro__info--window"><h4>' +
                        data[i].StationName +
                        '</h4><strong>' +
                        data[i].desc +
                        '</strong><div>')
                    // infoWindow.setContent(meteoDataMarkers[i], '<div class="hidro__info--window"><h4>' +
                    //     data[i].StationName +
                    //     '</h4><strong>' +
                    //     data[i].desc +
                    //     '</strong><div>');
                }
            });
        }
    }

    function addEcologyInfoWindow(data) {
        for (let i = 0; i < ecologyDataMarkers.length; i++) {
            ecologyDataMarkers[i].map_marker.on('click', function () {
                let infoWindow = new LeafLeatGoogle.InfoWindow();
                let classes = ['Добар', "Умјерен", "Нездрав за осјетљиве лјуде", "Нездрав", "Веома нездрав", "Опасан", "Непознато"];
                for (let j = 0; j < data.length; j++) {

                    let ht =
                        '' +
                        '<style>\n' +
                        '  .modal-body {\n' +
                        '    background-color: #747ed1!important;\n' +
                        '  }\n' +
                        '  table tr:nth-child(even) {\n' +
                        '    background-color: inherit;\n' +
                        '}\n' +
                        '  .modal-header {\n' +
                        '    background-color: #747ed1;\n' +
                        '}\n' +
                        '</style>\n' +
                        '\n' +
                        '<div class="container-fluid bg-primary">\n' +
                        '  <div class="row">\n' +
                        '    <h1 class="title font-weight-bold text-white">' + data[i].stanica + '</h1>\n' +
                        '    <h5 class="font-weight-bold text-white">' + data[i].vrijeme + '</h5>\n' +
                        '    <div class="w-100 bg-white mb-2" style="height: 4px"></div>\n' +
                        '    <h5 class="font-weight-bold text-white">Индекс квалитета ваздуха</h5>\n' +
                        '    <div class="index bg-class-'+ data[i].indeks[1] +'">\n' +
                        '      <h1 class=" font-weight-bolder display-3 mb-0 pb-0">' + data[i].indeks[0] +'</h1>\n' +
                        '      <h4 class="font-weight-bold  mt-0 py-0">'+ classes[data[i].indeks[1]?? 6] +'</h4>\n' +
                        '    </div>\n' +
                        '    <div class="mb-2"></div>\n' +
                        '    <table class="px-4 py-3 text-white">\n' +
                        '      <thead>\n' +
                        '        <th>Полутант</th>\n' +
                        '        <th>Сатна конц.</th>\n' +
                        '        <th>Индекс</th>\n' +
                        '      </thead>\n' +
                        '      <tbody class="border-top-1">\n' +
                        '        <tr class="border-top-1">\n' +
                        '          <td>CO</td>\n' +
                        '          <td>' + data[i].CO + '</td>\n' +
                        '          <td> <div class="indeks-icon bg-class-'+ data[i]["CO"][1] +'"></div></td>\n' +
                        '        </tr>\n' +
                        '          <tr>\n' +
                        '          <td>NO2</td>\n' +
                        '          <td>' + data[i].NO2 + '</td>\n' +
                        '          <td> <div class="indeks-icon bg-class-'+ data[i]["NO2"][1] +'"></div></td>\n' +
                        '        </tr>\n' +
                        '          <tr>\n' +
                        '          <td>O3</td>\n' +
                        '          <td>' + data[i].O3 + '</td>\n' +
                        '          <td> <div class="indeks-icon bg-class-'+ data[i]["O3"][1] +'"></div></td>\n' +
                        '        </tr>\n' +
                        '          <tr>\n' +
                        '          <td>PM10</td>\n' +
                        '          <td>' + data[i].PM10 + '</td>\n' +
                        '          <td> <div class="indeks-icon bg-class-'+ data[i]["PM10"][1] +'"></div></td>\n' +
                        '        </tr>\n' +
                        '          <tr>\n' +
                        '          <td>PM25</td>\n' +
                        '          <td>' + data[i]["PM2.5"] + '</td>\n' +
                        '          <td> <div class="indeks-icon bg-class-'+ data[i]["PM2.5"][1] +'"></div></td>\n' +
                        '        </tr>\n' +
                        '          <tr>\n' +
                        '          <td>SO2</td>\n' +
                        '          <td>' + data[i].SO2 + '</td>\n' +
                        '          <td> <div class="indeks-icon bg-class-'+ data[i]["SO2"][1] +'"></div></td>\n' +
                        '        </tr>\n' +
                        '      </tbody>\n' +
                        '    </table>\n' +
                        '    \n' +
                        '    <div class="w-100 bg-white mb-2 mt-2" style="height: 4px"></div>\n' +
                        '  </div>\n' +
                        '</div>'

                    markerOnClick(ht)


                    // infoWindow.setContent(ecologyDataMarkers[i], '<div class="hidro__info--window"><h4>' +
                    //     data[i].StationName +
                    //     '</h4><strong>' +
                    //     data[i].desc +
                    //     '</strong><div>');
                }
            });
        }
    }

    function removeAllMarkers() {
        for (let i = 0; i < weatherForecastMarkers.length; i++) {
            weatherForecastMarkers[i].map.removeLayer(weatherForecastMarkers[i].map_marker);
        }
        weatherForecastMarkers = [];
    }

    initMap.addMarkerForWeatherForecast = addMarkerForWeatherForecast;
    initMap.addWeatherForecastInfoWindow = addWeatherForecastInfoWindow;
    initMap.removeAllMarkers = removeAllMarkers;
    initMap.addMarkerForSeismicEvent = addMarkerForSeismicEvent;
    initMap.addSeismicInfoWindow = addSeismicInfoWindow;
    initMap.addMarkerForHidrologyEvent = addMarkerForHidrologyEvent;
    initMap.addHidrologyInfoWindow = addHidrologyInfoWindow;
    initMap.addMarkerForMeteoDataEvent = addMarkerForMeteoDataEvent;
    initMap.addMeteoDataInfoWindow = addMeteoDataInfoWindow;
    initMap.addMarkerForEcologyEvent = addMarkerForEcologyEvent;
    initMap.addEcologyInfoWindow = addEcologyInfoWindow;
}

function closeButton() {
    let closeBtn = document.querySelector('.mapinfo__container--closebtn'),
        mapInfoWindow = document.querySelector('.mapinfo');
    closeBtn.addEventListener('click', function () {
        mapInfoWindow.classList.remove('open');
        mapInfoWindow.classList.add('close');
    });
}

function closeInfoWindow() {
    let mapInfoWindow = document.querySelector('#emptymodal');
    mapInfoWindow.classList.remove('open');
    mapInfoWindow.classList.add('close');
}

function openMapForecastWeatherWindow() {
    let mapInfoWindow = document.querySelector('.mapinfo');
    mapInfoWindow.classList.add('open');
    mapInfoWindow.classList.remove('close');
}

function contentWindowContent(data) {
    isMapinfoContainer();
    let allWeatherForecastCityData = data, city = document.querySelector('.modal-title'),
        dataWrapper = document.querySelector('.modal-body');
    // city.innerText = allWeatherForecastCityData[0].name;
    for (let i = 0; i < allWeatherForecastCityData[0].forecasts.forecast.length; i++) {
        if (Object.keys(allWeatherForecastCityData[0].forecasts.forecast[i]).length) {
            let maxTemp = allWeatherForecastCityData[0].forecasts.forecast[i].max != 'undefined' ? allWeatherForecastCityData[0].forecasts.forecast[i].max : 'NN';
            let minTemp = allWeatherForecastCityData[0].forecasts.forecast[i].min != 'undefined' ? allWeatherForecastCityData[0].forecasts.forecast[i].min : 'NN';
            let windSpeed = allWeatherForecastCityData[0].forecasts.forecast[i].windspeed != 'undefined' ? allWeatherForecastCityData[0].forecasts.forecast[i].windspeed : 'NN';
            let windDir = allWeatherForecastCityData[0].forecasts.forecast[i].winddir != 'undefined' ? allWeatherForecastCityData[0].forecasts.forecast[i].winddir : 'NN';
            var dataContainer = document.createElement('div'), subtext = document.createElement('p');
            (date = document.createElement('strong')), (image = document.createElement('img')), (temp = document.createElement('div')), (wind = document.createElement('div')), dataContainer.setAttribute('class', 'mapinfo__container');
            subtext.setAttribute('class', 'mapinfo__container--subtext');
            subtext.innerText = 'Прогноза за::';
            date.setAttribute('class', 'mapinfo__container--date');
            date.innerText = formatWeatherForecastDate(allWeatherForecastCityData[0].forecasts.forecast[i].datetime);
            image.setAttribute('class', 'mapinfo__container--image');
            image.setAttribute('src', config.MAP.iconsURL +
                'meteo-icons/' +
                allWeatherForecastCityData[0].forecasts.forecast[i].symbol +
                '.png');
            temp.setAttribute('class', 'mapinfo__container--temparature');
            temp.innerText = `Температура: ${maxTemp}/°C / ${minTemp}/°C`;
            wind.setAttribute('class', 'mapinfo__container--wind');
            wind.innerText = `Вјетар: ${windSpeed}km/h, NE (${windDir}°)`;
            dataContainer.appendChild(subtext);
            dataContainer.appendChild(date);
            dataContainer.appendChild(temp);
            dataContainer.appendChild(wind);
            dataContainer.appendChild(image);
        }
        dataWrapper.appendChild(dataContainer);
        $('#emptymodal').modal('show');
    }
}

function isMapinfoContainer() {
    let mapInfoCotainer = document.querySelectorAll('.mapinfo__container');
    if (mapInfoCotainer.length > 0) {
        for (let i = 0; i < mapInfoCotainer.length; i++) {
            mapInfoCotainer[i].remove();
        }
    }
}

function getWeatherForecastEvents() {
    let weatherForecastButton = document.querySelector('#weatherForecast');
    getRequest(config.API.weatherForecastLink).then(function (data) {
        let country = data.countries.country.filter((country) => {
            return country['@name'] == 'Bosnia';
        });
        window.originalWeatherForecastData = JSON.stringify(country['0'].location_id);
        setDateButtons(country['0'].location_id);
        addActiveClass();
        getDateLinkAttr(window.originalWeatherForecastData);
        filterFirstWeatherData(country['0'].location_id);
        initMap();
        initMap.addMarkerForWeatherForecast(country['0'].location_id);
        initMap.addWeatherForecastInfoWindow(JSON.parse(window.originalWeatherForecastData));
    });
    weatherForecastButton.addEventListener('click', function () {
        getRequest(config.API.weatherForecastLink).then(function (data) {
            let country = data.countries.country.filter((country) => {
                return country['@name'] == 'Bosnia';
            });
            setDateButtons(country['0'].location_id);
            addActiveClass();
            getDateLinkAttr(window.originalWeatherForecastData);
            filterFirstWeatherData(country['0'].location_id);
            initMap();
            initMap.addMarkerForWeatherForecast(country['0'].location_id);
            initMap.addWeatherForecastInfoWindow(country['0'].location_id);
        });
    });
}

function getMeteorologyEvents() {
    let meteorologyButton = document.querySelector('#meteorology');
    meteorologyButton.addEventListener('click', function () {
        removeDateButtons();
        closeInfoWindow();
        getRequest(config.API.meteoData).then(function (data) {
            initMap();
            initMap.addMarkerForMeteoDataEvent(data.MeteoMapaGlavna);
            initMap.addMeteoDataInfoWindow(data.MeteoMapaGlavna);
        });
    });
}

function getSeismicEvents() {
    let seismologyButton = document.querySelector('#seismology');
    seismologyButton.addEventListener('click', function () {
        removeDateButtons();
        closeInfoWindow();
        getRequest(config.API.seismicEventsLink).then(function (data) {
            initMap();
            initMap.addMarkerForSeismicEvent(data.Zemljotresi);
            initMap.addSeismicInfoWindow(data.Zemljotresi);
        });
    });
}

function getWaterLevelEvents() {
    let hydrologyButton = document.querySelector('#hydrology');
    hydrologyButton.addEventListener('click', function () {
        removeDateButtons();
        closeInfoWindow();
        getRequest(config.API.waterLevelLink).then(function (data) {
            window.originalWaterLevelEventData = JSON.stringify(data);
            initMap();
            initMap.addMarkerForHidrologyEvent(data);
            initMap.addHidrologyInfoWindow(data);
        });
    });
}

function getEcologyEvents() {
    let livingEnvironmenButton = document.querySelector('#environment');
    livingEnvironmenButton.addEventListener('click', function () {
        removeDateButtons();
        closeInfoWindow();
        getRequest(config.API.ecologyDataLink).then(function (data) {
            initMap();
            initMap.addMarkerForEcologyEvent(data.indeks);
            initMap.addEcologyInfoWindow(data.indeks);
        });
    });
}

function getCurrentCityWeather(cityID = 51115) {
    getRequest(config.API.currentCityWeatherLink + cityID).then(function (data) {
        window.originalCurrentCityWeatherEventData = JSON.stringify(data);
        let currentCityWeatherConditionsElements = document.querySelectorAll('.currentweather__container, .currentweather__container--title--heading, .currentweather__container--title--heading--time, #currentweather-temp, #currentweather-presure, #currentweather-wind, #currentweather-visibility, .error-message');
        let stationname = stationName || 'Ð‘Ð°Ð½Ñ˜Ð° Ð›ÑƒÐºÐ°';
        if (!data.message) {
            currentCityWeatherConditionsElements[0].style = 'background-image: url(' +
                config.MAP.iconsURL +
                data.marker.replace('bez_pojava/', 'currentmeteo-icons/') +
                ')';
            currentCityWeatherConditionsElements[1].innerText = stationname;
            currentCityWeatherConditionsElements[2].setAttribute('title', `ÐœÑ˜ÐµÑ€ÐµÐ½Ð¾ Ñƒ ${data.termin}`);
            currentCityWeatherConditionsElements[3].innerText = `${data.temperatura} °C`;
            currentCityWeatherConditionsElements[4].innerText = data.pritisak;
            currentCityWeatherConditionsElements[5].innerText = `${data.smjVje} ${data.brzVje}`;
            currentCityWeatherConditionsElements[6].innerText = data.vidljivost;
            currentCityWeatherConditionsElements[7].innerText = '';
        } else if (data.message) {
            currentCityWeatherConditionsElements[1].innerText = stationname;
            currentCityWeatherConditionsElements[3].innerText = '---';
            currentCityWeatherConditionsElements[4].innerText = '---';
            currentCityWeatherConditionsElements[5].innerText = '---';
            currentCityWeatherConditionsElements[6].innerText = '---';
            currentCityWeatherConditionsElements[7].innerText = data.message;
        }
    }).catch((err) => {
        console.log(err.message);
    });
}

var stationName = '';

function getCurrentCityMeteoId() {
    let currentCityLink = document.querySelectorAll('#currentCityWeather');
    for (let i = 0; i < currentCityLink.length; i++) {
        currentCityLink[i].addEventListener('click', function (event) {
            event.preventDefault();
            stationName = this.text;
            getCurrentCityWeather(this.dataset.cityid);
        });
    }
}

function getCurrentStations() {
    let currentStationsList = document.querySelector('#currentStationsList');
    getRequest(config.API.currentMeteoStations).then((data) => {
        data.MeteoMjerenja.forEach((station) => {
            let li = document.createElement('li'), a = document.createElement('a');
            a.setAttribute('href', '#');
            a.setAttribute('id', 'currentCityWeather');
            a.setAttribute('data-cityid', station.StationID);
            a.innerText = station.StationName;
            li.appendChild(a);
            currentStationsList.appendChild(li);
        });
        getCurrentCityMeteoId();
    });
}

function getCurrentStationNameById(stationID) {
    getRequest(config.API.currentMeteoStations).then((data) => {
        data.MeteoMjerenja.filter((station) => {
            if (station.StationID == stationID) {
                return station.StationName;
            }
        });
    });
}
function markerOnClick(description) {
    // console.log(description)
    $(".modal-body").html(description);
    $('#emptymodal').modal('show');
}
