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
            navText: ['<img src="../public/frontend/img/left-arrow.svg">','<img src="../public/frontend/img/right-arrow.svg">']
        });

        $('.owl-testimonials').owlCarousel({
            loop: true,
            margin: 0,
            nav: true,
            dots: true,
            items: 1,
            navText: ['<img src="../public/frontend/img/left-arrow.svg">','<img src="../public/frontend/img/right-arrow.svg">']
        });
	});
   // The rest of the code goes here!
}(window.jQuery, window, document));
