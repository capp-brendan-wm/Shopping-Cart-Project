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
}
catch(PDOException $e)
{
}

$stmt = $dbh->prepare("select * from products where id = " . $_GET['id']);
$stmt->execute();
$animal = $stmt->fetch();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>RentAPet - Profiles</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Vollkorn" />
    <link rel="icon" type="image/png" href="http://cdn.mysitemyway.com/etc-mysitemyway/icons/legacy-previews/icons/black-paint-splatter-icons-alphanumeric/069096-black-paint-splatter-icon-alphanumeric-letter-rr.png">
    <link rel="stylesheet" type="text/css" media="all" href="styles.css">
    <script type="text/javascript" src="jquery-1.10.2.min.js"></script>
</head>
<body>

<div id="topbar">
    <a href="index.php">Back to Pets</a>
</div>

<div id="w">
    <div id="content" class="clearfix">
        <div id="userphoto"><img src="Pictures/Profile/profilePic-<?php echo $animal['id'] ?>.jpg" alt="Whoops! No profile picture yet!" width="250px"></div>
        <h1><?php echo $animal['name'] ?></h1>

        <nav id="profiletabs">
            <ul class="clearfix">
                <li><a href="#bio" class="sel">Bio</a></li>
                <li><a href="#activity">Schedule</a></li>
                <li><a href="#friends">Rent Me</a></li>
                <li><a href="#settings">Reviews</a></li>
            </ul>
        </nav>

        <section id="bio">
            <p>Name: <?php echo $animal['name'] ?> </p>
            <p>About: <?php echo $animal['about'] ?></p>
            <p>Age: <?php echo $animal['birthdate'] ?></p>
            <p>Time With Rent-A-Pet: <?php echo $animal['membersince'] ?></p>
            <p>Owner Name: <?php echo $animal['owner'] ?></p>
            <p>Certificate: <a href="Pictures/certificate-<?php echo $animal['id']; ?>.pdf">Click Here</a></p>

            <p></p>
        </section>

        <section id="activity" class="hidden">

            <iframe src="https://calendar.google.com/calendar/embed?height=500&amp;wkst=1&amp;bgcolor=%23ffffff&amp;src=west-mec.org_84vnpbrpjucg2r6d1p6d1vqo3c%40group.calendar.google.com&amp;color=%23B1440E&amp;ctz=America%2FPhoenix" style="border-width:0" width="625" height="500" frameborder="0" scrolling="no"></iframe>

        </section>

        <section id="friends" class="hidden">

            <ul id="friendslist" class="clearfix">
                <li>Requirements: <?php echo $animal['req'] ?></li>
                <li>Cost: $<?php echo $animal['price'] ?> per hour.</li>
                <p><a href="payment.php">RENT ME!</a></p>
            </ul>
        </section>

        <section id="settings" class="hidden">
            <!-- begin wwww.htmlcommentbox.com -->
            <div id="HCB_comment_box"><a href="http://www.htmlcommentbox.com">Comment Form</a> is loading comments...</div>
            <link rel="stylesheet" type="text/css" href="//www.htmlcommentbox.com/static/skins/bootstrap/twitter-bootstrap.css?v=0" />
            <script type="text/javascript" id="hcb"> /*<!--*/ if(!window.hcb_user){hcb_user={};} (function(){var s=document.createElement("script"), l=hcb_user.PAGE || (""+window.location).replace(/'/g,"%27"), h="//www.htmlcommentbox.com";s.setAttribute("type","text/javascript");s.setAttribute("src", h+"/jread?page="+encodeURIComponent(l).replace("+","%2B")+"&mod=%241%24wq1rdBcg%24GqWoxSBEKIZ9vTmWWoFJl."+"&opts=21470&num=10&ts=1449266147536");if (typeof s!="undefined") document.getElementsByTagName("head")[0].appendChild(s);})(); /*-->*/ </script>
            <!-- end www.htmlcommentbox.com -->
        </section>
    </div>
</div>
<script type="text/javascript">
    $(function(){
        $('#profiletabs ul li a').on('click', function(e){
            e.preventDefault();
            var newcontent = $(this).attr('href');

            $('#profiletabs ul li a').removeClass('sel');
            $(this).addClass('sel');

            $('#content section').each(function(){
                if(!$(this).hasClass('hidden')) { $(this).addClass('hidden'); }
            });

            $(newcontent).removeClass('hidden');
        });
    });
</script>
</body>
</html>