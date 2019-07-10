<?php
	$conn = mysqli_connect('localhost', 'root', '', 'db_multi-step-form');

	if(!isset($_POST['submit'])){
		$name = $_POST["name"];
		$username = $_POST["username"];
		$email = $_POST["email"];
		$phone = $_POST["phone"];
		$password = md5($_POST["password"]);

	    $sql = "INSERT INTO users(name, username, email, phone, password)
	    VALUES ('$name', '$username', '$email', '$phone','$password')";
	    if(mysqli_query($conn, $sql)){
		    echo "inserted successfully.";
		}else{
		    echo "ERROR: Could not able to execute";
		}

	}
?>