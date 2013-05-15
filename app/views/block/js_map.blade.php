    <!--Load the AJAX API-->
    
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
    
    <script type="text/javascript">
    
      // Load the Visualization API and the piechart package.
      google.load('visualization', '1.0', {'packages':['corechart']});
      //google.load('jquery', '2.0.0');
      /*
      google.load("maps", "3", {other_params:'sensor=false', callback: function(){
        var map; // initialize your map in here
      }});
      */
      
      // Set a callback to run when the Google Visualization API is loaded.
      google.setOnLoadCallback(drawChart);

      function drawChartLang(jsondata) {
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Language');
        data.addColumn('number', 'Count');
        var options = {'title':'Tweet per language',
                     'width':400,
                     'height':300,
                     is3D: true
        };
        $.each(jsondata, function(key, val) {
          data.addRow([val._id, val.count]);
        });
        var chart = new google.visualization.PieChart(document.getElementById('chart_div_lang'));
        chart.draw(data, options);
      }
      function drawChartUsers(jsondata) {
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'User');
        data.addColumn('number', 'Count');
        var options = {'title':'Tweet per User',
                     'width':400,
                     'height':300,
                     is3D: true
        };
        $.each(jsondata, function(key, val) {
          data.addRow([val._id, val.count]);
        });
        var chart = new google.visualization.PieChart(document.getElementById('chart_div_user'));
        chart.draw(data, options);
      }
      function drawChartHashtags(jsondata) {
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Hashtags');
        data.addColumn('number', 'Count');
        var options = {'title':'Tweet per Hashtag',
                     'width':400,
                     'height':300,
                     is3D: true
        };
        $.each(jsondata, function(key, val) {
          data.addRow([val._id, val.count]);
        });
        var chart = new google.visualization.PieChart(document.getElementById('chart_div_hashtag'));
        chart.draw(data, options);
      }

      // Callback that creates and populates a data table, 
      // instantiates the pie chart, passes in the data and
      // draws it.
      function drawChart() {
        // Create the data table.
        $.getJSON("{{ URL::route('api_tweet_count_lang') }}", function(jsondata) {
          drawChartLang(jsondata);
        });
        /*
        $.getJSON("{{ URL::route('api_tweet_count_users') }}", function(jsondata) {
          drawChartUsers(jsondata);
        });
        $.getJSON("{{ URL::route('api_tweet_count_hashtags') }}", function(jsondata) {
          drawChartHashtags(jsondata);
        });
    */

      }
      
      
      setInterval(function() {
        drawChart();
      }, 5000);
    </script>

<script src="https://maps.googleapis.com/maps/api/js?libraries=visualization&sensor=false"></script>
<!--
<script type="text/javascript" src="/assets/heatmap/heatmap.js"></script>
<script type="text/javascript" src="/assets/heatmap/heatmap-gmaps.js"></script>
-->

<script>
var map;
var heatmap;
var heatmapData;
function initialize() {
  var mapOptions = {
    zoom: 6,
    mapTypeId: "OSM",
    mapTypeControl: false,
    streetViewControl: false,
    center: new google.maps.LatLng(41.89292, 12.48252),
    //mapTypeId: google.maps.MapTypeId.ROADMAP,
    
  };
  
  
  
  
  heatmapData = [];
  pointArray = new google.maps.MVCArray(heatmapData);
  
  
  map = new google.maps.Map(document.getElementById('map-canvas'),mapOptions);
  
  map.mapTypes.set("OSM", new google.maps.ImageMapType({
                getTileUrl: function(coord, zoom) {

                    //return "http://tile.openstreetmap.org/" + zoom + "/" + coord.x + "/" + coord.y + ".png";
                    return "http://b.tile.stamen.com/toner-lite/" + zoom + "/" + coord.x + "/" + coord.y + ".png";
                },
                tileSize: new google.maps.Size(256, 256),
                name: "OpenStreetMap",
                maxZoom: 18
            }));
  
  heatmap = new google.maps.visualization.HeatmapLayer({
    data: pointArray,
    radius: 20
  });
  
  heatmap.setData(pointArray);
  heatmap.setMap(map);

  
  loadGeoHeatmap();

}

google.maps.event.addDomListener(window, 'load', initialize);


function drawHeatmap(jsondata) {
  //console.log(jsondata);
  
    
  heatmapData=[];
  pointArray.clear();
  $.each(jsondata, function(key, val) {
    if (val.coordinates !== null) {
      //console.log(val.coordinates);
      pointArray.push(new google.maps.LatLng(val.coordinates.coordinates[1], val.coordinates.coordinates[0]))
    }
  });
  
  console.log(pointArray);
  if (heatmap) {
    //resetGeoHeatmap(heatmap);
  }
  
}

function loadGeoHeatmap() {
    
  $.getJSON("{{ URL::route('api_tweet_geo') }}", function(jsondata) {
    drawHeatmap(jsondata);
  });
}

function resetGeoHeatmap() {
  pointArray.clear();
  
}

setInterval(function() {
  loadGeoHeatmap();
      // Do something after 5 seconds
}, 3000);
</script>