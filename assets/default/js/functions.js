/* Preload */
$(window).load(function () { // makes sure the whole site is loaded
	$('#status').fadeOut(); // will first fade out the loading animation
	$('#preloader').delay(350).fadeOut('slow'); // will fade out the white DIV that covers the website.
	$('body').delay(350).css({
		'overflow': 'visible'
	});
	$(window).scroll();
})

/* Sticky nav */
$(window).scroll(function () {
	'use strict';
	if ($(this).scrollTop() > 1) {
		$('header').addClass("sticky");
	} else {
		$('header').removeClass("sticky");
	}
});

/* Menu */
$('a.open_close').on("click", function () {
	$('.main-menu').toggleClass('show');
	$('.layer').toggleClass('layer-is-visible');
});
$('a.show-submenu').on("click", function () {
	$(this).next().toggleClass("show_normal");
});
$('a.show-submenu-mega').on("click", function () {
	$(this).next().toggleClass("show_mega");
});
if ($(window).width() <= 480) {
	$('a.open_close').on("click", function () {
		$('.cmn-toggle-switch').removeClass('active')
	});
}

/* Collapse filters */
if ($(this).width() < 991) {
	$('.collapse#collapseFilters').removeClass('show');
} else {
	$('.collapse#collapseFilters').addClass('show');
}

/* Overaly mask form */
$('.expose').on("click", function (e) {
	"use strict";
	$(this).css('z-index', '4');
	$('#overlay').fadeIn(300);
});
$('#overlay').click(function (e) {
	"use strict";
	$('#overlay').fadeOut(300, function () {
		$('.expose').css('z-index', '3');
	});
});

/* Tooltip */
$('.tooltip-1').tooltip({
	html: true
});

/* Accordion */
	function toggleChevron(e) {
		$(e.target)
			.prev('.card-header')
			.find("i.indicator")
			.toggleClass('icon-minus icon-plus');
	}
	$('.accordion_styled').on('hidden.bs.collapse shown.bs.collapse', toggleChevron);
		function toggleIcon(e) {
        $(e.target)
            .prev('.card-header')
            .find(".indicator")
            .toggleClass('icon-minus icon-plus');
    }

/* Button show/hide map */
$(".btn_map").on("click", function () {
	var el = $(this);
	el.text() == el.data("text-swap") ? el.text(el.data("text-original")) : el.text(el.data("text-swap"));
});

/* Animation on scroll */
new WOW().init();

/* Video modal dialog + Parallax + Scroll to top + Incrementer */
$(function () {
	'use strict';
	$('.parallax-window').parallax({zIndex:1}); /* Parallax modal*/
	
	$('.video').magnificPopup({
		type: 'iframe',
		closeMarkup: '<button title="%title%" type="button" class="mfp-close" style="font-size:21px">&#215;</button>'
	}); /* video modal*/
	
	/*  Image popups */
	$('.magnific-gallery').each(function () {
		$(this).magnificPopup({
			delegate: 'a',
			type: 'image',
            preloader: true,
			gallery: {
				enabled: true
			},
			removalDelay: 500, //delay removal by X to allow out-animation
			callbacks: {
				beforeOpen: function () {
					// just a hack that adds mfp-anim class to markup 
					this.st.image.markup = this.st.image.markup.replace('mfp-figure', 'mfp-figure mfp-with-anim');
					this.st.mainClass = this.st.el.attr('data-effect');
				}
			},
			closeOnContentClick: true,
			midClick: true // allow opening popup on middle mouse click. Always set it to true if you don't provide alternative source.
		});
	});
	
	/* Cart header drop down */
	$('.dropdown-menu').on("click", function (e) {
		e.stopPropagation();
	});
	$('ul#top_tools li .dropdown').hover(function () {
		$(this).find('.dropdown-menu').stop(true, true).delay(50).fadeIn(300);
	}, function () {
		$(this).find('.dropdown-menu').stop(true, true).delay(50).fadeOut(300);
	});

	/* Hamburger icon */
	var toggles = document.querySelectorAll(".cmn-toggle-switch");
	for (var i = toggles.length - 1; i >= 0; i--) {
		var toggle = toggles[i];
		toggleHandler(toggle);
	};
	function toggleHandler(toggle) {
		toggle.addEventListener("click", function (e) {
			e.preventDefault();
			(this.classList.contains("active") === true) ? this.classList.remove("active"): this.classList.add("active");
		});
	};

	/* Scroll to top*/
	var pxShow = 800; // height on which the button will show
	var scrollSpeed = 500; // how slow / fast you want the button to scroll to top.

	$(window).scroll(function(){
	 if($(window).scrollTop() >= pxShow){
		$("#toTop").addClass('visible');
	 } else {
		$("#toTop").removeClass('visible');
	 }
	});

	$('#toTop').on('click', function(){
	 $('html, body').animate({scrollTop:0}, scrollSpeed);
	 return false;
	});

	/* Input incrementer*/
	$(".numbers-row").append('<div class="inc button_inc">+</div><div class="dec button_inc">-</div>');
	$(".button_inc").on("click", function () {

		var $button = $(this);
		var oldValue = $button.parent().find("input").val();

		if ($button.text() == "+") {
			var newVal = parseFloat(oldValue) + 1;
		} else {
			// Don't allow decrementing below zero
			if (oldValue > 1) {
				var newVal = parseFloat(oldValue) - 1;
			} else {
				newVal = 0;
			}
		}
		$button.parent().find("input").val(newVal);
	});
});

