<?php

$id = $_GET['id'];
echo ($id);
echo ("heftor");

$dsn = "mysql:host=localhost;dbname=browne9_Charitables;charset=utf8mb4";
$dbusername = "browne9_weedsite";
$dbpassword = "g@5o4nFUJ7ha";
echo ("before statement");

$pdo = new PDO($dsn, $dbusername, $dbpassword);
echo ("statement");
$stmt = $pdo->prepare("SELECT `address`, `city`, `state`, `postal_code`  FROM `Users` WHERE `id` = $id");
echo ("after statement");

$stmt->execute();
echo ("execute");

$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
$json = json_encode($results);
echo ($json);

 