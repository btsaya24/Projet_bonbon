<?php

// Démarer une session
session_start();

// Récupération des données saisies dans le formlaire d'identification.
$login = $_POST['login'];
$mdp = $_POST['mdp'];
$mdp = md5($mdp);




// Connexion au serveur de BDD 
require("config.php");

$bdd = connect();

// Requête de recherche du mot de passe de l'admin à partir de l'identifiant saisi
$sql = "select * from admin where login = '$login' and mdp = '$mdp' ";

// Execution de la requête 
$resultat = $bdd->query($sql);

// Stockage du résultat dans un objet 
while ($admin = $resultat->fetch(PDO::FETCH_OBJ)) {
    $id = $admin->id;
    $identitifiant = $admin->login;
    $_SESSION["admin"] = $admin->login;
}

// Utilisation de la méthode rowCount permettant de compter le nombre de lignes de résultat renvoyées par la requête
$nb_lignes = $resultat->rowCount();
if ($nb_lignes == 0) {
    echo ("Erreur, le mot de passe ou l'identifiant doit être incorrect.");
    header('Location:admin.php');
} else {
    echo ("Vous êtes connecté");

    $_SESSION['autorisation'] = "OK";
    header('Location:accueil-admin.php');
}
