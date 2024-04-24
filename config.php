<?php

define("BDD", 'bonbons');
define("HOTE", 'localhost');
define("UTILISATEUR", 'root');
define("MDP", '');

function connect()
{

    try {
        $connect = new PDO('mysql:host=' . HOTE . '; dbname=' . BDD, UTILISATEUR, MDP, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
    } catch (PDOException $e) {
        echo "Probleme de connexion à BDD <br>" . $e->getMessage();
    }

    return $connect;
}
