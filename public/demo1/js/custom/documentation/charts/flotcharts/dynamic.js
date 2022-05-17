/*
 * ATTENTION: An "eval-source-map" devtool has been used.
 * This devtool is neither made for production nor for readable output files.
 * It uses "eval()" calls to create a separate source file with attached SourceMaps in the browser devtools.
 * If you are trying to read the output file, select a different devtool (https://webpack.js.org/configuration/devtool/)
 * or disable the default devtool with "devtool: false".
 * If you are looking for production-ready output files, see mode: "production" (https://webpack.js.org/configuration/mode/).
 */
/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
/******/ 	var __webpack_modules__ = ({

/***/ "./resources/assets/core/js/custom/documentation/charts/flotcharts/dynamic.js":
/*!************************************************************************************!*\
  !*** ./resources/assets/core/js/custom/documentation/charts/flotcharts/dynamic.js ***!
  \************************************************************************************/
/***/ (() => {

eval(" // Class definition\n\nfunction _defineProperty(obj, key, value) { if (key in obj) { Object.defineProperty(obj, key, { value: value, enumerable: true, configurable: true, writable: true }); } else { obj[key] = value; } return obj; }\n\nvar KTFlotDemoDynamic = function () {\n  // Private functions\n  var exampleDynamic = function exampleDynamic() {\n    var _options;\n\n    var data = [];\n    var totalPoints = 250; // random data generator for plot charts\n\n    function getRandomData() {\n      if (data.length > 0) data = data.slice(1); // do a random walk\n\n      while (data.length < totalPoints) {\n        var prev = data.length > 0 ? data[data.length - 1] : 50;\n        var y = prev + Math.random() * 10 - 5;\n        if (y < 0) y = 0;\n        if (y > 100) y = 100;\n        data.push(y);\n      } // zip the generated y values with the x values\n\n\n      var res = [];\n\n      for (var i = 0; i < data.length; ++i) {\n        res.push([i, data[i]]);\n      }\n\n      return res;\n    } //server load\n\n\n    var options = (_options = {\n      colors: [KTUtil.getCssVariableValue('--bs-active-danger'), KTUtil.getCssVariableValue('--bs-active-primary')],\n      series: {\n        shadowSize: 1\n      },\n      lines: {\n        show: true,\n        lineWidth: 0.5,\n        fill: true,\n        fillColor: {\n          colors: [{\n            opacity: 0.1\n          }, {\n            opacity: 1\n          }]\n        }\n      },\n      yaxis: {\n        min: 0,\n        max: 100,\n        tickColor: KTUtil.getCssVariableValue('--bs-light-dark'),\n        tickFormatter: function tickFormatter(v) {\n          return v + \"%\";\n        }\n      },\n      xaxis: {\n        show: false\n      }\n    }, _defineProperty(_options, \"colors\", [KTUtil.getCssVariableValue('--bs-active-primary')]), _defineProperty(_options, \"grid\", {\n      tickColor: KTUtil.getCssVariableValue('--bs-light-dark'),\n      borderWidth: 0\n    }), _options);\n    var updateInterval = 30;\n    var plot = $.plot($(\"#kt_docs_flot_dynamic\"), [getRandomData()], options);\n\n    function update() {\n      plot.setData([getRandomData()]);\n      plot.draw();\n      setTimeout(update, updateInterval);\n    }\n\n    update();\n  };\n\n  return {\n    // Public Functions\n    init: function init() {\n      exampleDynamic();\n    }\n  };\n}(); // On document ready\n\n\nKTUtil.onDOMContentLoaded(function () {\n  KTFlotDemoDynamic.init();\n});//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiLi9yZXNvdXJjZXMvYXNzZXRzL2NvcmUvanMvY3VzdG9tL2RvY3VtZW50YXRpb24vY2hhcnRzL2Zsb3RjaGFydHMvZHluYW1pYy5qcy5qcyIsIm1hcHBpbmdzIjoiQ0FFQTs7OztBQUNBLElBQUlBLGlCQUFpQixHQUFHLFlBQVk7QUFDaEM7QUFDQSxNQUFJQyxjQUFjLEdBQUcsU0FBakJBLGNBQWlCLEdBQVk7QUFBQTs7QUFDN0IsUUFBSUMsSUFBSSxHQUFHLEVBQVg7QUFDTixRQUFJQyxXQUFXLEdBQUcsR0FBbEIsQ0FGbUMsQ0FJbkM7O0FBRUEsYUFBU0MsYUFBVCxHQUF5QjtBQUN4QixVQUFJRixJQUFJLENBQUNHLE1BQUwsR0FBYyxDQUFsQixFQUFxQkgsSUFBSSxHQUFHQSxJQUFJLENBQUNJLEtBQUwsQ0FBVyxDQUFYLENBQVAsQ0FERyxDQUV4Qjs7QUFDQSxhQUFPSixJQUFJLENBQUNHLE1BQUwsR0FBY0YsV0FBckIsRUFBa0M7QUFDakMsWUFBSUksSUFBSSxHQUFHTCxJQUFJLENBQUNHLE1BQUwsR0FBYyxDQUFkLEdBQWtCSCxJQUFJLENBQUNBLElBQUksQ0FBQ0csTUFBTCxHQUFjLENBQWYsQ0FBdEIsR0FBMEMsRUFBckQ7QUFDQSxZQUFJRyxDQUFDLEdBQUdELElBQUksR0FBR0UsSUFBSSxDQUFDQyxNQUFMLEtBQWdCLEVBQXZCLEdBQTRCLENBQXBDO0FBQ0EsWUFBSUYsQ0FBQyxHQUFHLENBQVIsRUFBV0EsQ0FBQyxHQUFHLENBQUo7QUFDWCxZQUFJQSxDQUFDLEdBQUcsR0FBUixFQUFhQSxDQUFDLEdBQUcsR0FBSjtBQUNiTixRQUFBQSxJQUFJLENBQUNTLElBQUwsQ0FBVUgsQ0FBVjtBQUNBLE9BVHVCLENBVXhCOzs7QUFDQSxVQUFJSSxHQUFHLEdBQUcsRUFBVjs7QUFDQSxXQUFLLElBQUlDLENBQUMsR0FBRyxDQUFiLEVBQWdCQSxDQUFDLEdBQUdYLElBQUksQ0FBQ0csTUFBekIsRUFBaUMsRUFBRVEsQ0FBbkMsRUFBc0M7QUFDckNELFFBQUFBLEdBQUcsQ0FBQ0QsSUFBSixDQUFTLENBQUNFLENBQUQsRUFBSVgsSUFBSSxDQUFDVyxDQUFELENBQVIsQ0FBVDtBQUNBOztBQUVELGFBQU9ELEdBQVA7QUFDQSxLQXZCa0MsQ0F5Qm5DOzs7QUFDQSxRQUFJRSxPQUFPO0FBQ1ZDLE1BQUFBLE1BQU0sRUFBRSxDQUFDQyxNQUFNLENBQUNDLG1CQUFQLENBQTJCLG9CQUEzQixDQUFELEVBQW1ERCxNQUFNLENBQUNDLG1CQUFQLENBQTJCLHFCQUEzQixDQUFuRCxDQURFO0FBRVZDLE1BQUFBLE1BQU0sRUFBRTtBQUNQQyxRQUFBQSxVQUFVLEVBQUU7QUFETCxPQUZFO0FBS1ZDLE1BQUFBLEtBQUssRUFBRTtBQUNOQyxRQUFBQSxJQUFJLEVBQUUsSUFEQTtBQUVOQyxRQUFBQSxTQUFTLEVBQUUsR0FGTDtBQUdOQyxRQUFBQSxJQUFJLEVBQUUsSUFIQTtBQUlOQyxRQUFBQSxTQUFTLEVBQUU7QUFDVlQsVUFBQUEsTUFBTSxFQUFFLENBQUM7QUFDUlUsWUFBQUEsT0FBTyxFQUFFO0FBREQsV0FBRCxFQUVMO0FBQ0ZBLFlBQUFBLE9BQU8sRUFBRTtBQURQLFdBRks7QUFERTtBQUpMLE9BTEc7QUFpQlZDLE1BQUFBLEtBQUssRUFBRTtBQUNOQyxRQUFBQSxHQUFHLEVBQUUsQ0FEQztBQUVOQyxRQUFBQSxHQUFHLEVBQUUsR0FGQztBQUdOQyxRQUFBQSxTQUFTLEVBQUViLE1BQU0sQ0FBQ0MsbUJBQVAsQ0FBMkIsaUJBQTNCLENBSEw7QUFJTmEsUUFBQUEsYUFBYSxFQUFFLHVCQUFTQyxDQUFULEVBQVk7QUFDMUIsaUJBQU9BLENBQUMsR0FBRyxHQUFYO0FBQ0E7QUFOSyxPQWpCRztBQXlCVkMsTUFBQUEsS0FBSyxFQUFFO0FBQ05YLFFBQUFBLElBQUksRUFBRTtBQURBO0FBekJHLDJDQTRCRixDQUFDTCxNQUFNLENBQUNDLG1CQUFQLENBQTJCLHFCQUEzQixDQUFELENBNUJFLHFDQTZCSjtBQUNMWSxNQUFBQSxTQUFTLEVBQUViLE1BQU0sQ0FBQ0MsbUJBQVAsQ0FBMkIsaUJBQTNCLENBRE47QUFFTGdCLE1BQUFBLFdBQVcsRUFBRTtBQUZSLEtBN0JJLFlBQVg7QUFtQ0EsUUFBSUMsY0FBYyxHQUFHLEVBQXJCO0FBQ0EsUUFBSUMsSUFBSSxHQUFHQyxDQUFDLENBQUNELElBQUYsQ0FBT0MsQ0FBQyxDQUFDLHVCQUFELENBQVIsRUFBbUMsQ0FBQ2hDLGFBQWEsRUFBZCxDQUFuQyxFQUFzRFUsT0FBdEQsQ0FBWDs7QUFFQSxhQUFTdUIsTUFBVCxHQUFrQjtBQUNqQkYsTUFBQUEsSUFBSSxDQUFDRyxPQUFMLENBQWEsQ0FBQ2xDLGFBQWEsRUFBZCxDQUFiO0FBQ0ErQixNQUFBQSxJQUFJLENBQUNJLElBQUw7QUFDQUMsTUFBQUEsVUFBVSxDQUFDSCxNQUFELEVBQVNILGNBQVQsQ0FBVjtBQUNBOztBQUVERyxJQUFBQSxNQUFNO0FBQ0gsR0F2RUQ7O0FBeUVBLFNBQU87QUFDSDtBQUNBSSxJQUFBQSxJQUFJLEVBQUUsZ0JBQVk7QUFDZHhDLE1BQUFBLGNBQWM7QUFDakI7QUFKRSxHQUFQO0FBTUgsQ0FqRnVCLEVBQXhCLEMsQ0FtRkE7OztBQUNBZSxNQUFNLENBQUMwQixrQkFBUCxDQUEwQixZQUFZO0FBQ2xDMUMsRUFBQUEsaUJBQWlCLENBQUN5QyxJQUFsQjtBQUNILENBRkQiLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9yZXNvdXJjZXMvYXNzZXRzL2NvcmUvanMvY3VzdG9tL2RvY3VtZW50YXRpb24vY2hhcnRzL2Zsb3RjaGFydHMvZHluYW1pYy5qcz9lZmE3Il0sInNvdXJjZXNDb250ZW50IjpbIlwidXNlIHN0cmljdFwiO1xyXG5cclxuLy8gQ2xhc3MgZGVmaW5pdGlvblxyXG52YXIgS1RGbG90RGVtb0R5bmFtaWMgPSBmdW5jdGlvbiAoKSB7XHJcbiAgICAvLyBQcml2YXRlIGZ1bmN0aW9uc1xyXG4gICAgdmFyIGV4YW1wbGVEeW5hbWljID0gZnVuY3Rpb24gKCkge1xyXG4gICAgICAgIHZhciBkYXRhID0gW107XHJcblx0XHR2YXIgdG90YWxQb2ludHMgPSAyNTA7XHJcblxyXG5cdFx0Ly8gcmFuZG9tIGRhdGEgZ2VuZXJhdG9yIGZvciBwbG90IGNoYXJ0c1xyXG5cclxuXHRcdGZ1bmN0aW9uIGdldFJhbmRvbURhdGEoKSB7XHJcblx0XHRcdGlmIChkYXRhLmxlbmd0aCA+IDApIGRhdGEgPSBkYXRhLnNsaWNlKDEpO1xyXG5cdFx0XHQvLyBkbyBhIHJhbmRvbSB3YWxrXHJcblx0XHRcdHdoaWxlIChkYXRhLmxlbmd0aCA8IHRvdGFsUG9pbnRzKSB7XHJcblx0XHRcdFx0dmFyIHByZXYgPSBkYXRhLmxlbmd0aCA+IDAgPyBkYXRhW2RhdGEubGVuZ3RoIC0gMV0gOiA1MDtcclxuXHRcdFx0XHR2YXIgeSA9IHByZXYgKyBNYXRoLnJhbmRvbSgpICogMTAgLSA1O1xyXG5cdFx0XHRcdGlmICh5IDwgMCkgeSA9IDA7XHJcblx0XHRcdFx0aWYgKHkgPiAxMDApIHkgPSAxMDA7XHJcblx0XHRcdFx0ZGF0YS5wdXNoKHkpO1xyXG5cdFx0XHR9XHJcblx0XHRcdC8vIHppcCB0aGUgZ2VuZXJhdGVkIHkgdmFsdWVzIHdpdGggdGhlIHggdmFsdWVzXHJcblx0XHRcdHZhciByZXMgPSBbXTtcclxuXHRcdFx0Zm9yICh2YXIgaSA9IDA7IGkgPCBkYXRhLmxlbmd0aDsgKytpKSB7XHJcblx0XHRcdFx0cmVzLnB1c2goW2ksIGRhdGFbaV1dKTtcclxuXHRcdFx0fVxyXG5cclxuXHRcdFx0cmV0dXJuIHJlcztcclxuXHRcdH1cclxuXHJcblx0XHQvL3NlcnZlciBsb2FkXHJcblx0XHR2YXIgb3B0aW9ucyA9IHtcclxuXHRcdFx0Y29sb3JzOiBbS1RVdGlsLmdldENzc1ZhcmlhYmxlVmFsdWUoJy0tYnMtYWN0aXZlLWRhbmdlcicpLCBLVFV0aWwuZ2V0Q3NzVmFyaWFibGVWYWx1ZSgnLS1icy1hY3RpdmUtcHJpbWFyeScpXSxcclxuXHRcdFx0c2VyaWVzOiB7XHJcblx0XHRcdFx0c2hhZG93U2l6ZTogMVxyXG5cdFx0XHR9LFxyXG5cdFx0XHRsaW5lczoge1xyXG5cdFx0XHRcdHNob3c6IHRydWUsXHJcblx0XHRcdFx0bGluZVdpZHRoOiAwLjUsXHJcblx0XHRcdFx0ZmlsbDogdHJ1ZSxcclxuXHRcdFx0XHRmaWxsQ29sb3I6IHtcclxuXHRcdFx0XHRcdGNvbG9yczogW3tcclxuXHRcdFx0XHRcdFx0b3BhY2l0eTogMC4xXHJcblx0XHRcdFx0XHR9LCB7XHJcblx0XHRcdFx0XHRcdG9wYWNpdHk6IDFcclxuXHRcdFx0XHRcdH1dXHJcblx0XHRcdFx0fVxyXG5cdFx0XHR9LFxyXG5cdFx0XHR5YXhpczoge1xyXG5cdFx0XHRcdG1pbjogMCxcclxuXHRcdFx0XHRtYXg6IDEwMCxcclxuXHRcdFx0XHR0aWNrQ29sb3I6IEtUVXRpbC5nZXRDc3NWYXJpYWJsZVZhbHVlKCctLWJzLWxpZ2h0LWRhcmsnKSxcclxuXHRcdFx0XHR0aWNrRm9ybWF0dGVyOiBmdW5jdGlvbih2KSB7XHJcblx0XHRcdFx0XHRyZXR1cm4gdiArIFwiJVwiO1xyXG5cdFx0XHRcdH1cclxuXHRcdFx0fSxcclxuXHRcdFx0eGF4aXM6IHtcclxuXHRcdFx0XHRzaG93OiBmYWxzZSxcclxuXHRcdFx0fSxcclxuXHRcdFx0Y29sb3JzOiBbS1RVdGlsLmdldENzc1ZhcmlhYmxlVmFsdWUoJy0tYnMtYWN0aXZlLXByaW1hcnknKV0sXHJcblx0XHRcdGdyaWQ6IHtcclxuXHRcdFx0XHR0aWNrQ29sb3I6IEtUVXRpbC5nZXRDc3NWYXJpYWJsZVZhbHVlKCctLWJzLWxpZ2h0LWRhcmsnKSxcclxuXHRcdFx0XHRib3JkZXJXaWR0aDogMCxcclxuXHRcdFx0fVxyXG5cdFx0fTtcclxuXHJcblx0XHR2YXIgdXBkYXRlSW50ZXJ2YWwgPSAzMDtcclxuXHRcdHZhciBwbG90ID0gJC5wbG90KCQoXCIja3RfZG9jc19mbG90X2R5bmFtaWNcIiksIFtnZXRSYW5kb21EYXRhKCldLCBvcHRpb25zKTtcclxuXHJcblx0XHRmdW5jdGlvbiB1cGRhdGUoKSB7XHJcblx0XHRcdHBsb3Quc2V0RGF0YShbZ2V0UmFuZG9tRGF0YSgpXSk7XHJcblx0XHRcdHBsb3QuZHJhdygpO1xyXG5cdFx0XHRzZXRUaW1lb3V0KHVwZGF0ZSwgdXBkYXRlSW50ZXJ2YWwpO1xyXG5cdFx0fVxyXG5cclxuXHRcdHVwZGF0ZSgpO1xyXG4gICAgfVxyXG5cclxuICAgIHJldHVybiB7XHJcbiAgICAgICAgLy8gUHVibGljIEZ1bmN0aW9uc1xyXG4gICAgICAgIGluaXQ6IGZ1bmN0aW9uICgpIHtcclxuICAgICAgICAgICAgZXhhbXBsZUR5bmFtaWMoKTtcclxuICAgICAgICB9XHJcbiAgICB9O1xyXG59KCk7XHJcblxyXG4vLyBPbiBkb2N1bWVudCByZWFkeVxyXG5LVFV0aWwub25ET01Db250ZW50TG9hZGVkKGZ1bmN0aW9uICgpIHtcclxuICAgIEtURmxvdERlbW9EeW5hbWljLmluaXQoKTtcclxufSk7XHJcbiJdLCJuYW1lcyI6WyJLVEZsb3REZW1vRHluYW1pYyIsImV4YW1wbGVEeW5hbWljIiwiZGF0YSIsInRvdGFsUG9pbnRzIiwiZ2V0UmFuZG9tRGF0YSIsImxlbmd0aCIsInNsaWNlIiwicHJldiIsInkiLCJNYXRoIiwicmFuZG9tIiwicHVzaCIsInJlcyIsImkiLCJvcHRpb25zIiwiY29sb3JzIiwiS1RVdGlsIiwiZ2V0Q3NzVmFyaWFibGVWYWx1ZSIsInNlcmllcyIsInNoYWRvd1NpemUiLCJsaW5lcyIsInNob3ciLCJsaW5lV2lkdGgiLCJmaWxsIiwiZmlsbENvbG9yIiwib3BhY2l0eSIsInlheGlzIiwibWluIiwibWF4IiwidGlja0NvbG9yIiwidGlja0Zvcm1hdHRlciIsInYiLCJ4YXhpcyIsImJvcmRlcldpZHRoIiwidXBkYXRlSW50ZXJ2YWwiLCJwbG90IiwiJCIsInVwZGF0ZSIsInNldERhdGEiLCJkcmF3Iiwic2V0VGltZW91dCIsImluaXQiLCJvbkRPTUNvbnRlbnRMb2FkZWQiXSwic291cmNlUm9vdCI6IiJ9\n//# sourceURL=webpack-internal:///./resources/assets/core/js/custom/documentation/charts/flotcharts/dynamic.js\n");

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module can't be inlined because the eval-source-map devtool is used.
/******/ 	var __webpack_exports__ = {};
/******/ 	__webpack_modules__["./resources/assets/core/js/custom/documentation/charts/flotcharts/dynamic.js"]();
/******/ 	
/******/ })()
;