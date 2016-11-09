var $j = jQuery.noConflict();
var $window = jQuery(window);
$j(document).ready(function() {
	"use strict";
	
	var $jcontainer = "",
        $jselect = "",
		$jselect2 = "",
		$jselect3 = "",
		$jcontainer = $j('.projects_holder'),
        $jselect = $j('.location-box select');
		$jselect2 = $j('.price-box select');
		$jselect3 = $j('.selectStyle select');
    

    $jselect.change(function() {
            var filters = $j(this).val();
			
			
            $j('.projects_holder article').removeClass('active-villa animated zoomIn').addClass('inactive');
            $j( filters).addClass('active-villa animated zoomIn').removeClass('inactive').setAttribute("style","position: absolute !impotant; left:0px !important;");
			
			ele = document.getElementsByClassName("active-villa");
			for(i=0;i<ele.length;i++)
			{
				ele[i].setAttribute("style","position: absolute !impotant; left:0px !important;");
			}
            $jcontainer.isotope({
                filter: filters
            });
    });
	
	
	$jselect2.change(function() {
            var filters = $j(this).val();
			
            $j('.projects_holder article').removeClass('active-bedroom').addClass('inactive-bedroom');
            $j( filters).addClass('active-bedroom animated zoomIn').removeClass('inactive-bedroom').setAttribute("style","position: absolute !impotant; left:0px !important;");
			;
			ele = document.getElementsByClassName("active-bedroom");
			for(i=0;i<ele.length;i++)
			{
				ele[i].setAttribute("style","position: absolute !impotant; left:0px !important;");
			}

            $jcontainer.isotope({
                filter: filters
            });
    });
	
	
	$jselect3.change(function() {
            var filters = $j(this).val();
			
			
            $j('.projects_holder article').removeClass('active-style animated zoomIn').addClass('inactive-style');
            $j( filters).addClass('active-style animated zoomIn').removeClass('inactive-style').setAttribute("style","position: absolute !impotant; left:0px !important;");
			;
			ele = document.getElementsByClassName("active-style");
			for(i=0;i<ele.length;i++)
			{
				ele[i].setAttribute("style","position: absolute !impotant; left:0px !important;");
			}
            $jcontainer.isotope({
                filter: filters
            });
    });
	
	$j('.dropdown-menu li').click(function(){
		$j('.projects_holder article').removeClass('animated zoomIn');
	});
	
	// Cache the Window object
	
	$window = $j(window);
                
   $j('section[data-type="background"]').each(function(){
		var $jbgobj = $j(this); // assigning the object
						
		$j(window).scroll(function() {
						
			// Scroll the background at var speed
			// the yPos is a negative value because we're scrolling it UP!								
			var yPos = -($window.scrollTop() / $jbgobj.data('speed')); 
			
			// Put together our final background position
			var coords = '50% '+ yPos + 'px';

			// Move the background
			$jbgobj.css({ backgroundPosition: coords });
			
		}); // window scroll Ends

	 });	
	
	$j("#reviews").click(function() {
		$j('html, body').animate({
			scrollTop: $j("#review-section").offset().top
		}, 200);
	});
	
	if ($j('h3.caption').is(':empty')) { 
		$j('h3.caption:empty').remove();
	}
	
	$j('.q_image_with_text_over img').removeAttr('alt');
	
	/*$j('table.tblrates').each(function(){
		
		$j( "table.tblrates tr:last" ).css({ backgroundColor: "#F6F6F6"});
	});*/
	
	for(var i=0;i<arrayFromPhp.length;i++){
		var arr = arrayFromPhp;
		
	}
	
});

document.createElement("article");
document.createElement("section");