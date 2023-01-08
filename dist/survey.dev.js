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
/* harmony export */   "SurveyConsole": () => (/* binding */ SurveyConsole)
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
//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoic3VydmV5LmRldi5qcyIsIm1hcHBpbmdzIjoiOzs7Ozs7Ozs7OztBQUFBO0FBQ0E7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUN5RDtBQUV6RCxJQUFHQyxJQUFJLENBQUNBLElBQUksQ0FBQ0MsT0FBTyxLQUFLQyxTQUFTLEVBQUU7RUFDbkNILDBFQUFtQixDQUFDQyxJQUFJLENBQUNBLElBQUksQ0FBQ0MsT0FBTyxDQUFDO0FBQ3ZDOzs7Ozs7Ozs7Ozs7OztBQ1pBO0FBQ0E7QUFDQTtBQUNBOztBQUVPLElBQUlGLGFBQWEsR0FBRyxTQUFoQkEsYUFBYSxHQUFjLENBQ3RDLENBQUM7QUFFREEsYUFBYSxDQUFDSSxLQUFLLEdBQUcsVUFBU0MsT0FBTyxFQUFFO0VBQ3BDQSxPQUFPLENBQUNDLE1BQU0sQ0FBQ0MsR0FBRyxDQUFDO0lBQ2ZDLEtBQUssRUFBRSxRQUFRO0lBQ2ZDLEtBQUssRUFBRSxFQUFFO0lBQ1RDLEdBQUcsRUFBRTtFQUNULENBQUMsQ0FBQztBQUNOLENBQUMiLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly9jc2UzMzUvLi92ZW5kb3IvY2wvc3VydmV5L2luZGV4LmpzIiwid2VicGFjazovL2NzZTMzNS8uL3ZlbmRvci9jbC9zdXJ2ZXkvanMvQ29uc29sZS9TdXJ2ZXlDb25zb2xlLmpzIl0sInNvdXJjZXNDb250ZW50IjpbIi8qKlxuICogQGZpbGVcbiAqIFRoZSBtYWluIFN1cnZleSBzeXN0ZW0gZW50cnkgcG9pbnRcbiAqL1xuXG4vL1xuLy8gSW5zdGFsbCB0aGUgY29uc29sZSBjb21wb25lbnRzXG4vL1xuaW1wb3J0IHtTdXJ2ZXlDb25zb2xlfSBmcm9tICcuL2pzL0NvbnNvbGUvU3VydmV5Q29uc29sZSc7XG5cbmlmKFNpdGUuU2l0ZS5jb25zb2xlICE9PSB1bmRlZmluZWQpIHtcblx0U3VydmV5Q29uc29sZS5zZXR1cChTaXRlLlNpdGUuY29uc29sZSk7XG59XG4iLCIvKipcbiAqIEBmaWxlXG4gKiBTdXJ2ZXkgc3lzdGVtIGNvbnNvbGUgY29tcG9uZW50c1xuICovXG5cbmV4cG9ydCBsZXQgU3VydmV5Q29uc29sZSA9IGZ1bmN0aW9uKCkge1xufVxuXG5TdXJ2ZXlDb25zb2xlLnNldHVwID0gZnVuY3Rpb24oQ29uc29sZSkge1xuICAgIENvbnNvbGUudGFibGVzLmFkZCh7XG4gICAgICAgIHRpdGxlOiAnU3VydmV5JyxcbiAgICAgICAgb3JkZXI6IDgwLFxuICAgICAgICBhcGk6ICcvYXBpL3N1cnZleS90YWJsZXMnXG4gICAgfSk7XG59XG5cbiJdLCJuYW1lcyI6WyJTdXJ2ZXlDb25zb2xlIiwiU2l0ZSIsImNvbnNvbGUiLCJ1bmRlZmluZWQiLCJzZXR1cCIsIkNvbnNvbGUiLCJ0YWJsZXMiLCJhZGQiLCJ0aXRsZSIsIm9yZGVyIiwiYXBpIl0sInNvdXJjZVJvb3QiOiIifQ==