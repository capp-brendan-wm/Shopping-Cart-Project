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
session_start();

$registered = $_SESSION["registered"];
//$username = $_SESSION["username"];

if(isset($_SESSION['username'])){
    header('location: index.php');
}

$error = false;
$success = false;

if(@$_POST['login']) {
    if (!$_POST['username']) {
    }
    if (!$_POST['password']) {
    }

    $query = $dbh->prepare("SELECT * FROM signup WHERE username = :username AND password = :password");
    $result = $query->execute(
        array(
            'username' => $_POST['username'],
            'password' => $_POST['password']
        )
    );
    $userinfo = $query->fetch();
    if ($userinfo) {

        $success = "User, " . $_POST['username'] . " was successfully logged in.";

        $_SESSION["firstname"] = $userinfo['firstname'];
        $_SESSION["username"] = $userinfo['username'];

        header("Location: index.php");
    } else {
        $success = "There was an error logging into the account.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <style>
        body {
            background-color: #399AE7;
        }
        ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            overflow: hidden;
            background-color: ghostwhite;

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
        p {
            text-indent: 50px;
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
        <li class="nav"><a class="active" href=""><img src="http://simpleicon.com/wp-content/uploads/shopping-cart-7.png" style="width: 30px; height: 30px;"/></a></li>
    </ul>
</ul>
    <div id="filler7"></div>
    <center>
    <div id="formbody">
    <form method="POST">
        <h2>Sign - In</h2>
        <label>Username :</label>
        <input type="text" name="username" id="name" required> <br><br>
        <label> Password :</label>
        <input type="text" name="password" id="passsword" required> <br><br>
        <button type="submit" name="login" value="1">Sign In</button>
        <?php
        if(isset($_SESSION['registered'])){
        echo '<p id="registered">Successfully Registered</p>';
        unset($_SESSION['registered']);
        }
        ?>
                      <?php
        if($error){
        echo $error;
        echo '<br>';
        }
        if($success){
        echo $success;
        echo '<br>';
        }
        ?>
    </form>
        <div id="buttonsu">
            <a href="signup.php">
                <button>Sign Up</button>
            </a>
        </div>
    </div>
    </center>
<div id="filler2"></div>
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