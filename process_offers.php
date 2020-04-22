<?php

session_start();

if (!isset($_SESSION['role'])) {
	header("Location: home.php");
	exit();
}
// if role is business, redirect to connect
if ($_SESSION['role'] == '1') {
	header("Location: connect.php");
	exit();
}

// the id of the person that was clicked 
$businessId = $_SESSION["chosenId"];
// the currently logged in id 
$id = $_SESSION["id"];

include_once("../../charitables_dbconfig.php");

// check if any checkboxes are checked
if (!empty($_POST["requests"])) {
	$matches = $_POST["requests"];
	// if one or more was checked, loop through checkboxes and insert row in Offers
	if (count($matches > 0)) {
		foreach ($matches as $key => $match) {
			$index1 = $matches[$key];
			// strpos (:int) - (string, needle) finds the first occurrence of whitespace in string 
			$wpos = strpos($index1, " ");
			$offerId = substr($index1, 0, $wpos);
			// substr - find part of string (string, start, length)
			$type = substr($index1, $wpos + 1);

			$stmt = $pdo->prepare("INSERT INTO `Offers` (`id`, `matchedId`, `offerId`, `type`) VALUES ($id, $businessId, $offerId, '$type')");

			$i = $stmt->execute();
			// check whether insert was unsuccessful (redirect to error page), otherwise continue
			if ($i == 0) {
				exit();
			}

			// delete business's record based on type and offerId 
			if ($type == 'f') { // Food
				$stmt = $pdo->prepare("INSERT INTO `PendingOffers` (`offerId`, `category`, `item`, `quantity`, `type`) 
												SELECT `donationId`, `food`.`category`, `item`, `quantity`, `type`
												FROM `Food` AS food INNER JOIN `FoodImages` AS foodImg
												ON `food`.`category` = `foodImg`.`id` 
												WHERE `donationId` = $offerId");
				$i = $stmt->execute();

				// check whether insert was unsuccessful (redirect to error page), otherwise continue
				if ($i  == 1) {
					$stmt = $pdo->prepare("DELETE FROM `Food` 
									WHERE `donationId` = '$offerId' ");

					$i = $stmt->execute();

					// check whether insert was unsuccessful (redirect to error page), otherwise continue
					if ($i  == 0) {
						exit();
					}
				}
			}

			if ($type == "c") {
				$stmt = $pdo->prepare("INSERT INTO `PendingOffers` (`offerId`, `category`, `item`, `quantity`, `type`) 
												SELECT `donationId`, `clothes`.`category`, `item`, `quantity`, `type`
												FROM `Clothes` AS clothes INNER JOIN `ClothesImages` AS clothesImg
												ON `clothes`.`category` = `clothesImg`.`id` 
												WHERE `donationId` = $offerId");
				$i = $stmt->execute();

				// check whether insert was unsuccessful (redirect to error page), otherwise continue
				if ($i  == 1) {
					$stmt = $pdo->prepare("DELETE FROM `Clothes` 
									WHERE `donationId` = '$offerId' ");

					$i = $stmt->execute();

					// check whether insert was unsuccessful (redirect to error page), otherwise continue
					if ($i  == 0) {
						exit();
					}
				}
			}
		} // end of loop 
		header("Location: connect.php");
	}
}
