<!-- OPEN IN FIREFOX IF THE VIDEO DOES NOT LOAD RIGHT AWAY --- DO NOT OPEN IN SAFARI @ ALL --- IF YOU OPEN IN CHROME IT MIGHT TAKE SOME TIME FOR THE VIDEO TO LOAD -->
<?php

/*** mysql hostname ***/
$hostname = '127.0.0.1';

/*** mysql username ***/
$username = 'root';

/*** mysql password ***/
$password = 'root';

try {
    $dbh = new PDO("mysql:host=$hostname;dbname=rentapet", $username, $password);
    /*** echo a message saying we have connected ***/
    echo 'Connected to database';
}
catch(PDOException $e)
{
    echo $e->getMessage();
}

$sql = "select * from animals";

foreach($dbh->query($sql) as $row){
    echo $row['name'];
}

?>


<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <script src="../RentAPet/jquery.js"></script>
    <title>The Bread Cart</title>
</head>

<body>

<div id="navbar">

    <table id="navt">
        <tr id="navtr">
            <div id="home"><td><a href="index.php">Home</a></td></div>
        </tr>
    </table>

</div>
<div>




</div>







</body>









</html>