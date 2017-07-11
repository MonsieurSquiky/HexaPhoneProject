<!DOCTYPE html>
    <html>
        <head>
            <meta charset="utf-8" />
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
            <meta name="viewport" content="width=device-width" />
            <link rel="stylesheet" href="http://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
            <link rel="stylesheet" href="finderstyle.css" />
            <link rel="stylesheet" href="hexastyle.css" />
            <link rel="stylesheet" href="phoneListstyle.css" />
            <link rel="stylesheet" href="hexacharts.css" />
            <title> Choisis un smartphone </title>
        </head>
        <body>
            <header>
                <?php include("header.html"); ?>
            </header>
            <section class="main_section top_section light_blue">
                <div class="top_hexa fullblock col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div id="hexa_module" class="">
                        <?php include("hexazone.html") ?>
                        <div class="box-center phoneFinder">
                            <a style="display:flex" href="#filter_section" class="js-scrollTo">
                                <img alt="Trouvez votre smartphone idéal"  src="pictures/search_icon.png" />
                            </a>

                            <span class="liste_selection"> Cliquez, Trouvez </span>
                        </div>
                    </div>
                    </div>
                </div>
            </section>

            <section id="filter_section" class="main_section">
                <div class="wrapper">

                    <div class="row">
                        <p>
                          <label for="amount">Budget :</label>
                        </p>
                        <div id="slider-price" ></div>
                        <input type="text" id="price" class="inputs" readonly style="border:0; font-weight:bold;">
                    </div>
                    <div class="row">
                        <p> Capacité de stockage : </p>
                        <div id="slider-memory" ></div>
                        <input type="text" id="memory" class="inputs" readonly style="border:0; font-weight:bold;">
                    </div>
                    <div class="row">
                        <div class="col-xs-6">
                            <p> Ecran : </p>
                            <div id="slider-screen"  class="slider_row"></div>
                            <input type="text" id="screen" class="inputs" readonly style="border:0; font-weight:bold;">
                            <p> Résolution : </p>
                            <div id="slider-resolution" class="slider_row" ></div>
                            <input type="text" id="resolution" class="inputs" readonly style="border:0; font-weight:bold;">

                        </div>
                        <div class="col-xs-6 left-align">
                            Connectivité :

                            <div id="b20" class="checkbox">
                                <label><input type="checkbox" value="" checked="checked">4G SFR/Orange</label>
                            </div>

                            <div id="fingerprint" class="checkbox">
                                <label><input type="checkbox" value="">Capteur d'empreinte</label>
                            </div>

                            <div id="dualsim" class="checkbox">
                                <label><input type="checkbox" value="">Double-Sim</label>
                            </div>
                            <div id="sdcard" class="checkbox">
                                <label><input type="checkbox" value="">Carte SD</label>
                            </div>
                            <div id="jack" class="checkbox">
                                <label><input type="checkbox" value="">Prise Audio Jack</label>
                            </div>
                        </div>
                        <div class="col-xs-12">
                            Matériaux :
                            <div id="waterproof" class="checkbox">
                                <label><input type="checkbox" value="">Waterproof</label>
                            </div>
                            <div id="rugged" class="checkbox">
                                <label><input type="checkbox" value="">Ultra résistant</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <a href="#result_section" class="js-scrollTo">
                            <span id="" class="button_perso main_button phoneFinder"> Valider les critères secondaires </span>
                        </a>
                    </div>
                </div>
            </section>
            <section id="result_section" class="main_section dark_grey">
                <div class="wrapper_centered">

                    <div id="node_template" class="phone_stat">
                        <div class="circle_rank">
                            <h2 class="circle_rank-number"> 1 <h2>
                        </div>
                        <div class="block_content">
                            <div class="phone_title">
                                <h2> Nom du smartphone</h2>
                            </div>
                            <div class="row flex-row">
                                <div class="img_block phoneList_col col-sm-3 col-md-3 col-lg-3 col-xs-4">
                                    <img class="stats_img" src="pictures/phonePics/phonepic753.jpg" />
                                </div>
                                <div class="phoneList_col col-sm-4 col-md-4 col-lg-4 hidden-xs">
                                    <div class="stats_content autoblock">
                                        <p class="phone_taille"> - Taille du smartphone </p>
                                        <p class="phone_stockage"> - Versions disponibles </p>
                                        <p class="phone_option"> - Autres options </p>
                                        <span class="button_perso main_button price"> Prix </span>
                                    </div>
                                </div>
                                <div class=" phoneList_col col-sm-5 col-md-5 col-lg-5 col-xs-7">
                                    <div id="container" class="hexachart"> </div>
                                </div>
                            </div>
                            <div class="scroll-icon"> <img class="scroll-icon-im" src="pictures/down_arrow.png" alt="Devoiler avantages" /> </div>
                            <div class="inner_wrapper">
                                <div class="top-left-icon"> <img src="pictures/cross.png" alt="Fermer l'onglet" /> </div>
                                <div class="row" style="margin: 0px;">
                                    <div class="col-sm-6 col-md-6 col-lg-6 col-xs-12">
                                        <div class="text_box">
                                            <div class="comments_title" style="color: green;"> Les Plus : </div>
                                            <ul class="comments pros">

                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-6 col-xs-12">
                                        <div class="text_box">
                                            <div class="comments_title" style="color: red;"> Les Moins : </div>
                                            <ul class="comments cons">

                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="moreNodes">
                        <span class="moreNodes_button autoblock button_perso main_button white_button"> Voir plus </span>
                    </div>
                </div>
            </section>
            <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
            <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
            <script src="jquery.ui.touch-punch.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
            <script src="https://code.highcharts.com/highcharts.js"></script>
            <script src="https://code.highcharts.com/highcharts-more.js"></script>
            <script src="https://code.highcharts.com/modules/exporting.js"></script>
            <script src="hexacharts.js"> </script>
            <script src="hexascript2.js"></script>
            <script type="text/javascript">

                $( function() {
                    var memory_code = [16, 32, 64, 128];
                    var screen_code = ["Moyenne", "Grand", "Très Grand"];
                    var resolution_code = ["HD", "Full HD", "2K", "4K"];
                  $( "#slider-price" ).slider({
                    range: "min",
                    min: 90,
                    max: 900,
                    value: 450,
                    slide: function( event, ui ) {
                      $( "#price" ).val( "Prix max : " + ui.value + " €"  );
                    }
                  });
                  $( "#slider-memory" ).slider({
                      range: "max",
                      min: 0,
                      max: 3,
                      value: 0,
                      slide: function( event, ui ) {
                        $( "#memory" ).val( memory_code[ui.value] + " Go minimum"  );
                      }
                  });
                  $( "#slider-resolution" ).slider({
                      range: "max",
                      min: 0,
                      max: 3,
                      value: 0,
                      slide: function( event, ui ) {
                        $( "#resolution" ).val( "Au moins "+resolution_code[ui.value]  );
                      }
                  });
                  $( "#slider-screen" ).slider({
                      range: true,
                      min: 4.5,
                      max: 7,
                      values: [4.5, 7],
                      step: 0.1,
                      slide: function( event, ui ) {
                        $( "#screen" ).val( "Entre " + ui.values[0] + "\" et " + ui.values[1] + "\"");
                      }
                  });
                    $( "#price" ).val( "Prix max : " + $( "#slider-price" ).slider( "value") +
                    "€" );
                    $( "#memory" ).val( " 16 Go minimun" );
                    $( "#screen" ).val( "Toutes les tailles" );
                    $( "#resolution" ).val( "Au moins HD" );
                } );

                $('.js-scrollTo').on('click', function(e) { // Au clic sur un Ã©lÃ©ment
                    e.preventDefault();
                    var page = $(this).attr('href'); // Page cible
                    var speed = 750; // DurÃ©e de l'animation (en ms)
                    var topScreen = $(page).offset().top;

                    if ($( "#flag" ).css("position") == "fixed")
                        topScreen -= parseInt($( "#flag" ).css("height"), 10);
                    $('html, body').animate( { scrollTop: topScreen }, speed ); // Go

                });
                $(document).ready(function(){

                    $( "#result_section").hide();

                    $( ".moreNodes" ).click(function(e) {
                        var limit = Math.min(10, phoneData.length)
                        addPhoneNode(limit, phoneData);
                        createCharts(limit);
                        updateCharts(limit, phoneData);
                        $( this ).hide();
                    });
                });
            </script>
        </body>
    </html>
