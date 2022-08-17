<?php
$connect = mysqli_connect("localhost", "root", "", "testmanu");
$id = $_POST["id"];
$text = $_POST["text"];
$column_name = $_POST["column_name"];
$sql = "UPDATE clients SET " . $column_name . "='" . $text . "' WHERE id='" . $id . "'";
if (mysqli_query($connect, $sql)) {
	echo 'Data Updated';
}
