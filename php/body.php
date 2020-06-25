<?php

require_once $_SERVER['DOCUMENT_ROOT']."/php/db.php";    

    function getTravees()
    {
        global $DB;
        $sql = "SELECT idPorte FROM travees.portes;";
        $res = $DB->query($sql);
        $trav = [];
        while($rep = $res->fetch_assoc()) $trav[]=$rep["idPorte"];
        return $trav;
    }
    $travees = getTravees();

    $sql = "SELECT * from travees.categories";
    
    $res = $DB->query($sql);

    while ($rep = $res->fetch_assoc()) {

        $categorie = $rep["idCategorie"];

?>


    <div class="card-deck">

<?php

        $sql2 = "SELECT vehicules.idVehicule, vehicules.porte, vehicules.nom, images.src FROM travees.vehicules, travees.images WHERE vehicules.image = images.idImage AND categorie = $categorie ORDER BY categorie ASC, ordre ASC;";
        
        $res2 = $DB->query($sql2);

        while ($rep2 = $res2->fetch_assoc()) {

            $vehicule_id = $rep2["idVehicule"];
            $vehicule_img = $rep2["src"];
            $vehicule_nom = $rep2["nom"];
            $vehicule_porte = $rep2["porte"];

            include("cardVehicle.php");
        } 
?>
        
    </div>

<?php } ?>

 