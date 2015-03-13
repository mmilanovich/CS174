(function ($) {

	new WOW().init();

	jQuery(window).load(function() { 
		jQuery("#preloader").delay(100).fadeOut("slow");
		jQuery("#load").delay(100).fadeOut("slow");
	});


	//jQuery to collapse the navbar on scroll
	$(window).scroll(function() {
		if ($(".navbar").offset().top > 50) {
			$(".navbar-fixed-top").addClass("top-nav-collapse");
		} else {
			$(".navbar-fixed-top").removeClass("top-nav-collapse");
		}
	});

            $(document).ready(function()
            {
                
            
                
                
            });

	//jQuery for page scrolling feature - requires jQuery Easing plugin
	$(function() {
		$('.navbar-nav li a').bind('click', function(event) {
			var $anchor = $(this);
			$('html, body').stop().animate({
				scrollTop: $($anchor.attr('href')).offset().top
			}, 1500, 'easeInOutExpo');
			event.preventDefault();
		});
		$('.page-scroll a').bind('click', function(event) {
			var $anchor = $(this);
			$('html, body').stop().animate({
				scrollTop: $($anchor.attr('href')).offset().top
			}, 1500, 'easeInOutExpo');
			event.preventDefault();
		});
	});

})(jQuery);


	// Set up!
	var a_canvas = document.getElementById("a");
	var context = a_canvas.getContext("2d");

	// Draw the face
	context.fillStyle = "yellow";
	context.beginPath();
	context.arc(95, 75, 60, 0, 2*Math.PI);
	context.closePath();
	context.fill();
	context.lineWidth = 2;
	context.stroke();
	context.fillStyle = "black";

	// Draw the left eye
	context.beginPath();
	context.arc(65, 55, 8, 0, 2*Math.PI);
	context.closePath();
	context.fill();

	// Draw the right eye
	context.beginPath();
	context.arc(125, 55, 8, 0, 2*Math.PI);
	context.closePath();
	context.fill();

	// Draw the mouth
	context.beginPath();
	context.arc(96, 90, 35, Math.PI, 2*Math.PI, true);
	context.closePath();
	context.fill();

	// Write "Hello, World!"
	context.font = "29px Garamond";
	context.fillText("Thank You",35,170);
	context.fillText("for Registering!",20,190);
