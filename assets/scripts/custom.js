"use strict";
/* eslint-disable no-undef */

/* eslint-disable no-unused-vars */

/*!
 * Essential javascript functions/variables
 *
 * @author      _a
 * @version     0.1.0
 * @since       _s_1.0.0.0
 *
 */

/*==================================================================================
  General Variables & Presets
==================================================================================*/

/* Viewport Width
/––––––––––––––––––––––––*/

var $vpWidth = jQuery(window).width();
/* Touch Device
/––––––––––––––––––––––––*/

var $root = $('html');
var isTouch = ('ontouchstart' in document.documentElement);

if (isTouch) {
  $root.attr('data-touch', 'true');
} else {
  $root.attr('data-touch', 'false');
}
/* Debouncer
/––––––––––––––––––––––––*/
// prevents functions to execute to often/fast
// Usage:
// var myfunction = debounce(function() {
//   // function stuff
// }, 250);
// window.addEventListener('resize', myfunction);


function debouncer(func, wait, immediate) {
  var timeout;
  return function () {
    var context = this,
        args = arguments;

    var later = function later() {
      timeout = null;

      if (!immediate) {
        func.apply(context, args);
      }
    };

    var callNow = immediate && !timeout;
    clearTimeout(timeout);
    timeout = setTimeout(later, wait);

    if (callNow) {
      func.apply(context, args);
    }
  };
}

$('.burger').click(function () {
  $(this).toggleClass('active');
  $('.navbar-collapse').toggleClass('active');
  return false;
}); // Carrousel

var $carrousel = $('#carrousel');
var $images = $('#carrousel li');
var $compt = 0;

function changeBubbleColor(a) {
  a.css({
    backgroundColor: '#839499',
    transform: 'scale(1)'
  });
  a.eq($compt).css({
    backgroundColor: '#1B2A2F',
    transform: 'scale(1.3)'
  });
}

function switchImages() {
  var $currentImg = $images.eq($compt);
  $images.fadeOut(500);
  $currentImg.fadeIn(500);
}

switchImages();
var $prevBtn = $('.prevBtn');
var $nextBtn = $('.nextBtn');
$prevBtn.on('click', function () {
  if ($compt <= 0) {
    $compt = $images.length - 1;
  } else {
    $compt--;
  }

  switchImages();
  changeBubbleColor($bubbles);
});
$nextBtn.on('click', function () {
  if ($compt >= $images.length - 1) {
    $compt = 0;
  } else {
    $compt++;
  }

  switchImages();
  changeBubbleColor($bubbles);
}); // Fonction diporama qui change l'image automatiquement toute les 10 secondes

function slideShow() {
  setTimeout(function () {
    if ($compt >= $images.length - 1) {
      $compt = 0;
    } else {
      $compt++;
    }

    switchImages();
    changeBubbleColor($bubbles);
    slideShow(); // relance la fonction
  }, 10000);
}

slideShow(); // on oublie pas de lancer la fonction une première fois
// Pour chaque image, crée une bulle correspondante en dessous

$images.each(function () {
  $('.bubbles').append("<li><a data-target=\"#\"></a></li>");
});
var $bubbles = $('.bubbles a'); // Changement dynamique des images lors des clics sur les bulles

$bubbles.each(function () {
  $(this).on('click', function () {
    // Si l'index de la bulle est déjà égal au compteur, alors n'éxécute pas la fonction
    if ($bubbles.index($(this)) == $compt) {
      return false;
    } // Le compteur prend la valeur de l'index du lien (bulle) dans le tableau $bubbles


    $compt = $bubbles.index($(this));
    switchImages();
    changeBubbleColor($bubbles);
  });
});
changeBubbleColor($bubbles); // FAQ

var faqs = document.querySelectorAll(".accordion__item__header");

function toggleAccordion() {
  var itemToggle = this.getAttribute('aria-expanded');

  for (var i = 0; i < faqs.length; i++) {
    faqs[i].setAttribute('aria-expanded', 'false');
  }

  if (itemToggle == 'false') {
    this.setAttribute('aria-expanded', 'true');
  }
}

faqs.forEach(function (item) {
  return item.addEventListener('click', toggleAccordion);
});
"use strict";
/* eslint-disable no-undef */

/* eslint-disable vars-on-top */

/*!
 * All sorts javascript/jQuery functions
 *
 * @author      _a
 * @version     0.1.0
 * @since       _s_1.0.0.0
 *
 */

/*==================================================================================
  Functions
==================================================================================*/


$(function () {
  /* Global Settings
  /––––––––––––––––––––––––*/
  // custom vars that need to be global
  // get current language
  // eslint-disable-next-line no-unused-vars
  var activeLang = $('html').attr('data-lang');
  /* Modernizr Fix: 'object-fit'
   /––––––––––––––––––––––––––––––––*/
  // displays images with the object-fit attribute as background-images for older browsers

  $(function () {
    if (!Modernizr.objectfit) {
      $('img.mdrnz-of').each(function () {
        // Check if image has attribute 'object-fit'
        var $img = $(this);
        imgUrl = $img.prop('src');
        classes = $img.attr('class');

        if (imgUrl) {
          // Replace img with a div containing the image as background-image and get background-image value from object-fit
          $img.replaceWith('<div class="' + classes + '" style="background-image:url(' + imgUrl + ')');
        }
      });
    }
  });
  /* Smooth Anchor Scrolling
   /––––––––––––––––––––––––*/
  // https://css-tricks.com/snippets/jquery/smooth-scrolling/
  // Select all links with hashes

  $('a[href*="#"]') // Remove links that don't actually link to anything
  .not('[href="#"]').not('[href="#0"]').click(function (event) {
    // define custom offset (examples: 50 or -200 or (".anchor").height();)
    var customOffset = 0; // On-page links

    if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
      // Figure out element to scroll to
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) + ']'); // Does a scroll target exist?

      if (target.length) {
        // Only prevent default if animation is actually gonna happen
        event.preventDefault();
        $('html, body').animate({
          scrollTop: target.offset().top + customOffset
        }, 500, function () {
          // Callback after animation
          // Must change focus!
          var $target = $(target);
          $target.focus();

          if ($target.is(':focus')) {
            // Checking if the target was focused
            return false;
          } else {
            $target.attr('tabindex', '-1'); // Adding tabindex for elements not focusable

            $target.focus(); // Set focus again
          }
        });
      }
    }
  }); // Stats
  // Remove svg.radial-progress .complete inline styling

  $('svg.radial-progress').each(function () {
    $(this).find($('circle.complete')).removeAttr('style');
  }); // Activate progress animation on scroll

  $(window).scroll(function () {
    $('svg.radial-progress').each(function (index, value) {
      // If svg.radial-progress is approximately 25% vertically into the window when scrolling from the top or the bottom
      if ($(window).scrollTop() > $(this).offset().top - $(window).height() * 0.75 && $(window).scrollTop() < $(this).offset().top + $(this).height() - $(window).height() * 0.25) {
        // Get percentage of progress
        var percent = $(value).data('percentage'); // Get radius of the svg's circle.complete

        var radius = $(this).find($('circle.complete')).attr('r'); // Get circumference (2πr)

        var circumference = 2 * Math.PI * radius; // Get stroke-dashoffset value based on the percentage of the circumference

        var strokeDashOffset = circumference - percent * circumference / 100; // Transition progress for 1.25 seconds

        $(this).find($('circle.complete')).animate({
          'stroke-dashoffset': strokeDashOffset
        }, 1250);
      }
    });
  }).trigger('scroll');
});
"use strict";

