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
                <div class="container">
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
                </div>



            </section>
            <section style="padding-top:50px">
                <div class="container">

                    <div class="row">

                        <div class=" col-lg-12 col-sm-12 col-md-12 col-xs-12">
                            <div class="brand_slider">
                                <div class="slick-slide ">
                                <img class="desc_img brand brand-0" src="pictures/brandLogo/logo-xiaomi.png" alt="Logo Xiaomi" />
                                </div>
                                <div class="slick-slide ">
                                <img class="desc_img brand brand-1 brand-mini" src="pictures/brandLogo/logo_lenovo.png" alt="Logo Lenovo" />
                                </div>
                                <div class="slick-slide ">
                                <img class="desc_img brand brand-2 brand-mini" src="pictures/brandLogo/logo-leeco.png" alt="Logo Leeco" />
                                </div>
                                <div class="slick-slide ">
                                <img class="desc_img brand brand-3 brand-mini" src="pictures/brandLogo/logo-blackview.png" alt="Logo Leeco" />
                                </div>
                                <div class="slick-slide ">
                                <img class="desc_img brand brand-4 brand-mini" src="pictures/brandLogo/logo-nubia.png" alt="Logo Leeco" />
                                </div>
                                <div class="slick-slide ">
                                <img class="desc_img brand brand-5 brand-mini" src="pictures/brandLogo/logo-oneplus.png" alt="Logo Leeco" />
                                </div>
                                <div class="slick-slide ">
                                <img class="desc_img brand brand-6 brand-mini" src="pictures/brandLogo/logo-umidigi.png" alt="Logo Leeco" />
                            </div>
                            </div>
                        </div>

                     </div>
                </div>
            </section>
            <script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
            <script type="text/javascript" src="slick/slick.min.js"></script>
            <script type="text/javascript">

                $(document).ready(function(){

                    $(".brand_slider").slick({

                        centerMode: true,
                        variableWidth: true,
                        infinite: true,
                        autoplay: true,
                        autoplaySpeed: 2000,
                        arrows: true,
                        slidesToShow: 1,
                        slidesToScroll: 3

                    });

                    $(".icon_slider").slick({

                        centerMode: true,
                        variableWidth: true,
                        infinite: true,
                        autoplay: true,
                        autoplaySpeed: 2000,
                        arrows: true,
                        slidesToShow: 1,
                        slidesToScroll: 3

                    });

                    var block_height = $(".brand_slider").height();

                    $(".slick-slide").each(function() {
                        var height = $( this ).height();
                        var diff = Math.ceil((block_height - height)/1.5);
                        console.log(diff);
                        $( this ).children().css("padding-top", diff+"px");

                    });
                });
            </script>
        </body>
</html>
