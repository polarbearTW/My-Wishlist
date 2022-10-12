<?php
include "_constants.php";
include "_functions.php";
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="app.css">
        <title>My Wishlist</title>

    </head>
    <body>
        <div class="title">
        <h1>My Wishlist</h1>
        </div>

        <div class="btn">
        <button type="button">
        <a href="./index.php">Add a Place</a>
        </button>
        </div>

        <div class="bgColor"></div>
        <div class="whole">
            <div class="box">
                <div class="category">Place Name</div>
                <div class="content">
                    <?php
                placename();
                ?>
                </div>
            </div>
            
            <div class="box">
                <div class="category">Country/City</div>
                <div class="content">
                    <?php
                location();
                ?>
                </div>
            </div>
            
            <div class="box">
                <div class="category">Price(KRW)</div>
                <div class="content">
                    <?php
                price();
                ?>
                </div>
            </div>
            
            <div class="box">
                <div class="category">Link:</div>
                <div class="content">
                    <?php
                url();                
                ?>
                </div>
            </div>
            
        </div>
    </body>
</html>