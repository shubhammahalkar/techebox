jQuery(document).ready(function() {
    "use strict";

/*===================================================================================*/
/*	OWL CAROUSEL
/*===================================================================================*/
    
jQuery(function () {
    var dragging = true;
    var owlElementID = "#owl-main";
    jQuery(owlElementID).owlCarousel({

        autoPlay: 5000,
        stopOnHover: true,
        navigation: true,
        pagination: true,
        singleItem: true,
        addClassActive: true,
        nav: true,
        navigationText: ["<i class='icon fa fa-angle-left'></i>", "<i class='icon fa fa-angle-right'></i>"]

    });
 jQuery('.topdeal').each(function(){

    var owl = $(this);
    var  itemPerLine = owl.data('item');
    if(!itemPerLine){
        itemPerLine = 5;
    }
    owl.owlCarousel({
        items : itemPerLine,
        itemsTablet:[768,2],
        navigation : true,
        pagination : false,

        navigationText: ["", ""]
    });
});
jQuery('.home-owl-carousel').each(function(){

    var owl = $(this);
    var  itemPerLine = owl.data('item');
    if(!itemPerLine){
        itemPerLine = 6;
    }
    owl.owlCarousel({
        items : itemPerLine,
        itemsTablet:[768,2],
        navigation : true,
        pagination : false,

        navigationText: ["", ""]
    });
});

jQuery('.home-owl-carousel').each(function(){

    var owl = $(this);
    var  itemPerLine = owl.data('item');
    if(!itemPerLine){
        itemPerLine = 6;
    }
    owl.owlCarousel({
        items : itemPerLine,
        itemsTablet:[768,2],
        navigation : true,
        pagination : false,

        navigationText: ["", ""]
    });
});

jQuery('.slider1').each(function(){

    var owl = $(this);
    var  itemPerLine = owl.data('item');
    if(!itemPerLine){
        itemPerLine = 4;
    }
    owl.owlCarousel({
        items : itemPerLine,
        itemsTablet:[768,2],
        itemsDesktop : [1199,2],
        navigation : false,
        pagination : false,

        navigationText: ["", ""]
    });
});
jQuery('.logo').each(function(){

    var owl = $(this);
    var  itemPerLine = owl.data('item');
    if(!itemPerLine){
        itemPerLine = 7;
    }
    owl.owlCarousel({
        autoplay:true,

        items : itemPerLine,
        itemsTablet:[768,2],
        itemsDesktop : [1199,2],
        navigation : false,
        pagination : false,

        navigationText: ["", ""]
    });
});
$(document).ready(function() {
    $(".recently").owlCarousel({
        items : 4,
        itemsDesktop:[1199,3],
        itemsDesktopSmall:[980,2],
        itemsMobile : [600,1],
        navigation:true,
        navigationText:["",""],
        pagination:true,
        autoPlay:false
    });
});


jQuery(".blog-slider").owlCarousel({
    items : 2,
    itemsDesktopSmall :[979,2],
    itemsDesktop : [1199,2],
    navigation : false,
    slideSpeed : 300,
    pagination: false,
    navigationText: ["", ""]
});

jQuery(".best-seller").owlCarousel({
    items : 3,
    navigation : false,
    itemsDesktopSmall :[979,2],
    itemsDesktop : [1199,2],
    slideSpeed : 300,
    pagination: false,
    paginationSpeed : 400,
    navigationText: ["", ""]
});

jQuery(".sidebar-carousel").owlCarousel({
    items : 1,
    itemsTablet:[768,2],
    itemsDesktopSmall :[979,2],
    itemsDesktop : [1199,1],
    navigation : false,
    slideSpeed : 300,
    pagination: false,
    paginationSpeed : 400,
    navigationText: ["", ""]
});

jQuery("#brand-slider").owlCarousel({
    items : 4,
    navigation : false,
    slideSpeed : 300,
    pagination: false,
    paginationSpeed : 400,
    navigationText: ["", ""]
});    
jQuery("#advertisement").owlCarousel({
    items : 6,
    itemsDesktopSmall :[979,2],
    itemsDesktop : [1199,1],
    navigation : false,
    slideSpeed : 300,
    pagination: false,
    paginationSpeed : 400,
    navigationText: ["", ""]
});    
jQuery("#advertisement1").owlCarousel({
    items : 6,
    itemsDesktopSmall :[979,2],
    itemsDesktop : [1199,1],
    navigation : true,
    slideSpeed : 300,
    pagination: false,
    paginationSpeed : 400,
    navigation : true
}); 

jQuery('.product_page').each(function(){

    var owl = $(this);
    var  itemPerLine = owl.data('item');
    if(!itemPerLine){
        itemPerLine = 6;
    }
    owl.owlCarousel({
         
        items : itemPerLine,
        itemsTablet:[768,2],
        itemsDesktop : [1199,2],
        navigation : true,
        pagination : false,

        navigationText: ["", ""]
    });
});





});

/*===================================================================================*/
/*  LAZY LOAD IMAGES USING ECHO
/*===================================================================================*/
jQuery(function(){
    echo.init({
        offset: 100,
        throttle: 250,
        unload: false
    });
});

/*===================================================================================*/
/*  RATING
/*===================================================================================*/

jQuery(function(){
    jQuery('.rating').rateit({max: 5, step: 1, value : 4, resetable : false , readonly : true});
});

/*===================================================================================*/
/* PRICE SLIDER
/*===================================================================================*/
jQuery(function () {

// Price Slider
if (jQuery('.price-slider').length > 0) {
    jQuery('.price-slider').slider({
        min: 100,
        max: 700,
        step: 10,
        value: [200, 500],
        handle: "square"

    });

}

});


/*===================================================================================*/
/* SINGLE PRODUCT GALLERY
/*===================================================================================*/
jQuery(function(){
    jQuery('#owl-single-product').owlCarousel({
        items:1,
        itemsTablet:[768,2],
        itemsDesktop : [1199,1]

    });

    jQuery('#owl-single-product-thumbnails').owlCarousel({
        items: 4,
        pagination: true,
        rewindNav: true,
        itemsTablet : [768, 4],
        itemsDesktop : [1199,3]
    });

    jQuery('#owl-single-product2-thumbnails').owlCarousel({
        items: 6,
        pagination: true,
        rewindNav: false,
        itemsTablet : [768, 4],
        itemsDesktop : [1199,3]
    });

    jQuery('.single-product-slider').owlCarousel({
        stopOnHover: true,
        rewindNav: true,
        singleItem: true,
        pagination: true
    });

  
});





/*===================================================================================*/
/*  WOW 
/*===================================================================================*/

jQuery(function () {
    new WOW().init();
});


/*===================================================================================*/
/*  TOOLTIP 
/*===================================================================================*/
jQuery("[data-toggle='tooltip']").tooltip(); 




})

