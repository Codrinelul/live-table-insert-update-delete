<?php
if (isset($_POST["id"])) {
	$id = $_POST["id"];
	$connect = mysqli_connect("localhost", "root", "", "testmanu");
	$sql = "DELETE FROM clients WHERE id=$id";
	$connect->query($sql);
	echo 'Data Deleted';
}
