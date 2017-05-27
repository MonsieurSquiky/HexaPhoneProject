
//var unserialize = require('..').unserialize;
var searchname = {  "design": false,
            "puissance": false,
            "camera": false,
            "reseau": false,
            "solidite": false,
            "batterie": false};

var search = [0, 0, 0, 0, 0, 0];

var highlight = [0, 0, 0, 0, 0, 0];
// $( ".disable_area" ).hide();
$( "#box1-img-selected" ).hide();
$( "#box2-img-selected" ).hide();
$( "#box3-img-selected" ).hide();
$( "#box4-img-selected" ).hide();
$( "#box5-img-selected" ).hide();
$( "#box6-img-selected" ).hide();

$(document).ready(function(){
    $( window ).resize(function() {
        setHexazone();
    });

    $( ".box" ).click(function() {
        var num = $(this).attr('id')[3];
        search[num-1] = (search[num-1]==0) ? 1 : 0;
        if (search[num-1]==0) {
            $( "#"+$(this).attr('id')+"-img-selected" ).hide();
            $( "#"+$(this).attr('id')+"-img" ).show();
        }
        else {
            $( "#"+$(this).attr('id')+"-img-selected" ).show();
            $( "#"+$(this).attr('id')+"-img" ).hide();
        }
        highlightBox("#"+$(this).attr('id'));
    });

    $( ".phoneFinder" ).click(function(e) {
        e.preventDefault();

        var critere =JSON.stringify(search);
        var send = search;
        if (!search.some(function (element, index, tableau) { return element > 0; })) {
            send = [1, 1, 1, 1, 1, 1];
        }

        $.ajax({
            url: 'phone_selector.php',
            type: 'GET',
            data: {
                design: send[0],
                puissance: send[1],
                camera: send[2],
                connectivite: send[3],
                solidite: send[4],
                batterie: send[5],
            },
            dataType: 'json',
            success: function(data, statut) {
                console.log(data);
                var first = JSON.parse(data[0]);
                var second = JSON.parse(data[1]);
                var third = JSON.parse(data[2]);

                $( "#modele_phone1" ).html(first.modele);
                console.log($( "#modele_phone1" ).html());
                $( "#modele_phone2" ).html(second.modele);
                $( "#modele_phone3" ).html(third.modele);

                $( "#prix_phone1" ).html(Math.min(...first.prix)+" €");
                $( "#prix_phone2" ).html(Math.min(...second.prix)+" €");
                $( "#prix_phone3" ).html(Math.min(...third.prix)+" €");

                $( "#image_phone1" ).attr("src", "pictures/phonePics/phonepic"+first.id+".jpg");
                $( "#image_phone2" ).attr("src", "pictures/phonePics/phonepic"+second.id+".jpg");
                $( "#image_phone3" ).attr("src", "pictures/phonePics/phonepic"+third.id+".jpg");

                $( "#taille_phone1" ).html(" - "+ first.taille +" pouces");
                $( "#taille_phone2" ).html(" - "+ second.taille +" pouces");
                $( "#taille_phone3" ).html(" - "+ third.taille +" pouces");

                $( "#stockage_phone1" ).html(" - "+ getStockageList(first.stockage));
                $( "#stockage_phone2" ).html(" - "+ getStockageList(second.stockage));
                $( "#stockage_phone3" ).html(" - "+ getStockageList(third.stockage));
                console.log(getStockageList(first.stockage)[getStockageList(first.stockage).length - 1]);

                chart1.series[0].setData([first.design, first.puissance, first.camera, first.reseau, first.solidite, first.batterie]);
                chart2.series[0].setData([second.design, second.puissance, second.camera, second.reseau, second.solidite, second.batterie]);
                chart3.series[0].setData([third.design, third.puissance, third.camera, third.reseau, third.solidite, third.batterie]);
            },
            error: function(resultat, statut, erreur) {
                console.log(erreur);
            }
        });
    });

    setHexazone();
    randomBox();
});

function loadPhones(phone_liste) {
    console.log("reach");
}

function ajustTopsection() {

}

function compareNombres(a, b) {
  return a - b;
}

function getStockageList(stockage) {
    var chaine = "";
    var checker = [];
    stockage.sort(compareNombres);
    for (var i =0; i < stockage.length; i++) {
        if (!checker.includes(stockage[i]))
            chaine += stockage[i] + "Go / ";
        checker.push(stockage[i]);
    }
    chaine = chaine.substring(0,chaine.length-2);
    return chaine;
}

function setHexazone () {
    var points= {
        "box-top" : [0.471, 0.0547],
        "box-top-right" : [0.777, 0.251],
        "box-top-left" : [0.162, 0.251],
        "box-bottom" : [0.471, 0.834],
        "box-bottom-right" : [0.777, 0.642],
        "box-bottom-left" : [0.162, 0.642],
        "box-center" : [0.471, 0.425]
    };

    var parent =  $( "#hexazone" ).parent();
    var viewportWidth = parseInt(parent.width(), 10);
    var viewportHeight = parseInt(parent.height(), 10);

    var width = 543;
    var height = 494;

    if (width > viewportWidth || height > viewportHeight ) {
        var width = viewportWidth;
        var height = viewportHeight;

        if (width < height)
            height = Math.round(width*0.91);
        else
            width = Math.round(height*1.1);
    }

    $( "#hexazone" ).css("width", width);
    $( "#hexazone" ).css("height", height);

    for (var key in points) {
        var x = Math.round(points[key][0] * width);
        var y = Math.round(points[key][1] * height);

        $( "."+key ).css("top", y);
        $( "."+key ).css("left", x);
    }
}

function randomBox(currentBox=null) {
    var num = getRandomInt(1, 7)
    if (search[num-1] != 0) {
        return ;
    }
    var boxNum = "#box"+num;

    highlight[boxNum[4] - 1] = 0;
    highlightBox(boxNum);

    var currentBox = boxNum;

    window.setTimeout(function() {
        highlightBox(currentBox);
    }, 1500);
    window.setTimeout(function() {
        randomBox(currentBox);
    }, 3000);
}
function highlightBox(boxNum) {
    var box_class = $(boxNum).attr("class");

    box_class = (highlight[boxNum[4]-1] != 0) ? box_class.replace("box_highlight", "") : box_class+" box_highlight";
    highlight[boxNum[4]-1] = (highlight[boxNum[4]-1] != 0) ? 0 : 1;

    $(boxNum).attr("class", box_class);
}
function getRandomInt(min, max) {
  min = Math.ceil(min);
  max = Math.floor(max);
  return Math.floor(Math.random() * (max - min)) + min;
}
