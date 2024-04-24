<?php

session_start();

require("config.php");
$bdd = connect();
$id = $_GET["id"];
$_SESSION["id"] = $id;


// requete
$sql = "select * from produit where id = $id";

//execution de la requete
$resultat = $bdd->query($sql);

while ($produit = $resultat->fetch(PDO::FETCH_OBJ)) {

    $nom = $produit->nom;
    $prix = $produit->prix;
    $img = $produit->photo;
?>



    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

        <title>Modifier un bonbon</title>
    </head>

    <body>

        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Bonbons-admin</a>
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
                    <form class="d-flex">
                        <input class="form-control me-2" type="search" placeholder="Rechercher" aria-label="Search">
                        <button class="btn btn-outline-danger" type="submit">Rechercher</button>
                    </form>
                </div>
            </div>
        </nav>

        <h1 class="text-center" style="margin-top: 1rem;">Modifier un bonbon</h1>

        <form action="modif2.php" method="POST" enctype="multipart/form-data">



            <div class="form-floating mb-3" style="margin:2rem;">
                <input type="text" name="nomBonbon" class="form-control" id="floatingInput" placeholder="" value="<?php echo $nom ?>">
                <label for="floatingInput">Nom du bonbon
            </div>
            <div class="form-floating" style="margin:2rem;">
                <input type=" text" name="prixBonbon" class="form-control" id="floatingPassword" placeholder="" value="<?php echo $prix ?>"></label>
                <label for="floatingPassword">Prix du bonbon
            </div>

            <input style="margin:2rem;" type="file" name="img" class="form-control" value="<?php echo $img ?>">

            <div class="d-grid gap-2">
                <input style="margin-left:2rem; margin-right:2rem; margin-top:1rem;" type="submit" class="btn btn-danger" value="Confirmer les modifications">
            </div>
        </form>

    <?php
}

    ?>
    </body>

    </html>