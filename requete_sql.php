<?php
// on se connecte à notre base de données
try {
    $bdd = new PDO('mysql:host=localhost;dbname=hexaphone', 'root', 'morydalveen10');
}

catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

$phoneId = $bdd->query('SELECT idPhone FROM smartphonenotes');
$phone_data = $bdd->query('SELECT * FROM smartphonenotes');
$phoneSpecs = $bdd->query('SELECT * FROM smartphonespecs');
$phonePrix = $bdd->query('SELECT * FROM smartphonestocks');

$idchaine = '(';
$classement = [];

$design = 1;
$puissance = 1;
$camera = 1;
$connectivite = 1;
$solidite = 1;
$batterie = 1;
$scoretab = [];

while ($donnees = $phoneId->fetch()) {
    $idchaine .= $donnees['idPhone'] . ', ';
}

while ($donnees = $phone_data->fetch()) {

        $score = 0;
        $nb_critere = 0;
        if ($design == 1) {
            $score += $donnees['design']*0.3;
            $nb_critere += 0.3;
        }
        if ($puissance == 1) {
            $score += $donnees['puissance'];
            $nb_critere += 1;
        }
        if ($camera == 1) {
            $score += $donnees['camera']*1;
            $nb_critere += 1;
        }
        if ($connectivite == 1) {
            $score += $donnees['reseau']*0.3;
            $nb_critere += 0.3;
        }
        if ($solidite == 1) {
            $score += $donnees['solidite']*0.4; // coefficient de ponderation pour la solidité 0.4
            $nb_critere += 0.4;
        }
        if ($batterie == 1) {
            $score += $donnees['batterie'];
            $nb_critere += 1;
        }
        $score = $score / $nb_critere;
        array_push($scoretab, [$donnees['idPhone'], $score]);
    }

foreach ($scoretab as $key => $row) {
    $ids[$key]  = $row[0];
    $scoreSubtab[$key] = $row[1];
}
print_r( $ids);
array_multisort($scoreSubtab, SORT_DESC, $ids, SORT_ASC, $scoretab);
echo ' break ';
print_r( $ids);
/* Augmentation des prix (prise en compte de la marge)
while ($stocks = $phonePrix->fetch()) {
    $prix = $stocks['prix'];
    $newPrice = $prix;

    if ($prix < 100)
        $newPrice += 40;
    elseif ($prix < 150)
        $newPrice += 55;
    elseif ($prix < 200)
        $newPrice += 65;
    elseif ($prix < 250)
        $newPrice += 80;
    elseif ($prix < 300)
        $newPrice += 90;
    else
        $newPrice += 100;


    $idversion = $stocks['idVersion'];

    $sql = "UPDATE smartphonestocks SET prix = :prix WHERE idVersion = :idversion";
    $update = $bdd->prepare($sql);
    $update->bindparam(':prix', $newPrice, PDO::PARAM_INT);
    $update->bindparam(':idversion', $idversion, PDO::PARAM_INT);
    $update->execute();
}
*/

/* Systeme notation de la batterie */
while ($specs = $phoneSpecs->fetch()) {
    $idPhone = $specs['idPhone'];
    $batterie = $specs['batterieCapacite'];
    $processeur = $specs['processeur'];
    $taille = $specs['taille'];
    $antutu = $specs['antutu'];
    $resolution = $specs['resolution'];

    if ($batterie >= 5900)
        $scoreBatterie = 9.5;
    elseif ($batterie >= 4800 AND $batterie  < 5900)
        $scoreBatterie = 9;
    elseif ($batterie >= 3800 AND $batterie  < 4800)
        $scoreBatterie = 8.5;
    elseif ($batterie >= 2900 AND $batterie  < 3800)
        $scoreBatterie = 7.5;
    elseif ($batterie >= 2000 AND $batterie  < 2900)
        $scoreBatterie = 6;
    else
        $scoreBatterie = 5;

    $scoreProcesseur = 0;

    if (stripos($processeur, "MediaTek") !== false)
        $scoreProcesseur = -0.2;
    if (stripos($processeur, "KIRIN") !== false)
        $scoreProcesseur = -0.2;
    if (stripos($processeur, "Snapdragon") !== false)
        $scoreProcesseur = 0.4;
    if (stripos($processeur, "Apple") !== false)
        $scoreProcesseur = 0.7;
    if (stripos($processeur, "Samsung") !== false)
        $scoreProcesseur = 0.5;

    $scoreTaille = 0;
    if ($taille >= 5.8)
        $scoreTaille = -0.2;
    if ($taille < 5.3)
        $scoreTaille = 0.2;

    $scoreAntutu = 0;
    if ($antutu > 140)
        $scoreAntutu = -0.2;
    if ($antutu < 50)
        $scoreAntutu = 0.2;

    $scoreResolution = 0;
    if (strpos($resolution, "720 x") OR strpos($resolution, "750 x"))
        $scoreResolution = 0.3;
    if (strpos($resolution, "1080 x"))
        $scoreResolution = 0;
    if (strpos($resolution, "1440 x"))
        $scoreResolution = -0.5;
    if (strpos($resolution, "2160 x"))
        $scoreResolution = -1;

    echo $idPhone." : ".$scoreProcesseur." next ";

    $score = $scoreBatterie + $scoreProcesseur + $scoreAntutu + $scoreResolution + $scoreTaille;

    $sql = "UPDATE smartphonenotes SET batterie = :score WHERE idPhone = :idPhone";
    $update = $bdd->prepare($sql);
    $update->bindparam(':score', $score, PDO::PARAM_STR);
    $update->bindparam(':idPhone', $idPhone, PDO::PARAM_INT);
    $update->execute();
}
