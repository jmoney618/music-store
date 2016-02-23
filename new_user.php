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
        <?php include("menu.inc.php") ?>
    </header>

    <p>Enter the information below to create your account</p>
    <form action='<?php echo htmlentities($_SERVER['PHP_SELF']); ?>' method='POST'>
        <fieldset>
            <label for='username'>Username: </label><input type='text' id='username' name='username' autofocus required><br>
            <label for='password'>Password: </label><input type='password' id='password' name='password' required><br>
            <input type='submit' value='Submit' name='create_account'>
        </fieldset>
<?php
require "connect.php";
// check if the selected username is already taken
if ( isset($_POST['create_account']) )
{
    $user = $_POST['username'];
    $pwd = $_POST['password'];

    // protect against SQL injection
    $user = stripslashes($user);
    $user = mysqli_real_escape_string($con, $user);
    $pwd = stripslashes($pwd);
    $pwd = mysqli_real_escape_string($con, $pwd);

    // check if username already exists in the table
    $query = "SELECT * FROM sdd306_users.users WHERE username = '$user' ";
    $result = mysqli_query( $con, $query );
    $check = mysqli_num_rows($result);

    // if $check returns anything, the username already exists in database
    if ( $check > 0 )
    {
        echo "Sorry, that username is already taken";
    }
    else
    {
        // store the selected username and password in Session variables
        $_SESSION['user'] = $user;
        $_SESSION['pwd'] = $pwd;
        echo "<script>window.location.assign('create_user.php')</script>";
    }

}

mysqli_close($con);
?>
    </form>
</div>
</body>
</html>
