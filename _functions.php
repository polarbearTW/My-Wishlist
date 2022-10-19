<?php
include "_constants.php";

// a function to display place name
function placename(){
    //use global to get the path outside the function
    global $FILENAME; 

    $file=fopen($FILENAME, 'r');
    $size = filesize($FILENAME);

    if($size>0){
        $content = fread($file, $size);
        fclose($file);
        $obj=json_decode($content, true);

        //display items in the array
        $length=count($obj);
        for($i=0; $i<$length; $i++){
            $place = $obj[$i]["placename"];
            echo $place;
            echo '<br>';
        }
    }
}

// a function to display location
function location(){
    global $FILENAME; 

    $file=fopen($FILENAME, 'r');
    $size = filesize($FILENAME);

    if($size>0){
        $content = fread($file, $size);
        fclose($file);
        $obj=json_decode($content, true);

        //display items in the array
        $length=count($obj);
        for($i=0; $i<$length; $i++){
            $location = $obj[$i]["location"];
            echo $location;
            echo '<br>';
        }
    }
}

// a function to display price
function price(){
    global $FILENAME; 

    $file=fopen($FILENAME, 'r');
    $size = filesize($FILENAME);

    if($size>0){
        $content = fread($file, $size);
        fclose($file);
        $obj=json_decode($content, true);

        //display items in the array
        $length=count($obj);
        for($i=0; $i<$length; $i++){
            $price = $obj[$i]["price"];
            echo $price;
            echo '<br>';
        }
    }
}

// a function to display URL
function url(){
    global $FILENAME; 

    $file=fopen($FILENAME, 'r');
    $size = filesize($FILENAME);

    if($size>0){
        $content = fread($file, $size);
        fclose($file);
        $obj=json_decode($content, true);

        //display items in the array
        $length=count($obj);
        for($i=0; $i<$length; $i++){
            $url = $obj[$i]["link"];
            echo $url;
            echo '<br>';
        }
    }
}


// a function to add button
function button(){
    global $FILENAME; 

    $file=fopen($FILENAME, 'r');
    $size = filesize($FILENAME);

    if($size>0){
        $content = fread($file, $size);
        fclose($file);
        $obj=json_decode($content, true);

        //add buttons for each entry
        $length=count($obj);
        for($i=0; $i<$length; $i++){
            $button = $obj[$i]["id"];

            echo '<form method="post" action="">';
            echo '<button name="delete" value="'.$button.'" id="funcBTN">Delete</button>';
            echo '</form>';
        }
    }
}

// a function to check if the answers are valid
function checkANS(){
    if($_POST["placename"] == "" || $_POST["location"] == "" || $_POST["price"] == "" || $_POST["link"] == ""){
        echo "<div id=\"warning\">Please fill out all the blanks.</div>";
        } else {
            echo "<div id=\"warning\">Successfully submitted! Check My Wishlist for saved places.</div>";
        }
}

// a function to check if the answers are valid and return true/false
function checkANS2(){
    if($_POST["placename"] == "" || $_POST["location"] == "" || $_POST["price"] == "" || $_POST["link"] == ""){
        return false;
        } else {
        return true;
        }
}

// a function to go and get current data 
function getdata() {
    global $FILENAME;
    $file=fopen($FILENAME, 'r');
    $size = filesize($FILENAME);
    //Solve the error: cannot read the file when size is 0
    if($size>0){
        //go and get all the current data
        $content = fread($file, $size);
        fclose($file);
        //turn string into array
        $obj=json_decode($content, true);
        return $obj;
    } else {
        return [];
    }
}

//a function to write data (with encode: array to string)
function writedata($obj){
    global $FILENAME;
    $newdata= json_encode($obj, JSON_PRETTY_PRINT);
    $file2 = fopen($FILENAME, 'w+');
    fwrite($file2, $newdata);
    fclose($file2);    
}

//a function to write data
function write($FILENAME, $string){
    $file = fopen($FILENAME, 'w+');
    fwrite($file, $string);
    fclose($file);    
}

function deleteEntry($id){
    global $FILENAME;
    $entries = getdata();

    $new_Ans = [];
    foreach($entries as $place){
        if ($place["id"]!= $id){
            array_push($new_Ans, $place); 
        }
    }

    $newData = json_encode($new_Ans, JSON_PRETTY_PRINT);
    write($FILENAME, $newData);
}

function editEntry($id, $replaced_id) {
    global $FILENAME;
    $entries = getdata();

    $new_Ans = [];
    foreach($entries as $place){
        if ($place["id"]== $id){
            array_push($new_Ans, $replaced_id); 
        } else{
            array_push($new_Ans, $place);
        }
    }

    $newData = json_encode($new_Ans, JSON_PRETTY_PRINT);
    write($FILENAME, $newData);
}
?>