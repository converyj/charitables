<?php
$dsn = "mysql:host=localhost;dbname=browne9_Charitables;charset=utf8mb4";
$dbusername = "browne9_weedsite";
$dbpassword = "g@5o4nFUJ7ha";

$pdo = new PDO($dsn, $dbusername, $dbpassword);

$stmt = $pdo->prepare("SELECT `streetname`, `city`, `province`, `postal`  FROM `Users` WHERE id = $id");

$stmt->execute();

$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
$json = json_encode($results);
echo ($json);
 