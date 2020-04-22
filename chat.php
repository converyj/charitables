<?php

session_start();

if (!isset($_SESSION['role'])) {
	header("Location: home.php");
	exit();
}
// retrieve the current user id
$id = $_SESSION['id'];
$matchedId = $_SESSION['matchedId'];

include_once("../../charitables_dbconfig.php");

// SELECT the current user logged in
$stmt2 = $pdo->prepare("SELECT DISTINCT `matchedId`, `users`.`fname`,`users`.`lname`
  FROM `Offers` AS offer INNER JOIN `Users` AS users ON `users`.`id` = `offer`.`matchedId`
  WHERE `offer`.`id` = '$id'");

$stmt2->execute();

$stmt = $pdo->prepare("SELECT `fname`, `lname`
                    FROM `Users`
					WHERE `id` = '$id' ");

$stmt->execute();

$row = $stmt->fetch();

?>

<!DOCTYPE html>
<html>


<head>
	<meta charset="utf-8">
	<title>Chat | Charitables</title>
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon" />
	<link href="css/normalize.css" rel="stylesheet">
	<script src="http://d309knd7es5f10.cloudfront.net/zimcode_1.4.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/1.7.3/socket.io.js"></script>
	<script src="http://d309knd7es5f10.cloudfront.net/zimserver_urls.js"></script>
	<script src="http://d309knd7es5f10.cloudfront.net/zimsocket_1.0.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
	<link src="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900|Oswald" rel="stylesheet">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<link href="css/chat.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">
	<link href="css/media-queries.css" rel="stylesheet">
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
		<section class="container text-center" id='example-3'>
			<?php
			if ($_SESSION['role'] == 2) {
				?>

				<?php
				// get matchedIds
				while ($row2 = $stmt2->fetch()) {
					?>
					<input class="radio" name="pick" type="radio" id="<?php echo ($row2['matchedId']); ?>" value="<?php echo ($row2['fname']); ?>" v-model="picked">
					<label for="<?php echo ($row2['matchedId']); ?>"><?php echo ($row2['fname']); ?> <?php echo ($row2['lname']); ?></label>

				<?php
			}
			?>
				<br>

				<!-- call to database (dynamically) -->

				<!--  current User_Name need to be fetched here from DATABASE USING PHP here-->
				<h3 class="aBlack"><?php echo $row['fname'] ?> <?php echo $row['lname'] ?></h3>
				<hr>
				<!-- Random value="abc" is assigned for the room-->
				<input type=text id="room" value="4" /><br />
				<!--  current User_Name need to be fetched here from DATABASE USING PHP here-->
				NAME: <input type=text id=name value="<?php echo $row['fname'] ?> <?php echo $row['lname'] ?>" placeholder="<?php echo $row['fname'] ?> <?php echo $row['lname'] ?>" disabled />

				<br />
				<a id="join" class="button" onclick="doJoin(); return false;">Join Chat</a>
				<br /><br />
				<div id="messages" class="col-10 col-sm-10 col-md-6 col-lg-6 col-xl-6 justify-content-center m-auto"></div>

				<input type=text id=message class="col-10 col-sm-10 col-md-6 col-lg-6 col-xl-6 " placeholder="Your Message" />
				<br />

				<a class="col-6 col-sm-6 col-md-6 col-lg-3 col-xl-3 btn sonar-btn btn-primary m-auto mybuttonstyle" onclick="doSend(); return false;">SEND</a>
				</div>
			<?php
		} else {
			?>
				<div class="container text-center" id='example-3'>



					<!-- call to database (dynamically) -->

					<!--  current User_Name need to be fetched here from DATABASE USING PHP here-->
					<h3 class="aBlack"><?php echo $row['fname'] ?> <?php echo $row['lname'] ?></h3>
					<hr>
					<!-- Random value="abc" is assigned for the room-->
					<input type=text id="room" value="4" /><br />
					<!--  current User_Name need to be fetched here from DATABASE USING PHP here-->
					NAME: <input type=text id=name value="<?php echo $row['fname'] ?> <?php echo $row['lname'] ?>" placeholder="<?php echo $row['fname'] ?> <?php echo $row['lname'] ?>" disabled />
					<br />
					<a id="join" class="button" onclick="doJoin(); return false;">Join Chat</a>
					<br /><br />
					<div id="messages" class="col-10 col-sm-10 col-md-6 col-lg-6 col-xl-6 justify-content-center m-auto"></div>

					<input type=text id=message class="col-10 col-sm-10 col-md-6 col-lg-6 col-xl-6 " placeholder="Your Message" />
					<br />

					<a class="col-6 col-sm-6 col-md-6 col-lg-3 col-xl-3 btn sonar-btn btn-primary m-auto mybuttonstyle" onclick="doSend(); return false;">SEND</a>

				</div>
			<?php
		}
		?>
			</div>
			</div>

			</div>
		</section>
	</main>

	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="js/chat.js"></script>


</body>

</html>