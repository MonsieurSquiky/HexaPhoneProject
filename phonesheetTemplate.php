<!DOCTYPE html>
    <html style="width:100%;height:100%">
    <?php
    include("header.html");

    $id = isset($_GET["id"]) ? $_GET["id"] : 683;
    $file = file_get_contents('likes.json');
    $jsonLikes = json_decode($file);

    for ($i=0; $i<count($jsonLikes); $i++) {
        if ($jsonLikes[$i]->idPhone == $id) {
            $comments = $jsonLikes[$i];
            break;
        }
    }


    // on se connecte à notre base de données
    try {
        //$bdd = new PDO('mysql:host=hexaphonhdv1.mysql.db;dbname=hexaphonhdv1', 'hexaphonhdv1', 'HkE4WhD2');
        $bdd = new PDO('mysql:host=localhost;dbname=hexaphone', 'root', 'morydalveen10');
        //$bdd = new PDO('mysql:host=sql.free.fr;dbname=moryfodecisse', 'moryfodecisse', 'mory10');

    }
    catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
    // On traite en UTF-8 pour les accents
    $bdd->exec("SET CHARACTER SET utf8");
    $notes = $bdd->query('SELECT * FROM smartphonenotes WHERE idPhone = '.$id)->fetch();
    $specs = $bdd->query('SELECT * FROM smartphonespecs WHERE idPhone = '.$id)->fetch();
    $versions = $bdd->query('SELECT * FROM smartphonestocks WHERE idPhone = '.$id.' ORDER BY ram');

    $temp = [];
    while ($data = $versions->fetch()) {
        $prix = (isset($prix)) ? $prix : $data["prix"];
        array_push($temp, $data);
    }
    $versions = $temp;

    ?>
        <head>
            <meta charset="utf-8" />
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
            <meta name="viewport" content="width=device-width" />
            <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
            <link rel="stylesheet" href="phoneListstyle.css">
            <link rel="stylesheet" href="phonesheet.css" />
            <title> Acheter <?php echo $notes["phoneName"]; ?> </title>

        </head>
        <body>
            <section style="padding-top:52px;">
                <div class="container main_wrapper">
                    <div class="row" >
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                            <div class="img-box">
                                <img alt="Da smartphone" src="pictures/phone-<?php echo $id; ?>/phoneZoom.png " class="img-borderbox bigpic"/>
                                <span id="phoneName-xs" class="img-title hidden-sm hidden-md hidden-lg"> <?php echo $notes["phoneName"]; ?> </span>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                            <div class="content-box small-box">
                                <span id="phoneName" class="content-title hidden-xs title-sm"> <?php echo $notes["phoneName"]; ?> </span>
                                <button type="button" class="content-button btn btn-default btn-block " data-toggle="collapse" data-target="#content-color"> <span class="onglet main-text">Couleurs</span> <div class="right-glyph"><span class="caret"></span> </div></button>
                                <div id="content-color" class="collapse main-text">
                                    <?php
                                    $colors = json_decode($specs["couleurs"]);
                                    for ($i=0;$i<count($colors); $i++) {
                                        if ($colors[$i] != "") {
                                     ?>
                                    <label class=" radio-inline colorPhone-label row">

                                        <input class="colorPhone-input col-xs-2" type="radio" name="optradio">
                                        <span  class="colorPhone-input col-xs-4">
                                            <?php echo $colors[$i]; ?>
                                        </span>
                                        <img class="label-img col-xs-6" src="pictures/phone-<?php echo $id; ?>/color-<?php echo $colors[$i]; ?>.jpg" />
                                    </label>
                                    <?php
                                        }
                                    }
                                     ?>

                                </div>
                                <button type="button" class="content-button btn btn-default btn-block " data-toggle="collapse" data-target="#content-version"> <span class="onglet main-text">Versions</span> <div class="right-glyph"><span class="caret"></span> </div></button>
                                <div id="content-version" class="collapse main-text">
                                    <?php
                                    for ($i=0;$i<count($versions);$i++) {
                                        echo '<label class="radio text-label" onclick="setPrice('.$versions[$i]['prix'].')"><input type="radio" name="version-choice">'.$versions[$i]['ram'].' Go de RAM / '.$versions[$i]['stockage'].' Go de stockage </label>';
                                    } ?>
                                </div>
                                <button type="button" class="content-button btn btn-default btn-block " data-toggle="collapse" data-target="#content-goodies"> <span class="onglet main-text">Accessoires</span> <div class="right-glyph"><span class="caret"></span> </div></button>
                                <div id="content-goodies" class="collapse main-text">
                                    <label class="checkbox text-label"><input type="checkbox" value="">Screen Protector <b> offert</b></label>
                                    <label class="checkbox text-label"><input type="checkbox" value="">Silicone Case <b> offert</b></label>
                                    <label class="checkbox text-label"><input type="checkbox" value=""> Super Stylish Case</label>
                                </div>
                                <button id="prix" type="button" class="btn btn-danger btn-block price_button"> <?php echo $prix; ?> € </button>

                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <div class="container large-container">
              <ul class="nav nav-tabs tight-tabs title-sm">
                <li class="active"><a data-toggle="tab" href="#picshow">Presentation</a></li>
                <li><a data-toggle="tab" href="#menu2">Fiche Technique</a></li>
                <li><a data-toggle="tab" href="#menu3">Notre avis</a></li>
                <!--<li><a data-toggle="tab" href="#menu4">Vos garanties</a></li> -->
              </ul>

              <div class="tab-content">
                <div id="picshow" class="tab-pane fade in active container">
