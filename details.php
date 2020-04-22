<?php
session_start();
$id = $_GET['id'];
$_SESSION['chosenId'] = $id;

if (!isset($_SESSION['role'])) {
    header("Location: home.php");
    exit();
}

include_once("../../charitables_dbconfig.php");

// get the user role and information  
$stmt = $pdo->prepare("SELECT `fname`, `lname`, `organization_name`, `email`, `address`, `city`, `state`, `postal_code`, `role` 
FROM `Users` 
WHERE `id` = '$id' ");

$stmt->execute();

$row = $stmt->fetch();

$chosenRole = $row['role'];
$_SESSION['chosenEmail'] = $row['email'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Details | Charitables</title>
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
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD5TfqRaeXmKpUbcGKd5vQbHS4bqj8qHkU"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <style>
        #mapid {
            height: 425px;
        }
    </style>
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
                <button type="button" class="list-group-item list-group-item-action btn-outline-secondary active" id="blueBtn-secondary">
                    <a href="dashboard.php" class="aWhite">Dashboard</a>
                </button>
                <button type="button" class="list-group-item list-group-item-action roundCornersMenuRight">
                    <a href="offer.php" class="aBlack">Offers</a>
                </button>
            </div>
            <div class="list-group-horizontal">
                <h3 class="text-left aBlack"><?php echo ($row['organization_name']); ?></h3>
                <h5 class="text-left aBlack pb-2"><?php echo ($row['fname']); ?> <?php echo ($row['lname']); ?></h5>

                <form action="process_offers.php" method="POST">
                    <!-- call to database (dynamically) -->
                    <div id="roundCornersTop" class="container list-group-item list-group-item-action">
                        <?php
                        if ($chosenRole == '1') { // Businesses 
                            getBusinessDetails($pdo, $id);
                        } else {
                            getNonProfitDetails($pdo, $id);
                        }
                        ?>
                    </div>
                    <div class="list-group-item text-center">
                        <div>
                            <?php echo ($row['address']) ?>
                        </div>
                        <div>
                            <?php echo ($row['city']) ?>,
                            <?php echo ($row['state']) ?>,
                            <?php echo ($row['postal_code']) ?></div>
                    </div>
                    <div id="mapid" class="map-responsive"></div>
                    <div class="text-center">
                        <br>
                        <div class="row">
                            <input type="submit" value="Confirm & Connect" class="col-9 col-md-8 col-sm-8 btn btn-primary m-auto mybuttonstyle" />
                        </div>
                    </div>
                    <script>
                        var id = '<?= $id ?>';
                    </script>
                </form>
        </section>
        <footer class="page-footer text-center pb-4">
            <div class="icons mt-4">
                <i class="fab fa-twitter pr-2"></i>
                <i class="fab fa-facebook-f pr-2"></i>
            </div>
        </footer>
    </main>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="js/details.js"></script>
    <!-- <script src="js/LocationByGeoCode.js"></script> -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
</body>

</html>

<?php
// chosen role and selected id 
function getBusinessDetails($pdo, $id)
{
    // get the businesses food 
    $d1 = $pdo->prepare("SELECT `donationId`, `type`, `foodImg`.`category`, `item`, `quantity`
    FROM `Food` AS food INNER JOIN `FoodImages` AS foodImg
    ON `food`.`category` = `foodImg`.`id`
    WHERE `food`.`id` = '$id' ORDER BY `food`.`category` ");
    $d1->execute();

    // get the businesses clothes
    $d2 = $pdo->prepare("SELECT `donationId`, `type`, `clothesImg`.`category`, `item`, `quantity`
        FROM `Clothes` AS clothes INNER JOIN `ClothesImages` AS clothesImg
        ON `clothes`.`category` = `clothesImg`.`id`
        WHERE `clothes`.`id` = '$id' ORDER BY `clothes`.`category` ");
    $d2->execute();

    $numRows = 0;
    $category = null;
    ?>
    <div class="row">
        <?php
        // businesses with food 
        while ($row = $d1->fetch()) {

            if ($numRows == 0) {
                ?>
                <div class="col">
                    <h5>Food</h5>
                    <?php
                    $numRows++;
                    ?>
                </div>
            <?php
        }
        if ($category != $row['category']) {
            ?>
                <div class="w-100"></div>
                <div class="col">
                    <h6><?php echo ($row['category']) ?></h6>
                    <?php
                    $category = $row['category']; ?>
                </div>
                <div class="col">
                    <h6>Quantity:</h6>
                </div>
            <?php
        } ?>
            <div class="w-100"></div>
            <div class="col">
                <div class="form-check checkbox-md">
                    <input type="checkbox" class="form-check-input" id="<?php echo ($row['item']) ?>" value="<?php echo ($row['donationId']) ?> <?php echo ($row['type']) ?>" name="requests[]">
                    <label class="form-check-label" for="<?php echo ($row['item']) ?>"><?php echo ($row['item']) ?></label>
                </div>
            </div>
            <div class="col">
                <?php echo ($row['quantity']) ?>
            </div>
        <?php
    } ?>
    </div>

    <?php
    $numRows = 0;
    $category = null;
    ?>
    <div class="row">
        <?php
        // businesses with clothes 
        while ($row = $d2->fetch()) {

            if ($numRows == 0) {
                ?>
                <div class="col">
                    <h5>Clothes</h5>
                    <?php
                    $numRows++;
                    ?>
                </div>
            <?php
        }
        if ($category != $row['category']) {
            ?>
                <div class="w-100"></div>
                <div class="col">
                    <h6><?php echo ($row['category']) ?></h6>
                    <?php
                    $category = $row['category']; ?>
                </div>
                <div class="col">
                    <h6>Quantity:</h6>
                </div>
            <?php
        } ?>
            <div class="w-100"></div>
            <div class="col">
                <div class="form-check checkbox-md">
                    <input type="checkbox" class="form-check-input" id="<?php echo ($row['item']) ?>" value="<?php echo ($row['donationId']) ?> <?php echo ($row['type']) ?>" name="requests[]">
                    <label class="form-check-label" for="<?php echo ($row['item']) ?>"><?php echo ($row['item']) ?></label>
                </div>
            </div>
            <div class="col">
                <?php echo ($row['quantity']) ?>
            </div>
        <?php
    } ?>
    </div>
<?php
}
// chosen role and selected id 
function getNonProfitDetails($pdo, $id)
{
    // get the nonprofits food 
    $r1 = $pdo->prepare("SELECT `type`, `foodImg`.`category`, `item`, `quantity`
    FROM `FoodNeeds` AS food INNER JOIN `FoodImages` AS foodImg
    ON `food`.`category` = `foodImg`.`id`
    WHERE `food`.`id` = '$id' ORDER BY `food`.`category` ");
    $r1->execute();

    // get the nonprofits clothes
    $r2 = $pdo->prepare("SELECT `type`, `clothesImg`.`category`, `item`, `quantity`
        FROM `ClothesNeeds` AS clothes INNER JOIN `ClothesImages` AS clothesImg
        ON `clothes`.`category` = `clothesImg`.`id`
        WHERE `clothes`.`id` = '$id' ORDER BY `clothes`.`category` ");
    $r2->execute();


    $numRows = 0;
    $category = null;
    ?>
    <div class="row">
        <?php
        // nonprofits with food 
        while ($row = $r1->fetch()) {
            if ($numRows == 0) {
                ?>
                <div class="col">
                    <h5>Food</h5>
                    <?php
                    $numRows++;
                    ?>
                </div>
            <?php
        }
        if ($category != $row['category']) {
            ?>
                <div class="w-100"></div>
                <div class="col">
                    <h6><?php echo ($row['category']) ?></h6>
                    <?php
                    $category = $row['category']; ?>
                </div>
                <div class="col">
                    <h6>Quantity:</h6>
                </div>
            <?php
        } ?>
            <div class="w-100"></div>
            <div class="col">
                <div class="form-check checkbox-md">
                    <input type="checkbox" class="form-check-input" id="<?php echo ($row['item']) ?>" value="<?php echo ($row['item']) ?> <?php echo ($row['type']) ?> <?php echo ($row['category']) ?> <?php echo ($row['quantity']) ?>" name="requests[]">
                    <label class="form-check-label" for="<?php echo ($row['item']) ?>"><?php echo ($row['item']) ?></label>
                </div>
            </div>
            <div class="col">
                <?php echo ($row['quantity']) ?>
            </div>
        <?php
    } ?>
    </div>

    <?php
    $numRows = 0;
    $category = null;
    ?>
    <div class="row">
        <?php
        // nonprofits with clothes 
        while ($row = $r2->fetch()) {
            if ($numRows == 0) {
                ?>
                <div class="col">
                    <h5>Clothes</h5>
                    <?php
                    $numRows++;
                    ?>
                </div>
            <?php
        }
        if ($category != $row['category']) {
            ?>
                <div class="w-100"></div>
                <div class="col">
                    <h6><?php echo ($row['category']) ?></h6>
                    <?php
                    $category = $row['category']; ?>
                </div>
                <div class="col">
                    <h6>Quantity:</h6>
                </div>
            <?php
        } ?>
            <div class="w-100"></div>
            <div class="col">
                <div class="form-check checkbox-md">
                    <input type="checkbox" class="form-check-input" id="<?php echo ($row['item']) ?>" value="<?php echo ($row['item']) ?> <?php echo ($row['type']) ?> <?php echo ($row['category']) ?> <?php echo ($row['quantity']) ?>" name="requests[]">
                    <label class="form-check-label" for="<?php echo ($row['item']) ?>"><?php echo ($row['item']) ?></label>
                </div>
            </div>
            <div class="col">
                <?php echo ($row['quantity']) ?>
            </div>
        <?php
    } ?>
    </div>
<?php
}
?>