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

/***/ "./resources/assets/core/js/custom/documentation/general/jstree/customicons.js":
/*!*************************************************************************************!*\
  !*** ./resources/assets/core/js/custom/documentation/general/jstree/customicons.js ***!
  \*************************************************************************************/
/***/ (() => {

eval(" // Class definition\n\nvar KTJSTreeCustomIcons = function () {\n  // Private functions\n  var exampleCustomIcons = function exampleCustomIcons() {\n    $('#kt_docs_jstree_customicons').jstree({\n      \"core\": {\n        \"themes\": {\n          \"responsive\": false\n        }\n      },\n      \"types\": {\n        \"default\": {\n          \"icon\": \"fa fa-folder text-warning\"\n        },\n        \"file\": {\n          \"icon\": \"fa fa-file  text-warning\"\n        }\n      },\n      \"plugins\": [\"types\"]\n    }); // handle link clicks in tree nodes(support target=\"_blank\" as well)\n\n    $('#kt_docs_jstree_customicons').on('select_node.jstree', function (e, data) {\n      var link = $('#' + data.selected).find('a');\n\n      if (link.attr(\"href\") != \"#\" && link.attr(\"href\") != \"javascript:;\" && link.attr(\"href\") != \"\") {\n        if (link.attr(\"target\") == \"_blank\") {\n          link.attr(\"href\").target = \"_blank\";\n        }\n\n        document.location.href = link.attr(\"href\");\n        return false;\n      }\n    });\n  };\n\n  return {\n    // Public Functions\n    init: function init() {\n      exampleCustomIcons();\n    }\n  };\n}(); // On document ready\n\n\nKTUtil.onDOMContentLoaded(function () {\n  KTJSTreeCustomIcons.init();\n});//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiLi9yZXNvdXJjZXMvYXNzZXRzL2NvcmUvanMvY3VzdG9tL2RvY3VtZW50YXRpb24vZ2VuZXJhbC9qc3RyZWUvY3VzdG9taWNvbnMuanMuanMiLCJtYXBwaW5ncyI6IkNBRUE7O0FBQ0EsSUFBSUEsbUJBQW1CLEdBQUcsWUFBVztBQUNqQztBQUNBLE1BQUlDLGtCQUFrQixHQUFHLFNBQXJCQSxrQkFBcUIsR0FBVztBQUNoQ0MsSUFBQUEsQ0FBQyxDQUFDLDZCQUFELENBQUQsQ0FBaUNDLE1BQWpDLENBQXdDO0FBQ3BDLGNBQVM7QUFDTCxrQkFBVztBQUNQLHdCQUFjO0FBRFA7QUFETixPQUQyQjtBQU1wQyxlQUFVO0FBQ04sbUJBQVk7QUFDUixrQkFBUztBQURELFNBRE47QUFJTixnQkFBUztBQUNMLGtCQUFTO0FBREo7QUFKSCxPQU4wQjtBQWNwQyxpQkFBVyxDQUFDLE9BQUQ7QUFkeUIsS0FBeEMsRUFEZ0MsQ0FrQmhDOztBQUNBRCxJQUFBQSxDQUFDLENBQUMsNkJBQUQsQ0FBRCxDQUFpQ0UsRUFBakMsQ0FBb0Msb0JBQXBDLEVBQTBELFVBQVNDLENBQVQsRUFBV0MsSUFBWCxFQUFpQjtBQUN2RSxVQUFJQyxJQUFJLEdBQUdMLENBQUMsQ0FBQyxNQUFNSSxJQUFJLENBQUNFLFFBQVosQ0FBRCxDQUF1QkMsSUFBdkIsQ0FBNEIsR0FBNUIsQ0FBWDs7QUFDQSxVQUFJRixJQUFJLENBQUNHLElBQUwsQ0FBVSxNQUFWLEtBQXFCLEdBQXJCLElBQTRCSCxJQUFJLENBQUNHLElBQUwsQ0FBVSxNQUFWLEtBQXFCLGNBQWpELElBQW1FSCxJQUFJLENBQUNHLElBQUwsQ0FBVSxNQUFWLEtBQXFCLEVBQTVGLEVBQWdHO0FBQzVGLFlBQUlILElBQUksQ0FBQ0csSUFBTCxDQUFVLFFBQVYsS0FBdUIsUUFBM0IsRUFBcUM7QUFDakNILFVBQUFBLElBQUksQ0FBQ0csSUFBTCxDQUFVLE1BQVYsRUFBa0JDLE1BQWxCLEdBQTJCLFFBQTNCO0FBQ0g7O0FBQ0RDLFFBQUFBLFFBQVEsQ0FBQ0MsUUFBVCxDQUFrQkMsSUFBbEIsR0FBeUJQLElBQUksQ0FBQ0csSUFBTCxDQUFVLE1BQVYsQ0FBekI7QUFDQSxlQUFPLEtBQVA7QUFDSDtBQUNKLEtBVEQ7QUFVSCxHQTdCRDs7QUErQkEsU0FBTztBQUNIO0FBQ0FLLElBQUFBLElBQUksRUFBRSxnQkFBVztBQUNiZCxNQUFBQSxrQkFBa0I7QUFDckI7QUFKRSxHQUFQO0FBTUgsQ0F2Q3lCLEVBQTFCLEMsQ0F5Q0E7OztBQUNBZSxNQUFNLENBQUNDLGtCQUFQLENBQTBCLFlBQVc7QUFDakNqQixFQUFBQSxtQkFBbUIsQ0FBQ2UsSUFBcEI7QUFDSCxDQUZEIiwic291cmNlcyI6WyJ3ZWJwYWNrOi8vLy4vcmVzb3VyY2VzL2Fzc2V0cy9jb3JlL2pzL2N1c3RvbS9kb2N1bWVudGF0aW9uL2dlbmVyYWwvanN0cmVlL2N1c3RvbWljb25zLmpzPzZjY2EiXSwic291cmNlc0NvbnRlbnQiOlsiXCJ1c2Ugc3RyaWN0XCI7XHJcblxyXG4vLyBDbGFzcyBkZWZpbml0aW9uXHJcbnZhciBLVEpTVHJlZUN1c3RvbUljb25zID0gZnVuY3Rpb24oKSB7XHJcbiAgICAvLyBQcml2YXRlIGZ1bmN0aW9uc1xyXG4gICAgdmFyIGV4YW1wbGVDdXN0b21JY29ucyA9IGZ1bmN0aW9uKCkge1xyXG4gICAgICAgICQoJyNrdF9kb2NzX2pzdHJlZV9jdXN0b21pY29ucycpLmpzdHJlZSh7XHJcbiAgICAgICAgICAgIFwiY29yZVwiIDoge1xyXG4gICAgICAgICAgICAgICAgXCJ0aGVtZXNcIiA6IHtcclxuICAgICAgICAgICAgICAgICAgICBcInJlc3BvbnNpdmVcIjogZmFsc2VcclxuICAgICAgICAgICAgICAgIH1cclxuICAgICAgICAgICAgfSxcclxuICAgICAgICAgICAgXCJ0eXBlc1wiIDoge1xyXG4gICAgICAgICAgICAgICAgXCJkZWZhdWx0XCIgOiB7XHJcbiAgICAgICAgICAgICAgICAgICAgXCJpY29uXCIgOiBcImZhIGZhLWZvbGRlciB0ZXh0LXdhcm5pbmdcIlxyXG4gICAgICAgICAgICAgICAgfSxcclxuICAgICAgICAgICAgICAgIFwiZmlsZVwiIDoge1xyXG4gICAgICAgICAgICAgICAgICAgIFwiaWNvblwiIDogXCJmYSBmYS1maWxlICB0ZXh0LXdhcm5pbmdcIlxyXG4gICAgICAgICAgICAgICAgfVxyXG4gICAgICAgICAgICB9LFxyXG4gICAgICAgICAgICBcInBsdWdpbnNcIjogW1widHlwZXNcIl1cclxuICAgICAgICB9KTtcclxuXHJcbiAgICAgICAgLy8gaGFuZGxlIGxpbmsgY2xpY2tzIGluIHRyZWUgbm9kZXMoc3VwcG9ydCB0YXJnZXQ9XCJfYmxhbmtcIiBhcyB3ZWxsKVxyXG4gICAgICAgICQoJyNrdF9kb2NzX2pzdHJlZV9jdXN0b21pY29ucycpLm9uKCdzZWxlY3Rfbm9kZS5qc3RyZWUnLCBmdW5jdGlvbihlLGRhdGEpIHtcclxuICAgICAgICAgICAgdmFyIGxpbmsgPSAkKCcjJyArIGRhdGEuc2VsZWN0ZWQpLmZpbmQoJ2EnKTtcclxuICAgICAgICAgICAgaWYgKGxpbmsuYXR0cihcImhyZWZcIikgIT0gXCIjXCIgJiYgbGluay5hdHRyKFwiaHJlZlwiKSAhPSBcImphdmFzY3JpcHQ6O1wiICYmIGxpbmsuYXR0cihcImhyZWZcIikgIT0gXCJcIikge1xyXG4gICAgICAgICAgICAgICAgaWYgKGxpbmsuYXR0cihcInRhcmdldFwiKSA9PSBcIl9ibGFua1wiKSB7XHJcbiAgICAgICAgICAgICAgICAgICAgbGluay5hdHRyKFwiaHJlZlwiKS50YXJnZXQgPSBcIl9ibGFua1wiO1xyXG4gICAgICAgICAgICAgICAgfVxyXG4gICAgICAgICAgICAgICAgZG9jdW1lbnQubG9jYXRpb24uaHJlZiA9IGxpbmsuYXR0cihcImhyZWZcIik7XHJcbiAgICAgICAgICAgICAgICByZXR1cm4gZmFsc2U7XHJcbiAgICAgICAgICAgIH1cclxuICAgICAgICB9KTtcclxuICAgIH1cclxuXHJcbiAgICByZXR1cm4ge1xyXG4gICAgICAgIC8vIFB1YmxpYyBGdW5jdGlvbnNcclxuICAgICAgICBpbml0OiBmdW5jdGlvbigpIHtcclxuICAgICAgICAgICAgZXhhbXBsZUN1c3RvbUljb25zKCk7XHJcbiAgICAgICAgfVxyXG4gICAgfTtcclxufSgpO1xyXG5cclxuLy8gT24gZG9jdW1lbnQgcmVhZHlcclxuS1RVdGlsLm9uRE9NQ29udGVudExvYWRlZChmdW5jdGlvbigpIHtcclxuICAgIEtUSlNUcmVlQ3VzdG9tSWNvbnMuaW5pdCgpO1xyXG59KTtcclxuIl0sIm5hbWVzIjpbIktUSlNUcmVlQ3VzdG9tSWNvbnMiLCJleGFtcGxlQ3VzdG9tSWNvbnMiLCIkIiwianN0cmVlIiwib24iLCJlIiwiZGF0YSIsImxpbmsiLCJzZWxlY3RlZCIsImZpbmQiLCJhdHRyIiwidGFyZ2V0IiwiZG9jdW1lbnQiLCJsb2NhdGlvbiIsImhyZWYiLCJpbml0IiwiS1RVdGlsIiwib25ET01Db250ZW50TG9hZGVkIl0sInNvdXJjZVJvb3QiOiIifQ==\n//# sourceURL=webpack-internal:///./resources/assets/core/js/custom/documentation/general/jstree/customicons.js\n");

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module can't be inlined because the eval-source-map devtool is used.
/******/ 	var __webpack_exports__ = {};
/******/ 	__webpack_modules__["./resources/assets/core/js/custom/documentation/general/jstree/customicons.js"]();
/******/ 	
/******/ })()
;