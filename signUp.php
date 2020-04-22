<!DOCTYPE html>
<html lang="en">

<head>
    <title>Sign Up | Charitables</title>
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
        <section class="col-9 col-sm-6 col-md-6 col-lg-6 col-xl-6 container" id="app">
            <header>
                <h1 class="text-center pt-4">Sign Up</h1>
                <h5 class="text-center">Every Little Help Counts</h5>
            </header>
            <form action="signUp-processing.php" method="POST">
                <div class="form-row mt-4">
                    <div class="btn-group btn-group-justified m-auto" data-toggle="buttons">
                        <label class="btn btn-outline-secondary active" id="blueBtn-secondary">
                            <input type="radio" class="displayNone" name="rdbRole" id="donor" value="1" checked>Donor
                        </label>
                        <label class="btn btn-outline-secondary" id="blueBtn-secondary">
                            <input type="radio" class="displayNone" name="rdbRole" id="recipient" value="2">Recipient
                        </label>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-12">
                        <label for="fname">First Name</label>
                        <input type="text" name="fname" class="form-control" autofocus="autofocus" id="fname" placeholder="Enter First Name" required>
                    </div>
                    <div class="form-group col-12">
                        <label for="lname">Last Name</label>
                        <input type="text" name="lname" class="form-control" id="lname" placeholder="Enter Last Name" required>
                    </div>
                    <div class="form-group col-12">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control" id="email" placeholder="Enter Email" required>
                    </div>
                    <div class="form-group col-12">
                        <label for="passwd">Password</label>
                        <div class="input-group">
                            <input type="password" name="password" id="passwd" class="form-control" placeholder="Enter Password" required>
                        </div>
                    </div>
                    <div class="form-group col-12">
                        <label for="conPasswd">Confirm Password</label>
                        <input type="password" name="conPassword" id="conPasswd" data-equalto="passwd" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label for="orgName">Organization Name</label>
                    <input type="text" name="organization" class="form-control" id="orgName" required>
                </div>
                <div class="form-group">
                    <label for="taxNum">Tax Number</label>
                    <input type="text" name="taxNumber" class="form-control" id="taxNum" placeholder="xxxxxxxxxx" required>
                </div>
                <div class="form-group">
                    <label for="contact">Contact Number</label>
                    <input type="text" name="contact" class="form-control" id="contact" placeholder="XXX-XXX-XXX" required>
                </div>
                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" name="address" class="form-control" id="address" placeholder="123 Main Street" required>
                </div>
                <div class="form-row">
                    <div class="form-group col-12">
                        <label for="city">City</label>
                        <select id="city" name="city" class="form-control" required>
                            <option selected value="">Choose ...</option>
                            <option value="Brampton">Brampton</option>
                            <option value="Oakville">Oakville</option>
                            <option value="Mississauga">Missassauga</option>
                            <option value="Toronto">Toronto</option>
                            <option value="Vancouver">Vancouver</option>
                            <option value="Montreal">Montreal</option>
                            <option value="Calgary">Calgary</option>
                            <option value="Edmonton">Edmonton</option>
                            <option value="Halifax">Halifax</option>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="prov">Province</label>
                        <select id="prov" name="province" class="form-control" required>
                            <option selected value="">Choose ...</option>
                            <option value="Alberta">Alberta</option>
                            <option value="BC">British Columbia</option>
                            <option value="NB">New Brunswick</option>
                            <option value="ON">Ontario</option>
                            <option value="Quebec">Quebec</option>
                            <option value="NS">Nova Scotia</option>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="postal">Postal Code</label>
                        <input type="text" name="postalCode" id="postal" class="form-control" placeholder="L1K3F0" required />
                    </div>
                    <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="ckbAgree" id="agree" required>
                            <label class="form-check-label" for="agree">
                                Agree to
                            </label>
                            <a href="#">Terms and Conditions</a>
                        </div>
                    </div>
                </div>

                <div class="text-center">
                    <input type="submit" value="Join Now" class="col-9 col-md-8 col-sm-8 btn btn-primary btn-primary2 m-auto mybuttonstyle2 centerSignUpButtons2" id="pinkBtn" />
                </div>
            </form>
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