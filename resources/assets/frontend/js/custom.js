(function($, window, document) {
    // The $ is now locally scoped
	// Listen for the jQuery ready event on the document
	$(function() {
		// The DOM is ready!
		$('#main-nav-button').click(function (event) {
			event.preventDefault();
			$(this).toggleClass('active');
			$('.main-nav-box').toggleClass('active');
		});

        $('.owl-clients').owlCarousel({
            loop: true,
            margin: 0,
            nav: true,
            dots: true,
            items: 1,
            navText: ['<img src="../frontend/img/left-arrow.svg">','<img src="../frontend/img/right-arrow.svg">']
        });

        $('.owl-countries').owlCarousel({
            loop: true,
            margin: 16,
            nav: true,
            dots: true,
            items: 3,
            navText: ['<img src="../frontend/img/left-arrow.svg">','<img src="../frontend/img/right-arrow.svg">']
        });

        $('.owl-banner').owlCarousel({
            loop: true,
            margin: 0,
            nav: true,
            dots: true,
            items: 1,
            navText: ['<img src="../../frontend/img/left-arrow.svg">','<img src="../../frontend/img/right-arrow.svg">']
        });

        $('.owl-testimonials').owlCarousel({
            loop: true,
            margin: 0,
            nav: true,
            dots: true,
            items: 1,
            navText: ['<img src="../frontend/img/left-arrow.svg">','<img src="../frontend/img/right-arrow.svg">']
        });

        $("#team-members").owlCarousel({
            items:3,
            autoplay:true,
            smartSpeed:300,
            loop:true,
            autoplayHoverPause:true,
                responsive:{
                0:{
            
                    items:1
                }, 
                480:{
            
                    items:2
                }, 
                                        
                768:{
            
                    items:3
                } 
                }
        });

        // $('.choose-plan .plan').click(function (event) {
        //     $('.choose-plan .plan').removeClass('selected');
        //     $(this).addClass('selected');
        // });
	});
   // The rest of the code goes here!
}(window.jQuery, window, document));
