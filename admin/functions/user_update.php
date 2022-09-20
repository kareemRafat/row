<?php 


if($_SERVER['REQUEST_METHOD'] == "GET") {
	header('location: ../users.php');
	die();
}


$id = $_POST['id'];
$username = $_POST['username'];
$address = $_POST['address'];
$email = $_POST['email'];
$gender = $_POST['gender'];
$priv = $_POST['priv'];

include 'connect.php';

// password update logic
if (!empty($_POST['password'])) {
	$pass = md5($_POST['password']);
	$updatePass = "UPDATE users SET password = '$pass' WHERE id = $id";
	$conn->query($updatePass);
}

$update = "UPDATE users SET
			username = '$username' ,
			address = '$address' ,
			email = '$email' ,
			gender = '$gender' ,
			priv = '$priv' 
			WHERE id = $id 
";

if ($conn -> query($update)) {

  header("location: ../users.php");

} else {

   echo $conn -> error ;

}