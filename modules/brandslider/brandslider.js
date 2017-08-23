                $(document).ready(function(){

                    $(".brand_slider").slick({

                        centerMode: true,
                        variableWidth: true,
                        infinite: true,
                        autoplay: true,
                        autoplaySpeed: 2000,
                        arrows: true,
                        slidesToShow: 5,
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
