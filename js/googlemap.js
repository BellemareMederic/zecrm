/*on vien charger lapi de google maps en meme temps que la page web*/
jQuery(function($) {
  // Asynchronously Load the map API
  var script = document.createElement('script');
  script.src = "//maps.googleapis.com/maps/api/js?key=AIzaSyC0A1ICb0xrXwYLi255DP91YxhEyE3QNyE&callback=initialize";
  document.body.appendChild(script);
});

function initialize() {
  /*chargement de la map avec zoom 11 a la position lat lng*/
  var locations = getMarker();
  var map = new google.maps.Map(document.getElementById('map'), {
    zoom: 2,
    center: {lat: locations[0][1], lng: locations[0][2]}
  });
  var i;

  /*Creation dune loop pour lajoue de chaque marqueur et leur infobox*/
  for (i = 0; i < locations.length; i++) {
    var marker = new google.maps.Marker({
      position: {lat: locations[i][1], lng: locations[i][2]},
      title: locations[i][0],
      map: map
    });
    (function(marker, i) {
      // add click event
      google.maps.event.addListener(marker, 'click', function() {
        infowindow = new google.maps.InfoWindow({
          content: locations[i][0]
        });
        setTimeout(function(){ infowindow.close(map, marker); }, 3000);
        infowindow.open(map, marker);
      });
    })(marker, i);
  }
}
