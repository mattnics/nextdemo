<?php
include ("db_passwords.php");
$name=$_POST['name'];
$email=$_POST['email'];
$dbname = "entrantsDB";


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO emails (name,email) VALUES ('$name', '$email')";

if ($conn->query($sql) === TRUE) {
    echo "Entry submitted - Good Luck!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
