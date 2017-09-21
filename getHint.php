<?php


function checkSquare($ord, $move){
    if($ord == "x"){
        if($_SESSION["player"]["ord"]["x"] + $move == $_SESSION["tree"]["ord"]["x"] &&
            $_SESSION["player"]["ord"]["y"] == $_SESSION["tree"]["ord"]["y"]){
            return true;
        }else{
            return false;
        }
    }
}

function getSurroundings(){
    if($_SESSION["player"]["ord"]["x"] + 1 == $_SESSION["tree"]["ord"]["x"] &&
        $_SESSION["player"]["ord"]["y"] == $_SESSION["tree"]["ord"]["y"] || 
        $_SESSION["player"]["ord"]["x"] - 1 == $_SESSION["tree"]["ord"]["x"] &&
        $_SESSION["player"]["ord"]["y"] == $_SESSION["tree"]["ord"]["y"] || 
        $_SESSION["player"]["ord"]["x"] == $_SESSION["tree"]["ord"]["x"] &&
        $_SESSION["player"]["ord"]["y"] + 1 == $_SESSION["tree"]["ord"]["y"] || 
        $_SESSION["player"]["ord"]["x"] == $_SESSION["tree"]["ord"]["x"] &&
        $_SESSION["player"]["ord"]["y"] - 1 == $_SESSION["tree"]["ord"]["y"]){
        return "tree";
    }else{
        return "empty";
    }
}

function getGround(){
    if($_SESSION["player"]["ord"]["x"] + 1 == $_SESSION["tree"]["ord"]["x"] &&
        $_SESSION["player"]["ord"]["y"] == $_SESSION["tree"]["ord"]["y"] || 
        $_SESSION["player"]["ord"]["x"] - 1 == $_SESSION["tree"]["ord"]["x"] &&
        $_SESSION["player"]["ord"]["y"] == $_SESSION["tree"]["ord"]["y"] || 
        $_SESSION["player"]["ord"]["x"] == $_SESSION["tree"]["ord"]["x"] &&
        $_SESSION["player"]["ord"]["y"] + 1 == $_SESSION["tree"]["ord"]["y"] || 
        $_SESSION["player"]["ord"]["x"] == $_SESSION["tree"]["ord"]["x"] &&
        $_SESSION["player"]["ord"]["y"] - 1 == $_SESSION["tree"]["ord"]["y"]){
        return "tree";
    }else{
        return "empty";
    }
}

function makeMap(){
    $map_data = "";
    for ($row=0; $row < 20; $row++) { 
        for ($col=0; $col < 20; $col++) { 
            foreach ($_SESSION["tree"] as $id => $data) {
                if($col == $data[1] && 
                    $row == $data[2]){
                    $map_data = $map_data . "T";
                }
            }
            if($col == $_SESSION["player"]["ord"]["x"] && $row == $_SESSION["player"]["ord"]["y"]){
                $map_data = $map_data . "P";
            }
            elseif ($col == $_SESSION["coin"]["ord"]["x"] && $row == $_SESSION["coin"]["ord"]["y"]) {
                $map_data = $map_data . "C";
            }
            else{
                $map_data = $map_data . ".";
            }
        }
    }
    echo $map_data;
}

session_name('Global'); 
session_id('TEST'); 
session_start(); 
$a = $_SESSION['key']; 

$ord = $_GET["ord"];
$move = $_GET["move"];

if(!isset($_SESSION["coin"])){
    $_SESSION["coin"]["ord"]["x"] = rand(0,19);
    $_SESSION["coin"]["ord"]["y"] = rand(0,19);
    $_SESSION["tree"] = array();
}
if(rand(0,4) == 0){
    $new_tree_id = rand(0,100);
    array_push($_SESSION["tree"], array($new_tree_id, rand(0,19), rand(0,19)));
    //$_SESSION["tree"]$_SESSION["tree"]["meta"]["count"]["ord"]["y"] = rand(0,19);
    //["meta"]["count"]["ord"]["x"] = rand(0,19)
    $_SESSION["tree"]["meta"]["count"]++;
}
if (!isset($_SESSION["player"])){
    $_SESSION["player"]["ord"]["x"] = 5;
    $_SESSION["player"]["ord"]["y"] = 8;
}
if ($ord == "x"){
    if(checkSquare("x", $move)){
        $_SESSION["coins"] += 10;
    }else{
        $_SESSION["player"]["ord"]["x"] += $move;
    }
}
elseif ($ord == "y"){
    $_SESSION["player"]["ord"]["y"] += $move;
}
if(isset($_GET["action"])){
    if(getSurroundings() == "tree"){
        $_SESSION["tree"] = null;
        $_SESSION["inventory"]["items"]["logs"] ++;
        $_SESSION["feedback"]["action"] = "You cut the log";
    }
}else{
    $_SESSION["feedback"]["action"] = "";
}
if($_SESSION["coin"]["ord"]["x"] > 19){
    $_SESSION["coin"]["ord"]["x"] = 0;
}
if($_SESSION["coin"]["ord"]["y"] > 19){
    $_SESSION["coin"]["ord"]["y"] = 0;
}
if($_SESSION["player"]["ord"]["x"] == $_SESSION["coin"]["ord"]["x"] &&
    $_SESSION["player"]["ord"]["y"] == $_SESSION["coin"]["ord"]["y"]){
    $_SESSION["coin"]["ord"]["x"] = rand(0,19);
    $_SESSION["coin"]["ord"]["y"] = rand(0,19);
    $_SESSION["coins"] += 1;
}
if($_GET["del"] == "true"){
    $_SESSION = array();
}

makeMap();

session_write_close(); 



// $hint = "";
// $min = 0;
// $max = 15;
// $x = rand($min, $max);
// $y = rand($min, $max);


// Output "no suggestion" if no hint was found or output correct values 
// echo $_SESSION["player"]["ord"]["x"].".".
//      $_SESSION["player"]["ord"]["y"].".".
//      $_SESSION["coin"]["ord"]["x"].".".
//      $_SESSION["coin"]["ord"]["y"].".".
//      $_SESSION["coins"].".".
//      json_encode($_SESSION);

// // // echo json_encode($_SESSION);


//Get the global context 




session_name('Global'); 
session_id('TEST'); 
session_start(); 
$_SESSION['key']=$a; 
session_write_close(); 




?>