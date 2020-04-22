<?php

session_start();

//perform database insert using form values;
include_once("../../charitables_dbconfig.php");

// object array 
$items = $_POST['items'];

// get company id of logged in user to insert into table 
$id = $_SESSION['id'];

// get the role of the logged in user 
$role = $_SESSION['role'];

// decode JSON array 
$data = json_decode($items);

$i = 0; 
// loop through the array and insert into table - accessing it as objects 
foreach ($data as $item) {
    $category = $data[$i]->category;
    $name = $data[$i]->name;
    $quantity = $data[$i]->quantity;
    $type = $data[$i]->type; 

    $insert = inserts($pdo, $role, $id, $category, $name, $quantity, $type); 

    $i++;
}

if ($insert) {
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




 