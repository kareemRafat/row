<?php 

include "connect.php";

$id = $_GET['id'];

$delet = "DELETE FROM users WHERE id = $id";

if ($conn -> query($delet)){
	header("location: ../users.php");
}else {
	echo $conn -> error ;
}