function _typeof(obj) {
  "@babel/helpers - typeof";

  if (typeof Symbol === "function" && typeof Symbol.iterator === "symbol") {
    _typeof = function _typeof(obj) {
      return typeof obj;
    };
  } else {
    _typeof = function _typeof(obj) {
      return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj;
    };
  }

  return _typeof(obj);
}
/* eslint-disable no-undef */

/* eslint-disable no-empty */

/* eslint-disable no-prototype-builtins */

/* eslint-disable vars-on-top */

/*! modernizr 3.5.0 (Custom Build) | MIT *
 * https://modernizr.com/download/?-objectfit-setclasses !*/


!function (e, n, t) {
  function r(e, n) {
    return _typeof(e) === n;
  }

  function o() {
    var e, n, t, o, i, s, a;

    for (var l in h) {
      if (h.hasOwnProperty(l)) {
        if (e = [], n = h[l], n.name && (e.push(n.name.toLowerCase()), n.options && n.options.aliases && n.options.aliases.length)) {
          for (t = 0; t < n.options.aliases.length; t++) {
            e.push(n.options.aliases[t].toLowerCase());
          }
        }

        for (o = r(n.fn, 'function') ? n.fn() : n.fn, i = 0; i < e.length; i++) {
          s = e[i], a = s.split('.'), 1 === a.length ? Modernizr[a[0]] = o : (!Modernizr[a[0]] || Modernizr[a[0]] instanceof Boolean || (Modernizr[a[0]] = new Boolean(Modernizr[a[0]])), Modernizr[a[0]][a[1]] = o), S.push((o ? '' : 'no-') + a.join('-'));
        }
      }
    }
  }

  function i(e) {
    var n = _.className,
        t = Modernizr._config.classPrefix || '';

    if (w && (n = n.baseVal), Modernizr._config.enableJSClass) {
      var r = new RegExp('(^|\\s)' + t + 'no-js(\\s|$)');
      n = n.replace(r, '$1' + t + 'js$2');
    }

    Modernizr._config.enableClasses && (n += ' ' + t + e.join(' ' + t), w ? _.className.baseVal = n : _.className = n);
  }

  function s(e, n) {
    return !!~('' + e).indexOf(n);
  }

  function a() {
    return 'function' != typeof n.createElement ? n.createElement(arguments[0]) : w ? n.createElementNS.call(n, 'http://www.w3.org/2000/svg', arguments[0]) : n.createElement.apply(n, arguments);
  }

  function l() {
    var e = n.body;
    return e || (e = a(w ? 'svg' : 'body'), e.fake = !0), e;
  }

  function f(e, t, r, o) {
    var i,
        s,
        f,
        u,
        p = 'modernizr',
        c = a('div'),
        d = l();

    if (parseInt(r, 10)) {
      for (; r--;) {
        f = a('div'), f.id = o ? o[r] : p + (r + 1), c.appendChild(f);
      }
    }

    return i = a('style'), i.type = 'text/css', i.id = 's' + p, (d.fake ? d : c).appendChild(i), d.appendChild(c), i.styleSheet ? i.styleSheet.cssText = e : i.appendChild(n.createTextNode(e)), c.id = p, d.fake && (d.style.background = '', d.style.overflow = 'hidden', u = _.style.overflow, _.style.overflow = 'hidden', _.appendChild(d)), s = t(c, e), d.fake ? (d.parentNode.removeChild(d), _.style.overflow = u, _.offsetHeight) : c.parentNode.removeChild(c), !!s;
  }

  function u(e) {
    return e.replace(/([A-Z])/g, function (e, n) {
      return '-' + n.toLowerCase();
    }).replace(/^ms-/, '-ms-');
  }

  function p(n, t, r) {
    var o;

    if ('getComputedStyle' in e) {
      o = getComputedStyle.call(e, n, t);
      var i = e.console;

      if (null !== o) {
        r && (o = o.getPropertyValue(r));
      } else if (i) {
        var s = i.error ? 'error' : 'log';
        i[s].call(i, 'getComputedStyle returning null, its possible modernizr test results are inaccurate');
      }
    } else {
      o = !t && n.currentStyle && n.currentStyle[r];
    }

    return o;
  }

  function c(n, r) {
    var o = n.length;

    if ('CSS' in e && 'supports' in e.CSS) {
      for (; o--;) {
        if (e.CSS.supports(u(n[o]), r)) {
          return !0;
        }
      }

      return !1;
    }

    if ('CSSSupportsRule' in e) {
      for (var i = []; o--;) {
        i.push('(' + u(n[o]) + ':' + r + ')');
      }

      return i = i.join(' or '), f('@supports (' + i + ') { #modernizr { position: absolute; } }', function (e) {
        return 'absolute' == p(e, null, 'position');
      });
    }

    return t;
  }

  function d(e) {
    return e.replace(/([a-z])-([a-z])/g, function (e, n, t) {
      return n + t.toUpperCase();
    }).replace(/^-/, '');
  }

  function m(e, n, o, i) {
    function l() {
      u && (delete j.style, delete j.modElem);
    }

    if (i = r(i, 'undefined') ? !1 : i, !r(o, 'undefined')) {
      var f = c(e, o);

      if (!r(f, 'undefined')) {
        return f;
      }
    }

    for (var u, p, m, v, y, g = ['modernizr', 'tspan', 'samp']; !j.style && g.length;) {
      u = !0, j.modElem = a(g.shift()), j.style = j.modElem.style;
    }

    for (m = e.length, p = 0; m > p; p++) {
      if (v = e[p], y = j.style[v], s(v, '-') && (v = d(v)), j.style[v] !== t) {
        if (i || r(o, 'undefined')) {
          return l(), 'pfx' == n ? v : !0;
        }

        try {
          j.style[v] = o;
        } catch (h) {}

        if (j.style[v] != y) {
          return l(), 'pfx' == n ? v : !0;
        }
      }
    }

    return l(), !1;
  }

  function v(e, n) {
    return function () {
      return e.apply(n, arguments);
    };
  }

  function y(e, n, t) {
    var o;

    for (var i in e) {
      if (e[i] in n) {
        return t === !1 ? e[i] : (o = n[e[i]], r(o, 'function') ? v(o, t || n) : o);
      }
    }

    return !1;
  }

  function g(e, n, t, o, i) {
    var s = e.charAt(0).toUpperCase() + e.slice(1),
        a = (e + ' ' + b.join(s + ' ') + s).split(' ');
    return r(n, 'string') || r(n, 'undefined') ? m(a, n, o, i) : (a = (e + ' ' + z.join(s + ' ') + s).split(' '), y(a, n, t));
  }

  var h = [],
      C = {
    _version: '3.5.0',
    _config: {
      classPrefix: '',
      enableClasses: !0,
      enableJSClass: !0,
      usePrefixes: !0
    },
    _q: [],
    on: function on(e, n) {
      var t = this;
      setTimeout(function () {
        n(t[e]);
      }, 0);
    },
    addTest: function addTest(e, n, t) {
      h.push({
        name: e,
        fn: n,
        options: t
      });
    },
    addAsyncTest: function addAsyncTest(e) {
      h.push({
        name: null,
        fn: e
      });
    }
  },
      Modernizr = function Modernizr() {};

  Modernizr.prototype = C, Modernizr = new Modernizr();

  var S = [],
      _ = n.documentElement,
      w = 'svg' === _.nodeName.toLowerCase(),
      x = 'Moz O ms Webkit',
      b = C._config.usePrefixes ? x.split(' ') : [];

  C._cssomPrefixes = b;
  var E = {
    elem: a('modernizr')
  };

  Modernizr._q.push(function () {
    delete E.elem;
  });

  var j = {
    style: E.elem.style
  };

  Modernizr._q.unshift(function () {
    delete j.style;
  });

  var z = C._config.usePrefixes ? x.toLowerCase().split(' ') : [];
  C._domPrefixes = z, C.testAllProps = g;

  var P = function P(n) {
    var r,
        o = prefixes.length,
        i = e.CSSRule;

    if ('undefined' == typeof i) {
      return t;
    }

    if (!n) {
      return !1;
    }

    if (n = n.replace(/^@/, ''), r = n.replace(/-/g, '_').toUpperCase() + '_RULE', r in i) {
      return '@' + n;
    }

    for (var s = 0; o > s; s++) {
      var a = prefixes[s],
          l = a.toUpperCase() + '_' + r;

      if (l in i) {
        return '@-' + a.toLowerCase() + '-' + n;
      }
    }

    return !1;
  };

  C.atRule = P;

  var N = C.prefixed = function (e, n, t) {
    return 0 === e.indexOf('@') ? P(e) : (-1 != e.indexOf('-') && (e = d(e)), n ? g(e, n, t) : g(e, 'pfx'));
  };

  Modernizr.addTest('objectfit', !!N('objectFit'), {
    aliases: ['object-fit']
  }), o(), i(S), delete C.addTest, delete C.addAsyncTest;

  for (var T = 0; T < Modernizr._q.length; T++) {
    Modernizr._q[T]();
  }

  e.Modernizr = Modernizr;
}(window, document);
"use strict";

