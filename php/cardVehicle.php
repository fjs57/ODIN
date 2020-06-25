
            <div class="card text-white bg-dark mb-3 text-center text-bold card-vehicle" style="max-width: 18rem;" id="card-<?php echo $vehicule_id; ?>" onclick="func(this);">
                <div class="card-header"><?php echo $vehicule_nom; ?></div>
                <div class="card-body d-flex align-items-end flex-column">

                    <img src="./img/miniatures/<?php echo $vehicule_img; ?>" class="miniatures mx-auto">

                    <div class="input-group display-affectations mt-auto">

                        <select name="porte-<?php echo $vehicule_id; ?>" id="porte-<?php echo $vehicule_id; ?>" class="custom-select" disabled>
                        
<?php foreach ($travees as $numero ) { ?>
                            <option value="<?php echo $numero; ?>" <?php if($vehicule_porte == $numero) echo "selected"; ?>>Travée <?php echo $numero; ?></option>
<?php } ?>

                        </select>

                        <div class="input-group-append">
                            <button class="btn btn-warning modifier" id="modifier-<?php echo $vehicule_id; ?>" onclick="func(this);"><i class="far fa-edit"></i></button>
                        </div>

                        <div class="input-group-append">
                            <button type="submit" class="btn btn-success action" id="save-<?php echo $vehicule_id; ?>" onclick="func(this);" disabled><i class="far fa-save"></i></button>
                        </div>    
                    </div>
                    <div class="input-group display-disposition mt-auto">

                        <div class="">
                            <button class="btn btn-light action" id="ordre_gauche-<?php echo $vehicule_id; ?>" onclick="func(this);"><i class="fas fa-arrow-left"></i></button>
                        </div>

                        <div class="input-group-append">
                            <button class="btn btn-light action" id="ordre_droite-<?php echo $vehicule_id; ?>" onclick="func(this);"><i class="fas fa-arrow-right"></i></button>
                        </div>

                    </div>
                </div>
            </div>
