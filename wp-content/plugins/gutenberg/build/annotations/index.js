this.wp=this.wp||{},this.wp.annotations=function(t){var e={};function n(r){if(e[r])return e[r].exports;var o=e[r]={i:r,l:!1,exports:{}};return t[r].call(o.exports,o,o.exports,n),o.l=!0,o.exports}return n.m=t,n.c=e,n.d=function(t,e,r){n.o(t,e)||Object.defineProperty(t,e,{enumerable:!0,get:r})},n.r=function(t){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(t,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(t,"__esModule",{value:!0})},n.t=function(t,e){if(1&e&&(t=n(t)),8&e)return t;if(4&e&&"object"==typeof t&&t&&t.__esModule)return t;var r=Object.create(null);if(n.r(r),Object.defineProperty(r,"default",{enumerable:!0,value:t}),2&e&&"string"!=typeof t)for(var o in t)n.d(r,o,function(e){return t[e]}.bind(null,o));return r},n.n=function(t){var e=t&&t.__esModule?function(){return t.default}:function(){return t};return n.d(e,"a",e),e},n.o=function(t,e){return Object.prototype.hasOwnProperty.call(t,e)},n.p="",n(n.s=383)}({1:function(t,e){!function(){t.exports=this.wp.i18n}()},15:function(t,e,n){"use strict";n.d(e,"a",(function(){return o}));var r=n(41);function o(t,e){if(null==t)return{};var n,o,a=Object(r.a)(t,e);if(Object.getOwnPropertySymbols){var i=Object.getOwnPropertySymbols(t);for(o=0;o<i.length;o++)n=i[o],e.indexOf(n)>=0||Object.prototype.propertyIsEnumerable.call(t,n)&&(a[n]=t[n])}return a}},2:function(t,e){!function(){t.exports=this.lodash}()},20:function(t,e,n){"use strict";n.d(e,"a",(function(){return i}));var r=n(24);var o=n(38),a=n(27);function i(t){return function(t){if(Array.isArray(t))return Object(r.a)(t)}(t)||Object(o.a)(t)||Object(a.a)(t)||function(){throw new TypeError("Invalid attempt to spread non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.")}()}},226:function(t,e,n){"use strict";var r="undefined"!=typeof crypto&&crypto.getRandomValues&&crypto.getRandomValues.bind(crypto)||"undefined"!=typeof msCrypto&&"function"==typeof msCrypto.getRandomValues&&msCrypto.getRandomValues.bind(msCrypto),o=new Uint8Array(16);function a(){if(!r)throw new Error("crypto.getRandomValues() not supported. See https://github.com/uuidjs/uuid#getrandomvalues-not-supported");return r(o)}for(var i=[],u=0;u<256;++u)i[u]=(u+256).toString(16).substr(1);var c=function(t,e){var n=e||0,r=i;return[r[t[n++]],r[t[n++]],r[t[n++]],r[t[n++]],"-",r[t[n++]],r[t[n++]],"-",r[t[n++]],r[t[n++]],"-",r[t[n++]],r[t[n++]],"-",r[t[n++]],r[t[n++]],r[t[n++]],r[t[n++]],r[t[n++]],r[t[n++]]].join("")};e.a=function(t,e,n){var r=e&&n||0;"string"==typeof t&&(e="binary"===t?new Array(16):null,t=null);var o=(t=t||{}).random||(t.rng||a)();if(o[6]=15&o[6]|64,o[8]=63&o[8]|128,e)for(var i=0;i<16;++i)e[r+i]=o[i];return e||c(o)}},24:function(t,e,n){"use strict";function r(t,e){(null==e||e>t.length)&&(e=t.length);for(var n=0,r=new Array(e);n<e;n++)r[n]=t[n];return r}n.d(e,"a",(function(){return r}))},26:function(t,e){!function(){t.exports=this.wp.richText}()},27:function(t,e,n){"use strict";n.d(e,"a",(function(){return o}));var r=n(24);function o(t,e){if(t){if("string"==typeof t)return Object(r.a)(t,e);var n=Object.prototype.toString.call(t).slice(8,-1);return"Object"===n&&t.constructor&&(n=t.constructor.name),"Map"===n||"Set"===n?Array.from(n):"Arguments"===n||/^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n)?Object(r.a)(t,e):void 0}}},29:function(t,e){!function(){t.exports=this.wp.hooks}()},38:function(t,e,n){"use strict";function r(t){if("undefined"!=typeof Symbol&&Symbol.iterator in Object(t))return Array.from(t)}n.d(e,"a",(function(){return r}))},383:function(t,e,n){"use strict";n.r(e);var r={};n.r(r),n.d(r,"__experimentalGetAnnotationsForBlock",(function(){return g})),n.d(r,"__experimentalGetAllAnnotationsForBlock",(function(){return m})),n.d(r,"__experimentalGetAnnotationsForRichText",(function(){return j})),n.d(r,"__experimentalGetAnnotations",(function(){return h}));var o={};n.r(o),n.d(o,"__experimentalAddAnnotation",(function(){return x})),n.d(o,"__experimentalRemoveAnnotation",(function(){return _})),n.d(o,"__experimentalUpdateAnnotationRange",(function(){return w})),n.d(o,"__experimentalRemoveAnnotationsBySource",(function(){return N}));var a=n(4),i=n(20),u=n(5),c=n(2);function f(t,e){var n=Object.keys(t);if(Object.getOwnPropertySymbols){var r=Object.getOwnPropertySymbols(t);e&&(r=r.filter((function(e){return Object.getOwnPropertyDescriptor(t,e).enumerable}))),n.push.apply(n,r)}return n}function s(t){for(var e=1;e<arguments.length;e++){var n=null!=arguments[e]?arguments[e]:{};e%2?f(Object(n),!0).forEach((function(e){Object(u.a)(t,e,n[e])})):Object.getOwnPropertyDescriptors?Object.defineProperties(t,Object.getOwnPropertyDescriptors(n)):f(Object(n)).forEach((function(e){Object.defineProperty(t,e,Object.getOwnPropertyDescriptor(n,e))}))}return t}function l(t,e){var n=t.filter(e);return t.length===n.length?t:n}function p(t){return Object(c.isNumber)(t.start)&&Object(c.isNumber)(t.end)&&t.start<=t.end}var d=function(){var t=arguments.length>0&&void 0!==arguments[0]?arguments[0]:{},e=arguments.length>1?arguments[1]:void 0;switch(e.type){case"ANNOTATION_ADD":var n=e.blockClientId,r={id:e.id,blockClientId:n,richTextIdentifier:e.richTextIdentifier,source:e.source,selector:e.selector,range:e.range};if("range"===r.selector&&!p(r.range))return t;var o=Object(c.get)(t,n,[]);return s({},t,Object(u.a)({},n,[].concat(Object(i.a)(o),[r])));case"ANNOTATION_REMOVE":return Object(c.mapValues)(t,(function(t){return l(t,(function(t){return t.id!==e.annotationId}))}));case"ANNOTATION_UPDATE_RANGE":return Object(c.mapValues)(t,(function(t){var n=!1,r=t.map((function(t){return t.id===e.annotationId?(n=!0,s({},t,{range:{start:e.start,end:e.end}})):t}));return n?r:t}));case"ANNOTATION_REMOVE_SOURCE":return Object(c.mapValues)(t,(function(t){return l(t,(function(t){return t.source!==e.source}))}))}return t},b=n(15),O=n(43);function v(t,e){var n=Object.keys(t);if(Object.getOwnPropertySymbols){var r=Object.getOwnPropertySymbols(t);e&&(r=r.filter((function(e){return Object.getOwnPropertyDescriptor(t,e).enumerable}))),n.push.apply(n,r)}return n}var y=[],g=Object(O.a)((function(t,e){return Object(c.get)(t,e,[]).filter((function(t){return"block"===t.selector}))}),(function(t,e){return[Object(c.get)(t,e,y)]})),m=function(t,e){return Object(c.get)(t,e,y)},j=Object(O.a)((function(t,e,n){return Object(c.get)(t,e,[]).filter((function(t){return"range"===t.selector&&n===t.richTextIdentifier})).map((function(t){return function(t){for(var e=1;e<arguments.length;e++){var n=null!=arguments[e]?arguments[e]:{};e%2?v(Object(n),!0).forEach((function(e){Object(u.a)(t,e,n[e])})):Object.getOwnPropertyDescriptors?Object.defineProperties(t,Object.getOwnPropertyDescriptors(n)):v(Object(n)).forEach((function(e){Object.defineProperty(t,e,Object.getOwnPropertyDescriptor(n,e))}))}return t}({},t.range,{},Object(b.a)(t,["range"]))}))}),(function(t,e){return[Object(c.get)(t,e,y)]}));function h(t){return Object(c.flatMap)(t,(function(t){return t}))}var A=n(226);function x(t){var e=t.blockClientId,n=t.richTextIdentifier,r=void 0===n?null:n,o=t.range,a=void 0===o?null:o,i=t.selector,u=void 0===i?"range":i,c=t.source,f=void 0===c?"default":c,s=t.id,l={type:"ANNOTATION_ADD",id:void 0===s?Object(A.a)():s,blockClientId:e,richTextIdentifier:r,source:f,selector:u};return"range"===u&&(l.range=a),l}function _(t){return{type:"ANNOTATION_REMOVE",annotationId:t}}function w(t,e,n){return{type:"ANNOTATION_UPDATE_RANGE",annotationId:t,start:e,end:n}}function N(t){return{type:"ANNOTATION_REMOVE_SOURCE",source:t}}Object(a.registerStore)("core/annotations",{reducer:d,selectors:r,actions:o});var T=n(26),P=n(1);var E={name:"core/annotation",title:Object(P.__)("Annotation"),tagName:"mark",className:"annotation-text",attributes:{className:"class",id:"id"},edit:function(){return null},__experimentalGetPropsForEditableTreePreparation:function(t,e){var n=e.richTextIdentifier,r=e.blockClientId;return{annotations:t("core/annotations").__experimentalGetAnnotationsForRichText(r,n)}},__experimentalCreatePrepareEditableTree:function(t){var e=t.annotations;return function(t,n){if(0===e.length)return t;var r={formats:t,text:n};return(r=function(t){var e=arguments.length>1&&void 0!==arguments[1]?arguments[1]:[];return e.forEach((function(e){var n=e.start,r=e.end;n>t.text.length&&(n=t.text.length),r>t.text.length&&(r=t.text.length);var o="annotation-text-"+e.source,a="annotation-text-"+e.id;t=Object(T.applyFormat)(t,{type:"core/annotation",attributes:{className:o,id:a}},n,r)})),t}(r,e)).formats}},__experimentalGetPropsForEditableTreeChangeHandler:function(t){return{removeAnnotation:t("core/annotations").__experimentalRemoveAnnotation,updateAnnotationRange:t("core/annotations").__experimentalUpdateAnnotationRange}},__experimentalCreateOnChangeEditableValue:function(t){return function(e){var n=function(t){var e={};return t.forEach((function(t,n){(t=(t=t||[]).filter((function(t){return"core/annotation"===t.type}))).forEach((function(t){var r=t.attributes.id;r=r.replace("annotation-text-",""),e.hasOwnProperty(r)||(e[r]={start:n}),e[r].end=n+1}))})),e}(e),r=t.removeAnnotation,o=t.updateAnnotationRange;!function(t,e,n){var r=n.removeAnnotation,o=n.updateAnnotationRange;t.forEach((function(t){var n=e[t.id];if(n){var a=t.start,i=t.end;a===n.start&&i===n.end||o(t.id,n.start,n.end)}else r(t.id)}))}(t.annotations,n,{removeAnnotation:r,updateAnnotationRange:o})}}},I=E.name,R=Object(b.a)(E,["name"]);Object(T.registerFormatType)(I,R);var S=n(29);Object(S.addFilter)("editor.BlockListBlock","core/annotations",(function(t){return Object(a.withSelect)((function(t,e){var n=e.clientId,r=e.className;return{className:t("core/annotations").__experimentalGetAnnotationsForBlock(n).map((function(t){return"is-annotated-by-"+t.source})).concat(r).filter(Boolean).join(" ")}}))(t)}))},4:function(t,e){!function(){t.exports=this.wp.data}()},41:function(t,e,n){"use strict";function r(t,e){if(null==t)return{};var n,r,o={},a=Object.keys(t);for(r=0;r<a.length;r++)n=a[r],e.indexOf(n)>=0||(o[n]=t[n]);return o}n.d(e,"a",(function(){return r}))},43:function(t,e,n){"use strict";var r,o;function a(t){return[t]}function i(){var t={clear:function(){t.head=null}};return t}function u(t,e,n){var r;if(t.length!==e.length)return!1;for(r=n;r<t.length;r++)if(t[r]!==e[r])return!1;return!0}r={},o="undefined"!=typeof WeakMap,e.a=function(t,e){var n,c;function f(){n=o?new WeakMap:i()}function s(){var n,r,o,a,i,f=arguments.length;for(a=new Array(f),o=0;o<f;o++)a[o]=arguments[o];for(i=e.apply(null,a),(n=c(i)).isUniqueByDependants||(n.lastDependants&&!u(i,n.lastDependants,0)&&n.clear(),n.lastDependants=i),r=n.head;r;){if(u(r.args,a,1))return r!==n.head&&(r.prev.next=r.next,r.next&&(r.next.prev=r.prev),r.next=n.head,r.prev=null,n.head.prev=r,n.head=r),r.val;r=r.next}return r={val:t.apply(null,a)},a[0]=null,r.args=a,n.head&&(n.head.prev=r,r.next=n.head),n.head=r,r.val}return e||(e=a),c=o?function(t){var e,o,a,u,c,f=n,s=!0;for(e=0;e<t.length;e++){if(o=t[e],!(c=o)||"object"!=typeof c){s=!1;break}f.has(o)?f=f.get(o):(a=new WeakMap,f.set(o,a),f=a)}return f.has(r)||((u=i()).isUniqueByDependants=s,f.set(r,u)),f.get(r)}:function(){return n},s.getDependants=e,s.clear=f,f(),s}},5:function(t,e,n){"use strict";function r(t,e,n){return e in t?Object.defineProperty(t,e,{value:n,enumerable:!0,configurable:!0,writable:!0}):t[e]=n,t}n.d(e,"a",(function(){return r}))}});