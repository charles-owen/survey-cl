"use strict";
(self["webpackChunkcse335"] = self["webpackChunkcse335"] || []).push([["Survey"],{

/***/ "./vendor/cl/survey/index.js":
/*!***********************************!*\
  !*** ./vendor/cl/survey/index.js ***!
  \***********************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

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
  _js_Console_SurveyConsole__WEBPACK_IMPORTED_MODULE_0__.SurveyConsole.setup(Site.Site.console);
}

/***/ }),

/***/ "./vendor/cl/survey/js/Console/SurveyConsole.js":
/*!******************************************************!*\
  !*** ./vendor/cl/survey/js/Console/SurveyConsole.js ***!
  \******************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   SurveyConsole: () => (/* binding */ SurveyConsole)
/* harmony export */ });
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

},
/******/ __webpack_require__ => { // webpackRuntimeModules
/******/ var __webpack_exec__ = (moduleId) => (__webpack_require__(__webpack_require__.s = moduleId))
/******/ __webpack_require__.O(0, ["vendor","Course","Users","common"], () => (__webpack_exec__("./vendor/cl/survey/index.js")));
/******/ var __webpack_exports__ = __webpack_require__.O();
/******/ }
]);
//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoic3VydmV5LmRldi5qcyIsIm1hcHBpbmdzIjoiOzs7Ozs7Ozs7OztBQUFBO0FBQ0E7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUN5RDtBQUV6RCxJQUFHQyxJQUFJLENBQUNBLElBQUksQ0FBQ0MsT0FBTyxLQUFLQyxTQUFTLEVBQUU7RUFDbkNILG9FQUFhLENBQUNJLEtBQUssQ0FBQ0gsSUFBSSxDQUFDQSxJQUFJLENBQUNDLE9BQU8sQ0FBQztBQUN2Qzs7Ozs7Ozs7Ozs7Ozs7QUNaQTtBQUNBO0FBQ0E7QUFDQTs7QUFFTyxJQUFJRixhQUFhLEdBQUcsU0FBaEJBLGFBQWFBLENBQUEsRUFBYyxDQUN0QyxDQUFDO0FBRURBLGFBQWEsQ0FBQ0ksS0FBSyxHQUFHLFVBQVNDLE9BQU8sRUFBRTtFQUNwQ0EsT0FBTyxDQUFDQyxNQUFNLENBQUNDLEdBQUcsQ0FBQztJQUNmQyxLQUFLLEVBQUUsUUFBUTtJQUNmQyxLQUFLLEVBQUUsRUFBRTtJQUNUQyxHQUFHLEVBQUU7RUFDVCxDQUFDLENBQUM7QUFDTixDQUFDIiwic291cmNlcyI6WyJ3ZWJwYWNrOi8vY3NlMzM1Ly4vdmVuZG9yL2NsL3N1cnZleS9pbmRleC5qcyIsIndlYnBhY2s6Ly9jc2UzMzUvLi92ZW5kb3IvY2wvc3VydmV5L2pzL0NvbnNvbGUvU3VydmV5Q29uc29sZS5qcyJdLCJzb3VyY2VzQ29udGVudCI6WyIvKipcbiAqIEBmaWxlXG4gKiBUaGUgbWFpbiBTdXJ2ZXkgc3lzdGVtIGVudHJ5IHBvaW50XG4gKi9cblxuLy9cbi8vIEluc3RhbGwgdGhlIGNvbnNvbGUgY29tcG9uZW50c1xuLy9cbmltcG9ydCB7U3VydmV5Q29uc29sZX0gZnJvbSAnLi9qcy9Db25zb2xlL1N1cnZleUNvbnNvbGUnO1xuXG5pZihTaXRlLlNpdGUuY29uc29sZSAhPT0gdW5kZWZpbmVkKSB7XG5cdFN1cnZleUNvbnNvbGUuc2V0dXAoU2l0ZS5TaXRlLmNvbnNvbGUpO1xufVxuIiwiLyoqXG4gKiBAZmlsZVxuICogU3VydmV5IHN5c3RlbSBjb25zb2xlIGNvbXBvbmVudHNcbiAqL1xuXG5leHBvcnQgbGV0IFN1cnZleUNvbnNvbGUgPSBmdW5jdGlvbigpIHtcbn1cblxuU3VydmV5Q29uc29sZS5zZXR1cCA9IGZ1bmN0aW9uKENvbnNvbGUpIHtcbiAgICBDb25zb2xlLnRhYmxlcy5hZGQoe1xuICAgICAgICB0aXRsZTogJ1N1cnZleScsXG4gICAgICAgIG9yZGVyOiA4MCxcbiAgICAgICAgYXBpOiAnL2FwaS9zdXJ2ZXkvdGFibGVzJ1xuICAgIH0pO1xufVxuXG4iXSwibmFtZXMiOlsiU3VydmV5Q29uc29sZSIsIlNpdGUiLCJjb25zb2xlIiwidW5kZWZpbmVkIiwic2V0dXAiLCJDb25zb2xlIiwidGFibGVzIiwiYWRkIiwidGl0bGUiLCJvcmRlciIsImFwaSJdLCJzb3VyY2VSb290IjoiIn0=