<table class="table table-hover bg-light col-6 text-center mx-auto">
    <thead>
        <tr>
            <th scope="col">n° de Travée</th>
            <th scope="col">VO</th>
            <th scope="col">VI</th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
<?php
    require_once $_SERVER['DOCUMENT_ROOT']."/php/db.php";
    $sql = "SELECT * FROM travees.portes";
    $rep = $DB->query($sql);
    while($res = $rep->fetch_assoc())
    {
        $porte_id = $res["idPorte"];
        $porte_VO = $res["VO"];
        $porte_VI = $res["VI"];
?>
        <tr>
            <th scope="row"><?php echo $porte_id; ?></th>
            <td><input type="number" id="VO-<?php echo $porte_id; ?>" value="<?php echo $porte_VO; ?>" disabled></td>
            <td><input type="number" id="VI-<?php echo $porte_id; ?>" value="<?php echo $porte_VI; ?>" disabled></td>
            <td>
                <button type="submit" class="btn btn-warning edit_porte" id="edit_porte-<?php echo $porte_id; ?>" onclick="func(this);"><i class="fas fa-edit"></i></button>
                <button type="submit" class="btn btn-success save_porte" id="save_porte-<?php echo $porte_id; ?>" onclick="func(this);" disabled><i class="fas fa-save"></i></button>
            </td>
        </tr>
<?php
    }
?>
        <tr>
            <th scope="row"><input type="number" id="new_porte-id"></th>
            <td><input type="number" id="new_porte-VO"></td>
            <td><input type="number" id="new_porte-VI"></td>
            <td><button type="submit" class="btn btn-primary"><i class="fas fa-plus"></i></button></td>
        </tr>
  </tbody>
</table>