<script type="text/javascript">
	$(document).ready(function () {
		var marker;
		var map;
		var geocoder;
		var map_loading = $('#map_loading').show();
		var x=12.5;
		var y=104.9806145;
		var z=7;
		var is_has_old_map = 0;

		if(is_has_old_map==1) {
			z=15;
		}

		function loadMap() {
			if(x && y) {
        // Define the latitude and longitude positions
        latitude = parseFloat(x);
        longitude = parseFloat(y);
        latlngPos = new google.maps.LatLng(latitude, longitude);
        // Set up options for the Google map
        var myOptions = {
        	zoom: z,
        	center: latlngPos,
        	mapTypeId: google.maps.MapTypeId.ROADMAP,
        	fullscreenControl: false,
        	streetViewControl: false
        };
        // Define the map
        map = new google.maps.Map(document.getElementById("map"), myOptions);
        // geocoder = new google.maps.Geocoder;
        // for move map
        google.maps.event.addListener(map,'mouseout',function() {
        	window.setTimeout(function() {
        	},100);
        });
        // set maker by click
        google.maps.event.addListener(map, 'dragend', function(e) {
        	$('#map_lat').val(map.getCenter().lat());
        	$('#map_lng').val(map.getCenter().lng());
          });
            // for move map
        google.maps.event.addDomListener(window, "resize", function() {
            // 3 seconds after the center of the map has changed, pan back to the marker
            window.setTimeout(function() {
            },100);
        });
          map_loading.hide();
          is_has_old_map = 1;
      }

      $('<div/>').addClass('centerMarker').appendTo(map.getDiv())
         .click(function(){
         	var that=$(this);
         	if(!that.data('win')){
         		that.data('win',new google.maps.InfoWindow({content:'this is the center'}));
         		that.data('win').bindTo('position',map,'center');
         	}
         	that.data('win').open(map);
         });
     	}

	 		loadMap();

      if(is_has_old_map==1) {
      	google.maps.event.addDomListener(window, 'load', loadMap);
      }

      $('#find_location').click(function(e){
      	e.preventDefault();
      	map_loading.show();

      	var pos = {
      		lat: x,
      		lng: y
      	};
        // Try HTML5 geolocation.
        if (navigator.geolocation) {
        	navigator.geolocation.getCurrentPosition(function(position) {
        		pos = {
        			lat: position.coords.latitude,
        			lng: position.coords.longitude
        		};
        		map.setCenter(pos);
        		map.setZoom(12);
        		map_loading.hide();
        	}, function() {
        		map.setCenter(pos);
        		map.setZoom(12);
        		map_loading.hide();
        	});
        } else {
          // Browser doesn't support Geolocation
          map.setCenter(pos);
          map.setZoom(12);

          map_loading.hide();
      	}
      });
  });
</script>