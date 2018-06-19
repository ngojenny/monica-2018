$(function(){
	$('#go-back').on('click touchstart', function(e){
		e.preventDefault();
		window.history.back();
	});

	$(document).on('click touchstart','.fa-bars',function(){
		$('.menu').toggleClass('responsive-nav');
	});

	// $(document).on('click','.fa-times',function(){
	// 	console.log('clicked');
	// 	$('.menu').removeClass('responsive-nav');
	// });
	function closeMenu() {
		$('.menu').removeClass('responsive-nav');
	}

	$('.side-scroll-buttons a[href^="#"]').on('click touchstart', function(event) {
    var target = $(this.getAttribute('href'));
    if( target.length ) {
        event.preventDefault();
        $('html, body').stop().animate({
            scrollTop: target.offset().top
        }, 700);
    }
	});

	if($('.side-scroll-buttons').length) {
		var headerHeight = $('header').height();
		var aboutPosition = $('#about').position().top;
		var experiencePosition = $('#experience').position().top;
		var researchPosition = $('#research').position().top;
		var publicationsPosition = $('#publications').position().top;
		var openSciencePosition = $('#open-science').position().top;
		var contactPosition = $('#contact').position().top;
		$(document).scroll(function() {
			var y = $(this).scrollTop();
			if (y > headerHeight) {
				$('.side-scroll-buttons').fadeIn();
			} else {
				$('.side-scroll-buttons').fadeOut();
			}
	
			if(y >= aboutPosition - 5 && y < experiencePosition) {
				$('.side-scroll-buttons a').removeClass('active');
				$('.side-scroll-buttons a:nth-of-type(2)').addClass('active');
			}
			if(y >= experiencePosition - 5 && y < researchPosition) {
				$('.side-scroll-buttons a').removeClass('active');
				$('.side-scroll-buttons a:nth-of-type(3)').addClass('active');
			}
	
			if(y >= researchPosition - 5 && y < publicationsPosition) {
				$('.side-scroll-buttons a').removeClass('active');
				$('.side-scroll-buttons a:nth-of-type(4)').addClass('active');
			}
	
			if(y >= publicationsPosition - 5 && y < openSciencePosition) {
				$('.side-scroll-buttons a').removeClass('active');
				$('.side-scroll-buttons a:nth-of-type(5)').addClass('active');
			}
	
			if(y >= openSciencePosition - 5 && y < contactPosition) {
				$('.side-scroll-buttons a').removeClass('active');
				$('.side-scroll-buttons a:nth-of-type(6)').addClass('active');
			}
	
			if(y >= contactPosition - 150) {
				$('.side-scroll-buttons a').removeClass('active');
				$('.side-scroll-buttons a:nth-of-type(7)').addClass('active');
			}
		});
	}
});