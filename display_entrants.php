<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<?php
include ("db_passwords.php");
$dbname = "entrantsDB";
$secondsWait = 2;

header("Refresh:$secondsWait");


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$sql = "SELECT * FROM emails ORDER BY id DESC LIMIT 50";


$result = $conn->query($sql);

echo '<p align="middle"><a href="/choose_winner.php">Pick Winner</a><br><br>';

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
            $hiddenmail=substr($row["email"], 0, -6). "******";
#        	echo  $row["id"]. " - " .$row["name"]. " " . $row["email"] . "<br>" ;
            echo  $row["id"]. " - " .$row["name"]. " " . $hiddenmail . "<br>" ;

	}
} else {
     echo "0 results";
        }

$conn->close();
?>

</body>
</html>