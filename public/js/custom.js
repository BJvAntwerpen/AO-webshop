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
/******/ 	__webpack_require__.p = "/";
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 44);
/******/ })
/************************************************************************/
/******/ ({

/***/ 44:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(45);


/***/ }),

/***/ 45:
/***/ (function(module, exports) {

var cartModule = function () {
	var url, newUrl, productId;

	var init = function () {
		//init function to add eventListeners to [input] when url has 'cart' in it
		if (location.href.includes('cart')) {
			var inputs = document.querySelectorAll('input[type=number]');
			for (var i = 0; i < inputs.length; i++) {
				console.log(inputs[i]);
				inputs[i].addEventListener('change', function () {
					createUrl(this);
				});
			}
		}
	}();

	var createUrl = function createUrl(input) {
		url = location.href;
		url = splitUrl(url);
		productId = getProductId(input); //string
		inputValue = getInputValue(input); //string

		newUrl = url[0] + '/'; //set http:/

		for (var i = 1; i < url.length - 1; i++) {
			// loop through url array and add to newUrl with a '/' (except 'cart')
			newUrl += url[i] + '/';
		}

		if (inputValue != 0) {
			newUrl += 'updateCart?product_id=' + productId + '&new_quantity=' + inputValue;
		} else {
			newUrl += 'deleteItem?product_id=' + productId;
		}

		setUrl(newUrl);
	};

	var splitUrl = function splitUrl(url) {
		url = url.split('/');
		console.log(url);
		return url;
	};

	var setUrl = function setUrl(url) {
		console.log(url);
		location.href = url;
	};

	var getProductId = function getProductId(input) {
		var productId = input.className.substr(2, 1);
		console.log(productId);
		return productId;
	};

	var getInputValue = function getInputValue(input) {
		var inputValue = input.value;
		console.log(inputValue);
		return inputValue;
	};
}();

/***/ })

/******/ });