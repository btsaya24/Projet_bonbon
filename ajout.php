<?php

$nomBonbon = $_POST['nomBonbon'];
$prixBonbon = $_POST['prixBonbon'];
$img = $_FILES['img'];


$nom_image = $img['name'];
$chemin_destination = 'images/' . $nom_image;
move_uploaded_file($img['tmp_name'], $chemin_destination);

// Connexion à la BDD 
require("config.php");
$bdd = connect();

try {
    //Requete 
    $sql = "insert into produit(nom, prix, photo) values ('$nomBonbon',$prixBonbon,'$nom_image')";
    //echo $sql;

    // Execution de la requete
    $resultat = $bdd->exec($sql);

    // Affichage d'un message
    echo "$resultat produit ajouté ! ";
    var_dump($resultat);
    // Renvoi à la page d'accueil 
    //header('Location: accueil-admin.php');
    exit;
} catch (PDOException $e) {
    echo "Erreur dans la requête <br>" . $e->getMessage();
}
