<?php 
session_start();
$username = $_POST['username'];
$password = md5($_POST['password']);

include 'connect.php';

$select = "SELECT * FROM users WHERE 
			username = '$username'
			AND
			password = '$password'
";

$query = $conn -> query($select);

if( $query -> num_rows > 0 ) {

	// user found

	//get logged user id from database
	$user = $query->fetch_assoc();
	$id = $user['id'];
	// create session and store user id
	$_SESSION['login'] = $id ;

	// go to index
	header("Location: ../index.php");
 
} else {

	// user not found

	// create error session
	$_SESSION['error'] = '<div class="alert alert-danger">wrong credentials</div>';

	header("Location: ../login.php");
}