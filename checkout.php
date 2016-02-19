<?php
ob_start();
session_start();

if ( !isset($_SESSION['user']) AND !isset($_SESSION['pwd']) )
{
    // is user is logged in, set checkout session variable to 1.  This will serve to redirect customer to shipping page after logging in
    $_SESSION['checkout'] = 1;
    header('location: login.php');
}
else
{
    header('location: shipping.php');
}