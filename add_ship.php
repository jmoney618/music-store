<?php
session_start();
require 'connect.php';

// check if shipping address was submitted in shipping form
if ( isset( $_POST['shipping']) )
{
    $username = $_SESSION['user'];
    $street = $_POST['street'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $zip = $_POST['zip'];
    $_SESSION['shipping'] = [$street, $city, $state, $zip];

    echo "$username <br>";
    print_r($_SESSION['shipping']);
    echo "<br>";

    // create INSERT query
    $qry_insert = "INSERT INTO shipping_address (username, street, city, state, zip) VALUES ('$username', '$street', '$city', '$state', '$zip')";
    // insert information into the database
    if ( mysqli_query( $con, $qry_insert ) )
    {
        header('location: purchases.php');
        ob_flush();
    }

}

mysqli_close($con);