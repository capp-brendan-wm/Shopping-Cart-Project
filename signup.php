<?php

/*** mysql hostname ***/
$hostname = '127.0.0.1';

/*** mysql username ***/
$username = 'root';

/*** mysql password ***/
$password = 'root';

try {
    $dbh = new PDO('mysql:host=127.0.0.1;dbname=mydb', 'root', 'root');

} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}
if(@$_POST['formSubmit'])
{    $errorMessage = false;

    if(empty($_POST['firstname']))
    {
        $errorMessage = "<li>Enter your first name!</li>";
    }
    if(empty($_POST['username']))
    {
        $errorMessage = "<li>Enter a username!</li>";
    }
    if(empty($_POST['email']))
    {
        $errorMessage = "<li>Enter your email!</li>";
    }

    if(empty($_POST['password']))
    {
        $errorMessage = "<li>Enter your password!</li>";
    }


    $stmt = $dbh->prepare("INSERT INTO signup (id, firstname, username, email, password) VALUES (:id, :firstname, :username, :email, :password)");

    $result = $stmt->execute(
        array(
            'id' => NULL,
            'firstname' => $_POST['firstname'],
            'username' => $_POST['username'],
            'email' => $_POST['email'],
            'password' => $_POST['password']
        )
    );

    if(!$result){

    }
    {
        echo("<p>There was an error with your form:</p>\n");
        echo("<ul>" . $errorMessage . "</ul>\n");
    }

}
?>

<!DOCTYPE html>
<html lang="en">
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
        <li class="nav"><a class="active" href=""><img src="http://simpleicon.com/wp-content/uploads/shopping-cart-7.png" style="width: 30px; height: 30px;"/></a></li>
    </ul>
</ul>

<div id="form" style="background-color: ghostwhite ">
    <div id="filler8"></div>
    <center>
        <form method="post">
            <h2>Register for Computer Lounge</h2>
            <label>Name :</label>
            <input type="text" name="firstname" id="name" required> <br><br>
            <label>Email :</label>
            <input type="text" name="email" id="email" required> <br><br>
            <label> Username : </label>
            <input type="text" name="username" id="username" required> <br><br>
            <label>Password :</label>
            <input type="password" name="password" id="password" required><br><br>
            <br>

            <button type="submit" name="formSubmit" value="1">Add New User</button>

        </form>
    </center>
</div>
<div id="filler1"></div>
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
