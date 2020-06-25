<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion Travées</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="/fa/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="shortcut icon" href="./img/logo256.png" type="image/x-icon">
</head>
<body class="bg-secondary">

<!-- CORPS DU DOCUMENT -->


<nav class="navbar navbar-expand-lg bg-dark mb-3">
    <span class="navbar-brand text-light">
        <img src="./img/logo256.png" width="30" height="30" class="d-inline-block align-top" alt="">
        Unité opérationnelle de Saint-Avold
    </span>
    <div class="collapse navbar-collapse text-primary" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="#" onclick="accueil();">Accueil</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#" onclick="disposition();">Disposition</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#" onclick="affectations();">Affectations</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Paramètres</a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" onclick="parametres(this);" id="param-portes">Portes</a>
                    <a class="dropdown-item" onclick="parametres(this);" id="param-vehicules">Véhicules</a>
                    <a class="dropdown-item" onclick="parametres(this);" id="param-ipx">IPX800</a>
                    <a class="dropdown-item" onclick="parametres(this);" id="param-categories">Catégories</a>
                </div>
            </li>
        </ul>
    </div>
    <span class="navbar-text text-secondary">
        Réalisé par SULER François
    </span>
</nav>

<div class="alert alert-success alert-dismissible fade show d-none fixed-bottom" id="alert-success-save" role="alert">
    Modification réussie.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="alert alert-danger alert-dismissible fade show d-none fixed-bottom" id="alert-fail-save" role="alert">
    Modification échouée.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="alert alert-warning alert-dismissible fade show d-none fixed-bottom" id="alert-warning" role="alert">
    Modification impossible.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>

<div class="container-fluid" id="body-container">

<?php include "./php/body.php"; ?>

</div>

<div class="container-fluid" id="parametres-container">
    <?php include "./php/tablePortes.php"; ?>
</div>

<?php include "./php/modalChoseImage.php"; ?>



<!-- FIN DU CORPS DU DOCUMENT -->

</body>
<script src="./js/jquery.min.js"></script>
<script src="./js/popper.min.js"></script>
<script src="./js/bootstrap.min.js"></script>
<!--<script src="https://cdn.jsdelivr.net/npm/@shopify/draggable@1.0.0-beta.8/lib/draggable.bundle.js"></script>-->
<script src="./js/events.js"></script>

</html>