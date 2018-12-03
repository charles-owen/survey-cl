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


if (Site.Console !== undefined) {
  _js_Console_SurveyConsole__WEBPACK_IMPORTED_MODULE_0__["SurveyConsole"].setup(Site.Console);
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
//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly9bbmFtZV0vd2VicGFjay91bml2ZXJzYWxNb2R1bGVEZWZpbml0aW9uIiwid2VicGFjazovL1tuYW1lXS8uL3ZlbmRvci9jbC9zdXJ2ZXkvaW5kZXguanMiLCJ3ZWJwYWNrOi8vW25hbWVdLy4vdmVuZG9yL2NsL3N1cnZleS9qcy9Db25zb2xlL1N1cnZleUNvbnNvbGUuanMiXSwibmFtZXMiOlsiU2l0ZSIsIkNvbnNvbGUiLCJ1bmRlZmluZWQiLCJTdXJ2ZXlDb25zb2xlIiwic2V0dXAiLCJ0YWJsZXMiLCJhZGQiLCJ0aXRsZSIsIm9yZGVyIiwiYXBpIl0sIm1hcHBpbmdzIjoiQUFBQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQSxDQUFDO0FBQ0QsTzs7Ozs7Ozs7OztBQ1ZBO0FBQUE7QUFBQTs7OztBQUtBO0FBQ0E7QUFDQTtBQUNBOztBQUVBLElBQUdBLElBQUksQ0FBQ0MsT0FBTCxLQUFpQkMsU0FBcEIsRUFBK0I7QUFDOUJDLEVBQUEsdUVBQWEsQ0FBQ0MsS0FBZCxDQUFvQkosSUFBSSxDQUFDQyxPQUF6QjtBQUNBLEM7Ozs7Ozs7Ozs7OztBQ1pEO0FBQUE7QUFBQTs7OztBQUtPLElBQUlFLGFBQWEsR0FBRyxTQUFoQkEsYUFBZ0IsR0FBVyxDQUNyQyxDQURNOztBQUdQQSxhQUFhLENBQUNDLEtBQWQsR0FBc0IsVUFBU0gsT0FBVCxFQUFrQjtBQUNwQ0EsU0FBTyxDQUFDSSxNQUFSLENBQWVDLEdBQWYsQ0FBbUI7QUFDZkMsU0FBSyxFQUFFLFFBRFE7QUFFZkMsU0FBSyxFQUFFLEVBRlE7QUFHZkMsT0FBRyxFQUFFO0FBSFUsR0FBbkI7QUFLSCxDQU5ELEMiLCJmaWxlIjoic3VydmV5LmpzIiwic291cmNlc0NvbnRlbnQiOlsiKGZ1bmN0aW9uIHdlYnBhY2tVbml2ZXJzYWxNb2R1bGVEZWZpbml0aW9uKHJvb3QsIGZhY3RvcnkpIHtcblx0aWYodHlwZW9mIGV4cG9ydHMgPT09ICdvYmplY3QnICYmIHR5cGVvZiBtb2R1bGUgPT09ICdvYmplY3QnKVxuXHRcdG1vZHVsZS5leHBvcnRzID0gZmFjdG9yeSgpO1xuXHRlbHNlIGlmKHR5cGVvZiBkZWZpbmUgPT09ICdmdW5jdGlvbicgJiYgZGVmaW5lLmFtZClcblx0XHRkZWZpbmUoW10sIGZhY3RvcnkpO1xuXHRlbHNlIGlmKHR5cGVvZiBleHBvcnRzID09PSAnb2JqZWN0Jylcblx0XHRleHBvcnRzW1wiU3VydmV5XCJdID0gZmFjdG9yeSgpO1xuXHRlbHNlXG5cdFx0cm9vdFtcIlN1cnZleVwiXSA9IGZhY3RvcnkoKTtcbn0pKHdpbmRvdywgZnVuY3Rpb24oKSB7XG5yZXR1cm4gIiwiLyoqXHJcbiAqIEBmaWxlXHJcbiAqIFRoZSBtYWluIFN1cnZleSBzeXN0ZW0gZW50cnkgcG9pbnRcclxuICovXHJcblxyXG4vL1xyXG4vLyBJbnN0YWxsIHRoZSBjb25zb2xlIGNvbXBvbmVudHNcclxuLy9cclxuaW1wb3J0IHtTdXJ2ZXlDb25zb2xlfSBmcm9tICcuL2pzL0NvbnNvbGUvU3VydmV5Q29uc29sZSc7XHJcblxyXG5pZihTaXRlLkNvbnNvbGUgIT09IHVuZGVmaW5lZCkge1xyXG5cdFN1cnZleUNvbnNvbGUuc2V0dXAoU2l0ZS5Db25zb2xlKTtcclxufVxyXG4iLCIvKipcclxuICogQGZpbGVcclxuICogU3VydmV5IHN5c3RlbSBjb25zb2xlIGNvbXBvbmVudHNcclxuICovXHJcblxyXG5leHBvcnQgbGV0IFN1cnZleUNvbnNvbGUgPSBmdW5jdGlvbigpIHtcclxufVxyXG5cclxuU3VydmV5Q29uc29sZS5zZXR1cCA9IGZ1bmN0aW9uKENvbnNvbGUpIHtcclxuICAgIENvbnNvbGUudGFibGVzLmFkZCh7XHJcbiAgICAgICAgdGl0bGU6ICdTdXJ2ZXknLFxyXG4gICAgICAgIG9yZGVyOiAxNyxcclxuICAgICAgICBhcGk6ICcvYXBpL3N1cnZleS90YWJsZXMnXHJcbiAgICB9KTtcclxufVxyXG5cclxuIl0sInNvdXJjZVJvb3QiOiIifQ==