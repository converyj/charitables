<?php
//receive values user submitted from form
$fname = $_POST['fname'];
$lname = $_POST['lname'];
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
include_once("../../charitables_dbconfig.php");

$stmt = $pdo->prepare("INSERT INTO `Users` (`id`,`fname`,`lname`,`role`,`email`, `password`, `organization_name`, `tax_id_number`, `address`, `contact`,`city`,`state`,`postal_code`)
 VALUES (NULL,'$fname','$lname', '$role', '$email', '$password', '$orgName','$taxNO','$address','$contact','$city','$province','$postal'); ");

$stmt->execute();

header("Location: login.php");
?>
