<?php
//receive values user submitted from form
$role = $_POST['rdbRole'];
$email = $_POST['email'];
$password = $_POST['password'];
$orgName = $_POST['organization'];
$taxNO = $_POST['taxNumber'];
$address = $_POST['address'];
$contact = $_POST['contact'];
$city = $_POST['city'];
$province = $_POST['province'];
$postal = $_POST['postalCode'];



//perform database insert using form values;
$dsn = "mysql:host=localhost;dbname=browne9_Charitables;charset=utf8mb4";
$dbusername = "browne9_weedsite";
$dbpassword = "g@5o4nFUJ7ha";

$pdo = new PDO($dsn, $dbusername, $dbpassword);

$stmt = $pdo->prepare("INSERT INTO `Users` (`id`,`role`,`email`, `password`, `organization_name`, `tax_id_number`, `address`, `contact`,`city`,`state`,`postal_code`)
 VALUES (NULL, '$role', '$email', '$password', '$orgName','$taxNO','$address','$contact','$city','$province','$postal'); ");

$stmt->execute();

header("Location: login.php");
?>
