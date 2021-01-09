(window["webpackJsonp"] = window["webpackJsonp"] || []).push([["microPostLiking"],{

/***/ "./assets/js/microPostLiking.js":
/*!**************************************!*\
  !*** ./assets/js/microPostLiking.js ***!
  \**************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(/*! core-js/modules/es.array.for-each */ "./node_modules/core-js/modules/es.array.for-each.js");

__webpack_require__(/*! core-js/modules/es.object.to-string */ "./node_modules/core-js/modules/es.object.to-string.js");

__webpack_require__(/*! core-js/modules/es.promise */ "./node_modules/core-js/modules/es.promise.js");

__webpack_require__(/*! core-js/modules/es.regexp.exec */ "./node_modules/core-js/modules/es.regexp.exec.js");

__webpack_require__(/*! core-js/modules/es.string.split */ "./node_modules/core-js/modules/es.string.split.js");

__webpack_require__(/*! core-js/modules/web.dom-collections.for-each */ "./node_modules/core-js/modules/web.dom-collections.for-each.js");

document.querySelectorAll('.btn-like').forEach(function (likeButton) {
  var likeButtonId = likeButton.id.split('-')[1];
  var likeButtonByIdElement = document.getElementById("microPostLikeBtn-".concat(likeButtonId));
  likeButtonByIdElement.addEventListener('click', function (event) {
    likeButtonByIdElement.disabled = true;
    fetch("/likes/like/".concat(likeButtonId), {
      credentials: "include"
    }).then(function (response) {
      response.json().then(function (json) {
        document.getElementById("microPostUnlikeCount-".concat(likeButtonId)).innerText = json.count;
        switchButtons(likeButtonByIdElement, document.getElementById("microPostUnlikeBtn-".concat(likeButtonId)));
      })["catch"](function () {
        switchButtons(likeButtonByIdElement, document.getElementById("microPostUnlikeBtn-".concat(likeButtonId)));
      });
    });
  });
});
document.querySelectorAll('.btn-unlike').forEach(function (unLikeButton) {
  var unLikeButtonId = unLikeButton.id.split('-')[1];
  var unLikeButtonByIdElement = document.getElementById("microPostUnlikeBtn-".concat(unLikeButtonId));
  unLikeButtonByIdElement.addEventListener('click', function (event) {
    unLikeButtonByIdElement.disabled = true;
    fetch("/likes/unlike/".concat(unLikeButtonId), {
      credentials: "include"
    }).then(function (response) {
      response.json().then(function (json) {
        document.getElementById("microPostLikeCount-".concat(unLikeButtonId)).innerText = json.count;
        switchButtons(unLikeButtonByIdElement, document.getElementById("microPostLikeBtn-".concat(unLikeButtonId)));
      })["catch"](function () {
        switchButtons(unLikeButtonByIdElement, document.getElementById("microPostLikeBtn-".concat(unLikeButtonId)));
      });
    });
  });
});

function switchButtons(button, oppositeButton) {
  button.disabled = false;
  button.style.display = 'none';
  oppositeButton.style.display = 'block';
}

/***/ })

},[["./assets/js/microPostLiking.js","runtime","vendors~microPostLiking"]]]);
//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9hc3NldHMvanMvbWljcm9Qb3N0TGlraW5nLmpzIl0sIm5hbWVzIjpbImRvY3VtZW50IiwicXVlcnlTZWxlY3RvckFsbCIsImZvckVhY2giLCJsaWtlQnV0dG9uIiwibGlrZUJ1dHRvbklkIiwiaWQiLCJzcGxpdCIsImxpa2VCdXR0b25CeUlkRWxlbWVudCIsImdldEVsZW1lbnRCeUlkIiwiYWRkRXZlbnRMaXN0ZW5lciIsImV2ZW50IiwiZGlzYWJsZWQiLCJmZXRjaCIsImNyZWRlbnRpYWxzIiwidGhlbiIsInJlc3BvbnNlIiwianNvbiIsImlubmVyVGV4dCIsImNvdW50Iiwic3dpdGNoQnV0dG9ucyIsInVuTGlrZUJ1dHRvbiIsInVuTGlrZUJ1dHRvbklkIiwidW5MaWtlQnV0dG9uQnlJZEVsZW1lbnQiLCJidXR0b24iLCJvcHBvc2l0ZUJ1dHRvbiIsInN0eWxlIiwiZGlzcGxheSJdLCJtYXBwaW5ncyI6Ijs7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7O0FBQ0FBLFFBQVEsQ0FBQ0MsZ0JBQVQsQ0FBMEIsV0FBMUIsRUFBdUNDLE9BQXZDLENBQStDLFVBQUFDLFVBQVUsRUFBSTtBQUN6RCxNQUFNQyxZQUFZLEdBQUdELFVBQVUsQ0FBQ0UsRUFBWCxDQUFjQyxLQUFkLENBQW9CLEdBQXBCLEVBQXlCLENBQXpCLENBQXJCO0FBQ0EsTUFBTUMscUJBQXFCLEdBQUdQLFFBQVEsQ0FBQ1EsY0FBVCw0QkFBNENKLFlBQTVDLEVBQTlCO0FBQ0FHLHVCQUFxQixDQUFDRSxnQkFBdEIsQ0FBdUMsT0FBdkMsRUFBZ0QsVUFBQ0MsS0FBRCxFQUFXO0FBQ3ZESCx5QkFBcUIsQ0FBQ0ksUUFBdEIsR0FBaUMsSUFBakM7QUFDQUMsU0FBSyx1QkFBZ0JSLFlBQWhCLEdBQStCO0FBQUNTLGlCQUFXLEVBQUM7QUFBYixLQUEvQixDQUFMLENBQ0tDLElBREwsQ0FDVSxVQUFVQyxRQUFWLEVBQW9CO0FBQ3RCQSxjQUFRLENBQUNDLElBQVQsR0FBZ0JGLElBQWhCLENBQXFCLFVBQVVFLElBQVYsRUFBZ0I7QUFDN0JoQixnQkFBUSxDQUFDUSxjQUFULGdDQUFnREosWUFBaEQsR0FDS2EsU0FETCxHQUNpQkQsSUFBSSxDQUFDRSxLQUR0QjtBQUVBQyxxQkFBYSxDQUFDWixxQkFBRCxFQUF1QlAsUUFBUSxDQUFDUSxjQUFULDhCQUE4Q0osWUFBOUMsRUFBdkIsQ0FBYjtBQUVILE9BTEwsV0FPVyxZQUFZO0FBQ2ZlLHFCQUFhLENBQUNaLHFCQUFELEVBQXVCUCxRQUFRLENBQUNRLGNBQVQsOEJBQThDSixZQUE5QyxFQUF2QixDQUFiO0FBQ0gsT0FUTDtBQVVILEtBWkw7QUFhSCxHQWZEO0FBZ0JILENBbkJEO0FBc0JBSixRQUFRLENBQUNDLGdCQUFULENBQTBCLGFBQTFCLEVBQXlDQyxPQUF6QyxDQUFpRCxVQUFBa0IsWUFBWSxFQUFJO0FBQzdELE1BQU1DLGNBQWMsR0FBR0QsWUFBWSxDQUFDZixFQUFiLENBQWdCQyxLQUFoQixDQUFzQixHQUF0QixFQUEyQixDQUEzQixDQUF2QjtBQUNBLE1BQU1nQix1QkFBdUIsR0FBR3RCLFFBQVEsQ0FBQ1EsY0FBVCw4QkFBOENhLGNBQTlDLEVBQWhDO0FBQ0FDLHlCQUF1QixDQUFDYixnQkFBeEIsQ0FBeUMsT0FBekMsRUFBa0QsVUFBQ0MsS0FBRCxFQUFXO0FBQ3pEWSwyQkFBdUIsQ0FBQ1gsUUFBeEIsR0FBbUMsSUFBbkM7QUFDQUMsU0FBSyx5QkFBa0JTLGNBQWxCLEdBQW1DO0FBQUNSLGlCQUFXLEVBQUM7QUFBYixLQUFuQyxDQUFMLENBQ0tDLElBREwsQ0FDVSxVQUFVQyxRQUFWLEVBQW9CO0FBQ3RCQSxjQUFRLENBQUNDLElBQVQsR0FBZ0JGLElBQWhCLENBQXFCLFVBQVVFLElBQVYsRUFBZ0I7QUFDN0JoQixnQkFBUSxDQUFDUSxjQUFULDhCQUE4Q2EsY0FBOUMsR0FDS0osU0FETCxHQUNpQkQsSUFBSSxDQUFDRSxLQUR0QjtBQUVBQyxxQkFBYSxDQUFDRyx1QkFBRCxFQUF5QnRCLFFBQVEsQ0FBQ1EsY0FBVCw0QkFBNENhLGNBQTVDLEVBQXpCLENBQWI7QUFFSCxPQUxMLFdBT1csWUFBWTtBQUNmRixxQkFBYSxDQUFDRyx1QkFBRCxFQUF5QnRCLFFBQVEsQ0FBQ1EsY0FBVCw0QkFBNENhLGNBQTVDLEVBQXpCLENBQWI7QUFDSCxPQVRMO0FBVUgsS0FaTDtBQWFILEdBZkQ7QUFnQkgsQ0FuQkQ7O0FBc0JBLFNBQVNGLGFBQVQsQ0FBdUJJLE1BQXZCLEVBQThCQyxjQUE5QixFQUNBO0FBQ1FELFFBQU0sQ0FBQ1osUUFBUCxHQUFrQixLQUFsQjtBQUNBWSxRQUFNLENBQUNFLEtBQVAsQ0FBYUMsT0FBYixHQUF1QixNQUF2QjtBQUNBRixnQkFBYyxDQUFDQyxLQUFmLENBQXFCQyxPQUFyQixHQUErQixPQUEvQjtBQUNQLEMiLCJmaWxlIjoibWljcm9Qb3N0TGlraW5nLmpzIiwic291cmNlc0NvbnRlbnQiOlsiXG5kb2N1bWVudC5xdWVyeVNlbGVjdG9yQWxsKCcuYnRuLWxpa2UnKS5mb3JFYWNoKGxpa2VCdXR0b24gPT4ge1xuICAgIGNvbnN0IGxpa2VCdXR0b25JZCA9IGxpa2VCdXR0b24uaWQuc3BsaXQoJy0nKVsxXTtcbiAgICBjb25zdCBsaWtlQnV0dG9uQnlJZEVsZW1lbnQgPSBkb2N1bWVudC5nZXRFbGVtZW50QnlJZChgbWljcm9Qb3N0TGlrZUJ0bi0ke2xpa2VCdXR0b25JZH1gKVxuICAgIGxpa2VCdXR0b25CeUlkRWxlbWVudC5hZGRFdmVudExpc3RlbmVyKCdjbGljaycsIChldmVudCkgPT4ge1xuICAgICAgICBsaWtlQnV0dG9uQnlJZEVsZW1lbnQuZGlzYWJsZWQgPSB0cnVlO1xuICAgICAgICBmZXRjaChgL2xpa2VzL2xpa2UvJHtsaWtlQnV0dG9uSWR9YCx7Y3JlZGVudGlhbHM6XCJpbmNsdWRlXCJ9KVxuICAgICAgICAgICAgLnRoZW4oZnVuY3Rpb24gKHJlc3BvbnNlKSB7XG4gICAgICAgICAgICAgICAgcmVzcG9uc2UuanNvbigpLnRoZW4oZnVuY3Rpb24gKGpzb24pIHtcbiAgICAgICAgICAgICAgICAgICAgICAgIGRvY3VtZW50LmdldEVsZW1lbnRCeUlkKGBtaWNyb1Bvc3RVbmxpa2VDb3VudC0ke2xpa2VCdXR0b25JZH1gKVxuICAgICAgICAgICAgICAgICAgICAgICAgICAgIC5pbm5lclRleHQgPSBqc29uLmNvdW50O1xuICAgICAgICAgICAgICAgICAgICAgICAgc3dpdGNoQnV0dG9ucyhsaWtlQnV0dG9uQnlJZEVsZW1lbnQsZG9jdW1lbnQuZ2V0RWxlbWVudEJ5SWQoYG1pY3JvUG9zdFVubGlrZUJ0bi0ke2xpa2VCdXR0b25JZH1gKSlcblxuICAgICAgICAgICAgICAgICAgICB9XG4gICAgICAgICAgICAgICAgKVxuICAgICAgICAgICAgICAgICAgICAuY2F0Y2goZnVuY3Rpb24gKCkge1xuICAgICAgICAgICAgICAgICAgICAgICAgc3dpdGNoQnV0dG9ucyhsaWtlQnV0dG9uQnlJZEVsZW1lbnQsZG9jdW1lbnQuZ2V0RWxlbWVudEJ5SWQoYG1pY3JvUG9zdFVubGlrZUJ0bi0ke2xpa2VCdXR0b25JZH1gKSlcbiAgICAgICAgICAgICAgICAgICAgfSlcbiAgICAgICAgICAgIH0pXG4gICAgfSlcbn0pXG5cblxuZG9jdW1lbnQucXVlcnlTZWxlY3RvckFsbCgnLmJ0bi11bmxpa2UnKS5mb3JFYWNoKHVuTGlrZUJ1dHRvbiA9PiB7XG4gICAgY29uc3QgdW5MaWtlQnV0dG9uSWQgPSB1bkxpa2VCdXR0b24uaWQuc3BsaXQoJy0nKVsxXTtcbiAgICBjb25zdCB1bkxpa2VCdXR0b25CeUlkRWxlbWVudCA9IGRvY3VtZW50LmdldEVsZW1lbnRCeUlkKGBtaWNyb1Bvc3RVbmxpa2VCdG4tJHt1bkxpa2VCdXR0b25JZH1gKVxuICAgIHVuTGlrZUJ1dHRvbkJ5SWRFbGVtZW50LmFkZEV2ZW50TGlzdGVuZXIoJ2NsaWNrJywgKGV2ZW50KSA9PiB7XG4gICAgICAgIHVuTGlrZUJ1dHRvbkJ5SWRFbGVtZW50LmRpc2FibGVkID0gdHJ1ZTtcbiAgICAgICAgZmV0Y2goYC9saWtlcy91bmxpa2UvJHt1bkxpa2VCdXR0b25JZH1gLHtjcmVkZW50aWFsczpcImluY2x1ZGVcIn0pXG4gICAgICAgICAgICAudGhlbihmdW5jdGlvbiAocmVzcG9uc2UpIHtcbiAgICAgICAgICAgICAgICByZXNwb25zZS5qc29uKCkudGhlbihmdW5jdGlvbiAoanNvbikge1xuICAgICAgICAgICAgICAgICAgICAgICAgZG9jdW1lbnQuZ2V0RWxlbWVudEJ5SWQoYG1pY3JvUG9zdExpa2VDb3VudC0ke3VuTGlrZUJ1dHRvbklkfWApXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgLmlubmVyVGV4dCA9IGpzb24uY291bnQ7XG4gICAgICAgICAgICAgICAgICAgICAgICBzd2l0Y2hCdXR0b25zKHVuTGlrZUJ1dHRvbkJ5SWRFbGVtZW50LGRvY3VtZW50LmdldEVsZW1lbnRCeUlkKGBtaWNyb1Bvc3RMaWtlQnRuLSR7dW5MaWtlQnV0dG9uSWR9YCkpXG5cbiAgICAgICAgICAgICAgICAgICAgfVxuICAgICAgICAgICAgICAgIClcbiAgICAgICAgICAgICAgICAgICAgLmNhdGNoKGZ1bmN0aW9uICgpIHtcbiAgICAgICAgICAgICAgICAgICAgICAgIHN3aXRjaEJ1dHRvbnModW5MaWtlQnV0dG9uQnlJZEVsZW1lbnQsZG9jdW1lbnQuZ2V0RWxlbWVudEJ5SWQoYG1pY3JvUG9zdExpa2VCdG4tJHt1bkxpa2VCdXR0b25JZH1gKSlcbiAgICAgICAgICAgICAgICAgICAgfSlcbiAgICAgICAgICAgIH0pXG4gICAgfSlcbn0pXG5cblxuZnVuY3Rpb24gc3dpdGNoQnV0dG9ucyhidXR0b24sb3Bwb3NpdGVCdXR0b24pXG57XG4gICAgICAgIGJ1dHRvbi5kaXNhYmxlZCA9IGZhbHNlO1xuICAgICAgICBidXR0b24uc3R5bGUuZGlzcGxheSA9ICdub25lJztcbiAgICAgICAgb3Bwb3NpdGVCdXR0b24uc3R5bGUuZGlzcGxheSA9ICdibG9jayc7XG59XG4iXSwic291cmNlUm9vdCI6IiJ9