function _typeof2(obj) { "@babel/helpers - typeof"; if (typeof Symbol === "function" && typeof Symbol.iterator === "symbol") { _typeof2 = function _typeof2(obj) { return typeof obj; }; } else { _typeof2 = function _typeof2(obj) { return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }; } return _typeof2(obj); }

var $vpWidth = jQuery(window).width(),
    $root = $("html"),
    isTouch = ("ontouchstart" in document.documentElement);

function debouncer(o, r, i) {
  var s;
  return function () {
    var e = this,
        t = arguments,
        n = i && !s;
    clearTimeout(s), s = setTimeout(function () {
      s = null, i || o.apply(e, t);
    }, r), n && o.apply(e, t);
  };
}

isTouch ? $root.attr("data-touch", "true") : $root.attr("data-touch", "false"), $(".burger").click(function () {
  return $(this).toggleClass("active"), $(".navbar-collapse").toggleClass("active"), !1;
});
var $carrousel = $("#carrousel"),
    $images = $("#carrousel li"),
    $compt = 0;

function changeBubbleColor(e) {
  e.css({
    backgroundColor: "#839499",
    transform: "scale(1)"
  }), e.eq($compt).css({
    backgroundColor: "#1B2A2F",
    transform: "scale(1.3)"
  });
}

function switchImages() {
  var e = $images.eq($compt);
  $images.fadeOut(500), e.fadeIn(500);
}

switchImages();
var $prevBtn = $(".prevBtn"),
    $nextBtn = $(".nextBtn");

function slideShow() {
  setTimeout(function () {
    $compt >= $images.length - 1 ? $compt = 0 : $compt++, switchImages(), changeBubbleColor($bubbles), slideShow();
  }, 1e4);
}

$prevBtn.on("click", function () {
  $compt <= 0 ? $compt = $images.length - 1 : $compt--, switchImages(), changeBubbleColor($bubbles);
}), $nextBtn.on("click", function () {
  $compt >= $images.length - 1 ? $compt = 0 : $compt++, switchImages(), changeBubbleColor($bubbles);
}), slideShow(), $images.each(function () {
  $(".bubbles").append('<li><a data-target="#"></a></li>');
});
var $bubbles = $(".bubbles a");
$bubbles.each(function () {
  $(this).on("click", function () {
    if ($bubbles.index($(this)) == $compt) return !1;
    $compt = $bubbles.index($(this)), switchImages(), changeBubbleColor($bubbles);
  });
}), changeBubbleColor($bubbles);
var faqs = document.querySelectorAll(".accordion__item__header");

function toggleAccordion() {
  for (var e = this.getAttribute("aria-expanded"), t = 0; t < faqs.length; t++) {
    faqs[t].setAttribute("aria-expanded", "false");
  }

  "false" == e && this.setAttribute("aria-expanded", "true");
}

function _typeof(e) {
  return (_typeof = "function" == typeof Symbol && "symbol" == _typeof2(Symbol.iterator) ? function (e) {
    return _typeof2(e);
  } : function (e) {
    return e && "function" == typeof Symbol && e.constructor === Symbol && e !== Symbol.prototype ? "symbol" : _typeof2(e);
  })(e);
}

