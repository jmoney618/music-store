<?php
@session_start();

// variables to track album price,total price, and names for all albums
$price = 0;
$total = 0;
$name = '';

foreach($_SESSION['cart'] as $album)
{
    // check the current album and get price and name
    switch($album)
    {
        case 'sia': $price = 9.99;
            $name = "Sia - This Is Acting";
            break;
        case 'cputh': $price = 12.99;
            $name = "Charlie Puth - Nine Track Mind";
            break;
        case 'adele': $price = 10.99;
            $name = "Adele - 25";
            break;
        case 'jbieber': $price = 8.99;
            $name = "Justin Bieber - Purpose";
            break;
        case 'dtheater': $price = 4.99;
            $name = "Dream Theater - The Astonishing";
            break;
        case 'ttband': $price = 7.99;
            $name = "Tedeschi Trucks Band - Let Me Get By";
            break;
        case 'wet': $price = 3.99;
            $name = "Wet - Don't You";
            break;
        case 'pdisco': $price = 13.99;
            $name = "Panic! At the Disco - Death Of A Bachelor";
            break;
        case 'stlucia': $price = 6.99;
            $name = "St. Lucia - Matter";
            break;
        case 'cstapleton': $price = 11.99;
            $name = "Chris Stapleton - Traveller";
            break;
        default:
            break;
    }

    // tally the total price of all purchases
    $total += $price;

    // output each album
    echo ("<img src='images/{$album}.jpg' /><br>");
    echo $name."<br>";
    echo "Price "."\$".number_format($price, 2);
    echo "<br><br>";
}

// output the total purchase price for all purchases
echo "Total purchase "."\$".number_format($total, 2);