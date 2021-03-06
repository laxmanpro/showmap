<html>
  <head>
   <script src="https://maps.googleapis.com/maps/api/js?libraries=visualization""></script> 
  </head>
  <body>
    <div id="map"></div>
    <script>

      google.charts.load('current', 
	  'packages':['geochart'] ,
        // Note: you will need to get a mapsApiKey for your project.
        // See: https://developers.google.com/chart/interactive/docs/basic_load_libs#load-settings
        'mapsApiKey': 'AIzaSyD-9tSrke72PouQMnMX-a7eZSW0jkFMBWY'
      );
      google.charts.setOnLoadCallback(drawRegionsMap);

      function drawRegionsMap() {
        var data = google.visualization.arrayToDataTable([
          ['Country', 'Popularity'],
          ['Germany', 700],
          ['United States', 300],
          ['Brazil', 400],
          ['Canada', 500],
          ['France', 600],
          ['RU', 700],
		  ['IN', 700]
        ]);

        var options = {};

        var chart = new google.visualization.GeoChart(document.getElementById('map'));
		console.log(chart);
        chart.draw(data, options);
      }
	  
	  </script>
	  
  </body>
</html>