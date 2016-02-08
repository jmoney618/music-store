<?php session_start() ?>
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

    <form action='<?php echo htmlentities('check_login.php'); ?>' method='POST'>
        <fieldset>
            <label for='username'>Username: </label><input type='text' id='username' name='username' autofocus required><br>
            <label for='password'>Password: </label><input type='password' id='password' name='password' required><br>
            <input type='submit' value='Log In'>
        </fieldset>
    </form>
</div>
</body>
</html>