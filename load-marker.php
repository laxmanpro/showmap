<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Marker animations with <code>setTimeout()</code></title>
    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 100%;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
      #floating-panel {
        position: absolute;
        top: 10px;
        left: 25%;
        z-index: 5;
        background-color: #fff;
        padding: 5px;
        border: 1px solid #999;
        text-align: center;
        font-family: 'Roboto','sans-serif';
        line-height: 30px;
        padding-left: 10px;
      }
      #floating-panel {
        margin-left: -52px;
      }
    </style>
	<script type="text/javascript" src="mapdata.js"></script>
  </head>
  <body onload="drop()">
    <div id="floating-panel">
      <button id="drop" onclick="drop()">Drop Markers</button>
    </div>
    <div id="map"></div>
    <script>
	
	var obj = simplemaps_worldmap_mapdata["regions"];

	for (var region in obj) {
			for (var i=0; i<obj[region].states.length;i++) {

				//array_state.push(obj[region].states[i]);
		}
		//array_region.push(obj[region].name,array_state);
	}

      // If you're adding a number of markers, you may want to drop them on the map
      // consecutively rather than all at once. This example shows how to use
      // window.setTimeout() to space your markers' animation.

      var neighborhoods = [
        {lat: 52.511, lng: 13.447},
        {lat: 58.549, lng: 12.422},
        {lat: 53.497, lng: 14.396},
        {lat: 54.517, lng: 15.394}
      ];

      var markers = [];
      var map;

      function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
          zoom: 7,
          center: {lat: 52.520, lng: 13.410}
        });
      }

      function drop() {
        clearMarkers();
        for (var i = 0; i < neighborhoods.length; i++) {
          addMarkerWithTimeout(neighborhoods[i], i * 200);
        }
      }

      function addMarkerWithTimeout(position, timeout) {
        window.setTimeout(function() {
          markers.push(new google.maps.Marker({
            position: position,
            map: map,
            animation: google.maps.Animation.DROP
          }));
        }, timeout);
      }

      function clearMarkers() {
        for (var i = 0; i < markers.length; i++) {
          markers[i].setMap(null);
        }
        markers = [];
      }
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDgS2pbNfDwDRy1nM3VNIiMBGmcLa-H0EY&callback=initMap">
    </script>
  </body>
</html>