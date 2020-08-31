$(document).ready(function(){
    /**** 
    $(".start-slide").click(function(){
    	$("#myCarousel").carousel('cycle');
    });
	$(".pause-slide").click(function(){
    	$("#myCarousel").carousel('pause');
    });
	$(".prev-slide").click(function(){
    	$("#myCarousel").carousel('prev');
    });
	$(".next-slide").click(function(){
    	$("#myCarousel").carousel('next');
    });
    */

   $("#cases-slider-carousel").carousel({interval: 0});

	$(".slide1").click(function(){
        $("#cases-slider-carousel").carousel(0);
        $(this).addClass("active-button");
    });
    $(".slide2").click(function(){
        $("#cases-slider-carousel").carousel(1);
        $(this).addClass("active-button");
    });
    $(".slide3").click(function(){
        $("#cases-slider-carousel").carousel(2);
        $(this).addClass("active-button");
    });
    $(".slide4").click(function(){
        $("#cases-slider-carousel").carousel(3);
        $(this).addClass("active-button");
    });

    function doLoop() {
        var interval = setInterval(function () {
            $('.btn-outline-custom').each(function () {
                var $set = $(this);
                var $cur = $set.find('.active-button').removeClass('active-button');
                var $next = $cur.next().length ? $cur.next() : $set.children().eq(0);
                $next.addClass('active-button');
            });
        }, 1000);
    
        $('.btn-outline-custom').on('click', function () {
            var $this = $(this);
            $('.btn-outline-custom.active-button').removeClass('active-button');
            $this.addClass("active-button");
            clearInterval(interval);
        });
    }
    doLoop()

});