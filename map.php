<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Transportation Hub</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.1/dist/leaflet.css" />
    <link rel="stylesheet" href="leaflet-routing-machine.css">
    <link rel="stylesheet" href="index.css">
          <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="menu.css">
</head>
<body>
    <div id="map" class="map"></div>
    <script src="https://unpkg.com/leaflet@1.3.1/dist/leaflet.js"></script>
    <script src="leaflet-routing-machine.js"></script>
    <script src="Control.Geocoder.js"></script>
    <script src="menus.js"></script>
    <script>
    var map = L.map('map');

    L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
      maxZoom: 18,
      attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, ' +
        'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
      id: 'mapbox/streets-v11',
      tileSize: 512,
      zoomOffset: -1
    }).addTo(map);


var control = L.Routing.control({
	waypoints: [
		L.latLng(33.7490, -84.3380),
		L.latLng(33.7756, -84.3963)
	],
	geocoder: L.Control.Geocoder.nominatim(),
	routeWhileDragging: true,
	reverseWaypoints: true,
	showAlternatives: true,
	altLineOptions: {
		styles: [
			{color: 'black', opacity: 0.15, weight: 9},
			{color: 'white', opacity: 0.8, weight: 6},
			{color: 'blue', opacity: 0.5, weight: 2}
		]
	},
	router: L.Routing.mapbox('pk.eyJ1IjoiYWNoYXVkaHVyeTkiLCJhIjoiY2tsODZ5aGd5MWVzNjJ3cXgwank1N3E3NyJ9.91fSvmOP_DKnu7yRNcBRlQ')
}).addTo(map);
L.Routing.errorControl(control).addTo(map);
var left  = '<h1>Welcome to Earth Points!</h1>';
var contents = '<hr>';
contents += "<img src = 'Test.jpeg' alt = 'EIEIO' style = 'width: 150px; height: 150px'>"
contents += '<h2>Reimagining Transportation</h2>';
contents += '<p>Where would you like to go?<br>';
contents += '<a class = "button" href="map.php">Main map</a><br>';
contents += '<a class = "button" href="#">View global leaderboard</a><br>';
contents += '<a class = "button" href="#">Become a community driver!</a><br>';
contents += '<a class = "button" href = "bicycle.php">View the bicycle map</a><br>';
contents += '<a class = "button" href = "transportation.php">View the public transporation map</a></p>';
contents += "<h3>Environmental ratings</h3>";
contents += "<h3>Uber:</h3><img src = 'Test.jpeg' alt = 'EIEIO' style = 'width: 50px; height: 50px'><img src = 'Test.jpeg' alt = 'EIEIO' style = 'width: 50px; height: 50px'><img src = 'Test.jpeg' alt = 'EIEIO' style = 'width: 50px; height: 50px'>";
contents += "<h3>Cycling/Scooters:</h3><img src = 'Test.jpeg' alt = 'EIEIO' style = 'width: 50px; height: 50px'><img src = 'Test.jpeg' alt = 'EIEIO' style = 'width: 50px; height: 50px'><img src = 'Test.jpeg' alt = 'EIEIO' style = 'width: 50px; height: 50px'><img src = 'Test.jpeg' alt = 'EIEIO' style = 'width: 50px; height: 50px'><img src = 'Test.jpeg' alt = 'EIEIO' style = 'width: 50px; height: 50px'><img src = 'Test.jpeg' alt = 'EIEIO' style = 'width: 50px; height: 50px'>";
contents += "<h3>Public Transporation:</h3><img src = 'Test.jpeg' alt = 'EIEIO' style = 'width: 50px; height: 50px'><img src = 'Test.jpeg' alt = 'EIEIO' style = 'width: 50px; height: 50px'><img src = 'Test.jpeg' alt = 'EIEIO' style = 'width: 50px; height: 50px'><img src = 'Test.jpeg' alt = 'EIEIO' style = 'width: 50px; height: 50px'><img src = 'Test.jpeg' alt = 'EIEIO' style = 'width: 50px; height: 50px'>";
contents += "<h3>Car-Pooling:</h3><img src = 'Test.jpeg' alt = 'EIEIO' style = 'width: 50px; height: 50px'><img src = 'Test.jpeg' alt = 'EIEIO' style = 'width: 50px; height: 50px'><img src = 'Test.jpeg' alt = 'EIEIO' style = 'width: 50px; height: 50px'><img src = 'Test.jpeg' alt = 'EIEIO' style = 'width: 50px; height: 50px'>";
contents += '<h3><a href = "https://m.uber.com/?client_id=<CLIENT_ID>">Use Uber</a></h3>';
contents += '<h3><a href = "https://scootermap.com/map">Find scooters near you</h3>'
contents += '<h3><a href = "https://www.itsmarta.com/">Get more info on Marta</a></h3>'
contents += '<h4>Instructions</h4>';
contents += '<p>Use the routing service to determine which transporation service you want, and then use the above to select it!';
contents += '<h6>Environmental ratings and prices based on widely available data.</h6>';
contents += '<h6>This app is in no way meant to discourage users from using a certain form of transporation.</h6>';
contents += '<h6>Users should heed caution before dramitcally changing how they travel based on their finances and other circumstances.</h6>';
// left
L.control.slideMenu(left + contents).addTo(map);
</script>
</body>
</html>
