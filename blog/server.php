<?php 
	session_start();
	$db = mysqli_connect('localhost', 'root', '', 'post');

	$name = "";
	$address = "";
	$id = 0;
	$update = false;

	if (isset($_POST['save'])) {
		$name = $_POST['name'];
		$address = $_POST['address'];

		mysqli_query($db, "INSERT INTO article (name, address) VALUES ('$name', '$address')"); 
		$_SESSION['message'] = "Address saved"; 
		header('location: admin.php');
	}
	if (isset($_POST['update'])) {
	$id = $_POST['id'];
	$name = $_POST['name'];
	$address = $_POST['address'];

	mysqli_query($db, "UPDATE article SET name='$name', address='$address' WHERE id=$id");
	$_SESSION['message'] = "Address updated!"; 
	header('location: admin.php');
}

if (isset($_GET['del'])) {
	$id = $_GET['del'];
	mysqli_query($db, "DELETE FROM article WHERE id=$id");
	$_SESSION['message'] = "Address deleted!"; 
	header('location: admin.php');
}
	
	
	
$results = mysqli_query($db, "SELECT * FROM article");