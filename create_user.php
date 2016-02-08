<?php
session_start();

// if creating new account Session not set, redirect to login page
if ( !isset( $_SESSION['user']) AND !isset( $_SESSION['pwd']) )
{
    echo "<script>window.location.assign('login.php')</script>";
}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html">
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

    <p>Enter the information below to complete your account</p>
    <form action='<?php echo htmlentities($_SERVER['PHP_SELF']); ?>' method='POST'>
        <fieldset>
            <label for='fname'>First name: </label><input type='text' id='fname' name='fname' autofocus required><br>
            <label for='lname'>Last name: </label><input type='text' id='lname' name='lname' required><br>
            <label for='artist'>Fave Artist: </label><input type="text" id="artist" name="artist"><br>
            <input type='submit' value='Submit' name='create_account'>
        </fieldset>
    </form>
</div>
<?php
require "connect.php";
if (isset( $_POST['create_account']) )
{
    // move user info from Session variables into variable for MySQL query
    $user = $_SESSION['user'];
    $pwd = $_SESSION['pwd'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $artist = $_POST['artist'];

    // insert query to add new user to Users table
    $insert_user = "INSERT INTO sdd306_users.users (username, password, first_name, last_name) VALUES ('$user', '$pwd', '$fname', '$lname')";
    $result = mysqli_query( $con, $insert_user);
    $insert_artist = "INSERT INTO sdd306_users.favorite_artist (username, fav_artist) VALUES ('$user', '$artist')";
    $result = mysqli_query( $con, $insert_artist );

    // redirect to personal.php page
    echo "<script>window.location.assign('personal.php')</script>";
}

mysqli_close($con);
?>
</body>
</html>
