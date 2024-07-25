document.addEventListener('DOMContentLoaded', function() {
    'use strict';
    if (typeof wptacData !== 'undefined') {
       wptacData.init = () => {
          document.querySelectorAll('.wptac-header').forEach(function(accordionHeader) {
             const container = accordionHeader.parentElement;
             const pane = accordionHeader.nextElementSibling;
             if (!container.classList.contains('wptac-container')) {
                container.classList.add('wptac-container');
             }
             if (!pane.classList.contains('wptac-header')) {
                if (!pane.classList.contains('wptac-pane')) {
                   pane.classList.add('wptac-pane');
                }
                if (accordionHeader.classList.contains('expanded')) {
                   pane.classList.add('expanded');
                   pane.style.maxHeight = pane.scrollHeight + "px";
                }
                accordionHeader.addEventListener('click', function() {
                   wptacData.toggle(accordionHeader);
                });
             }
          });
       };
 
       wptacData.toggle = (accordionHeader) => {
          const container = accordionHeader.parentElement;
          const isExpanding = !accordionHeader.classList.contains('expanded');
          container.querySelectorAll('.wptac-header').forEach(function(testAccordionHeader) {
             const isThisTheTargetHeader = (testAccordionHeader == accordionHeader);
             const pane = testAccordionHeader.nextElementSibling;
             if (isThisTheTargetHeader && isExpanding) {
                testAccordionHeader.classList.add('expanded');
                pane.classList.add('expanded');
                pane.style.maxHeight = pane.scrollHeight + "px";
             } else if ((isThisTheTargetHeader && !isExpanding) || wptacData.collapseOthers) {
                testAccordionHeader.classList.remove('expanded');
                pane.classList.remove('expanded');
                pane.style.maxHeight = null;
             }
          });
       };
 
       wptacData.init();
    }
 });
 