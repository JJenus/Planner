
    function _objectSpread(t) {
    for (var e = 1; e < arguments.length; e++) {
        var r = null != arguments[e] ? arguments[e] : {};
        e % 2
            ? ownKeys(Object(r), !0).forEach(function (e) {
                  _defineProperty(t, e, r[e]);
              })
            : Object.getOwnPropertyDescriptors
            ? Object.defineProperties(t, Object.getOwnPropertyDescriptors(r))
            : ownKeys(Object(r)).forEach(function (e) {
                  Object.defineProperty(t, e, Object.getOwnPropertyDescriptor(r, e));
              });
    }
    return t;
}

function ownKeys(t, e) {
    var r,
        n = Object.keys(t);
    return (
        Object.getOwnPropertySymbols &&
            ((r = Object.getOwnPropertySymbols(t)),
            e &&
                (r = r.filter(function (e) {
                    return Object.getOwnPropertyDescriptor(t, e).enumerable;
                })),
            n.push.apply(n, r)),
        n
    );
}

function _defineProperty(e, t, r) {
    return t in e ? Object.defineProperty(e, t, { value: r, enumerable: !0, configurable: !0, writable: !0 }) : (e[t] = r), e;
}
function _typeof(e) {
    return (_typeof =
        "function" == typeof Symbol && "symbol" == typeof Symbol.iterator
            ? function (e) {
                  return typeof e;
              }
            : function (e) {
                  return e && "function" == typeof Symbol && e.constructor === Symbol && e !== Symbol.prototype ? "symbol" : typeof e;
              })(e);
}

$(function() {
  function carousel() {
        !(function (e, t, r) {
            for (var n = 0; n < e.length; n++) t.call(r, n, e[n]);
        })(document.querySelectorAll(".cs-carousel .cs-carousel-inner"), function (e, t) {
            var r = {
                container: t,
                controlsText: ['<i class="fas fa-arrow-left"></i>', '<i class="fas fa-arrow-right"></i>'],
                navPosition: "top",
                controlsPosition: "top",
                mouseDrag: !0,
                speed: 600,
                autoplayHoverPause: !0,
                autoplayButtonOutput: !1,
            };
            null != t.dataset.carouselOptions && (n = JSON.parse(t.dataset.carouselOptions));
            var n = _objectSpread(_objectSpread({}, r), n);
            tns(n);
        });
    }
  carousel() 
}) 