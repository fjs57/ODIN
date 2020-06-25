<?php

$ID = $_POST["idv"];

require_once $_SERVER['DOCUMENT_ROOT']."/php/db.php";

$sql = "SELECT portes.VO FROM travees.vehicules, travees.portes WHERE vehicules.porte = portes.idPorte AND vehicules.idVehicule = $ID;";

$rep = $DB->query($sql);

$table = $rep->fetch_assoc();

echo json_encode($table);

