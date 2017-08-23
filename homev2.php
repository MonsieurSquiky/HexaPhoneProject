<!DOCTYPE html>
    <html>
        <head>
            <meta charset="utf-8" />
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
            <meta name="viewport" content="width=device-width" />
            <link rel="stylesheet" href="http://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.0.47/jquery.fancybox.min.css" />
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
            <link rel="stylesheet" href="styles/homev2.css">

            <link rel="stylesheet" type="text/css" href="slick/slick.css">
            <link rel="stylesheet" type="text/css" href="slick/slick-theme.css"/>
            <title> Choisis un smartphone </title>
        </head>
        <body>
            <?php include("header.html"); ?>
            <section class="section-colored top-section">
                <div class="background-image background-top">
                </div>

                    <?php// include("hexazone.html") ?>
                    <!--
                    <h2 class= "text-center"> Votre smartphone idéal, <br />
                        A tous les prix</h2>
                    -->
                    <div id="myCarousel" class="carousel slide top-carousel" data-ride="carousel"  style="position:relative; z-index:10">
                      <!-- Indicators -->
                      <ol class="carousel-indicators">
                        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                        <li data-target="#myCarousel" data-slide-to="1"></li>
                      </ol>

                      <!-- Wrapper for slides -->
                      <div class="carousel-inner">
                        <div class="item active">
                          <?php include("modules/carousel-slide/carousel-slide.php"); ?>
                        </div>

                        <div class="item">
                          <?php include("modules/carousel-slide/carousel-slide1.php"); ?>
                        </div>

                      </div>

                      <!-- Left and right controls -->
                      <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left"></span>
                        <span class="sr-only">Previous</span>
                      </a>
                      <a class="right carousel-control" href="#myCarousel" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right"></span>
                        <span class="sr-only">Next</span>
                      </a>
                    </div>


                    <!--
                    <div class="icon-band">
                        <div class="row">

                            <div class=" col-lg-12 col-sm-12 col-md-12 col-xs-12">
                                <div class="icon_slider">
                                    <div class="slick-slide ">
                                    <img class="desc_img brand brand-0" src="pictures/icons/phone-audio.png" alt="Logo Xiaomi" />
                                    </div>
                                    <div class="slick-slide ">
                                    <img class="desc_img brand brand-1 brand-mini" src="pictures/icons/phone-game.png" alt="Logo Lenovo" />
                                    </div>
                                    <div class="slick-slide ">
                                    <img class="desc_img brand brand-2 brand-mini" src="pictures/icons/borderless.png" alt="Logo Leeco" />
                                    </div>
                                    <div class="slick-slide ">
                                    <img class="desc_img brand brand-3 brand-mini" src="pictures/icons/blackberrystyle.png" alt="Logo Leeco" />
                                    </div>
                                </div>
                            </div>
                        </div>

                     </div>
                 -->




            </section>
            <section class="section-fullheight">
                <div class="container">
                    <?php //include("modules/brandslider/brandslider.html") ?>
                    <h2 class="text-center"> Lequel est fait pour vous ? <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                    </h2>
                    <div class="wrapper-flex">
                        <div class="block-centered">
                            <div class="row">
                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                    <?php include("hexazone.html") ?>

                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                    <?php include("modules/filterzone/filterzone.html"); ?>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="row breezing">
                        <a href="#result_section" class="js-scrollTo">
                            <span id="" class="button_perso main_button phoneFinder autoblock"> Lancer la recherche </span>
                        </a>
                    </div>
                </div>
            </section>

            <?php include("modules/filterzone/result.html"); ?>
            <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
            <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
            <script src="jquery.ui.touch-punch.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
            <script type="text/javascript" src="slick/slick.min.js"></script>
            <script src="hexascript2.js"> </script>
            <script src="modules/filterzone/filterzone.js"></script>
            <script src="modules/brandslider/brandslider.js"></script>

            <script src="https://code.highcharts.com/highcharts.js"></script>
            <script src="https://code.highcharts.com/highcharts-more.js"></script>
            <script src="https://code.highcharts.com/modules/exporting.js"></script>
            <script src="hexacharts.js"> </script>
            <script type="text/javascript">

                $(document).ready(function(){

                    $( "#result_section").hide();


                    $( ".moreNodes" ).click(function(e) {
                        var limit = Math.min(10, phoneData.length)
                        addPhoneNode(limit, phoneData);
                        createCharts(limit);
                        updateCharts(limit, phoneData);
                        $( this ).hide();
                    });

                    $('.js-scrollTo').on('click', function(e) { // Au clic sur un Ã©lÃ©ment
                        e.preventDefault();
                        var page = $(this).attr('href'); // Page cible
                        var speed = 750; // DurÃ©e de l'animation (en ms)
                        var topScreen = $(page).offset().top;

                        if ($( "#flag" ).css("position") == "fixed")
                            topScreen -= parseInt($( "#flag" ).css("height"), 10);
                        $('html, body').animate( { scrollTop: topScreen }, speed ); // Go

                    });
                });
            </script>
        </body>
</html>
