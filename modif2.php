<?php

session_start();

// Connexion à la BDD 
require("config.php");
$bdd = connect();


$id = $_SESSION["id"];
$nomBonbon = $_POST['nomBonbon'];
$prixBonbon = $_POST['prixBonbon'];
$img = $_FILES['img'];


$nom_image = $img['name'];
$chemin_destination = 'images/' . $nom_image;
move_uploaded_file($img['tmp_name'], $chemin_destination);

try {
    //Requete 
    $sql = "UPDATE produit SET nom = '$nomBonbon' , prix= $prixBonbon , photo= '$nom_image' WHERE id = $id";
    //echo $sql;

    // Execution de la requete
    $resultat = $bdd->exec($sql);
    // Affichage d'un message
    echo "$resultat produit modifé ! ";

    // Renvoi à la page d'accueil 
    header('Location: accueil-admin.php');
    exit;
} catch (PDOException $e) {
    echo "erreur dans la requête <br>" . $e->getMessage();
}
