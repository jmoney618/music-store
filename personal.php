<?php
session_start();
require "connect.php";

if ( !isset($_SESSION['user']) )
{
    header('location: login.php');
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Jose's Music Store</title>
    <link href='http://fonts.googleapis.com/css?family=Arizonia' rel='stylesheet' type='text/css'>
    <link type="text/css" rel="stylesheet" href="styles.css"/>
</head>
<body>
<div class="container">
    <header>
        <?php include("menu.php") ?>
    </header>

    <section>
<?php
// get user credentials from Session variables
$user = $_SESSION['user'];
$query_user = "SELECT * FROM sdd306_users.users WHERE username = '$user' ";

// check if query can get the user info from the database
if ( $result = mysqli_query( $con, $query_user ) )
{
    while ( $person = mysqli_fetch_array($result) )
    {
        echo ("
            <p>
                First name: {$person['first_name']}<br>
                Last name: {$person['last_name']}
            </p>
        ");
    }
}

// get user's favorite artist from favorite_artist table
$query_artist = "SELECT favorite_artist.fav_artist FROM sdd306_users.favorite_artist WHERE username = '$user' ";
if ( $result = mysqli_query( $con, $query_artist) )
{
    while ( $artist = mysqli_fetch_array($result) )
    {
        echo "<p>Favorite musical artist: {$artist['fav_artist']}</p>";
    }
}


mysqli_close($con);
?>
        <p><a href="logout.php" id="logout">Logout</a></p>
    </section>
</div>
</body>
</html>