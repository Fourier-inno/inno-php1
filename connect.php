<?php
require_once 'sendEmails.php';
session_start();
$errors = [];

	$firstname = $_POST['firstname'];
	$surname = $_POST['surname'];
	$gender = $_POST['gender'];
	$email = $_POST['email'];
	$password = $_POST['password'];
 	$token = bin2hex(random_bytes(50)); // generate unique token
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); //encrypt password
   

	//DB connection
	
	
?>
