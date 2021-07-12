(function ($, window, document, undefined) {
 "use strict";
 // Only apply if rt-tree list exists
 if ($('ul.rt-tree').length) {

  // Settings
  var collapsed = true;
  var close_same_level = true;
  var duration = 400;
  var listAnim = true;
  var easing = 'easeInOutQuad';


  // Set initial styles 
  $('.rt-tree ul').css({
   'overflow': 'hidden',
   'height': (collapsed) ? 0 : 'auto',
   'display': (collapsed) ? 'none' : 'block'
  });

  // Get node elements, and add classes for styling
  var node = $('.rt-tree li:has(ul)');
  node.each(function (index, val) {
   $(this).children(':first-child').css('cursor', 'pointer')
   $(this).addClass('rt-tree-node rt-tree-' + ((collapsed) ? 'closed' : 'open'));
   $(this).children('ul').addClass('rt-tree-level-' + ($(this).parentsUntil($('ul.rt-tree'), 'ul').length + 1));
  });

  // Set rt-tree-active class on list items for last opened element
  $('.rt-tree li > *:first-child').on('click.rt-tree-active', function (e) {
   if ($(this).parent().hasClass('rt-tree-closed')) {
    $('.rt-tree-active').not($(this).parent()).removeClass('rt-tree-active');
    $(this).parent().addClass('rt-tree-active');
   } else if ($(this).parent().hasClass('rt-tree-open')) {
    $(this).parent().removeClass('rt-tree-active');
   } else {
    $('.rt-tree-active').not($(this).parent()).removeClass('rt-tree-active');
    $(this).parent().toggleClass('rt-tree-active');
   }
  });

  node.children(':first-child').on('click.rt-tree', function (e) {

   // element vars
   var el = $(this).parent().children('ul').first();
   var isOpen = $(this).parent().hasClass('rt-tree-open');

   // close other elements on same level if opening 
   if ((close_same_level || $('.csl').hasClass('active')) && !isOpen) {
    var close_items = $(this).closest('ul').children('.rt-tree-open').not($(this).parent()).children('ul');

    // Velocity.js
    if ($.Velocity) {
     close_items.velocity({
      height: 0
     }, {
      duration: duration,
      easing: easing,
      display: 'none',
      delay: 100,
      complete: function () {
       setNodeClass($(this).parent(), true)
      }
     });

     // jQuery fallback
    } else {
     close_items.delay(100).slideToggle(duration, function () {
      setNodeClass($(this).parent(), true);
     });
    }
   }

   // force auto height of element so actual height can be extracted
   el.css({
    'height': 'auto'
   });

   // listAnim: animate child elements when opening
   if (!isOpen && $.Velocity && listAnim) el.find(' > li, li.rt-tree-open > ul > li').css({
    'opacity': 0
   }).velocity('stop').velocity('list');

   // Velocity.js animate element
   if ($.Velocity) {
    el.velocity('stop').velocity({
     //translateZ: 0, // optional hardware-acceleration is automatic on mobile
     height: isOpen ? [0, el.outerHeight()] : [el.outerHeight(), 0]
    }, {
     queue: false,
     duration: duration,
     easing: easing,
     display: isOpen ? 'none' : 'block',
     begin: setNodeClass($(this).parent(), isOpen),
     complete: function () {
      if (!isOpen) $(this).css('height', 'auto');
     }
    });

    // jQuery fallback animate element
   } else {
    setNodeClass($(this).parent(), isOpen);
    el.slideToggle(duration);
   }

   // We can't have nodes as links unfortunately
   e.preventDefault();
  });

  // Function for updating node class
  function setNodeClass(el, isOpen) {
   if (isOpen) {
    el.removeClass('rt-tree-open').addClass('rt-tree-closed');
   } else {
    el.removeClass('rt-tree-closed').addClass('rt-tree-open');
   }
  }

  // List animation sequence
  if ($.Velocity && listAnim) {
   $.Velocity.Redirects.list = function (element, options, index, size) {
    $.Velocity.animate(element, {
     opacity: [1, 0],
     translateY: [0, -(index + 12)]
    }, {
     delay: index * (duration / size / 1.2),
     duration: duration,
     easing: easing
    });
   };
  }


  if ($('.rt-tree').css('opacity') == 0) {
   if ($.Velocity) {
    $('.rt-tree').css('opacity', 1).children().css('opacity', 0).velocity('list');
   } else {
    $('.rt-tree').show(200);
   }
  }

  $('body').addClass('menu-loaded');

 }
}(jQuery, this, this.document));

