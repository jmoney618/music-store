<?php session_start() ?>
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
        <?php include('menu.inc.php') ?>
    </header>

    <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method='POST'>
        <fieldset>
            <label for='username'>Username: </label><input type='text' id='username' name='username' autofocus required><br>
            <label for='password'>Password: </label><input type='password' id='password' name='password' required><br>
            <input type='submit' value='Login' name='login'>
            <p><a href="new_user.php" id="register">Register</a></p>
        </fieldset>
<?php

require 'connect.php';

// validate the user has an account and logged in successfully
if ( isset($_POST['login']) )
{
    // set user's credentials from form
    $user = $_POST['username'];
    $pass = $_POST['password'];

    // protect against SQL injection
    $user = stripslashes($user);
    $user = mysqli_real_escape_string($con, $user);
    $pass = stripslashes($pass);
    $pass = mysqli_real_escape_string($con, $pass);

    // MySQL query to test if user has an account in the database
    $query = "SELECT user_id FROM users WHERE username = '$user' AND password = '$pass' ";
    $result = mysqli_query( $con, $query );
    $check = mysqli_num_rows( $result );

    if ( $check > 0 )
    {
        // Register user and pass to Session variables and redirect to file personal.php
        $_SESSION['user'] = $user;
        $_SESSION['pwd'] = $pass;

        if ( isset($_SESSION['checkout']) )
        {
            ob_start();
            header('location: shipping.php');
            ob_flush();
        }
        else
        {
            ob_start();
            header('location: personal.php');
            ob_flush();
        }
    }
    else
    {
        // Error message if provided credentials are invalid
        echo "<p style='color: red'>Password is incorrect or user does not exist.<br>
            If you do not have an account, please register.</p>";
    }

}

mysqli_close($con);
?>
    </form>
</div>
</body>
</html>