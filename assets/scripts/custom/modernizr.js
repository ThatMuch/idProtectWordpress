/* eslint-disable no-undef */
/* eslint-disable no-empty */
/* eslint-disable no-prototype-builtins */
/* eslint-disable vars-on-top */
/*! modernizr 3.5.0 (Custom Build) | MIT *
 * https://modernizr.com/download/?-objectfit-setclasses !*/
!(function (e,n,t) {
	function r(e,n) {
		return typeof e === n;
	} function o() {
		var e,n,t,o,i,s,a; for (var l in h) {
			if (h.hasOwnProperty(l)) {
				if (e = [],n = h[l],n.name && (e.push(n.name.toLowerCase()),n.options && n.options.aliases && n.options.aliases.length)) {
					for (t = 0; t < n.options.aliases.length; t++) {
						e.push(n.options.aliases[t].toLowerCase());
					}
				} for (o = r(n.fn,'function') ? n.fn() : n.fn,i = 0; i < e.length; i++) {
					s = e[i],a = s.split('.'),1 === a.length ? Modernizr[a[0]] = o : (!Modernizr[a[0]] || Modernizr[a[0]] instanceof Boolean || (Modernizr[a[0]] = new Boolean(Modernizr[a[0]])),Modernizr[a[0]][a[1]] = o),S.push((o ? '' : 'no-') + a.join('-'));
				}
			}
		}
	} function i(e) {
		var n = _.className,
			t = Modernizr._config.classPrefix || ''; if (w && (n = n.baseVal),Modernizr._config.enableJSClass) {
				var r = new RegExp('(^|\\s)' + t + 'no-js(\\s|$)'); n = n.replace(r,'$1' + t + 'js$2');
			} Modernizr._config.enableClasses && (n += ' ' + t + e.join(' ' + t),w ? _.className.baseVal = n : _.className = n);
	} function s(e,n) {
		return !! ~('' + e).indexOf(n);
	} function a() {
		return 'function' != typeof n.createElement ? n.createElement(arguments[0]) : w ? n.createElementNS.call(n,'http://www.w3.org/2000/svg',arguments[0]) : n.createElement.apply(n,arguments);
	} function l() {
		var e = n.body; return e || (e = a(w ? 'svg' : 'body'),e.fake = !0),e;
	} function f(e,t,r,o) {
		var i,s,f,u,
			p = 'modernizr',
			c = a('div'),
			d = l(); if (parseInt(r,10)) {
				for (; r--;) {
					f = a('div'),f.id = o ? o[r] : p + (r + 1),c.appendChild(f);
				}
			} return i = a('style'),i.type = 'text/css',i.id = 's' + p,(d.fake ? d : c).appendChild(i),d.appendChild(c),i.styleSheet ? i.styleSheet.cssText = e : i.appendChild(n.createTextNode(e)),c.id = p,d.fake && (d.style.background = '',d.style.overflow = 'hidden',u = _.style.overflow,_.style.overflow = 'hidden',_.appendChild(d)),s = t(c,e),d.fake ? (d.parentNode.removeChild(d),_.style.overflow = u,_.offsetHeight) : c.parentNode.removeChild(c),!!s;
	} function u(e) {
		return e.replace(/([A-Z])/g,function (e,n) {
			return '-' + n.toLowerCase();
		}).replace(/^ms-/,'-ms-');
	} function p(n,t,r) {
		var o; if ('getComputedStyle' in e) {
			o = getComputedStyle.call(e,n,t); var i = e.console; if (null !== o) {
				r && (o = o.getPropertyValue(r));
			} else if (i) {
				var s = i.error ? 'error' : 'log'; i[s].call(i,'getComputedStyle returning null, its possible modernizr test results are inaccurate');
			}
		} else {
			o = !t && n.currentStyle && n.currentStyle[r];
		} return o;
	} function c(n,r) {
		var o = n.length; if ('CSS' in e && 'supports' in e.CSS) {
			for (; o--;) {
				if (e.CSS.supports(u(n[o]),r)) {
					return !0;
				}
			} return !1;
		} if ('CSSSupportsRule' in e) {
			for (var i = []; o--;) {
				i.push('(' + u(n[o]) + ':' + r + ')');
			} return i = i.join(' or '),f('@supports (' + i + ') { #modernizr { position: absolute; } }',function (e) {
				return 'absolute' == p(e,null,'position');
			});
		} return t;
	} function d(e) {
		return e.replace(/([a-z])-([a-z])/g,function (e,n,t) {
			return n + t.toUpperCase();
		}).replace(/^-/,'');
	} function m(e,n,o,i) {
		function l() {
			u && (delete j.style,delete j.modElem);
		} if (i = r(i,'undefined') ? !1 : i,!r(o,'undefined')) {
			var f = c(e,o); if (!r(f,'undefined')) {
				return f;
			}
		} for (var u,p,m,v,y,g = ['modernizr','tspan','samp']; !j.style && g.length;) {
			u = !0,j.modElem = a(g.shift()),j.style = j.modElem.style;
		} for (m = e.length,p = 0; m > p; p++) {
			if (v = e[p],y = j.style[v],s(v,'-') && (v = d(v)),j.style[v] !== t) {
				if (i || r(o,'undefined')) {
					return l(),'pfx' == n ? v : !0;
				} try {
					j.style[v] = o;
				} catch (h) { } if (j.style[v] != y) {
					return l(),'pfx' == n ? v : !0;
				}
			}
		} return l(),!1;
	} function v(e,n) {
		return function () {
			return e.apply(n,arguments);
		};
	} function y(e,n,t) {
		var o; for (var i in e) {
			if (e[i] in n) {
				return t === !1 ? e[i] : (o = n[e[i]],r(o,'function') ? v(o,t || n) : o);
			}
		} return !1;
	} function g(e,n,t,o,i) {
		var s = e.charAt(0).toUpperCase() + e.slice(1),
			a = (e + ' ' + b.join(s + ' ') + s).split(' '); return r(n,'string') || r(n,'undefined') ? m(a,n,o,i) : (a = (e + ' ' + z.join(s + ' ') + s).split(' '),y(a,n,t));
	} var h = [],
		C = {
			_version: '3.5.0',_config: { classPrefix: '',enableClasses: !0,enableJSClass: !0,usePrefixes: !0 },_q: [],on: function (e,n) {
				var t = this; setTimeout(function () {
					n(t[e]);
				},0);
			},addTest: function (e,n,t) {
				h.push({ name: e,fn: n,options: t });
			},addAsyncTest: function (e) {
				h.push({ name: null,fn: e });
			}
		},
		Modernizr = function () { }; Modernizr.prototype = C,Modernizr = new Modernizr; var S = [],
			_ = n.documentElement,
			w = 'svg' === _.nodeName.toLowerCase(),
			x = 'Moz O ms Webkit',
			b = C._config.usePrefixes ? x.split(' ') : []; C._cssomPrefixes = b; var E = { elem: a('modernizr') }; Modernizr._q.push(function () {
				delete E.elem;
			}); var j = { style: E.elem.style }; Modernizr._q.unshift(function () {
				delete j.style;
			}); var z = C._config.usePrefixes ? x.toLowerCase().split(' ') : []; C._domPrefixes = z,C.testAllProps = g; var P = function (n) {
				var r,
					o = prefixes.length,
					i = e.CSSRule; if ('undefined' == typeof i) {
						return t;
					} if (!n) {
						return !1;
					} if (n = n.replace(/^@/,''),r = n.replace(/-/g,'_').toUpperCase() + '_RULE',r in i) {
						return '@' + n;
					} for (var s = 0; o > s; s++) {
						var a = prefixes[s],
							l = a.toUpperCase() + '_' + r; if (l in i) {
								return '@-' + a.toLowerCase() + '-' + n;
							}
					} return !1;
			}; C.atRule = P; var N = C.prefixed = function (e,n,t) {
				return 0 === e.indexOf('@') ? P(e) : (-1 != e.indexOf('-') && (e = d(e)),n ? g(e,n,t) : g(e,'pfx'));
			}; Modernizr.addTest('objectfit',!!N('objectFit'),{ aliases: ['object-fit'] }),o(),i(S),delete C.addTest,delete C.addAsyncTest; for (var T = 0; T < Modernizr._q.length; T++) {
				Modernizr._q[T]();
			} e.Modernizr = Modernizr;
}(window,document));
