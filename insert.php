<?php
$connect = mysqli_connect("localhost", "root", "", "testmanu");
$sql = "INSERT INTO clients(name, email, phone, address) VALUES('" . $_POST["name"] . "', '" . $_POST["email"] . "', '" . $_POST["phone"] . "', '" . $_POST["address"] . "')";
if (mysqli_query($connect, $sql)) {
     echo 'Data Inserted';
}
