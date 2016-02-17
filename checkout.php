<?php
ob_start();
session_start();

if ( !isset($_SESSION['user']) AND !isset($_SESSION['pwd']) )
{
    header('location: login.php');
    $_SESSION['checkout'] = 1;
}
else
{
    header('location: shipping.php');
}