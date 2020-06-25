<?php
$porte = $_POST["idp"];
$vehicule = $_POST["idv"];

require_once $_SERVER['DOCUMENT_ROOT']."/php/db.php";

$sql = "UPDATE `travees`.`vehicules` SET `porte`='$porte' WHERE `idVehicule`='$vehicule';";

if($DB->query($sql)){
    echo "1";
}else{
    echo "0";
}