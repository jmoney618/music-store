<?php
ob_start();
session_start();

// create variable to store products sent from form
if ( isset($_POST['purchase']) )
{
    $purchases = $_POST['item'];

    // assign purchases to cart
    $_SESSION['cart'] = $purchases;
}

// go to purchase summary page
header('location: purchases_summary.php');