jQuery(document).ready(function ($) {
 "use strict";

 function MobileMenuReverse() {
  $('.rt-tree .display-menu-item-image').stop(true, true).velocity('reverse');
  $('ul.rt-tree > li').stop(true, true).velocity('reverse');
 }

 if ($('#rt-main-toggle-menu').length) {
  $('#rt-main-toggle-menu').on('click', function () {
   if ($('body').hasClass('menu-is-onscreen')) {
    if (!$('body').hasClass('menu-is-closing')) {
     MobileMenuAction('close');
    }
   } else {
    if (!$('body').hasClass('menu-is-opening')) {
     MobileMenuAction('open');
    }
   }
  });
  $(".responsive-menu-overlay").on('click', function () {
   MobileMenuAction('close');
   MobileMenuReverse();
  });

 }

 function MobileMenuAction(action) {

  if (action == "resized") {
   $('#rt-main-toggle-menu').removeClass('rt-main-toggle-menu-open');
   $('body').removeClass('rt-dashboard-push-left');
   $('.rt-mobile-menu').removeClass('menu-push-onscreen');
   $('body').removeClass('menu-is-onscreen');
   MobileMenuReverse();
  } else {
   $('#rt-main-toggle-menu').toggleClass('rt-main-toggle-menu-open');
   $('body').toggleClass('rt-dashboard-push-left');
  }

  if (action == 'close') {
   $('body').addClass('menu-is-closing');
   $('.rt-dashboard-columns').stop(true, true).velocity('transition.slideUpOut', {
    stagger: 120,
    duration: 800,
    complete: function () {
     $('.rt-mobile-menu').toggleClass('menu-push-onscreen');
     $('body').toggleClass('menu-is-onscreen');

     MobileMenuReverse();
     $('body').removeClass('menu-is-closing');
    }
   });


  }

  if (action == 'open') {

   $('body').addClass('menu-is-opening');
   $('.rt-mobile-menu').stop(true, true).velocity('fadeIn', {
    complete: function () {
     $('.rt-mobile-menu').toggleClass('menu-push-onscreen');
     $('body').toggleClass('menu-is-onscreen');

     $('.rt-dashboard-columns').stop(true, true).velocity('transition.slideUpIn', {
      stagger: 120,
      duration: 800,
      complete: function () {
       $('.rt-dashboard-columns').find('.lazyload-after').addClass('lazyload');
      }
     });

     animateDisplayMenuItems();
     $('body').removeClass('menu-is-opening');
    }
   });
  }
 }

 function animateDisplayMenuItems() {

  $.Velocity.RegisterEffect('menuParentItems', {
   calls: [
			  [{
     opacity: [1, 0],
     bottom: [0, -5]
    }]
			]
  });
  $('.rt-mobile-menu ul.rt-tree > li').css({
   'opacity': 0,
   'bottom': -5
  }).stop(true, true).velocity('menuParentItems', {
   stagger: 100,
   complete: function () {
    $(this).addClass('menu-item-is-visible');
   }
  });
 }


 function SidebarMenuAction(action) {

  $('#sidebarinfo-toggle-menu').toggleClass('sidebar-toggle-menu-open');
  $('body').toggleClass('rt-dashboard-push-left');

  if (action == 'close') {

   $('.rt-dashboard-columns').velocity('transition.slideUpOut', {
    stagger: 120,
    display: "flex",
    duration: 800
   });

   $('.sidebarinfo-menu').velocity('fadeOut', {
    duration: 800,
    complete: function () {
     $('.sidebarinfo-menu').toggleClass('sidebar-push-onscreen');
     $('body').toggleClass('sidebar-is-onscreen');
    }
   });



  }

  if (action == 'open') {

   $('.sidebarinfo-menu').toggleClass('sidebar-push-onscreen');
   $('body').toggleClass('sidebar-is-onscreen');
   $('.rt-dashboard-columns').find('.lazyload-after').addClass('lazyload');

   $('.sidebarinfo-menu').velocity('fadeIn', {
    complete: function () {
     $('.rt-dashboard-columns').velocity('transition.fadeIn', {
      stagger: 120,
      display: "flex",
      duration: 800,
      complete: function () {}
     });
    }
   });
  }
 }


 if ($('#sidebarinfo-toggle-menu').length) {
  $('#sidebarinfo-toggle-menu').on('click', function () {
   if ($('body').hasClass('sidebar-is-onscreen')) {
    SidebarMenuAction('close');
   } else {
    SidebarMenuAction('open');
   }
  });
  $('.sidebar-menu-overlay').on('click', function () {
   SidebarMenuAction('close');
  });
 }




 if ($.fn.hoverIntent) {
  $('.outer-wrap').hoverIntent({
   over: mainMenuOn,
   out: mainMenuOff
  });
 } else {
  $('.outer-wrap').mouseenter(function () {
    mainMenuOn();
   })
   .mouseleave(function () {
    mainMenuOff();
   });
 }
 var hoverOutMenu;

 function mainMenuOn() {
  clearTimeout(hoverOutMenu);
  $('body').addClass('main-menu-on');
 }

 function mainMenuOff() {
  hoverOutMenu = setTimeout(function () {
   $('body').removeClass('main-menu-on');
  }, 600);
 }


});
