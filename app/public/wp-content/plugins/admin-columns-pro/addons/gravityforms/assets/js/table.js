!function(e){var t={};function r(n){if(t[n])return t[n].exports;var o=t[n]={i:n,l:!1,exports:{}};return e[n].call(o.exports,o,o.exports,r),o.l=!0,o.exports}r.m=e,r.c=t,r.d=function(e,t,n){r.o(e,t)||Object.defineProperty(e,t,{enumerable:!0,get:n})},r.r=function(e){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(e,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(e,"__esModule",{value:!0})},r.t=function(e,t){if(1&t&&(e=r(e)),8&t)return e;if(4&t&&"object"==typeof e&&e&&e.__esModule)return e;var n=Object.create(null);if(r.r(n),Object.defineProperty(n,"default",{enumerable:!0,value:e}),2&t&&"string"!=typeof e)for(var o in e)r.d(n,o,function(t){return e[t]}.bind(null,o));return n},r.n=function(e){var t=e&&e.__esModule?function(){return e.default}:function(){return e};return r.d(t,"a",t),t},r.o=function(e,t){return Object.prototype.hasOwnProperty.call(e,t)},r.p="",r(r.s=0)}([function(e,t,r){"use strict";r.r(t);class n{place(){let e=o(),t=document.querySelector(".gform-settings__content"),r=document.querySelector("#ac-s");t&&r&&(t.parentElement.insertBefore(e,t),e.append(r),e.insertAdjacentHTML("beforeend",'<div class="gf-acs-button-container"><button class="button">Filter</button></div>'))}}const o=()=>{let e=document.createElement("form");e.id="gf-acs-form",e.addEventListener("submit",()=>{let t=AC_SERVICES.getService("Search").getRules();if(AC_SERVICES.getService("Search").disableFields(),0===t.rules.length)return;let r=document.createElement("input");r.type="hidden",r.name="ac-rules",r.value=JSON.stringify(t),e.append(r)});const t=new URLSearchParams(window.location.search);return["page","id"].forEach(r=>{let n=t.get(r);n&&e.insertAdjacentHTML("afterbegin",`<input type="hidden" name="${r}" value="${n}">`)}),e};ACP_TABLE&&ACP_TABLE.hasOwnProperty("column_sets_style")&&(ACP_TABLE.column_sets_style="dropdown"),document.addEventListener("DOMContentLoaded",()=>{let e=document.querySelector("#gf_form_toolbar");e&&e.insertAdjacentHTML("afterend",'<div class="wp-header-end"></div>')}),AC_SERVICES.addListener("Table.Ready",()=>{var e,t;const r=document.querySelector(".acp-layout-switcher"),n=document.querySelector(".gform-form-toolbar__container #gform-form-toolbar__menu");if(r&&n&&n.parentElement.insertBefore(r,n),AC.list_screen.indexOf("gf_entry")>-1){let r=document.querySelector(".tablenav-pages .displaying-num");if(r){let n=r.innerHTML.split(" ")[0],o=n.replace(",","").replace(".","");"undefined"!=typeof ACP_Export&&(ACP_Export.total_num_items=o),null===(t=null===(e=AC_SERVICES.getService("Editing"))||void 0===e?void 0:e.getService("BulkSelectionRow"))||void 0===t||t.setTotalItems(parseInt(o),n)}}}),AC_SERVICES.addListener("Service.Registered.LayoutTabs",e=>{if("tabs"===e.getStyle()){const t=e.getElement(),r=document.querySelector("#gf-admin-notices-wrapper");r&&t&&t.insertSelfBefore(r)}}),AC_SERVICES.addListener("Service.Registered.Search",e=>{e.placementFactory.register("gravity_forms_entry",new n)})}]);