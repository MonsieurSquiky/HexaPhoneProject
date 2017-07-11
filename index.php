<!DOCTYPE html>
    <html>
        <head>
            <meta charset="utf-8" />
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
            <meta name="viewport" content="width=device-width" />
            <link rel="stylesheet" href="http://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.0.47/jquery.fancybox.min.css" />
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
            <link rel="stylesheet" type="text/css" href="./slick/slick.css">
            <link rel="stylesheet" type="text/css" href="./slick/slick-theme.css">
            <link rel="stylesheet" href="hexastyle.css" />
            <link rel="stylesheet" href="phoneListstyle.css" />
            <link rel="stylesheet" href="hexacharts.css" />
            <link rel="stylesheet" href="style.css" />
            <script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>


            <title> Choisis un smartphone </title>
        </head>
        <body>
            <header>
                <?php include("header.html"); ?>
            </header>

            <section class="main_section height_section light_blue">
                <div class="wrapper wrapper_reverse row">
                    <div class=" text_block  col-xs-12 col-sm-6 col-md-6 col-lg-5">
                        <p class="big_title">
                            Un besoin,<br>
                            Un smartphone
                        </p>
                        <p class="description secundary_text">
                            Besoin d'un smartphone avec une batterie de plus de 48h d'autonomie ? D'un photophone de qualité ?
                            D'une machine capable de faire tourner tous les jeux et applis mobiles ? <br>
                            Trouvez le ici, en 2 clics.
                        </p>
                        <a class="button_perso main_button" href="phonefinder.php"> Chercher un smartphone </a>
                    </div>
                    <div class="alone_block top_hexa col-xs-12 col-sm-6 col-md-6 col-lg-7">
                        <?php include("hexazone.html") ?>
                        <div class="box-center phoneFinder">
                            <a data-fancybox data-src="#hidden-content" class="" style="display:flex" href="javascript:;">
                                <img alt="Trouvez votre smartphone idéal"  src="pictures/search_icon.png" />
                            </a>

                            <span class="liste_selection"> Cliquez, Trouvez </span>
                        </div>
                    </div>
                    </div>
                </div>
            </section>
            <!--
            <section class="main_section">
                <div class="wrapper">
                    <div class="inline_block link_pic">
                        <img class="phone_pic" src="pictures/bluePhone.png" alt="Smartphone" />
                    </div>
                    <div class="inline_block centered_block">
                        <p class="big_title">
                            Un besoin,<br>
                            Un smartphone
                        </p>
                        <p class="description secundary_text">
                            Besoin d'un smartphone avec une batterie de plus de 48h d'autonomie ? D'un photophone de qualité ?
                            D'une machine capable de faire tourner tous les jeux et applis mobiles ? <br>
                            Trouvez le ici, en 2 clics.
                        </p>
                        <a class="button_perso main_button" href="#stats"> En savoir plus </a>
                    </div>
                </div>
            </section>
            -->

            <!--
            <section id="stats" class="main_section link_section dark_grey">

                <div class="title_block">
                    <p class="section_title turquoise_title"> Notre gamme de smartphone en chiffres </p>
                </div>
                <div class="wrapper stats_wrapper">
                        <div class="inline_block">
                            <img class="stats_img" src="pictures/flat_phone.png" />

                        </div>
                        <div class="inline_block stats_content">
                            <p class="minor_stat"> Une capacité de stockage variée : 32Go / 64Go/ 128Go </p>
                            <p class="minor_stat"> Des smartphones Dual-Sim </p>
                            <p class="minor_stat"> Des prix scandaleusement bas : </p>
                            <span class="button_perso main_button price"> 200€ en moyenne </span>
                        </div>
                        <div class="inline_block">
                            <img class="stats_img" src="test5.png" />
                        </div>
                </div>
            </section>
            -->
            <section class="main_section height_section .container" style="background-color:#ebeff2">
                <!--
                <div class="title_block">
                    <p class="section_title blue_title"> D'où viennent nos smartphones ? </p>
                </div>
                -->
                <div class="wrapper row">

                    <div class=" col-lg-6 col-sm-6 col-md-6 col-xs-12">
                        <div class=" slider slick-slider brand_slider">
                            <div class="slick-slide ">
                            <img class="desc_img brand brand-0" src="pictures/logo_xiaomi.png" alt="Logo Xiaomi" />
                            </div>
                            <div class="slick-slide ">
                            <img class="desc_img brand brand-1 brand-mini" src="pictures/logo_lenovo.png" alt="Logo Lenovo" />
                            </div>
                            <div class="slick-slide ">
                            <img class="desc_img brand brand-2 brand-mini" src="pictures/logo_leeco.png" alt="Logo Leeco" />
                            </div>
                        </div>
                    </div>
                    <div class="text_block nomargin col-sm-6 col-md-5 col-lg-4 col-xs-12">
                        <span class="promote_title"> Il y a moins bien, mais c'est plus cher </span>
                        <p class="promote"> Les smartphones que nous vendont sont des Xiaomi, des LeEco, des Lenovo et ceux de bien d'autres marques chinoises.
                        Vous ne les connaissez peut être pas mais ces marques produisent des téléphones haut de gamme d'une grande qualité à prix imbattables. </p>
                        <a class="button_perso main_button blue_button" href="#hexacore"> Plus de détails </a>
                    </div>
                 </div>
            </section>

            <!--
            <section class="main_section link_section fact_section">
                <div class="wrapper row highlight_fact">
                    <div id="pros2" class="col-5 col-lg-3 top_block ">
                        <img class="desc_img" src="pictures/fun_fact.png" alt="Logo Xiaomi" />
                    </div>
                    <div id="pros1" class="col-4 col-lg-9  inline_block">
                        <span class="promote_title"> Le saviez vous ? </span>
                        <p class="promote"> Apple et Samsung utilisent des sous-traitants (tels que Foxconn par exemple)
                        pour fabriquer leurs appareils. Et les marques chinoises que nous vous proposons font appel aux
                        mêmes sous traitants : les iPhones et nos smartphones sortent des mêmes usines ! </p>
                    </div>

                 </div>
            </section>
            -->
            <section id="speech" class=" height_section dark_grey">
                <!--
                <div class="title_block">
                    <p class="section_title blue_title"> Pourquoi acheter chez nous ? </p>
                </div>
                -->
                <div class="wrapper promote_wrapper ">
                    <div class="row" style="margin-left:0px">
                        <div id="pros1" class=" centered_block promote_block col-xs-12 col-sm-6 col-md-4 col-lg-4">
                            <i class="main_icon">
                            </i>
                            <span class="promote_title"> Livraison depuis la France </span>
                            <p class="promote"> Nos smartphones viennent de Chine mais nous les stockons en France.
                                 Ainsi vous ne risquez aucun frais de de douane et ,
                                  du fait que nous les expédions sous 48h après votre commande, vous les recevez très rapidement.   </p>
                            <a class="button_perso main_button blue_button" href="#hexacore"> Plus de détails </a>
                        </div>

                        <div id="pros2" class="centered_block promote_block col-xs-12 col-sm-6 col-md-4 col-lg-4">
                            <i class="main_icon">
                            </i>
                            <span class="promote_title"> Service après vente en France </span>
                            <p class="promote"> Tous nos smartphones sont garantis pendant 1 an et toutes les réparations se
                                font en France. De plus, si vous trouvez que la réparation est trop longue, nous pouvons vous prëter
                                un smartphone gratuitement !</p>
                            <a class="button_perso main_button blue_button" href="#hexacore"> En savoir plus </a>
                        </div>
                        <div id="pros3" class="centered_block promote_block col-xs-12 col-sm-12 col-md-4 col-lg-4  ">
                            <i class="main_icon">
                            </i>
                            <span class="promote_title"> Personnalisez votre smartphone </span>
                            <p class="promote"> Vous désirez une interface unique pour votre nouveau smartphone ?
                                Ou encore débloquer des fonctions spéciales ? Nous pouvons vous y aider
                                avec des tutoriels précis et clairs, ou même le faire pour vous si vous le désirez.
                            </p>
                            <a class="button_perso main_button blue_button" href="#hexacore"> En savoir plus </a>
                        </div>
                    </div>
                </div>
            </section>
            <div style="display:none">
                <div id="hidden-content">
                    <div class="content_wrapper">
                        <div id="node_template" class="phone_stat">
                            <div class="circle_rank">
                                <h2 class="circle_rank-number"> 1 <h2>
                            </div>
                            <div class="phone_title">
                                <h2> Nom du smartphone</h2>
                            </div>
                            <div class="row flex-row">
                                <div class="img_block phoneList_col col-sm-3 col-md-3 col-lg-2 col-xs-4">
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
                            <div class="row">
                                <div class=" hidden-sm hidden-md hidden-lg col-xs-12">
                                    <div class="stats_content autoblock">
                                        <!--
                                        <p class=""> - Taille du smartphone </p>
                                        <p class=""> - Versions disponibles </p>
                                        <p class=""> - Autres options </p>
                                        -->
                                        <span class="button_perso main_button price button-xs"> Prix </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="moreDetail flexblock">
                            <a class="autoblock button_perso main_button" href="./phonefinder.php"> Plus de choix </a>
                        </div>
                    </div>
                </div>
            </div>

            <script src="hexascript.js"> </script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.0.47/jquery.fancybox.min.js"></script>
            <script src="./slick/slick.js" type="text/javascript" charset="utf-8"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
            <script src="https://code.highcharts.com/highcharts.js"></script>
            <script src="https://code.highcharts.com/highcharts-more.js"></script>
            <script src="https://code.highcharts.com/modules/exporting.js"></script>
            <script src="hexacharts.js"> </script>

            <script type="text/javascript">

                $(document).ready(function(){
                    $( window ).resize(function() {
                        setDisableArea();
                    });
                    $( ".disable_area" ).click(function() {
                        $(this).hide();
                    });

                    $('.slider').on('beforeChange', function(event, slick, currentSlide, nextSlide){
                        //alert(".brand-"+currentSlide);
                        $(".brand-"+currentSlide).attr("class", "brand brand-"+currentSlide+" brand-mini");
                        $(".brand-"+nextSlide).attr("class", "brand-"+nextSlide+" brand");
                      // left
                    });
                    $(".brand_slider").slick({
                        centerMode: true,
                        autoplay: true,
                        autoplaySpeed: 1500,
                        arrows: false
                        /*
                        dots: false,
                        infinite: true,
                        centerMode: true,
                        arrows: false,
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        variableWidth: true,
                        autoplay: true,
                        autoplaySpeed: 1500,
                        vertical: false
                        */
                    });

                    setDisableArea();
                });

                function loadPhones(phone_liste) {
                    console.log("reach");
                }

                function setDisableArea() {
                    var height = $( "body" ).css("height");
                    $( ".disable_area" ).css("height", height);
                }
            </script>
        </body>
</html>
