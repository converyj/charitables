<?php

session_start();

$id = $_SESSION['id'];

if (!isset($_SESSION['role'])) {
    header("Location: home.php");
    exit();
}

include_once("../../charitables_dbconfig.php");

// SELECT the businesses information based on the matchedid for the current user 
$stmt = $pdo->prepare("
                    SELECT `id`, `organization_name`, `fname`, `lname`, `address`, `city`, `state` 
                    FROM `Users`
                    WHERE `id` IN
                                    (SELECT `matchedId` 
                                    FROM `Offers`
                                    WHERE `id` = '$id'); ");
$stmt->execute();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Offers | Charitables</title>
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
        <section class="container" id="app">
            <div class="d-flex mr-2 mb-4 mt-4 ml-2 justify-content-center">
                <button type="button" class="list-group-item list-group-item-action roundCornersMenuLeft">
                    <a href="form.php" class="aBlack">Form</a>
                </button>
                <button type="button" class="list-group-item list-group-item-action">
                    <a href="dashboard.php" class="aBlack">Dashboard</a>
                </button>
                <button type="button" class="list-group-item list-group-item-action active btn-outline-secondary roundCornersMenuRight" id="blueBtn-secondary">
                    <a href=" offer.php" class="aWhite">Offers</a>
                </button>
            </div>
            <div class="list-group-horizontal">
                <h3 class="text-left">Current</h3>
                <div class="container">
                    <div class="row">
                        <!-- the whole list -->
                        <div class="wrapper list-group-horizontal">
                            <?php
                            while ($row = $stmt->fetch()) {
                                ?>
                                <!-- call to database (dynamically) -->
                                <div class="list-group-item list-group-item-action col-12 col-sm-12 col-md-6 roundCornersAll">
                                    <div id="container-1">
                                        <h3 class="text-left"><?php echo ($row['organization_name']); ?></h3>
                                        <h4 class="text-left"><?php echo ($row['fname']); ?> <?php echo ($row['lname']); ?></h4>
                                        <p class="text-left"><?php echo ($row['address']); ?> <?php echo ($row['city']); ?> <?php echo ($row['state']); ?></p>
                                        <?php
                                        $matchedId = $row['id'];
                                        getDetails($pdo, $id, $matchedId);
                                        ?>
                                    </div>
                                </div>

                                <!-- buttons -->
                                <div id="container-2" class="col-1 float-right addPadding">
                                    <button type="button">
                                        <i class="far fa-check-circle fa-2x"></i>
                                    </button>
                                    <button type="button">
                                        <i class="far fa-times-circle fa-2x"></i>
                                    </button>
                                </div>
                                <div id="view-more">
                                    <button @click="hideShow" class="btn btn-primary mybuttonstyle col-5 col-sm-5 col-md-4 mt-3" data-toggle="collapse">{{text}}</button>
                                </div>
                            </div>
                        <?php
                    }
                    ?>
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
</body>

</html>

<?php
function getDetails($pdo, $id, $matchedId)
{
    // SELECT all food categories from Offers 
    $d1 = $pdo->prepare("
                          SELECT `foodImg`.`category`, `item`, `quantity`
                          FROM `Offers` AS offers INNER JOIN `PendingOffers` AS pending
                          ON `offers`.`offerId` = `pending`.`offerId` AND `offers`.`type` = `pending`.`type` INNER JOIN `FoodImages` AS foodImg 
                          ON `pending`.`category` = `foodImg`.`id`
                          WHERE `offers`.`id` = '$id' AND `offers`.`matchedId` = '$matchedId' AND `offers`.`type` = 'f' ORDER BY `category` ");
    $d1->execute();

    // SELECT all clothes categories from Offers 
    $d2 = $pdo->prepare("
                          SELECT `clothesImg`.`category`, `item`, `quantity`
                          FROM `Offers` AS offers INNER JOIN `PendingOffers` AS pending
                          ON `offers`.`offerId` = `pending`.`offerId` AND `offers`.`type` = `pending`.`type` INNER JOIN `ClothesImages` AS clothesImg 
                          ON `pending`.`category` = `clothesImg`.`id`
                          WHERE `offers`.`id` = '$id' AND `offers`.`matchedId` = '$matchedId' AND `offers`.`type` = 'c' ORDER BY `category` ");
    $d2->execute();
    ?>
    <div id="content1" class="float-left text-left row content" :class=" { hideContent: isHidden, showContent: isShown } ">
        <?php
        $numRows = 0;
        $category = null;
        while ($row = $d1->fetch()) {
            if ($numRows == 0) {
                ?>
                <h5 class="col-4">Food</h5>
                <?php
                $numRows++;
            }
            if ($category != $row['category']) {
                ?>
                <div class="w-100"></div>
                <div class="col-4">
                    <h6><?php echo ($row['category']) ?></h6>
                    <?php
                    $category = $row['category']; ?>
                </div>
                <div class="col-4">
                    <h6>Quantity:</h6>
                </div>
            <?php
        } ?>
            <div class="w-100"></div>
            <div class="col-4">
                <ul>
                    <li><?php echo ($row['item']) ?></li>
                </ul>
            </div>
            <div class="col-4">
                <?php echo ($row['quantity']) ?>
            </div>
        <?php
    }
    $numRows = 0;
    $category = null;

    while ($row = $d2->fetch()) {
        ?>
            <div class="w-100"></div>
            <?php
            if ($numRows == 0) {
                ?>
                <h5 class="col-4">Clothes</h5>
                <?php
                $numRows++;
            }
            if ($category != $row['category']) {
                ?>
                <div class="w-100"></div>
                <div class="col-4">
                    <h6><?php echo ($row['category']) ?></h6>
                    <?php
                    $category = $row['category']; ?>
                </div>
                <div class="col-4">
                    <h6>Quantity:</h6>
                </div>
            <?php
        } ?>
            <div class="w-100"></div>
            <div class="col-4">
                <ul>
                    <li><?php echo ($row['item']) ?></li>
                </ul>
            </div>
            <div class="col-4">
                <?php echo ($row['quantity']) ?>
            </div>
        <?php
    }
}
?>