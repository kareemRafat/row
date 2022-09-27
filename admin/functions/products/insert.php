<?php 

$name = $_POST['name'];
$price = $_POST['price'];
$sale = $_POST['sale'];
$cat_id = $_POST['cat_id'];

include '../connect.php';

$imgName = $_FILES['img']['name'];
$temp = $_FILES['img']['tmp_name'];


// 1 - image uploaded or not 
// 2 - specify extension
// 3 - specify size 
// 4 - give the file unique name 
// 5 - move file to the image folder
// 6 - insert image to database

// 1 - image uploaded or not 
if ( $_FILES['img']['error'] == 0 ) {

	// 2 - specify extension
	$extensions = ['jpg','png','gif'];
	$ext = pathinfo($imgName , PATHINFO_EXTENSION);

	if (in_array($ext, $extensions)) {

		// 3 - specify size 
		if ($_FILES['img']['size'] < 2000000) {

			// 4 - give the file unique name 
			$newName = md5(uniqid()) . "." . $ext ;

			// 5 - move file to the image folder
			move_uploaded_file($temp, "../../images/$newName");

		} else {

			exit('file size is too big');
		}


	} else {

		exit('wrong file extension');

	}


} else {

	exit("you must upload an image");

}



$insert = "INSERT INTO products (name , price , sale , cat_id , img) VALUES ('$name' , '$price' , '$sale' , '$cat_id' , '$newName')";

$query = $conn -> query($insert);

if ($query) {

	header("location: ../../products.php");

}else {
	echo $conn -> error ;
}