
var map;
var america_lat= -12.051405;
var america_lng= -77.006791;
var directionsService = new google.maps.DirectionsService();
var directionsDisplay = new google.maps.DirectionsRenderer({polylineOptions:{strokeColor:"#2E9AFE"}});
function start_map(){
	map = new google.maps.Map(document.getElementById('map'),{
		center: {lat: america_lat, lng: america_lng},
		zoom: 14
	})
}

function get_my_location(){
	if(navigator.geolocation){
		navigator.geolocation.getCurrentPosition(function(position){
			var pos = {
				lat: position.coords.latitude,
				lng: position.coords.longitude
			};
			var marker = new google.maps.Marker({
				map: map,
				draggable: false,
				animation: google.maps.Animation.DROP,
				position: pos
			});
		})
	}
}
function initMap() {
	directionsDisplay.setMap(map);

	var onChangeHandler = function() {
		calculateAndDisplayRoute(directionsService, directionsDisplay);
	};
	document.getElementById('origen').addEventListener('change', onChangeHandler);
	document.getElementById('destino').addEventListener('change', onChangeHandler);

	var origen = document.getElementById('origen');
	//	map.controls[google.maps.ControlPosition.TOP_LEFT].push(origen);

	var auto_origen = new google.maps.places.Autocomplete(origen);
	auto_origen.bindTo('bounds', map);

	var destino = document.getElementById('destino');
	//	map.controls[google.maps.ControlPosition.TOP_LEFT].push(destino);

	var auto_destino = new google.maps.places.Autocomplete(destino);
	auto_destino.bindTo('bounds', map);


	auto_origen.addListener('place_changed', function() {

		var place_in = auto_origen.getPlace();
		if (!place_in.geometry) {
			window.alert("Autocomplete's returned place contains no geometry");
			return;
		}
	});

	auto_destino.addListener('place_changed', function() {

		var place_dest = auto_destino.getPlace();
		if (!place_dest.geometry) {
			window.alert("Autocomplete's returned place contains no geometry");
			return;
		}
	});

}

function calculateAndDisplayRoute(directionsService, directionsDisplay) {
	directionsService.route({
		origin: document.getElementById('origen').value,
		destination: document.getElementById('destino').value,
		travelMode: 'DRIVING'
	}, function(response, status) {
		if (status === 'OK') {
			directionsDisplay.setDirections(response);
		}
	});
}
