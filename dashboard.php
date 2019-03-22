<?php

session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Dashboard | Charitables</title>
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
</head>
<style>

/* ul {
	height: 100px;
} */
.content {
	height: 3em;
}
.hideContent {
    overflow: hidden;
    /* line-height: 1em; */
	height: 3em !important;
}

.showContent {
	overflow: default;
    line-height: 1em;
    height: auto;
}

h1 {
    font-size: 24px;
}
p {
    padding: 10px 0;
}
#Mybutton1 {
    padding: 10px 0;
    text-align: center;
}

</style>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand h1" href="home.html">Charitables</a>
        <a class="nav-link" href="#">
            <i class="fas fa-bell"></i>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
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
                        <a class="dropdown-item" href="#">Logout</a>
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
        <div class="d-flex flex-lg-column flex-sm-row float-md-left mr-4 mb-4 justify-content-center">
                <button type="button" class="list-group-item list-group-item-action">
                    Form
                </button>
                <button type="button" class="list-group-item list-group-item-action">Offers</button>
                <button type="button" class="list-group-item list-group-item-action active">Dashboard</button>
        </div>
        <ul class="nav nav-tabs-pink nav-inline nav-justified">
            <li class="nav-item">
                <a class="nav-link active nav-link-pink aBlack" data-toggle="tab" href="#donor">Donor</a>
            </li>
            <li class="nav-item">
                <a class="nav-link nav-link-pink aBlack" data-toggle="tab" href="#recipient">Recipient</a>
            </li>
        </ul>
            <!-- Tab panes -->
            <div class="tab-content">
                <div id="donor" class="container tab-pane active center"><br>
                    <div class="list-group-horizontal">
                        <!-- call to database (dynamically) -->
				    <div class="list-group-item list-group-item-action hideContent content">
                            <!-- <a href="chatlist.php"> -->
                                <!-- <img class="buttonCA" src="fruit.jpg" alt="profile" width="100" height="100" /> -->
                                <h3 class="text-left">John Doe</h3>
                            		<!-- <div class="text-left content hideContent float-left"> -->
							<div class="details text-left float-left">
								  <ul>
		                                    <li>Fruits</li>
		                                    <li>Fruits</li>
		                                    <li>Fruits</li>
		                                    <li>Fruits</li>
		                                    <li>Fruits</li>
		                                    <li>Fruits</li>
		                                </ul>
                            		</div>
	                            <div class="float-right justify-content-center">
	                                <i class="fas fa-angle-right fa-3x d-flex justify-content-end"></i>
	                            </div>
                            <!-- </a> -->
				   	</div>
                            <!-- <div> -->
	                                <button id="Mybutton1" class="btn btn-primary" data-toggle="collapse" >View More</button>
	                            <!-- </div> -->
	                        <!-- </button>
	                        <button type="button" class="list-group-item list-group-item-action">Dapibus ac facilisis in
	                            <img class="buttonCA" src="fruit.jpg" width="100" height="100" />
	                        </button>
	                        <button type="button" class="list-group-item list-group-item-action">Morbi leo risus
	                            <img class="buttonCA" src="fruit.jpg" width="100" height="100" />
	                        </button>
	                        <button type="button" class="list-group-item list-group-item-action">Porta ac consectetur ac
	                            <img class="buttonCA" src="fruit.jpg" width="100" height="100" />
	                        </button>
	                        <button type="button" class="list-group-item list-group-item-action" disabled>Vestibulum at eros
	                            <img class="buttonCA" src="fruit.jpg" width="100" height="100" />
	                        </button> -->
                    </div>
                </div>
                <div id="recipient" class="container tab-pane fade center"><br>
                    <div class="list-group">
                        <!-- call to database (dynamically) -->
                        <button type="button" class="list-group-item list-group-item-action active">
                            Cras justo odio
                        </button>
                        <button type="button" class="list-group-item list-group-item-action">Dapibus ac facilisis in</button>
                        <button type="button" class="list-group-item list-group-item-action">Morbi leo risus</button>
                        <button type="button" class="list-group-item list-group-item-action">Porta ac consectetur ac</button>
                        <button type="button" class="list-group-item list-group-item-action" disabled>Vestibulum at eros</button>
                    </div>
                </div>
            </div>

        </section>
        <footer class="page-footer text-center pb-4">
            <div class="icons mt-4">
                <i class="fab fa-twitter pr-2"></i>
                <i class="fab fa-facebook-f pr-2"></i>
            </div>
        </footer>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <script src="js/dashboard.js"></script>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <script>
         $("#Mybutton1").on("click", function() {
    var $this = $(this);
    // var $content = $this.parent().prev("div.content");
    var linkText = $this.text().toUpperCase();

    if(linkText === "VIEW MORE"){
        console.log(linkText)
        linkText = "View less";
        $(".content").addClass("showContent");
    } else {
        console.log(linkText)

        linkText = "View more";
        $(".content").removeClass("showContent");

    };

    $this.text(linkText);
});
    </script>
</body>

</html>
