/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, {
/******/ 				configurable: false,
/******/ 				enumerable: true,
/******/ 				get: getter
/******/ 			});
/******/ 		}
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "";
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 220);
/******/ })
/************************************************************************/
/******/ ({

/***/ 220:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(221);


/***/ }),

/***/ 221:
/***/ (function(module, exports) {

window.initMap = function () {
    var coords;
    var infoWindow = new google.maps.InfoWindow();
    var center = { lat: 53.270722, lng: -1.820286 };
    var map = new google.maps.Map(document.getElementById('mtbMap'), {
        zoom: 6,
        center: center,
        styles: [{ "featureType": "landscape", "stylers": [{ "hue": "#FFA800" }, { "saturation": 0 }, { "lightness": 0 }, { "gamma": 1 }] }, { "featureType": "road.highway", "stylers": [{ "hue": "#53FF00" }, { "saturation": -73 }, { "lightness": 40 }, { "gamma": 1 }] }, { "featureType": "road.arterial", "stylers": [{ "hue": "#FBFF00" }, { "saturation": 0 }, { "lightness": 0 }, { "gamma": 1 }] }, { "featureType": "road.local", "stylers": [{ "hue": "#00FFFD" }, { "saturation": 0 }, { "lightness": 30 }, { "gamma": 1 }] }, { "featureType": "water", "stylers": [{ "hue": "#00BFFF" }, { "saturation": 6 }, { "lightness": 8 }, { "gamma": 1 }] }, { "featureType": "poi", "stylers": [{ "hue": "#679714" }, { "saturation": 33.4 }, { "lightness": -25.4 }, { "gamma": 1 }] }]
    });
    google.maps.event.trigger(map, 'resize');

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        dataType: 'json',
        method: 'GET',
        url: '/mtbRaces',
        success: function success(data) {
            for (var i = 0; i < data.length; i++) {
                coords = ConvertToLatLng(data[i].raceCoordinates);

                var marker = new google.maps.Marker({
                    position: coords,
                    map: map,
                    title: data[i].raceName
                });
                var content = '<a href="races/' + data[i].id + '">More Information</a>';

                google.maps.event.addListener(marker, 'click', function (marker, content, infoWindow) {
                    return function () {
                        infoWindow.setContent(content);
                        infoWindow.open(map, marker);
                    };
                }(marker, content, infoWindow));
            }
            // console.log(data);
        }
    });

    var coordsRoad;
    var infoWindowRoad = new google.maps.InfoWindow();
    var mapRoad = new google.maps.Map(document.getElementById('roadMap'), {
        zoom: 6,
        center: center,
        styles: [{ "featureType": "landscape", "stylers": [{ "hue": "#FFA800" }, { "saturation": 0 }, { "lightness": 0 }, { "gamma": 1 }] }, { "featureType": "road.highway", "stylers": [{ "hue": "#53FF00" }, { "saturation": -73 }, { "lightness": 40 }, { "gamma": 1 }] }, { "featureType": "road.arterial", "stylers": [{ "hue": "#FBFF00" }, { "saturation": 0 }, { "lightness": 0 }, { "gamma": 1 }] }, { "featureType": "road.local", "stylers": [{ "hue": "#00FFFD" }, { "saturation": 0 }, { "lightness": 30 }, { "gamma": 1 }] }, { "featureType": "water", "stylers": [{ "hue": "#00BFFF" }, { "saturation": 6 }, { "lightness": 8 }, { "gamma": 1 }] }, { "featureType": "poi", "stylers": [{ "hue": "#679714" }, { "saturation": 33.4 }, { "lightness": -25.4 }, { "gamma": 1 }] }]
    });

    google.maps.event.trigger(mapRoad, 'resize');

    $.ajax({
        dataType: 'json',
        method: 'GET',
        url: '/roadRaces',
        success: function success(data) {
            for (var i = 0; i < data.length; i++) {
                coordsRoad = ConvertToLatLng(data[i].raceCoordinates);

                var markerRoad = new google.maps.Marker({
                    position: coordsRoad,
                    map: mapRoad,
                    title: data[i].raceName
                });
                var contentRoad = '<a href="races/' + data[i].id + '">More Information</a>';

                google.maps.event.addListener(markerRoad, 'click', function (markerRoad, contentRoad, infoWindowRoad) {
                    return function () {
                        infoWindow.setContent(contentRoad);
                        infoWindow.open(mapRoad, markerRoad);
                    };
                }(markerRoad, contentRoad, infoWindowRoad));
            }
            // console.log(data);
        }
    });
};

function ConvertToLatLng(coords) {
    var latLng = coords.split(/, ?/);
    return new google.maps.LatLng(parseFloat(latLng[0]), parseFloat(latLng[1]));
}

/***/ })

/******/ });