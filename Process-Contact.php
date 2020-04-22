<?php

//receive values user submitted from form
$id =$_POST['id'];
$name = $_POST['name'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];

//perform database insert using form values;
include_once("../../charitables_dbconfig.php");

$stmt = $pdo->prepare("INSERT INTO `Contact` (`id`, `name`, `email`, `subject`, `message`) VALUES (NULL, '$name',
	'$email', '$subject', '$message'); ");

$stmt->execute();

echo('{"success":
	"true"
  }');
