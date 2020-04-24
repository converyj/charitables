<?php

session_start();

//perform database actions
include_once("../../charitables_dbconfig.php");

$stmt = $pdo->prepare("
						SELECT DISTINCT `a`.`organization_name`, `b`.`organization_name` AS nonprofit, `needs`.`item` 
						FROM `Users` a INNER JOIN `Food` on `a`.`id` = `Food`.`id` INNER JOIN `FoodNeeds` needs on `Food`.`item` = `needs`.`item` INNER JOIN `Users` b ON `needs`.`id` = `b`.`id` "); 

$stmt->execute();

$messages = array(); 

while ($row = $stmt->fetch()) {

array_push($messages, $row['organization_name'] . ' ' . 'has ' . $row['item'] . ' for ' .  $row['nonprofit']); 
}

// return json_encode($messages);
return print_r($messages);

// if ($row) {
//     echo('{ 
//     "notify-success":"true"
//   }');
// } else {
//     echo('{ 
//     "notify-fail":"true"
//   }');
// }








 