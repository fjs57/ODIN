<div class="modal  fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Selection de l'image</h5>
            </div>
            <div class="modal-body">

<?php 
    $sql = "SELECT * FROM images";
    $rep = $DB->query($sql);


    while($res = $rep->fetch_assoc()) {
?>

                <div class="btn btn-light d-inline-block pick-img" id="pick_image-<?php echo $res["idImage"]; ?>" onclick="func(this);">
                    <img src="./img/miniatures/<?php echo $res["src"]; ?>" class="miniatures ml-auto d-flex align-items-center">
                </div>

    <?php } ?>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-warning" data-dismiss="modal"><i class="fas fa-window-close"></i></button>
                <button type="button" class="btn btn-success" id="select_image_save" onclick="func(this);" disabled><i class="fas fa-save"></i></button>
            </div>
        </div>
    </div>
</div>