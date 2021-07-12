;(function(window){'use strict';var docElem=window.document.documentElement;function getViewportH(){var client=docElem['clientHeight'],inner=window['innerHeight'];if(client<inner)
return inner;else
return client;}
function scrollY(){return window.pageYOffset||docElem.scrollTop;}
function getOffset(el){var offsetTop=0,offsetLeft=0;do{if(!isNaN(el.offsetTop)){offsetTop+=el.offsetTop;}
if(!isNaN(el.offsetLeft)){offsetLeft+=el.offsetLeft;}}while(el=el.offsetParent)
return{top:offsetTop,left:offsetLeft}}
function inViewport(el,h){var elH=el.offsetHeight,scrolled=scrollY(),viewed=scrolled+getViewportH(),elTop=getOffset(el).top,elBottom=elTop+elH,h=h||0;return(elTop+elH*h)<=viewed&&(elBottom-elH*h)>=scrolled;}
function extend(a,b){for(var key in b){if(b.hasOwnProperty(key)){a[key]=b[key];}}
return a;}
function AnimscrollOn(el,options){this.el=el;this.options=extend(this.defaults,options);this._init();}
AnimscrollOn.prototype={defaults:{minDuration:0,maxDuration:0,viewportFactor:0},_init:function(){this.items=Array.prototype.slice.call(document.querySelectorAll('#'+this.el.id+' > li'));this.itemsCount=this.items.length;this.itemsRenderedCount=0;this.didScroll=false;var self=this;imagesLoaded(this.el,function(){new Masonry(self.el,{itemSelector:'li',transitionDuration:0});});},_onScrollFn:function(){var self=this;if(!this.didScroll){this.didScroll=true;setTimeout(function(){self._scrollPage();},60);}},_scrollPage:function(){var self=this;this.items.forEach(function(el,i){if(!classie.has(el,'shown')&&!classie.has(el,'animate')&&inViewport(el,self.options.viewportFactor)){setTimeout(function(){var perspY=scrollY()+getViewportH()/2;self.el.style.WebkitPerspectiveOrigin='50% '+perspY+'px';self.el.style.MozPerspectiveOrigin='50% '+perspY+'px';self.el.style.perspectiveOrigin='50% '+perspY+'px';self._checkTotalRendered();if(self.options.minDuration&&self.options.maxDuration){var randDuration=(Math.random()*(self.options.maxDuration-self.options.minDuration)+self.options.minDuration)+'s';el.style.WebkitAnimationDuration=randDuration;el.style.MozAnimationDuration=randDuration;el.style.animationDuration=randDuration;}
classie.add(el,'animate');},25);}});this.didScroll=false;},_resizeHandler:function(){var self=this;function delayed(){self._scrollPage();self.resizeTimeout=null;}
if(this.resizeTimeout){clearTimeout(this.resizeTimeout);}
this.resizeTimeout=setTimeout(delayed,1000);},_checkTotalRendered:function(){++this.itemsRenderedCount;if(this.itemsRenderedCount===this.itemsCount){window.removeEventListener('scroll',this._onScrollFn);}}}
window.AnimscrollOn=AnimscrollOn;})(window);(function(window){'use strict';var $=window.jQuery;var console=window.console;var hasConsole=typeof console!=='undefined';function extend(a,b){for(var prop in b){a[prop]=b[prop];}
return a;}
var objToString=Object.prototype.toString;function isArray(obj){return objToString.call(obj)==='[object Array]';}
function makeArray(obj){var ary=[];if(isArray(obj)){ary=obj;}else if(typeof obj.length==='number'){for(var i=0,len=obj.length;i<len;i++){ary.push(obj[i]);}}else{ary.push(obj);}
return ary;}
function defineImagesLoaded(EventEmitter,eventie){function ImagesLoaded(elem,options,onAlways){if(!(this instanceof ImagesLoaded)){return new ImagesLoaded(elem,options);}
if(typeof elem==='string'){elem=document.querySelectorAll(elem);}
this.elements=makeArray(elem);this.options=extend({},this.options);if(typeof options==='function'){onAlways=options;}else{extend(this.options,options);}
if(onAlways){this.on('always',onAlways);}
this.getImages();if($){this.jqDeferred=new $.Deferred();}
var _this=this;setTimeout(function(){_this.check();});}
ImagesLoaded.prototype=new EventEmitter();ImagesLoaded.prototype.options={};ImagesLoaded.prototype.getImages=function(){this.images=[];for(var i=0,len=this.elements.length;i<len;i++){var elem=this.elements[i];if(elem.nodeName==='IMG'){this.addImage(elem);}
var childElems=elem.querySelectorAll('img');for(var j=0,jLen=childElems.length;j<jLen;j++){var img=childElems[j];this.addImage(img);}}};ImagesLoaded.prototype.addImage=function(img){var loadingImage=new LoadingImage(img);this.images.push(loadingImage);};ImagesLoaded.prototype.check=function(){var _this=this;var checkedCount=0;var length=this.images.length;this.hasAnyBroken=false;if(!length){this.complete();return;}
function onConfirm(image,message){if(_this.options.debug&&hasConsole){console.log('confirm',image,message);}
_this.progress(image);checkedCount++;if(checkedCount===length){_this.complete();}
return true;}
for(var i=0;i<length;i++){var loadingImage=this.images[i];loadingImage.on('confirm',onConfirm);loadingImage.check();}};ImagesLoaded.prototype.progress=function(image){this.hasAnyBroken=this.hasAnyBroken||!image.isLoaded;this.emit('progress',this,image);if(this.jqDeferred){this.jqDeferred.notify(this,image);}};ImagesLoaded.prototype.complete=function(){var eventName=this.hasAnyBroken?'fail':'done';this.isComplete=true;this.emit(eventName,this);this.emit('always',this);if(this.jqDeferred){var jqMethod=this.hasAnyBroken?'reject':'resolve';this.jqDeferred[jqMethod](this);}};if($){$.fn.imagesLoaded=function(options,callback){var instance=new ImagesLoaded(this,options,callback);return instance.jqDeferred.promise($(this));};}
var cache={};function LoadingImage(img){this.img=img;}
LoadingImage.prototype=new EventEmitter();LoadingImage.prototype.check=function(){var cached=cache[this.img.src];if(cached){this.useCached(cached);return;}
cache[this.img.src]=this;if(this.img.complete&&this.img.naturalWidth!==undefined){this.confirm(this.img.naturalWidth!==0,'naturalWidth');return;}
var proxyImage=this.proxyImage=new Image();eventie.bind(proxyImage,'load',this);eventie.bind(proxyImage,'error',this);proxyImage.src=this.img.src;};LoadingImage.prototype.useCached=function(cached){if(cached.isConfirmed){this.confirm(cached.isLoaded,'cached was confirmed');}else{var _this=this;cached.on('confirm',function(image){_this.confirm(image.isLoaded,'cache emitted confirmed');return true;});}};LoadingImage.prototype.confirm=function(isLoaded,message){this.isConfirmed=true;this.isLoaded=isLoaded;this.emit('confirm',this,message);};LoadingImage.prototype.handleEvent=function(event){var method='on'+event.type;if(this[method]){this[method](event);}};LoadingImage.prototype.onload=function(){this.confirm(true,'onload');this.unbindProxyEvents();};LoadingImage.prototype.onerror=function(){this.confirm(false,'onerror');this.unbindProxyEvents();};LoadingImage.prototype.unbindProxyEvents=function(){eventie.unbind(this.proxyImage,'load',this);eventie.unbind(this.proxyImage,'error',this);};return ImagesLoaded;}
if(typeof define==='function'&&define.amd){define(['eventEmitter','eventie'],defineImagesLoaded);}else{window.imagesLoaded=defineImagesLoaded(window.EventEmitter,window.eventie);}})(window);