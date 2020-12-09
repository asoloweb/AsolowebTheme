// A $( document ).ready() block.
$( document ).ready(function() {

	window.addEventListener('load', function () {
		$('.FullLoader').fadeOut();
	})
	
	// Header on scroll
	
	$(window).scroll(function() {    
	    var scroll = $(window).scrollTop();
	
	    if (scroll >= 200) {
	        $(".Header").addClass("ShadowHeader");
	    } else {
	        $(".Header").removeClass("ShadowHeader");
	    }
	});
	
    //Aos working with class
    $('.aos-scroll').each(function () {
        $(this).attr('data-aos', 'fade-up');
        $(this).attr('data-aos-easing', 'ease-out-cubic');
        $(this).attr('data-aos-duration', '8000');
        }
    );

    $('.aos-scroll-flip').each(function () {
        $(this).attr('data-aos', 'flip-up');
    }
    );
    
    $('.aos-scroll-zoom').each(function () {
        $(this).attr('data-aos', 'zoom-in-down');
    }
    );    
    

    //Aos SCROLL
	AOS.init();


	// Mobile button
	$(".hamburger").click(function () {
		$(this).toggleClass('is-active');
		$('.MobileMenuContainer').toggle();
	});

    //Slider Home
    $('#Slider').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        infinite: false,
        autoplay: true,
        arrows: false,
        dots: true,
        prevArrow: '<button class="slide-arrow prev-arrow"><</button>',
        nextArrow: '<button class="slide-arrow next-arrow">></button>',
        autoplaySpeed: 4500
    });

	 $('#SliderCategoria').slick({
		slidesToShow: 3,
		slidesToScroll: 1,
		infinite: false,
		autoplay: true,
		arrows: true,
		dots: false,
		prevArrow: '<button class="slide-arrow prev-arrow"><</button>',
		nextArrow: '<button class="slide-arrow next-arrow">></button>',
		autoplaySpeed: 3000
		});

	 $('#SliderProdotti').slick({
		slidesToShow: 3,
		slidesToScroll: 1,
		infinite: false,
		autoplay: true,
		arrows: false,
		dots: true,
		prevArrow: '<button class="slide-arrow prev-arrow"><</button>',
		nextArrow: '<button class="slide-arrow next-arrow">></button>',
		autoplaySpeed: 3000
		});
		
	 $('#SliderNews').slick({
		slidesToShow: 1,
		slidesToScroll: 1,
		infinite: false,
		autoplay: true,
		arrows: false,
		dots: true,
		prevArrow: '<button class="slide-arrow prev-arrow"><</button>',
		nextArrow: '<button class="slide-arrow next-arrow">></button>',
		autoplaySpeed: 5000
		});
		
	$('#SliderEventi').slick({
		slidesToShow: 3,
		slidesToScroll: 1,
		infinite: false,
		autoplay: true,
		arrows: true,
		dots: false,
		prevArrow: '<button class="slide-arrow prev-arrow"><</button>',
		nextArrow: '<button class="slide-arrow next-arrow">></button>',
		autoplaySpeed: 3000
	});

});
