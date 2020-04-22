<?php
session_start();
//receive username and passowrd
$email = $_POST['email'];
$password = $_POST['password'];

//check admin table for valid username and password
include_once("../../charitables_dbconfig.php");

$stmt = $pdo->prepare("
	SELECT * FROM `Users`
	WHERE `email` = '$email'
	AND `password` = '$password'");

$stmt->execute();

if ($row = $stmt->fetch()) {
	//start session if valid and redirect to dashboard
	$_SESSION['logged-in'] = true;
	$_SESSION['organization_name'] = $row['organization_name'];
	$_SESSION['email'] = $row['email'];
	$_SESSION['role'] = $row['role'];
	$_SESSION['id'] = $row['id'];
	$id = $_SESSION['id'];

	header("Location: dashboard.php?id=$id");
} else {
	//redirect to login page if invalid
	header("Location: login.php");
}
 