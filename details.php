<?php

session_start();

$id = $_GET['id'];


/* 
SQL Query 
SELECT firstname, lastname, companyname. streetname, city, province, postal 
    FROM Food INNER JOIN User ON campanyid = companyid 
    WHERE companyid = $id 

    // UNION ALL 
    SELECT companyname, category, item, quantity 
    FROM Food INNER JOIN User ON campanyid = companyid 
    WHERE companyid = $id 
    GROUP BY category 
*/

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Details | Charitables</title>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="images/icon.ico" type="image/x-icon" />
    <link href="css/normalize.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/media-queries.css" rel="stylesheet">

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <link src="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900|Oswald" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Load the Google Maps JS API. Your Google maps key will be rendered. -->

    <style>
        /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
        #mapid {
            height: 425px;
        }
    </style>
</head>


<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand h1" href="home.html">Charitables</a>
        <div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <?php
            if (isset($_SESSION['role'])) {
                ?>
            <a class="d-flex justify-content-end float-right nav-link navbar-right" href="#">
                <i class="fas fa-bell"></i>
            </a>
            <?php

        }
        ?>
        </div>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
                <?php
                if (isset($_SESSION['role'])) {
                    ?>
                <li class="nav-item">
                    <a class="nav-link" href="dashboard.php">Dashboard</a>
                </li>
                <?php

            }
            ?>
                <li class="nav-item">
                    <a class="nav-link" href="donate.php">Support Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contact.php">Contact Us</a>
                </li>
                <?php
                if (isset($_SESSION['role'])) {
                    ?>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Profile
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="#">Edit Account</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="logout.php">Logout</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="fas fa-bell"></i>
                    </a>
                </li>
                <?php

            } else {
                ?>
                <li class="nav-item">
                    <a class="nav-link" href="login.php">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="signUp.php">Sign Up</a>
                </li>
                <?php

            }
            ?>
            </ul>
        </div>
    </nav>
    <main>
        <section class="container" id="app">
            <div class="d-flex mr-4 mb-4 mt-4 justify-content-center">
                <button type="button" class="list-group-item list-group-item-action">
                    <a href="form.php" class="aBlack">Form</a>
                </button>
                <button type="button" class="list-group-item list-group-item-action btn-outline-secondary active" id="blueBtn-secondary">
                    <a href="dashboard.php" class="aBlack">Dashboard</a>
                </button>
                <button type="button" class="list-group-item list-group-item-action">
                    <a href="offer.php" class="aBlack">Offers</a>
                </button>
            </div>
            <div class="list-group-horizontal">
                <!-- call to database where id is 1 -->
                <h3 class="text-left">John Doe - Company 1</h3>
                <form action="" method="POST">
                    <!-- call to database (dynamically) -->
                    <div class="container list-group-item list-group-item-action">
                        <div class="row">
                            <div class="col">
                                <h6>Fruit:</h6>
                            </div>
                            <div class="col">
                                <h6>Quantity:</h6>
                            </div>
                            <div class="w-100"></div>
                            <div class="col">
                                <div class="form-check checkbox-md">
                                    <input type="checkbox" class="form-check-input" id="oranges" name="requests[]">
                                    <label class="form-check-label" for="oranges">Oranges</label>
                                </div>
                            </div>
                            <div class="col">100</div>
                            <div class="w-100"></div>
                            <div class="col">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="bananas" name="requests[]">
                                    <label class="form-check-label" for="bananas">Bananas</label>
                                </div>
                            </div>
                            <div class="col">80</div>
                        </div>
                    </div>
                    <div id="mapid" class="map-responsive"></div>

                    <div class="text-center">
                        <br>
                        <div class="row">
                            <input type="submit" value="Confirm & Connect" class="col-9 col-md-8 col-sm-8 btn btn-primary m-auto mybuttonstyle" />
                        </div>
                    </div>
                    <script>
                        var id = '<?= $id ?>';
                    </script>
                </form>
        </section>
        <footer class="page-footer text-center pb-4">
            <div class="icons mt-4">
                <i class="fab fa-twitter pr-2"></i>
                <i class="fab fa-facebook-f pr-2"></i>
            </div>
        </footer>
    </main>
    <script>
        alert("id" + id)


        function initMap() {
            // create the geocoder
            geocoder = new google.maps.Geocoder();

            // set some default map details, initial center point, zoom and style
            var mapOptions = {
                center: new google.maps.LatLng(43.6532, -79.3832),
                zoom: 7,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            };

            // create the map and reference the div#mapid container
            map = new google.maps.Map(document.getElementById("mapid"), mapOptions);

            // fetch the existing places (ajax)
            // and put them on the map
            fetchPlaces();
        }

        // when page is ready, initialize the map!
        // google.maps.event.addDomListener(window, 'load', initialize);

        // fetch the user address from php file
        function fetchPlaces() {
            $.ajax({
                type: "GET",
                url: "getUserAddress.php",
                data: {
                    id: 1
                },
                async: true,
                dataType: "json",
                success: function() {
                    console.log(id)
                },
                error: function(xhr, status, err) {
                    console.log("can't find the lala");
                }
            });

            // get the coordinates
            function getCoordinates(json) {
                console.log(json)
                // call mapbox api to get coordinates
                $.ajax({
                    type: "GET",
                    url: "https://maps.googleapis.com/maps/api/geocode/json?address" + json + "?key=AIzaSyD5TfqRaeXmKpUbcGKd5vQbHS4bqj8qHkU&callback=initMap",
                    async: true,
                    dataType: "json",
                    success: putOnMap,
                    error: function(xhr, status, err) {
                        console.log("can't find address")
                    }
                });
            }
        }

        // map.setCenter(data[0].geometry.location);


        // var marker = new google.maps.Marker({
        //     position: wonder1,
        //     animation: google.maps.Animation.DROP,
        //     map: map
        // });




        //Associate the styled map with the MapTypeId and set it to display.
        // map.mapTypes.set('styled_map', styledMapType);
        // map.setMapTypeId('styled_map');
    </script>
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <!-- <script src="js/dashboard.js"></script> -->
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD5TfqRaeXmKpUbcGKd5vQbHS4bqj8qHkU&callback=initMap">
    </script>
    <!-- <script src="js/LocationByGeoCode.js"></script> -->
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html> 