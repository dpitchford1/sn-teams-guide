var accessibleTabs4=(function(){var F;function C(H){var I=window.onload;if(typeof window.onload!=="function"){window.onload=H;}else{window.onload=function(){if(I){I();}H();};}}function D(I,H){return new RegExp("(\\s|^)"+H+"(\\s|$)").test(I.className);}function B(I,H){if(!D(I,H)){I.className+=" "+H;}}function G(I,H){if(D(I,H)){I.className=I.className.replace(new RegExp("(\\s|^)"+H+"(\\s|$)")," ").replace(/\s+/g," ").replace(/^\s|\s$/,"");}}function A(){var H=this.linkset.length;while(H--){G(this.linkset[H].parentNode,F);G(this.linkset[H].tabId,F);}B(this.parentNode,F);B(this.tabId,F);return false;}function E(H){C(function(){var L=document.getElementById(H.navId);F=H.onClass||"on";if(L){var I=L.getElementsByTagName("a"),K=I.length,J=D(L,H.hoverableClass||"hoverable");while(K--){I[K].tabId=document.getElementById(I[K].href.slice(I[K].href.lastIndexOf("#")+1))||false;if(I[K].tabId){I[K].linkset=I;I[K].onclick=A;if(J){I[K].onmouseover=A;I[K].onfocus=A;}}}}});}return{init:E};}());
accessibleTabs4.init({navId:"tabableNav"});