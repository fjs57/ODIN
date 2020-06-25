<?php
$vehicule = $_POST["idv"];
$sens = $_POST["sens"];

require_once $_SERVER['DOCUMENT_ROOT']."/php/db.php";

function getCategory($table,$id){
    foreach ($table as $row) {
        if($row[0]==$id) return $row[3];
    }
    return -1;
}

function getOrder($table,$id){
    foreach ($table as $row) {
        if($row[0]==$id) return $row[5];
    }
    return -1;
}

function getId($table,$category,$order){
    foreach ($table as $row) {
        if($row[3]==$category && $row[5]==$order) return $row[0];
    }
    return -1;
}

function maxOrder($table,$category){
    $lastMax=0;
    foreach($table as $row){
        if ($row[5]>$lastMax) $lastMax = $row[5];
    }
    return $lastMax;
}

function updateOrder($id,$newOrder){
    global $DB;
    $sql = "UPDATE `travees`.`vehicules` SET `ordre`='$newOrder' WHERE `idVehicule`='$id';";
    return $DB->query($sql);
}

$success = true;

$sql = "SELECT * FROM travees.vehicules";
$rep = $DB->query($sql);
$table = $rep->fetch_all();

$category = getCategory($table,$vehicule);
$lastOrder = getOrder($table,$vehicule);

$idSwap = "X";

if($sens=="R"){
    if($lastOrder < maxOrder($table,$category)){
        $newOrder = $lastOrder + 1;
        $idSwap = getId($table,$category,$newOrder);
        $success &= updateOrder($idSwap,$lastOrder);
        $success &= updateOrder($vehicule,$newOrder);
    }
    
} else {
    if($lastOrder > 1){
        $newOrder = $lastOrder - 1;
        $idSwap = getId($table,$category,$newOrder);
        $success &= updateOrder($idSwap,$lastOrder);
        $success &= updateOrder($vehicule,$newOrder);
    }
}



if($idSwap=="X"){
    echo 2;
} elseif ($success){
    echo "1";
} else {
    echo "0";
}
