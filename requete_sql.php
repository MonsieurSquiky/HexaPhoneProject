<?php
// on se connecte à notre base de données
try {
    $bdd = new PDO('mysql:host=localhost;dbname=hexaphone', 'root', 'morydalveen10');
}

catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

$phoneId = $bdd->query('SELECT idPhone FROM smartphonenotes');
$idchaine='(';
while ($donnees = $phoneId->fetch()) {
    $idchaine .= $donnees['idPhone'] . ', ';
}

echo $idchaine.')';
