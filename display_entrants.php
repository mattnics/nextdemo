<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Calm Demo Competition</title>

        <!-- CSS -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
                <link rel="stylesheet" href="assets/css/form-elements.css">
        <link rel="stylesheet" href="assets/css/style.css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- Favicon and touch icons -->

    </head>

    <body>

        <!-- Top content -->
        <div class="top-content">
                <div class="container">

                <div class="row">
                    <div class="col-sm-8 col-sm-offset-2 text">
                        <h1>Current Entrants</h1>
                        <div class="description">
                                <p>
                                The Entrants so so far ...     <a href="/display_entrants.php" target="_blank">Click to pick a winner!!!</a>
                       <br><br>
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
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
            $hiddenmail=substr($row["email"], 0, -6). "******";
#               echo  $row["id"]. " - " .$row["name"]. " " . $row["email"] . "<br>" ;
            echo  $row["id"]. " - " .$row["name"]. " " . $hiddenmail . "<br>" ;
        }
} else {
     echo "0 results";
        }
$conn->close();
?>

                                </p>
                        </div>
                    </div>
                </div>


                </div>
        </div>

        <!-- Footer -->
        <footer>
                <div class="container">
                        <div class="row">

                                <div class="col-sm-8 col-sm-offset-2">
                                        <div class="footer-border"></div>
                                        <p>m4t - Helping you find that special person</p>
                                </div>

                        </div>
                </div>
        </footer>

        <!-- Javascript -->
        <script src="assets/js/jquery-1.11.1.min.js"></script>
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/js/jquery.backstretch.min.js"></script>
        <script src="assets/js/scripts.js"></script>

        <!--[if lt IE 10]>
            <script src="assets/js/placeholder.js"></script>
        <![endif]-->

    </body>

</html>
