/**
 * File customizer.js.
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */


jQuery(document).ready(function($) {
  
  "use strict";

  $('.banner_class #adults_capacity').selectric();
  $('.banner_class #max_child').selectric();

    //Web Pre Loader
    $(window).on( 'load', function () {
        $(".swing-preloader").fadeOut("slow");
    });

    //responsive menu

    $('body').on( 'click keypress','#toggle', function(e) {
        e.preventDefault();
        $(this).toggleClass('active');
        $('.nav ul.menu').toggleClass('active');
    }); 


 	 $(".frontpage-banner").owlCarousel({ 
 
      nav : true, // Show next and prev buttons
      slideSpeed : 300,
      paginationSpeed : 400,
      singleItem: true,
      loop: true,
      autoplay: true,
      items : 1,
      dots: false,
      navText: [
   		"<i class='fa fa-long-arrow-left'></i>",
   		"<i class='fa fa-long-arrow-right'></i>"
		]
  	});

   $(".rooms-wrapper .rooms").owlCarousel({
      nav : true,
      slideSpeed : 300,
      paginationSpeed : 400,
      singleItem: true,
      items : 3,
      lazyLoad: true,
      navText: [
        "<i class='fa fa-long-arrow-left'></i>",
        "<i class='fa fa-long-arrow-right'></i>"
      ],
      responsiveClass: true,
      responsive: {
            0:{
              items: 1,
              margin:0,
              center:true
            },
            600:{
              items: 2
            },
            800:{
              items: 3
            }
        }
    });

   $(".testimonials-items").owlCarousel({
      nav : true,
      slideSpeed : 300,
      paginationSpeed : 400,
      singleItem: true,
      margin: 110,
      loop: true,
      items : 1,
      navText: [
      "<i class='fa fa-angle-left'></i>",
      "<i class='fa fa-angle-right'></i>"
    ]
    });

   $(".team-items").owlCarousel({
      nav : true,
      slideSpeed : 300,
      paginationSpeed : 400,
      singleItem: true,
      margin:25,
      items : 3,
      center: true,
      loop: true,
      navText: [
      "<i class='fa fa-long-arrow-left'></i>",
      "<i class='fa fa-long-arrow-right'></i>"
    ],
    responsiveClass: true,
    responsive: {
        0:{
          items: 1,
          margin:0
        },
        500:{
          items: 2,
          margin:10,
          center: false,
        },
        992:{
          items:3,
          center: false,
        }
    }
    });

    $(".partners-slider").owlCarousel({
      nav: false,
      slideSpeed : 300,
      paginationSpeed : 400,
      singleItem: true,
      margin:150,
      items :4,
      loop: true,
      autoplay: true,
      dots: true,
      responsiveClass: true,
      responsive: {
        0:{
          items: 2,
          margin:40,
          center:false
        },
        500:{
          items:3,
          margin:40,
        },
        992:{
          items: 4
        }
      }
    });

  /* fancybox for Pop up video*/
  $(".swing-video-play").fancybox({
      'transitionIn'  : 'none',
      'transitionOut' : 'none',
      'showCloseButton' : true,  
      'showNavArrows' : true,
      'centerOnScroll': true,
      'overlayOpacity': 0.5,
      'overlayColor' : '#fff',
      'autoDimensions'  : false,
      'width'             : 1000,
      'height'            : 800,
      'padding' : 0,
      'showCloseButton': true,
  });

  /* Masonary js */
  var $grid = $('.grid').imagesLoaded( function() {
    $grid.masonry({
      itemSelector: '.grid-item',
      percentPosition: true,
      columnWidth: '.grid-sizer'
    }); 
  });

  // scroll up icon slow
  if ($('.scrollup').length) {
    var scrollTrigger = 100, // px
    goToTop = function() {
         var scrollTop = $(window).scrollTop();
         if (scrollTop > scrollTrigger) {
             $('.scrollup').show();
         } else {
             $('.scrollup').hide();
         }
    };

    $(window).on('scroll', function() {
       goToTop();
    });

    $('.scrollup').on('click', function(e) {
       e.preventDefault();
       $('html,body').animate({
           scrollTop: 0
       }, 700);
    });
  }

});