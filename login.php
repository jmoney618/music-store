<?php session_start() ?>
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

    <form action='<?php echo htmlentities($_SERVER['PHP_SELF']); ?>' method='POST'>
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

    // MySQL query to test if used has an account in the database
    $query = "SELECT user_id FROM sdd306_users.users WHERE username = '$user' AND password = '$pass' ";
    $result = mysqli_query( $con, $query );
    $check = mysqli_num_rows( $result );

    if ( $check > 0 )
    {
        // Register user and pass to Session variables and redirect to file personal.php
        $_SESSION["user"]["name"] = $user;
        $_SESSION["user"]["pwd"] = $pass;
        echo "<script>window.location.assign('personal.php')</script>";
    }
    else
    {
        // Error message if provided credentials are invalid
        echo "<p style='color: red'>Password is incorrect or user does not exist.<br>
            If you do not have an account, please <a href='new_user.php'>Register</a></p>";
    }

}
else if ( isset($_POST['register']) )
{
    echo "<script>window.location.assign('new_user.php')</script>";
}

?>
    </form>
</div>
</body>
</html>