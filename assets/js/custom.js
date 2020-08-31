/* Set navigation */

function openNav() {
  $("#mySidenav").addClass("width80");
  $("#nav-res").addClass("opacityon");
  $(".cd-shadow-layer").addClass("displayblock");
  $(".wrapper").addClass("position-fixed");
  $("body").addClass("overflow-fixed");
  $(".main-middle-area").addClass("nav-open-main-middle-area");

  $(".main-middle-area").click(function(){
    $("#mySidenav").removeClass("width80");
    $("#nav-res").removeClass("opacityon");
    $(".cd-shadow-layer").removeClass("displayblock");
    $(".wrapper").removeClass("position-fixed", "animate");
    $("body").removeClass("overflow-fixed");
    $(".main-middle-area").removeClass("nav-open-main-middle-area");
  });
  
}

function closeNav() {
  $("#mySidenav").removeClass("width80");
  $("#nav-res").removeClass("opacityon");
  $(".cd-shadow-layer").removeClass("displayblock");
  $(".wrapper").removeClass("position-fixed", "animate");
  $("body").removeClass("overflow-fixed");
  $(".main-middle-area").removeClass("nav-open-main-middle-area");
} 






/** Contact popup open */

function openContact() {
  $(".right-side-modal").addClass("active");
  $(".backdrop-div").addClass("show");
  $("body").addClass("overflow-fixed-body");
}

function closeContact() {
  $(".right-side-modal").removeClass("active");
  $(".backdrop-div").removeClass("show");
  $("body").removeClass("overflow-fixed-body");
}

$(".contact-popup-open").click(function(){
  openContact(); 
});

$(".close-popup-right, .backdrop-overlay").click(function(){
  closeContact(); 
});



// $(".backdrop-div.show").click(function(){
//   closeContact(); 
// });



/** End of Contact popup open */

$(document).ready(function(){ 

  $(".cd-shadow-layer").click(function(){
    closeNav(); 
  });

  /*$(window).scroll(function() {
    if ($(this).scrollTop() >= 150) {        
        $('.return-to-top').addClass("display_show");    
    } else {
        $('.return-to-top').removeClass("display_show");   
    }
  });

  $('.return-to-top').click(function() {    
    $('body,html').animate({
        scrollTop : 0                       
    }, 0);
  });*/

  /* Goto top */
  $('#goTop').goTop();
  /* End of Goto top */

  'use strict';
  
  var c, currentScrollTop = 0,
   navbar = $('.header-div');
 
   
    $(window).scroll(function () {
    var a = $(window).scrollTop();
    var b = navbar.height();
    
    currentScrollTop = a;
    
    if (c < currentScrollTop && a > b + b) {
      navbar.addClass("scrollUp");
      navbar.removeClass("header-bgcolor");
    } else if (c > currentScrollTop && !(a <= b)) {
      navbar.removeClass("scrollUp");
      navbar.addClass("header-bgcolor");
    }
    c = currentScrollTop;

    if (a <= 150) navbar.removeClass('header-bgcolor');
    
  });

});

/* animation js init */
AOS.init({
  duration: 1500,
  once: true,
});

/* End of animation js */

