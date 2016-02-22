<?php
ob_start();
session_start();

// if user has not made any selections, redirect to selections page
if ( !isset($_SESSION['cart']) )
{
    header('selection.php');
    ob_flush();
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
        <?php include('menu.inc.php') ?>
    </header>

    <section>
        <h3>Purchase Summary</h3>
        <?php include "purchase_matrix.inc.php" ?>

        <!--submit button to clear cart-->
        <p><a href="checkout.php" name="clear" id="but_checkout">Checkout</a></p>
        <p><a href="clear_information.php" name="clear" id="but_clear">Clear cart</a></p>
    </section>
</div>
</body>
</html>