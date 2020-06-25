<?php
require_once $_SERVER['DOCUMENT_ROOT']."/php/db.php";

$sql = "SELECT vehicules.idVehicule as ID, portes.VI, portes.VO FROM travees.vehicules, travees.portes WHERE vehicules.porte = portes.idPorte;";

$rep = $DB->query($sql);

$table = $rep->fetch_all(MYSQLI_ASSOC);

echo json_encode($table);

