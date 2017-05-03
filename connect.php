<?php
// declare variables and open connection to database
$servername = 'localhost';
$user = 'root';
$pwd = '';
$db = 'sdd306_users';

$con = mysqli_connect($servername, $user, $pwd, $db);

if (mysqli_connect_errno() != 0 )
{
    // get error message from MySQL if connection is not successful
    $err_mes = mysqli_connect_errno();
    echo "<p>I'm sorry, not able to connect.  Error: <em>$err_mes</em></p>";
}
