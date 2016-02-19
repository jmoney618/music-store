<?php
ob_start();
require 'connect.php';

// check if shipping address was submitted in shipping form
if ( isset( $_POST['shipping']) )
{
    // set variables to be used in query
    $street = $_POST['street'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $zip = $_POST['zip'];

    // create query to insert address into database
    $insert_qry = "INSERT INTO sdd306_users.shipping_address (username, street, city, state, zip) VALUES ("."{$_SESSION['user']},"." '$street', '$city', $state, $zip)";

    // insert information into the database
    if ( mysqli_query( $con, $insert_qry) )
    {
        header('location: purchases.php');
        ob_flush();
    }

}