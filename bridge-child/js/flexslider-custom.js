jQuery(document).ready(function($){	
		
		$(".flexslider").flexslider({
			// options
			start:function(slider){
				$(".slide-current-slide").text(slider.currentSlide+1);
				
				$(".slide-total-slides").text(slider.count)
			},
			before:function(slider){
				$(".slide-current-slide").text(slider.animatingTo+1)
			}
		});
	});