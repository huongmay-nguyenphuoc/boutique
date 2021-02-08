<?php


//-----------------DB


try {
    $db = new PDO('mysql:host=localhost;dbname=boutique', 'root', '');
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    return $db;
} catch (PDOException $e) {
    die('Erreur : ' . $e->getMessage());
}

//----------------SESSION
session_start();


//--------------CHEMIN
define("RACINE_SITE", "/boutique/");


//-------------VARIABLES
$contenu = " ";



//----------------AUTRES INCLUSIONS
require_once("fonction.inc.php");








?>