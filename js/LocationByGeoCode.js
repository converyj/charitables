// var id = "<?php echo $id; ?>";

alert("id" + id)


var map, infoWindow;
function initMap() {
    map = new google.maps.Map(document.getElementById('mapid'), {
        center: { lat: -34.397, lng: 150.644 },
        zoom: 6
    });
    infoWindow = new google.maps.InfoWindow;

    // Try HTML5 geolocation.
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function (position) {
            var pos = {
                lat: position.coords.latitude,
                lng: position.coords.longitude
            };

            infoWindow.setPosition(pos);
            infoWindow.setContent('Location found.');
            infoWindow.open(map);
            map.setCenter(pos);
        }, function () {
            handleLocationError(true, infoWindow, map.getCenter());
        });
    } else {
        // Browser doesn't support Geolocation
        handleLocationError(false, infoWindow, map.getCenter());
    }
}

function handleLocationError(browserHasGeolocation, infoWindow, pos) {
    infoWindow.setPosition(pos);
    infoWindow.setContent(browserHasGeolocation ?
        'Error: The Geolocation service failed.' :
        'Error: Your browser doesn\'t support geolocation.');
    infoWindow.open(map);
}


$.ajax({
    type: "GET",
    url: "getUserAddress.php",
    data: id,
    dataType: "json",
    success: getCoordinates,
    error: function (xhr, status, err) {
        console.log("can't find");
    }
});

function getCoordinates(json) {
    console.log(json)
    // call mapbox api to get coordinates 
    $.ajax({
        type: "GET",
        url: "https://maps.googleapis.com/maps/api/geocode/json?address" + data + "?key=AIzaSyD5TfqRaeXmKpUbcGKd5vQbHS4bqj8qHkU&callback=initMap",
        async: true,
        dataType: "json",
        success: putOnMap,
        error: function (xhr, status, err) {
            console.log("can't find")
        }
    });
}

var wonder1 = { lat: 40.4319, lng: 116.5704 };

var map = new google.maps.Map(document.getElementById('mapid'), {
    zoom: 2.1,
    center: new google.maps.LatLng(15, 0),
    mapTypeControlOptions: {
        mapTypeIds: ['roadmap', 'satellite', 'hybrid', 'terrain',
            'styled_map']
    }
});



//Associate the styled map with the MapTypeId and set it to display.
map.mapTypes.set('styled_map', styledMapType);
map.setMapTypeId('styled_map');


var marker1 = new google.maps.Marker({
    position: wonder1,
    animation: google.maps.Animation.DROP,
    map: map,
    title: 'Great Wall of China '
});