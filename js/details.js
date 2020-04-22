var pos; var map;
$.ajax({
    type: "GET",
    url: "getUserAddress.php?id= " + id,
    async: true,
    dataType: "json",
    success: function(response) {
      console.log(response);
      pos = response;
      initMap();
    },
    error: function(xhr, status, err) {
        console.log("can't find address")
    }
});

function initMap() {
  map = new google.maps.Map(document.getElementById('mapid'), {
    center: {lat: pos.lat, lng: pos.lng},
    zoom: 14
  });
  var marker = new google.maps.Marker({
    position: {lat: pos.lat, lng: pos.lng},
    map: map
  });
}
