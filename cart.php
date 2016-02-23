<?php
//ob_start();
session_start();

// create variable to store products sent from form
/*if ( isset($_POST['purchase']) )
{*/
    // assign purchases to cart
    $_SESSION['cart'] = $_POST['item'];

//}

// go to purchase summary page
header('location: purchases_summary.php');
//ob_flush();