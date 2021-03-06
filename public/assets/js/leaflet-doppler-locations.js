(function($) {
    'use strict';
    
    $(document).ready(function(){
        // Locations requires data generated by shortcode
        var map = L.map('leaflet-map', { dragging: !L.Browser.mobile, tap: false, zoomControl: false }).setView([33.5641086, -112.1946049], 10);
        map.scrollWheelZoom.disable();
        L.tileLayer('https://cartodb-basemaps-{s}.global.ssl.fastly.net/light_all/{z}/{x}/{y}.png', { maxZoom: 18 }).addTo(map);

        // Icon options
        var icon = L.icon({ iconUrl: path + 'img/marker-icon.png', shadowUrl: path + 'img/marker-shadow.png', iconSize: [25, 41], shadowSize: [41, 41], iconAnchor: [13, 41], shadowAnchor: [13, 41], popupAnchor: [0, -41] });

        // Loop through each locations and create a pin and popup
        var group = new L.featureGroup([]);
        locations.forEach(function(value){
            var name = value['display_name'];
            var address = value['address'];
            var phone = value['phone'];
            var link = value['link'];
            var geo = value['geo'];

            // Add icon if geo coordinates exist
            if (geo != null) {
                var marker = L.marker(geo, { icon: icon }).addTo(group);
                marker.bindPopup(
                    '<ul>' +
                        '<li class="title">'+ name + '</li>' +
                        '<li class="address">'+ address + '</li>' +
                        '<li class="phone">'+ phone + '</li>' +
                        '<li class="link"><a href="'+ link + '">View Location</a></li>' +
                    '</ul>'
                );
            }
            else console.log('Locations "' + name + '" is missing custom field "geo": ' + url);
        });

        // zoom settings
        group.addTo(map);
        map.fitBounds(group.getBounds(), { padding: [16, 16], maxZoom: 16 });
        L.control.zoom({ position:'bottomright' }).addTo(map);
    });
})(jQuery);