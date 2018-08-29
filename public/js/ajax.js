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
/******/ 	return __webpack_require__(__webpack_require__.s = 365);
/******/ })
/************************************************************************/
/******/ ({

/***/ 365:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(366);


/***/ }),

/***/ 366:
/***/ (function(module, exports) {

// RENAME THIS TO ajax.js

$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        dataType: 'json',
        method: 'GET',
        url: '/getCart',
        success: function success(data) {
            var cart = data;
            $('.dropdown-menu').empty();
            $.each(data, function () {
                var nameKey = Object.keys(this)[1];
                var idKey = Object.keys(this)[0];
                var name = this[nameKey];
                var id = this[idKey];
                $('.dropdown-menu').append('<li>' + name + '</li><input type="button" onclick="removeItem(' + id + ')" class="btn btn-danger" name="removeItem" id="removeItem" value="Remove">');
            });
        }
    });

    $('#searchTerm').on('input', function () {
        var searchKeyword = $('#searchTerm').val();
        if (searchKeyword.length >= 1) {
            $.ajax({
                dataType: 'json',
                method: 'POST',
                url: '/raceSearch',
                data: { 'searchTerm': searchKeyword },
                success: function success(data) {
                    $('ul#content').empty();

                    $.each(data, function () {
                        $('ul#content').append('<li><a href="/races/' + this.raceID + '">' + this.raceName + '</a></li>');
                    });
                },
                error: function error(jqXHR, textStatus, errorThrown) {
                    // What to do if we fail
                    console.log(JSON.stringify(jqXHR));
                    console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
                }
            });
        } else if (searchKeyword.length <= 0) {
            $('ul#content').empty();
        }

        if (searchKeyword.length >= 1) {
            $('#initial-results').hide();
        } else {
            $('#initial-results').show();
        }
    });
});

/***/ })

/******/ });