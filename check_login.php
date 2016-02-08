<?php
require 'connect.php';

// validate the user has an account and logged in successfully
if ( isset($_POST["login"]) )
{
    $username = mysqli_escape_string( $con, $_POST["username"] );
    $pass = mysqli_escape_string( $con, $_POST["password"] );

    $query = "SELECT * FROM users WHERE username = '$username' AND password = '$pass
'";
    $result = mysqli_query($con, $query);
    $check_user = mysqli_num_rows($result);

    if ($check_user > 0)
    {
        // Register $myusername, $mypassword and redirect to file "login_success.php"
        $_SESSION["user"]["name"] = $username;
        $_SESSION["user"]["pwd"] = $pass;
        header('location: http://www.example.com');
        echo "<script>alert('Password is correct')";
    }
    else
    {
        echo "<script>alert('Password is incorrect or user does not exist.')";
    }
}

/*$username = $_POST['username'];
$password = $_POST['password'];
// protect from SQL injection
$username = stripslashes($username);
$password = stripslashes($password);
$username = mysqli_real_escape_string($con, $username);
$password = mysqli_real_escape_string($con, $password);

$query = "SELECT * FROM $db WHERE username = $username AND password = $password";
$result = mysqli_query($con, $query);

echo "$username<br>";
echo "$password<br>";

$count = mysqli_num_rows( mysqli_store_result($result) );*/

// If result matched $myusername and $mypassword, table row must be 1 row
/*if( $count==1 )
{
    // Register $myusername, $mypassword and redirect to file "login_success.php"
    $_SESSION["user"]["name"] = $username;
    $_SESSION["user"]["pwd"] = $password;
    header("location:index.php");
}
else
{
    echo "Wrong Username or Password";
}*/

mysqli_close($con);
?>