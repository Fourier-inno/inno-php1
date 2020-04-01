<?php
require_once 'sendEmails.php';
session_start();
$firstname = "";
$email = "";
$errors = [];

// SIGN UP USER
if (isset($_POST['signup-btn'])) {
    if (empty($_POST['firstname'])) {
        $errors['firstname'] = 'Firstname required';
    }
       if (empty($_POST['surname'])) {
        $errors['surname'] = 'Surname required';
    }
       if (empty($_POST['gender'])) {
        $errors['gender'] = 'Gender required';
    }
      if (empty($_POST['language'])) {
        $errors['language'] = 'Language required';
    }
      if (empty($_POST['qualification'])) {
        $errors['qualification'] = 'Qualification required';
    }
      if (empty($_POST['department'])) {
        $errors['department'] = 'Department required';
    }
    if (empty($_POST['email'])) {
        $errors['email'] = 'Email required';
    }
    if (empty($_POST['password'])) {
        $errors['password'] = 'Password required';
    }
    if (isset($_POST['password']) && $_POST['password'] !== $_POST['passwordConf']) {
        $errors['passwordConf'] = 'The two passwords do not match';
    }

    $firstname = $_POST['firstname'];
    $surname = $_POST['surname'];
    $gender = $_POST['gender'];
    $language = $_POST['language'];
    $qualification = $_POST['qualification'];
    $department = $_POST['department'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $token = bin2hex(random_bytes(50)); // generate unique token
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); //encrypt password

    $conn = new mysqli('localhost','root','','verify-user');
    if($conn->connect_error){
        die('Connection Failed: '.$conn->connect_error);
    }else{
        $stmt = $conn->prepare("insert into orgusers(firstname, surname,gender,language,qualification,department,email,password,token) values(?,?,?,?,?,?,?,?,?)");
        $stmt->bind_param("sssssssss",$firstname,$surname,$gender,$language,$qualification,$department,$email,$password,$token);
        $stmt->execute();
        echo "Registration Success!";
        $stmt->close();
        $conn->close();

    }

    // Check if email already exists

    $result= "SELECT * FROM orgusers WHERE email='$email' LIMIT 1";
    //$result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        $errors['email'] = "Email already exists";
    }
     if ($result) {
            $user_id = $stmt->insert_id;
            $stmt->close();
// TO DO: send verification email to user
            sendVerificationEmail($email, $token);

            $_SESSION['id'] = $user_id;
            $_SESSION['firstname'] = $firstname;
            $_SESSION['email'] = $email;
            $_SESSION['gender'] = $gender;
            $_SESSION['language'] = $language;
            $_SESSION['qualification'] = $qualification;
            $_SESSION['department'] = $department;
            $_SESSION['verified'] = false;
            $_SESSION['message'] = 'You are logged in!';
            $_SESSION['type'] = 'alert-success';
            header('location: index.php');
        } else {
            $_SESSION['error_msg'] = "Database error: Could not register user";
        }
    }
// LOGIN
if (isset($_POST['login-btn'])) {
    if (empty($_POST['firstname'])) {
        $errors['firstname'] = '
        First name or email required';
    }
    if (empty($_POST['password'])) {
        $errors['password'] = 'Password required';
    }
    $firstname = $_POST['firstname'];
    $password = $_POST['password'];

    if (count($errors) === 0) {
        $query = "SELECT * FROM orgusers WHERE firstname=? OR email=? LIMIT 1";
        $stmt = $conn->prepare($query);
        $stmt->bind_param('ss', $firstname, $password);

        if ($stmt->execute()) {
            $result = $stmt->get_result();
            $user = $result->fetch_assoc();
            if (password_verify($password, $user['password'])) { // if password matches
                $stmt->close();

                $_SESSION['id'] = $user['id'];
                $_SESSION['firstname'] = $user['firstname'];
                $_SESSION['email'] = $user['email'];
                $_SESSION['verified'] = $user['verified'];
                $_SESSION['message'] = 'You are logged in!';
                $_SESSION['type'] = 'alert-success';
                header('location: index.php');
                exit(0);
            } else { // if password does not match
                $errors['login_fail'] = "Wrong username / password";
            }
        } else {
            $_SESSION['message'] = "Database error. Login failed!";
            $_SESSION['type'] = "alert-danger";
        }
    }
}
