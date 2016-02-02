<?php

/*** mysql hostname ***/
$hostname = '127.0.0.1';

/*** mysql username ***/
$username = 'root';

/*** mysql password ***/
$password = 'root';

try {
    $dbh = new PDO("mysql:host=$hostname;dbname=breadcart", $username, $password);
    /*** echo a message saying we have connected ***/
}
catch(PDOException $e)
{
}
//animals=table name
$stmt = $dbh->prepare("SELECT * FROM animals a WHERE a.type = :animal");
$stmt->execute(array(':animal'=>$_GET['animal']));
$results = $stmt->fetchAll();

?>
<!DOCTYPE html>
<head>
    <link href='https://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
    <link rel="icon" type="image/png" href="http://cdn.mysitemyway.com/etc-mysitemyway/icons/legacy-previews/icons/black-paint-splatter-icons-alphanumeric/069096-black-paint-splatter-icon-alphanumeric-letter-rr.png">
    <link rel="stylesheet" type="text/css" href="stylesheet.css">
    <script src="jquery.js"></script>
    <script type="text/javascript" src="script.js"></script>
    <title>RentAPet</title>
</head>

<body>
<div id="nav">
    <div id="rentapet">
        <p>Rent-A-Pet - Search</p>
    </div>
    <table id="nava">

        <tr>
            <div id="home"><td><a href="index.php">Home</a></td></div>
            <div id="bag"><td><a href="payment.php"><img src="Pictures/bagz.png" ></a></td></div>
            <div id="SignIn"><td><a href="signin.php">Sign In</a></td></div>
        </tr>
    </table>
</div>

<div id="searchinfo">
<h1><?php echo $_GET['animal'];?></h1>

    <table>
        <thead>
        <tr>
            <th>Name</th>
        </tr>
        </thead>
        <tbody>
        <?php
        if(count($results) > 0) {
            foreach($results as $animal){

                $animalname = $animal['name'];

                echo '<tr>';
                echo "<td><a href='animalProfile.php?id=" . $animal['id'] . "'>{$animalname}</a></td>";
                echo '</tr>';
            }
        }
        else{
            echo '<tr>';
            echo '<td>0 Results Found.</td>';
            echo '</tr>';
        }
        ?>
        </tbody>
    </table>
    <?php

?>
</div>
</body>

