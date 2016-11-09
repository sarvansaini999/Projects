jQuery(document).ready(function(){
	$('#nav').localScroll(800);
	
	//.parallax(xPosition, speedFactor, outerHeight) options:
	//xPosition - Horizontal position of the element
	//inertia - speed to move relative to vertical scroll. Example: 0.1 is one tenth the speed of scrolling, 2 is twice the speed of scrolling
	//outerHeight (true/false) - Whether or not jQuery should use it's outerHeight option to determine when a section is in the viewport
	$('.villas').parallax("50%", 0.1);
	$('.retreats').parallax("50%", 0.1);
	$('.bg').parallax("50%", 0.4);
	$('yachts').parallax("50%", 0.3);

})