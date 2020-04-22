<?php

session_start();

if (!isset($_SESSION['role'])) {
    header("Location: home.php");
    exit();
}

$email = $_SESSION['chosenEmail'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title> Connect | Charitables</title>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon" />
    <link href="css/normalize.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/media-queries.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <link src="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900|Oswald" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a href="home.php"><img src="images/logoLarge.png" alt="logo" height="40"></a>
        <div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- mobile blue bell -->
            <span id="smallBell">
                <a class="d-flex justify-content-end float-right nav-link navbar-right" href="#">
                    <i class="fas fa-bell"></i>
                </a>
            </span>
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
                <!-- <li class="nav-item">
                        <a class="nav-link" href="donate.php">Support Us</a>
                    </li> -->
                <li class="nav-item">
                    <a class="nav-link" href="home.php#contact">Contact Us</a>
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
                    <!-- grey desktop bell -->
                    <span id="bigBell">
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <i class="fas fa-bell"></i>
                            </a>
                        </li>
                    </span>
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
        <section class="container text-center pt-5" id="app">
            <p class="lead">Request Recieved</p>
            <h1>You are now Connected</h2>
                <div class="mt-4">
                    <a class="col-6 col-md-3 col-sm-8 btn btn-primary mybuttonstyle m-2" href="mailto:<?php echo ($email); ?>" role="button" id="blueBtn">Email</a>
                    <a class="col-6 col-md-3 col-sm-8 btn btn-primary m-2 mybuttonstyle2" href="offer.php" role="button" id="pinkBtn">Offers</a>
                    <a class="col-6 col-md-3 col-sm-8 btn btn-primary mybuttonstyle m-2" href="chat.php" role="button" id="blueBtn">Chat</a>
                </div>

        </section>
        <footer class="page-footer text-center pt-5 pb-4">
            <div class="icons mt-4">
                <i class="fab fa-twitter pr-2"></i>
                <i class="fab fa-facebook-f pr-2"></i>
            </div>
        </footer>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <script src="js/form.js"></script>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>