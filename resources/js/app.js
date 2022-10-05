import './bootstrap';

import axios from "axios";

window.axios = axios;


var LeafLeatGoogle = {
    MarkerWithLabel: function (opt_options) {
        this.marker = {};
        iconDivSet = false;
        this.map = opt_options.map;
        this.position = opt_options.position;
        this.marker.className = opt_options.className;
        if (opt_options.labelContent) {
            this.marker.alt = opt_options.labelContent;
            this.marker.title = opt_options.labelContent;
        } else {
            this.marker.alt = opt_options.className;
            this.marker.title = opt_options.className;
        }
        if (opt_options.htmlIcon == true) {
            var iconFile = L.divIcon({
                className: opt_options.labelClass + '-parent',
                html: '<img class="' + opt_options.labelClass + '-image" src="' + opt_options.icon + '"/>' +
                    '<span class="' + opt_options.labelClass + '-text">' + opt_options.labelContent + '</span>'
            });
            iconDivSet = true;
            this.marker.icon = iconFile;
        }
        if (opt_options.icon != '' && opt_options.icon != null && iconDivSet == false) {
            var iconFile = L.icon({iconUrl: opt_options.icon, shadowUrl: opt_options.icon,});
            if (opt_options.iconSize) {
                iconFile.iconSize = opt_options.iconSize;
                iconFile.shadowSize = opt_options.iconSize;
            }
            this.marker.icon = iconFile;
        }
        if (opt_options.name) {
            this.marker.name = opt_options.name;
        }
        if (opt_options.dataid) {
            this.marker.dataid = opt_options.dataid;
        }
        added_marker = L.marker([this.position.lat, this.position.lng], this.marker).addTo(this.map);
        this.map_marker = added_marker;
    }, LatLng: function (lat, lng) {
        this.lat = lat;
        this.lng = lng;
    }, InfoWindow: function () {
        this.setContent = function (marker, contnentStr) {
            marker.map_marker.bindPopup(contnentStr).openPopup();
        }
    }, GooglePoint: function (lat, lng) {
    }, open: function (map, data) {
        return true;
    }
}