var topbarHeight = $('.topbar').height();
var sidebar = $('#sidebar').offset().top;
var sidebarHeight = $('#sidebar').height();
var bottomOffset = $('.bottom').offset().top;

var firstFixed = topbarHeight + sidebar - 200;
var secondFixed = bottomOffset - (topbarHeight + sidebarHeight) - 29;

// 1. css in js
$(window).scroll(function() {
  if ($(window).scrollTop() > firstFixed) {
    $('#sidebar').css({
      'position':'fixed',
      'top':'85px',
      'width': '100%',
      'padding':'2px', // 沒有 padding 值，整列高度會撐不滿。
      'background-color': 'red',
      'transition': 'background-color 0.5s ease',
    });
  } else {
    $('#sidebar').css({
      'position':'relative',
      'top':'0',
      'background-color': '#333',
      'transition': 'background-color 0.5s ease',
    });
  }
  if ($(window).scrollTop() > secondFixed) {
    $('#sidebar').css({
      'position':'absolute',
      'top':'313px',
      'background-color': 'green',
      'width': '100%',
      'z-index': '998',
      'transition': 'background-color 0.5s ease',
    });
  }
});


// 過場秒數可由 js 執行，也可由 css 執行，css 優先。

// 2-1. add/remove class ( transition in js )
// $(window).scroll(function() {
//   if ($(window).scrollTop() > firstFixed ) {
//     $('#sidebar').addClass("fixed",500);
//   } else {
//     $('#sidebar').removeClass("fixed",500);
//   }
//   if ($(window).scrollTop() > secondFixed) {
//     $('#sidebar').removeClass('fixed');
//     $('#sidebar').addClass("absolute",500);
//   } else {
//     $('#sidebar').removeClass("absolute",500);
//   }
// });