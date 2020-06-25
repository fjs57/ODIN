<table class="table table-hover bg-light col-8 text-center mx-auto">
    <thead>
        <tr>
            <th scope="col">n° du Vehicule</th>                
            <th scope="col">Nom</th>        
            <th scope="col">Categorie</th>
            <th scope="col">Image</th>
            <th scope="col">Porte</th>
            <th scope="col">Ordre</th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
<?php
    require_once $_SERVER['DOCUMENT_ROOT']."/php/db.php";
    $sql = "SELECT * FROM travees.vehicules";
    $rep = $DB->query($sql);
    while($res = $rep->fetch_assoc())
    {
?>
        <tr>
            <th scope="row"><?php echo $res["idVehicule"]; ?></th>
            <td><input type="text" id="vehicule_nom-<?php echo $res["idVehicule"]; ?>" value="<?php echo $res["nom"]; ?>" disabled></td>
            <td>
                <select id="vehicule_categorie-<?php echo $res["idVehicule"]; ?>" disabled="disabled">

                </select>
            </td>
            <td><button type="submit" class="btn btn-primary" id="vehicule_image-<?php echo $res["idVehicule"]; ?>"><i class="fas fa-image"></i></button></td>
            <td><input type="text" id="vehicule_porte-<?php echo $res["idVehicule"]; ?>" value="<?php echo $res["porte"]; ?>" disabled></td>
            <td><input type="text" id="vehicule_ordre-<?php echo $res["idVehicule"]; ?>" value="<?php echo $res["ordre"]; ?>" disabled></td>
            <td>
                <button type="submit" class="btn btn-warning" id="edit_vehicule-<?php echo $res["idVehicule"]; ?>"><i class="fas fa-edit"></i></button>
                <button type="submit" class="btn btn-success" id="save_vehicule-<?php echo $res["idVehicule"]; ?>" disabled><i class="fas fa-save"></i></button>                
                <button type="submit" class="btn btn-danger" id="delete_vehicule-<?php echo $res["idVehicule"]; ?>"><i class="fas fa-trash"></i></button>
            </td>
        </tr>
<?php
    }
?>
        <tr>
            <th scope="row"></th>
            <td><input type="text" id="new_porte-VO"></td>
            <td>
                <select id="vehicule_categorie-<?php echo $res["idVehicule"]; ?>">

                </select>
            </td>
            <td><button type="submit" class="btn btn-primary" id="vehicule_image-<?php echo $res["idVehicule"]; ?>"><i class="fas fa-image"></i></button></td>
            <td>
                <select id="vehicule_categorie-<?php echo $res["idVehicule"]; ?>">

                </select>
            </td>
            <td><input type="number" id="new_porte-VI"></td>
            <td><button type="submit" class="btn btn-success"><i class="fas fa-plus"></i></button></td>
        </tr>
  </tbody>
</table>