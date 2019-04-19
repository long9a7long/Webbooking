$('input.time-pick').timepicker({
			minuteStep: 15,
			showInpunts: false
		})

jQuery('#sidebar').theiaStickySidebar({
			additionalMarginTop: 80
		});

$('input').iCheck({
		   checkboxClass: 'icheckbox_square-grey',
		   radioClass: 'iradio_square-grey'
		 });

$(document).ready(function ($) {
	$('#Img_carousel').sliderPro({
				width: 960,
				height: 500,
				fade: true,
				arrows: true,
				buttons: false,
				fullScreen: false,
				smallSize: 500,
				startSlide: 0,
				mediumSize: 1000,
				largeSize: 3000,
				thumbnailArrows: true,
				autoplay: false
	});
});



