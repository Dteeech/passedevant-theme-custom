document.addEventListener('DOMContentLoaded', function () {
   'use strict';
   if (typeof wptvoirplusData !== 'undefined') {
      wptvoirplusData.init = () => {
         document.querySelectorAll('.wptac-voirplus-header').forEach(function (accordionHeader) {
            const container = accordionHeader.parentElement;
            const pane = accordionHeader.nextElementSibling;
            if (!container.classList.contains('wptac-voirplus-container')) {
               container.classList.add('wptac-voirplus-container');
            }
            if (!pane.classList.contains('wptac-voirplus-header')) {
               if (!pane.classList.contains('wptac-voirplus-pane')) {
                  pane.classList.add('wptac-voirplus-pane');
               }
               if (accordionHeader.classList.contains('expanded')) {
                  pane.classList.add('expanded');
                  pane.style.maxHeight = pane.scrollHeight + "px";
               }
               accordionHeader.addEventListener('click', function () {
                  wptvoirplusData.toggle(accordionHeader);
               });
            }
         });
      };

      wptvoirplusData.toggle = (accordionHeader) => {
         const container = accordionHeader.parentElement;
         const isExpanding = !accordionHeader.classList.contains('expanded');
         container.querySelectorAll('.wptac-voirplus-header').forEach(function (testAccordionHeader) {
            const isThisTheTargetHeader = (testAccordionHeader == accordionHeader);
            const pane = testAccordionHeader.nextElementSibling;
            if (isThisTheTargetHeader && isExpanding) {
               testAccordionHeader.classList.add('expanded');
               pane.classList.add('expanded');
               pane.style.maxHeight = pane.scrollHeight + "px";
            } else if ((isThisTheTargetHeader && !isExpanding) || wptvoirplusData.collapseOthers) {
               testAccordionHeader.classList.remove('expanded');
               pane.classList.remove('expanded');
               pane.style.maxHeight = null;
            }
         });
      };

      wptvoirplusData.init();
   }
});
