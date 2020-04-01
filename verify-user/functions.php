<?php 
session_start();

// connect to database
$db = mysqli_connect('localhost', 'root', '', 'verify-user');

// variable declaration
$email    = "";
$passwordreset    = "";
$errors   = array(); 

// call the register() function if register_btn is clicked
if (isset($_POST['reset_btn'])) {
	register();
}

// REGISTER USER
function register(){
	// call these variables with the global keyword to make them available in function
	global $db, $errors, $email, $passwordreset;

	// receive all input values from the form. Call the e() function
    // defined below to escape form values
	$username    =  e($_POST['username']);
	$email       =  e($_POST['email']);



	if (empty($email)) { 
		array_push($errors, "Email is required"); 
	}
	if (empty($passwordreset)) { 
		array_push($errors, "Password reset is required"); 
	}
	

	// register user if there are no errors in the form
	if (count($errors) == 0) {
		$passwordreset = md5($passwordreset);//encrypt the password before saving in the database

		if (isset($_POST['user_type'])) {
			$user_type = e($_POST['user_type']);
			$query = "INSERT INTO users (username, email, user_type, password) 
					  VALUES('$username', '$email', '$user_type', '$password')";
			mysqli_query($db, $query);
			$_SESSION['success']  = "New user password created!!";
			header('location: home.php');
		}else{
			$query = "INSERT INTO users (passwordreset) 
					  VALUES('$passwordreset')";
			mysqli_query($db, $query);

			$_SESSION['success']  = "You are now logged in";
			header('location: index.php');				
		}
	}
}


function display_error() {
	global $errors;

	if (count($errors) > 0){
		echo '<div class="error">';
			foreach ($errors as $error){
				echo $error .'<br>';
			}
		echo '</div>';
	}
}	