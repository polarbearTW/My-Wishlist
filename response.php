<?php
include "_constants.php";
include "_functions.php";

// Delete function 
// Use array_search(what you want to search, seatrch which array)
// Use array_splice(which array, where to delete, delete how many items)


if (isset($_POST["delete"])){
    deleteEntry($_POST["delete"]);
} else if (isset($_POST["change"])){
    editEntry($_POST["change"], [
        "placename"=> "Some Other Place",
        "location"=> "Some Other Location",
        "price"=> "Some Other Price",
        "link"=> "https://other.com",
    ]);
};

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

        <div class="whole">

            <table>
                <thead class="bgColor">
                    <tr>
                        <th>Place Name</th>
                        <th>Country/City</th>
                        <th>Price(KRW)</th>
                        <th>Link</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php places() ?>
                </tbody>
            </table>

        </div>
    </body>
</html>