/* Cat nav onclick active */
$('ul#cat_nav li a').on('click', function () {
	$('ul#cat_nav li a.active').removeClass('active');
	$(this).addClass('active');
});

/* Map filter onclick active */
$('#map_filter ul li a').on('click', function () {
	$('#map_filter ul li a.active').removeClass('active');
	$(this).addClass('active');
});

/* Input range slider */
$(function () {
	'use strict';
	$("#range").ionRangeSlider({
		hide_min_max: true,
		keyboard: true,
		min: 0,
		max: 150,
		from: 30,
		to: 100,
		type: 'double',
		step: 1,
		prefix: "$",
		grid: true
	});

});

/* Footer reveal */
if ($(window).width() >= 768) {
	$('footer.revealed').footerReveal({
	shadow: false,
	opacity:0.6,
	zIndex: 0
});
}

/* Search */
$(".search-overlay-menu-btn").on("click", function (a) {
$('body').addClass('has-fullscreen-modal')
$(".search-overlay-menu").addClass("open"), $('.search-overlay-menu > form > input[type="search"]').focus()}), 
$(".search-overlay-close").on("click", function (a) {
$(".search-overlay-menu").removeClass("open")
$('body').removeClass('has-fullscreen-modal')
}),
$(".search-overlay-menu, .search-overlay-menu .search-overlay-close").on("click keyup", function (a) {
	(a.target == this || "search-overlay-close" == a.target.className || 27 == a.keyCode) && $(this).removeClass("open")
});

/* Date and time picker v2 */
$('.booking_date').dateDropper();
$('.booking_time').timeDropper({
	setCurrentTime: false,
	meridians: true,
	primaryColor: "#e74e84",
	borderColor: "#e74e84",
	minutesInterval: '15'
});

/* Modal Sign In */
$('#access_link').magnificPopup({
	type: 'inline',
	fixedContentPos: true,
	fixedBgPos: true,
	overflowY: 'auto',
	closeBtnInside: true,
	preloader: false,
	midClick: true,
	removalDelay: 300,
	mainClass: 'my-mfp-zoom-in'
});

/* Show Password */
$('#password').hidePassword('focus', {
	toggle: {
		className: 'my-toggle'
	}
});

/* Forgot Password */
$("#forgot").click(function () {
	$("#forgot_pw").fadeToggle("fast");
});

/* Check box modal */
$('#remember-me').iCheck({
	checkboxClass: 'icheckbox_square-grey',
	radioClass: 'iradio_square-grey'
});
$(document).ready(function ($) {
	// $('#Img_carousel').sliderPro({
	// 	width: 960,
	// 	height: 500,
	// 	fade: true,
	// 	arrows: true,
	// 	buttons: false,
	// 	fullScreen: false,
	// 	smallSize: 500,
	// 	startSlide: 0,
	// 	mediumSize: 1000,
	// 	largeSize: 3000,
	// 	thumbnailArrows: true,
	// 	autoplay: false
	// });
});
$('input.date-pick').datepicker('setDate', 'today');
$('.carousel-thumbs-2').owlCarousel({
	loop:false,
	margin:5,
	responsiveClass:true,
	nav:false,
	responsive:{
		0:{
			items:1
		},
		600:{
			items:3
		},
		1000:{
			items:4,
			nav:false
		}
	}
});
function getWords(str,numwords) {
    return str.split(/\s+/).slice(0,numwords).join(" ");
}
var base_url = window.location.origin+ '/' +window.location.pathname.split('/')[1]; 