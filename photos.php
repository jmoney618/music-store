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

    <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post" enctype="multipart/form-data" id="uploads">
        <input type="file" name="photoUpload" />
        <input type="submit" name="submit" value="Upload" />
    </form>
<?php require "fileUpload.php"; require "readDirectory.php"; ?>
</div>
</body>
</html>