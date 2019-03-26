<?php
//receive values user submitted from form
$item = $_POST['item'];
$quantity = $_POST['quantity'];





//perform database insert using form values;
$dsn = "mysql:host=localhost;dbname=browne9_Charitables;charset=utf8mb4";
$dbusername = "browne9_weedsite";
$dbpassword = "g@5o4nFUJ7ha";

$pdo = new PDO($dsn, $dbusername, $dbpassword);

$stmt = $pdo->prepare("INSERT INTO `Food` (`id`,`category`,`item`,`quantity`)
 VALUES (NULL,NULL, '$item', '$quantity'); ");

//  $stmt2 = $pdo->prepare("INSERT INTO `Clothes` (`id`,`item`,`quantity`)
//   VALUES (NULL, '$item', '$quantity'); ");

$stmt->execute();
// $stmt2->execute();
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
$json = json_encode($results);



// header("Location: form.php");
echo('{
    "success":"true"
  }');
?>
