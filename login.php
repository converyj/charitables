<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login | Charitables</title>
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
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
                <!-- <li class="nav-item">
                    <a class="nav-link" href="donate.php">Support Us</a>
                </li> -->
                <li class="nav-item">
                    <a class="nav-link" href="home.php#contact">Contact Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="login.php">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="signUp.php">Sign Up</a>
                </li>
            </ul>
        </div>
    </nav>
    <main>
        <section class="col-9 col-sm-5 col-md-5 col-lg-4 col-xl-4 container" id="app">
            <header>
                <h1 class="text-center pt-4">Login</h1>
            </header>
            <form action="process-login.php" method="POST">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" class="form-control" autofocus="autofocus" id="email" placeholder="Enter Email" required>
                </div>
                <div class="form-group">
                    <label for="passwd">Password</label>
                    <div class="input-group">
                        <input :type="type" name="password" id="passwd" class="form-control border-right-0" placeholder="Enter Password" required>
                        <div class="input-group-prepend">
                            <button class="btn btn-outline-secondary border-left-0 rounded-right" type="button" @click="showPassword">
                                <!-- style="border-color:#ced4da"  -->
                                <i v-bind:class="show"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="remember" name="chkremember">
                    <label class="form-check-label" for="remember">Remember Me</label>
                </div>
                <div class="text-center pt-3">

                    <div class="row">
                        <input type="submit" value="Login" class="col-9 col-md-8 col-sm-8 btn btn-primary m-auto mybuttonstyle" id="blueBtn" />
                    </div>
                </div>
            </form>
            <p class="text-center mt-3 mb-3">or</p>
            <div class="row pb-4">
                <a class="col-9 col-md-8 col-sm-8 btn btn-primary m-auto mybuttonstyle2" href="signUp.php" role="button" id="pinkBtn">Create New Account</a>
            </div>

            <div class="text-center">
                <a href="#">Forgot Password?</a>
            </div>
        </section>
        <footer class="page-footer text-center pb-4">
            <div class="icons mt-4">
                <i class="fab fa-twitter pr-2"></i>
                <i class="fab fa-facebook-f pr-2"></i>
                <!-- <i class="fab fa-instagram pr-2"></i> -->
            </div>
        </footer>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <script src="js/script.js"></script>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html> 