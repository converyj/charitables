<?php 

session_start();

$dsn = "mysql:host=localhost;dbname=browne9_Charitables;charset=utf8mb4";
$dbusername = "browne9_weedsite";
$dbpassword = "g@5o4nFUJ7ha";

$pdo = new PDO($dsn, $dbusername, $dbpassword);

$stmt = $pdo->prepare("SELECT * FROM `FoodImages`");
$stmt->execute();

include 'images.php';
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
    <link href="css/media-queries.css" rel="stylesheet">

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <link src="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900|Oswald" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand h1" href="home.html">Charitables</a>
        <a class="nav-link navbar-right" href="#">
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
                <ul class="nav nav-tabs-pink nav-inline nav-justified">
                    <li class="nav-item">
                        <a class="nav-link active nav-link-pink aBlack" data-toggle="tab" href="#food">Food</a>
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
                    <div id="food" class="container tab-pane active center"><br>
                        <div class="form-row">
                            
                            <div class="form-group col-4 col-md-3 col-lg-2">
                                <!-- call to database (dynamically) -->
                                 <!-- replace values of categoryId, id, src, label with values from the database   -->
                                <!-- <button type="button" class="buttonC border-0" @click="categoryId = 'fruit', id = 'Fruit'" data-toggle="modal" data-target="#itemsModal">
                                    <img class="buttonC" src="images/<?php echo($f["images"]); ?> "width="50" height="50" />
                                </button>
                                <div>
                                    <label class="justify-content-center pt-1"><?php echo($f["category"]); ?></label>
                                </div>
                            </div>
                            <div class="form-group col-4 col-md-3 col-lg-2"> -->
                                <!-- call to database (dynamically) -->
                                <!-- <button type="button" class="buttonC border-0" @click="categoryId = 'veg', id = 'Vegetable & Legumes'" data-toggle="modal" data-target="#itemsModal2">
                                    <img class="buttonC" src="images/<?php echo($ve["images"]); ?>" width="50" height="50" />
                                </button>
                                <div>
                                    <label class="justify-content-center pt-1">Vegetables & Legumes</label>
                                </div>
                            </div>
                            <div class="form-group col-4 col-md-3 col-lg-2"> -->
                                <!-- call to database (dynamically) -->
                                <!-- <button type="button" class="buttonC border-0" @click="categoryId = 'meat', id = 'Meat & Seafood'" data-toggle="modal" data-target="#itemsModal3">
                                    <img class="buttonC" src="images/<?php echo($m["images"]); ?>" width="50" height="50" />
                                </button>
                                <div>
                                    <label class="justify-content-center pt-1">Meat & Seafood</label>
                                </div>                                

                            </div>
                            <div class="form-group col-4 col-md-3 col-lg-2"> -->
                                 <!-- call to database (dynamically)  -->
                                <!-- <button type="button" class="buttonC border-0" @click="categoryId = 'diary', id = 'Diary'" data-toggle="modal" data-target="#itemsModal4">
                                    <img class="buttonC" src="images/<?php echo($d["images"]); ?>" width="50" height="50" />
                                </button>
                                <div>
                                    <label class="justify-content-center pt-1">Diary</label>
                                </div>
                            </div>
                            <div class="form-group col-4 col-md-3 col-lg-2"> -->
                                <!-- call to database (dynamically) -->
                                <!-- <button type="button" class="buttonC border-0" @click="categoryId = 'grains', id = 'Grains'" data-toggle="modal" data-target="#itemsModal">
                                    <img class="buttonC" src="images/<?php echo($g["images"]); ?>" width="50" height="50" />
                                </button>
                                <div>
                                    <label class="justify-content-center pt-1">Grains</label>
                                </div>
                            </div>
                            <div class="form-group col-4 col-md-3 col-lg-2"> -->
                                <!-- call to database (dynamically) -->
                                <!-- <button type="button" class="buttonC border-0" @click="categoryId = 'juice', id = 'Water & Juice'" data-toggle="modal" data-target="#itemsModal">
                                    <img class="buttonC" src="images/<?php echo($wa["images"]); ?>" width="50" height="50" />
                                </button>
                                <div>
                                    <label class="justify-content-center pt-1">Water & Juice</label>
                                </div>
                            </div>
                            <div class="form-group col-4 col-md-3 col-lg-2"> -->
                                <!-- call to database (dynamically) -->
                                <!-- <button type="button" class="buttonC border-0" @click="categoryId = 'eggs', id = 'Eggs & Soy'" data-toggle="modal" data-target="#itemsModal">
                                    <img class="buttonC" src="images/<?php echo($e["images"]); ?>" width="50" height="50" />
                                </button>
                                <div>
                                    <label class="justify-content-center pt-1">Eggs & Soy</label>
                                </div>
                            </div>
                            <div class="form-group col-4 col-md-3 col-lg-2"> -->
                                <!-- call to database (dynamically) -->
                                <!-- <button type="button" class="buttonC border-0" @click="categoryId = 'condiments', id = 'Sauce & Condiments'" data-toggle="modal" data-target="#itemsModal">
                                    <img class="buttonC" src="images/<?php echo($c["images"]); ?>" width="50" height="50" />
                                </button>
                                <div>
                                    <label class="justify-content-center pt-1">Sauce & Condiments</label>
                                </div>
                            </div>
                            <div class="form-group col-4 col-md-3 col-lg-2"> -->
                                <!-- call to database (dynamically) -->
                                <!-- <button type="button" class="buttonC border-0" @click="categoryId = 'snacks', id = 'Baked Goods & Snacks'" data-toggle="modal" data-target="#itemsModal">
                                    <img class="buttonC" src="images/<?php echo($sna["images"]); ?>" width="50" height="50" />
                                </button>
                                <div>
                                    <label class="justify-content-center pt-1">Baked Goods & Snacks</label>
                                </div>
                            </div>
                            <div class="form-group col-4 col-md-3 col-lg-2"> -->
                                <!-- call to database (dynamically) -->
                                <!-- <button type="button" class="buttonC border-0" @click="categoryId = 'baby', id = 'Baby Food'" data-toggle="modal" data-target="#itemsModal">
                                    <img class="buttonC" src="images/<?php echo($b["images"]); ?>" width="50" height="50" />
                                </button>
                                <div>
                                    <label class="justify-content-center pt-1">Baby Food</label>
                                </div>
                            </div>

                            <div class="form-group col-4 col-md-3 col-lg-2"> -->
                                <!-- call to database (dynamically) -->
                                <!-- <button type="button" class="buttonC border-0" @click="categoryId = 'non-perishables', id = 'Non-Perishables'" data-toggle="modal" data-target="#itemsModal">
                                    <img class="buttonC" src="images/<?php echo($non["images"]); ?>" width="50" height="50" />
                                </button>
                                <div>
                                    <label class="justify-content-center pt-1">Non-Perishables</label>
                                </div>
                            </div>
                            <div class="form-group col-4 col-md-3 col-lg-2">  -->
                                <!-- call to database (dynamically) -->
                                 <!-- <button type="button" class="buttonC border-0" @click="categoryId = 'beverages', id = 'Other Beverages'" data-toggle="modal" data-target="#itemsModal">
                                    <img class="buttonC" src="images/<?php echo($other["images"]); ?>" width="50" height="50" />
                                </button>
                                <div>
                                    <label class="justify-content-center pt-1">Other Beverages</label>
                                </div>
                            </div>
                        </div>
                    </div> -->
                    <!----------------------------------------------------------------------------------------------------------------------------------->
                    <!-- <div id="clothes" class="container tab-pane fade center"><br>
                        <div class="form-row">
                            <div class="form-group col-4 col-md-3 col-lg-2"> -->
                                <!-- call to database (dynamically) -->
                                 <!-- replace values of categoryId, id, src, label with values from the database   -->
                                <!-- <button type="button" class="buttonC border-0" @click="categoryId = 'tops', id = 'Tops'" data-toggle="modal" data-target="#itemsModal">
                                    <img class="buttonC" src="clothesImages/<?php echo($tops["images"]);?>" width="50" height="50" />
                                </button>
                                <div>
                                    <label class="justify-content-center pt-1">Tops</label>
                                </div>
                            </div>
                            <div class="form-group col-4 col-md-3 col-lg-2"> -->
                                <!-- call to database (dynamically) -->
                                 <!-- replace values of categoryId, id, src, label with values from the database   -->
                                <!-- <button type="button" class="buttonC border-0" @click="categoryId = 'tops', id = 'Tops'" data-toggle="modal" data-target="#itemsModal">
                                    <img class="buttonC" src="clothesImages/<?php echo($bots["images"]);?>" width="50" height="50" />
                                </button>
                                <div>
                                    <label class="justify-content-center pt-1">Bottoms</label>
                                </div>
                            </div>
                            <div class="form-group col-4 col-md-3 col-lg-2"> -->
                                <!-- call to database (dynamically) -->
                                 <!-- replace values of categoryId, id, src, label with values from the database   -->
                                <!-- <button type="button" class="buttonC border-0" @click="categoryId = 'tops', id = 'Tops'" data-toggle="modal" data-target="#itemsModal">
                                    <img class="buttonC" src="clothesImages/<?php echo($acc["images"]);?>" width="50" height="50" />
                                </button>
                                <div>
                                    <label class="justify-content-center pt-1">Accessories</label>
                                </div>
                            </div>
                            <div class="form-group col-4 col-md-3 col-lg-2"> -->
                                <!-- call to database (dynamically) -->
                                 <!-- replace values of categoryId, id, src, label with values from the database   -->
                                <!-- <button type="button" class="buttonC border-0" @click="categoryId = 'tops', id = 'Tops'" data-toggle="modal" data-target="#itemsModal">
                                    <img class="buttonC" src="clothesImages/<?php echo($out["images"]);?>" width="50" height="50" />
                                </button>
                                <div>
                                    <label class="justify-content-center pt-1">Outerwears</label>
                                </div>
                            </div>
                            <div class="form-group col-4 col-md-3 col-lg-2"> -->
                                <!-- call to database (dynamically) -->
                                 <!-- replace values of categoryId, id, src, label with values from the database   -->
                                <!-- <button type="button" class="buttonC border-0" @click="categoryId = 'tops', id = 'Tops'" data-toggle="modal" data-target="#itemsModal">
                                    <img class="buttonC" src="clothesImages/<?php echo($in["images"]);?>" width="50" height="50" />
                                </button>
                                <div>
                                    <label class="justify-content-center pt-1">Innerwears</label>
                                </div>
                            </div>
                            <div class="form-group col-4 col-md-3 col-lg-2"> -->
                                <!-- call to database (dynamically) -->
                                 <!-- replace values of categoryId, id, src, label with values from the database   -->
                                <!-- <button type="button" class="buttonC border-0" @click="categoryId = 'tops', id = 'Tops'" data-toggle="modal" data-target="#itemsModal">
                                    <img class="buttonC" src="clothesImages/<?php echo($one["images"]);?>" width="50" height="50" />
                                </button>
                                <div>
                                    <label class="justify-content-center pt-1">One piece</label>
                                </div>
                            </div>
                            <div class="form-group col-4 col-md-3 col-lg-2"> -->
                                <!-- call to database (dynamically) -->
                                 <!-- replace values of categoryId, id, src, label with values from the database   -->
                                <!-- <button type="button" class="buttonC border-0" @click="categoryId = 'tops', id = 'Tops'" data-toggle="modal" data-target="#itemsModal">
                                    <img class="buttonC" src="clothesImages/<?php echo($shoe["images"]);?>" width="50" height="50" />
                                </button>
                                <div>
                                    <label class="justify-content-center pt-1">Shoes</label>
                                </div>
                            </div> -->
                            <?php 
                            while($row = $stmt->fetch())
                            {
                            ?>

                            <?php
                            }
                            ?>
                        </div>
                    </div>
                    <!-------------------------------------------------------------------------------------------------------------------------------->
                    <div id="all" class="container tab-pane fade center"><br>
                        <div class="form-row">
                            <div class="form-group col-4 col-md-3 col-lg-3">
                                <!-- call to database (dynamically) -->
                                 <!-- replace values of categoryId, id, src, label with values from the database   -->
                                <button type="button" class="buttonC border-0" @click="categoryId = 'fruit', id = 'Fruit'" data-toggle="modal" data-target="#itemsModal">
                                    <img class="buttonC" src="images/<?php echo($f["images"]); ?>" 
                                     />

                                <button type="button" class="buttonC border-0" @click="categoryId = 'fruit', id = 'Fruit', image='Fruits.JPG'" data-toggle="modal" data-target="#itemsModal">
                                    <img class="buttonC" src="images/<?php echo($f["images"]); ?>" width="50" height="50" />
                                </button>
                                <div>
                                    <label class="justify-content-center pt-1">Fruit</label>
                                </div>
                            </div>
                            <div class="form-group col-4 col-md-3 col-lg-3">
                                <!-- call to database (dynamically) -->
                                <button type="button" class="buttonC border-0" @click="categoryId = 'veg', id = 'Vegetable & Legumes'" data-toggle="modal" data-target="#itemsModal2">
                                    <img class="buttonC" src="images/<?php echo($ve["images"]); ?>" width="50" height="50" />
                                </button>
                                <div>
                                    <label class="justify-content-center pt-1">Vegetables & Legumes</label>
                                </div>
                            </div>
                            <div class="form-group col-4 col-md-3 col-lg-3">
                                <!-- call to database (dynamically) -->
                                <button type="button" class="buttonC border-0" @click="categoryId = 'meat', id = 'Meat & Seafood'" data-toggle="modal" data-target="#itemsModal3">
                                    <img class="buttonC" src="images/<?php echo($m["images"]); ?>" width="50" height="50" />
                                </button>
                                <div>
                                    <label class="justify-content-center pt-1">Meat & Seafood</label>
                                </div>                                

                            </div>
                            <!-- PUT STUFF HERE -->
                            <div class="form-group col-4 col-md-3 col-lg-3">
                                 <!-- call to database (dynamically)  -->
                                <button type="button" class="buttonC border-0" @click="categoryId = 'diary', id = 'Diary'" data-toggle="modal" data-target="#itemsModal4">
                                    <img class="buttonC" src="images/<?php echo($d["images"]); ?>" width="50" height="50" />
                                </button>
                                <div>
                                    <label class="justify-content-center pt-1">Diary</label>
                                </div>
                            </div>
                            <div class="form-group col-4 col-md-3 col-lg-3">
                                <!-- call to database (dynamically) -->
                                <button type="button" class="buttonC border-0" @click="categoryId = 'grains', id = 'Grains'" data-toggle="modal" data-target="#itemsModal">
                                    <img class="buttonC" src="images/<?php echo($g["images"]); ?>" width="50" height="50" />
                                </button>
                                <div>
                                    <label class="justify-content-center pt-1">Grains</label>
                                </div>
                            </div>
                            <div class="form-group col-4 col-md-3 col-lg-3">
                                <!-- call to database (dynamically) -->
                                <button type="button" class="buttonC border-0" @click="categoryId = 'juice', id = 'Water & Juice'" data-toggle="modal" data-target="#itemsModal">
                                    <img class="buttonC" src="images/<?php echo($wa["images"]); ?>" width="50" height="50" />
                                </button>
                                <div>
                                    <label class="justify-content-center pt-1">Water & Juice</label>
                                </div>
                            </div>
                            <div class="form-group col-4 col-md-3 col-lg-3">
                                <!-- call to database (dynamically) -->
                                <button type="button" class="buttonC border-0" @click="categoryId = 'eggs', id = 'Eggs & Soy'" data-toggle="modal" data-target="#itemsModal">
                                    <img class="buttonC" src="images/<?php echo($e["images"]); ?>" width="50" height="50" />
                                </button>
                                <div>
                                    <label class="justify-content-center pt-1">Eggs & Soy</label>
                                </div>
                            </div>
                            <div class="form-group col-4 col-md-3 col-lg-3">
                                <!-- call to database (dynamically) -->
                                <button type="button" class="buttonC border-0" @click="categoryId = 'condiments', id = 'Sauce & Condiments'" data-toggle="modal" data-target="#itemsModal">
                                    <img class="buttonC" src="images/<?php echo($c["images"]); ?>" width="50" height="50" />
                                </button>
                                <div>
                                    <label class="justify-content-center pt-1">Sauce & Condiments</label>
                                </div>
                            </div>
                            <div class="form-group col-4 col-md-3 col-lg-3">
                                <!-- call to database (dynamically) -->
                                <button type="button" class="buttonC border-0" @click="categoryId = 'snacks', id = 'Baked Goods & Snacks'" data-toggle="modal" data-target="#itemsModal">
                                    <img class="buttonC" src="images/<?php echo($sna["images"]); ?>" width="50" height="50" />
                                </button>
                                <div>
                                    <label class="justify-content-center pt-1">Baked Goods & Snacks</label>
                                </div>
                            </div>
                            <div class="form-group col-4 col-md-3 col-lg-3">
                                <!-- call to database (dynamically) -->
                                <button type="button" class="buttonC border-0" @click="categoryId = 'baby', id = 'Baby Food'" data-toggle="modal" data-target="#itemsModal">
                                    <img class="buttonC" src="images/<?php echo($b["images"]); ?>" width="50" height="50" />
                                </button>
                                <div>
                                    <label class="justify-content-center pt-1">Baby Food</label>
                                </div>
                            </div>
                            <div class="form-group col-4 col-md-3 col-lg-3">
                                <!-- call to database (dynamically) -->
                                <button type="button" class="buttonC border-0" @click="categoryId = 'non-perishables', id = 'Non-Perishables'" data-toggle="modal" data-target="#itemsModal">
                                    <img class="buttonC" src="images/<?php echo($non["images"]); ?>" width="50" height="50" />
                                </button>
                                <div>
                                    <label class="justify-content-center pt-1">Non-Perishables</label>
                                </div>
                            </div>
                            <div class="form-group col-4 col-md-3 col-lg-3"> 
                                <!-- call to database (dynamically) -->
                                 <button type="button" class="buttonC border-0" @click="categoryId = 'beverages', id = 'Other Beverages'" data-toggle="modal" data-target="#itemsModal">
                                    <img class="buttonC" src="images/<?php echo($other["images"]); ?>" width="50" height="50" />
                                </button>
                                <div>
                                    <label class="justify-content-center pt-1">Other Beverages</label>
                                </div>
                            </div>
                            <div class="form-group col-4 col-md-3 col-lg-2">
                                <!-- call to database (dynamically) -->
                                 <!-- replace values of categoryId, id, src, label with values from the database   -->
                                <button type="button" class="buttonC border-0" @click="categoryId = 'tops', id = 'Tops'" data-toggle="modal" data-target="#itemsModal">
                                    <img class="buttonC" src="clothesImages/<?php echo($tops["images"]);?>" width="50" height="50" />
                                </button>
                                <div>
                                    <label class="justify-content-center pt-1">Tops</label>
                                </div>
                            </div>
                            <div class="form-group col-4 col-md-3 col-lg-2">
                                <!-- call to database (dynamically) -->
                                 <!-- replace values of categoryId, id, src, label with values from the database   -->
                                <button type="button" class="buttonC border-0" @click="categoryId = 'tops', id = 'Tops'" data-toggle="modal" data-target="#itemsModal">
                                    <img class="buttonC" src="clothesImages/<?php echo($bots["images"]);?>" width="50" height="50" />
                                </button>
                                <div>
                                    <label class="justify-content-center pt-1">Bottoms</label>
                                </div>
                            </div>
                            <div class="form-group col-4 col-md-3 col-lg-2">
                                <!-- call to database (dynamically) -->
                                 <!-- replace values of categoryId, id, src, label with values from the database   -->
                                <button type="button" class="buttonC border-0" @click="categoryId = 'tops', id = 'Tops'" data-toggle="modal" data-target="#itemsModal">
                                    <img class="buttonC" src="clothesImages/<?php echo($acc["images"]);?>" width="50" height="50" />
                                </button>
                                <div>
                                    <label class="justify-content-center pt-1">Accessories</label>
                                </div>
                            </div>
                            <div class="form-group col-4 col-md-3 col-lg-2">
                                <!-- call to database (dynamically) -->
                                 <!-- replace values of categoryId, id, src, label with values from the database   -->
                                <button type="button" class="buttonC border-0" @click="categoryId = 'tops', id = 'Tops'" data-toggle="modal" data-target="#itemsModal">
                                    <img class="buttonC" src="clothesImages/<?php echo($out["images"]);?>" width="50" height="50" />
                                </button>
                                <div>
                                    <label class="justify-content-center pt-1">Outerwears</label>
                                </div>
                            </div>
                            <div class="form-group col-4 col-md-3 col-lg-2">
                                <!-- call to database (dynamically) -->
                                 <!-- replace values of categoryId, id, src, label with values from the database   -->
                                <button type="button" class="buttonC border-0" @click="categoryId = 'tops', id = 'Tops'" data-toggle="modal" data-target="#itemsModal">
                                    <img class="buttonC" src="clothesImages/<?php echo($in["images"]);?>" width="50" height="50" />
                                </button>
                                <div>
                                    <label class="justify-content-center pt-1">Innerwears</label>
                                </div>
                            </div>
                            <div class="form-group col-4 col-md-3 col-lg-2">
                                <!-- call to database (dynamically) -->
                                 <!-- replace values of categoryId, id, src, label with values from the database   -->
                                <button type="button" class="buttonC border-0" @click="categoryId = 'tops', id = 'Tops'" data-toggle="modal" data-target="#itemsModal">
                                    <img class="buttonC" src="clothesImages/<?php echo($one["images"]);?>" width="50" height="50" />
                                </button>
                                <div>
                                    <label class="justify-content-center pt-1">One piece</label>
                                </div>
                            </div>
                            <div class="form-group col-4 col-md-3 col-lg-2">
                                <!-- call to database (dynamically) -->
                                 <!-- replace values of categoryId, id, src, label with values from the database   -->
                                <button type="button" class="buttonC border-0" @click="categoryId = 'tops', id = 'Tops'" data-toggle="modal" data-target="#itemsModal">
                                    <img class="buttonC" src="clothesImages/<?php echo($shoe["images"]);?>" width="50" height="50" />
                                </button>
                                <div>
                                    <label class="justify-content-center pt-1">Shoes</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Modal -->
                    <div class="modal fade" id="itemsModal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modalLabel">{{id}}</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <img class="buttonCA" src="images/Fruits.JPG" width="100" height="100" />
                                        <label for="item">Item</label>
                                        <input type="text" name="item" id="widthPop" class="form-control" v-model="name" id="item">
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
                    <div class="modal fade" id="itemsModal2" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modalLabel">{{id}}</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <img class="buttonCA" src="images/<?php echo($ve["images"]); ?>" width="100" height="100" />
                                        <label for="item">Item</label>
                                        <input type="text" name="item" id="widthPop" class="form-control" v-model="name" id="item">
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
                    <div class="modal fade" id="itemsModal3" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modalLabel">{{id}}</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <img class="buttonCA" src="images/<?php echo($m["images"]); ?>" width="100" height="100" />
                                        <label for="item">Item</label>
                                        <input type="text" name="item" id="widthPop" class="form-control" v-model="name" id="item">
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
                    <div class="modal fade" id="itemsModal4" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modalLabel">{{id}}</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <img class="buttonCA" src="images/<?php echo($d["images"]); ?>" width="100" height="100" />
                                        <label for="item">Item</label>
                                        <input type="text" name="item" id="widthPop" class="form-control" v-model="name" id="item">
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
                    <section id="summary">
                        <div class="form-row" v-for="item, index in items">
                            <div class="form-group col-8 col-md-6 pb-4">
                                <label for="items">Item</label>
                                <input v-model.lazy="item.name" type="text" name="item" class="form-control" id="items">
                            </div>
                            <div class="form-group col-2 col-md-2">
                                <label for=" qty">Quantity</label>
                                <input type="text" name="quantity" v-model.lazy.number="item.quantity" id="qty" class="form-control">
                            </div>
                            <button class="border-0" type="button" @click="remove(index)">
                                <i class="fas fa-trash-alt pb-3"></i>
                            </button>
                        </div>
                    </section>
                    <div class="center pt-4">
                        <input type="submit" @click="parse" value="Confirm" class="col-8 col-sm-8 col-md-4 btn btn-primary m-auto mybuttonstyle btn-lg pt-3 pb-3" />
                    </div>
            </form>
        </section>
<!--         <footer class="page-footer text-center pb-4">
            <div class="icons mt-4">
                <i class="fab fa-twitter pr-2"></i>
                <i class="fab fa-facebook-f pr-2"></i>
            </div>
        </footer> -->
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