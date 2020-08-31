$(document).ready(function(){ 

    $('#owl-clients').owlCarousel({
        loop:false,
        nav:true,
        navText: ['<span class="span-roundcircle left-roundcircle"><i class="left-arrow"></span>','<span class="span-roundcircle right-roundcircle"><i class="right-arrow"></span>'],
        dots: false,
        stagePadding: 0,
        margin:10,
        autoplay:false,
        smartSpeed:2000,
        responsive:{
            0:{
                items:2,
                dots: true,
                nav:false,
                mouseDrag: true,
                center:true,
                loop:true,
            },
            600:{
                items:2
            },
            1200:{
                items:3
            }
       }
    });

    $('#owl-related-articles').owlCarousel({
        loop:false,
        nav:true,
        navText: ['<span class="span-roundcircle left-roundcircle"><i class="left-arrow"></span>','<span class="span-roundcircle right-roundcircle"><i class="right-arrow"></span>'],
        dots: false,
        stagePadding: 0,
        margin:0,
        autoplay:false,
        smartSpeed:1000,
        responsive:{
            0:{
                items:1.2,
                nav:false,
            },
            600:{
                items:2
            },
            1300:{
                items:3
            }
       }
    });

    $('#owl-company-slider').owlCarousel({
        loop:true,
        nav:true,
        navText: ['<span class="span-roundcircle left-roundcircle"><i class="left-arrow"></span>','<span class="span-roundcircle right-roundcircle"><i class="right-arrow"></span>'],
        dots: false,
        stagePadding: 0,
        margin:10,
        rewind: true,
        autoplay: true,
        autoplayTimeout: 4000,
        autoplayHoverPause: true,
        checkVisible: false,
        animateOut: 'fadeOut',
        animateIn: 'fadeIn',
        responsive:{
            0:{
                items:1,
                dots: true,
                nav:false,
                mouseDrag: true,
            },
            600:{
                items:1,
                dots: true,
                nav:false,
                mouseDrag: true,
            },
            1200:{
                items:1,
                mouseDrag: false,
            }
       }
    });

    $('#owl-company-mobile-slider').owlCarousel({
        loop:true,
        nav:true,
        navText: ['<span class="span-roundcircle left-roundcircle"><i class="left-arrow"></span>','<span class="span-roundcircle right-roundcircle"><i class="right-arrow"></span>'],
        dots: false,
        stagePadding: 0,
        margin:10,
        rewind: true,
        autoplay: true,
        autoplayTimeout: 4000,
        autoplayHoverPause: true,
        checkVisible: false,
        animateOut: 'fadeOut',
        animateIn: 'fadeIn',
        responsive:{
            0:{
                items:2,
                dots: true,
                nav:false,
                mouseDrag: true,
                center:true,
                loop:true,
            },
            600:{
                items:1,
                dots: true,
                nav:false,
                mouseDrag: true,
            },
            1200:{
                items:1,
                mouseDrag: false,
            }
       }
    });

    

});

