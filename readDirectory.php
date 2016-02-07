<?php

// access the directory
$readdir = "uploads/";

// scan the directory
$photos = scandir($readdir);

$file = fopen("photofile.txt", "w");
if ($file === NULL)
    throw new FileOpenException("photofile.txt");

// loop through array to display photos
foreach($photos as $name) {
    // suppress the "." and ".." parent directories for displaying
    if ($name != "." AND $name != "..")
    {
        // output images with HTML img
        echo "<img src=".$readdir.$name." width='20%' height='40%' />";
    }
}
fclose($file);