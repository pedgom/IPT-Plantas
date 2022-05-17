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

/***/ "./resources/assets/core/js/custom/apps/user-management/users/view/view.js":
/*!*********************************************************************************!*\
  !*** ./resources/assets/core/js/custom/apps/user-management/users/view/view.js ***!
  \*********************************************************************************/
/***/ (() => {

eval(" // Class definition\n\nvar KTUsersViewMain = function () {\n  // Init login session button\n  var initLoginSession = function initLoginSession() {\n    var button = document.getElementById('kt_modal_sign_out_sesions');\n    button.addEventListener('click', function (e) {\n      e.preventDefault();\n      Swal.fire({\n        text: \"Are you sure you would like sign out all sessions?\",\n        icon: \"warning\",\n        showCancelButton: true,\n        buttonsStyling: false,\n        confirmButtonText: \"Yes, sign out!\",\n        cancelButtonText: \"No, return\",\n        customClass: {\n          confirmButton: \"btn btn-primary\",\n          cancelButton: \"btn btn-active-light\"\n        }\n      }).then(function (result) {\n        if (result.value) {\n          Swal.fire({\n            text: \"You have signed out all sessions!.\",\n            icon: \"success\",\n            buttonsStyling: false,\n            confirmButtonText: \"Ok, got it!\",\n            customClass: {\n              confirmButton: \"btn btn-primary\"\n            }\n          });\n        } else if (result.dismiss === 'cancel') {\n          Swal.fire({\n            text: \"Your sessions are still preserved!.\",\n            icon: \"error\",\n            buttonsStyling: false,\n            confirmButtonText: \"Ok, got it!\",\n            customClass: {\n              confirmButton: \"btn btn-primary\"\n            }\n          });\n        }\n      });\n    });\n  }; // Init sign out single user\n\n\n  var initSignOutUser = function initSignOutUser() {\n    var signOutButtons = document.querySelectorAll('[data-kt-users-sign-out=\"single_user\"]');\n    signOutButtons.forEach(function (button) {\n      button.addEventListener('click', function (e) {\n        e.preventDefault();\n        var deviceName = button.closest('tr').querySelectorAll('td')[1].innerText;\n        Swal.fire({\n          text: \"Are you sure you would like sign out \" + deviceName + \"?\",\n          icon: \"warning\",\n          showCancelButton: true,\n          buttonsStyling: false,\n          confirmButtonText: \"Yes, sign out!\",\n          cancelButtonText: \"No, return\",\n          customClass: {\n            confirmButton: \"btn btn-primary\",\n            cancelButton: \"btn btn-active-light\"\n          }\n        }).then(function (result) {\n          if (result.value) {\n            Swal.fire({\n              text: \"You have signed out \" + deviceName + \"!.\",\n              icon: \"success\",\n              buttonsStyling: false,\n              confirmButtonText: \"Ok, got it!\",\n              customClass: {\n                confirmButton: \"btn btn-primary\"\n              }\n            }).then(function () {\n              button.closest('tr').remove();\n            });\n          } else if (result.dismiss === 'cancel') {\n            Swal.fire({\n              text: deviceName + \"'s session is still preserved!.\",\n              icon: \"error\",\n              buttonsStyling: false,\n              confirmButtonText: \"Ok, got it!\",\n              customClass: {\n                confirmButton: \"btn btn-primary\"\n              }\n            });\n          }\n        });\n      });\n    });\n  }; // Delete two step authentication handler\n\n\n  var initDeleteTwoStep = function initDeleteTwoStep() {\n    var deleteButton = document.getElementById('kt_users_delete_two_step');\n    deleteButton.addEventListener('click', function (e) {\n      e.preventDefault();\n      Swal.fire({\n        text: \"Are you sure you would like remove this two-step authentication?\",\n        icon: \"warning\",\n        showCancelButton: true,\n        buttonsStyling: false,\n        confirmButtonText: \"Yes, remove it!\",\n        cancelButtonText: \"No, return\",\n        customClass: {\n          confirmButton: \"btn btn-primary\",\n          cancelButton: \"btn btn-active-light\"\n        }\n      }).then(function (result) {\n        if (result.value) {\n          Swal.fire({\n            text: \"You have removed this two-step authentication!.\",\n            icon: \"success\",\n            buttonsStyling: false,\n            confirmButtonText: \"Ok, got it!\",\n            customClass: {\n              confirmButton: \"btn btn-primary\"\n            }\n          });\n        } else if (result.dismiss === 'cancel') {\n          Swal.fire({\n            text: \"Your two-step authentication is still valid!.\",\n            icon: \"error\",\n            buttonsStyling: false,\n            confirmButtonText: \"Ok, got it!\",\n            customClass: {\n              confirmButton: \"btn btn-primary\"\n            }\n          });\n        }\n      });\n    });\n  }; // Email preference form handler\n\n\n  var initEmailPreferenceForm = function initEmailPreferenceForm() {\n    // Define variables\n    var form = document.getElementById('kt_users_email_notification_form');\n    var submitButton = form.querySelector('#kt_users_email_notification_submit');\n    var cancelButton = form.querySelector('#kt_users_email_notification_cancel'); // Submit action handler\n\n    submitButton.addEventListener('click', function (e) {\n      e.preventDefault(); // Show loading indication\n\n      submitButton.setAttribute('data-kt-indicator', 'on'); // Disable button to avoid multiple click \n\n      submitButton.disabled = true; // Simulate form submission. For more info check the plugin's official documentation: https://sweetalert2.github.io/\n\n      setTimeout(function () {\n        // Remove loading indication\n        submitButton.removeAttribute('data-kt-indicator'); // Enable button\n\n        submitButton.disabled = false; // Show popup confirmation \n\n        Swal.fire({\n          text: \"Form has been successfully submitted!\",\n          icon: \"success\",\n          buttonsStyling: false,\n          confirmButtonText: \"Ok, got it!\",\n          customClass: {\n            confirmButton: \"btn btn-primary\"\n          }\n        }); //form.submit(); // Submit form\n      }, 2000);\n    });\n    cancelButton.addEventListener('click', function (e) {\n      e.preventDefault();\n      Swal.fire({\n        text: \"Are you sure you would like to cancel?\",\n        icon: \"warning\",\n        showCancelButton: true,\n        buttonsStyling: false,\n        confirmButtonText: \"Yes, cancel it!\",\n        cancelButtonText: \"No, return\",\n        customClass: {\n          confirmButton: \"btn btn-primary\",\n          cancelButton: \"btn btn-active-light\"\n        }\n      }).then(function (result) {\n        if (result.value) {\n          form.reset(); // Reset form\t\t\t\t\n        } else if (result.dismiss === 'cancel') {\n          Swal.fire({\n            text: \"Your form has not been cancelled!.\",\n            icon: \"error\",\n            buttonsStyling: false,\n            confirmButtonText: \"Ok, got it!\",\n            customClass: {\n              confirmButton: \"btn btn-primary\"\n            }\n          });\n        }\n      });\n    });\n  };\n\n  return {\n    // Public functions\n    init: function init() {\n      initLoginSession();\n      initSignOutUser();\n      initDeleteTwoStep();\n      initEmailPreferenceForm();\n    }\n  };\n}(); // On document ready\n\n\nKTUtil.onDOMContentLoaded(function () {\n  KTUsersViewMain.init();\n});//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiLi9yZXNvdXJjZXMvYXNzZXRzL2NvcmUvanMvY3VzdG9tL2FwcHMvdXNlci1tYW5hZ2VtZW50L3VzZXJzL3ZpZXcvdmlldy5qcy5qcyIsIm1hcHBpbmdzIjoiQ0FFQTs7QUFDQSxJQUFJQSxlQUFlLEdBQUcsWUFBWTtBQUU5QjtBQUNBLE1BQUlDLGdCQUFnQixHQUFHLFNBQW5CQSxnQkFBbUIsR0FBTTtBQUN6QixRQUFNQyxNQUFNLEdBQUdDLFFBQVEsQ0FBQ0MsY0FBVCxDQUF3QiwyQkFBeEIsQ0FBZjtBQUVBRixJQUFBQSxNQUFNLENBQUNHLGdCQUFQLENBQXdCLE9BQXhCLEVBQWlDLFVBQUFDLENBQUMsRUFBSTtBQUNsQ0EsTUFBQUEsQ0FBQyxDQUFDQyxjQUFGO0FBRUFDLE1BQUFBLElBQUksQ0FBQ0MsSUFBTCxDQUFVO0FBQ05DLFFBQUFBLElBQUksRUFBRSxvREFEQTtBQUVOQyxRQUFBQSxJQUFJLEVBQUUsU0FGQTtBQUdOQyxRQUFBQSxnQkFBZ0IsRUFBRSxJQUhaO0FBSU5DLFFBQUFBLGNBQWMsRUFBRSxLQUpWO0FBS05DLFFBQUFBLGlCQUFpQixFQUFFLGdCQUxiO0FBTU5DLFFBQUFBLGdCQUFnQixFQUFFLFlBTlo7QUFPTkMsUUFBQUEsV0FBVyxFQUFFO0FBQ1RDLFVBQUFBLGFBQWEsRUFBRSxpQkFETjtBQUVUQyxVQUFBQSxZQUFZLEVBQUU7QUFGTDtBQVBQLE9BQVYsRUFXR0MsSUFYSCxDQVdRLFVBQVVDLE1BQVYsRUFBa0I7QUFDdEIsWUFBSUEsTUFBTSxDQUFDQyxLQUFYLEVBQWtCO0FBQ2RiLFVBQUFBLElBQUksQ0FBQ0MsSUFBTCxDQUFVO0FBQ05DLFlBQUFBLElBQUksRUFBRSxvQ0FEQTtBQUVOQyxZQUFBQSxJQUFJLEVBQUUsU0FGQTtBQUdORSxZQUFBQSxjQUFjLEVBQUUsS0FIVjtBQUlOQyxZQUFBQSxpQkFBaUIsRUFBRSxhQUpiO0FBS05FLFlBQUFBLFdBQVcsRUFBRTtBQUNUQyxjQUFBQSxhQUFhLEVBQUU7QUFETjtBQUxQLFdBQVY7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TUFBQUEsaUJBQWlCO0FBQ2pCRSxNQUFBQSx1QkFBdUI7QUFDMUI7QUFQRSxHQUFQO0FBU0gsQ0FqT3FCLEVBQXRCLEMsQ0FtT0E7OztBQUNBVSxNQUFNLENBQUNDLGtCQUFQLENBQTBCLFlBQVk7QUFDbEM1QyxFQUFBQSxlQUFlLENBQUMwQyxJQUFoQjtBQUNILENBRkQiLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9yZXNvdXJjZXMvYXNzZXRzL2NvcmUvanMvY3VzdG9tL2FwcHMvdXNlci1tYW5hZ2VtZW50L3VzZXJzL3ZpZXcvdmlldy5qcz9kMWVkIl0sInNvdXJjZXNDb250ZW50IjpbIlwidXNlIHN0cmljdFwiO1xyXG5cclxuLy8gQ2xhc3MgZGVmaW5pdGlvblxyXG52YXIgS1RVc2Vyc1ZpZXdNYWluID0gZnVuY3Rpb24gKCkge1xyXG5cclxuICAgIC8vIEluaXQgbG9naW4gc2Vzc2lvbiBidXR0b25cclxuICAgIHZhciBpbml0TG9naW5TZXNzaW9uID0gKCkgPT4ge1xyXG4gICAgICAgIGNvbnN0IGJ1dHRvbiA9IGRvY3VtZW50LmdldEVsZW1lbnRCeUlkKCdrdF9tb2RhbF9zaWduX291dF9zZXNpb25zJyk7XHJcblxyXG4gICAgICAgIGJ1dHRvbi5hZGRFdmVudExpc3RlbmVyKCdjbGljaycsIGUgPT4ge1xyXG4gICAgICAgICAgICBlLnByZXZlbnREZWZhdWx0KCk7XHJcblxyXG4gICAgICAgICAgICBTd2FsLmZpcmUoe1xyXG4gICAgICAgICAgICAgICAgdGV4dDogXCJBcmUgeW91IHN1cmUgeW91IHdvdWxkIGxpa2Ugc2lnbiBvdXQgYWxsIHNlc3Npb25zP1wiLFxyXG4gICAgICAgICAgICAgICAgaWNvbjogXCJ3YXJuaW5nXCIsXHJcbiAgICAgICAgICAgICAgICBzaG93Q2FuY2VsQnV0dG9uOiB0cnVlLFxyXG4gICAgICAgICAgICAgICAgYnV0dG9uc1N0eWxpbmc6IGZhbHNlLFxyXG4gICAgICAgICAgICAgICAgY29uZmlybUJ1dHRvblRleHQ6IFwiWWVzLCBzaWduIG91dCFcIixcclxuICAgICAgICAgICAgICAgIGNhbmNlbEJ1dHRvblRleHQ6IFwiTm8sIHJldHVyblwiLFxyXG4gICAgICAgICAgICAgICAgY3VzdG9tQ2xhc3M6IHtcclxuICAgICAgICAgICAgICAgICAgICBjb25maXJtQnV0dG9uOiBcImJ0biBidG4tcHJpbWFyeVwiLFxyXG4gICAgICAgICAgICAgICAgICAgIGNhbmNlbEJ1dHRvbjogXCJidG4gYnRuLWFjdGl2ZS1saWdodFwiXHJcbiAgICAgICAgICAgICAgICB9XHJcbiAgICAgICAgICAgIH0pLnRoZW4oZnVuY3Rpb24gKHJlc3VsdCkge1xyXG4gICAgICAgICAgICAgICAgaWYgKHJlc3VsdC52YWx1ZSkge1xyXG4gICAgICAgICAgICAgICAgICAgIFN3YWwuZmlyZSh7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgIHRleHQ6IFwiWW91IGhhdmUgc2lnbmVkIG91dCBhbGwgc2Vzc2lvbnMhLlwiLFxyXG4gICAgICAgICAgICAgICAgICAgICAgICBpY29uOiBcInN1Y2Nlc3NcIixcclxuICAgICAgICAgICAgICAgICAgICAgICAgYnV0dG9uc1N0eWxpbmc6IGZhbHNlLFxyXG4gICAgICAgICAgICAgICAgICAgICAgICBjb25maXJtQnV0dG9uVGV4dDogXCJPaywgZ290IGl0IVwiLFxyXG4gICAgICAgICAgICAgICAgICAgICAgICBjdXN0b21DbGFzczoge1xyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgY29uZmlybUJ1dHRvbjogXCJidG4gYnRuLXByaW1hcnlcIixcclxuICAgICAgICAgICAgICAgICAgICAgICAgfVxyXG4gICAgICAgICAgICAgICAgICAgIH0pO1xyXG4gICAgICAgICAgICAgICAgfSBlbHNlIGlmIChyZXN1bHQuZGlzbWlzcyA9PT0gJ2NhbmNlbCcpIHtcclxuICAgICAgICAgICAgICAgICAgICBTd2FsLmZpcmUoe1xyXG4gICAgICAgICAgICAgICAgICAgICAgICB0ZXh0OiBcIllvdXIgc2Vzc2lvbnMgYXJlIHN0aWxsIHByZXNlcnZlZCEuXCIsXHJcbiAgICAgICAgICAgICAgICAgICAgICAgIGljb246IFwiZXJyb3JcIixcclxuICAgICAgICAgICAgICAgICAgICAgICAgYnV0dG9uc1N0eWxpbmc6IGZhbHNlLFxyXG4gICAgICAgICAgICAgICAgICAgICAgICBjb25maXJtQnV0dG9uVGV4dDogXCJPaywgZ290IGl0IVwiLFxyXG4gICAgICAgICAgICAgICAgICAgICAgICBjdXN0b21DbGFzczoge1xyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgY29uZmlybUJ1dHRvbjogXCJidG4gYnRuLXByaW1hcnlcIixcclxuICAgICAgICAgICAgICAgICAgICAgICAgfVxyXG4gICAgICAgICAgICAgICAgICAgIH0pO1xyXG4gICAgICAgICAgICAgICAgfVxyXG4gICAgICAgICAgICB9KTtcclxuICAgICAgICB9KTtcclxuICAgIH1cclxuXHJcblxyXG4gICAgLy8gSW5pdCBzaWduIG91dCBzaW5nbGUgdXNlclxyXG4gICAgdmFyIGluaXRTaWduT3V0VXNlciA9ICgpID0+IHtcclxuICAgICAgICBjb25zdCBzaWduT3V0QnV0dG9ucyA9IGRvY3VtZW50LnF1ZXJ5U2VsZWN0b3JBbGwoJ1tkYXRhLWt0LXVzZXJzLXNpZ24tb3V0PVwic2luZ2xlX3VzZXJcIl0nKTtcclxuXHJcbiAgICAgICAgc2lnbk91dEJ1dHRvbnMuZm9yRWFjaChidXR0b24gPT4ge1xyXG4gICAgICAgICAgICBidXR0b24uYWRkRXZlbnRMaXN0ZW5lcignY2xpY2snLCBlID0+IHtcclxuICAgICAgICAgICAgICAgIGUucHJldmVudERlZmF1bHQoKTtcclxuXHJcbiAgICAgICAgICAgICAgICBjb25zdCBkZXZpY2VOYW1lID0gYnV0dG9uLmNsb3Nlc3QoJ3RyJykucXVlcnlTZWxlY3RvckFsbCgndGQnKVsxXS5pbm5lclRleHQ7XHJcblxyXG4gICAgICAgICAgICAgICAgU3dhbC5maXJlKHtcclxuICAgICAgICAgICAgICAgICAgICB0ZXh0OiBcIkFyZSB5b3Ugc3VyZSB5b3Ugd291bGQgbGlrZSBzaWduIG91dCBcIiArIGRldmljZU5hbWUgKyBcIj9cIixcclxuICAgICAgICAgICAgICAgICAgICBpY29uOiBcIndhcm5pbmdcIixcclxuICAgICAgICAgICAgICAgICAgICBzaG93Q2FuY2VsQnV0dG9uOiB0cnVlLFxyXG4gICAgICAgICAgICAgICAgICAgIGJ1dHRvbnNTdHlsaW5nOiBmYWxzZSxcclxuICAgICAgICAgICAgICAgICAgICBjb25maXJtQnV0dG9uVGV4dDogXCJZZXMsIHNpZ24gb3V0IVwiLFxyXG4gICAgICAgICAgICAgICAgICAgIGNhbmNlbEJ1dHRvblRleHQ6IFwiTm8sIHJldHVyblwiLFxyXG4gICAgICAgICAgICAgICAgICAgIGN1c3RvbUNsYXNzOiB7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgIGNvbmZpcm1CdXR0b246IFwiYnRuIGJ0bi1wcmltYXJ5XCIsXHJcbiAgICAgICAgICAgICAgICAgICAgICAgIGNhbmNlbEJ1dHRvbjogXCJidG4gYnRuLWFjdGl2ZS1saWdodFwiXHJcbiAgICAgICAgICAgICAgICAgICAgfVxyXG4gICAgICAgICAgICAgICAgfSkudGhlbihmdW5jdGlvbiAocmVzdWx0KSB7XHJcbiAgICAgICAgICAgICAgICAgICAgaWYgKHJlc3VsdC52YWx1ZSkge1xyXG4gICAgICAgICAgICAgICAgICAgICAgICBTd2FsLmZpcmUoe1xyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgdGV4dDogXCJZb3UgaGF2ZSBzaWduZWQgb3V0IFwiICsgZGV2aWNlTmFtZSArIFwiIS5cIixcclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgIGljb246IFwic3VjY2Vzc1wiLFxyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgYnV0dG9uc1N0eWxpbmc6IGZhbHNlLFxyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgY29uZmlybUJ1dHRvblRleHQ6IFwiT2ssIGdvdCBpdCFcIixcclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgIGN1c3RvbUNsYXNzOiB7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgY29uZmlybUJ1dHRvbjogXCJidG4gYnRuLXByaW1hcnlcIixcclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgIH1cclxuICAgICAgICAgICAgICAgICAgICAgICAgfSkudGhlbihmdW5jdGlvbigpe1xyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgYnV0dG9uLmNsb3Nlc3QoJ3RyJykucmVtb3ZlKCk7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgIH0pO1xyXG4gICAgICAgICAgICAgICAgICAgIH0gZWxzZSBpZiAocmVzdWx0LmRpc21pc3MgPT09ICdjYW5jZWwnKSB7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgIFN3YWwuZmlyZSh7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICB0ZXh0OiBkZXZpY2VOYW1lICsgXCIncyBzZXNzaW9uIGlzIHN0aWxsIHByZXNlcnZlZCEuXCIsXHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICBpY29uOiBcImVycm9yXCIsXHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICBidXR0b25zU3R5bGluZzogZmFsc2UsXHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICBjb25maXJtQnV0dG9uVGV4dDogXCJPaywgZ290IGl0IVwiLFxyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgY3VzdG9tQ2xhc3M6IHtcclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICBjb25maXJtQnV0dG9uOiBcImJ0biBidG4tcHJpbWFyeVwiLFxyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgfVxyXG4gICAgICAgICAgICAgICAgICAgICAgICB9KTtcclxuICAgICAgICAgICAgICAgICAgICB9XHJcbiAgICAgICAgICAgICAgICB9KTtcclxuICAgICAgICAgICAgfSk7XHJcbiAgICAgICAgfSk7XHJcblxyXG5cclxuICAgIH1cclxuXHJcbiAgICAvLyBEZWxldGUgdHdvIHN0ZXAgYXV0aGVudGljYXRpb24gaGFuZGxlclxyXG4gICAgY29uc3QgaW5pdERlbGV0ZVR3b1N0ZXAgPSAoKSA9PiB7XHJcbiAgICAgICAgY29uc3QgZGVsZXRlQnV0dG9uID0gZG9jdW1lbnQuZ2V0RWxlbWVudEJ5SWQoJ2t0X3VzZXJzX2RlbGV0ZV90d29fc3RlcCcpO1xyXG5cclxuICAgICAgICBkZWxldGVCdXR0b24uYWRkRXZlbnRMaXN0ZW5lcignY2xpY2snLCBlID0+IHtcclxuICAgICAgICAgICAgZS5wcmV2ZW50RGVmYXVsdCgpO1xyXG5cclxuICAgICAgICAgICAgU3dhbC5maXJlKHtcclxuICAgICAgICAgICAgICAgIHRleHQ6IFwiQXJlIHlvdSBzdXJlIHlvdSB3b3VsZCBsaWtlIHJlbW92ZSB0aGlzIHR3by1zdGVwIGF1dGhlbnRpY2F0aW9uP1wiLFxyXG4gICAgICAgICAgICAgICAgaWNvbjogXCJ3YXJuaW5nXCIsXHJcbiAgICAgICAgICAgICAgICBzaG93Q2FuY2VsQnV0dG9uOiB0cnVlLFxyXG4gICAgICAgICAgICAgICAgYnV0dG9uc1N0eWxpbmc6IGZhbHNlLFxyXG4gICAgICAgICAgICAgICAgY29uZmlybUJ1dHRvblRleHQ6IFwiWWVzLCByZW1vdmUgaXQhXCIsXHJcbiAgICAgICAgICAgICAgICBjYW5jZWxCdXR0b25UZXh0OiBcIk5vLCByZXR1cm5cIixcclxuICAgICAgICAgICAgICAgIGN1c3RvbUNsYXNzOiB7XHJcbiAgICAgICAgICAgICAgICAgICAgY29uZmlybUJ1dHRvbjogXCJidG4gYnRuLXByaW1hcnlcIixcclxuICAgICAgICAgICAgICAgICAgICBjYW5jZWxCdXR0b246IFwiYnRuIGJ0bi1hY3RpdmUtbGlnaHRcIlxyXG4gICAgICAgICAgICAgICAgfVxyXG4gICAgICAgICAgICB9KS50aGVuKGZ1bmN0aW9uIChyZXN1bHQpIHtcclxuICAgICAgICAgICAgICAgIGlmIChyZXN1bHQudmFsdWUpIHtcclxuICAgICAgICAgICAgICAgICAgICBTd2FsLmZpcmUoe1xyXG4gICAgICAgICAgICAgICAgICAgICAgICB0ZXh0OiBcIllvdSBoYXZlIHJlbW92ZWQgdGhpcyB0d28tc3RlcCBhdXRoZW50aWNhdGlvbiEuXCIsXHJcbiAgICAgICAgICAgICAgICAgICAgICAgIGljb246IFwic3VjY2Vzc1wiLFxyXG4gICAgICAgICAgICAgICAgICAgICAgICBidXR0b25zU3R5bGluZzogZmFsc2UsXHJcbiAgICAgICAgICAgICAgICAgICAgICAgIGNvbmZpcm1CdXR0b25UZXh0OiBcIk9rLCBnb3QgaXQhXCIsXHJcbiAgICAgICAgICAgICAgICAgICAgICAgIGN1c3RvbUNsYXNzOiB7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICBjb25maXJtQnV0dG9uOiBcImJ0biBidG4tcHJpbWFyeVwiLFxyXG4gICAgICAgICAgICAgICAgICAgICAgICB9XHJcbiAgICAgICAgICAgICAgICAgICAgfSk7XHJcbiAgICAgICAgICAgICAgICB9IGVsc2UgaWYgKHJlc3VsdC5kaXNtaXNzID09PSAnY2FuY2VsJykge1xyXG4gICAgICAgICAgICAgICAgICAgIFN3YWwuZmlyZSh7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgIHRleHQ6IFwiWW91ciB0d28tc3RlcCBhdXRoZW50aWNhdGlvbiBpcyBzdGlsbCB2YWxpZCEuXCIsXHJcbiAgICAgICAgICAgICAgICAgICAgICAgIGljb246IFwiZXJyb3JcIixcclxuICAgICAgICAgICAgICAgICAgICAgICAgYnV0dG9uc1N0eWxpbmc6IGZhbHNlLFxyXG4gICAgICAgICAgICAgICAgICAgICAgICBjb25maXJtQnV0dG9uVGV4dDogXCJPaywgZ290IGl0IVwiLFxyXG4gICAgICAgICAgICAgICAgICAgICAgICBjdXN0b21DbGFzczoge1xyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgY29uZmlybUJ1dHRvbjogXCJidG4gYnRuLXByaW1hcnlcIixcclxuICAgICAgICAgICAgICAgICAgICAgICAgfVxyXG4gICAgICAgICAgICAgICAgICAgIH0pO1xyXG4gICAgICAgICAgICAgICAgfVxyXG4gICAgICAgICAgICB9KTtcclxuICAgICAgICB9KVxyXG4gICAgfVxyXG5cclxuICAgIC8vIEVtYWlsIHByZWZlcmVuY2UgZm9ybSBoYW5kbGVyXHJcbiAgICBjb25zdCBpbml0RW1haWxQcmVmZXJlbmNlRm9ybSA9ICgpID0+IHtcclxuICAgICAgICAvLyBEZWZpbmUgdmFyaWFibGVzXHJcbiAgICAgICAgY29uc3QgZm9ybSA9IGRvY3VtZW50LmdldEVsZW1lbnRCeUlkKCdrdF91c2Vyc19lbWFpbF9ub3RpZmljYXRpb25fZm9ybScpO1xyXG4gICAgICAgIGNvbnN0IHN1Ym1pdEJ1dHRvbiA9IGZvcm0ucXVlcnlTZWxlY3RvcignI2t0X3VzZXJzX2VtYWlsX25vdGlmaWNhdGlvbl9zdWJtaXQnKTtcclxuICAgICAgICBjb25zdCBjYW5jZWxCdXR0b24gPSBmb3JtLnF1ZXJ5U2VsZWN0b3IoJyNrdF91c2Vyc19lbWFpbF9ub3RpZmljYXRpb25fY2FuY2VsJyk7XHJcblxyXG4gICAgICAgIC8vIFN1Ym1pdCBhY3Rpb24gaGFuZGxlclxyXG4gICAgICAgIHN1Ym1pdEJ1dHRvbi5hZGRFdmVudExpc3RlbmVyKCdjbGljaycsIGUgPT4ge1xyXG4gICAgICAgICAgICBlLnByZXZlbnREZWZhdWx0KCk7XHJcblxyXG4gICAgICAgICAgICAvLyBTaG93IGxvYWRpbmcgaW5kaWNhdGlvblxyXG4gICAgICAgICAgICBzdWJtaXRCdXR0b24uc2V0QXR0cmlidXRlKCdkYXRhLWt0LWluZGljYXRvcicsICdvbicpO1xyXG5cclxuICAgICAgICAgICAgLy8gRGlzYWJsZSBidXR0b24gdG8gYXZvaWQgbXVsdGlwbGUgY2xpY2sgXHJcbiAgICAgICAgICAgIHN1Ym1pdEJ1dHRvbi5kaXNhYmxlZCA9IHRydWU7XHJcblxyXG4gICAgICAgICAgICAvLyBTaW11bGF0ZSBmb3JtIHN1Ym1pc3Npb24uIEZvciBtb3JlIGluZm8gY2hlY2sgdGhlIHBsdWdpbidzIG9mZmljaWFsIGRvY3VtZW50YXRpb246IGh0dHBzOi8vc3dlZXRhbGVydDIuZ2l0aHViLmlvL1xyXG4gICAgICAgICAgICBzZXRUaW1lb3V0KGZ1bmN0aW9uICgpIHtcclxuICAgICAgICAgICAgICAgIC8vIFJlbW92ZSBsb2FkaW5nIGluZGljYXRpb25cclxuICAgICAgICAgICAgICAgIHN1Ym1pdEJ1dHRvbi5yZW1vdmVBdHRyaWJ1dGUoJ2RhdGEta3QtaW5kaWNhdG9yJyk7XHJcblxyXG4gICAgICAgICAgICAgICAgLy8gRW5hYmxlIGJ1dHRvblxyXG4gICAgICAgICAgICAgICAgc3VibWl0QnV0dG9uLmRpc2FibGVkID0gZmFsc2U7XHJcblxyXG4gICAgICAgICAgICAgICAgLy8gU2hvdyBwb3B1cCBjb25maXJtYXRpb24gXHJcbiAgICAgICAgICAgICAgICBTd2FsLmZpcmUoe1xyXG4gICAgICAgICAgICAgICAgICAgIHRleHQ6IFwiRm9ybSBoYXMgYmVlbiBzdWNjZXNzZnVsbHkgc3VibWl0dGVkIVwiLFxyXG4gICAgICAgICAgICAgICAgICAgIGljb246IFwic3VjY2Vzc1wiLFxyXG4gICAgICAgICAgICAgICAgICAgIGJ1dHRvbnNTdHlsaW5nOiBmYWxzZSxcclxuICAgICAgICAgICAgICAgICAgICBjb25maXJtQnV0dG9uVGV4dDogXCJPaywgZ290IGl0IVwiLFxyXG4gICAgICAgICAgICAgICAgICAgIGN1c3RvbUNsYXNzOiB7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgIGNvbmZpcm1CdXR0b246IFwiYnRuIGJ0bi1wcmltYXJ5XCJcclxuICAgICAgICAgICAgICAgICAgICB9XHJcbiAgICAgICAgICAgICAgICB9KTtcclxuXHJcbiAgICAgICAgICAgICAgICAvL2Zvcm0uc3VibWl0KCk7IC8vIFN1Ym1pdCBmb3JtXHJcbiAgICAgICAgICAgIH0sIDIwMDApO1xyXG4gICAgICAgIH0pO1xyXG5cclxuICAgICAgICBjYW5jZWxCdXR0b24uYWRkRXZlbnRMaXN0ZW5lcignY2xpY2snLCBlID0+IHtcclxuICAgICAgICAgICAgZS5wcmV2ZW50RGVmYXVsdCgpO1xyXG5cclxuICAgICAgICAgICAgU3dhbC5maXJlKHtcclxuICAgICAgICAgICAgICAgIHRleHQ6IFwiQXJlIHlvdSBzdXJlIHlvdSB3b3VsZCBsaWtlIHRvIGNhbmNlbD9cIixcclxuICAgICAgICAgICAgICAgIGljb246IFwid2FybmluZ1wiLFxyXG4gICAgICAgICAgICAgICAgc2hvd0NhbmNlbEJ1dHRvbjogdHJ1ZSxcclxuICAgICAgICAgICAgICAgIGJ1dHRvbnNTdHlsaW5nOiBmYWxzZSxcclxuICAgICAgICAgICAgICAgIGNvbmZpcm1CdXR0b25UZXh0OiBcIlllcywgY2FuY2VsIGl0IVwiLFxyXG4gICAgICAgICAgICAgICAgY2FuY2VsQnV0dG9uVGV4dDogXCJObywgcmV0dXJuXCIsXHJcbiAgICAgICAgICAgICAgICBjdXN0b21DbGFzczoge1xyXG4gICAgICAgICAgICAgICAgICAgIGNvbmZpcm1CdXR0b246IFwiYnRuIGJ0bi1wcmltYXJ5XCIsXHJcbiAgICAgICAgICAgICAgICAgICAgY2FuY2VsQnV0dG9uOiBcImJ0biBidG4tYWN0aXZlLWxpZ2h0XCJcclxuICAgICAgICAgICAgICAgIH1cclxuICAgICAgICAgICAgfSkudGhlbihmdW5jdGlvbiAocmVzdWx0KSB7XHJcbiAgICAgICAgICAgICAgICBpZiAocmVzdWx0LnZhbHVlKSB7XHJcbiAgICAgICAgICAgICAgICAgICAgZm9ybS5yZXNldCgpOyAvLyBSZXNldCBmb3JtXHRcdFx0XHRcclxuICAgICAgICAgICAgICAgIH0gZWxzZSBpZiAocmVzdWx0LmRpc21pc3MgPT09ICdjYW5jZWwnKSB7XHJcbiAgICAgICAgICAgICAgICAgICAgU3dhbC5maXJlKHtcclxuICAgICAgICAgICAgICAgICAgICAgICAgdGV4dDogXCJZb3VyIGZvcm0gaGFzIG5vdCBiZWVuIGNhbmNlbGxlZCEuXCIsXHJcbiAgICAgICAgICAgICAgICAgICAgICAgIGljb246IFwiZXJyb3JcIixcclxuICAgICAgICAgICAgICAgICAgICAgICAgYnV0dG9uc1N0eWxpbmc6IGZhbHNlLFxyXG4gICAgICAgICAgICAgICAgICAgICAgICBjb25maXJtQnV0dG9uVGV4dDogXCJPaywgZ290IGl0IVwiLFxyXG4gICAgICAgICAgICAgICAgICAgICAgICBjdXN0b21DbGFzczoge1xyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgY29uZmlybUJ1dHRvbjogXCJidG4gYnRuLXByaW1hcnlcIixcclxuICAgICAgICAgICAgICAgICAgICAgICAgfVxyXG4gICAgICAgICAgICAgICAgICAgIH0pO1xyXG4gICAgICAgICAgICAgICAgfVxyXG4gICAgICAgICAgICB9KTtcclxuICAgICAgICB9KTtcclxuICAgIH1cclxuXHJcblxyXG4gICAgcmV0dXJuIHtcclxuICAgICAgICAvLyBQdWJsaWMgZnVuY3Rpb25zXHJcbiAgICAgICAgaW5pdDogZnVuY3Rpb24gKCkge1xyXG4gICAgICAgICAgICBpbml0TG9naW5TZXNzaW9uKCk7XHJcbiAgICAgICAgICAgIGluaXRTaWduT3V0VXNlcigpO1xyXG4gICAgICAgICAgICBpbml0RGVsZXRlVHdvU3RlcCgpO1xyXG4gICAgICAgICAgICBpbml0RW1haWxQcmVmZXJlbmNlRm9ybSgpO1xyXG4gICAgICAgIH1cclxuICAgIH07XHJcbn0oKTtcclxuXHJcbi8vIE9uIGRvY3VtZW50IHJlYWR5XHJcbktUVXRpbC5vbkRPTUNvbnRlbnRMb2FkZWQoZnVuY3Rpb24gKCkge1xyXG4gICAgS1RVc2Vyc1ZpZXdNYWluLmluaXQoKTtcclxufSk7Il0sIm5hbWVzIjpbIktUVXNlcnNWaWV3TWFpbiIsImluaXRMb2dpblNlc3Npb24iLCJidXR0b24iLCJkb2N1bWVudCIsImdldEVsZW1lbnRCeUlkIiwiYWRkRXZlbnRMaXN0ZW5lciIsImUiLCJwcmV2ZW50RGVmYXVsdCIsIlN3YWwiLCJmaXJlIiwidGV4dCIsImljb24iLCJzaG93Q2FuY2VsQnV0dG9uIiwiYnV0dG9uc1N0eWxpbmciLCJjb25maXJtQnV0dG9uVGV4dCIsImNhbmNlbEJ1dHRvblRleHQiLCJjdXN0b21DbGFzcyIsImNvbmZpcm1CdXR0b24iLCJjYW5jZWxCdXR0b24iLCJ0aGVuIiwicmVzdWx0IiwidmFsdWUiLCJkaXNtaXNzIiwiaW5pdFNpZ25PdXRVc2VyIiwic2lnbk91dEJ1dHRvbnMiLCJxdWVyeVNlbGVjdG9yQWxsIiwiZm9yRWFjaCIsImRldmljZU5hbWUiLCJjbG9zZXN0IiwiaW5uZXJUZXh0IiwicmVtb3ZlIiwiaW5pdERlbGV0ZVR3b1N0ZXAiLCJkZWxldGVCdXR0b24iLCJpbml0RW1haWxQcmVmZXJlbmNlRm9ybSIsImZvcm0iLCJzdWJtaXRCdXR0b24iLCJxdWVyeVNlbGVjdG9yIiwic2V0QXR0cmlidXRlIiwiZGlzYWJsZWQiLCJzZXRUaW1lb3V0IiwicmVtb3ZlQXR0cmlidXRlIiwicmVzZXQiLCJpbml0IiwiS1RVdGlsIiwib25ET01Db250ZW50TG9hZGVkIl0sInNvdXJjZVJvb3QiOiIifQ==\n//# sourceURL=webpack-internal:///./resources/assets/core/js/custom/apps/user-management/users/view/view.js\n");

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module can't be inlined because the eval-source-map devtool is used.
/******/ 	var __webpack_exports__ = {};
/******/ 	__webpack_modules__["./resources/assets/core/js/custom/apps/user-management/users/view/view.js"]();
/******/ 	
/******/ })()
;