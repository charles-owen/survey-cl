(function webpackUniversalModuleDefinition(root, factory) {
	if(typeof exports === 'object' && typeof module === 'object')
		module.exports = factory();
	else if(typeof define === 'function' && define.amd)
		define([], factory);
	else if(typeof exports === 'object')
		exports["Survey"] = factory();
	else
		root["Survey"] = factory();
})(window, function() {
return (window["webpackJsonp_name_"] = window["webpackJsonp_name_"] || []).push([["Survey"],{

/***/ "./vendor/cl/survey/index.js":
/*!***********************************!*\
  !*** ./vendor/cl/survey/index.js ***!
  \***********************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _js_Console_SurveyConsole__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./js/Console/SurveyConsole */ "./vendor/cl/survey/js/Console/SurveyConsole.js");
/**
 * @file
 * The main Survey system entry point
 */
//
// Install the console components
//


if (Site.Site.console !== undefined) {
  _js_Console_SurveyConsole__WEBPACK_IMPORTED_MODULE_0__["SurveyConsole"].setup(Site.Site.console);
}

/***/ }),

/***/ "./vendor/cl/survey/js/Console/SurveyConsole.js":
/*!******************************************************!*\
  !*** ./vendor/cl/survey/js/Console/SurveyConsole.js ***!
  \******************************************************/
/*! exports provided: SurveyConsole */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "SurveyConsole", function() { return SurveyConsole; });
/**
 * @file
 * Survey system console components
 */
var SurveyConsole = function SurveyConsole() {};

SurveyConsole.setup = function (Console) {
  Console.tables.add({
    title: 'Survey',
    order: 17,
    api: '/api/survey/tables'
  });
};

/***/ })

},[["./vendor/cl/survey/index.js","runtime"]]]);
});
//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly9bbmFtZV0vd2VicGFjay91bml2ZXJzYWxNb2R1bGVEZWZpbml0aW9uIiwid2VicGFjazovL1tuYW1lXS8uL3ZlbmRvci9jbC9zdXJ2ZXkvaW5kZXguanMiLCJ3ZWJwYWNrOi8vW25hbWVdLy4vdmVuZG9yL2NsL3N1cnZleS9qcy9Db25zb2xlL1N1cnZleUNvbnNvbGUuanMiXSwibmFtZXMiOlsiU2l0ZSIsImNvbnNvbGUiLCJ1bmRlZmluZWQiLCJTdXJ2ZXlDb25zb2xlIiwic2V0dXAiLCJDb25zb2xlIiwidGFibGVzIiwiYWRkIiwidGl0bGUiLCJvcmRlciIsImFwaSJdLCJtYXBwaW5ncyI6IkFBQUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0EsQ0FBQztBQUNELE87Ozs7Ozs7Ozs7QUNWQTtBQUFBO0FBQUE7Ozs7QUFLQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQSxJQUFHQSxJQUFJLENBQUNBLElBQUwsQ0FBVUMsT0FBVixLQUFzQkMsU0FBekIsRUFBb0M7QUFDbkNDLEVBQUEsdUVBQWEsQ0FBQ0MsS0FBZCxDQUFvQkosSUFBSSxDQUFDQSxJQUFMLENBQVVDLE9BQTlCO0FBQ0EsQzs7Ozs7Ozs7Ozs7O0FDWkQ7QUFBQTtBQUFBOzs7O0FBS08sSUFBSUUsYUFBYSxHQUFHLFNBQWhCQSxhQUFnQixHQUFXLENBQ3JDLENBRE07O0FBR1BBLGFBQWEsQ0FBQ0MsS0FBZCxHQUFzQixVQUFTQyxPQUFULEVBQWtCO0FBQ3BDQSxTQUFPLENBQUNDLE1BQVIsQ0FBZUMsR0FBZixDQUFtQjtBQUNmQyxTQUFLLEVBQUUsUUFEUTtBQUVmQyxTQUFLLEVBQUUsRUFGUTtBQUdmQyxPQUFHLEVBQUU7QUFIVSxHQUFuQjtBQUtILENBTkQsQyIsImZpbGUiOiJzdXJ2ZXkuanMiLCJzb3VyY2VzQ29udGVudCI6WyIoZnVuY3Rpb24gd2VicGFja1VuaXZlcnNhbE1vZHVsZURlZmluaXRpb24ocm9vdCwgZmFjdG9yeSkge1xuXHRpZih0eXBlb2YgZXhwb3J0cyA9PT0gJ29iamVjdCcgJiYgdHlwZW9mIG1vZHVsZSA9PT0gJ29iamVjdCcpXG5cdFx0bW9kdWxlLmV4cG9ydHMgPSBmYWN0b3J5KCk7XG5cdGVsc2UgaWYodHlwZW9mIGRlZmluZSA9PT0gJ2Z1bmN0aW9uJyAmJiBkZWZpbmUuYW1kKVxuXHRcdGRlZmluZShbXSwgZmFjdG9yeSk7XG5cdGVsc2UgaWYodHlwZW9mIGV4cG9ydHMgPT09ICdvYmplY3QnKVxuXHRcdGV4cG9ydHNbXCJTdXJ2ZXlcIl0gPSBmYWN0b3J5KCk7XG5cdGVsc2Vcblx0XHRyb290W1wiU3VydmV5XCJdID0gZmFjdG9yeSgpO1xufSkod2luZG93LCBmdW5jdGlvbigpIHtcbnJldHVybiAiLCIvKipcclxuICogQGZpbGVcclxuICogVGhlIG1haW4gU3VydmV5IHN5c3RlbSBlbnRyeSBwb2ludFxyXG4gKi9cclxuXHJcbi8vXHJcbi8vIEluc3RhbGwgdGhlIGNvbnNvbGUgY29tcG9uZW50c1xyXG4vL1xyXG5pbXBvcnQge1N1cnZleUNvbnNvbGV9IGZyb20gJy4vanMvQ29uc29sZS9TdXJ2ZXlDb25zb2xlJztcclxuXHJcbmlmKFNpdGUuU2l0ZS5jb25zb2xlICE9PSB1bmRlZmluZWQpIHtcclxuXHRTdXJ2ZXlDb25zb2xlLnNldHVwKFNpdGUuU2l0ZS5jb25zb2xlKTtcclxufVxyXG4iLCIvKipcclxuICogQGZpbGVcclxuICogU3VydmV5IHN5c3RlbSBjb25zb2xlIGNvbXBvbmVudHNcclxuICovXHJcblxyXG5leHBvcnQgbGV0IFN1cnZleUNvbnNvbGUgPSBmdW5jdGlvbigpIHtcclxufVxyXG5cclxuU3VydmV5Q29uc29sZS5zZXR1cCA9IGZ1bmN0aW9uKENvbnNvbGUpIHtcclxuICAgIENvbnNvbGUudGFibGVzLmFkZCh7XHJcbiAgICAgICAgdGl0bGU6ICdTdXJ2ZXknLFxyXG4gICAgICAgIG9yZGVyOiAxNyxcclxuICAgICAgICBhcGk6ICcvYXBpL3N1cnZleS90YWJsZXMnXHJcbiAgICB9KTtcclxufVxyXG5cclxuIl0sInNvdXJjZVJvb3QiOiIifQ==