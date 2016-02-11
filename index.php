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

$sql = "select * from computerlounge";

foreach($dbh->query($sql) as $row){
    echo $row['name'];
}

?>

<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <style>
        ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            overflow: hidden;
            background-color: white;

        }

        li {
            float: left;
            padding-left: 210px;
        }

        li a {
            display: block;
            color:  blue;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        li a:hover:not(.active) {
            background-color: ghostwhite;
        }

        .active {
            background-color: ghostwhite;
        }
    </style>
    <title>The Computer Lounge</title>
</head>

<body id="body">


<ul style="background-color: ghostwhite">
    <li class="nav"><a href="index.php">Home</a></li>
    <li class="nav"><a href="signin.php">Sign In</a></li>
    <li class="nav"><a href="signup.php">Sign Up</a></li>
    <ul style="float:right;list-style-type:none;">
        <li class="nav"><a class="active" href=""><img src="http://simpleicon.com/wp-content/uploads/shopping-cart-7.png" style="width: 45px; height: 30px;"/></a></li>
    </ul>
</ul>

<div id="productchoices">

    <table id="product-table">
        <tr>
            <th id="product0" colspan="5">Types of Accessories</th>
        </tr>
        <tr>
            <th class="tableinfo" id="product1"><a href="search.php?product_name=keyboard">Keyboards</a></th>
            <th class="tableinfo" id="product2"><a href="search.php?product_name=mouse">Mouses</a></th>
            <th class="tableinfo" id="product3"><a href="search.php?product_name=headset">Headsets</a></th>
            <th class="tableinfo" id="product4"><a href="search.php?product_name=speaker">Speakers</a></th>
            <th class="tableinfo" id="product5"><a href="search.php?product_name=webcam">Webcams</a></th>
        </tr>
        <tr>
            <th class="tableinfo" id="product6"><a href="search.php?product_name=monitor">Monitors</a></th>
            <th class="tableinfo" id="product7"><a href="search.php?product_name=powersupply">Power Supplies</a></th>
            <th class="tableinfo" id="product8"><a href="search.php?product_name=harddrive">Hard Drive</a></th>
            <th class="tableinfo" id="product9"><a href="search.php?product_name=cable">Cables</a></th>
            <th class="tableinfo" id="product10"><a href="search.php?product_name=videocard">Video Cards</a></th>
        </tr>
    </table>

</div>

<div id="footer">

    <table id="footert">

        <tr id="footerTop">
            <th id="footer1"><a href="about.html">About The Computer Lounge</a></th>
        </tr>
        <tr id="footerBottom">
            <th id="footer2"><a href="aboutUs.html">About Us</a></th>
        </tr>

    </table>

</div>

</body>

</html>