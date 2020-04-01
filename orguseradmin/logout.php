<?php
session_destroy();
unset($_SESSION['id']);
unset($_SESSION['firstname']);
unset($_SESSION['surname']);
unset($_SESSION['gender']);
unset($_SESSION['email']);
unset($_SESSION['verify']);
header("location: login.php");