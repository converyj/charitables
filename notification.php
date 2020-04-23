<?php

session_start();

//perform database actions
include_once("../../charitables_dbconfig.php");

$stmt = $pdo->prepare("
						SELECT `users`.`organization_name`, `users`.`role`, `city`, `quantity` FROM `Users` AS users INNER JOIN `Food` on `users`.`id` = `Food`.`id` UNION ALL SELECT `organization_name`, `role`, `city`, `quantity` FROM `Users` INNER JOIN `FoodNeeds` AS needs ON `Users`.`id` = `needs`.`id` WHERE `needs`.`item` IN (SELECT `item` from `Food`) AND `needs`.`quantity` IN (SELECT `quantity` from `Food`); "); 

$stmt->execute();

while ($row = $stmt->fetch()) {
	if ($row['role'] == '2') {
		$nonprofits = COUNT($row['organization_name']) 
	}
	else {
		$businesses = COUNT($row['organization_name'])

	}
}

return $message = $nonprofits . ' ' . 'matched with ' . $businesses . ' ' . 'businesses'

if ($row) {
    echo('{ 
    "success":"true"
  }');
} else {
    echo('{ 
    "fail":"true"
  }');
}

function inserts($pdo, $role, $id, $category, $name, $quantity, $type) {
    if ($role == '1') { // Businesses
        if ($type == 'f') {
            $stmt = $pdo->prepare("INSERT INTO `Food` (`id`, `category`, `item`, `quantity`) VALUES ('$id', '$category', '$name', '$quantity'); ");
        } else { // type is clothes
            $stmt = $pdo->prepare("INSERT INTO `Clothes` (`id`, `category`, `item`, `quantity`) VALUES ('$id', '$category', '$name', '$quantity'); ");
        }
    } else { // Non-Profits 
        if ($type == 'f') {
            $stmt = $pdo->prepare("INSERT INTO `FoodNeeds` (`id`, `category`, `item`, `quantity`) VALUES ('$id', '$category', '$name', '$quantity'); ");
        } else {
            $stmt = $pdo->prepare("INSERT INTO `ClothesNeeds` (`id`, `category`, `item`, `quantity`) VALUES ('$id', '$category', '$name', '$quantity'); ");
        }
    }

    $i = $stmt->execute();

    if ($i == 1) {
        $insert = true;
    } else {
        $insert = false;
    }

    return $insert; 
}




 