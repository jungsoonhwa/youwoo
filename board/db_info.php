<?
	$mysqli = @new mysqli("localhost", "root", "rootpasswd", "test");

	if (mysqli_connect_errno()) {
		die("ERROR : " . mysqli_connect_error());
	}
?>