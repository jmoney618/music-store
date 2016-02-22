<?php session_start();

session_unset();
session_destroy();

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
        <p>Shopping cart is clear.</p>
        <p><a href="selection.php">Go back and buy some music!</a></p>
        <p>And don't even think about clearing your cart again OR ELSE!!!</p>
    </section>
</div>
</body>
</html>