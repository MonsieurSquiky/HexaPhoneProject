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

            <?php include("header.html"); ?>
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

                    <?php include("modules/filterzone/filterzone.html"); ?>
                </div>
            </section>
            <section id="result_section" class="main_section dark_grey">
                <div class="wrapper_centered">

                    <div id="node_template" class="phone_stat">
                        <div class="circle_rank">
                            <h2 class="circle_rank-number"> 1 <h2>
                        </div>

                        <div class="block_content">
                            <a class="phonelink" href="test.html">
                            <div class="phone_title">

                                    <h2>Nom du smartphone </h2>

                            </div>
                            </a>
                            <div class="row flex-row">
                                <div class="img_block phoneList_col col-sm-3 col-md-3 col-lg-3 col-xs-4">
                                    <a class="phonelink" href="">
                                        <img class="stats_img" src="pictures/phonePics/phonepic753.jpg" />
                                    </a>
                                </div>
                                <div class="phoneList_col col-sm-4 col-md-4 col-lg-4 hidden-xs">
                                    <div class="stats_content autoblock">
                                        <p class="phone_taille"> - Taille du smartphone </p>
                                        <p class="phone_stockage"> - Versions disponibles </p>
                                        <a class="phonelink" href="test.html"> <span class="button_perso main_button price"> Prix </span> </a>
                                    </div>
                                </div>
                                <div class=" phoneList_col col-sm-5 col-md-5 col-lg-5 col-xs-7">
                                    <div id="container" class="hexachart"> </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class=" hidden-sm hidden-md hidden-lg col-xs-12">
                                    <div class="stats_content autoblock">
                                        <!--
                                        <p class=""> - Taille du smartphone </p>
                                        <p class=""> - Versions disponibles </p>
                                        <p class=""> - Autres options </p>
                                        -->
                                         <a class="phonelink" href="test.html"> <span class="button_perso main_button price button-xs"> Prix </span> </a>
                                    </div>
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
            <script src="modules/filterzone/filterzone.js"></script>
            <script type="text/javascript">

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
