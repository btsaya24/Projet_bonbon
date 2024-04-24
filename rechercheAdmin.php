<?php

//connexion à la BDD
include("config.php");
$bdd = connect();

//requete
$recherche = strtoupper($_POST['recherche']);
$sql = "select * from produit where upper(nom) like '%$recherche%'";


//execution de la requete
$resultat = $bdd->query($sql);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Les bonbons</title>
</head>

<body>




    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="accueil-admin.php">Bonbons-admin</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="accueil-admin.php">Accueil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Retour client</a>
                    </li>
                </ul>
                <form class="d-flex" method="POST" action="rechercheAdmin.php">
                    <input class="form-control me-2" type="search" name="recherche" placeholder="Rechercher" aria-label="Search">
                    <button class="btn btn-outline-danger" type="submit">Rechercher</button>
                </form>
            </div>
        </div>
    </nav>

    <h1 style="margin:2rem; text-align:center;">Commander les bonbons que vous voulez !</h1>

    <div class="container">
        <div class="row">

            <?php
            // stockage du résulat dans un objet
            while ($produit = $resultat->fetch(PDO::FETCH_OBJ)) {
                echo "<div class='col'>
        <div class='card' style='width: 13rem; margin:2rem;'>
            <img src='images/$produit->photo' class='card-img-top' alt=''>
            <div class='card-body'>
                <h5 class='card-title'>$produit->nom</h5>
                <p class='card-text'>Prix : $produit->prix €</p>
                <div class='d-grid gap-2 dropdown'>
                    <button class='btn btn-danger dropdown-toggle' type='button' id='dropdownMenuButton1' data-bs-toggle='dropdown' aria-expanded='false'>
                        Choisir
                    </button>
                    <ul class='dropdown-menu' aria-labelledby='dropdownMenuButton1'>
                        <li><a class='dropdown-item' href='modif.php?id=$produit->id'>Modifier</a></li>
                        <li><a class='dropdown-item' href='supp.php?id=$produit->id' onclick='Voulez-vous supprimer ce bonbon'>Supprimer</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>";
            }
            ?>

</body>
<script src='https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js' integrity='sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p' crossorigin='anonymous'></script>

</html>