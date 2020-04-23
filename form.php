<?php
session_start();

if (!isset($_SESSION['role'])) {
    header("Location: home.php");
    exit();
}

include_once("../../charitables_dbconfig.php");

$stmt = $pdo->prepare("SELECT * FROM `FoodImages`");
$stmt->execute();

$stmt2 = $pdo->prepare("SELECT * FROM `ClothesImages`");
$stmt2->execute();

$stmt3 = $pdo->prepare("SELECT * FROM `FoodImages` UNION ALL SELECT * FROM `ClothesImages`");
$stmt3->execute();

$stmt4 = $pdo->prepare("SELECT * FROM `FoodImages` UNION ALL SELECT * FROM `ClothesImages`");
$stmt4->execute();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Donate/Request Form | Charitables</title>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon" />
    <link href="css/normalize.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/media-queries.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <link src="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900|Oswald" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a href="home.php"><img src="images/logoLarge.png" alt="logo" height="40"></a>
        <div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <?php
            if (isset($_SESSION['role'])) {
                ?>
                <span id="smallBell">
                    <a class="d-flex justify-content-end float-right nav-link navbar-right" href="#">
                        <i class="fas fa-bell"></i>
                    </a>
                </span>
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
        <section class="container pt-4" id="app">
            <form action="form-processing.php" method="POST" @submit="parse($event)">
                <div class="d-flex mr-2 mb-4 mt-4 ml-2 justify-content-center">
                    <button type="button" class="list-group-item list-group-item-action btn-outline-secondary active roundCornersMenuLeft" id="blueBtn-secondary">
                        <a href="form.php" class="aWhite">Form</a>
                    </button>
                    <button type="button" class="list-group-item list-group-item-action">
                        <a href="dashboard.php" class="aBlack">Dashboard</a>
                    </button>
                    <button type="button" class="list-group-item list-group-item-action roundCornersMenuRight">
                        <a href="offer.php" class="aBlack">Offers</a>
                    </button>
                </div>
                <form action="form-processing.php" method="POST">
                    <ul class="nav nav-tabs-pink nav-inline nav-justified">
                        <li class="nav-item">
                            <a class="nav-link nav-link-pink active aBlack" data-toggle="tab" href="#food">Food</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link nav-link-pink aBlack" data-toggle="tab" href="#clothes">Clothes</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link nav-link-pink aBlack" data-toggle="tab" href="#all">All</a>
                        </li>
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div id="food" class="container tab-pane active center"><br>
                            <div class="form-row">
                                <?php
                                while ($row = $stmt->fetch()) {
                                    ?>
                                    <div class="form-group col-4 col-md-3 col-lg-2">
                                        <button type="button" class="buttonC border-0" @click="categoryId = '<?php echo ($row["id"]); ?>', categoryType = '<?php echo ($row["type"]); ?>'" data-toggle="modal" data-target="#<?php echo ($row["id"]); ?><?php echo ($row["type"]); ?>">
                                            <img class="buttonC" src="images/foodImages/<?php echo ($row["images"]); ?>" width="50" height="50" />
                                        </button>
                                        <div>
                                            <label class="justify-content-center pt-1"><?php echo ($row["category"]); ?></label>
                                        </div>
                                    </div>
                                <?php

                            }
                            ?>
                            </div>
                        </div>
                        <!----------------------------------------------------------------------------------------------------------------------------------->
                        <div id="clothes" class="container tab-pane fade center"><br>
                            <div class="form-row">
                                <?php
                                while ($row2 = $stmt2->fetch()) {
                                    ?>
                                    <div class="form-group col-4 col-md-3 col-lg-2">
                                        <button type="button" class="buttonC border-0" @click="categoryId = '<?php echo ($row2["id"]); ?>', categoryType = '<?php echo ($row2["type"]); ?>'" data-toggle="modal" data-target="#<?php echo ($row2["id"]); ?><?php echo ($row2["type"]); ?>">
                                            <img class="buttonC" src="images/clothesImages/<?php echo ($row2["images"]); ?>" width="50" height="50" />
                                        </button>
                                        <div>
                                            <label class="justify-content-center pt-1"><?php echo ($row2["category"]); ?></label>
                                        </div>
                                    </div>
                                <?php

                            }
                            ?>
                            </div>
                        </div>
                        <!-------------------------------------------------------------------------------------------------------------------------------->
                        <div id="all" class="container tab-pane fade center"><br>
                            <div class="form-row">
                                <?php
                                while ($row3 = $stmt3->fetch()) {
                                    ?>
                                    <div class="form-group col-4 col-md-3 col-lg-2">
                                        <button type="button" class="buttonC border-0" @click="categoryId = '<?php echo ($row3["id"]); ?>', categoryType = '<?php echo ($row3["type"]); ?>'" data-toggle="modal" data-target="#<?php echo ($row3["id"]); ?><?php echo ($row3["type"]); ?>">
                                            <img class="buttonC" src="images/all/<?php echo ($row3["images"]); ?>" width="50" height="50" />
                                        </button>
                                        <div>
                                            <label class="justify-content-center pt-1"><?php echo ($row3["category"]); ?></label>
                                        </div>
                                    </div>
                                <?php
                            }
                            ?>
                            </div>
                        </div>

                        <!-- Modal -->
                        <?php
                        while ($row4 = $stmt4->fetch()) {
                            ?>
                            <div class="modal fade" id="<?php echo ($row4["id"]); ?><?php echo ($row4["type"]); ?>" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="modalLabel"><?php echo ($row4["category"]); ?></h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <img class="buttonCA" src="images/<?php echo ($row4["images"]); ?>" width="100" height="100" />
                                                <label for="item">Item</label>
                                                <input type="text" name="item" id="widthPop" class="form-control" v-model="name" id="item" autofocus>
                                                <label for="qty">Quantity</label>
                                                <input type="text" name="qty" id="widthPop" class="form-control" v-model="quantity" id="qty">
                                            </div>
                                        </div>
                                        <div class="modal-footer justify-content-center">
                                            <button type="button" class="btn btn-primary mybuttonstyle" data-dismiss="modal" @click="addItem">Accept</button>
                                            <button type="button" class="btn btn-primary mybuttonstyle" data-dismiss="modal">Cancel</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php
                    }
                    ?>
                        <div class="modal" tabindex="-1" role="dialog" id="msg">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Message</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body"></div>
                                    <div class="modal-footer">
                                        <button @click="redirect" type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <section v-show="seen" class="pb-4 container">
                            <div class="row">
                                <h6 class="h6 col-7 col-md-6" for="items">Item</h6>
                                <h6 class="col-3 col-md-2" for="qty">Quantity</h6>
                            </div>
                            <div class="form-row" v-for="item, index in items">
                                <div class="form-group col-7 col-md-6">
                                    <input v-model.lazy="item.name" type="text" name="item" class="form-control" id="items">
                                </div>
                                <div class="form-group col-3 col-md-2">
                                    <input type="text" name="quantity" v-model.lazy.number="item.quantity" id="qty" class="form-control">
                                </div>
                                <button class="border-0" type="button" @click="remove(index)">
                                    <i class="fas fa-trash-alt pb-3"></i>
                                </button>
                            </div>
                            <div class="center pt-4 pb-4">
                                <input type="submit" data-toggle="modal" data-target="#msg" id="button" value="Confirm" class="col-8 col-sm-8 col-md-4 btn btn-primary m-auto mybuttonstyle pt-3 pb-3" />
                            </div>
                        </section>
                </form>
        </section>
    </main>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="js/form.js"></script>
    <script src="js/notification.js"></script>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>