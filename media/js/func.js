/* -------------------------------------------------------------------------------------------------------------------------
   ONLOAD
   function addLoadEvent(func)
*/

function addLoadEvent(func) {
  var oldOnLoad = window.onload;
  if (typeof window.onload != 'function') {
    window.onload = func;
  }
  else {
    window.onload = function() {
      oldOnLoad();
      func();
    }
  }
}

var doc = window.document; function addLoadEvent(b){var a=window.onload;if(typeof window.onload!=="function"){window.onload=b}else{window.onload=function(){a();b()}}}; doc.documentElement.className = document.documentElement.className.replace(/\bno-js\b/g, '') + ' js';
if (doc.querySelector && doc.addEventListener) { (function() { if (navigator.userAgent.match(/IEMobile\/10\.0/)) { var msViewportStyle = doc.createElement("style"); msViewportStyle.appendChild( doc.createTextNode("@-ms-viewport{width:auto!important}") ); doc.getElementsByTagName("head")[0].appendChild(msViewportStyle); } })(); }

/* application wrapper
-------------------------------------------------------------------------------------------------------------------------- */
var sg = sg || {};
window.sg = (function (window, document, sgwrapper) {

    /* set up a couple helpers
    ---------------------------------------------- */
    //var doc = window.document;
    function setAttributes(el, attrs) {
        for (var key in attrs) {
        el.setAttribute(key, attrs[key]);
        }
    }

    /* Small screen menu
  ---------------------------------------------- */
    (function (win) {
        "use strict";
        var menu = doc.querySelector('#global-header'),
            menulinks = doc.querySelector('#ss-nav'),
            fragment = doc.createDocumentFragment(),
            toggler = fragment.appendChild(doc.createElement('a')),
            //ssLogo = fragment.appendChild(doc.createElement('a'));

        setAttributes(menu, {
            "aria-labelledby": "menu-trigger"
        });

        // toggler link
        setAttributes(toggler, {
            "aria-controls": "global-header",
            "href": "#global-header",
            "id": "menu-trigger",
            "aria-label": "<%= I18n.t('menu.main_menu') %>",
            "role": "button",
            "class": "menu-trigger ico i-sm i--menu"
        });
        // create ss logo
        // setAttributes(ssLogo, {
        //     "class": "ico brand-ss",
        //     "href": "/",
        //     "id": "menu-trigger"
        // });

        toggler.innerHTML = 'Menu';
        //ssLogo.innerHTML = 'Rogers NHL GameCentre Live';

        if (window.matchMedia('only screen and (max-width: 600px)').matches) {
            menu.setAttribute('aria-expanded', 'false');
        }

        if (doc.querySelector && doc.addEventListener) {

            menulinks.appendChild(fragment);
            menu.className += ' is-hidden';

            toggler.addEventListener('click', function (e) {
                e.preventDefault();
                toggler.className = (toggler.className === 'menu-trigger ico i-sm i--menu') ? 'menu-trigger open ico i-m i--close' : 'menu-trigger ico i-sm i--menu';
                menu.className = (menu.className === 'global-header is-hidden') ? 'global-header is-visible' : 'global-header is-hidden';

                menu.setAttribute('aria-expanded', menu.getAttribute('aria-expanded') === 'true' ? 'false' : 'true');

            });
        }

    }(this));
    // end small screen menu




    //addLoadEvent(animateAnchorScroll);

})(this, this.document);

