<?php 

session_start();



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Donate/Request Form | Charitables</title>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
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
                        <img src="" alt="">
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
        <section class="container pt-4" id="app">
            <form action="" method="POST">
                <!-- <div class="form-row mt-4"> -->
                <ul class="nav nav-tabs-pink">
                    <li class="nav-item">
                        <a class="nav-link active nav-link-pink aBlack borderGrey" data-toggle="tab" href="#food">Food</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-link-pink aBlack" data-toggle="tab" href="#clothes">Clothes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-link-pink aBlack" data-toggle="tab" href="#all">All</a>
                    </li>
                </ul>
            <!-- </div> -->
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
                        <div class="form-row">
                            <div class="form-group col-4">
                                <!-- call to database (dynamically) -->
                                <label :ref="id + '-test'" class="justify-content-center">Fruit</label>
                                <button type="button" id="cat1" @click="getId(id)" value="fruit" data-toggle="modal" data-target="#itemsModal">
                                    <img src="fruit.jpg" width="50" height="50" />
                                </button><br />

                            </div>
                            <div class="form-group col-4">
                                <!-- call to database (dynamically) -->
                                <label :ref="id + '-test'" class="justify-content-center">Veg</label>
                                <button type="button" @click="getId(id)" value="veg" data-toggle="modal" data-target="#itemsModal">
                                    <img src="fruit.jpg" width="50" height="50" />
                                </button><br />

                            </div>
                            <div class="form-group col-4">
                                <!-- call to database (dynamically) -->
                                <label :ref="id + '-test'" class="justify-content-center">Meat & Seafood</label>
                                <button type="button" @click="getId(id)" value="veg" data-toggle="modal" data-target="#itemsModal">
                                    <img src="fruit.jpg" width="50" height="50" />
                                </button><br />

                            </div>
                            <div class="form-group col-4">
                                <!-- call to database (dynamically) -->
                                <label :ref="id + '-test'" class="justify-content-center">Dairy</label>
                                <button type="button" @click="getId(id)" value="veg" data-toggle="modal" data-target="#itemsModal">
                                    <img src="fruit.jpg" width="50" height="50" />
                                </button><br />

                            </div>
                            <div class="form-group col-4">
                                <!-- call to database (dynamically) -->
                                <label :ref="id + '-test'" class="justify-content-center">Water & Juice</label>
                                <button type="button" @click="getId(id)" value="veg" data-toggle="modal" data-target="#itemsModal">
                                    <img src="fruit.jpg" width="50" height="50" />
                                </button><br />

                            </div>
                            <div class="form-group col-4">
                                <!-- call to database (dynamically) -->
                                <label :ref="id + '-test'" class="justify-content-center">Non-Perishables</label>
                                <button type="button" @click="getId(id)" value="veg" data-toggle="modal" data-target="#itemsModal">
                                    <img src="fruit.jpg" width="50" height="50" />
                                </button><br />

                            </div>
                            <div class="form-group col-4">
                                <!-- call to database (dynamically) -->
                                <label :ref="id + '-test'" class="justify-content-center">Sauce & Condiments</label>
                                <button type="button" @click="getId(id)" value="veg" data-toggle="modal" data-target="#itemsModal">
                                    <img src="fruit.jpg" width="50" height="50" />
                                </button><br />

                            </div>
                            <div class="form-group col-4">
                                <!-- call to database (dynamically) -->
                                <label :ref="id + '-test'" class="justify-content-center">Grains</label>
                                <button type="button" @click="getId(id)" value="veg" data-toggle="modal" data-target="#itemsModal">
                                    <img src="fruit.jpg" width="50" height="50" />
                                </button><br />

                            </div>
                            <div class="form-group col-4">
                                <!-- call to database (dynamically) -->
                                <label :ref="id + '-test'" class="justify-content-center">Baby Food</label>
                                <button type="button" @click="getId(id)" value="veg" data-toggle="modal" data-target="#itemsModal">
                                    <img src="fruit.jpg" width="50" height="50" />
                                </button><br />

                            </div>
                            <div class="form-group col-4">
                                <!-- call to database (dynamically) -->
                                <label :ref="id + '-test'" class="justify-content-center">Other Beverages</label>
                                <button type="button" @click="getId(id)" value="veg" data-toggle="modal" data-target="#itemsModal">
                                    <img src="fruit.jpg" width="50" height="50" />
                                </button><br />

                            </div>
                            <div class="form-group col-4">
                                <!-- call to database (dynamically) -->
                                <label :ref="id + '-test'" class="justify-content-center">Eggs & Soy</label>
                                <button type="button" @click="getId(id)" value="veg" data-toggle="modal" data-target="#itemsModal">
                                    <img src="fruit.jpg" width="50" height="50" />
                                </button><br />

                            </div>

                        </div>
                    </div>
                    <!-- Modal -->
                    <div class="modal fade" id="itemsModal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modalLabel"></h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="item">Item</label>
                                        <input type="text" name="item" class="form-control" v-model="name" id="item" required>
                                        <label for="qty">Quantity</label>
                                        <input type="text" name="qty" class="form-control" v-model="quantity" id="qty" required>
                                    </div>
                                    <!-- <div class="form-group" v-for='item in items'>
                                    <label for="qty">Quantity</label>
                                    <input type="text" name="qty" class="form-control" v-model.number="item.quantity" id="qty" required>
                                </div> -->
                                </div>
                                <div class="modal-footer justify-content-center">
                                    <button type="button" class="btn btn-primary" data-dismiss="modal" @click="addItem()">Accept</button>
                                    <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <section id="summary">
                        <div class="form-row" v-for="item, index in items">
                            <div class="form-group col-4">
                                <label for="items">Item</label>
                                <input v-model.lazy="item.name" type="text" name="item" class="form-control" id="items">
                                <!-- <label for="qty">Quantity</label>
                            <input type="text" name="quantity" v-model.lazy.number="item.quantity" id="qty" class="form-control" disabled> -->
                            </div>
                            <div class="form-group col-2">
                                <label for=" qty">Quantity</label>
                                <input type="text" name="quantity" v-model.lazy.number="item.quantity" id="qty" class="form-control">
                            </div>
                            <button type="button" @click="remove(index)">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </div>
                    </section>
                    <input type="submit" value="Confirm" class="btn btn-primary btn-primary2 m-auto mybuttonstyle2" />
            </form>
        </section>
        <footer class="page-footer text-center pb-4">
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