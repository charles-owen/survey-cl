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
    order: 80,
    api: '/api/survey/tables'
  });
};

/***/ })

},[["./vendor/cl/survey/index.js","runtime"]]]);
});
//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly9bbmFtZV0vd2VicGFjay91bml2ZXJzYWxNb2R1bGVEZWZpbml0aW9uIiwid2VicGFjazovL1tuYW1lXS8uL3ZlbmRvci9jbC9zdXJ2ZXkvaW5kZXguanMiLCJ3ZWJwYWNrOi8vW25hbWVdLy4vdmVuZG9yL2NsL3N1cnZleS9qcy9Db25zb2xlL1N1cnZleUNvbnNvbGUuanMiXSwibmFtZXMiOlsiU2l0ZSIsImNvbnNvbGUiLCJ1bmRlZmluZWQiLCJTdXJ2ZXlDb25zb2xlIiwic2V0dXAiLCJDb25zb2xlIiwidGFibGVzIiwiYWRkIiwidGl0bGUiLCJvcmRlciIsImFwaSJdLCJtYXBwaW5ncyI6IkFBQUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0EsQ0FBQztBQUNELE87Ozs7Ozs7Ozs7QUNWQTtBQUFBO0FBQUE7Ozs7QUFLQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQSxJQUFHQSxJQUFJLENBQUNBLElBQUwsQ0FBVUMsT0FBVixLQUFzQkMsU0FBekIsRUFBb0M7QUFDbkNDLHlFQUFhLENBQUNDLEtBQWQsQ0FBb0JKLElBQUksQ0FBQ0EsSUFBTCxDQUFVQyxPQUE5QjtBQUNBLEM7Ozs7Ozs7Ozs7OztBQ1pEO0FBQUE7QUFBQTs7OztBQUtPLElBQUlFLGFBQWEsR0FBRyxTQUFoQkEsYUFBZ0IsR0FBVyxDQUNyQyxDQURNOztBQUdQQSxhQUFhLENBQUNDLEtBQWQsR0FBc0IsVUFBU0MsT0FBVCxFQUFrQjtBQUNwQ0EsU0FBTyxDQUFDQyxNQUFSLENBQWVDLEdBQWYsQ0FBbUI7QUFDZkMsU0FBSyxFQUFFLFFBRFE7QUFFZkMsU0FBSyxFQUFFLEVBRlE7QUFHZkMsT0FBRyxFQUFFO0FBSFUsR0FBbkI7QUFLSCxDQU5ELEMiLCJmaWxlIjoic3VydmV5LmpzIiwic291cmNlc0NvbnRlbnQiOlsiKGZ1bmN0aW9uIHdlYnBhY2tVbml2ZXJzYWxNb2R1bGVEZWZpbml0aW9uKHJvb3QsIGZhY3RvcnkpIHtcblx0aWYodHlwZW9mIGV4cG9ydHMgPT09ICdvYmplY3QnICYmIHR5cGVvZiBtb2R1bGUgPT09ICdvYmplY3QnKVxuXHRcdG1vZHVsZS5leHBvcnRzID0gZmFjdG9yeSgpO1xuXHRlbHNlIGlmKHR5cGVvZiBkZWZpbmUgPT09ICdmdW5jdGlvbicgJiYgZGVmaW5lLmFtZClcblx0XHRkZWZpbmUoW10sIGZhY3RvcnkpO1xuXHRlbHNlIGlmKHR5cGVvZiBleHBvcnRzID09PSAnb2JqZWN0Jylcblx0XHRleHBvcnRzW1wiU3VydmV5XCJdID0gZmFjdG9yeSgpO1xuXHRlbHNlXG5cdFx0cm9vdFtcIlN1cnZleVwiXSA9IGZhY3RvcnkoKTtcbn0pKHdpbmRvdywgZnVuY3Rpb24oKSB7XG5yZXR1cm4gIiwiLyoqXHJcbiAqIEBmaWxlXHJcbiAqIFRoZSBtYWluIFN1cnZleSBzeXN0ZW0gZW50cnkgcG9pbnRcclxuICovXHJcblxyXG4vL1xyXG4vLyBJbnN0YWxsIHRoZSBjb25zb2xlIGNvbXBvbmVudHNcclxuLy9cclxuaW1wb3J0IHtTdXJ2ZXlDb25zb2xlfSBmcm9tICcuL2pzL0NvbnNvbGUvU3VydmV5Q29uc29sZSc7XHJcblxyXG5pZihTaXRlLlNpdGUuY29uc29sZSAhPT0gdW5kZWZpbmVkKSB7XHJcblx0U3VydmV5Q29uc29sZS5zZXR1cChTaXRlLlNpdGUuY29uc29sZSk7XHJcbn1cclxuIiwiLyoqXHJcbiAqIEBmaWxlXHJcbiAqIFN1cnZleSBzeXN0ZW0gY29uc29sZSBjb21wb25lbnRzXHJcbiAqL1xyXG5cclxuZXhwb3J0IGxldCBTdXJ2ZXlDb25zb2xlID0gZnVuY3Rpb24oKSB7XHJcbn1cclxuXHJcblN1cnZleUNvbnNvbGUuc2V0dXAgPSBmdW5jdGlvbihDb25zb2xlKSB7XHJcbiAgICBDb25zb2xlLnRhYmxlcy5hZGQoe1xyXG4gICAgICAgIHRpdGxlOiAnU3VydmV5JyxcclxuICAgICAgICBvcmRlcjogODAsXHJcbiAgICAgICAgYXBpOiAnL2FwaS9zdXJ2ZXkvdGFibGVzJ1xyXG4gICAgfSk7XHJcbn1cclxuXHJcbiJdLCJzb3VyY2VSb290IjoiIn0=