<?php           $i = 1;
                while (file_exists("pictures/phone-".$id."/showpic".$i.".jpg")) {
                    ?>

                        <img src="<?php echo "pictures/phone-".$id."/showpic".$i.".jpg" ?>" class="img-borderbox"  />
<?php
                        $i++;
                    }
                    ?>
                </div>

                <div id="menu2" class="tab-pane fade">
                    <div class="content-box main-text">
                        <table class="datasheet table table-striped table-bordered">
                            <tbody>
                                <tr>
                                    <td>
                                        Taille de l'écran
                                    </td>
                                    <td id="taille">
                                        <?php echo $specs["taille"]; ?> pouces
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Type de l'écran
                                    </td>
                                    <td id="screenType">
                                        <?php echo $specs["screenType"]; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Résolution de l'écran
                                    </td>
                                    <td id="resolution">
                                        <?php echo $specs["resolution"]; ?>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        Processeur
                                    </td>
                                    <td id="CPU">
                                        <?php echo $specs["processeur"]; ?> <br />
                                        <?php echo $specs["CPUtype"]; ?> <br />
                                        <?php echo $specs["frequence"]; ?> GHz
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Graphismes
                                    </td>
                                    <td id="GPU">
                                        <?php echo $specs["GPU"]; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        RAM
                                    </td>
                                    <td id="ram">
                                        6 GB
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Stockage
                                    </td>
                                    <td id="stockage">
                                        128 GB
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Appareil Photo
                                    </td>
                                    <td id="camera">
                                        <?php echo $specs["cameraCapteur"]; ?> <br />
                                        <?php echo $specs["cameraType"]; ?> <br />
                                        <?php echo $specs["cameraResolution"]; ?> Mpx
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Options de l'appareil photo
                                    </td>
                                    <td >
                                        <?php
                                        $options = json_decode($specs["cameraOptions"]);
                                        echo $options[0];
                                        for ($i=1;$i < count($options);$i++) {
                                            echo " <br />".$options[$i];
                                        } ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Video Slow Motion
                                    </td>
                                    <td>
                                        <?php echo $specs["slowmo"]; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Optical Image Stabilisation (OIS)
                                    </td>
                                    <td>
                                        <?php echo ($specs["OIS"] != 0) ? "Oui" : "Non"; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Frequences
                                    </td>
                                    <td>
                                        Bandes 2G : <?php
                                        $bandes = json_decode($specs["bande2g"]);
                                        echo $bandes[0];
                                        for ($i=1;$i < count($bandes);$i++) {
                                            echo ", ".$bandes[$i];
                                        } ?> <br />
                                        Bandes 3G : <?php
                                        $bandes = json_decode($specs["bande3g"]);
                                        echo $bandes[0];
                                        for ($i=1;$i < count($bandes);$i++) {
                                            echo ", ".$bandes[$i];
                                        } ?> <br />
                                        Bandes 4G : <?php
                                        $bandes = json_decode($specs["bande4g"]);
                                        echo $bandes[0];
                                        for ($i=1;$i < count($bandes);$i++) {
                                            echo ", ".$bandes[$i];
                                        } ?> <br />
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Batterie
                                    </td>
                                    <td >
                                        <?php echo $specs["batterieCapacite"]; ?> mAh <br />
                                        <?php echo $specs["batterieType"]; ?> <br />
                                        <?php echo $specs["batterieOption"]; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Technologie GPS
                                    </td>
                                    <td>
                                        <?php
                                        $gps = json_decode($specs["gps"]);
                                        echo $gps[0];
                                        for ($i=1;$i < count($gps);$i++) {
                                            echo " <br />".$gps[$i];
                                        } ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Dual Sim ?
                                    </td>
                                    <td>
                                        <?php echo ($specs["dualsim"] != 0) ? "Oui" : "Non"; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        NFC (Paiement sans contact)
                                    </td>
                                    <td>
                                        <?php echo ($specs["nfc"] != 0) ? "Oui" : "Non"; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Radio
                                    </td>
                                    <td>
                                        <?php echo ($specs["radio"] != 0) ? "Oui" : "Non"; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Prise Jack
                                    </td>
                                    <td>
                                        <?php echo ($specs["jack"] != 0) ? "Oui" : "Non"; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Capteurs
                                    </td>
                                    <td>
                                        <?php
                                        $capteurs = json_decode($specs["capteurs"]);
                                        echo $capteurs[0];
                                        for ($i=1;$i < count($capteurs);$i++) {
                                            echo " <br />".$capteurs[$i];
                                        } ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Dimensions
                                    </td>
                                    <td >
                                        Largeur : <?php echo $specs["largeur"]; ?> mm <br />
                                        Longueur : <?php echo $specs["longueur"]; ?> mm <br />
                                        Epaisseur : <?php echo $specs["epaisseur"]; ?> mm
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Poids
                                    </td>
                                    <td >
                                        <?php echo $specs["poids"]; ?> grammes
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Materiaux
                                    </td>
                                    <td>
                                        <?php
                                        $materiaux = json_decode($specs["materiaux"]);
                                        echo $materiaux[0];
                                        for ($i=1;$i < count($materiaux);$i++) {
                                            echo " <br />".$materiaux[$i];
                                        } ?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div id="menu3" class="tab-pane fade">
                    <div class="notes content-box container main-text">

                                <div class="row">
                                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                        <ul class="space_box">
                                            <li>
                                                <span class="field">
                                                    Design :
                                                </span>
                                                <div class="progress">
                                                      <div id="design-bar" class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40"
                                                      aria-valuemin="0" aria-valuemax="10" style="width:<?php echo $notes["design"]*10; ?>%">
                                                        <b> <?php echo $notes["design"]; ?> / 10 </b>
                                                      </div>
                                                </div>
                                            </li>
                                            <li>
                                                <span class="field">
                                                    Puissance :
                                                </span>
                                                <div class="progress">
                                                      <div id="puissance-bar" class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40"
                                                      aria-valuemin="0" aria-valuemax="10" style="width:<?php echo $notes["puissance"]*10; ?>%">
                                                        <b>  <?php echo $notes["puissance"]; ?> / 10 </b>
                                                      </div>
                                                </div>
                                            </li>
                                            <li>
                                                <span class="field">
                                                    Batterie :
                                                </span>
                                                <div class="progress">
                                                      <div id="batterie-bar" class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="40"
                                                      aria-valuemin="0" aria-valuemax="10" style="width:<?php echo $notes["batterie"]*10; ?>%">
                                                        <b> <?php echo $notes["batterie"]; ?> / 10 </b>
                                                      </div>
                                                </div>
                                            </li>
                                            <li>
                                                <span class="field">
                                                    Camera :
                                                </span>
                                                <div class="progress">
                                                      <div  id="camera-bar" class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40"
                                                      aria-valuemin="0" aria-valuemax="10" style="width:<?php echo $notes["camera"]*10; ?>%">
                                                        <b> <?php echo $notes["camera"]; ?> / 10 </b>
                                                      </div>
                                                </div>
                                            </li>
                                            <li>
                                                <span class="field">
                                                    Solidite :
                                                </span>
                                                <div id="solidite-bar" class="progress">
                                                      <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="40"
                                                      aria-valuemin="0" aria-valuemax="10" style="width:<?php echo $notes["solidite"]*10; ?>%">
                                                        <b> <?php echo $notes["solidite"]; ?> / 10 </b>
                                                      </div>
                                                </div>
                                            </li>
                                            <li>
                                                <span class="field">
                                                    Reseau :
                                                </span>
                                                <div  id="reseau-bar" class="progress">
                                                      <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40"
                                                      aria-valuemin="0" aria-valuemax="10" style="width:<?php echo $notes["reseau"]*10; ?>%">
                                                        <b> <?php echo $notes["reseau"]; ?> / 10 </b>
                                                      </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-sm-4 col-md-4 col-lg-4 col-xs-12">
                                        <div class="text_box">
                                            <div class="comments_title" style="color: green;"> Les Plus : </div>
                                            <ul id="pros" class="comments pros">
                                                <?php
                                                for ($j=0; $j<count($comments->pros);$j++) {
                                                    echo "<li><span> ".$comments->pros[$j]."</span></li>";
                                                }
                                                ?>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-sm-4 col-md-4 col-lg-4 col-xs-12">
                                        <div class="text_box">
                                            <div class="comments_title" style="color: red;"> Les Moins : </div>
                                            <ul id="cons" class="comments cons">
                                                <?php
                                                for ($j=0; $j<count($comments->cons);$j++) {
                                                    echo "<li><span> ".$comments->cons[$j]."</span></li>";
                                                }
                                                ?>
                                            </ul>
                                        </div>
                                    </div>

                                </div>
                    </div>
                </div>
              </div>
            </div>

            <section id="garanties">
            </section>
            <section id="fiche_technique">
            </section>
            <section id="presentation">
            </section>
            <section id="avis">
                <!--

            -->
            </section>
            <script src="jquery/jquery-3.2.1.min.js"></script>
            <script src="bootstrap/js/bootstrap.min.js"></script>
            <script>
            function setPrice(prix) {
                $( "#prix" ).html(prix+" €");
            }
            </script>

        </body>
    </html>
