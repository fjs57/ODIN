<?php
require_once $_SERVER['DOCUMENT_ROOT']."/php/db.php";

$sql = "SELECT * FROM travees.parametres;";

$rep = $DB->query($sql);

$table = $rep->fetch_assoc();

echo json_encode($table);

