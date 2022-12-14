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
    <link rel="stylesheet" href="./app.css">
    <title>Add Places to My Wishlist</title>
</head>
<body>
    
    <?php
    if ($submitted) {
        //check if all the blanks are filled
        //if all the blanks are filled, save the answers. Otherwise, stay on the page and show message: "Please fill in all the sections" 

        checkANS();
        if($_POST["placename"] !== "" && $_POST["location"] !== "" && $_POST["price"] !== "" && $_POST["link"] !== "") {
            $data = [
                "id" => uniqid(),
                "placename" => $_POST["placename"],
                "location" => $_POST["location"],
                "price" => $_POST["price"],
                "link" => $_POST["link"]
            ];
        
            //go and get all the current data
            // 1- open/read/close the file (as a string)
            // 2-turn string into array
            $obj = getdata();
    
            //change the data, add our new entry to it
            array_push($obj, $data);
    
            //turn array into string and write new data back to file 
            writedata($obj);
        }

    } 
    ?>
    <div id="container">
        <form method="POST">
            <div class="title">
            <h1>Add a Place to Your Wishlist</h1>
            </div>

            <div class="btn">
            <button type="button">
            <a href="./response.php">See My Wishlist</a>  
            </button>
            </div>
            
            <div class="table">
                <!--use checkANS2() to check if there's blank answer, if so, keep the original text even submitted the form  -->
                Place Name: <input type="text" name="placename" value="<?php if($submitted){if (checkANS2()==false){echo $_POST["placename"];}} ?>"/><br>
                Country/City: <input type="text" name="location" value="<?php if($submitted){if(checkANS2()==false){echo $_POST["location"];}}?>"/><br>
                Price: (KRW): <input type="text" name="price" value="<?php if($submitted){if(checkANS2()==false){echo $_POST["price"];}}?>"/><br>
                Link: <input type="url" name="link" value="<?php if($submitted){if(checkANS2()==false){echo $_POST["link"];}}?>"/><br>
            </div>
            
            <div class="submit">
            <button id="submit" type="submit" name="submit" value="add">Add</button>
            </div>
        </form>
    </div>
      
    <!-- <script src="./app.js"></script> -->
</body>
</html>