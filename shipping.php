<?php
session_start();
require "connect.php";

// if user has not made any selections, redirect to selections page
if ( !isset($_POST['purchase']) )
{
    echo "<script>window.location.assign('selection.php')</script>";
}

// create variable to store products sent from form
if ( isset($_POST['purchase']) )
{

}

?>
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
        <?php include("menu.php") ?>
    </header>

    <form action='<?php echo htmlentities($_SERVER['PHP_SELF']); ?>' method='POST'>
        <fieldset>

        </fieldset>