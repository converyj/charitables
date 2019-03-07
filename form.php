<!DOCTYPE html>
<html lang="en">

<head>
    <title>Donate/Request Form | Charitables</title>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="images/icon.ico" type="image/x-icon" />
    <link href="css/normalize.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
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
                <li class="nav-item">
                    <a class="nav-link" href="dashboard.php">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="donate.php">Support Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contact.php">Contact Us</a>
                </li>
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
                        <img src="" alt="">
                    </a>
                </li>
            </ul>
        </div>
    </nav>
    <main>
        <section class="container" id="app">
            <form action="" method="POST">
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#food">Food</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#clothes">Clothes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#all">All</a>
                    </li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                    <div id="food" class="tab-pane active"><br>
                        <div class="col-4">
                            <!-- call to database (dynamically) -->
                            <img />
                            <p class="text-center">Fruit</p>
                        </div>
                    </div>
                    <div id="clothes" class="tab-pane fade"><br>
                        <div class="col-4">
                            <!-- call to database (dynamically) -->
                            <img />
                            <p class="text-center">Tops</p>
                        </div>
                    </div>
                    <div id="all" class="container tab-pane fade"><br>
                        <div class="col-4">
                            <!-- call to database (dynamically) -->
                            <button type="button" data-toggle="modal" data-target="#itemsModal">
                                <img />
                            </button>
                            <p class="text-center">Fruit</p>
                        </div>
                    </div>
                    <!-- Modal -->
                    <div class="modal fade" id="itemsModal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modalLabel">Item:</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="float-left">
                                        <img />
                                    </div>
                                    <div class="form-group float-left">
                                        <label for="quantity">Quantity:</label>
                                        <input type="text" name="quantity" class="form-control" autofocus="autofocus" id="quantity" required>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary">Accept</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-12">
                            <label for="email">Email</label>
                            <input type="email" name="email" class="form-control" autofocus="autofocus" id="email" placeholder="Enter Email" required>
                        </div>
                        <div class="form-group col-12">
                            <label for="passwd">Password</label>
                            <div class="input-group mb-3">
                                <input type="password" name="password" id="passwd" class="form-control" placeholder="Enter Password">
                            </div>
                        </div>
                        <div class="form-group col-12">
                            <label for="passwd">Confirm Password</label>
                            <input type="password" name="conPassword" id="passwd" class="form-control">
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
                        <input type="text" name="taxNumber" class="form-control" id="taxNum" placeholder="xxxxxxxxxx">
                    </div>
                    <div class="form-group">
                        <label for="address">Address Line 1</label>
                        <input type="text" name="address" class="form-control" id="address" placeholder="123 Main Street">
                    </div>
                    <div class="form-group">
                        <label for="contact">Contact Number</label>
                        <input type="text" name="contact" class="form-control" id="contact" placeholder="XXX-XXX-XXX">
                    </div>
                    <div class="form-row">
                        <div class="form-group col-12">
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
                        <div class="form-group col-md-6">
                            <label for="prov">Province</label>
                            <select id="prov" name="province" class="form-control">
                                <option selected>Choose ...</option>
                                <option>Alberta</option>
                                <option>British Columbia</option>
                                <option>New Brunswick</option>
                                <option>Ontario</option>
                                <option>Quebec</option>
                                <option>Nova Scotia</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="postal">Postal Code</label>
                            <input type="text" name="postalCode" id="postal" class="form-control" placeholder="L1K3F0" />
                        </div>
                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="ckbAgree" id="agree">
                                <label class="form-check-label" for="agree">
                                    Agree to
                                </label>
                                <a href="#">Terms and Conditions</a>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-danger btn-lg m-auto">Join Now</button>
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
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <script src="js/script.js"></script>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html> 