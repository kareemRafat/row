<?php 

if($_SERVER['REQUEST_METHOD'] == "GET") {

	header('location: ../users.php');

	die();

}

$username = $_POST['username'];
$password = md5($_POST['password']);
$address = $_POST['address'];
$email = $_POST['email'];
$gender = $_POST['gender'];
$priv = $_POST['priv'];

include 'connect.php';

$insert = "INSERT INTO users 
		(username , password , address , email , gender , priv) 
		VALUES 
		('$username' , '$password' , '$address' , '$email' , '$gender' , '$priv')";

$query = $conn -> query ($insert);

if ($query) {

  header("location: ../users.php");

} else {

   echo $conn -> error ;

}