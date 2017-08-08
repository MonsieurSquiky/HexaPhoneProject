<?php
// on se connecte à notre base de données
try {
    //$bdd = new PDO('mysql:host=hexaphonhdv1.mysql.db;dbname=hexaphonhdv1', 'hexaphonhdv1', 'HkE4WhD2');

    $bdd = new PDO('mysql:host=localhost;dbname=hexaphone', 'root', 'morydalveen10');
    //$bdd = new PDO('mysql:host=sql.free.fr;dbname=moryfodecisse', 'moryfodecisse', 'mory10');

}

catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

$design = $_GET['design'];
$puissance = $_GET['puissance'];
$camera = $_GET['camera'];
$connectivite = $_GET['connectivite'];
$solidite = $_GET['solidite'];
$batterie = $_GET['batterie'];

$prixmax = $_GET['prix'];
$stockagemin = $_GET['stockage'];
$resolutionmin = $_GET['resolutionMin'];
$sizemin = $_GET['sizeMin'];
$sizemax = $_GET['sizeMax'];

$b20= $_GET['b20'];
$fingerprint= $_GET['fingerprint'];
$dualsim= $_GET['dualsim'];
$sdcard= $_GET['sdcard'];
$jack= $_GET['jack'];
$waterproof= $_GET['waterproof'];
$rugged= $_GET['rugged'];

$memory_code = [16, 32, 64, 128];

$phone_data = $bdd->query('SELECT * FROM smartphonenotes');

$top3 = [0, 0, 0];
$scoretab = [];
$specstab = [];
$selection = ["false", "false", "false"];

while ($donnees = $phone_data->fetch()) {
    $prix = [];
    $stockage = [];
    $phone_prix = $bdd->query('SELECT * FROM smartphonestocks WHERE idPhone='.$donnees["idPhone"].' ORDER BY stockage');
    $phone_specs_base = $bdd->query('SELECT * FROM smartphonespecs WHERE idPhone='.$donnees["idPhone"]);
    $phone_specs= $phone_specs_base->fetch();
    $priceBool = false;

    while ($donneesstocks = $phone_prix->fetch()) {
        if ($donneesstocks['prix'] < $prixmax AND $donneesstocks['stockage'] >= $memory_code[$stockagemin])
            $priceBool = true;

        if ($donneesstocks['stock'] < 0)
            continue;
        array_push($prix, $donneesstocks['prix']);
        array_push($stockage, $donneesstocks['stockage']);
    }

    if (count($prix) <= 0)
        continue;

    $tailleBool = ($phone_specs["taille"] >= $sizemin AND $phone_specs["taille"] <= $sizemax);
    $b20Bool = ($b20 == 'true') ? strpos($phone_specs["bande4g"], "\"800") : true;
    $ruggedBool = ($rugged  == 'true') ? strpos($phone_specs["materiaux"], "Rugged") : true;
    $fingerprintBool = ($fingerprint  == 'true') ? strpos($phone_specs["capteurs"], "Fingerprint") : true;
    $dualsimBool = ($dualsim  == 'true') ? ($phone_specs["dualsim"] == 1) : true;
    $sdcardBool = ($sdcard  == 'true') ? ($phone_specs["sdcard"] == 1) : true;
    $jackBool = ($jack == 'true') ? ($phone_specs["jack"] == 1) : true;
    $waterproofBool = ($waterproof  == 'true') ? ($phone_specs["resistance"] != "-") : true;

    //
    if ($priceBool AND $jackBool AND $tailleBool AND $b20Bool AND $ruggedBool AND $fingerprintBool AND $dualsimBool AND $sdcardBool AND $waterproofBool) {
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
            $score += $donnees['camera']*1.2;
            $nb_critere += 1.2;
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

        $data = '{
            "id": '. $donnees['idPhone'] .',
            "modele": "'. $donnees['phoneName'] .'",
            "design": '. $donnees['design'] .',
            "batterie": '. $donnees['batterie'] .',
            "camera": '. $donnees['camera'] .',
            "puissance": '. $donnees['puissance'] .',
            "reseau": '. $donnees['reseau'] .',
            "solidite": '. $donnees['solidite'] .',
            "prix": '. json_encode($prix) .',
            "stockage": '. json_encode($stockage) .',
            "taille": '. $phone_specs["taille"] .',
            "note": '. $donnees['ki'] .'
        }';
        array_push($scoretab, [$donnees['idPhone'], $score, $data]);
        array_push($specstab, [$donnees['idPhone'], $data]);

        if ($score > $top3[2]) {
            if ($score > $top3[1]) {
                if ($score > $top3[0]) {
                    $top3[2] = $top3[1];
                    $top3[1] = $top3[0];
                    $top3[0] = $score;

                    $selection[2] = $selection[1];
                    $selection[1] = $selection[0];
                    $selection[0] = $data;

                }
                else {
                    $top3[2] = $top3[1];
                    $top3[1] = $score;
                    $selection[2] = $selection[1];
                    $selection[1] = $data;
                }
            }
            else {
                $top3[2] = $score;
                $selection[2] = $data;
            }
        }
    }
}

foreach ($scoretab as $key => $row) {
    $ids[$key]  = $row[0];
    $scoreSubtab[$key] = $row[1];
}
array_multisort($scoreSubtab, SORT_DESC, $ids, SORT_ASC, $scoretab);
//print_r($scoretab);
//echo $score;
foreach ($scoretab as $key => $row) {
    $scoretab[$key] = json_encode($row);
}
echo json_encode($scoretab);
?>
