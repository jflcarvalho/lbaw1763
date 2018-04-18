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
/******/ 	return __webpack_require__(__webpack_require__.s = 0);
/******/ })
/************************************************************************/
/******/ ([
/* 0 */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(1);
module.exports = __webpack_require__(5);


/***/ }),
/* 1 */
/***/ (function(module, exports, __webpack_require__) {


/**
 * First, we will load all of this project's Javascript utilities and other
 * dependencies. Then, we will be ready to develop a robust and powerful
 * application frontend using useful Laravel and JavaScript libraries.
 */

// require('./bootstrap');

// require('./navbar.js');
__webpack_require__(2);

__webpack_require__(3);

/***/ }),
/* 2 */
/***/ (function(module, exports) {

$(window).scroll(function () {
    var $heightScrolled = $(window).scrollTop();

    if ($heightScrolled > 30) {
        $('body > header.sticky-top').addClass("sticky-shadow");
    } else if ($heightScrolled <= 0) {
        $('body > header.sticky-top').removeClass("sticky-shadow");
    }
});

/***/ }),
/* 3 */
/***/ (function(module, exports, __webpack_require__) {

ajax = __webpack_require__(4);

function addEventListeners() {
    var logout = document.querySelector('.show-comments');
    if (logout != null) logout.addEventListener('click', sendCommentsRequest);
}

function sendCommentsRequest() {
    var message_id = document.querySelector('.answer-comments').getAttribute('data-message-id');
    var route = '/' + message_id + '/comments';
    console.log(route);

    ajax.sendAjaxRequest('get', route, {}, commentsHandler);
}

function commentsHandler() {
    if (this.statusCode != 200) {
        console.error("ERROR");
    }

    var response = JSON.parse(this.responseText);
    console.log("SHITEIHTIE");
}

function getCommentsHTML() {

    var paragraph = document.createElement("p");
    paragraph.class = "text-center mb-0 w-100";
    paragraph.innerHTML = "";

    var votes = document.createElement("div");
    votes.class = "col-1 my-auto text-center";
    votes.appendChild(paragraph);

    var content = document.createElement("p");
    content.class = "px-2";
    content.innerHTML = "";

    var author = document.createElement("p");
    author.class = "text-right discrete";
    author.innerHTML = "";

    var contentDiv = document.createElement("div");
    contentDiv.class = "col-11 my-1 pl-3";
    contentDiv.appendChild(content);
    contentDiv.appendChild(author);

    var forthDiv = document.createElement("div");
    forthDiv.class = "row mx-sm-0";

    ///////////

    var thirdDiv = document.createElement("div");
    thirdDiv.class = "d-flex list-group list-group-flush";

    var secondDiv = document.createElement("div");
    secondDiv.class = "card-footer comments-card";
    secondDiv.appendChild(thirdDiv);

    var firstDiv = document.createElement("div");
    firstDiv.class = "card-footer comments-card";
    firstDiv.appendChild(secondDiv);

    var comments = document.querySelector('.answer-comments');
    comments.appendChild(firstDiv);

    /*<div class="row mx-sm-0">
        <div class="col-1 my-auto text-center">
            <p class="text-center mb-0 w-100">3</p>
        </div>
        <div class="col-11 my-1 pl-3">
            <p class="px-2">lorem ipsum is a filler text commonly used to demonstrate the textual elements
                of a graphic document or visual presentation. Replacing content with
                placeholder text allows designers to design the form of the content before
                the content itself has been produced.</p>
            <p class="text-right discrete">
                AndreFCruz
            </p>
        </div>
    </div>*/
}

window.addEventListener('load', addEventListeners);

/***/ }),
/* 4 */
/***/ (function(module, exports) {

function encodeForAjax(data) {
    if (data == null) return null;
    return Object.keys(data).map(function (k) {
        return encodeURIComponent(k) + '=' + encodeURIComponent(data[k]);
    }).join('&');
}

function sendAjaxRequest(method, url, data, handler) {
    var request = new XMLHttpRequest();

    request.open(method, url, true);
    request.setRequestHeader('X-CSRF-TOKEN', document.querySelector('meta[name="csrf-token"]').content);
    request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    request.addEventListener('load', handler);
    request.send(encodeForAjax(data));
}

module.exports = {
    sendAjaxRequest: sendAjaxRequest
};

/***/ }),
/* 5 */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ })
/******/ ]);