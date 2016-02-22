<?php
session_start();

// if user has not made any selections, redirect to selections page
if ( !isset($_POST['shipping']) AND !isset($_SESSION['cart']) )
{
    echo "<script>window.location.assign('selection.php')</script>";
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
        <?php include("menu.inc.php") ?>
    </header>

    <section>
        <h3>Purchase Complete</h3>
        <?php include "purchase_matrix.inc.php" ?>

        <h5>Your products will be delivered to:</h5>
            <?php
                echo "{$_SESSION['shipping'][0]} <br>
                      {$_SESSION['shipping'][1]}, {$_SESSION['shipping'][2]} {$_SESSION['shipping'][3]}
                     ";
            ?>
    </section>
</div>
</body>
</html>