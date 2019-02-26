<!DOCTYPE html>
<html lang="en">

<head>
    <title>Sign Up | Charitables</title>
    <meta charset="utf-8" />
    <link rel="shortcut icon" href="images/icon.ico" type="image/x-icon" />
    <link href="css/normalize.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <link src="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900|Oswald" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand h1" href="home.html">Charitables</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">About Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Chat List</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Donate</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Logout</a>
                </li>
            </ul>
        </div>
    </nav>
    <main>
        <section class="container">
            <header>
                <h1 class="text-center">Sign Up</h1>
                <h5 class="text-center">Every Little Help Counts</h5>
            </header>
            <form action="" method="POST">
                <div class="form-row mt-4 pl-4">
                    <div class="form-group col-md-12 custom-contol custom-radio">
                        <input type="radio" class="custom-control-input form-control-lg" id="donor" name="rdbRole" checked>
                        <label class="custom-control-label" for="donor">Donor</label>
                    </div>
                    <div class="form-group custom-contol custom-radio">
                        <input type="radio" class="custom-control-input" id="recipient" name="rdbRole">
                        <label class="custom-control-label" for="recipient">Recipient</label>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control" autofocus="autofocus" id="email" placeholder="Enter Email">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="passwd">Password</label>
                        <div class="input-group mb-3">
                            <input type="text" name="password" id="passwd" class="form-control" placeholder="Enter Password">
                            <div class="input-group-prepend">
                                <button class="btn btn-outline-secondary" type="button" id="showPassword"><i class="far fa-eye-slash"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="form-group">
                        <label for="orgName">Organization Name</label>
                        <input type="text" name="organization" class="form-control" id="orgName">
                    </div>
                    <div class="form-group">
                        <label for="taxNum">Tax Number</label>
                        <input type="text" name="taxNumber" class="form-control" id="taxNum" placeholder="XXX-XXX-XXX">
                    </div>
                    <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" name="address" class="form-control" id="address" placeholder="123 Main Street">
                    </div>
                    <div class="form-group">
                        <label for="contact">Contact Number</label>
                        <input type="text" name="contact" class="form-control" id="contact" placeholder="XXX-XXX-XXX">
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="city">City</label>
                            <select id="city" name="city" class="form-control">
                                <option selected>Choose ...</option>
                                <option>Toronto</option>
                                <option>Vancouver</option>
                                <option>Montreal</option>
                                <option>Calgary</option>
                                <option>Edmonton</option>
                                <option>Halifax</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="prov">Province</label>
                            <select id="prov" name="province" class="form-control">
                                <option selected>Choose...</option>
                                <option>Alberta</option>
                                <option>British Columbia</option>
                                <option>New Brunswick</option>
                                <option>Ontario</option>
                                <option>Quebec</option>
                                <option>Nova Scotia</option>
                            </select>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="postal">Postal Code</label>
                            <input type="text" name="postalCode" id="postal" class="form-control" placeholder="L1K3F0" />
                        </div>
                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="ckbAgree" id="agree">
                                <label class="form-check-label" for="agree">
                                    Agree
                                </label>
                                <a href="#">Terms and Conditions</a>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-danger btn-lg btn-block mt-4">Join Now</button>
            </form>
        </section>
        <footer class="page-footer text-center pl-4">
            <div class="icons mt-4">
                <i class="fab fa-twitter pr-2"></i>
                <i class="fab fa-facebook-f pr-2"></i>
                <i class="fab fa-instagram pr-2"></i>
            </div>
        </footer>
    </main>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html> 