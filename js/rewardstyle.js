if(window.__rewardstyle === undefined) {
	!function(doc, win){
		window.__rewardstyle = {
			ev:(doc.addEventListener !== undefined ? {
				add: 'addEventListener',
				rem: 'removeEventListener',
				pre: ''
			}:{
				add: 'attachEvent',
				rem: 'detachEvent',
				pre: 'on'
			}),
			ajax:{
				isIE8:(win.XDomainRequest !== undefined ? true : false),
				IEVersion:(function(){
					var a = navigator.userAgent.toLowerCase();
					return a.indexOf('msie') !== -1 ? parseInt(a.split('msie')[1],10) : false;
				})(),
				get:function(url, data, callback){
					var xhr = (__rewardstyle.ajax.isIE8 === true ? new win.XDomainRequest() : new XMLHttpRequest()),
						handler = function(e){
							if(xhr.readyState === 4 && xhr.status === 200) {
								response();
							}
						},
						response = function(){
							if(typeof(callback) === 'function') {
								callback(data, xhr.responseText);
							}
						};

					try {
						if(__rewardstyle.ajax.isIE8 === true) {
							xhr.onload = response;
							xhr.open('GET', url, true);
							xhr.onprogress = function(){};
							xhr.ontimeout = function(){};
							xhr.onerror = function(){};
							setTimeout(function(){xhr.send();}, 0);
						}
						else {
							xhr.open('GET', url, true);
							xhr.onreadystatechange = handler;
							xhr.send();
						}
					}
					catch(e){
						console.log(e);
					}
				}
			},
			getElementsByClassName:function(c, s){
				if(s === undefined) {
					s = doc;
				}
				return doc.getElementsByClassName !== undefined ? s.getElementsByClassName(c) : s.querySelectorAll('.'+c);
			},
			classFactor:function(e, c){
				var s = e.className.split(' '),
					r = [];
				c = c.toLowerCase();
				for(var i = 0; i < s.length; i++) {
					if(s[i] !== '' && s[i].toLowerCase() !== c) {
						r.push(s[i]);
					}
				}
				return r;
			},
			addClass:function(e, c){
				var r = __rewardstyle.classFactor(e, c);
				r.push(c);
				e.className = r.join(' ');
				return e.className;
			},
			removeClass:function(e, c) {
				var r = __rewardstyle.classFactor(e, c);
				e.className = r.join(' ');
				return e.className;
			},
			hasClass:function(e, c) {
				return RegExp('^(\\s*.+\\s+)*'+c+'(\\s+.+\\s*)*$', 'i').test(e.className);
			},
			camelize:function(s){
				return s.replace(/[\-\s_](\w)/g, function(d, l){
					return l.toUpperCase();
				});
			},
			getStyle:function(e, s){
				var c = __rewardstyle.camelize(s);
				if(e.style[c] !== '') {
					return e.style[c];
				}
				if(e.currentStyle === undefined) {
					return doc.defaultView.getComputedStyle(e, null).getPropertyValue(s);
				}
				return e.currentStyle[c];
			},
			isMobile:(function() {
				var a = navigator.userAgent || navigator.vendor || win.opera;
				return /(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i.test(a) || /1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(a.substr(0, 4));
			})()
		};
	}(document, window);
}

if(window.__boutique === undefined) {
	!function(doc, win){
		window.__boutique = {
			inited: false,
			widgets: [],
			heights: [],
			margins: [],
			widths: [],
			conts: [],
			clies: [],
			wraps: [],
			items: [],
			resp: [],
			cols: [],
			imgs: [],
			injectResponse:function(id, mk){
				__boutique.widgets[id].innerHTML = mk;
				__boutique.widgets[id].setAttribute('data-widget-uid', id);
				__boutique.heights[id] = {};
				__boutique.conts[id] = false;
				__boutique.clies[id] = false;
				__boutique.wraps[id] = __rewardstyle.getElementsByClassName('bo-garden', __boutique.widgets[id])[0];
				__boutique.wraps[id].style.width = '100%';
				__boutique.items[id] = [];
				__boutique.imgs[id] = [];
				var items = __rewardstyle.getElementsByClassName('bo-con', __boutique.widgets[id]),
					imgs = __rewardstyle.getElementsByClassName('bo-img', __boutique.widgets[id]);
				for(var i = 0, l = items.length; i < l; i++) {
					__boutique.items[id].push(items[i]);
					items[i].setAttribute('data-item-idx', __boutique.items[id].length - 1);
				}
				for(i = 0, l = imgs.length; i < l; i++) {
					__boutique.imgs[id].push(imgs[i]);
				}
				var ml = parseInt(__rewardstyle.getStyle(__boutique.items[id][0], 'margin-left'), 10),
					mr = parseInt(__rewardstyle.getStyle(__boutique.items[id][0], 'margin-right'), 10),
					mb = parseInt(__rewardstyle.getStyle(__boutique.items[id][0], 'margin-bottom'), 10),
					mt = parseInt(__rewardstyle.getStyle(__boutique.items[id][0], 'margin-top'), 10);
				__boutique.margins[id] = {left: (Math.abs(ml) >= 0 ? ml : 0), right: (Math.abs(mr) >= 0 ? mr : 0), bottom: (Math.abs(mb) >= 0 ? mb : 0), top: (Math.abs(mt) >= 0 ? mt : 0)};
				__boutique.widths[id] = __boutique.items[id][0].children[0].offsetWidth + __boutique.margins[id].left + __boutique.margins[id].right;
				if(__boutique.cols[id] === undefined) {
					__boutique.cols[id] = [];
				}
				else {
					__boutique.cols[id].length = 0;
				}
				__boutique.resp[id] = false;
			},
			click:function(e){
				var t = e.target || e.srcElement,
					url = t.getAttribute('data-social'),
					title = t.getAttribute('title');
				if(url !== null && title !== null) {
					window.open(url, (__rewardstyle.ajax.isIE8 === true ? '' : title), 'width=600,height=300,status=no,location=no,toolbar=no,menubar=no,directories=no,resizable=yes,scrollbars=no');
					e.preventDefault();
				}
			},
			makeResponsive:function(w, r){
				if((__boutique.resp[w] === false && (r === undefined || r === false)) || (__boutique.resp[w] !== false && r === true)) {
					return __boutique.resp[w];
				}
				if(r === true) {
					__boutique.resp[w] = parseInt(__boutique.items[w][0].children[0].style.width, 10);
					__rewardstyle.addClass(__boutique.wraps[w], 'bo-resp');
				}
				else {
					__rewardstyle.removeClass(__boutique.wraps[w], 'bo-resp');
					__boutique.resp[w] = false;
				}
				return (r === true ? true : false);
			},
			imgCheck:function(e){
				var t = e.target || e.srcElement,
					p = t.parentNode.parentNode.parentNode,
					ev = __rewardstyle.ev,
					uid = t.getAttribute('data-widget-uid'),
					idx = p.getAttribute('data-item-idx'),
					loaded = true;
				t[ev.rem](ev.pre+'load', __boutique.imgCheck, false);
				t[ev.rem](ev.pre+'error', __boutique.imgCheck, false);
				p.setAttribute('data-loaded', 'true');
				__boutique.heights[uid][idx] = p.offsetHeight + __boutique.margins[uid].top + __boutique.margins[uid].bottom;
				if(__boutique.cols[uid].length < 1) {
					__boutique.isoBlock(uid, true);
				}
				else {
					__boutique.isoAdd(uid, p);
				}
			},
			isoBlock:function(u,f){
				var resp = __boutique.resp[u],
					mkre = __boutique.makeResponsive(u, (__boutique.conts[u] || __boutique.widgets[u].scrollWidth || window.innerWidth) < __boutique.widths[u]),
					cnum = (mkre === true ? 1 : Math.floor((__boutique.clies[u] || __boutique.widgets[u].children[0].clientWidth) / __boutique.widths[u]));
				if(cnum < 1) {
					cnum = 1;
				}
				if(f !== true && cnum === __boutique.cols[u].length && resp === __boutique.resp[u]) {
					return;
				}
				__boutique.cols[u].length = 0;
				__boutique.wraps[u].style.minHeight = '0';
				for(var i = 0; i < cnum; i++) {
					__boutique.cols[u][i] = 0;
				}
				for(var j = 0, k = __boutique.items[u].length; j < k; j++) {
					__boutique.isoAdd(u, __boutique.items[u][j]);
				}
				__boutique.isoDim(u);
			},
			isoAdd:function(u,p){
				if(p.getAttribute('data-loaded') === 'true') {
					var low = false,
						cid = 0;
					for(var i = 0, l = __boutique.cols[u].length; i < l; i++) {
						var h = __boutique.cols[u][i];
						if(low === false || h < low) {
							low = h;
							cid = i;
						}
					}
					p.setAttribute('style', 'position:absolute; top:'+__boutique.cols[u][cid]+'px; left:'+(cid*__boutique.widths[u])+'px');
					__boutique.cols[u][cid] += __boutique.heights[u][p.getAttribute('data-item-idx')];
					__boutique.isoDim(u);
				}
			},
			isoDim:function(u){
				var max = false,
					lod = true;
				for(var i = 0, l = __boutique.cols[u].length; i < l; i++) {
					if(max === false || max < __boutique.cols[u][i]) {
						max = __boutique.cols[u][i];
					}
				}
				__boutique.wraps[u].style.minHeight = max+'px';
				if(__rewardstyle.hasClass(__boutique.wraps[u], 'bo-float') === true) {
					for(i = 0, l = __boutique.items[u].length; i < l; i++) {
						if(__boutique.items[u][i].getAttribute('data-loaded') !== 'true') {
							lod = false;
							break;
						}
					}
					if(lod === true) {
						__rewardstyle.removeClass(__boutique.wraps[u], 'bo-float');
					}
				}
			},
			clearHover:function(){
				for(var i = 0, l = __boutique.widgets.length; i < l; i++) {
					var hos = __rewardstyle.getElementsByClassName('hover', __boutique.widgets[i]);
					for(var j = 0, k = hos.length; j < k; j++) {
						__rewardstyle.removeClass(hos[j], 'hover');
					}
				}
			},
			wrangleTouch:function(){
				doc.addEventListener('touchstart', function(e){
					if(__rewardstyle.hasClass(e.target, 'bo-tap') === true) {
						var el = e.target;
						while(__rewardstyle.hasClass(el, 'bo-wrap') === false) {
							el = el.parentElement;
						}
						console.log(e.target, el);
						if(__rewardstyle.hasClass(el, 'hover') === false) {
							__boutique.clearHover();
							__rewardstyle.addClass(el, 'hover');
							e.preventDefault();
						}
					}
					else {
						__boutique.clearHover();
					}
				});
			},
			resize:function(){
				for(var i = 0, l = __boutique.widgets.length; i < l; i++) {
					__boutique.conts[i] = __boutique.widgets[i].scrollWidth || window.innerWidth;
					__boutique.clies[i] = __boutique.widgets[i].children[0].clientWidth;
				}
				for(i = 0, l = __boutique.widgets.length; i < l; i++) {
					__boutique.isoBlock(i);
				}
			},
			init:function(e){
				if(e !== undefined && e.type === 'readystatechange' && doc.readyState !== 'complete') {
					return;
				}

				var ev = __rewardstyle.ev,
					ws = __rewardstyle.getElementsByClassName('boutique-widget');

				for(var i = 0; i < ws.length; i++) {
					var wid = ws[i].getAttribute('data-widget-id'),
						p   = /^http:/.test(document.location) ? 'http' : 'https';

					__boutique.widgets[i] = ws[i];

					if(ws[i].getAttribute('data-widget-uid') !== null) {
						continue;
					}

					__rewardstyle.ajax.get(p + '://widgets.rewardstyle.com/boutiques/'+wid+'.html'+(__rewardstyle.isMobile === true ? '?mobile' : ''), {uid:i}, function(params, data){
						try {
							if(__boutique.widgets[params.uid].getAttribute('data-widget-uid') !== null) {
								return;
							}
							__boutique.injectResponse(params.uid, data);
						} catch(err){}

						for(i = 0, l = __boutique.imgs[params.uid].length; i < l; i++) {
							__boutique.imgs[params.uid][i].setAttribute('data-widget-uid', params.uid);
							__boutique.imgs[params.uid][i][ev.add](ev.pre+'load', __boutique.imgCheck, false);
							__boutique.imgs[params.uid][i][ev.add](ev.pre+'error', __boutique.imgCheck, false);
						}
					});
				}

				if(__boutique.inited === false) {
					win[ev.add](ev.pre+'resize', __boutique.resize, true);
					doc[ev.rem](ev.pre+'DOMContentLoaded', __boutique.init, false);
					doc[ev.rem](ev.pre+'readystatechange', __boutique.init, false);
					win[ev.rem](ev.pre+'load', __boutique.init, false);
					doc[ev.add](ev.pre+'click', __boutique.click, true);

					if(__rewardstyle.isMobile === true) {
						__boutique.wrangleTouch();
					}

					__boutique.inited = true;
				}
			}
		};
	}(document, window);
}

!function(d, w){
	if(document.readyState === 'complete') {
		__boutique.init();
	}
	else {
		var e = __rewardstyle.ev;
		d[e.add](e.pre+'DOMContentLoaded', __boutique.init, false);
		d[e.add](e.pre+'readystatechange', __boutique.init, false);
		w[e.add](e.pre+'load', __boutique.init, false);
	}
}(document, window);