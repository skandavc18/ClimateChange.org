var done = function () { };
function getMinZoom() {
    var width = window.innerHeight;
    return Math.ceil(Math.LOG2E * Math.log(width / 256));
}
var initialZoom = getMinZoom();
var Bern = ol.proj.fromLonLat([8.29, 47.42]);
var Bangalore = ol.proj.fromLonLat([77.26, 12.05]);
var Chennai = ol.proj.fromLonLat([80.27, 13.66]);
var Delhi = ol.proj.fromLonLat([77.10, 28.13]);
var NewYork = ol.proj.fromLonLat([-74.00, 40.99]);
var Mumbai = ol.proj.fromLonLat([72.87, 18.48]);
var Singapore = ol.proj.fromLonLat([103.81, 0.8]);
var Moscow = ol.proj.fromLonLat([37.61, 55.45]);
var Tokyo = ol.proj.fromLonLat([139.69, 35.17]);
var Shanghai = ol.proj.fromLonLat([121.47, 31.35]);
var Surat = ol.proj.fromLonLat([72.83, 21.7]);
var Kolkata = ol.proj.fromLonLat([88.36, 23.31]);
var Canberra = ol.proj.fromLonLat([149.13, -36.17]);
var Paris = ol.proj.fromLonLat([2.35, 49.03]);
var Berlin = ol.proj.fromLonLat([13.40, 52.24]);
var view = new ol.View({
    center: ol.proj.fromLonLat([37.41, 8.82]),
    zoom: initialZoom + 2,
    minZoom: initialZoom
});

var map = new ol.Map({
    target: 'map',
    layers: [
        new ol.layer.Tile({
            source: new ol.source.OSM()
        })
    ],
    loadTilesWhileAnimating: true,
    view: view
});
function CenterMap(long, lat) {
    console.log("Long: " + long + " Lat: " + lat);
    map.getView().setCenter(ol.proj.transform([long, lat], 'EPSG:4326', 'EPSG:3857'));
}
CenterMap(77.5946, 12.9716);
map.on('click', function (evt) {
    var coord = map.getCoordinateFromPixel(evt.pixel);
    var newpos = ol.proj.transform(coord, 'EPSG:900913', 'EPSG:4326');
    alert(newpos);
});
function onClick(id, callback) {
    document.getElementById(id).addEventListener('click', callback);
}
function flyTo(location, done) {
    var duration = 2000;
    var zoom = view.getZoom();
    var parts = 2;
    var called = false;

    function callback(complete) {
        --parts;
        if (called) {
            return;
        }
        if (parts === 0 || !complete) {
            called = true;
            done(complete);
        }
    }
    view.animate({
        center: location,
        duration: duration
    }, callback);
    view.animate({
        zoom: zoom - 1,
        duration: duration / 2
    }, {
            zoom: zoom,
            duration: duration / 2
        }, callback);
}

onClick('fly-to-bern', function () {
    flyTo(Bern, function () { });
});
onClick('fly-to-bangalore', function () {
    flyTo(Bangalore, function () { });
});
