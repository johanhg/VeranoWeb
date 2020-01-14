    var map;

function eliminarMapa(){
    map.remove();
}

function mostrarMapa(ruta){
  map = L.map('map').
  setView([ 10.02929,-84.29120 ], 
  14);
   
  L.tileLayer('https://{s}.tile.openstreetmap.fr/osmfr/{z}/{x}/{y}.png', {
    maxZoom: 20,
    attribution: '&copy; Openstreetmap France | &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
  }).addTo(map);

  var markerClusters = L.markerClusterGroup();
 
  var addressPoints = [
          [10.02929,-84.29120],
          [10.02650,-84.27810],
          [10.02814,-84.26880],
          [10.02582,-84.26241],
          [10.02556,-84.25200],
          [10.01249,-84.24202],
          [10.01164,-84.23636],
          [10.01561,-84.21692],
          [9.95267,-84.11379],
          [9.93548,-84.09573],
          [9.93416,-84.08436],
          [9.92977,-84.07678],
          [9.85659,-83.91295]
        ]


  for (var i = 0; i < addressPoints.length; i++) {
    var a = addressPoints[i];
    var marker = L.marker(new L.LatLng(a[0], a[1]));
    markerClusters.addLayer( marker );
  }
  map.addLayer( markerClusters );

  map.locate({setView: true, watch: true}).on('locationfound', function(e){
  
    var marker = L.marker([e.latitude, e.longitude]).bindPopup('Usted esta aqui');
    var circle = L.circle([e.latitude, e.longitude], e.accuracy/2, {
      weight: 1,
      color: 'blue',
      fillColor: '#cacaca',
      fillOpacity: 0.2
    });
    map.addLayer(marker);
    map.addLayer(circle);
  }).on('locationerror', function(e){
    console.log(e);
    alert("Location access denied.");
  }); 
}
        