<?php

session_start();

$id = $_GET["id"];

// Connexion à la BDD 
require("config.php");
$bdd = connect();


try {
    //Requete 
    $sql = "delete from produit where id=$id";
    echo $sql;

    // Execution de la requete
    $resultat = $bdd->exec($sql);

    $_SESSION["alert"] = "Le produit a été supprimé";
    header('Location: accueil-admin.php');
} catch (PDOException $e) {
    echo "Erreur dans la requête <br>" . $e->getMessage();
}