faqs.forEach(function (e) {
  return e.addEventListener("click", toggleAccordion);
}), $(function () {
  $("html").attr("data-lang");
  $(function () {
    Modernizr.objectfit || $("img.mdrnz-of").each(function () {
      var e = $(this);
      imgUrl = e.prop("src"), classes = e.attr("class"), imgUrl && e.replaceWith('<div class="' + classes + '" style="background-image:url(' + imgUrl + ")");
    });
  }), $('a[href*="#"]').not('[href="#"]').not('[href="#0"]').click(function (e) {
    if (location.pathname.replace(/^\//, "") == this.pathname.replace(/^\//, "") && location.hostname == this.hostname) {
      var t = $(this.hash);
      (t = t.length ? t : $("[name=" + this.hash.slice(1) + "]")).length && (e.preventDefault(), $("html, body").animate({
        scrollTop: t.offset().top + 0
      }, 500, function () {
        var e = $(t);
        if (e.focus(), e.is(":focus")) return !1;
        e.attr("tabindex", "-1"), e.focus();
      }));
    }
  }), $("svg.radial-progress").each(function () {
    $(this).find($("circle.complete")).removeAttr("style");
  }), $(window).scroll(function () {
    $("svg.radial-progress").each(function (e, t) {
      if ($(window).scrollTop() > $(this).offset().top - .75 * $(window).height() && $(window).scrollTop() < $(this).offset().top + $(this).height() - .25 * $(window).height()) {
        var n = $(t).data("percentage"),
            o = $(this).find($("circle.complete")).attr("r"),
            r = 2 * Math.PI * o,
            i = r - n * r / 100;
        $(this).find($("circle.complete")).animate({
          "stroke-dashoffset": i
        }, 1250);
      }
    });
  }).trigger("scroll");
}), function (s, p, d) {
  function h(e, t) {
    return _typeof(e) === t;
  }

  function m() {
    return "function" != typeof p.createElement ? p.createElement(arguments[0]) : v ? p.createElementNS.call(p, "http://www.w3.org/2000/svg", arguments[0]) : p.createElement.apply(p, arguments);
  }

  function r(e, t, n, o) {
    var r,
        i,
        s,
        a,
        l,
        c = "modernizr",
        u = m("div"),
        f = ((l = p.body) || ((l = m(v ? "svg" : "body")).fake = !0), l);
    if (parseInt(n, 10)) for (; n--;) {
      (s = m("div")).id = o ? o[n] : c + (n + 1), u.appendChild(s);
    }
    return (r = m("style")).type = "text/css", r.id = "s" + c, (f.fake ? f : u).appendChild(r), f.appendChild(u), r.styleSheet ? r.styleSheet.cssText = e : r.appendChild(p.createTextNode(e)), u.id = c, f.fake && (f.style.background = "", f.style.overflow = "hidden", a = b.style.overflow, b.style.overflow = "hidden", b.appendChild(f)), i = t(u, e), f.fake ? (f.parentNode.removeChild(f), b.style.overflow = a, b.offsetHeight) : u.parentNode.removeChild(u), !!i;
  }

  function i(e) {
    return e.replace(/([A-Z])/g, function (e, t) {
      return "-" + t.toLowerCase();
    }).replace(/^ms-/, "-ms-");
  }

  function g(e, t) {
    var n = e.length;

    if ("CSS" in s && "supports" in s.CSS) {
      for (; n--;) {
        if (s.CSS.supports(i(e[n]), t)) return !0;
      }

      return !1;
    }

    if ("CSSSupportsRule" in s) {
      for (var o = []; n--;) {
        o.push("(" + i(e[n]) + ":" + t + ")");
      }

      return r("@supports (" + (o = o.join(" or ")) + ") { #modernizr { position: absolute; } }", function (e) {
        return "absolute" == function (e, t, n) {
          var o;

          if ("getComputedStyle" in s) {
            o = getComputedStyle.call(s, e, t);
            var r = s.console;
            null !== o ? n && (o = o.getPropertyValue(n)) : r && r[r.error ? "error" : "log"].call(r, "getComputedStyle returning null, its possible modernizr test results are inaccurate");
          } else o = !t && e.currentStyle && e.currentStyle[n];

          return o;
        }(e, null, "position");
      });
    }

    return d;
  }

  function $(e) {
    return e.replace(/([a-z])-([a-z])/g, function (e, t, n) {
      return t + n.toUpperCase();
    }).replace(/^-/, "");
  }

  function a(e, t) {
    return function () {
      return e.apply(t, arguments);
    };
  }

  function o(e, t, n, o, r) {
    var i = e.charAt(0).toUpperCase() + e.slice(1),
        s = (e + " " + f.join(i + " ") + i).split(" ");
    return h(t, "string") || h(t, "undefined") ? function (e, t, n, o) {
      function r() {
        s && (delete y.style, delete y.modElem);
      }

      if (o = !h(o, "undefined") && o, !h(n, "undefined")) {
        var i = g(e, n);
        if (!h(i, "undefined")) return i;
      }

      for (var s, a, l, c, u, f = ["modernizr", "tspan", "samp"]; !y.style && f.length;) {
        s = !0, y.modElem = m(f.shift()), y.style = y.modElem.style;
      }

      for (l = e.length, a = 0; a < l; a++) {
        if (c = e[a], u = y.style[c], !!~("" + c).indexOf("-") && (c = $(c)), y.style[c] !== d) {
          if (o || h(n, "undefined")) return r(), "pfx" != t || c;

          try {
            y.style[c] = n;
          } catch (e) {}

          if (y.style[c] != u) return r(), "pfx" != t || c;
        }
      }

      return r(), !1;
    }(s, t, o, r) : function (e, t, n) {
      var o;

      for (var r in e) {
        if (e[r] in t) return !1 === n ? e[r] : h(o = t[e[r]], "function") ? a(o, n || t) : o;
      }

      return !1;
    }(s = (e + " " + w.join(i + " ") + i).split(" "), t, n);
  }

  var l = [],
      e = {
    _version: "3.5.0",
    _config: {
      classPrefix: "",
      enableClasses: !0,
      enableJSClass: !0,
      usePrefixes: !0
    },
    _q: [],
    on: function on(e, t) {
      var n = this;
      setTimeout(function () {
        t(n[e]);
      }, 0);
    },
    addTest: function addTest(e, t, n) {
      l.push({
        name: e,
        fn: t,
        options: n
      });
    },
    addAsyncTest: function addAsyncTest(e) {
      l.push({
        name: null,
        fn: e
      });
    }
  },
      c = function c() {};

  c.prototype = e, c = new c();
  var u = [],
      b = p.documentElement,
      v = "svg" === b.nodeName.toLowerCase(),
      t = "Moz O ms Webkit",
      f = e._config.usePrefixes ? t.split(" ") : [];
  e._cssomPrefixes = f;
  var n = {
    elem: m("modernizr")
  };

  c._q.push(function () {
    delete n.elem;
  });

  var y = {
    style: n.elem.style
  };

  c._q.unshift(function () {
    delete y.style;
  });

  var w = e._config.usePrefixes ? t.toLowerCase().split(" ") : [];
  e._domPrefixes = w, e.testAllProps = o;

  var C = function C(e) {
    var t,
        n = prefixes.length,
        o = s.CSSRule;
    if (void 0 === o) return d;
    if (!e) return !1;
    if ((t = (e = e.replace(/^@/, "")).replace(/-/g, "_").toUpperCase() + "_RULE") in o) return "@" + e;

    for (var r = 0; r < n; r++) {
      var i = prefixes[r];
      if (i.toUpperCase() + "_" + t in o) return "@-" + i.toLowerCase() + "-" + e;
    }

    return !1;
  };

  e.atRule = C;

  var S = e.prefixed = function (e, t, n) {
    return 0 === e.indexOf("@") ? C(e) : (-1 != e.indexOf("-") && (e = $(e)), t ? o(e, t, n) : o(e, "pfx"));
  };

  c.addTest("objectfit", !!S("objectFit"), {
    aliases: ["object-fit"]
  }), function () {
    var e, t, n, o, r, i;

    for (var s in l) {
      if (l.hasOwnProperty(s)) {
        if (e = [], (t = l[s]).name && (e.push(t.name.toLowerCase()), t.options && t.options.aliases && t.options.aliases.length)) for (n = 0; n < t.options.aliases.length; n++) {
          e.push(t.options.aliases[n].toLowerCase());
        }

        for (o = h(t.fn, "function") ? t.fn() : t.fn, r = 0; r < e.length; r++) {
          1 === (i = e[r].split(".")).length ? c[i[0]] = o : (!c[i[0]] || c[i[0]] instanceof Boolean || (c[i[0]] = new Boolean(c[i[0]])), c[i[0]][i[1]] = o), u.push((o ? "" : "no-") + i.join("-"));
        }
      }
    }
  }(), function (e) {
    var t = b.className,
        n = c._config.classPrefix || "";

    if (v && (t = t.baseVal), c._config.enableJSClass) {
      var o = new RegExp("(^|\\s)" + n + "no-js(\\s|$)");
      t = t.replace(o, "$1" + n + "js$2");
    }

    c._config.enableClasses && (t += " " + n + e.join(" " + n), v ? b.className.baseVal = t : b.className = t);
  }(u), delete e.addTest, delete e.addAsyncTest;

  for (var x = 0; x < c._q.length; x++) {
    c._q[x]();
  }

  s.Modernizr = c;
}(window, document);
"use strict";
/**
 * File customizer.js.
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

(function ($) {
  // Site title and description.
  wp.customize('blogname', function (value) {
    value.bind(function (to) {
      $('.site-title a').text(to);
    });
  });
  wp.customize('blogdescription', function (value) {
    value.bind(function (to) {
      $('.site-description').text(to);
    });
  }); // Header text color.

  wp.customize('header_textcolor', function (value) {
    value.bind(function (to) {
      if ('blank' === to) {
        $('.site-title a, .site-description').css({
          'clip': 'rect(1px, 1px, 1px, 1px)',
          'position': 'absolute'
        });
      } else {
        $('.site-title a, .site-description').css({
          'clip': 'auto',
          'position': 'relative'
        });
        $('.site-title a, .site-description').css({
          'color': to
        });
      }
    });
  });
})(jQuery);

"use strict";

function _typeof(obj) {
  "@babel/helpers - typeof";

  if (typeof Symbol === "function" && typeof Symbol.iterator === "symbol") {
    _typeof = function _typeof(obj) {
      return typeof obj;
    };
  } else {
    _typeof = function _typeof(obj) {
      return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj;
    };
  }

  return _typeof(obj);
}
/**
* @preserve HTML5 Shiv 3.7.3 | @afarkas @jdalton @jon_neal @rem | MIT/GPL2 Licensed
*/


!function (a, b) {
  function c(a, b) {
    var c = a.createElement("p"),
        d = a.getElementsByTagName("head")[0] || a.documentElement;
    return c.innerHTML = "x<style>" + b + "</style>", d.insertBefore(c.lastChild, d.firstChild);
  }

  function d() {
    var a = t.elements;
    return "string" == typeof a ? a.split(" ") : a;
  }

  function e(a, b) {
    var c = t.elements;
    "string" != typeof c && (c = c.join(" ")), "string" != typeof a && (a = a.join(" ")), t.elements = c + " " + a, j(b);
  }

  function f(a) {
    var b = s[a[q]];
    return b || (b = {}, r++, a[q] = r, s[r] = b), b;
  }

  function g(a, c, d) {
    if (c || (c = b), l) return c.createElement(a);
    d || (d = f(c));
    var e;
    return e = d.cache[a] ? d.cache[a].cloneNode() : p.test(a) ? (d.cache[a] = d.createElem(a)).cloneNode() : d.createElem(a), !e.canHaveChildren || o.test(a) || e.tagUrn ? e : d.frag.appendChild(e);
  }

  function h(a, c) {
    if (a || (a = b), l) return a.createDocumentFragment();
    c = c || f(a);

    for (var e = c.frag.cloneNode(), g = 0, h = d(), i = h.length; i > g; g++) {
      e.createElement(h[g]);
    }

    return e;
  }

  function i(a, b) {
    b.cache || (b.cache = {}, b.createElem = a.createElement, b.createFrag = a.createDocumentFragment, b.frag = b.createFrag()), a.createElement = function (c) {
      return t.shivMethods ? g(c, a, b) : b.createElem(c);
    }, a.createDocumentFragment = Function("h,f", "return function(){var n=f.cloneNode(),c=n.createElement;h.shivMethods&&(" + d().join().replace(/[\w\-:]+/g, function (a) {
      return b.createElem(a), b.frag.createElement(a), 'c("' + a + '")';
    }) + ");return n}")(t, b.frag);
  }

  function j(a) {
    a || (a = b);
    var d = f(a);
    return !t.shivCSS || k || d.hasCSS || (d.hasCSS = !!c(a, "article,aside,dialog,figcaption,figure,footer,header,hgroup,main,nav,section{display:block}mark{background:#FF0;color:#000}template{display:none}")), l || i(a, d), a;
  }

  var k,
      l,
      m = "3.7.3",
      n = a.html5 || {},
      o = /^<|^(?:button|map|select|textarea|object|iframe|option|optgroup)$/i,
      p = /^(?:a|b|code|div|fieldset|h1|h2|h3|h4|h5|h6|i|label|li|ol|p|q|span|strong|style|table|tbody|td|th|tr|ul)$/i,
      q = "_html5shiv",
      r = 0,
      s = {};
  !function () {
    try {
      var a = b.createElement("a");
      a.innerHTML = "<xyz></xyz>", k = "hidden" in a, l = 1 == a.childNodes.length || function () {
        b.createElement("a");
        var a = b.createDocumentFragment();
        return "undefined" == typeof a.cloneNode || "undefined" == typeof a.createDocumentFragment || "undefined" == typeof a.createElement;
      }();
    } catch (c) {
      k = !0, l = !0;
    }
  }();
  var t = {
    elements: n.elements || "abbr article aside audio bdi canvas data datalist details dialog figcaption figure footer header hgroup main mark meter nav output picture progress section summary template time video",
    version: m,
    shivCSS: n.shivCSS !== !1,
    supportsUnknownElements: l,
    shivMethods: n.shivMethods !== !1,
    type: "default",
    shivDocument: j,
    createElement: g,
    createDocumentFragment: h,
    addElements: e
  };
  a.html5 = t, j(b), "object" == (typeof module === "undefined" ? "undefined" : _typeof(module)) && module.exports && (module.exports = t);
}("undefined" != typeof window ? window : void 0, document);
"use strict";
/**
 * File skip-link-focus-fix.js.
 *
 * Helps with accessibility for keyboard only users.
 *
 * Learn more: https://git.io/vWdr2
 */


(function () {
  var isIe = /(trident|msie)/i.test(navigator.userAgent);

  if (isIe && document.getElementById && window.addEventListener) {
    window.addEventListener('hashchange', function () {
      var id = location.hash.substring(1),
          element;

      if (!/^[A-z0-9_-]+$/.test(id)) {
        return;
      }

      element = document.getElementById(id);

      if (element) {
        if (!/^(?:a|select|input|button|textarea)$/i.test(element.tagName)) {
          element.tabIndex = -1;
        }

        element.focus();
      }
    }, false);
  }
})();

"use strict";

/(trident|msie)/i.test(navigator.userAgent) && document.getElementById && window.addEventListener && window.addEventListener("hashchange", function () {
  var t,
      e = location.hash.substring(1);
  /^[A-z0-9_-]+$/.test(e) && (t = document.getElementById(e)) && (/^(?:a|select|input|button|textarea)$/i.test(t.tagName) || (t.tabIndex = -1), t.focus());
}, !1);
"use strict";

jQuery(function ($) {
  'use strict'; // here for each comment reply link of wordpress

  $('.comment-reply-link').addClass('btn btn-primary'); // here for the submit button of the comment reply form

  $('#commentsubmit').addClass('btn btn-primary'); // The WordPress Default Widgets
  // Now we'll add some classes for the wordpress default widgets - let's go
  // the search widget

  $('.widget_search input.search-field').addClass('form-control');
  $('.widget_search input.search-submit').addClass('btn btn-default');
  $('.variations_form .variations .value > select').addClass('form-control');
  $('.widget_rss ul').addClass('media-list');
  $('.widget_meta ul, .widget_recent_entries ul, .widget_archive ul, .widget_categories ul, .widget_nav_menu ul, .widget_pages ul, .widget_product_categories ul').addClass('nav flex-column');
  $('.widget_meta ul li, .widget_recent_entries ul li, .widget_archive ul li, .widget_categories ul li, .widget_nav_menu ul li, .widget_pages ul li, .widget_product_categories ul li').addClass('nav-item');
  $('.widget_meta ul li a, .widget_recent_entries ul li a, .widget_archive ul li a, .widget_categories ul li a, .widget_nav_menu ul li a, .widget_pages ul li a, .widget_product_categories ul li a').addClass('nav-link');
  $('.widget_recent_comments ul#recentcomments').css('list-style', 'none').css('padding-left', '0');
  $('.widget_recent_comments ul#recentcomments li').css('padding', '5px 15px');
  $('table#wp-calendar').addClass('table table-striped'); // Adding Class to contact form 7 form

  $('.wpcf7-form-control').not(".wpcf7-submit, .wpcf7-acceptance, .wpcf7-file, .wpcf7-radio").addClass('form-control');
  $('.wpcf7-submit').addClass('btn btn-primary'); // Adding Class to Woocommerce form

  $('.woocommerce-Input--text, .woocommerce-Input--email, .woocommerce-Input--password').addClass('form-control');
  $('.woocommerce-Button.button').addClass('btn btn-primary').removeClass('button');
  $('ul.dropdown-menu [data-toggle=dropdown]').on('click', function (event) {
    event.preventDefault();
    event.stopPropagation();
    $(this).parent().siblings().removeClass('open');
    $(this).parent().toggleClass('open');
  }); // Fix woocommerce checkout layout

  $('#customer_details .col-1').addClass('col-12').removeClass('col-1');
  $('#customer_details .col-2').addClass('col-12').removeClass('col-2');
  $('.woocommerce-MyAccount-content .col-1').addClass('col-12').removeClass('col-1');
  $('.woocommerce-MyAccount-content .col-2').addClass('col-12').removeClass('col-2'); // Add Option to add Fullwidth Section

  function fullWidthSection() {
    var screenWidth = $(window).width();

    if ($('.entry-content').length) {
      var leftoffset = $('.entry-content').offset().left;
    } else {
      var leftoffset = 0;
    }

    $('.full-bleed-section').css({
      'position': 'relative',
      'left': '-' + leftoffset + 'px',
      'box-sizing': 'border-box',
      'width': screenWidth
    });
  }

  fullWidthSection();
  $(window).resize(function () {
    fullWidthSection();
  }); // Allow smooth scroll

  $('.page-scroller').on('click', function (e) {
    e.preventDefault();
    var target = this.hash;
    var $target = $(target);
    $('html, body').animate({
      'scrollTop': $target.offset().top
    }, 1000, 'swing');
  });
});
"use strict";

jQuery(function (e) {
  "use strict";

  function t() {
    var t = e(window).width();
    if (e(".entry-content").length) var l = e(".entry-content").offset().left;else l = 0;
    e(".full-bleed-section").css({
      position: "relative",
      left: "-" + l + "px",
      "box-sizing": "border-box",
      width: t
    });
  }

  e(".comment-reply-link").addClass("btn btn-primary"), e("#commentsubmit").addClass("btn btn-primary"), e(".widget_search input.search-field").addClass("form-control"), e(".widget_search input.search-submit").addClass("btn btn-default"), e(".variations_form .variations .value > select").addClass("form-control"), e(".widget_rss ul").addClass("media-list"), e(".widget_meta ul, .widget_recent_entries ul, .widget_archive ul, .widget_categories ul, .widget_nav_menu ul, .widget_pages ul, .widget_product_categories ul").addClass("nav flex-column"), e(".widget_meta ul li, .widget_recent_entries ul li, .widget_archive ul li, .widget_categories ul li, .widget_nav_menu ul li, .widget_pages ul li, .widget_product_categories ul li").addClass("nav-item"), e(".widget_meta ul li a, .widget_recent_entries ul li a, .widget_archive ul li a, .widget_categories ul li a, .widget_nav_menu ul li a, .widget_pages ul li a, .widget_product_categories ul li a").addClass("nav-link"), e(".widget_recent_comments ul#recentcomments").css("list-style", "none").css("padding-left", "0"), e(".widget_recent_comments ul#recentcomments li").css("padding", "5px 15px"), e("table#wp-calendar").addClass("table table-striped"), e(".wpcf7-form-control").not(".wpcf7-submit, .wpcf7-acceptance, .wpcf7-file, .wpcf7-radio").addClass("form-control"), e(".wpcf7-submit").addClass("btn btn-primary"), e(".woocommerce-Input--text, .woocommerce-Input--email, .woocommerce-Input--password").addClass("form-control"), e(".woocommerce-Button.button").addClass("btn btn-primary mt-2").removeClass("button"), e("ul.dropdown-menu [data-toggle=dropdown]").on("click", function (t) {
    t.preventDefault(), t.stopPropagation(), e(this).parent().siblings().removeClass("open"), e(this).parent().toggleClass("open");
  }), e("#customer_details .col-1").addClass("col-12").removeClass("col-1"), e("#customer_details .col-2").addClass("col-12").removeClass("col-2"), e(".woocommerce-MyAccount-content .col-1").addClass("col-12").removeClass("col-1"), e(".woocommerce-MyAccount-content .col-2").addClass("col-12").removeClass("col-2"), t(), e(window).resize(function () {
    t();
  }), e(".page-scroller").on("click", function (t) {
    t.preventDefault();
    var l = this.hash,
        o = e(l);
    e("html, body").animate({
      scrollTop: o.offset().top
    }, 1e3, "swing");
  });
});
"use strict";

function _typeof2(obj) { "@babel/helpers - typeof"; if (typeof Symbol === "function" && typeof Symbol.iterator === "symbol") { _typeof2 = function _typeof2(obj) { return typeof obj; }; } else { _typeof2 = function _typeof2(obj) { return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }; } return _typeof2(obj); }

function _typeof(e) {
  return (_typeof = "function" == typeof Symbol && "symbol" == _typeof2(Symbol.iterator) ? function (e) {
    return _typeof2(e);
  } : function (e) {
    return e && "function" == typeof Symbol && e.constructor === Symbol && e !== Symbol.prototype ? "symbol" : _typeof2(e);
  })(e);
}

!function (t) {
  wp.customize("blogname", function (e) {
    e.bind(function (e) {
      t(".site-title a").text(e);
    });
  }), wp.customize("blogdescription", function (e) {
    e.bind(function (e) {
      t(".site-description").text(e);
    });
  }), wp.customize("header_textcolor", function (e) {
    e.bind(function (e) {
      "blank" === e ? t(".site-title a, .site-description").css({
        clip: "rect(1px, 1px, 1px, 1px)",
        position: "absolute"
      }) : (t(".site-title a, .site-description").css({
        clip: "auto",
        position: "relative"
      }), t(".site-title a, .site-description").css({
        color: e
      }));
    });
  });
}(jQuery), function (e, r) {
  function c() {
    var e = g.elements;
    return "string" == typeof e ? e.split(" ") : e;
  }

  function d(e) {
    var t = s[e[n]];
    return t || (t = {}, l++, e[n] = l, s[l] = t), t;
  }

  function u(e, t, n) {
    return t || (t = r), p ? t.createElement(e) : (n || (n = d(t)), !(o = n.cache[e] ? n.cache[e].cloneNode() : i.test(e) ? (n.cache[e] = n.createElem(e)).cloneNode() : n.createElem(e)).canHaveChildren || a.test(e) || o.tagUrn ? o : n.frag.appendChild(o));
    var o;
  }

  function o(e) {
    e || (e = r);
    var t,
        n,
        o,
        a,
        i,
        l,
        s = d(e);
    return !g.shivCSS || m || s.hasCSS || (s.hasCSS = (a = "article,aside,dialog,figcaption,figure,footer,header,hgroup,main,nav,section{display:block}mark{background:#FF0;color:#000}template{display:none}", i = (o = e).createElement("p"), l = o.getElementsByTagName("head")[0] || o.documentElement, i.innerHTML = "x<style>" + a + "</style>", !!l.insertBefore(i.lastChild, l.firstChild))), p || (t = e, (n = s).cache || (n.cache = {}, n.createElem = t.createElement, n.createFrag = t.createDocumentFragment, n.frag = n.createFrag()), t.createElement = function (e) {
      return g.shivMethods ? u(e, t, n) : n.createElem(e);
    }, t.createDocumentFragment = Function("h,f", "return function(){var n=f.cloneNode(),c=n.createElement;h.shivMethods&&(" + c().join().replace(/[\w\-:]+/g, function (e) {
      return n.createElem(e), n.frag.createElement(e), 'c("' + e + '")';
    }) + ");return n}")(g, n.frag)), e;
  }

  var m,
      p,
      t = e.html5 || {},
      a = /^<|^(?:button|map|select|textarea|object|iframe|option|optgroup)$/i,
      i = /^(?:a|b|code|div|fieldset|h1|h2|h3|h4|h5|h6|i|label|li|ol|p|q|span|strong|style|table|tbody|td|th|tr|ul)$/i,
      n = "_html5shiv",
      l = 0,
      s = {};
  !function () {
    try {
      var e = r.createElement("a");
      e.innerHTML = "<xyz></xyz>", m = "hidden" in e, p = 1 == e.childNodes.length || function () {
        r.createElement("a");
        var e = r.createDocumentFragment();
        return void 0 === e.cloneNode || void 0 === e.createDocumentFragment || void 0 === e.createElement;
      }();
    } catch (e) {
      p = m = !0;
    }
  }();
  var g = {
    elements: t.elements || "abbr article aside audio bdi canvas data datalist details dialog figcaption figure footer header hgroup main mark meter nav output picture progress section summary template time video",
    version: "3.7.3",
    shivCSS: !1 !== t.shivCSS,
    supportsUnknownElements: p,
    shivMethods: !1 !== t.shivMethods,
    type: "default",
    shivDocument: o,
    createElement: u,
    createDocumentFragment: function createDocumentFragment(e, t) {
      if (e || (e = r), p) return e.createDocumentFragment();

      for (var n = (t = t || d(e)).frag.cloneNode(), o = 0, a = c(), i = a.length; o < i; o++) {
        n.createElement(a[o]);
      }

      return n;
    },
    addElements: function addElements(e, t) {
      var n = g.elements;
      "string" != typeof n && (n = n.join(" ")), "string" != typeof e && (e = e.join(" ")), g.elements = n + " " + e, o(t);
    }
  };
  e.html5 = g, o(r), "object" == ("undefined" == typeof module ? "undefined" : _typeof(module)) && module.exports && (module.exports = g);
}("undefined" != typeof window ? window : void 0, document), /(trident|msie)/i.test(navigator.userAgent) && document.getElementById && window.addEventListener && window.addEventListener("hashchange", function () {
  var e,
      t = location.hash.substring(1);
  /^[A-z0-9_-]+$/.test(t) && (e = document.getElementById(t)) && (/^(?:a|select|input|button|textarea)$/i.test(e.tagName) || (e.tabIndex = -1), e.focus());
}, !1), /(trident|msie)/i.test(navigator.userAgent) && document.getElementById && window.addEventListener && window.addEventListener("hashchange", function () {
  var e,
      t = location.hash.substring(1);
  /^[A-z0-9_-]+$/.test(t) && (e = document.getElementById(t)) && (/^(?:a|select|input|button|textarea)$/i.test(e.tagName) || (e.tabIndex = -1), e.focus());
}, !1), jQuery(function (o) {
  function e() {
    var e = o(window).width();
    if (o(".entry-content").length) var t = o(".entry-content").offset().left;else t = 0;
    o(".full-bleed-section").css({
      position: "relative",
      left: "-" + t + "px",
      "box-sizing": "border-box",
      width: e
    });
  }

  o(".comment-reply-link").addClass("btn btn-primary"), o("#commentsubmit").addClass("btn btn-primary"), o(".widget_search input.search-field").addClass("form-control"), o(".widget_search input.search-submit").addClass("btn btn-default"), o(".variations_form .variations .value > select").addClass("form-control"), o(".widget_rss ul").addClass("media-list"), o(".widget_meta ul, .widget_recent_entries ul, .widget_archive ul, .widget_categories ul, .widget_nav_menu ul, .widget_pages ul, .widget_product_categories ul").addClass("nav flex-column"), o(".widget_meta ul li, .widget_recent_entries ul li, .widget_archive ul li, .widget_categories ul li, .widget_nav_menu ul li, .widget_pages ul li, .widget_product_categories ul li").addClass("nav-item"), o(".widget_meta ul li a, .widget_recent_entries ul li a, .widget_archive ul li a, .widget_categories ul li a, .widget_nav_menu ul li a, .widget_pages ul li a, .widget_product_categories ul li a").addClass("nav-link"), o(".widget_recent_comments ul#recentcomments").css("list-style", "none").css("padding-left", "0"), o(".widget_recent_comments ul#recentcomments li").css("padding", "5px 15px"), o("table#wp-calendar").addClass("table table-striped"), o(".wpcf7-form-control").not(".wpcf7-submit, .wpcf7-acceptance, .wpcf7-file, .wpcf7-radio").addClass("form-control"), o(".wpcf7-submit").addClass("btn btn-primary"), o(".woocommerce-Input--text, .woocommerce-Input--email, .woocommerce-Input--password").addClass("form-control"), o(".woocommerce-Button.button").addClass("btn btn-primary").removeClass("button"), o("ul.dropdown-menu [data-toggle=dropdown]").on("click", function (e) {
    e.preventDefault(), e.stopPropagation(), o(this).parent().siblings().removeClass("open"), o(this).parent().toggleClass("open");
  }), o("#customer_details .col-1").addClass("col-12").removeClass("col-1"), o("#customer_details .col-2").addClass("col-12").removeClass("col-2"), o(".woocommerce-MyAccount-content .col-1").addClass("col-12").removeClass("col-1"), o(".woocommerce-MyAccount-content .col-2").addClass("col-12").removeClass("col-2"), e(), o(window).resize(function () {
    e();
  }), o(".page-scroller").on("click", function (e) {
    e.preventDefault();
    var t = this.hash,
        n = o(t);
    o("html, body").animate({
      scrollTop: n.offset().top
    }, 1e3, "swing");
  });
}), jQuery(function (o) {
  function e() {
    var e = o(window).width();
    if (o(".entry-content").length) var t = o(".entry-content").offset().left;else t = 0;
    o(".full-bleed-section").css({
      position: "relative",
      left: "-" + t + "px",
      "box-sizing": "border-box",
      width: e
    });
  }

  o(".comment-reply-link").addClass("btn btn-primary"), o("#commentsubmit").addClass("btn btn-primary"), o(".widget_search input.search-field").addClass("form-control"), o(".widget_search input.search-submit").addClass("btn btn-default"), o(".variations_form .variations .value > select").addClass("form-control"), o(".widget_rss ul").addClass("media-list"), o(".widget_meta ul, .widget_recent_entries ul, .widget_archive ul, .widget_categories ul, .widget_nav_menu ul, .widget_pages ul, .widget_product_categories ul").addClass("nav flex-column"), o(".widget_meta ul li, .widget_recent_entries ul li, .widget_archive ul li, .widget_categories ul li, .widget_nav_menu ul li, .widget_pages ul li, .widget_product_categories ul li").addClass("nav-item"), o(".widget_meta ul li a, .widget_recent_entries ul li a, .widget_archive ul li a, .widget_categories ul li a, .widget_nav_menu ul li a, .widget_pages ul li a, .widget_product_categories ul li a").addClass("nav-link"), o(".widget_recent_comments ul#recentcomments").css("list-style", "none").css("padding-left", "0"), o(".widget_recent_comments ul#recentcomments li").css("padding", "5px 15px"), o("table#wp-calendar").addClass("table table-striped"), o(".wpcf7-form-control").not(".wpcf7-submit, .wpcf7-acceptance, .wpcf7-file, .wpcf7-radio").addClass("form-control"), o(".wpcf7-submit").addClass("btn btn-primary"), o(".woocommerce-Input--text, .woocommerce-Input--email, .woocommerce-Input--password").addClass("form-control"), o(".woocommerce-Button.button").addClass("btn btn-primary mt-2").removeClass("button"), o("ul.dropdown-menu [data-toggle=dropdown]").on("click", function (e) {
    e.preventDefault(), e.stopPropagation(), o(this).parent().siblings().removeClass("open"), o(this).parent().toggleClass("open");
  }), o("#customer_details .col-1").addClass("col-12").removeClass("col-1"), o("#customer_details .col-2").addClass("col-12").removeClass("col-2"), o(".woocommerce-MyAccount-content .col-1").addClass("col-12").removeClass("col-1"), o(".woocommerce-MyAccount-content .col-2").addClass("col-12").removeClass("col-2"), e(), o(window).resize(function () {
    e();
  }), o(".page-scroller").on("click", function (e) {
    e.preventDefault();
    var t = this.hash,
        n = o(t);
    o("html, body").animate({
      scrollTop: n.offset().top
    }, 1e3, "swing");
  });
});