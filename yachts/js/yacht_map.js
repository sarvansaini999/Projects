function yachtMapFunction() {
var address = document.getElementById('address').value;
var longitude = document.getElementById('longitude_name').value;
var latitude = document.getElementById('latitude_name').value;

var geocoder;
var map;
  geocoder = new google.maps.Geocoder();
  
 var latlng = new google.maps.LatLng(latitude, longitude);
  var myOptions = {
			zoom: 10,
			center: latlng,
			mapTypeControl: true,
			scrollwheel: false,
			mapTypeControlOptions: {
			  style: google.maps.MapTypeControlStyle.DROPDOWN_MENU
			},
			navigationControl: true,
			mapTypeId: google.maps.MapTypeId.ROADMAP
		};
		map = new google.maps.Map(document.getElementById("yachtMap"), myOptions);
		
		

    
		
		var marker = new google.maps.Marker({
			position: latlng,
			map: map,
			icon:  'http://www.hinolincolnshire.co.uk/wp-content/uploads/2015/07/marker.png',
			title: address
		});
  
		var infowindow = new google.maps.InfoWindow({
            content: '<b>' + address + '</b>',
            size: new google.maps.Size(150, 50)
          });
			google.maps.event.addListener( marker, 'mouseover', ( function( marker ) {
	 
				return function() {
					infowindow.open( map, marker );
				}
	 
			})( marker ));

		
		
  
	}
google.maps.event.addDomListener(window, 'load', yachtMapFunction);