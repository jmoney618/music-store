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

    <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST" >
        <img src="images/sia.jpg" />
        <input type="checkbox" name="item[]" value="sia" />

        <img src="images/cputh.jpg" />
        <input type="checkbox" name="item[]" value="cputh" />

        <img src="images/adele.jpg" />
        <input type="checkbox" name="item[]" value="adele" />

        <img src="images/jbieber.jpg" />
        <input type="checkbox" name="item[]" value="jbieber" />

        <img src="images/dtheater.jpg" />
        <input type="checkbox" name="item[]" value="dtheater" />

        <img src="images/ttband.jpg" />
        <input type="checkbox" name="item[]" value="ttband" />

        <img src="images/wet.jpg" />
        <input type="checkbox" name="item[]" value="wet" />

        <img src="images/pdisco.jpg" />
        <input type="checkbox" name="item[]" value="pdisco" />

        <img src="images/stlucia.jpg" />
        <input type="checkbox" name="item[]" value="stlucia" />

        <img src="images/cstapleton.jpg" />
        <input type="checkbox" name="item[]" value="cstapleton" />

        <input type="submit" name="purchase" id="addToCart" value="Add to cart" />
    </form>
</div>
<?php
if ( isset($_POST['purchase']) )
{

    // check to make sure the cart is not empty
    if (@$_POST['item'] === 0 OR @$_POST['item'] === null) {
        echo "<script type='text/javascript'>alert('You have not added any albums to your cart!')</script>";
    }
    else
    {
        ob_start();
        // header('location: cart.php');
        $_SESSION['cart'] = $_POST['item'];
        header('location: purchases_summary.php');
        ob_flush();
    }

}
?>
</body>
</html>